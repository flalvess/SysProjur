<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/base/sistema/JuizoCidadeUtil.class.php';

class LoadJuizosAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse ( );
		
		$rawRequest = $this->getRequest ();
		
		$controlValidation =   JuizoCidadeUtil::validateRequest ( $rawRequest );

		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();
			
			$optionsJuizo = JuizoCidadeUtil::getMapJuizos( $cleanRequest->get ( 'idCidade' ) );
			
			$arrayName = $cleanRequest->get ( 'arrayName' );
			
			$jsJuizos = "{$arrayName} = new Array();";
			$i = - 1;
			
			foreach ( $optionsJuizo as $idJuizo => $nome )
			{
				$i ++;
				$nome = addslashes ( $nome );
				
				$jsJuizos .= "{$arrayName}[{$i}] = new Array();";
				$jsJuizos .= "{$arrayName}[{$i}]['txt'] = '{$nome}';";
				$jsJuizos .= "{$arrayName}[{$i}]['valor'] = '{$idJuizo}';";
			}
			
			$jsJuizos .= "BaseAdmin.execOptions('{$cleanRequest->get('idSelect')}', {$arrayName})";
			
			$response->addScript ( $jsJuizos );
		}
		
		$this->setResponse ( $response );
	}
}

?>
