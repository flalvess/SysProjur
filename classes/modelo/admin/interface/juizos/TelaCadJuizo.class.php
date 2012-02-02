<?php
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';

class TelaCadJuizo extends ObjectGUI
{
	private $juizo = null;
	
	public function __construct($juizo = null)
	{
		parent::__construct ( "juizos/cadJuizo.tpl" );
		
		$this->juizo = $juizo;
	}

	public function setDados($juizo)
	{
		$this->juizo = $juizo;
	}
	
	public function processAssign()
	{
	    if ($this->juizo != NULL)
		{
			$this->assign ( "actionForm", 'ExecEditJuizoAction' );
			$this->assign ( "juizo", $this->juizo );

		} else
		{
			$this->assign ( "actionForm", 'ExecCadJuizoAction' );

		}
		
		$paramsData ['idForm'] = "formSaveJuizo";
		$paramsData ['sufixo'] = "Pub";
		
		$this->assign ( "titulo", "Inserчуo de Juizos" );
		$this->assign ( "optionsCidade", GestaoJuizos::getMapCidade() );
		
	}

}

?>