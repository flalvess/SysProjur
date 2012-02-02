<?php
require_once 'classes/modelo/admin/entidade/pessoas/DAOPessoa.class.php';
require_once 'classes/base/controle/AbstractAction.class.php';
require_once 'classes/modelo/admin/controle/pessoas/GestaoPessoas.class.php';
require_once 'classes/base/controle/AjaxTextResponse.class.php';

class AutoCompletePartesAction extends AbstractAction {
    public function execute() {
        $response = new AjaxTextResponse ( );

        $rawRequest = $this->getRequest ();

        $controlValidation = GestaoPessoas::validateReqCompPessoas( $rawRequest );

        if ($controlValidation->isValid ()) {
            $cleanRequest = $controlValidation->getCleanRequest ();

            $lista = DAOPessoa::getMapAutoComplete ( $cleanRequest->get ( 'q' ) );

            if (count ( $lista ) > 0) {

                foreach ( $lista as $id => $numero ) {
                    $response->addTxt ( "{$numero['parte']} | 1" );
                }
            }
        }

        $this->setResponse ( $response );
    }
}

?>
