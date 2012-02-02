<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/cidades/TelaListCidades.class.php';

class InitListCidadeAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $tela = new TelaListCidades();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Listagem de Cidades");
        $response->addScript("FormUtil.initForm('formListCidade')");
        $response->addScript("GestaoCidades.execList()");

        $this->setResponse($response);
    }
}

?>