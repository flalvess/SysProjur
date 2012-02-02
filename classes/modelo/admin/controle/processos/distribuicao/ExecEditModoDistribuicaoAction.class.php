<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/processos/distribuicao/GestaoTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/TipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/assunto/DAOAssunto.class.php';
require_once 'classes/modelo/admin/entidade/assunto/Assunto.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecEditModoDistribuicaoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        $controlValidation = GestaoTipoDistribuicao::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

      
            $distribuicao = new TipoDistribuicao();
            $assunto =  new Assunto();

            $distribuicao->setIdTipoDistribuicao($cleanRequest->get('idTipoDistribuicao'));
            $distribuicao->setModo($cleanRequest->get('modo'));
            $distribuicao->setCriterio($cleanRequest->get('criterio'));

            if($cleanRequest->get('criterio') == "Por Assunto"){

                $vetor['assunto'] = $cleanRequest->get('assunto');
                $vetor['fkUsuario'] = $cleanRequest->get('fkUsuario');
                
                $assunto->setAssunto($cleanRequest->get('assunto'));
                $assunto->setFkProcurador($cleanRequest->get('fkUsuario'));
                $procurador = $cleanRequest->get('usuario');

            }
       
            $daoDistribuicao = new DAOTipoDistribuicao();
            $daoAssunto = new DAOAssunto();

            try {
                $dbConn = $daoDistribuicao->getDbConn();
                $dbConn->beginTrans();

                $daoDistribuicao->update($distribuicao);

                if($cleanRequest->get('criterio') == "Por Assunto"){
                    DAOAssunto::atualizarAssunto($vetor);
                }
               
                //$daoAssunto->update($assunto);


                $dbConn->commitTrans();

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Alteraзгo concluнda com sucesso.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Processos','{$msg}',false)");
                $response->addScript( "GestaoProcessos.initEditModoDistribuicao()");
                $response->addScript( "GestaoProcessos.changeProcessTypeAssunto()");
            } catch ( Exception $e ) {
                $msg = "A alteraзгo deste usuбrio nгo pфde ser concluнda. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Processos','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>