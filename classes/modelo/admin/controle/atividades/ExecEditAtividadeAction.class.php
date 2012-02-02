<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/Atividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecEditAtividadeAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        $controlValidation = GestaoAtividade::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $atividade = new Atividade();

            $atividade->setIdAtividade($cleanRequest->get('idAtividade'));

            $atividade->setCiente($cleanRequest->get('ciente'));

            if($cleanRequest->get('ciente') =="Sim") {
                $atividade->setDataCiente(date("d/m/Y - H:i:s"));
            }

            $daoAtividade = new DAOAtividade();

            try {
                $dbConn = $daoAtividade->getDbConn();
                $dbConn->beginTrans();

                $daoAtividade->update($atividade);

                $dbConn->commitTrans();

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Alteraзгo concluнda com sucesso.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Atividades','{$msg}',false)");
                $response->addScript( "GestaoAtividadeRec.initListRec()");
            } catch ( Exception $e ) {
                $msg = "A alteraзгo deste usuбrio nгo pфde ser concluнda. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Atividades','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>