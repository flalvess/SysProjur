<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOPrimeiraInstancia extends DAOObjectDB {
    function save(&$primeraInstancia) {
        parent::save($primeraInstancia);
    }

    function update(&$primeraInstancia) {
        parent::update($primeraInstancia);
    }

    public function countTotal() {
        return DBUtil::countTable("tbprimeira_instancia");
    }

    public static function getMapAutoComplete($numero) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT tp.numeroProcesso, tpi.idPrimeiraInstancia FROM tbprocesso tp inner join tbprimeira_instancia tpi on tp.idProcesso = tpi.fkProcesso WHERE tp.numeroProcesso LIKE '{$numero}%' ORDER BY numeroProcesso ASC";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }

    public static function atualizarPrimeiraInstancia($primeiraInstancia) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $sql = "update tbprimeira_instancia set fkJuizo ='".$primeiraInstancia['fkJuizo']."' where fkProcesso = '".$primeiraInstancia['fkProcesso']."' ";
        $dbResult = $dbConn->query($sql);

    }

}

?>
