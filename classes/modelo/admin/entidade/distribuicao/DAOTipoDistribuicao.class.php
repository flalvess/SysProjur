<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOTipoDistribuicao extends DAOObjectDB {

    function update(&$tipoDistribuicao) {
        parent::update($tipoDistribuicao);
    }

    public function countTotal() {
        return DBUtil::countTable("tbtipo_distribuicao");
    }

    public static function verificaModo() {

        $sql = "SELECT * FROM tbtipo_distribuicao";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getOneResult();

        } else {
            return false;
        }
    }

    public static function InsertAssuntoDefault($idUsuario) {
        //self::clearGrupos($idUsuario);

        $value = "('', 'Sem Assunto', {$idUsuario})";

        $sql = "insert into tbassunto values {$value}";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $dbConn->query($sql);

    }



}

?>
