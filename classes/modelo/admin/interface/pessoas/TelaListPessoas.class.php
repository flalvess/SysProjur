<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';


class TelaListPessoas extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "pessoas/listPessoas.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Pessoas" );
        $this->assign ( "optionsOrdem", GestaoPessoas::getCamposOrdemLista ( TRUE ) );
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
    }



}

?>