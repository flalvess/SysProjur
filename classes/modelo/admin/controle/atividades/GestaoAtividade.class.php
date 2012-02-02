<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/base/controle/validacao/TipoPDFUploadValidator.class.php';
require_once 'classes/base/sistema/UploadFile.class.php';

class GestaoAtividade
{
	const NUM_ITENS = 10;
        const DIR_ARQ = "upload";

	public function getCamposOrdemLista($formatMap = FALSE) {

        $map ['0'] ['label'] = "Para";
        $map ['0'] ['campo'] = "tbatividade.para";
        $map ['1'] ['label'] = "Tipo de Atividade";
        $map ['1'] ['campo'] = "tbatividade.tipoAtividade";
        $map ['2'] ['label'] = "Solicitação";
        $map ['2'] ['campo'] = "tbatividade.solicitacao";
        $map ['3'] ['label'] = "Status";
        $map ['3'] ['campo'] = "tbatividade.status";
        $map ['4'] ['label'] = "Pendência";
        $map ['4'] ['campo'] = "tbatividade.pendencia";
        $map ['5'] ['label'] = "Ciente";
        $map ['5'] ['campo'] = "tbatividade.ciente";
        

        $result = $map;

        if ($formatMap) {
            $result = ListagemUtil::formatMapLista ( $map );
        }

        return $result;
    }
	
	public static function validateRequestCad($rawRequest, $edit = false)
	{
		$controlValidation = new ValidationFacade();
		
		if($edit){

			$controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", "Falta informar o processo que será alterado."));
		        $controlValidation->addValidator(new NoValidator("para", "O destinatário deve ser informado."));
                        $controlValidation->addValidator(new NoValidator("tipoAtividade", "O ASSUNTO deve ser informado."));
                        $controlValidation->addValidator(new NoValidator("solicitacao", "A MENSAGEM não pode ser vazia."));
                        $controlValidation->addValidator(new NoValidator("status", "O STATUS deve ser informado."));
                        $controlValidation->addValidator(new StringNotEmptyValidator("ciente", "É preciso dar ciente primeiro."));
                        $controlValidation->addValidator(new NoValidator("arquivo", "O ARQUIVO PDF deve ser informado."));
                        //$controlValidation->addValidator(new NoValidator("data", "O ARQUIVO PDF deve ser informado."));
                        //$controlValidation->addValidator(new NoValidator("pendencia", "O ARQUIVO PDF deve ser informado."));

                }
                else{
                //$controlValidation->addValidator(new InteiroPositivoValidator("fkProcesso", "O PROCESSO deve ser informado."));
                $controlValidation->addValidator(new StringNotEmptyValidator("para", "O destinatário deve ser informado."));
                $controlValidation->addValidator(new StringNotEmptyValidator("tipoAtividade", "O ASSUNTO deve ser informado."));
                $controlValidation->addValidator(new StringNotEmptyValidator("solicitacao", "A MENSAGEM não pode ser vazia"));
                $controlValidation->addValidator(new StringNotEmptyValidator("status", "O STATUS deve ser informado."));
                $controlValidation->addValidator(new NoValidator("pendencia", "O ARQUIVO PDF deve ser informado."));
                $controlValidation->addValidator(new NoValidator("ciente", "O ARQUIVO PDF deve ser informado."));
                $controlValidation->addValidator(new NoValidator("arquivo", "O ARQUIVO PDF deve ser informado."));
                }
//                if($rawRequest->getForValidation ( 'tipoAtividade' ) == GestaoAtividade::TIPO_MOVIMENTACAO){
//
//			$controlValidation->addValidator(new StringNotEmptyValidator("dataLimite", "A DATA deve ser informada."));
//			//$controlValidation->addValidator(new InteiroPositivoValidator("aplicacao", "A aplicação deve ser informada."));
//			$controlValidation->addValidator(new StringNotEmptyValidator("status", "O STATUS de empenho deve ser informada."));
//			//$controlValidation->addValidator(new StringNotEmptyValidator("pendencia", "A PENDENCIA deve ser informado."));
//			//$controlValidation->addValidator ( new DataValidator ( 'diaPag', 'mesPag', 'anoPag','', '', 'Informe a data de pagamento corretamente.', DataValidator::FORMAT_DATE ) );
//		}

		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestList($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator ( new StringNotEmptyValidator ( "ACTION", "" ) );
		$controlValidation->addValidator ( new NoValidator ( "para", ""));
		$controlValidation->addValidator ( new NoValidator ( "tipoAtividade", ""));
		$controlValidation->addValidator ( new NoValidator ( "solicitacao", ""));
                //$controlValidation->addValidator ( new NoValidator ( "data", ""));
		$controlValidation->addValidator ( new NoValidator ( "status", ""));
		$controlValidation->addValidator ( new NoValidator ( "pendencia", ""));
		//$controlValidation->addValidator ( new NoValidator ( "arquivo", ""));
		//$controlValidation->addValidator ( new NoValidator ( "obser", ""));
		$controlValidation->addValidator ( new NoValidator ( "ciente", ""));
		//$controlValidation->addValidator ( new NoValidator ( "dataLimite", ""));
		//$controlValidation->addValidator ( new NoValidator ( "status", ""));
		//$controlValidation->addValidator ( new NoValidator ( "fkProcesso", ""));
		
		//$controlValidation->addValidator ( new NoValidator ( "dataFinalRec", ""));
//		$controlValidation->addValidator ( new NoValidator ( "dataInicialSai", ""));
//		$controlValidation->addValidator ( new NoValidator ( "dataFinalSai", ""));
		$controlValidation->addValidator ( new NoValidator ( "ordem", "" ) );
                $controlValidation->addValidator ( new NoValidator ( "sentido", "" ) );
		$controlValidation->addValidator ( new NoValidator ( "pag", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;

	}
	
	public static function validateRequestID($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
	public static function validateRequestDel($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new ArrayValidator("idAtividade", ""));
		
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}
	
//	public static function validateRequestMudaStatus($rawRequest)
//	{
//		$controlValidation = new ValidationFacade();
//
//		$controlValidation->addValidator(new NoValidator("idAtividade", ""));
//		//$controlValidation->addValidator(new NoValidator("status", ""));
//
//		$controlValidation->validate($rawRequest);
//
//		return $controlValidation;
//	}
	
	public static function validateRequestInitAlt($rawRequest)
	{
		$controlValidation = new ValidationFacade();
		
		$controlValidation->addValidator(new InteiroPositivoValidator("idAtividade", ""));
		$controlValidation->validate($rawRequest);
		
		return $controlValidation;
	}

	/*public static function getMapTipoProcesso()
	{
		return DAOProcesso::getMap ();
	}

	public static function getMapEmpresa()
	{
		return DAOProcesso::getMapEmpresa ();
	}*/

	/*public static function getMapAtividadeAExecutar()
	{
		return DAOAtividade::getMapAExecutar ();
	}*/

//	public static function getMapMovimentaAExecutar()
//	{
//		return DAOAtividade::getMapAtividadeAExecutar();
//	}
//
	public static function deleteAtividade($idAtividade)
	{
		$dao = new DAOAtividade();
		return $dao->deleteAtividade($idAtividade);
	}

	public static function filtroBasico($params)
	{
		$para = (isset($params ['para'])) ? ($params ['para']) : ("");
		$tipoAtividade = (isset($params ['tipoAtividade'])) ? ($params ['tipoAtividade']) : ("");
		$solicitacao = (isset($params ['solicitacao'])) ? ($params ['solicitacao']) : ("");
		$status = (isset($params ['status'])) ? ($params ['status']) : ("");
		$pendencia = (isset($params ['pendencia'])) ? ($params ['pendencia']) : ("");
		$ciente = (isset($params ['ciente'])) ? ($params ['ciente']) : ("");
		//$data = (isset($params ['data'])) ? ($params ['data']) : ("");
		/*$dataFinalRec = (isset($params ['dataFinalRec'])) ? ($params ['dataFinalRec']) : ("");
		$dataInicialSai = (isset($params ['dataInicialSai'])) ? ($params ['dataInicialSai']) : ("");
		$dataFinalSai = (isset($params ['dataFinalSai'])) ? ($params ['dataFinalSai']) : ("");*/
		$ordem = (isset($params ['ordem'])) ? ($params ['ordem']) : (0);
		$sentido = (isset($params ['sentido'])) ? ($params ['sentido']) : (ListagemUtil::lISTA_DESC);
		$li = (isset($params ['li'])) ? ($params ['li']) : (0);
		$numItens = (isset($params ['numItens'])) ? ($params ['numItens']) : (self::NUM_ITENS);

		//$d = Data::forUnixTime(Data::desformataData($data));
		//$dFinalRec = Data::forUnixTime(Data::desformataData($dataFinalRec));
		//$dInicialSai = Data::forUnixTime(Data::desformataData($dataInicialSai));
		//$dFinalSai = Data::forUnixTime(Data::desformataData($dataFinalSai));

		unset($params);

		$strWhere = "1=1";
		$strWhere .= (!empty($para)) ? (" and (tbatividade.para like '%{$para}%')") : ("");
		$strWhere .= (!empty($tipoAtividade)) ? ("  and (tbatividade.tipoAtividade = {$tipoAtividade})") : ("");
		//$strWhere .= (!empty($data) ? ("  and (tbatividade.data between {$dInicialRec} and {$dFinalRec})") : ("");
		//$strWhere .= (!empty($dataInicialSai) && !empty($dataFinalSai)) ? ("  and (tbprocesso.dataRecebimento between {$dInicialSai} and {$dFinalSai})") : ("");
		$strWhere .= (!empty($ciente)) ? (" and tbatividade.ciente = '{$ciente}'") : ("");
		//$strWhere .= " and tb.status = 1";

		if ($li < 0)
		{
			$li = 0;
		}
		if ($numItens <= 0)
		{
			$numItens = 10;
		}

		$campoOrdem = ListagemUtil::getCampoOrdem ( $ordem, self::getCamposOrdemLista () );
                $sentidoOrdem = ($sentido == ListagemUtil::LISTA_ASC) ? ("asc") : ("desc");

		//$filtro ['tabelas'] = "tbatividade, tbprocesso, tbatividade_a_executar";
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

        public function saveArquivo($arquivo)
	{
		$origem = DIR_TEMP . "/" . $arquivo;
		$destino = DIR_BASE . "/" . self::DIR_ARQ . "/" . $arquivo;

		if (is_file ( $origem ))
		{
			@copy ( $origem, $destino );
			@unlink ( $origem );
		}
	}

	public function altArquivo($arquivoNovo, $arquivoAntigo)
	{
		$origem = DIR_TEMP . "/" . $arquivoNovo;

		if (is_file ( $origem ))
		{
			self::saveArquivo ( $arquivoNovo);
			self::removeArquivo ( $arquivoAntigo);
		}
	}

	public function removeArquivo($arquivo)
	{
		$srcArquivo = DIR_BASE . "/" . self::DIR_ARQ . "/" . $arquivo;

		if (is_file ( $srcArquivo ))
		{
			unlink ( $srcArquivo );
		}
	}


}

?>
