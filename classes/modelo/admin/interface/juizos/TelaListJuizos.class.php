<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';


class TelaListJuizos extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "juizos/listJuizos.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Juizos" );
        $this->assign ( "optionsOrdem", GestaoJuizos::getCamposOrdemLista ( TRUE ) );
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
    }



}

?>