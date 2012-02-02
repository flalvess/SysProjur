<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';

class TelaListAtividade extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "atividades/listAtividade.tpl" );
	}
	
	public function processAssign()
	{
	$this->assign ( "titulo", "Listagem de Atividades" );
        $this->assign ( "optionsOrdem", GestaoAtividade::getCamposOrdemLista ( TRUE ) );
		
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
       
    }
}

?>