<?php
require_once 'classes/modelo/admin/entidade/cidades/Cidade.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/cidades/TelaCadCidade.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';

class InitEditCidadeAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoCidades::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idCidade = $cleanRequest->get("idCidade");

            $dao = new DAOCidade();
            $cidade = new Cidade();

            $cidade->setIdCidade($idCidade);

            $dao->load($cidade);

            if ($cidade->isLoaded()) {
                $tela = new TelaCadCidade();
                $tela->setDados($dao->toArray($cidade));
                $tela->processAssign();

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Ediчуo de Cidades");
                $response->addScript("FormUtil.initForm('formSaveCidade')");
            } else {
                $msg = "O funcionсrio informado para alteraчуo nуo foi encontrado. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraчуo de Cidades','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Alteraчуo de Cidades','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>