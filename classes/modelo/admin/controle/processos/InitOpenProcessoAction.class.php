<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/processos/TelaOpenProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/PrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOUsuario.class.php';

class InitOpenProcessoAction extends AbstractAction {
    public function execute() {
        
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoProcessos::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idProcesso = $cleanRequest->get("idProcesso");
            $area = $cleanRequest->get("area");

            $dao = new DAOProcesso();
            $processo = new Processo();
            $primeiraInstancia = new PrimeiraInstancia();
            $segundaInstancia = new SegundaInstancia();

            $processo->setIdProcesso($idProcesso);
            $primeiraInstancia->setFkProcesso($idProcesso);
            $segundaInstancia->setFkProcesso($idProcesso);
            $dao->load($processo);

            if ($processo->isLoaded()) {

                $tela = new TelaOpenProcesso();

                $primeiraInstancia = DAOProcesso::buscarPrimeiraInstancia($idProcesso);
                $segundaInstancia = DAOProcesso::buscarSegundaInstancia($idProcesso);

                $tela->setDados($dao->toArray($processo),$primeiraInstancia, $segundaInstancia);
                $tela->setArea($area);
                $tela->processAssign();

                $idUser = $processo->getFkUsuario();

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Visualizaчуo do Processo");
                $response->addScript("GestaoProcessos.changeProcessType()");
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios()" );
                $response->addScript("FormUtil.initForm('formSaveProcesso')");
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveProcesso_fkUsuario','#formSaveProcesso_usuario')" );
                $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formListOpenProcesso_fkProcesso','#formListOpenProcesso_processo')" );
                $response->addScript("GestaoMovimentacao.execList()" );
                
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