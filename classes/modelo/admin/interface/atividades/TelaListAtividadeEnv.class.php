<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividadeEnv.class.php';

class TelaListAtividadeEnv extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "atividades/listAtividadeEnv.tpl" );
	}
	
	public function processAssign()
	{
	$this->assign ( "titulo", "Listagem de Atividades" );
        $this->assign ( "optionsOrdem", GestaoAtividadeEnv::getCamposOrdemLista ( TRUE ) );
		
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
       
    }
}

?>