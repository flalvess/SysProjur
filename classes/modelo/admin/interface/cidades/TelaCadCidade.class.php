<?php
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';

class TelaCadCidade extends ObjectGUI
{
	private $cidade = null;
	
	public function __construct($cidade = null)
	{
		parent::__construct ( "cidades/cadCidade.tpl" );
		
		$this->cidade = $cidade;
	}

	public function setDados($cidade)
	{
		$this->cidade = $cidade;
	}
	
	public function processAssign()
	{
	    if ($this->cidade != NULL)
		{
			$this->assign ( "actionForm", 'ExecEditCidadeAction' );
			$this->assign ( "cidade", $this->cidade );

		} else
		{
			$this->assign ( "actionForm", 'ExecCadCidadeAction' );

		}
		
		$paramsData ['idForm'] = "formSaveCidade";
		$paramsData ['sufixo'] = "Pub";
		
		$this->assign ( "titulo", "Inserзгo de Cidades" );

                $this->assign ( "valueEstado", array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                    '21', '22', '23', '24', '25','26', '27') );

                 $this->assign ( "outEstado", array('Acre - AC', 'Alagoas - AL', 'Amapб - AP', 'Amazonas - AM', 'Bahia - BA', 'Cearб - CE', 'Distrito Federal - DF', 'Goiбs - GO', 'Espнrito Santo - ES', 'Maranhгo - MA', 'Mato Grosso - MT', 'Mato Grosso do Sul - MS', 'Minas Gerais - MG', 'Parб - PA', 'Paraнba - PB', 'Paranб - PR', 'Pernambuco - PE', 'Piauн - PI', 'Rio de Janeiro - RJ', 'Rio Grande do Norte - RN',
                    'Rio Grande do Sul - RS', 'Rondфnia - RO', 'Roraima - RR', 'Sгo Paulo - SP', 'Santa Catarina - SC','Sergipe - SE', 'Tocantins - TO') );

	}

}

?>