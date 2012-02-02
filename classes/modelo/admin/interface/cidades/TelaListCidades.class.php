<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';


class TelaListCidades extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "cidades/listCidades.tpl" );
	}
	
	public function processAssign()
	{
		$this->assign ( "titulo", "Listagem de Cidades" );
                $this->assign ( "optionsOrdem", GestaoCidades::getCamposOrdemLista ( TRUE ) );
                $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
	}



}

?>