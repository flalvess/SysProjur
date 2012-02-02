<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/controle/validacao/TipoPDFUploadValidator.class.php';
require_once 'classes/base/sistema/UploadFile.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacao.class.php';


class GestaoMovimentacao {
    const NUM_ITENS = 10;
    const DIR_ARQ = "upload";
    const TIPO_MOVIMENTACAO = "a executar";

    public function getCamposOrdemLista($formatMap = FALSE) {
        $map ['0'] ['label'] = "Número";
        $map ['0'] ['campo'] = "tbmovimentacao.numeroMovimentacao";
        $map ['3'] ['label'] = "Tipo";
        $map ['3'] ['campo'] = "tbmovimentacao.tipoMovimentacao";
        $map ['2'] ['label'] = "Evento do Processo";
        $map ['2'] ['campo'] = "tbmovimentacao.evento";
        $map ['1'] ['label'] = "Data do Evento";
        $map ['1'] ['campo'] = "tbmovimentacao.data";
        $map ['4'] ['label'] = "Perfil do Usuario";
        $map ['4'] ['campo'] = "tbmovimentacao.perfil";
        $map ['5'] ['label'] = "Movimentador Por";
        $map ['5'] ['campo'] = "tbmovimentacao.movimentadoPor";
        $map ['6'] ['label'] = "Ciente";
        $map ['6'] ['campo'] = "tbmovimentacao.ciente";

        $result = $map;

        if ($formatMap) {
            $result = ListagemUtil::formatMapLista ( $map );
        }

        return $result;
    }

    public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {

            $controlValidation->addValidator(new InteiroPositivoValidator("idMovimentacao", "Falta informar o processo que será alterado."));
            $controlValidation->addValidator(new InteiroPositivoValidator("fkProcesso", "Falta informar o processo que será alterado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("evento", "O EVENTO deve ser informado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("observacao", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("arquivo", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("tipoMovimentacao", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("ciente", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("status", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("pendencia", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("dataLimite", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("arquivo", "O ARQUIVO PDF deve ser informado."));

        }else {

            $controlValidation->addValidator(new StringNotEmptyValidator("evento", "O EVENTO deve ser informado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("tipoMovimentacao", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("observacao", "O TIPO DA MOVIMENTACAO deve ser informado."));
            $controlValidation->addValidator(new NoValidator("arquivo", "O ARQUIVO PDF deve ser informado."));
            $controlValidation->addValidator(new NoValidator("fkProcesso", "Falta informar o processo que será alterado."));

        }

        if($rawRequest->getForValidation ( 'tipoMovimentacao' ) == GestaoMovimentacao::TIPO_MOVIMENTACAO) {

            $controlValidation->addValidator(new StringNotEmptyValidator("dataLimite", "A DATA deve ser informada."));
            $controlValidation->addValidator(new StringNotEmptyValidator("status", "O STATUS de empenho deve ser informada."));
            $controlValidation->addValidator(new StringNotEmptyValidator("pendencia", "A Pendêncicia pode ser informada."));
        }


        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestList($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "numeroMovimentacao", ""));
        $controlValidation->addValidator ( new NoValidator ( "tipoMovimentacao", ""));
        $controlValidation->addValidator ( new NoValidator ( "movimentacao", ""));
        $controlValidation->addValidator ( new NoValidator ( "evento", ""));
        $controlValidation->addValidator ( new NoValidator ( "data", ""));
        $controlValidation->addValidator ( new NoValidator ( "perfil", ""));
        $controlValidation->addValidator ( new NoValidator ( "movimentadoPor", ""));
        $controlValidation->addValidator ( new NoValidator ( "observacao", ""));
        $controlValidation->addValidator ( new NoValidator ( "ciente", ""));
        $controlValidation->addValidator ( new NoValidator ( "fkProcesso", ""));
        $controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
        $controlValidation->addValidator ( new NoValidator ( "pag", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;

    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idMovimentacao", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestDel($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new ArrayValidator("idMovimentacao", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAlt($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idMovimentacao", ""));
        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function getMapMovimentaAExecutar() {
        return DAOMovimentacao::getMapMovimentacaoAExecutar();
    }

    public static function deleteMovimentacao($idMovimentacao) {
        $dao = new DAOMovimentacao();
        return $dao->deleteMovimentacao($idMovimentacao);
    }

    public static function filtroBasico($params) {

        $processo = (isset($params ['fkProcesso'])) ? ($params ['fkProcesso']) : ("");
        $movimentacao = (isset($params ['movimentacao'])) ? ($params ['movimentacao']) : ("");
        $data = (isset($params ['data'])) ? ($params ['data']) : ("");
        $ordem = ($params ['ordem'] == null) ? (0) : ($params ['ordem']);
        $sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
        $li = (isset($params ['li'])) ? ($params ['li']) : (0);
        $numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

        unset($params);

        $strWhere = "1=1";
        $strWhere .= ($ordem == 3) ? (" and (tbmovimentacao.tipoMovimentacao like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem == 2) ? (" and (tbmovimentacao.evento like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem == 1) ? (" and (tbmovimentacao.data like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem == 0) ? (" and (tbmovimentacao.numeroMovimentacao like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem == 4) ? (" and (tbmovimentacao.perfil like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem ==5) ? (" and (tbmovimentacao.movimentadoPor like '{$movimentacao}%')") : ("");
        $strWhere .= ($ordem ==6) ? (" and (tbmovimentacao.ciente like '{$movimentacao}%')") : ("");
        $strWhere .= (!empty($data)) ? (" and (tbmovimentacao.data like '{$data}%')") : ("");
        $strWhere .= (!empty($processo)) ? (" and tbmovimentacao.fkProcesso = '{$processo}'") : ("");

        if ($li < 0) {
            $li = 0;
        }
        if ($numItens <= 0) {
            $numItens = 10;
        }

        $campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
        $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");
        
        $filtro ['tabelas'] = "tbmovimentacao";
        $filtro ['campos'] = "tbmovimentacao.*, tbprocesso.*, tbmovimentacao_a_executar.*";
        $filtro ['join'] = "inner join tbprocesso on tbprocesso.idProcesso = tbmovimentacao.fkProcesso
		                    LEFT OUTER JOIN tbmovimentacao_a_executar ON tbmovimentacao_a_executar.fkMovimentacao = tbmovimentacao.idMovimentacao";
        $filtro ['group'] = "";
        $filtro ['condicao'] = $strWhere;
        $filtro ['ordem'] = "order by {$campoOrdem} {$sentidoOrdem}";
        $filtro ['li'] = $li;
        $filtro ['numItens'] = $numItens;

        return $filtro;
    }

    public function saveArquivo($arquivo) {
        $origem = DIR_TEMP . "/" . $arquivo;
        $destino = DIR_BASE . "/" . self::DIR_ARQ . "/" . $arquivo;

        if (is_file ( $origem )) {
            @copy ( $origem, $destino );
            @unlink ( $origem );
        }
    }

    public function altArquivo($arquivoNovo, $arquivoAntigo) {
        $origem = DIR_TEMP . "/" . $arquivoNovo;

        if (is_file ( $origem )) {
            self::saveArquivo ( $arquivoNovo);
            self::removeArquivo ( $arquivoAntigo);
        }
    }

    public function removeArquivo($arquivo) {
        $srcArquivo = DIR_BASE . "/" . self::DIR_ARQ . "/" . $arquivo;

        if (is_file ( $srcArquivo )) {
            unlink ( $srcArquivo );
        }
    }
}

?>
