<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';

class GestaoPrimeiraInstancia
{
	const NUM_ITENS = 10;
	
	public function getCamposOrdemLista()
	{
		$map ['0'] ['label'] = "Nome";
		$map ['0'] ['campo'] = "tbfuncionario.nome";
		$map ['1'] ['label'] = "CPF";
		$map ['1'] ['campo'] = "tbfuncionario.cpf";
		$map ['2'] ['label'] = "Matricula";
		$map ['2'] ['campo'] = "tbfuncionario.matricula";
		
		return $map;
	}
	
	private function getCampoOrdem($indice)
	{
		$map = self::getCamposOrdemLista();
		
		return $map [$indice] ['campo'];
	}
	
	public static function validateRequestCad($rawRequest, $edit = false)
	{
		$controlValidation = new ValidationFacade();
		
		if($edit){
		
			$controlValidation->addValidator(new InteiroPositivoValidator("idFuncionario", "Falta informar o usuário que será alterado."));		
		}
		
		$controlValidation->addValidator(new StringNotEmptyValidator("nome", "O NOME deve ser informado."));
		$controlValidation->addValidator(new StringNotEmptyValidator("cpf", "O CPF deve ser informado."));
		$controlValidation->addValidator(new StringNotEmptyValidator("matricula", "O MATRÍCULA deve ser informada."));
		$controlValidation->addValidator(new StringNotEmptyValidator("rg", "O RG deve ser informado."));
		$controlValidation->addValidator(new StringNotEmptyValidator("pis", "O PIS deve ser informado."));
		$controlValidation->addValidator(new NoValidator("campus", "O CAMPUS não pode ser vazio."));
		$controlValidation->addValidator(new NoValidator("cargo", "O CARGO não pode ser vazio."));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestList($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
		$controlValidation->addValidator(new NoValidator("funcionario", ""));
		$controlValidation->addValidator(new NoValidator("pag", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;

	}
	
	public static function validateRequestID($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new InteiroPositivoValidator("idFuncionario", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestDel($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new ArrayValidator("idFuncionarios", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestMudaStatus($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new NoValidator("idFuncionario", ""));
		$controlValidation->addValidator(new NoValidator("status", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestInitAlt($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new InteiroPositivoValidator("idFuncionario", ""));
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}

	public static function validateReqCompPrimeiraInstancia($rawRequest)
	{
		$controlValidation = new ValidationFacade ( );

		$controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

		$controlValidation->validate ( $rawRequest );

		return $controlValidation;
	}
	
	public static function deleteFunc($idFuncionario)
	{		
		$dao = new DAOFuncionario();
		return $dao->deleteFunc($idFuncionario);
	}
	
	public static function filtroBasico($params)
	{
		$nome = (isset($params ['funcionario'])) ? ($params ['funcionario']) : ("");
		$ordem = (isset($params ['ordem'])) ? ($params ['ordem']) : (0);
		$sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
		$li = (isset($params ['li'])) ? ($params ['li']) : (0);
		$numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);
		
		unset($params);
		
		$strWhere = "status <> '-1'";
		$strWhere .= (!empty($nome)) ? (" and (tbfuncionario.nome like '%{$nome}%')") : ("");
		
		if ($li < 0)
		{
			$li = 0;
		}
		if ($numItens <= 0)
		{
			$numItens = 10;
		}
		
		$campoOrdem = self::getCampoOrdem($ordem);
		$sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");
		
		$filtro ['tabelas'] = "tbfuncionario";
		$filtro ['campos'] = "tbfuncionario.*";
		$filtro ['join'] = "";
		$filtro ['group'] = "";
		$filtro ['condicao'] = $strWhere;
		$filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
		$filtro ['li'] = $li;
		$filtro ['numItens'] = $numItens;
		
		return $filtro;
	}
}

?>
