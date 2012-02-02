<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOSegundaInstancia extends DAOObjectDB {
    function save(&$segundaInstancia) {
        parent::save($segundaInstancia);
    }

    function update(&$segundaInstancia) {
        parent::update($segundaInstancia);
    }

    public function countTotal() {
        return DBUtil::countTable("tbsegunda_instancia");
    }

    
}

?>
