<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';

class GestaoPessoas {
    const NUM_ITENS = 10;

    public function getCamposOrdemLista($formatMap = FALSE) {
        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbpessoa.idPessoa";
        $map ['1'] ['label'] = "Nome";
        $map ['1'] ['campo'] = "tbpessoa.nome";
//        $map ['2'] ['label'] = "Parte";
//        $map ['2'] ['campo'] = "tbpessoa.parte";

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

            $controlValidation->addValidator(new InteiroPositivoValidator("idPessoa", "Falta informar o usuário que será alterado."));
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("nome", "O NOME deve ser informado."));
        //$controlValidation->addValidator(new StringNotEmptyValidator("parte", "A Parte deve ser informado."));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator(new NoValidator("pessoa", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator(new NoValidator("pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idPessoa", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idPessoas", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestMudaStatus($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new NoValidator("idPessoa", ""));
        $controlValidation->addValidator(new NoValidator("status", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idPessoa", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateReqCompPessoas($rawRequest) {
        $controlValidation = new ValidationFacade ( );

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

        $controlValidation->validate ( $rawRequest );

        return $controlValidation;
    }

    public static function mudaStatus($idPessoa, $status) {
        if ($status == 1) {
            $novoStatus = 0;
        } else {
            $novoStatus = 1;
        }

        $dao = new DAOPessoa();
        $result ['ok'] = $dao->mudaStatus($idPessoa, $novoStatus);
        $result ['status'] = $novoStatus;

        return $result;
    }

    public static function deleteFunc($idPessoa) {
        $dao = new DAOPessoa();
        return $dao->deleteFunc($idPessoa);
    }

    public static function filtroBasico($params) {
 
        $pessoa = (isset($params ['pessoa'])) ? ($params ['pessoa']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "1=1";
        $strWhere .= ($ordem == 1) ? (" and (tbpessoa.nome like '{$pessoa}%')") : ("");
        //$strWhere .= ($ordem == 2) ? (" and (tbpessoa.parte like '{$pessoa}%')") : ("");
        $strWhere .= " and tbpessoa.status != '-1'";

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbpessoa";
        $filtro ['campos'] = "tbpessoa.*";
        $filtro ['join'] = "";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }
}

?>
