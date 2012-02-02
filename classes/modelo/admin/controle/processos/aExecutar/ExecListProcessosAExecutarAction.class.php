<?php
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/movimentacoes/DAOMovimentacao.class.php';
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/modelo/admin/controle/processos/aExecutar/GestaoProcessosAExecutar.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/ProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOProcessoPessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/Pessoa.class.php';
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';

class ExecListProcessosAExecutarAction extends AbstractAction {
    protected $tplLista = 'processos/tabelaProcessos.tpl';
    protected $tplMsg = 'processos/tabelaProcessosMsg.tpl';
    protected $containerLista = 'lista_processos';

    public function execute() {
        $response = new FormErrorResponse ( );

        $rawRequest = $this->getRequest ();

        $controlValidation = GestaoProcessosAExecutar::validateRequestList ( $rawRequest );

        if ($controlValidation->isValid ()) {
            $cleanRequest = $controlValidation->getCleanRequest ();

            $pag = ($cleanRequest->get ( 'pag' ) > 0) ? intval ( $cleanRequest->get ( 'pag' ) ) : 1;

            $params ['processo'] = $cleanRequest->get ( 'processo' );
            $params ['dataEntrada'] = $cleanRequest->get ( 'dataEntrada' );
            $params ['procurador'] = $cleanRequest->get ( 'fkUsuario' );
            $params ['ordem'] = $cleanRequest->get ( 'ordem' );
            $params ['sentido'] = $cleanRequest->get ( 'sentido' );

            $params ['li'] = (($pag - 1) * GestaoProcessosAExecutar::NUM_ITENS);

            $filtro = GestaoProcessosAExecutar::filtroBasico ( $params );

            $lista = ListagemUtil::execListagem ( $filtro );

            if ($lista ['numItens'] > 0) {
                $total = DAOProcesso::countTotal ();
                $tela = new ObjectGUI ( $this->tplLista );

                $lista ['itens'] = Seguranca::stripslashes ( $lista ['itens'] );

                $tela->assign ( "arrayItens", $lista ['itens'] );

                foreach($lista['itens'] as $cada){
                    $teste[] = $cada['idProcesso'];
                }

                $i=0;
                while($i != count($teste)){
                    //$i++;
                    $valor[] = DAOMovimentacao::numeroAExecutar($teste[$i]);
                    $i++;
                }
                $tela->assign ( "quantidadeAExecutar", $valor );

                $tela->assign ( "paginacao", ListagemUtil::getHTMLPaginacao ( $cleanRequest->getData (), $lista ['numPags'] ) );
                $tela->assign ( "total", $total );
                $tela->assign ( "retornados", $lista ['numItens'] );

                foreach($lista['itens'] as $cada){
                    $id[] = $cada['idProcesso'];
                }

                $i=0;
                while($i != count($teste)){
                    //$i++;
                    $nome[] = DAOProcessoPessoa::ListarPessoas($id[$i]);
                    $i++;
                }
                $tela->assign ( "pessoa", $nome );


                $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
                $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
               // if (count ( $usuarioGrupo ) > 0) {
                    foreach ( $usuarioGrupo as $nome ) {
                        $grupo = $nome['nome'];
                    }
               // }
                $tela->assign("perfil", $grupo);

                $response->addAssign ( $this->containerLista, "innerHTML", $tela->getHTML () );
            } else {
                $tela = new ObjectGUI ( $this->tplMsg );
                $response->addAssign ( $this->containerLista, "innerHTML", $tela->getHTML () );
            }
        } else {
            $response->addAlert ( $controlValidation->getErrosAsString () );
        }

        $this->setResponse ( $response );
    }
}

?>
