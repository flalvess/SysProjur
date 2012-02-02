<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';

class GestaoSubstituicoes {
    const NUM_ITENS = 10;

    public function getCamposOrdemLista($formatMap = FALSE) {

        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbsubstituicao_procurador.idSubstituicaoProcurador";
        $map ['1'] ['label'] = "Número do Processo";
        $map ['1'] ['campo'] = "p.numeroProcesso";
        $map ['2'] ['label'] = "Procurador Original";
        $map ['2'] ['campo'] = "original";
        $map ['3'] ['label'] = "Procurador substituto";
        $map ['3'] ['campo'] = "substituto";



        $result = $map;
        
        if ($formatMap) {
            $result = ListagemUtil::formatMapLista ( $map );
        }

        return $result;
    }


    private function getCampoOrdem($indice) {
        $map = self::getCamposOrdemLista();

        return $map [$indice] ['campo'];
    }

    public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {
            $controlValidation->addValidator(new InteiroPositivoValidator("idSubstituicoes", "Falta informar o usuário que será alterado."));
        }

        $controlValidation->addValidator(new InteiroPositivoValidator("processo", "O PROCESSO deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("temporaria", "Escolha se a SUBSTITUIÇÃO é temporária"));
        $controlValidation->addValidator(new StringNotEmptyValidator("usuario", "Informe o novo PROCURADOR"));
        $controlValidation->addValidator(new NoValidator("motivo", ""));
        $controlValidation->addValidator(new NoValidator("obs", ""));
        $controlValidation->addValidator(new InteiroPositivoValidator("fkUsuario", "O PROCURADOR deve ser informado."));
        $controlValidation->addValidator(new InteiroPositivoValidator("fkUsuarioOriginal", "O PROCURADOR deve ser informado."));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator(new NoValidator("substituicao", ""));
        $controlValidation->addValidator(new NoValidator("pag", ""));
        //$controlValidation->addValidator(new NoValidator("processo", ""));
        $controlValidation->addValidator(new NoValidator("ordem", ""));
        $controlValidation->addValidator(new NoValidator("sentido", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idSubstituicoes", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idSubstituicoes", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestMudaStatus($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new NoValidator("idSubstituicoes", ""));
        $controlValidation->addValidator(new NoValidator("status", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idProcesso", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateReqCompSubstituicoes($rawRequest) {
        $controlValidation = new ValidationFacade ( );

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

        $controlValidation->validate ( $rawRequest );

        return $controlValidation;
    }

    public static function getMapCargo() {
        return DAOCargo::getMap ();
    }

    public static function getMapCampus() {
        return DAOCampus::getMap ();
    }

    public static function mudaStatus($idSubstituicoes, $status) {
        if ($status == 1) {
            $novoStatus = 0;
        } else {
            $novoStatus = 1;
        }

        $dao = new DAOSubstituicoes();
        $result ['ok'] = $dao->mudaStatus($idSubstituicoes, $novoStatus);
        $result ['status'] = $novoStatus;

        return $result;
    }

    public static function deleteFunc($idSubstituicoes) {
        $dao = new DAOSubstituicoes();
        return $dao->deleteFunc($idSubstituicoes);
    }

    public static function filtroBasico($params) {

        $substituicao = (isset($params ['substituicao'])) ? ($params ['substituicao']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "p.idProcesso <> 0";
        $strWhere .= ($ordem == 1) ? (" and (p.numeroProcesso like '{$substituicao}%')") : ("");
        $strWhere .= ($ordem == 2) ? (" and (uoriginal.nome like '{$substituicao}%')") : ("");
        $strWhere .= ($ordem == 3) ? (" and (u.nome like '{$substituicao}%')") : ("");
        
        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbprocesso p";
        $filtro ['campos'] = "tbsubstituicao_procurador.idSubstituicaoProcurador, tbsubstituicao_procurador.temporaria, tbsubstituicao_procurador.motivoSubstituicao, tbsubstituicao_procurador.observacao,   p.idProcesso, p.numeroProcesso, u.nome substituto, uoriginal.nome original, ui.nome origInicial";
        $filtro ['join'] = "left join tbsubstituicao_procurador on tbsubstituicao_procurador.processo = p.idProcesso 
                            left join stbusuarioinfo u on tbsubstituicao_procurador.procuradorSubstituto = u.idUsuario
                            left join stbusuarioinfo uoriginal on tbsubstituicao_procurador.procuradorOriginal = uoriginal.idUsuario  
                            left join stbusuarioinfo ui on p.fkUsuario = ui.idUsuario";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }
    public static function getlistSubstituicoes($idProcesso=null,$type="in") {
        return DAOSubstituicoes::getlistSubstituicoes($idProcesso,$type);
    }
}

?>