<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/interface/processos/TelaCadProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/PrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOUsuario.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/ProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';

class InitEditProcessoAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoProcessos::validateRequestInitAlt($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();
            $idProcesso = $cleanRequest->get("idProcesso");

            $dao = new DAOProcesso();
            $processo = new Processo();
            $primeiraInstancia = new PrimeiraInstancia();
            $segundaInstancia = new SegundaInstancia();

            $processo->setIdProcesso($idProcesso);
            $primeiraInstancia->setFkProcesso($idProcesso);
            $segundaInstancia->setFkProcesso($idProcesso);

            $dao->load($processo);

            if ($processo->isLoaded()) {

                $dao->load($primeiraInstancia);
                $dao->load($segundaInstancia);

                $primeiraInstancia = DAOProcesso::buscarPrimeiraInstancia($idProcesso);
                $segundaInstancia = DAOProcesso::buscarSegundaInstancia($idProcesso);


//                $response->addAlert($primeiraInstancia['cidade']);
//                $response->addAlert($primeiraInstancia['idJuizo']);
//                $response->addAlert($primeiraInstancia['idCidade']);

                $tela = new TelaCadProcesso();
                $tela->setDados($dao->toArray($processo),$primeiraInstancia, $segundaInstancia);
                $tela->processAssign();

                $idUser = $processo->getFkUsuario();

                $obj = DAOUsuario::getNomeUsuarioById($idUser);
                $obj2 = DAOProcesso::numeroProcesso($idProcesso);
                $obj3 = DAOProcesso::idPrimeiraInstancia($idProcesso);
                foreach($obj3 as $teste) {
                    $obj4 = $teste['fkPrimeiraInstancia'];
                }

                //$quant = count($primeiraInstancia);
//                if(count($primeiraInstancia) > 0) {
//                    foreach($primeiraInstancia as $p) {
//                        $obj5 = $p['idJuizo'];
//                    }
//
//
//
//
//                    $cidade = DAOJuizo::buscarCidade($obj5['idJuizo']);
//
//                    foreach($cidade as $c) {
//                        $obj6 = $c['idCidade'];
//                    }
//                }



                $pessoas = DAOProcesso::buscarPessoas($idProcesso, 'Representada');
                $adversas = DAOProcesso::buscarPessoas($idProcesso, 'Adversa');
                foreach($pessoas as $nome) {
                    $individuo[] = $nome['nome'];
                    $poloR = $nome['polo'];
                    //$response->addAlert($nome['polo']);
                }

                foreach($adversas as $nome) {
                    $indAdversa[] = $nome['nome'];
                    $poloA = $nome['polo'];
                    //$response->addAlert($nome['polo']);

                }

                $response->addAssign("tela", "innerHTML", $tela->getHTML());
                $response->addAssign("tituloTela", "innerHTML", "Edição de Processos");
                $response->addScript("GestaoProcessos.changeProcessType()");
                $response->addScript("GestaoProcessos.changePrimeiraInstancia()");
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios()" );
                $response->addScript("FormUtil.initForm('formSaveProcesso')");
                $response->addScript("jQuery('#formSaveProcesso_usuario').val('{$obj['nome']}')");
                $response->addScript("jQuery('#formSaveProcesso_primeiraInstancia').val('{$obj2['numeroProcesso']}')");
                if(count($obj3) > 0) {
                    $response->addScript("jQuery('#formSaveProcesso_fkPrimeiraInstancia').val('{$obj4}')");
                }
                $response->addScript("GestaoUsuarios.initAutoCompleteUsuarios('#formSaveProcesso_fkUsuario','#formSaveProcesso_usuario')" );
                $response->addScript("GestaoPessoas.initAutoCompletePessoas('#formSaveProcesso_pessoa','#formSaveProcesso_pessoa')" );
                $response->addScript("GestaoPessoas.initAutoCompletePessoas('#formSaveProcesso_parteAdversa','#formSaveProcesso_parteAdversa')" );
                $response->addScript("GestaoPrimeiraInstancia.initAutoCompletePrimeiraInstancia('#formSaveProcesso_fkPrimeiraInstancia','#formSaveProcesso_primeiraInstancia')" );

                if(count($primeiraInstancia)) {
                    //$response->addScript("jQuery('#formSaveProcesso_cidade').val('{$obj6['idCidade']}')");
                    $response->addScript("jQuery('#formSaveProcesso_cidade').val('{$primeiraInstancia['idCidade']}')");

                    $response->addScript("jQuery('#formSaveProcesso_cidade').trigger('change')");
                    //$response->addScript("window.setTimeout(function() { jQuery('#formSaveProcesso_fkJuizo').val({$obj5['idJuizo']});}, 800);");
                    $response->addScript("window.setTimeout(function() { jQuery('#formSaveProcesso_fkJuizo').val({$primeiraInstancia['idJuizo']});}, 800);");
                }

                $response->addScript("reset()");
                $response->addScript("resetAdversa()");
                $i=0;
                while($i < count($pessoas)) {
                    $response->addScript("adiciona('{$individuo[$i]}')");
                    $i++;

                }

                $i=0;
                while($i < count($adversas)) {
                    $response->addScript("adicionaAdversa('{$indAdversa[$i]}')");
                    $i++;

                }

                if($poloR == "ativoRepresentada") {
                    $response->addScript("jQuery('#ativoRepresentada').attr('checked','checked')");
                    $response->addScript("GestaoProcessos.mudaPolo('ativoR')");

                }else if($poloR == "passivoRepresentada") {
                    $response->addScript("jQuery('#passivoRepresentada').attr('checked','checked')");
                    $response->addScript("GestaoProcessos.mudaPolo('passivoR')");

                }

            } else {
                $msg = "O processo informado para alteração não foi encontrado. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteração de Processos','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informações necessárias para alterar um usuário foram informadas incorretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Alteração de Processos','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>