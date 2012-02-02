<?php
require_once 'classes/modelo/admin/interface/processos/TelaCadProcesso.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';

class InitCadProcessoAction extends AbstractAction {
    public function execute() {
        $response	= new AjaxResponse();

        $tela = new TelaCadProcesso();
        $tela->processAssign();

        $response->addAssign("tela", "innerHTML", $tela->getHTML());
        $response->addAssign("tituloTela", "innerHTML", "Cadastro de Processos");
        $response->addScript("FormUtil.initForm('formSaveProcesso')");
        $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveProcesso_fkUsuario','#formSaveProcesso_usuario')" );
        $response->addScript("GestaoPrimeiraInstancia.initAutoCompletePrimeiraInstancia('#formSaveProcesso_fkPrimeiraInstancia','#formSaveProcesso_primeiraInstancia')" );
        $response->addScript("GestaoProcessos.initAutoCompleteProcessos('#formSaveProcesso_fkProcesso','#formSaveProcesso_processo')" );
        //$response->addScript("GestaoImpetrados.initAutoCompleteImpetrados('#formSaveProcesso_fkImpetrado','#formSaveProcesso_impetrado')" );
        $response->addScript("GestaoPessoas.initAutoCompletePessoas('#formSaveProcesso_pessoa','#formSaveProcesso_pessoa')" );
        $response->addScript("GestaoPessoas.initAutoCompletePessoas('#formSaveProcesso_parteAdversa','#formSaveProcesso_parteAdversa')" );
 
        $response->addScript("GestaoAssunto.initAutoCompleteAssunto('#formSaveProcesso_assunto','#formSaveProcesso_assunto')" );

        
        $this->setResponse($response);
    }
}

?>