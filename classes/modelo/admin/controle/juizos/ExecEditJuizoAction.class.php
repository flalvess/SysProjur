<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';

class ExecEditJuizoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoJuizos::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $juizo = new Juizo();

            $juizo->setIdJuizo($cleanRequest->get('idJuizo'));
            $juizo->setNome($cleanRequest->get('nome'));
            $juizo->setFkCidade($cleanRequest->get('fkCidade'));


            try {
                $daoJuizo = new DAOJuizo();
                $daoJuizo->update($juizo);

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Altera��o conclu�da com sucesso.";
                $response->addScript( "js.promptMenssage('Altera��o de Funcion�rios','{$msg}',false)");
                $response->addScript( "GestaoJuizos.initList()");
            } catch ( Exception $e ) {
                $msg = "A altera��o deste usu�rio n�o p�de ser conclu�da. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Altera��o de Funcion�rios','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>