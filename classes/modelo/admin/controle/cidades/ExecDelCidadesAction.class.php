<?php
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/cidades/GestaoCidades.class.php';
require_once 'classes/base/controle/FormErrorResponse.class.php';

class ExecDelCidadesAction extends AbstractAction {
    public function execute() {
        $response = new FormErrorResponse();

        $rawRequest = $this->getRequest();

        $controlValidation = GestaoCidades::validateRequestDel($rawRequest);

        if ($controlValidation->isValid()) {
            $cleanRequest = $controlValidation->getCleanRequest();

            $idCidades = $cleanRequest->get("idCidades");
            $idCidades = (count($idCidades) > 0) ? $idCidades : array ( );

            try {
                foreach ( $idCidades as $id ) {
                    GestaoCidades::deleteCidade($id);
                }
                $msg = "Usu�rio(s) deletado(s) com sucesso.";
                $response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',false)");
                $response->addScript( "GestaoCidades.initList()");
            } catch ( Exception $e ) {
                $msg = "Falha ao excluir alguns usu�rios. Recomece do Inicio.";
                $response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',true)");
            }
        } else {
            $msg = "Algumas informa��es necess�rias para excluir usu�rios n�o foram informadas corretamente. Recomece do inicio.";
            $response->addScript( "js.promptMenssage('Exclus�o de Funcion�rios','{$msg}',true)");
        }

        $this->setResponse($response);
    }
}

?>