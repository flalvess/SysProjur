<?php
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/modelo/admin/entidade/Historico/DAOHistorico.class.php';

class GestaoHistorico {
    const NUM_ITENS = 10;

    public function getCamposOrdemLista($formatMap = FALSE) {
        $map ['0'] ['label'] = "::Critério::";
        $map ['0'] ['campo'] = "tbHistorico.idHistorico";
        $map ['1'] ['label'] = "Nº Processo";
        $map ['1'] ['campo'] = "tbhistorico.numeroProcesso";
        $map ['2'] ['label'] = "Procurador";
        $map ['2'] ['campo'] = "tbhistorico.procurador";
        $map ['3'] ['label'] = "Data/Hora";
        $map ['3'] ['campo'] = "tbhistorico.dataHora";
        $map ['4'] ['label'] = "Usuário";
        $map ['4'] ['campo'] = "tbhistorico.usuário";
        $map ['5'] ['label'] = "Tipo";
        $map ['5'] ['campo'] = "tbhistorico.tipo";

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

   /* public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {

            $controlValidation->addValidator(new InteiroPositivoValidator("idHistorico", "Falta informar o usuário que será alterado."));
        }

        $controlValidation->addValidator(new StringNotEmptyValidator("nome", "O NOME deve ser informado."));
        $controlValidation->addValidator(new StringNotEmptyValidator("parte", "A Parte deve ser informado."));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }*/

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator(new NoValidator("historico", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator(new NoValidator("pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idHistorico", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

   /* public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idHistoricos", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }*/

   /* public static function validateRequestMudaStatus($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new NoValidator("idHistorico", ""));
        $controlValidation->addValidator(new NoValidator("status", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idHistorico", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateReqCompHistoricos($rawRequest) {
        $controlValidation = new ValidationFacade ( );

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "q", "" ) );

        $controlValidation->validate ( $rawRequest );

        return $controlValidation;
    }

    public static function mudaStatus($idHistorico, $status) {
        if ($status == 1) {
            $novoStatus = 0;
        } else {
            $novoStatus = 1;
        }

        $dao = new DAOHistorico();
        $result ['ok'] = $dao->mudaStatus($idHistorico, $novoStatus);
        $result ['status'] = $novoStatus;

        return $result;
    }

    public static function deleteFunc($idHistorico) {
        $dao = new DAOHistorico();
        return $dao->deleteFunc($idHistorico);
    }*/

    public static function filtroBasico($params) {

        $historico = (isset($params ['historico'])) ? ($params ['historico']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "1=1";
        $strWhere .= ($ordem == 1) ? (" and (tbhistorico.numeroProcesso like '{$historico}%')") : ("");
        $strWhere .= ($ordem == 2) ? (" and (tbhistorico.procurador like '{$historico}%')") : ("");
        $strWhere .= ($ordem == 3) ? (" and (tbhistorico.dataHora like '{$historico}%')") : ("");
        $strWhere .= ($ordem == 4) ? (" and (tbhistorico.usuario like '{$historico}%')") : ("");
        $strWhere .= ($ordem == 5) ? (" and (tbhistorico.tipo like '{$historico}%')") : ("");
        //$strWhere .= " and tbHistorico.status != '-1'";

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

        $filtro ['tabelas'] = "tbHistorico";
        $filtro ['campos'] = "tbHistorico.numeroProcesso, tbHistorico.procurador, tbHistorico.dataHora, tbHistorico.usuario, tbHistorico.tipo, tbHistorico.operacao";
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
