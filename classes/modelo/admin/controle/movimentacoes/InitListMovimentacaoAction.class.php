<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/movimentacoes/TelaListMovimentacao.class.php';

class InitListMovimentacaoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $tela = new TelaListMovimentacao();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Listagem de Movimentacaos");
        $response->addScript("FormUtil.initForm('formListMovimentacao')");
        $response->addScript("FormUtil.initForm('formListMovimentacaoteste')");
        $response->addScript("GestaoMovimentacao.execList()");
        $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formListMovimentacao_fkProcesso','#formListMovimentacao_processo')" );

        $this->setResponse($response);
    }
}

?>