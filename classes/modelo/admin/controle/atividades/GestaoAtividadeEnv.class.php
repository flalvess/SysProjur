<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';


class GestaoAtividadeEnv {
    const NUM_ITENS = 10;


    public function getCamposOrdemLista($formatMap = FALSE) {

        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbatividade.idAtividade";
        $map ['1'] ['label'] = "Enviada";
        $map ['1'] ['campo'] = "tbatividade.data";
        $map ['2'] ['label'] = "Para";
        $map ['2'] ['campo'] = "tbatividade.para";
        $map ['3'] ['label'] = "Tipo";
        $map ['3'] ['campo'] = "tbatividade.tipoAtividade";
        $map ['4'] ['label'] = "Solicitação";
        $map ['4'] ['campo'] = "tbatividade.solicitacao";
        $map ['5'] ['label'] = "Status";
        $map ['5'] ['campo'] = "tbatividade.status";
        $map ['6'] ['label'] = "Pendência";
        $map ['6'] ['campo'] = "tbatividade.pendencia";
        $map ['7'] ['label'] = "Ciente";
        $map ['7'] ['campo'] = "tbatividade.ciente";
        $map ['8'] ['label'] = "Numero";
        $map ['8'] ['campo'] = "tbatividade.numero";

        $result = $map;

        if ($formatMap) {
            $result = ListagemUtil::formatMapLista ( $map );
        }

        return $result;
    }

    public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {

            $controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", "Falta informar o processo que será alterado."));
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("para", "O EVENTO deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("tipoAtividade", "O TIPO DA ATIVIDADE deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("solicitacao", "A solicitação deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("status", "O ARQUIVO PDF deve ser informado."));
        $controlValidation->addValidator(new NoValidator("pendencia", "O ARQUIVO PDF deve ser informado."));
        $controlValidation->addValidator(new NoValidator("ciente", "O ARQUIVO PDF deve ser informado."));


        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "para", ""));
        $controlValidation->addValidator ( new NoValidator ( "tipoAtividade", ""));
        $controlValidation->addValidator ( new NoValidator ( "solicitacao", ""));
        $controlValidation->addValidator ( new NoValidator ( "status", ""));
        $controlValidation->addValidator ( new NoValidator ( "pendencia", ""));
        $controlValidation->addValidator ( new NoValidator ( "ciente", ""));
        $controlValidation->addValidator ( new NoValidator ( "atividade", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idAtividade", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function deleteAtividade($idAtividade) {
        $dao = new DAOAtividade();
        return $dao->deleteAtividade($idAtividade);
    }

    public static function filtroBasico($params) {

        $atividade = (isset($params ['atividade'])) ? ($params ['atividade']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);


        unset($params);

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();

        $strWhere = "1=1";
        $strWhere .= " and tbatividade.de ='".$usuarioLogado['nome']."'";
        $strWhere .= ($ordem == 1) ? (" and (tbatividade.data like '{$atividade}%')") : ("");
        $strWhere .= ($ordem == 2) ? (" and (tbatividade.para like '{$atividade}%')") : ("");
        $strWhere .= ($ordem == 3) ? (" and (tbatividade.tipoAtividade like '{$atividade}%')") : ("");
        $strWhere .= ($ordem == 4) ? (" and (tbatividade.solicitacao like '%{$atividade}%')") : ("");
        $strWhere .= ($ordem == 5) ? (" and (tbatividade.status like '{$atividade}%')") : ("");
        $strWhere .= ($ordem == 6) ? (" and (tbatividade.pendencia like '%{$atividade}%')") : ("");
        $strWhere .= ($ordem == 7) ? (" and (tbatividade.ciente like '{$atividade}%')") : ("");
        $strWhere .= ($ordem == 8) ? (" and (tbatividade.numero like '{$atividade}%')") : ("");

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbatividade";
        $filtro ['campos'] = "tbatividade.*";
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
