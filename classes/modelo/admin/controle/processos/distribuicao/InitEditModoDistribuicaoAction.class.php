<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/distribuicao/GestaoTipoDistribuicao.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/processos/TelaCadTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/TipoDistribuicao.class.php';

class InitEditModoDistribuicaoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoTipoDistribuicao::validateRequestInitAltModo($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idTipoDistribuicao = $cleanRequest->get("idTipoDistribuicao");


            $dao = new DAOTipoDistribuicao();
            $distribuicao = new TipoDistribuicao();

            $distribuicao->setIdTipoDistribuicao($idTipoDistribuicao);

            $dao->load($distribuicao);

            if ($distribuicao->isLoaded()) {
                $tela = new TelaCadTipoDistribuicao();

                $tela->setDados($dao->toArray($distribuicao));
                $tela->processAssign();

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Alterar o Modo da Distribuiчуo do Processo");


                $response->addScript("FormUtil.initForm('formSaveTipoDistribuicao')");
                $response->addScript("GestaoProcessos.changeProcessTypeModo()");
                $response->addScript("jQuery('#formSaveTipoDistribuicao_criterio').trigger('change')");

                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveTipoDistribuicao_fkUsuario','#formSaveTipoDistribuicao_usuario')" );

                $modo = DAOTipoDistribuicao::verificaModo();
                if($modo['modo'] == 'A' && $modo['criterio'] == 'Por Assunto' ) {
                    $response->addScript("GestaoAssunto.execList()");
                }
                //$response->addScript("GestaoAssunto.execList()");

            } else {
                $msg = "O processo informado para alteraчуo nуo foi encontrado. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteraчуo de Processos','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informaчѕes necessсrias para alterar um usuсrio foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Alteraчуo de Processos','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>