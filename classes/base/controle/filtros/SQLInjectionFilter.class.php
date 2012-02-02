<?php
require_once 'classes/base/controle/filtros/AbstractRequestFilter.class.php';
require_once 'classes/base/sistema/Seguranca.class.php';

/**
 * Filtro respons�vel por verificar ataques de SQL Injection
 * @author Jackson Cereb
 *
 */
class SQLInjectionFilter extends AbstractRequestFilter
{
	public static function execute($request)
	{
		$dados = $request->getData();
		
		$dados = Seguranca::clear($dados);

		$request->setData($dados);
	}
}

/**
 * Exce��o lan�ada quando a verifica��o de SQL Injection falha.
 * Por enquanto, a verifica��o de SQL Injection apenas limpa os dados sem retornar nada.
 * @author Jackson Cereb
 *
 */
class SQLInjectionFilterException extends Exception
{
	public function __construct()
	{
		$msg = "Os dados dessa requisi��o n�o passram no filtro de SQL Injection";
		parent::__construct($msg);
	}
}

?>