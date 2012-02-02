<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividadeRec.class.php';

class TelaListAtividadeRec extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "atividades/listAtividadeRec.tpl" );
	}
	
	public function processAssign()
	{
	$this->assign ( "titulo", "Listagem de Atividades" );
        $this->assign ( "optionsOrdem", GestaoAtividadeRec::getCamposOrdemLista ( TRUE ) );
		
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
      
    }
}

?>