<?php
require_once 'classes/base/sistema/Data.class.php';
require_once 'classes/modelo/admin/controle/substituicoes/GestaoSubstituicoes.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/entidade/substituicoes/DAOSubstituicoes.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOUsuario.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/base/interface/ObjectGUI.class.php';

class TelaCadSubstituicoes extends ObjectGUI {
    private $substituicoes = null;
    private $processo = null;

    public function __construct($substituicoes = null) {
        parent::__construct ( "substituicoes/cadSubstituicoes.tpl" );

        $this->substituicoes = $substituicoes;
    }

    public function setDados($substituicoes) {
        $this->substituicoes = $substituicoes;
    }
    public function setProcesso($processo) {
        $this->processo = $processo;
    }

    public function processAssign() {
        if ($this->substituicoes != NULL) {
            $this->assign ( "actionForm", 'ExecEditSubstituicoesAction' );
            $this->assign ( "substituicoes", $this->substituicoes );
           
            $array = DAOProcesso::getProcuradorByProcesso($this->processo);
            $this->assign ( "procurador_original",$array[0]["nome"]);

            $this->assign ( "fkUsuarioOriginal",$array[0]["idUsuario"]);
            $this->assign ( "numero_processo",$array[0]["numeroProcesso"]);
            if($this->substituicoes["procuradorSubstituto"]) {
            		$this->assign ( "procurador_subbstituto",DAOUsuario::getNomeUsuarioById($this->substituicoes["procuradorSubstituto"]));
            } 

        }
        else {
            $this->assign ( "actionForm", 'ExecCadSubstituicoesAction' );
            $this->assign ( "fkProcesso", $this->processo );
//
//        }
       
        	$array = DAOProcesso::getProcuradorByProcesso($this->processo);
        	$this->assign ( "procurador_original",$array[0]["nome"]);
              $this->assign ( "fkUsuarioOriginal",$array[0]["idUsuario"]);
        	$this->assign ( "numero_processo",$array[0]["numeroProcesso"]);
         	if($this->substituicoes["procuradorSubstituto"]) {
            		$this->assign ( "procurador_subbstituto",DAOUsuario::getNomeUsuarioById($this->substituicoes["procuradorSubstituto"]));
        	}
      	}

        $paramsData ['idForm'] = "formSaveSubstituicoes";
        $paramsData ['sufixo'] = "Pub";

        $this->assign ( "titulo", "Inserчуo de Substituicoes" );
    }

}

?>