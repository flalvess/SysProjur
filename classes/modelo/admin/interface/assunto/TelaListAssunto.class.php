<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/assunto/GestaoAssunto.class.php';


class TelaListAssunto extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "assunto/listAssunto.tpl" );
		
	}

	public function processAssign()
	{
		$this->assign ( "titulo", "Listagem de Assunto" );
                $this->assign ( "optionsOrdem", GestaoAssunto::getCamposOrdemLista ( TRUE ) );
                $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
	}



}

?>