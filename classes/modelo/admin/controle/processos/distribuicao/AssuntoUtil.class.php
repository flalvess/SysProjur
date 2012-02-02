<?php
//require_once 'classes/base/controle/validacao/NoValidator.class.php';
//require_once 'classes/base/controle/validacao/StringNotEmptyValidator.class.php';
//require_once 'classes/base/controle/validacao/InteiroPositivoValidator.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
//require_once 'classes/base/controle/validacao/ValidationFacade.class.php';

class AssuntoUtil {

    public static function getMapAssunto($value = "assunto") {

        $sql = "SELECT tbprocesso.assunto AS assunto
                    FROM tbprocesso
                    WHERE not exists (select tbassunto.assunto
                                      from tbassunto
                                      where tbassunto.assunto = tbprocesso.assunto)
                    ORDER BY tbprocesso.assunto ASC ";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        $dbResult = $dbConn->query ( $sql );
        $itens = $dbResult->getAllResult ();

        $array = array ();
        if(count ($itens) > 0) {


            foreach ( $itens as $tmp ) {
                $array [$tmp [$value]] = $tmp ['assunto'];
            }

            return $array;


        }else {

            return $array;

        }

    }

}

?>
