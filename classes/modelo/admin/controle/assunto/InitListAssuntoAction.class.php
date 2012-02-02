<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/assunto/TelaListAssunto.class.php';

class InitListAssuntoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $tela = new TelaListAssunto();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Listagem de Assuntos");
        $response->addScript("FormUtil.initForm('formListAssunto')");
        $response->addScript("GestaoAssunto.execList()");

        $this->setResponse($response);
    }
}

?>