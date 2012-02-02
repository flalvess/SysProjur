<?php
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/cidades/Cidade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';

class ExecCadCidadeAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoCidades::validateRequestCad($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $cidade = new Cidade();

            $cidade->setNome($cleanRequest->get('nome'));
            $cidade->setFkEstado($cleanRequest->get('fkEstado'));

            $daoCidade = new DAOCidade();

            try {
                $dbConn = $daoCidade->getDbConn();
                $dbConn->beginTrans();

                $daoCidade->save($cidade);

                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Cidades','{$msg}',false)");
                $response->addScript( "GestaoCidades.initList()");

            } catch ( Exception $e ) {
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Cidades','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>