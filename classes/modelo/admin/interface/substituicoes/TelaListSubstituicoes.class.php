<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';


class TelaListSubstituicoes extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "substituicoes/listSubstituicoes.tpl" );
	}
	
	public function processAssign()
	{
		$this->assign ( "titulo", "Listagem de Substituicoes" );
              $this->assign ( "optionsOrdem", GestaoSubstituicoes::getCamposOrdemLista ( TRUE ) );
              $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
	}



}

?>