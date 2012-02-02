<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/Movimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/MovimentacaoAExecutar.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacaoAExecutar.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecEditMovimentacaoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        $controlValidation = GestaoMovimentacao::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $movimentacao = new Movimentacao();


            $movimentacao->setIdMovimentacao($cleanRequest->get('idMovimentacao'));
            $movimentacao->setEvento($cleanRequest->get('evento'));
            $movimentacao->setObservacao($cleanRequest->get('observacao'));
            $movimentacao->setTipoMovimentacao($cleanRequest->get('tipoMovimentacao'));

            $movimentacao->setArquivo($cleanRequest->get('arquivo'));

            if($cleanRequest->get('ciente') == "Sim") {

                $movimentacao->setCiente("Sim");

            }else if($cleanRequest->get('ciente') == "" || $cleanRequest->get('ciente') == "Nгo") {

                $movimentacao->setCiente("Nгo");


            }

            $movimentacao->setData(date("d/m/Y - H:i:s"));
            $idProcesso = $cleanRequest->get('fkProcesso');

            $daoMovimentacao = new DAOMovimentacao();

            try {
                $dbConn = $daoMovimentacao->getDbConn();
                $dbConn->beginTrans();

                if($cleanRequest->get('arquivo') != "") {

                    GestaoMovimentacao::saveArquivo ( $movimentacao->getArquivo());

                }
                $daoMovimentacao->update($movimentacao);

                if($cleanRequest->get('tipoMovimentacao') == GestaoMovimentacao::TIPO_MOVIMENTACAO) {


                    $movimentacaoAExecutar = new MovimentacaoAExecutar();

                    $daoMovimentacaoAExecutar = new DAOMovimentacaoAExecutar();

                    $vetor = array();

                    $vetor['fkMovimentacao'] = $cleanRequest->get('idMovimentacao');
                    $vetor['dataLimite'] = $cleanRequest->get('dataLimite');
                    $vetor['status'] = $cleanRequest->get('status');
                    $vetor['pendencia'] = $cleanRequest->get('pendencia');

                    DAOMovimentacaoAExecutar::atualizar($vetor);

                }

                $dbConn->commitTrans();

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Alteraзгo concluнda com sucesso.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Movimentacao','{$msg}',false)");
                $response->addScript( "GestaoProcessos.openProcesso($idProcesso)");
            } catch ( Exception $e ) {
                $msg = "A alteraзгo deste usuбrio nгo pфde ser concluнda. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraзгo de Movimentacao','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
        //$response->addScript( "GestaoProcessos.openProcesso($idProcesso)");
    }
}

?>