<?php
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/base/controle/filtros/AbstractRequestFilter.class.php';

/**
 * Filtro respons�vel por verificar se a sessao do usu�rio ainda � v�lida
 * @author Jackson Cereb
 *
 */
class SessionFilter extends AbstractRequestFilter
{
	public static function execute($request)
	{
		$classAction = $request->getAction();
		if($classAction != ControleAcesso::ACTION_LOGIN)
		{
			$msg = "";
			$testSessao = ControleAcesso::testSessao();

			switch ($testSessao)
			{
				case ControleAcesso::SESSAO_EXPIRADA:
					$msg = "A sess�o atual expirou: fa�a login novamente.";
					break;
				case ControleAcesso::SESSAO_EXCLUIDA:
					$msg = "A sess�o atual n�o existe ou foi excluida.";
					break;

				default:
					$msg = "";
					break;
			}
			if(!empty($msg))
			{
				throw new SessionFilterException($msg);
			}
		}
	}
}

/**
 * Exce��o lan�ada quando a verifica��o da sess�o falha.
 * @author Jackson Cereb
 *
 */
class SessionFilterException extends Exception
{
	public function __construct($msg = null)
	{
		parent::__construct($msg);
	}
}

?>