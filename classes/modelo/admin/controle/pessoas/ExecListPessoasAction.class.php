<?php
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';

require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';


class ExecListPessoasAction extends AbstractAction
{
	protected $tplLista = 'pessoas/tabelaPessoas.tpl';
	protected $tplMsg = 'pessoas/tabelaPessoasMsg.tpl';
	protected $containerLista = 'lista_pessoas';

	public function execute()
	{
		$response = new FormErrorResponse ( );

		$rawRequest = $this->getRequest ();

		$controlValidation = GestaoPessoas::validateRequestList ( $rawRequest );
		
		if ($controlValidation->isValid ())
		{
			$cleanRequest = $controlValidation->getCleanRequest ();

			$pag = ($cleanRequest->get ( 'pag' ) > 0) ? intval ( $cleanRequest->get ( 'pag' ) ) : 1;

			$params ['pessoa'] = $cleanRequest->get ( 'pessoa' );
			$params ['ordem'] = $cleanRequest->get ( 'ordem' );
			$params ['sentido'] = $cleanRequest->get ( 'sentido' );

			$params ['li'] = (($pag - 1) * GestaoPessoas::NUM_ITENS);

			$filtro = GestaoPessoas::filtroBasico ( $params );

			$lista = ListagemUtil::execListagem ( $filtro );

			if ($lista ['numItens'] > 0)
			{
				$total = DAOPessoa::countTotal ();
				$tela = new ObjectGUI ( $this->tplLista );

				$lista ['itens'] = Seguranca::stripslashes ( $lista ['itens'] );

				$tela->assign ( "arrayItens", $lista ['itens'] );

				$tela->assign ( "paginacao", ListagemUtil::getHTMLPaginacao ( $cleanRequest->getData (), $lista ['numPags'] ) );
				$tela->assign ( "total", $total );
				$tela->assign ( "retornados", $lista ['numItens'] );
				$tela->assign ( "verificaEdicaoPessoa", self::verificaEdicaoPessoa() );

				$response->addAssign ( $this->containerLista, "innerHTML", $tela->getHTML () );
			} else
			{
				$tela = new ObjectGUI ( $this->tplMsg );
				$response->addAssign ( $this->containerLista, "innerHTML", $tela->getHTML () );
			}
		} else
		{
			$response->addAlert ( $controlValidation->getErrosAsString () );
		}



		$this->setResponse ( $response );
	}

        public static function verificaEdicaoPessoa(){

		 $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
		 $boolean = DAOGrupo::verificaPermissionGeneric("7",$usuarioLogado['idUsuario']);

		 return $boolean;
	}

}

?>
