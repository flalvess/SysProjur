<?php
require_once 'classes/modelo/admin/controle/movimentacoes/GestaoMovimentacao.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';

class TelaCadMovimentacao extends ObjectGUI {
    private $movimentacao = null;
    private $movimentacaoAExecutar = null;
    private $area = null;

    public function __construct($movimentacao = null) {
        parent::__construct ( "movimentacoes/cadMovimentacao.tpl" );

        $this->movimentacao = $movimentacao;
        
    }


    public function setDados($movimentacao, $movimentacaoAExecutar) {
        $this->movimentacao = $movimentacao;
        $this->movimentacaoAExecutar = $movimentacaoAExecutar;
        
    }

    public function setArea($area) {
        $this->area = $area;

    }

    public function processAssign($idProc = "") {

        $usuarioLogado = ControleAcesso::unserializeInfoUsuario ();
        $usuarioGrupo = DAOGrupo::loadGrupo($usuarioLogado['idUsuario']);
 
            foreach ( $usuarioGrupo as $nome ) {
                $grupo = $nome['nome'];
            }
    

        if ($this->movimentacao != NULL) {
            $this->assign ( "actionForm", 'ExecEditMovimentacaoAction' );
            $this->assign ( "movimentacao", $this->movimentacao );
            $this->assign ( "movimentacaoAExecutar", $this->movimentacaoAExecutar );
            $this->assign ( "perfil", $grupo);
            $this->assign ( "area",  $this->area);

        } else {
            $this->assign ( "actionForm", 'ExecCadMovimentacaoAction' );
            $this->assign ( "perfil", $grupo );
            $this->assign ( "area",  $this->area);

        }


        $this->assign("idProcesso", $idProc);
        //$this->assign("idProcesso", "");
        $this->assign ( "titulo", "Inserзгo de Movimentacao" );
        $this->assign ( "valueTipoMovimentacao", array('executada', 'a executar') );
        $this->assign ( "outTipoMovimentacao", array('executada', 'a executar') );

        $this->assign ( "valueTipoExecutada", array('executada') );
        $this->assign ( "outTipoExecutada", array('executada') );

        $this->assign ( "valueTipoAExecutar", array('a executar') );
        $this->assign ( "outTipoAExecutar", array('a executar') );

        $this->assign ( "valueStatus", array('Normal', 'Urgente', 'Com pendкncia', 'Perda de prazo', 'Concluнdo') );
        $this->assign ( "outStatus", array('Normal', 'Urgente', 'Com pendкncia', 'Perda de prazo', 'Concluнdo') );

        $this->assign ( "valueCiente", array('Nгo', 'Sim') );
        $this->assign ( "outCiente", array('Nгo', 'Sim') );

    }
}

?>