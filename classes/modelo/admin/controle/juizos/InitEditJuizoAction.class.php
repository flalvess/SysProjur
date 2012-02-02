<?php
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/juizos/TelaCadJuizo.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';

class InitEditJuizoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoJuizos::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idJuizo = $cleanRequest->get("idJuizo");
            $fkCidade = $cleanRequest->get("fkCidade");

            $dao = new DAOJuizo();
            $juizo = new Juizo();

            $juizo->setIdJuizo($idJuizo);
            $juizo->setFkCidade($fkCidade);

            $dao->load($juizo);

            if ($juizo->isLoaded()) {
                $tela = new TelaCadJuizo();
                $tela->setDados($dao->toArray($juizo));
                $tela->processAssign();

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Ediчуo de Juizos");
                $response->addScript("FormUtil.initForm('formSaveJuizo')");
            } else {
                $msg = "O funcionсrio informado para alteraчуo nуo foi encontrado. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraчуo de Juizos','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Alteraчуo de Juizos','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>