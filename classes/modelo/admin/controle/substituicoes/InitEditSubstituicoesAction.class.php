<?php
require_once 'classes/modelo/admin/entidade/substituicoes/Substituicoes.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/substituicoes/TelaCadSubstituicoes.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';

class InitEditSubstituicoesAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoSubstituicoes::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
        
            $cleanRequest = $controlValidation->getCleanRequest();
            $idProcesso = $cleanRequest->get("idProcesso");
            
            $idSubstituicoes = DAOSubstituicoes::getSubstituicaoByProcesso($idProcesso);
            
            $dao = new DAOSubstituicoes();
            $substituicoes = new Substituicoes();

            if($idSubstituicoes) {
                
                $substituicoes->setIdSubstituicaoProcurador($idSubstituicoes[0]['idSubstituicaoProcurador']);
                $dao->load($substituicoes);
            }

            if ($substituicoes->isLoaded() || !($idSubstituicoes)) {
                $tela = new TelaCadSubstituicoes();
                $tela->setProcesso($idProcesso);
                if($idSubstituicoes) {
                    $tela->setDados($dao->toArray($substituicoes));
                }
                $tela->processAssign();

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Ediчуo de Substituicoes");
                $response->addScript("FormUtil.initForm('formSaveSubstituicoes')");
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveSubstituicoes_fkUsuario','#formSaveSubstituicoes_usuario')" );
            } else {
                $msg = "O processo nуo foi encontrado Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraчуo de Substituicoes','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Alteraчуo de Substituicoes','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>