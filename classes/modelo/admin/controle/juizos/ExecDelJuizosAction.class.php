<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/juizos/GestaoJuizos.class.php';
require_once 'classes/modelo/admin/entidade/juizos/Juizo.class.php';
require_once 'classes/modelo/admin/entidade/juizos/DAOJuizo.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelJuizosAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoJuizos::validateRequestDel($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $idJuizos = $cleanRequest->get("idJuizos");
            $idJuizos = (count($idJuizos) > 0) ? $idJuizos : array ( );

            try {
                $dao = new DAOJuizo();
                $juizo = new Juizo();
                foreach ( $idJuizos as $id ) {
                    //GestaoJuizos::deleteJuizo($id);
                    $juizo->setIdJuizo ( $id );
                    $dao->load ( $juizo );
                    $dao->delete ( $juizo );
                }
                $msg = "Usuário(s) deletado(s) com sucesso.";
                $response->addScript( "js.promptMenssage('Exclusão de Funcionários','{$msg}',false)");
                $response->addScript( "GestaoJuizos.initList()");
            } catch ( Exception $e ) {
                $msg = "Falha ao excluir alguns usuários. Recomece do Inicio.";
                $response->addScript( "js.promptMenssage('Exclusão de Funcionários','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informações necessárias para excluir usuários não foram informadas corretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Exclusão de Funcionários','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>