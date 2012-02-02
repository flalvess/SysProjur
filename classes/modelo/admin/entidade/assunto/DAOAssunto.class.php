<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOAssunto extends DAOObjectDB {

    function update(&$assunto) {
        parent::update($assunto);
    }

    public function countTotal() {
        return DBUtil::countTable("tbassunto");
    }


    public static function atualizarAssunto($assunto) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $sql = "update tbassunto set assunto ='".$assunto['assunto']."' where fkProcurador = '".$assunto['fkUsuario']."' ";
        $dbResult = $dbConn->query($sql);

    }

   public static function verificaAssunto($assunto) {

        $sql = "SELECT * 
                FROM tbassunto inner join stbusuario on tbassunto.fkProcurador = stbusuario.idUsuario
                where tbassunto.assunto = '{$assunto}' and stbusuario.status = 1 and stbusuario.afastamento = 'Não'";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getAllResult();

        } else {
            return false;
        }
    }

    public static function getMapAutoComplete($nome) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        //$sql = "SELECT idUsuario, nome FROM tbProcurador WHERE nome LIKE '{$nome}%' ORDER BY nome ASC";
        $sql="select tbprocesso.assunto as assunto 
              from tbprocesso
              where tbprocesso.assunto like '{$nome}%' order by tbprocesso.assunto asc";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }



}

?>
