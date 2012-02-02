<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/movimentacoes/TelaCadMovimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/Movimentacao.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacaoAExecutar.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/MovimentacaoAExecutar.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';

class InitEditMovimentacaoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoMovimentacao::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idMovimentacao = $cleanRequest->get("idMovimentacao");

            $dao = new DAOMovimentacao();
            $movimentacao = new Movimentacao();
            $movimentacaoAExecutar = new MovimentacaoAExecutar();

            $movimentacao->setIdMovimentacao($idMovimentacao);

            $dao->load($movimentacao);


            if ($movimentacao->isLoaded()) {

                $movimentacaoAExecutar = DAOMovimentacao::buscarMovimentacaoAExecutar($idMovimentacao);

                $tela = new TelaCadMovimentacao();

                $tela->setDados($dao->toArray($movimentacao), $movimentacaoAExecutar);
                $tela->processAssign();

                $idProc = $movimentacao->getFkProcesso();

                $obj = DAOProcesso::getNumeroProcesso($idProc);

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Edi��o de Movimentacao");
                $response->addScript("GestaoMovimentacao.changeProcessType()");
                $response->addScript("FormUtil.initForm('formSaveMovimentacao')");
                $response->addScript("jQuery('#formSaveMovimentacao_processo').val('{$obj['numeroProcesso']}')");
                $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formSaveMovimentacao_fkProcesso','#formSaveMovimentacao_processo')");
                $response->addScript("GestaoMovimentacao.showCalendar('#formSaveMovimentacao_dataLimite')");

            } else {
                $msg = "O processo informado para altera��o n�o foi encontrado. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Altera��o de Movimentacao','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informa��es necess�rias para alterar um usu�rio foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Altera��o de Movimentacao','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>