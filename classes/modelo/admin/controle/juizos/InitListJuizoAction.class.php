<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/juizos/TelaListJuizos.class.php';

class InitListJuizoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $tela = new TelaListJuizos();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Listagem de Juizos");
        $response->addScript("FormUtil.initForm('formListJuizo')");
        $response->addScript("GestaoJuizos.execList()");

        $this->setResponse($response);
    }
}

?>