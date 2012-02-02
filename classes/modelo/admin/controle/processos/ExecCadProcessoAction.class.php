<?php
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/modelo/admin/entidade/processos/Processo.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/ProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/modelo/admin/entidade/procurador/Procurador.class.php';
require_once 'classes/modelo/admin/entidade/procurador/DAOProcurador.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/TipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/processos/PrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOPrimeiraInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstancia.class.php';
require_once 'classes/modelo/admin/entidade/processos/SegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOSegundaInstanciaDerivado.class.php';
require_once 'classes/modelo/admin/entidade/assunto/Assunto.class.php';
require_once 'classes/modelo/admin/entidade/assunto/DAOAssunto.class.php';
require_once 'classes/modelo/admin/entidade/cidades/Cidade.class.php';
require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/modelo/admin/entidade/historico/Historico.class.php';
require_once 'classes/modelo/admin/entidade/historico/DAOHistorico.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';

class ExecCadProcessoAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoProcessos::validateRequestCad($rawRequest);

        $idUsuario = ControleAcesso::getIdUsuarioOnline ();

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            

            $processo = new Processo();

            $processo->setNumeroProcesso($cleanRequest->get('numeroProcesso'));
            $processo->setDataEntrada(date("d/m/Y - H:i:s"));
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

                $modo = DAOTipoDistribuicao::verificaModo();

                if($modo['modo'] == 'M') { //Distribuição Manual
                    $processo->setFkUsuario($cleanRequest->get('fkUsuario'));
                    $usuario = $cleanRequest->get('usuario');
                    $thisProcurador = $cleanRequest->get('usuario');
                }
                else if ($modo['modo'] == 'A') { //Distribuição Automático
                    if($modo['criterio'] == 'Sequencial') { //Modo Sequencial

                        $proc = DAOProcurador::buscaIdProcurador();
                        $procurador = array();
                        foreach($proc as $pessoa) {
                            $procurador[] = $pessoa['idUsuario']; //Salva todos os IDs dos procuradores no vetor apartir do $procurador[0]
                        }

                        if(count($procurador) == 0) {

                            $response->addAlert("Erro: Não existem procuradores cadastrados!");

                        }else {

                            $totalProcurador = DAOProcurador::totalProcurador();
                            $totalAtual = DAOProcurador::totalAtual();

                            //if($totalProcurador['quantidade'] != $totalAtual['total']) {
                            //$response->addAlert($totalProcurador['quantidade']);
                            DAOProcurador::novaTotal($totalProcurador['quantidade'] - 1);
                            //$response->addAlert($totalProcurador['quantidade'] - 1);
                            //}
                            $posicao = DAOProcurador::posicaoAtual();

                            if($posicao['posicao'] == $totalAtual['total']) {
                                
                                $response->addAlert($posicao['posicao']);
                                $processo->setFkUsuario($procurador[$posicao['posicao']]);
                                if($totalAtual['total'] == 0) {
                                    DAOProcurador::novaPosicao(1);
                                }else {
                                    DAOProcurador::novaPosicao(0);
                                }
                            }else if ($posicao['posicao'] < $totalAtual['total']) {

                                $processo->setFkUsuario($procurador[$posicao['posicao']]);
                                DAOProcurador::novaPosicao($posicao['posicao'] + 1);

                            }else if($posicao['posicao'] > $totalAtual['total']) {

                                $processo->setFkUsuario($procurador[$totalAtual['total']]);
                                DAOProcurador::novaPosicao($totalAtual['total']);
                            }

                        }

                    }
                    else if($modo['criterio'] == 'Menos Processos') {
                        $proc = DAOProcurador::buscaIdProcurador();
                        $procurador = array();
                        foreach($proc as $pessoa) {
                            $procurador[] = $pessoa['idUsuario'];
                        }

                        $i=0;
                        while($i != count($procurador)) {
                            //$i++;
                            $quantPro[] = DAOProcurador::buscaQuantProcessos($procurador[$i]);
                            $i++;
                        }
                        $valor = min($quantPro);
                        $i=0;
                        while($i != count($quantPro)) {
                            //$i++;
                            if($valor == $quantPro[$i]) {
                                $processo->setFkUsuario($procurador[$i]);
                                break;
                            }
                            $i++;
                        }

                    }
                    else if($modo['criterio'] == 'Por Assunto') {
                        $resultadoAssunto = DAOAssunto::verificaAssunto($cleanRequest->get('assunto'));

                        $proc = DAOProcurador::buscaIdProcurador();
                        $procurador = array();
                        foreach($proc as $pessoa) {
                            $procurador[] = $pessoa['idUsuario'];
                        }

                        if($resultadoAssunto == false) {

                            $quant = count($procurador);
                            $id = rand(0, $quant-1);
                            $processo->setFkUsuario($procurador[$id]);
                            //$processo->setFkUsuario($id['idUsuario']);
                        }
                        else {
                            foreach($resultadoAssunto as $id) {
                                $i = $id['fkProcurador'];
                            }
                            $processo->setFkUsuario($i['fkProcurador']);
                        }
                    }
                }

                $daoProcesso->save($processo);


                //$total = $cleanRequest->get('total');
                $pessoa = $cleanRequest->get('nome');
                $adversa = $cleanRequest->get('nomeAdversa');
                $poloRepresentada = $cleanRequest->get('representada');
                $poloAdversa = $cleanRequest->get('adversa');
                
//                if($cleanRequest('ativoRepresentada') != ""){
//                    $poloRepresentada = $cleanRequest('ativoRepresentada');
//                    $poloAdversa = $cleanRequest('passivoAdversa');
//                }else if($cleanRequest('passivoRepresentada') != ""){
//                    $poloRepresentada = $cleanRequest('passivoRepresentada');
//                    $poloAdversa = $cleanRequest('ativoAdversa');
//                }
               

                foreach($pessoa as $nome) {

                    $individuo[] = $nome;

                }
                
                foreach($adversa as $nome) {

                    $indAdversa[] = $nome;

                }



                $processoPessoa = new ProcessoPessoa();
                $daoProcessoPessoa = new DAOProcessoPessoa();

                $i=0;
                while($i < count($pessoa)) {

                    $idPessoa = DAOPessoa::getPessoaId($individuo[$i]);
                    $processoPessoa->setFkProcesso($processo->getIdProcesso());
                    $processoPessoa->setFkPessoa($idPessoa);
                    $processoPessoa->setPolo($poloRepresentada);
                    $daoProcessoPessoa->save($processoPessoa);
                    $i++;
                }

                $i=0;
                while($i < count($adversa)) {

                    $idAdversa = DAOPessoa::getPessoaId($indAdversa[$i]);
                    $processoPessoa->setFkProcesso($processo->getIdProcesso());
                    $processoPessoa->setFkPessoa($idAdversa);
                    $processoPessoa->setPolo($poloAdversa);
                    $daoProcessoPessoa->save($processoPessoa);
                    $i++;
                }

                if($cleanRequest->get('instancia') == GestaoProcessos::TIPO_PRIMEIRA_INSTANCIA) {

                    $daoPrimeiraInstancia = new DAOPrimeiraInstancia();
                    $primeiraInstancia = new PrimeiraInstancia();

                    $daoCidade = new DAOCidade();
                    $cidade = new Cidade();

                    $daoJuizo = new DAOJuizo();
                    $juizo = new Juizo();

                    $primeiraInstancia->setFkProcesso($processo->getIdProcesso());

                    if(($cleanRequest->get('novaCidade') != "") && ($cleanRequest->get('fkEstado')!= "") && ($cleanRequest->get('novoJuizo') != "")) {

                        $cidade->setNome($cleanRequest->get('novaCidade'));
                        $cidade->setFkEstado($cleanRequest->get('fkEstado'));
                        $daoCidade->save($cidade);

                        $juizo->setFkCidade($cidade->getIdCidade());
                        $response->addAlert($cidade->getIdCidade());
                        $juizo->setNome($cleanRequest->get('novoJuizo'));
                        $daoJuizo->save($juizo);

                        $primeiraInstancia->setFkJuizo($juizo->getIdJuizo());


                    }else if ($cleanRequest->get('novoJuizo2')) {

                        $juizo->setFkCidade($cleanRequest->get('cidade'));
                        $juizo->setNome($cleanRequest->get('novoJuizo2'));
                        $daoJuizo->save($juizo);

                        $primeiraInstancia->setFkJuizo($juizo->getIdJuizo());
                    }
                    else {
                        $primeiraInstancia->setFkJuizo($cleanRequest->get('fkJuizo'));
                    }

                    $daoPrimeiraInstancia->save($primeiraInstancia);

                } else if($cleanRequest->get('instancia') == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA) {

                    $daoSegundaInstancia = new DAOSegundaInstancia();
                    $segundaInstancia = new SegundaInstancia();

                    $segundaInstancia->setTipoSegundaInstancia($cleanRequest->get('tipoSegundaInstancia'));
                    $segundaInstancia->setFkProcesso($processo->getIdProcesso());

                    $daoSegundaInstancia->save($segundaInstancia);


                }
                if($cleanRequest->get('tipoSegundaInstancia') == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA_DERIVADO) {

                    $daoSegundaInstanciaDerivado = new DAOSegundaInstanciaDerivado();
                    $segundaInstanciaDerivado = new SegundaInstanciaDerivado();

                    $segundaInstanciaDerivado->setFkSegundaInstancia($segundaInstancia->getIdSegundaInstancia());
                    $segundaInstanciaDerivado->setFkPrimeiraInstancia($cleanRequest->get('fkPrimeiraInstancia'));

                    $daoSegundaInstanciaDerivado->save($segundaInstanciaDerivado);

                }
                

                if($processo->getNumeroProcesso() != ""){
                    $historico = new Historico;
                    $daoHistorico = new DAOHistorico();

                    $historico->setDataHora(date("d/m/Y - H:i:s"));
                    $historico->setNumeroProcesso($processo->getNumeroProcesso());
                    if($thisProcurador != ""){
                         $historico->setProcurador($thisProcurador);
                    }else{
                        $thisProcurador= DAOProcurador::getNomeProcuradorById($processo->getFkUsuario());
                        $historico->setProcurador($thisProcurador['nome']);
                    }

                    $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
                    $historico->setUsuario($usuarioLogado['nome']);
                    $historico->setTipo("Distribuição");
                    $historico->setOperacao("Cadastrado");

                    $daoHistorico->save($historico);
                   

                    
                }

                $dbConn->commitTrans();

                $msg = "Cadastro concluído com sucesso.";
                $response->addScript( "FormUtil.resetErrors('{$rawRequest->getFormId()}')");
                $response->addScript( "js.promptMenssage('Cadastro de Processos','{$msg}',false)");
                $response->addScript( "GestaoProcessos.initList()");

            } catch ( Exception $e ) {
                $response->addAlert(Util::debugVar($e));
                $dbConn->rollBackTrans();
                $msg = "O cadastro deste usuário não pôde ser concluído. Recomece do inicio.";
                $response->addScript( "js.promptMenssage('Cadastro de Processos','{$msg}',true)");
            }
        } else {
            $response->prepare($controlValidation->getErrors(), $rawRequest->getFormId());
        }

        $this->setResponse($response);
    }
}

?>