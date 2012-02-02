<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';
require_once 'classes/modelo/admin/entidade/cidades/Cidade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';

class ExecEditCidadeAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoCidades::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $cidade = new Cidade();

            $cidade->setIdCidade($cleanRequest->get('idCidade'));
            $cidade->setNome($cleanRequest->get('nome'));
            $cidade->setFkEstado($cleanRequest->get('fkEstado'));


            try {
                $daoCidade = new DAOCidade();
                $daoCidade->update($cidade);

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Alteraзгo concluнda com sucesso.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Funcionбrios','{$msg}',false)");
                $response->addScript( "GestaoCidades.initList()");
            } catch ( Exception $e ) {
                $msg = "A alteraзгo deste usuбrio nгo pфde ser concluнda. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Funcionбrios','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>