<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/controle/validacao/DataValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/FloatNaoNegativoValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/TipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/distribuicao/DAOTipoDistribuicao.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/controle/processos/NumeroUnicoProcessoValidator.class.php';
//require_once 'classes/modelo/admin/controle/processos/NumeroProcessoValidator.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class GestaoProcessos {
    const NUM_ITENS = 10;
    const TIPO_PRIMEIRA_INSTANCIA = "1º Instancia";
    const TIPO_SEGUNDA_INSTANCIA = "2º Instancia";
    const TIPO_SEGUNDA_INSTANCIA_DERIVADO = "Derivado";

    public function getCamposOrdemLista($formatMap = FALSE) {

        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbprocesso.idProcesso";
        $map ['1'] ['label'] = "Número";
        $map ['1'] ['campo'] = "tbprocesso.numeroProcesso";
        $map ['2'] ['label'] = "Justiça";
        $map ['2'] ['campo'] = "tbprocesso.justica";
        $map ['3'] ['label'] = "Instancia";
        $map ['3'] ['campo'] = "tbprocesso.instancia";
        $map ['4'] ['label'] = "Data de Entrada";
        $map ['4'] ['campo'] = "tbprocesso.dataEntrada";

        $result = $map;

        if ($formatMap) {
            $result = ListagemUtil::formatMapLista ( $map );
        }

        return $result;
    }

    public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {

            $controlValidation->addValidator(new InteiroPositivoValidator("idProcesso", "Falta informar o processo que será alterado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("numeroProcesso", "O NÚMERO deve ser informado."));
            $controlValidation->addValidator(new InteiroPositivoValidator("fkUsuario", "O PROCURADOR deve ser informado."));

            if($rawRequest->getForValidation ( 'tipoSegundaInstancia' ) == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA_DERIVADO) {
                // $controlValidation->addValidator(new StringNotEmptyValidator("primeiraInstancia", "A PRIMEIRA deve ser informado."));
                $controlValidation->addValidator(new InteiroPositivoValidator("fkSegundaInstancia", "A SEGUNDA INSTANCIA deve ser informado."));
                $controlValidation->addValidator(new InteiroPositivoValidator("fkPrimeiraInstancia", "A PRIMEIRA INSTANCIA deve ser informado."));
            }
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("numeroProcesso", "O NÚMERO deve ser informado."));
//        if($rawRequest->getForValidation ( 'numeroProcesso' ) != "") {
//            $controlValidation->addValidator(new NumeroProcessoValidator("numeroProcesso", "O NÚMERO deve ter 14 dígitos."));
//        }
        //$controlValidation->addValidator(new StringNotEmptyValidator("tipoProcesso", "O TIPO DO PROCESSO deve ser informado."));
        //$controlValidation->addValidator(new ArrayValidator("total", "O PARTE deve ser informado."));
       
        $controlValidation->addValidator(new StringNotEmptyValidator("descricao", "A DESCRIÇÃO deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("justica", "A JUSTIÇA deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("instancia", "A INSTÂNCIA deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("tipoAcao", "O TIPO DA AÇÃO deve ser informado."));
        //$controlValidation->addValidator(new StringNotEmptyValidator("litisconsorte", "O LITISCONSORTE deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("assunto", "O ASSUNTO deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("situacaoProcesso", "A SITUAÇÃO DO PROCESSO deve ser informado."));
         $controlValidation->addValidator(new ArrayValidator("nome", "A PARTE REPRESENTADA deve ser informado."));
         $controlValidation->addValidator(new ArrayValidator("nomeAdversa", "A PARTE ADVERSA deve ser informado."));
          
          $controlValidation->addValidator(new NoValidator("representada", "A PRIMEIRA INSTANCIA deve ser informado."));
          $controlValidation->addValidator(new NoValidator("adversa", "A PRIMEIRA INSTANCIA deve ser informado."));
//          $controlValidation->addValidator(new NoValidator("ativoRepresentada", "A PRIMEIRA INSTANCIA deve ser informado."));
//          $controlValidation->addValidator(new NoValidator("ativoAdversa", "A PRIMEIRA INSTANCIA deve ser informado."));
//          $controlValidation->addValidator(new NoValidator("passivoRepresentada", "A PRIMEIRA INSTANCIA deve ser informado."));
//          $controlValidation->addValidator(new NoValidator("passivoAdversa", "A PRIMEIRA INSTANCIA deve ser informado."));

        $modo = DAOTipoDistribuicao::verificaModo();
        if($modo['modo'] == 'M') {

            $controlValidation->addValidator(new InteiroPositivoValidator("fkUsuario", "Escolha um procurador."));
            $controlValidation->addValidator(new StringNotEmptyValidator("usuario", "O PROCURADOR deve ser informado."));
        }

        if($rawRequest->getForValidation ( 'instancia' ) == GestaoProcessos::TIPO_PRIMEIRA_INSTANCIA) {
            if($rawRequest->getForValidation ( 'novaCidade' ) != ""){
                 $controlValidation->addValidator(new StringNotEmptyValidator("novaCidade", "O PROCURADOR deve ser informado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("novoJuizo", "O PROCURADOR deve ser informado."));
             $controlValidation->addValidator(new InteiroPositivoValidator("fkEstado", "O JUIZO deve ser informado."));
            }
            else if($rawRequest->getForValidation ( 'novoJuizo2' ) != ""){
                $controlValidation->addValidator(new InteiroPositivoValidator("cidade", "O JUIZO deve ser informado."));
                $controlValidation->addValidator(new StringNotEmptyValidator("novoJuizo2", "O PROCURADOR deve ser informado."));
            }
            else{
                $controlValidation->addValidator(new InteiroPositivoValidator("fkJuizo", "O JUIZO deve ser informado."));
                $controlValidation->addValidator(new InteiroPositivoValidator("cidade", "O JUIZOc deve ser informado."));

            }

//            $controlValidation->addValidator(new InteiroPositivoValidator("fkJuizo", "O JUIZO deve ser informado."));
//            $controlValidation->addValidator(new InteiroPositivoValidator("cidade", "O JUIZO deve ser informado."));
//            $controlValidation->addValidator(new StringNotEmptyValidator("novaCidade", "O PROCURADOR deve ser informado."));
//            $controlValidation->addValidator(new StringNotEmptyValidator("novoJuizo", "O PROCURADOR deve ser informado."));
//            $controlValidation->addValidator(new StringNotEmptyValidator("novoJuizo2", "O PROCURADOR deve ser informado."));
//             $controlValidation->addValidator(new InteiroPositivoValidator("fkEstado", "O JUIZO deve ser informado."));

        }

        if($rawRequest->getForValidation ( 'instancia' ) == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA) {
            $controlValidation->addValidator(new StringNotEmptyValidator("tipoSegundaInstancia", "O TIPO DA SEGUNDA INSTANCIA deve ser informado."));

        }

        if($rawRequest->getForValidation ( 'tipoSegundaInstancia' ) == GestaoProcessos::TIPO_SEGUNDA_INSTANCIA_DERIVADO) {
            //$controlValidation->addValidator(new StringNotEmptyValidator("primeiraInstancia", "A PRIMEIRA deve ser informado."));
            $controlValidation->addValidator(new InteiroPositivoValidator("primeiraInstancia", "A PRIMEIRA INSTANCIA deve ser informado."));
            //  $controlValidation->addValidator(new InteiroPositivoValidator("fkSegundaInstancia", "A segunda deve ser informado."));
            $controlValidation->addValidator(new NoValidator("fkPrimeiraInstancia", "A PRIMEIRA INSTANCIA deve ser informado."));
        }

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "numeroProcesso", ""));
        //$controlValidation->addValidator ( new NoValidator ( "idProcesso", ""));
        $controlValidation->addValidator ( new NoValidator ( "tipoProcesso", ""));
        $controlValidation->addValidator ( new NoValidator ( "descricao", ""));
        $controlValidation->addValidator ( new NoValidator ( "justica", ""));
        $controlValidation->addValidator ( new NoValidator ( "instancia", ""));
        $controlValidation->addValidator ( new NoValidator ( "dataEntrada", ""));
        $controlValidation->addValidator ( new NoValidator ( "tipoAcao", ""));
        $controlValidation->addValidator ( new NoValidator ( "litisconsorte", ""));
        $controlValidation->addValidator ( new NoValidator ( "assunto", ""));
        $controlValidation->addValidator ( new NoValidator ( "situacaoProcesso", ""));
        $controlValidation->addValidator ( new NoValidator ( "processo", ""));
        //$controlValidation->addValidator ( new NoValidator ( "fkProcurador", ""));
        $controlValidation->addValidator ( new NoValidator ( "fkUsuario", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idProcesso", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idProcessos", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }


    public static function validateReqCompProcessos($rawRequest) {
        $controlValidation = new ValidationFacade ( );

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

        $controlValidation->validate ( $rawRequest );

        return $controlValidation;
    }


    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idProcesso", ""));
        $controlValidation->addValidator(new NoValidator("area", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAltModo($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idTipoDistribuicao", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function getMapPrimeira() {
        return DAOProcesso::getMapPrimeira();
    }

    public static function getMapSegunda() {
        return DAOProcesso::getMapSegunda();
    }

    public static function deleteProcesso($idProcesso) {
        $dao = new DAOProcesso();
        return $dao->deleteProcesso($idProcesso);
    }

    public static function filtroBasico($params) {

        $processo = (isset($params ['processo'])) ? ($params ['processo']) : ("");
        $dataEntrada = (isset($params ['dataEntrada'])) ? ($params ['dataEntrada']) : ("");
        $procurador = (isset($params ['procurador'])) ? ($params ['procurador']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);


        unset($params);

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
        if (count ( $usuarioGrupo ) > 0) {
            foreach ( $usuarioGrupo as $nome ) {
                $grupo = $nome['nome'];
            }
        }

        $strWhere = "1=1";
        $strWhere .= ($ordem == 1) ? (" and (tbprocesso.numeroProcesso like '{$processo}%')") : ("");
//        $strWhere .= ($ordem == 1) ? (" and (tbpessoa.nome like '{$pessoa}%')") : ("");
//        $strWhere .= ($ordem == 2) ? (" and (tbpessoa.nome like '{$pessoa}%')") : ("");
//        $strWhere .= ($ordem == 3) ? (" and (tbpessoa.nome like '{$pessoa}%')") : ("");
        $strWhere .= ($ordem == 2) ? (" and (tbprocesso.justica like '{$processo}%')") : ("");
        $strWhere .= ($ordem == 3) ? (" and (tbprocesso.instancia like '{$processo}%')") : ("");
        $strWhere .= ($ordem == 4) ? (" and (tbprocesso.dataEntrada like '{$processo}%')") : ("");
        //$strWhere .= (!empty ($data)) ? (" and (tbprocesso.dataEntrada like '{$data}%')") : ("");
        //$strWhere .= ((!empty ($teste)) && (empty($ordem))) ? (" and (tbprocesso.dataEntrada like '{$teste}%')") : ("");
        //$strWhere .= (!empty($data)) ? (" and (tbprocesso.dataEntrada like '{$data}%')") : ("");
        $strWhere .= (!empty ($dataEntrada)) ? (" and (tbprocesso.dataEntrada like  '{$dataEntrada}%')") : ("");
        $strWhere .= (!empty ($procurador)) ? (" and (tbprocesso.fkUsuario like  '{$procurador}%')") : ("");
        //$strWhere .= ($ordem == 7) ? (" and (tbprocesso.tipoAcao like '{$processo}%')") : ("");
        //$strWhere .= ($ordem == 8) ? (" and (tbprocesso.litisconsorte like '{$processo}%')") : ("");
//        $strWhere .= ($ordem == 8) ? (" and (tbpessoa.parte like '{$pessoa}%')") : ("");
//        $strWhere .= ($ordem == 9) ? (" and (tbpessoa.parte like '{$pessoa}%')") : ("");
//        $strWhere .= ($ordem == 10) ? (" and (tbpessoa.parte like '{$pessoa}%')") : ("");


//        if($grupo != "Apoio") {
//            $strWhere .=" and tbprocesso.fkUsuario = '{$usuarioLogado['idUsuario']}'";
//        }else {
//            $strWhere .=" and tbprocesso.fkUsuario <> '{$usuarioLogado['idUsuario']}'";
//        }

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbprocesso";
        //$filtro ['campos'] = "tbprocesso.*, stbusuario.*, stbusuarioinfo.*, tbprimeira_instancia.*, tbsegunda_instancia.*";
        $filtro ['campos'] = "tbprocesso.idProcesso, tbprocesso.numeroProcesso, tbprocesso.justica, tbprocesso.instancia, tbprocesso.dataEntrada, tbprocesso.tipoAcao,stbusuarioinfo.nome";
        $filtro ['join'] = "inner join stbusuario on tbprocesso.fkUsuario = stbusuario.idUsuario
                            inner join stbusuarioinfo on stbusuarioinfo.idUsuario = stbusuario.idUsuario
							LEFT OUTER JOIN tbprimeira_instancia ON tbprimeira_instancia.fkProcesso = tbprocesso.idProcesso
                                                        LEFT OUTER JOIN tbsegunda_instancia ON tbsegunda_instancia.fkProcesso = tbprocesso.idProcesso
                                                        ";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }
}

?>
