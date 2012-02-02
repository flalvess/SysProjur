<?php
require_once 'classes/base/controle/validacao/NoValidator.class.php';
require_once 'classes/base/controle/validacao/ArrayValidator.class.php';
require_once 'classes/base/controle/validacao/DataValidator.class.php';
require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
require_once 'classes/base/controle/validacao/FloatNaoNegativoValidator.class.php';
require_once 'classes/base/controle/validacao/ValidationFacade.class.php';
require_once 'classes/base/sistema/ListagemUtil.class.php';
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/modelo/admin/controle/processos/NumeroUnicoProcessoValidator.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';

class GestaoTipoDistribuicao {
    const NUM_ITENS = 10;


    public static function validateRequestCad($rawRequest, $edit = false) {
        $controlValidation = new ValidationFacade();

        if($edit) {

            $controlValidation->addValidator(new InteiroPositivoValidator("idTipoDistribuicao", "Falta informar o processo que será alterado."));
            $controlValidation->addValidator(new StringNotEmptyValidator("modo", "O NÚMERO deve ser informado."));
            if($rawRequest->getForValidation ( 'modo' )== "A") {
                $controlValidation->addValidator(new StringNotEmptyValidator("criterio", "O NÚMERO deve ser informado."));

            }
            if($rawRequest->getForValidation ( 'criterio' )== "Por Assunto" && $rawRequest->getForValidation ( 'modo' )== "A"){
                $controlValidation->addValidator(new StringNotEmptyValidator("assunto", "O ASSUNTO deve ser informado."));
                $controlValidation->addValidator(new StringNotEmptyValidator("usuario", "O user deve ser informado."));
                $controlValidation->addValidator(new InteiroPositivoValidator("fkUsuario", "Falta informar o PROCURADOR que será alterado."));
                //$controlValidation->addValidator(new InteiroPositivoValidator("assunto", "Falta informar o PROCURADOR que será alterado."));
            }

        }


        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestID($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idTipoDistribuicao", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

    public static function validateRequestInitAltModo($rawRequest) {
        $controlValidation = new ValidationFacade();

        $controlValidation->addValidator(new InteiroPositivoValidator("idTipoDistribuicao", ""));

        $controlValidation->validate($rawRequest);

        return $controlValidation;
    }

}

?>
