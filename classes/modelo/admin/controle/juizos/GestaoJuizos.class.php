<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';

class GestaoJuizos {
    const NUM_ITENS = 10;

    public function getCamposOrdemLista($formatMap = FALSE) {
        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbjuizo.idJuizo";
        $map ['1'] ['label'] = "Juizo";
        $map ['1'] ['campo'] = "tbjuizo.nome";
        $map ['2'] ['label'] = "Cidade";
        $map ['2'] ['campo'] = "tbcidade.nome";


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

            $controlValidation->addValidator(new InteiroPositivoValidator("idJuizo", "Falta informar o usuário que será alterado."));
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("nome", "O NOME deve ser informado."));
        $controlValidation->addValidator(new InteiroPositivoValidator("fkCidade", "A SIGLA deve ser informado."));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator(new NoValidator("juizo", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator(new NoValidator("pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idJuizo", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idJuizos", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idJuizo", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function getMapCidade() {
        return DAOJuizo::getMapCidade ();
    }

    public static function filtroBasico($params) {
        $juizo = (isset($params ['juizo'])) ? ($params ['juizo']) : ("");
        //$ordem = (isset($params ['ordem'])) ? ($params ['ordem']) : (0);
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "1=1";
        $strWhere .= ($ordem == 1) ? (" and tbjuizo.nome like '{$juizo}%'") : ("");
        $strWhere .= ($ordem == 2) ? (" and tbcidade.nome like '{$juizo}%'") : ("");

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }
        
        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbjuizo";
        $filtro ['campos'] = "tbjuizo.*, tbcidade.nome cidade";
        $filtro ['join'] = "inner join tbcidade on tbcidade.idCidade = tbjuizo.fkCidade ";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }
}

?>