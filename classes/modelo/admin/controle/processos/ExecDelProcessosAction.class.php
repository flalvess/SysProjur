<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/historico/Historico.class.php';
require_once 'classes/modelo/admin/entidade/historico/DAOHistorico.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/procurador/Procurador.class.php';
require_once 'classes/modelo/admin/entidade/procurador/DAOProcurador.class.php';

class ExecDelProcessosAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoProcessos::validateRequestDel($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $idProcessos = $cleanRequest->get("idProcessos");
            $idProcessos = (count($idProcessos) > 0) ? $idProcessos : array ( );

            try {
                $dao = new DAOProcesso ( );
                $processo = new Processo();

                foreach ( $idProcessos as $id ) {
                    $processo->setIdProcesso ( $id );
                    $thisIdProcesso = $id;
                    //$response->addAlert($id);



                    $dao->load ( $processo );


                    if($thisIdProcesso != "") {
                        $historico = new Historico;
                        $daoHistorico = new DAOHistorico();



                        $historico->setDataHora(date("d/m/Y - H:i:s"));
                        $thisNumeroProcesso = DAOProcesso::getNumeroProcesso($thisIdProcesso);
                        $historico->setNumeroProcesso($thisNumeroProcesso['numeroProcesso']);


                        $thisProcurador = DAOProcurador::getNomeProcuradorById($processo->getFkUsuario());
                        //$response->addAlert( $thisProcurador);
                        $historico->setProcurador($thisProcurador['nome']);
                        // $historico->setProcurador(DAOProcurador::getNomeProcuradorById($processo->getFkUsuario()));




                        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
                        $historico->setUsuario($usuarioLogado['nome']);
                        $historico->setTipo("&#8212;");
                        $historico->setOperacao("Deletado");

                        $daoHistorico->save($historico);
                    }
                    $dao->delete ( $processo );
                }

//                if($processo->getIdProcesso() != "") {
//                    $historico = new Historico;
//                    $daoHistorico = new DAOHistorico();
//
//
//
//                    $historico->setDataHora(date("d/m/Y - H:i:s"));
//                    $thisNumeroProcesso = DAOProcesso::getNumeroProcesso($processo->getIdProcesso());
//                    $historico->setNumeroProcesso($thisNumeroProcesso['numeroProcesso']);
//
//
//                    $thisProcurador = DAOProcurador::getNomeProcuradorById($processo->getFkUsuario());
//                    //$response->addAlert( $thisProcurador);
//                    $historico->setProcurador($thisProcurador['nome']);
//                    // $historico->setProcurador(DAOProcurador::getNomeProcuradorById($processo->getFkUsuario()));
//
//
//
//
//                    $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
//                    $historico->setUsuario($usuarioLogado['nome']);
//                    $historico->setTipo("&#8212;");
//                    $historico->setOperacao("Deletado");
//
//                    $daoHistorico->save($historico);
//                }

                $msg = "Usuário(s) deletado(s) com sucesso.";
                $response->addScript( "js.promptMenssage('Exclusão de Processos','{$msg}',false)");
                $response->addScript( "GestaoProcessos.initList()");
            } catch ( Exception $e ) {
                $msg = "Falha ao excluir alguns usuários. Recomece do Inicio.";
                $response->addScript( "js.promptMenssage('Exclusão de Processos','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informações necessárias para excluir usuários não foram informadas corretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Exclusão de Processos','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>