<?php
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/processos/PrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstanciaDerivado.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/ProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/modelo/admin/entidade/cidades/Cidade.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/modelo/admin/entidade/historico/Historico.class.php';
require_once 'classes/modelo/admin/entidade/historico/DAOHistorico.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/procurador/Procurador.class.php';
require_once 'classes/modelo/admin/entidade/procurador/DAOProcurador.class.php';

class ExecEditProcessoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        $controlValidation = GestaoProcessos::validateRequestCad($rawRequest,true);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();


            $processo = new Processo();

            $processo->setIdProcesso($cleanRequest->get('idProcesso'));
            $processo->setDataEntrada(date("d/m/Y - H:i:s"));
            //$processo->setTipoProcesso($cleanRequest->get('tipoProcesso'));
            $processo->setFkUsuario($cleanRequest->get('fkUsuario'));
            $processo->setDescricao($cleanRequest->get('descricao'));
            $processo->setJustica($cleanRequest->get('justica'));
            $processo->setTipoAcao($cleanRequest->get('tipoAcao'));
            //$processo->setLitisconsorte($cleanRequest->get('litisconsorte'));
            $processo->setAssunto($cleanRequest->get('assunto'));
            $processo->setSituacaoProcesso($cleanRequest->get('situacaoProcesso'));
            $processo->setInstancia($cleanRequest->get('instancia'));



            $daoProcesso = new DAOProcesso();

            try {
                $dbConn = $daoProcesso->getDbConn();
                $dbConn->beginTrans();

                $daoProcesso->update($processo);


                //$total = $cleanRequest->get('total');
                $pessoa = $cleanRequest->get('nome');
                $adversa = $cleanRequest->get('nomeAdversa');
                $poloRepresentada = $cleanRequest->get('representada');
                $poloAdversa = $cleanRequest->get('adversa');
                //$response->addAlert($cleanRequest->get('nome'));

                foreach($pessoa as $nome) {

                    $individuo[] = $nome;

                }

                foreach($adversa as $nome) {

                    $indAdversa[] = $nome;

                }

                $processoPessoa = new ProcessoPessoa();
                $daoProcessoPessoa = new DAOProcessoPessoa();

                $novaPessoa = new Pessoa();
                $novaAdversa = new Pessoa();
                $daoNovaPessoa = new DAOPessoa();
                $daoNovaAdversa = new DAOPessoa();

                DAOProcessoPessoa::apagarPessoas($cleanRequest->get('idProcesso'));

                $i=0;
                while($i < count($pessoa)) {

                    $idPessoa = DAOPessoa::getPessoaId($individuo[$i]);
                    if($idPessoa == array()){
                        $novaPessoa->setNome($individuo[$i]);
                        $novaPessoa->setStatus(1);
                        $daoNovaPessoa->save($novaPessoa);
                        $idPessoa = DAOPessoa::getPessoaId($individuo[$i]);
                    }
                    $processoPessoa->setFkProcesso($cleanRequest->get('idProcesso'));
                    $processoPessoa->setFkPessoa($idPessoa);
                    $processoPessoa->setPolo($poloRepresentada);
                    $daoProcessoPessoa->save($processoPessoa);
                    $i++;
                }

                $i=0;
                while($i < count($adversa)) {

                    $idAdversa = DAOPessoa::getPessoaId($indAdversa[$i]);
                    if($idAdversa == array()){
                        $novaAdversa->setNome($indAdversa[$i]);
                        $novaAdversa->setStatus(1);
                        //$daoProcessoPessoa->save($novaAdversa);
                        $daoNovaAdversa->save($novaAdversa);
                        $idAdversa = DAOPessoa::getPessoaId($indAdversa[$i]);
                    }
                    $processoPessoa->setFkProcesso($processo->getIdProcesso());
                    $processoPessoa->setFkPessoa($idAdversa);
                    $processoPessoa->setPolo($poloAdversa);
                    $daoProcessoPessoa->save($processoPessoa);
                    $i++;
                }

                if($cleanRequest->get('instancia') == GestaoProcessos::TIPO_PRIMEIRA_INSTANCIA) {

                    $daoCidade = new DAOCidade();
                    $cidade = new Cidade();

                    $daoJuizo = new DAOJuizo();
                    $juizo = new Juizo();

                    if(($cleanRequest->get('novaCidade') != "") && ($cleanRequest->get('fkEstado')!= "") && ($cleanRequest->get('novoJuizo') != "")) {

                        $cidade->setNome($cleanRequest->get('novaCidade'));
                        $cidade->setFkEstado($cleanRequest->get('fkEstado'));
                        $daoCidade->save($cidade);

                        $juizo->setFkCidade($cidade->getIdCidade());
                        $response->addAlert($cidade->getIdCidade());
                        $juizo->setNome($cleanRequest->get('novoJuizo'));
                        $daoJuizo->save($juizo);

                        //$primeiraInstancia->setFkJuizo($juizo->getIdJuizo());

                        //$vetor['fkProcesso'] = $processo->getIdProcesso();
                        $vetor['fkJuizo'] = $juizo->getIdJuizo();


                    }else if ($cleanRequest->get('novoJuizo2')) {

                        $juizo->setFkCidade($cleanRequest->get('cidade'));
                        $juizo->setNome($cleanRequest->get('novoJuizo2'));
                        $daoJuizo->save($juizo);

                        //$primeiraInstancia->setFkJuizo($juizo->getIdJuizo());
                        //$vetor['fkProcesso'] = $processo->getIdProcesso();
                        $vetor['fkJuizo'] = $juizo->getIdJuizo();
                    }
                    else {
                        //$primeiraInstancia->setFkJuizo($cleanRequest->get('fkJuizo'));

                        //$vetor['fkProcesso'] = $processo->getIdProcesso();
                        $vetor['fkJuizo'] = $cleanRequest->get('fkJuizo');

                    }

                   // $daoPrimeiraInstancia->save($primeiraInstancia);

//                    $vetor['fkProcesso'] = $processo->getIdProcesso();
//                    $vetor['fkJuizo'] = $cleanRequest->get('fkJuizo');

                    $vetor['fkProcesso'] = $processo->getIdProcesso();
                    DAOPrimeiraInstancia::atualizarPrimeiraInstancia($vetor);

                } else if($cleanRequest->get('instancia') == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA ) {

                    $daoSegundaInstancia = new DAOSegundaInstancia();

                    $segundaInstancia = new SegundaInstancia();

                    $segundaInstancia->setTipoSegundaInstancia($cleanRequest->get('tipoSegundaInstancia'));

                    $segundaInstancia->setFkProcesso($processo->getIdProcesso());

                    $daoSegundaInstancia->update($segundaInstancia);

                }
                if($cleanRequest->get('tipoSegundaInstancia') == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA_DERIVADO) {

                    $vetor['fkSegundaInstancia'] = $cleanRequest->get('fkSegundaInstancia');
                    $vetor['fkPrimeiraInstancia'] = $cleanRequest->get('fkPrimeiraInstancia');
                    $vetor['primeiraInstancia'] = $cleanRequest->get('primeiraInstancia');

                    DAOSegundaInstanciaDerivado::atualizarSegundaInstancia($vetor);

                }

                if($processo->getIdProcesso() != ""){
                    $historico = new Historico;
                    $daoHistorico = new DAOHistorico();

                    

                    $historico->setDataHora(date("d/m/Y - H:i:s"));
                    $thisNumeroProcesso = DAOProcesso::getNumeroProcesso($processo->getIdProcesso());
                    $historico->setNumeroProcesso($thisNumeroProcesso['numeroProcesso']);

                    
                    $thisProcurador = DAOProcurador::getNomeProcuradorById($processo->getFkUsuario());
                   //$response->addAlert( $thisProcurador);
                   $historico->setProcurador($thisProcurador['nome']);
                   // $historico->setProcurador(DAOProcurador::getNomeProcuradorById($processo->getFkUsuario()));

                      


                    $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
                    $historico->setUsuario($usuarioLogado['nome']);
                    $historico->setTipo("&#8212;");
                    $historico->setOperacao("Alterado");

                    $daoHistorico->save($historico);
                }

                $dbConn->commitTrans();

                $response->addScript("FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $msg = "Alteração concluída com sucesso.";
                $response->addScript( "js.promptMenssage('Alteração de Processos','{$msg}',false)");
                $response->addScript( "GestaoProcessos.initList()");

            } catch ( Exception $e ) {
                $msg = "A alteração deste usuário não pôde ser concluída. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Alteração de Processos','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>