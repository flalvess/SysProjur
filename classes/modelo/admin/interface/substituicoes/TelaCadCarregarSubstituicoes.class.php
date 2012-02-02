<?php
require_once 'classes/modelo/admin/controle/impetrados/GestaoImpetrados.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';

class TelaCadCarregarImpetrado extends ObjectGUI
{
	
	public function __construct()
	{
		parent::__construct ( "impetrados/cadCarregamentoImpetrado.tpl" );
		
	}

	public function processAssign()
	{
	}
}

?>