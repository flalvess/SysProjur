<?php
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class ExecListSubstituicoesAction extends AbstractAction {
    protected $tplLista = 'substituicoes/tabelaSubstituicoes.tpl';
    protected $tplMsg = 'substituicoes/tabelaSubstituicoesMsg.tpl';
    protected $containerLista = 'lista_substituicoes';

    public function execute() {
        $response = new FormErrorResponse ( );

        $rawRequest = $this->getRequest ();

        $controlValidation = GestaoSubstituicoes::validateRequestList ( $rawRequest );

        if ($controlValidation->isValid ()) {
            $cleanRequest = $controlValidation->getCleanRequest ();

            $pag = ($cleanRequest->get ( 'pag' ) > 0) ? intval ( $cleanRequest->get ( 'pag' ) ) : 1;

            $params ['substituicao'] = $cleanRequest->get ( 'substituicao' );
            $params ['ordem'] = $cleanRequest->get ( 'ordem' );
            $params ['sentido'] = $cleanRequest->get ( 'sentido' );

            $params ['li'] = (($pag - 1) * GestaoSubstituicoes::NUM_ITENS);

            $filtro = GestaoSubstituicoes::filtroBasico ( $params );

            $lista = ListagemUtil::execListagem ( $filtro );

            if ($lista ['numItens'] > 0) {
                $total = DAOSubstituicoes::countTotal ();
                $tela = new ObjectGUI ( $this->tplLista );

                $lista ['itens'] = Seguranca::stripslashes ( $lista ['itens'] );

               /* foreach($lista ['itens'] as $key=>$vlr) {
                    $lista ['itens'][$key]["numeroProcesso"] = preg_replace("|({$params ['processo']})|Ui","<b style='background:#CCEF95;'>$1</b>",$lista ['itens'][$key]["numeroProcesso"]);
                }*/
                $tela->assign ( "arrayItens", $lista ['itens'] );

                $tela->assign ( "paginacao", ListagemUtil::getHTMLPaginacao ( $cleanRequest->getData (), $lista ['numPags'] ) );
                $tela->assign ( "total", $total );
                $tela->assign ( "retornados", $lista ['numItens'] );
                //$tela->assign ( "verificaEdicaoSubstituicoes", self::verificaEdicaoSubstituicoes() );

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

   /* public static function verificaEdicaoSubstituicoes() {

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $boolean = DAOGrupo::verificaPermissionGeneric("7",$usuarioLogado['idUsuario']);

        return $boolean;
    } */

}

?>
