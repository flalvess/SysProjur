<?php
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/Substituicoes.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';

class ExecCadSubstituicoesAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();
        $controlValidation = GestaoSubstituicoes::validateRequestCad($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $substituicoes = new Substituicoes();

            $substituicoes->setProcesso($cleanRequest->get('processo'));
            $substituicoes->setProcuradorSubstituto($cleanRequest->get('fkUsuario'));
            $substituicoes->setProcuradorOriginal($cleanRequest->get('fkUsuarioOriginal'));
            //$response->addAlert($cleanRequest->get('fkUsuarioOriginal'));
            $substituicoes->setTemporaria($cleanRequest->get('temporaria'));
            if($cleanRequest->get('temporaria')=="s") {
                $substituicoes->setMotivoSubstituicao($cleanRequest->get('motivo'));
                $substituicoes->setObservacao($cleanRequest->get('obs'));
            }
            else if($cleanRequest->get('temporaria')=="n") {
                $substituicoes->setMotivoSubstituicao("");
                $substituicoes->setObservacao("");
            }
           
            $substituicoes->setStatus(1);

            $daoSubstituicoes = new DAOSubstituicoes();

            try {
                $dbConn = $daoSubstituicoes->getDbConn();
                $dbConn->beginTrans();

                $daoSubstituicoes->save($substituicoes);

                $processo = new Processo();
                $daoProcesso = new DAOProcesso();

                $processo->setIdProcesso($cleanRequest->get('processo'));
                $processo->setFkUsuario($cleanRequest->get('fkUsuario'));
          
                $daoProcesso->update($processo);  

                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Substituicoes','{$msg}',false)");
                $response->addScript( "GestaoSubstituicoes.initList()");

            } catch ( Exception $e ) {
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Substituicoes','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>