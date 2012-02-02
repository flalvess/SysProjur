<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';

class TelaListMovimentacao extends ObjectGUI
{
	public function __construct()
	{
		parent::__construct ( "movimentacoes/listMovimentacao.tpl" );
		//parent::__construct ( "processos/openProcesso.tpl" );
	}
	
	public function processAssign()
	{
	$this->assign ( "titulo", "Listagem de Movimentacaos" );
        $this->assign ( "optionsOrdem", GestaoMovimentacao::getCamposOrdemLista ( TRUE ) );
        $response->addScript("GestaoMovimentacao.showCalendar('#formListMovimentacao_data')");
		
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
      
    }
}

?>