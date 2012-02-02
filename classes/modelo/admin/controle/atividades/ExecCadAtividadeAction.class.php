<?php
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/atividades/Atividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/base/sistema/UploadFile.class.php';

class ExecCadAtividadeAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoAtividade::validateRequestCad($rawRequest);

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();


            $atividade = new Atividade();

            $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();

            $atividade->setIdAtividade($cleanRequest->get('idAtividade'));
            $atividade->setData(date("d/m/Y - H:i:s"));
            $atividade->setPara($cleanRequest->get('para'));
            $atividade->setTipoAtividade($cleanRequest->get('tipoAtividade'));
            $atividade->setSolicitacao($cleanRequest->get('solicitacao'));
            $atividade->setArquivo($cleanRequest->get('arquivo'));
           

            if($cleanRequest->get('pendencia')=="") {
                $atividade->setPendencia("---");
            }
            else {
                $atividade->setPendencia($cleanRequest->get('pendencia'));
            }
            if($cleanRequest->get('ciente')=="") {
                $atividade->setCiente("Não");
            }
            else {
                $atividade->setCiente($cleanRequest->get('ciente'));
            }

            $atividade->setStatus($cleanRequest->get('status'));
            $atividade->setDe($usuarioLogado['nome']);
            
            $daoAtividade = new DAOAtividade();

            $numero = $daoAtividade->numeroAtividadeEnv($usuarioLogado['nome']);
            $atividade->setNumero($numero);

            try {
                $dbConn = $daoAtividade->getDbConn();
                $dbConn->beginTrans();

                GestaoAtividade::saveArquivo ( $atividade->getArquivo());
                $daoAtividade->save($atividade);

                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Atividade','{$msg}',false)");
                $response->addScript( "GestaoAtividadeEnv.initListEnv()");

            } catch ( Exception $e ) {
                $response->addAlert(Util::debugVar($e));
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Atividades','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>