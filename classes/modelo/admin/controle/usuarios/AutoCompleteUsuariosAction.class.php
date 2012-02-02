<?php
require_once 'classes/modelo/admin/entidade/usuarios/DAOUsuario.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/usuarios/GestaoUsuarios.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompleteUsuariosAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxTextResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoUsuarios::validateReqCompUsuarios ( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$lista = DAOUsuario::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

			if (count ( $lista ) > 0)
			{
				foreach ( $lista as $id => $nome )
				{
					$response->addTxt ( "{$nome['nome']}|{$nome['idUsuario']}" );
				}
			}
		}

		$this->setResponse ( $response );
	}
}

?>
