<?php
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';

class TelaCadPessoa extends ObjectGUI
{
	private $pessoa = null;
	
	public function __construct($pessoa = null)
	{
		parent::__construct ( "pessoas/cadPessoa.tpl" );
		
		$this->pessoa = $pessoa;
	}

	public function setDados($pessoa)
	{
		$this->pessoa = $pessoa;
	}
	
	public function processAssign()
	{
	    if ($this->pessoa != NULL)
		{
			$this->assign ( "actionForm", 'ExecEditPessoaAction' );
			$this->assign ( "pessoa", $this->pessoa );

		} else
		{
			$this->assign ( "actionForm", 'ExecCadPessoaAction' );

		}
		
		$paramsData ['idForm'] = "formSavePessoa";
		$paramsData ['sufixo'] = "Pub";
		
		$this->assign ( "titulo", "Inserчуo de Pessoas" );
            
	}

}

?>