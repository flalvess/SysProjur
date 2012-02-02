<?php
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/UploadFile.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'include/include.init.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';

class UploadFotoUsuarioAction extends AbstractAction
{
	public function execute()
	{
		$response = new AjaxResponse();
		$response->sendAsHTML();
		
		$rawRequest = $this->getRequest();
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new NoValidator("fotoUpd", ""));
		$controlValidation->addValidator(new StringNotEmptyValidator("idFormUpload", "Falta informar o id do form usado para o upload"));
		$controlValidation->addValidator(new StringNotEmptyValidator("containerPreview", "Falta informar o container que receberá o preview do usuario"));
		$controlValidation->addValidator(new StringNotEmptyValidator("containerLegenda", "Falta informar o container que receberá a legenda do usuario"));
		$controlValidation->addValidator(new StringNotEmptyValidator("idParentInput", "Falta informar o id do input do arquivo"));
		$controlValidation->addValidator(new StringNotEmptyValidator("inputDestArquivo", "Falta informar o id do input de destino do arquivo"));
		
		$controlValidation->validate($rawRequest);
		
		if ($controlValidation->isValid())
		{
			$cleanRequest = $controlValidation->getCleanRequest();
			
			$params ['diretorio'] = DIR_TEMP;
			$params ['arquivo'] = $rawRequest->getForValidation('fotoUpd');
			
			$updFile = new UploadFile($params);
			
			$updFile->saveToDisk();
			
			$idFormUpload = $cleanRequest->get('idFormUpload');
			$idParentInput = $cleanRequest->get('idParentInput');
			$inputDestArquivo = $cleanRequest->get('inputDestArquivo');
			$containerPreview = $cleanRequest->get('containerPreview');
			$containerLegenda = $cleanRequest->get('containerLegenda');
			
			$nameFile = $updFile->getNome();
			$srcFile = "../temp/" . $updFile->getNome();
									
			$response->addScript("parent.GestaoUsuarios.confirmUpload({idFormUpload:'{$idFormUpload}', idParentInput:'{$idParentInput}', inputDestArquivo:'{$inputDestArquivo}', containerPreview:'{$containerPreview}', containerLegenda:'{$containerLegenda}',	nameFile:'{$nameFile}',	srcFile:'{$srcFile}'})");
		} else
		{
			$erros = $controlValidation->getErrors();
			
			$controlValidation = new ValidationFacade();
			
			$controlValidation->addValidator(new StringNotEmptyValidator("idFormUpload", "Falta informar o id do form usado para o upload"));
			$controlValidation->addValidator(new StringNotEmptyValidator("containerPreview", "Falta informar o container que receberá o preview da imagem"));
			$controlValidation->addValidator(new StringNotEmptyValidator("containerLegenda", "Falta informar o container que receberá a legenda do banner"));
			$controlValidation->addValidator(new StringNotEmptyValidator("inputDestArquivo", "Falta informar o id do input de destino do arquivo"));
			
			$controlValidation->validate($rawRequest);
			if ($controlValidation->isValid())
			{
				$cleanRequest = $controlValidation->getCleanRequest();
				
				$idFormUpload = $cleanRequest->get('idFormUpload');
				$inputDestArquivo = $cleanRequest->get('inputDestArquivo');
				$containerPreview = $cleanRequest->get('containerPreview');
				$containerLegenda = $cleanRequest->get('containerLegenda');
				
				$msg = "";
				
				foreach ( $erros as $erro )
				{
					$msg .= $erro . "<br />\n";
				}
				
				$response->addScript("parent.TelaPrincipal.cancelUpload({idFormUpload:'{$idFormUpload}', inputDestArquivo:'{$inputDestArquivo}', containerPreview:'{$containerPreview}', containerLegenda:'{$containerLegenda}'})");
				$response->addScript("parent.TelaPrincipal.showMsgAlerta({titulo:'Upload de Imagens', texto:'{$msg}'})");
			} else
			{
				$response->addScript("parent.TelaPrincipal.showMsgAlerta({titulo:'Upload de Imagens', texto:'Algumas inforações básicas não foram enviadas pelo sistema e esta operação não pode ser completada.'})");
			}
		}
		
		$this->setResponse($response);
	}
}

?>