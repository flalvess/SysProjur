<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/processos/meusProcessos/GestaoProcessosMeusProcessos.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class TelaListMeusProcessos extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "processos/listMeusProcessos.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Processos com Movimentações a Executar" );
        $this->assign ( "optionsOrdem", GestaoProcessosMeusProcessos::getCamposOrdemLista ( TRUE ) );
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
        if (count ( $usuarioGrupo ) > 0) {
            foreach ( $usuarioGrupo as $nome ) {
                $grupo = $nome['nome'];
            }
        }
        $this->assign("grupo", $grupo['nome']);
    }
}

?>