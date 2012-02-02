<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
//require_once 'classes/modelo/admin/entidade/cidades/DAOCidade.class.php';
require_once 'classes/modelo/admin/entidade/assunto/DAOAssunto.class.php';

class GestaoAssunto {
    const NUM_ITENS = 10;

    public function getCamposOrdemLista($formatMap = FALSE) {
        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbassunto.idAssunto";
        $map ['1'] ['label'] = "Assunto";
        $map ['1'] ['campo'] = "tbassunto.assunto";
        $map ['2'] ['label'] = "Procurador";
        $map ['2'] ['campo'] = "stbusuarioinfo.nome";

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

            $controlValidation->addValidator(new InteiroPositivoValidator("idCidade", "Falta informar o usuário que será alterado."));
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("nome", "O NOME deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("fkEstado", "A SIGLA deve ser informado."));
        

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator(new NoValidator("assunto", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator(new NoValidator("pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idCidade", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idCidades", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idCidade", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateReqCompAssunto($rawRequest) {
        $controlValidation = new ValidationFacade ( );

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

        $controlValidation->validate ( $rawRequest );

        return $controlValidation;
    }

    public static function deleteCidade($idCidade) {
        $dao = new DAOCidade();
        return $dao->deleteCidade($idCidade);
    }

    public static function filtroBasico($params) {
        $assunto = (isset($params ['assunto'])) ? ($params ['assunto']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "1=1";
        $strWhere .= ($ordem == 1) ? (" and tbassunto.assunto like '{$assunto}%'") : ("");
        $strWhere .= ($ordem == 2) ? (" and stbusuarioinfo.nome like '{$assunto}%'") : ("");
        $strWhere .= " and stbusuario.status = 1 and stbusuario.afastamento = 'Não'";

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbassunto";
        $filtro ['campos'] = "tbassunto.*, stbusuarioinfo.nome";
        $filtro ['join'] = "inner join stbusuarioinfo on tbassunto.fkProcurador = stbusuarioinfo.idUsuario
                            inner join stbusuario on stbusuarioinfo.idUsuario = stbusuario.idUsuario";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }
}

?>
