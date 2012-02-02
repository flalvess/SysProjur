<?php
require_once 'classes/modelo/admin/interface/movimentacoes/TelaCadMovimentacao.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';

class InitCadMovimentacaoAction extends AbstractAction {
    public function execute() {
        $response  = new AjaxResponse();
        
        $rawRequest = $this->getRequest();
        $controlValidation = GestaoProcessos::validateRequestInitAlt($rawRequest);
        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();


            $tela = new TelaCadMovimentacao();

            $idProc = $cleanRequest->get('idProcesso');
            $tela->setArea($cleanRequest->get('area'));
            $tela->processAssign($idProc);

            $response->addAssign("tela", "innerHTML", $tela->getHTML());
            $response->addAssign("tituloTela", "innerHTML", "Cadastro de Movimentacao");
            $response->addScript("FormUtil.initForm('formSaveMovimentacao')");
            $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formSaveMovimentacao_fkProcesso','#formSaveMovimentacao_processo')" );
            $response->addScript("GestaoProcessos.showCalendar('#formSaveMovimentacao_dataLimite')");

            $obj = DAOProcesso::getNumeroProcesso($idProc);
            $response->addScript("jQuery('#formSaveMovimentacao_processo').val('{$obj['numeroProcesso']}')");
            $response->addScript("jQuery('#formSaveMovimentacao_fkProcesso2').val('{$obj['idProcesso']}')");
        }

        $this->setResponse($response);
    }
}

?>