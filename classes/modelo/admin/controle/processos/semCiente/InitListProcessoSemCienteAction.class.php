<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/processos/TelaListProcessosSemCiente.class.php';

class InitListProcessoSemCienteAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $tela = new TelaListProcessosSemCiente();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Listagem de Processos com Movimentações Sem Ciente");
        $response->addScript("FormUtil.initForm('formListProcesso')");
        $response->addScript("GestaoProcessos.execListSemCiente()");

        $response->addScript("GestaoProcessos.showCalendar('#formListProcesso_dataEntrada')");
        $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formListProcesso_fkUsuario','#formListProcesso_usuario')" );

        

        $this->setResponse($response);
    }
}

?>