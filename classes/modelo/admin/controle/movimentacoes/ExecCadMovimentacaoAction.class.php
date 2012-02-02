<?php
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/Movimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/MovimentacaoAExecutar.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacaoAExecutar.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/base/sistema/UploadFile.class.php';

class ExecCadMovimentacaoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoMovimentacao::validateRequestCad($rawRequest);

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $movimentacao = new Movimentacao();
            $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
            $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
            $movimentacao->setIdMovimentacao($cleanRequest->get('idMovimentacao'));
            $movimentacao->setTipoMovimentacao($cleanRequest->get('tipoMovimentacao'));
            $movimentacao->setEvento($cleanRequest->get('evento'));
            $movimentacao->setObservacao($cleanRequest->get('observacao'));
            $movimentacao->setArquivo($cleanRequest->get('arquivo'));

            if($cleanRequest->get('ciente') == "" || $cleanRequest->get('ciente') == "Não" ) {
                $movimentacao->setCiente("Não");
            }
            else {
                $movimentacao->setCiente("Sim");
            }
            $movimentacao->setMovimentadoPor($usuarioLogado['nome']);

            if (count ( $usuarioGrupo ) > 0) {
                foreach ( $usuarioGrupo as $nome ) {
                    $movimentacao->setPerfil($nome['nome']);
                }
            }

            $movimentacao->setData(date("d/m/Y - H:i:s"));


            $daoMovimentacao = new DAOMovimentacao();

            $idProcesso = $cleanRequest->get('fkProcesso');
            $movimentacao->setFkProcesso($cleanRequest->get('fkProcesso'));
            $numero = $daoMovimentacao->numeroMovimentacao($cleanRequest->get('fkProcesso'));

            $movimentacao->setNumeroMovimentacao($numero);

            try {
                $dbConn = $daoMovimentacao->getDbConn();
                $dbConn->beginTrans();

                GestaoMovimentacao::saveArquivo ( $movimentacao->getArquivo());

                $daoMovimentacao->save($movimentacao);

                if($cleanRequest->get('tipoMovimentacao') == GestaoMovimentacao::TIPO_MOVIMENTACAO) {

                    $daoMovimentacaoAExecutar = new DAOMovimentacaoAExecutar();

                    $movimentacaoAExecutar = new MovimentacaoAExecutar();

                    $movimentacaoAExecutar->setFkMovimentacao($movimentacao->getIdMovimentacao());
                    $movimentacaoAExecutar->setDataLimite($cleanRequest->get('dataLimite'));
                    $movimentacaoAExecutar->setStatus($cleanRequest->get('status'));
                    $movimentacaoAExecutar->setPendencia($cleanRequest->get('pendencia'));

                    $daoMovimentacaoAExecutar->save($movimentacaoAExecutar);
                }
                else if ($cleanRequest->get('tipoMovimentacao') == "executada") {

                    $daoMovimentacaoAExecutar = new DAOMovimentacaoAExecutar();

                    $movimentacaoAExecutar = new MovimentacaoAExecutar();

                    $movimentacaoAExecutar->setFkMovimentacao($movimentacao->getIdMovimentacao());
                    $movimentacaoAExecutar->setDataLimite($cleanRequest->get('dataLimite'));
                    $movimentacaoAExecutar->setStatus($cleanRequest->get('status'));
                    $movimentacaoAExecutar->setPendencia($cleanRequest->get('pendencia'));

                    $daoMovimentacaoAExecutar->save($movimentacaoAExecutar);
                }
                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Movimentacao','{$msg}',false)");
                ;
                $response->addScript( "GestaoProcessos.openProcesso($idProcesso)");

            } catch ( Exception $e ) {
                $response->addAlert(Util::debugVar($e));
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Movimentacaos','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>