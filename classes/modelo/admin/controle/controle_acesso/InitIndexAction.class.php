<?php

require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/interface/admin/TelaIndex.class.php';
require_once 'classes/base/controle/AjaxResponse.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/Usuario.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/atividades/Atividade.class.php';
require_once 'classes/modelo/admin/entidade/atividades/DAOAtividade.class.php';
require_once 'classes/base/sistema/Data.class.php';

class InitIndexAction extends AbstractAction {
    public function execute() {
        $response = new AjaxResponse ( );

        $tela = new TelaIndex ( );
        $tela->processAssign ();

        $usuario = ControleAcesso::unserializeInfoUsuario ();
        $grupo = DAOGrupo::loadGrupo($usuario['idUsuario']);

        $atividadeRecebida = DAOAtividade::numeroAtividadeRec($usuario['nome'], $grupo);


        $response->addScript ( "js.changeTitle('SysProJur - Página Inicial')" );
        $response->addScript("js.hideMenu()");
        $response->addScript("js.hideMenu()");
         
        $response->addAssign ( "user_on", "innerHTML", $usuario ['nome'] );
        //$response->addAssign ( "atividade", "innerHTML", $atividadeRecebida );
        //$response->addAssign ( "recebida_on", "innerHTML","<img src='http://localhost/sysprojur/img/admin/recebido.png' style='vertical-align: middle;' /><font style='color: #FF6600'> ".$atividadeRecebida."</font><font style='color: #003399'> <u>atividade(s) sem ciente !</u></font>");
          $response->addAssign ( "recebida_on", "innerHTML","<img src='http://localhost/sysprojur/img/admin/recebido.png' style='vertical-align: middle;' /><font style='color: #FF6600'> ".$atividadeRecebida."</font><font style='color: #666666'> atividade(s) recebida(s) !</font>");




        if (count ( $grupo ) > 0) {
            foreach ( $grupo as $nome ) {
                //$movimentacao->setPerfil($nome['nome']);
                //$usuario .= $nome['nome'];
                $response->addAssign ( "group_on", "innerHTML",$nome['nome']);
            }
        }

        //$quantidade =  count ( $atividadeRecebida );

        /*if (count ( $atividadeRecebida ) > 0)
                {
				foreach ( $atividaeRecebida as $quantidade )
				{
					//$movimentacao->setPerfil($nome['nome']);
                                       //$usuario .= $nome['nome'];
                                    $response->addAssign ( "group_on", "innerHTML",$quantidade['nome'] );
				}
			}*/

        /*if($quantidade != 0){
               $response->addAssign ( "atividadeRecebida_on", "innerHTML",$quantidade atividades sem ciente! );

        }*/
        //$response->addAssign ( "user_on", "innerHTML", $usuario ['nome'] );
        $response->addAssign ( "tela", "innerHTML", $tela->getHTML () );
        $response->addAssign ( "tituloTela", "innerHTML", "Página Inicial" );
        $response->addAssign ( "saudacaoTemporal", "innerHTML", Data::getDataExt () );

        $this->setResponse ( $response );
    }

}

?>