<?php
require_once 'classes/modelo/admin/controle/atividades/GestaoAtividade.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';

class TelaCadAtividade extends ObjectGUI {
    private $atividade = null;
 
    public function __construct($atividade = null) {
        parent::__construct ( "atividades/cadAtividade.tpl" );
       
        $this->atividade = $atividade;

    }


    public function setDados($atividade) {
        $this->atividade = $atividade;
       
    }

    public function processAssign() {

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
        if (count ( $usuarioGrupo ) > 0) {
            foreach ( $usuarioGrupo as $nome ) {
                $grupo = $nome['nome'];
            }
        }

        if ($this->atividade != NULL) {
            $this->assign ( "actionForm", 'ExecEditAtividadeAction' );
            $this->assign ( "atividade", $this->atividade );
            $this->assign ( "perfil", $grupo );
            $this->assign ( "nome", $usuarioLogado['nome'] );
         

        } else {
            $this->assign ( "actionForm", 'ExecCadAtividadeAction' );
            $this->assign ( "perfil", $grupo );
            $this->assign ( "nome", $usuarioLogado['nome'] );
            $this->assign ( "salvar", "salvar" );
            $this->assign ( "hoje", date("d/m/Y") );
        
        }

        
        $this->assign ( "titulo", "Inserчуo de Atividades" );
        $this->assign ( "valueStatus", array('Normal', 'Urgente') );
        $this->assign ( "outStatus", array('Normal', 'Urgente') );
        $this->assign ( "valueCiente", array('Sim', 'Nуo') );
        $this->assign ( "outCiente", array('Sim', 'Nуo') );
        
    }
}

?>