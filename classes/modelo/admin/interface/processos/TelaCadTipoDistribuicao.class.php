<?php
require_once 'classes/modelo/admin/controle/processos/distribuicao/GestaoTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/controle/processos/distribuicao/AssuntoUtil.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/assunto/GestaoAssunto.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
//require_once 'classes/base/sistema/AssuntoUtil.class.php';

class TelaCadTipoDistribuicao extends ObjectGUI
{
	private $distribuicao = null;
	
	public function __construct($distribuicao = null)
	{
		parent::__construct ( "processos/cadTipoDistribuicao.tpl" );
		
		$this->distribuicao = $distribuicao;
	}


	public function setDados($distribuicao)
	{
		$this->distribuicao = $distribuicao;

	}
	
	public function processAssign()
	{
	    if ($this->distribuicao != NULL)
		{
			$this->assign ( "actionForm", 'ExecEditModoDistribuicaoAction' );
			$this->assign ( "distribuicao", $this->distribuicao );
                        $this->assign ( "optionsOrdem", GestaoAssunto::getCamposOrdemLista ( TRUE ) );
                        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );
		
		}

		$this->assign ( "titulo", "Inserчуo de Processos" );

		$this->assign ( "valueDistribuicao", array('Sequencial', 'Menos Processos', 'Por Assunto') );
		$this->assign ( "outDistribuicao", array('Sequencial', 'Menos Processos','Por Assunto') );

		$this->assign ( "valueModo", array('M', 'A') );
		$this->assign ( "outModo", array('Manual', 'Automсtico') );

                $this->assign ( "optionsAssunto", AssuntoUtil::getMapAssunto() );


	}
}

?>