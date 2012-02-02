<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOSegundaInstanciaDerivado extends DAOObjectDB {
    function save(&$segundaInstanciaDerivado) {
        parent::save($segundaInstanciaDerivado);
    }

    function update(&$segundaInstanciaDerivado) {
        parent::update($segundaInstanciaDerivado);
    }

    public function countTotal() {
        return DBUtil::countTable("tbsegunda_instancia_derivado");
    }

    public static function atualizarSegundaInstancia($segundaInstancia) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection();
        $sql = "update tbsegunda_instancia_derivado set fkPrimeiraInstancia ='".$segundaInstancia['fkPrimeiraInstancia']."' where fkSegundaInstancia = '".$segundaInstancia['fkSegundaInstancia']."' ";
        $dbResult = $dbConn->query($sql);

    }

}

?>
