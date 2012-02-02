<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/processos/semCiente/GestaoProcessosSemCiente.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class TelaListProcessosSemCiente extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "processos/listProcessosSemCiente.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Processos com Movimentações Sem Ciente" );
        $this->assign ( "optionsOrdem", GestaoProcessosSemCiente::getCamposOrdemLista ( TRUE ) );
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