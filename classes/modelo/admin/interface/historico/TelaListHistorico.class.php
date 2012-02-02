<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/historico/GestaoHistorico.class.php';


class TelaListHistorico extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "historico/listHistorico.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Pessoas" );
        $this->assign ( "optionsOrdem", GestaoHistorico::getCamposOrdemLista ( TRUE ) );
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
    }



}

?>