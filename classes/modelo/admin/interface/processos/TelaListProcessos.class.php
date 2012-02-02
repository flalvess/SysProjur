<?php
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/controle/processos/GestaoProcessos.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class TelaListProcessos extends ObjectGUI {
    public function __construct() {
        parent::__construct ( "processos/listProcessos.tpl" );
    }

    public function processAssign() {
        $this->assign ( "titulo", "Listagem de Processos" );
        $this->assign ( "optionsOrdem", GestaoProcessos::getCamposOrdemLista ( TRUE ) );
        $this->assign ( "optionsSentidoOrdem", ListagemUtil::getMapSenditoOrdem ( TRUE ) );

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
            foreach ( $usuarioGrupo as $nome ) {
                $grupo = $nome['nome'];
            }
   
        $this->assign("grupo", $grupo);
    }
}

?>