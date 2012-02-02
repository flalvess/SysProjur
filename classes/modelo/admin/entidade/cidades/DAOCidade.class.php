<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOCidade extends DAOObjectDB {
    function save(&$cidade) {
        //$cidade->setStatus(1);

        parent::save($cidade);
    }

    function update(&$cidade) {
        parent::update($cidade);
    }

    public function countTotal() {
        return DBUtil::countTable("tbcidade");
    }


    public function deleteCidade($idCidade) {
        $dbCon = $this->getDbConn();

        $sql = "delete from tbCidade where idCidade = '{$idCidade}'";

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public static function getNomeCidadeById($idCidade) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT * FROM tbcidade WHERE idCidade = {$idCidade}";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getOneResult ();

            return $array;
        } else {
            return array ();
        }
    }

}

?>
