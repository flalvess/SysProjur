<?php
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';

class ExecCadJuizoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoJuizos::validateRequestCad($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $juizo = new Juizo();

            $juizo->setNome($cleanRequest->get('nome'));
            $juizo->setFkCidade($cleanRequest->get('fkCidade'));

            $daoJuizo = new DAOJuizo();

            try {
                $dbConn = $daoJuizo->getDbConn();
                $dbConn->beginTrans();

                $daoJuizo->save($juizo);

                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Juizos','{$msg}',false)");
                $response->addScript( "GestaoJuizos.initList()");

            } catch ( Exception $e ) {
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste Juízo não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Juizos','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>