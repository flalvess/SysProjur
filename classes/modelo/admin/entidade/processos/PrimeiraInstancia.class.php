<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class PrimeiraInstancia extends ObjectDB {
    private $idPrimeiraInstancia;
    private $fkProcesso;
    private $fkJuizo;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbprimeira_instancia'][] = "idPrimeiraInstancia";
        $table['tbprimeira_instancia'][] = "fkProcesso";
        $table['tbprimeira_instancia'][] = "fkJuizo";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idPrimeiraInstancia";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idPrimeiraInstancia";
    }


    function setIdPrimeiraInstancia($idPrimeiraInstancia) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idPrimeiraInstancia = $idPrimeiraInstancia;
    }

    public function getIdPrimeiraInstancia() {
        return $this->idPrimeiraInstancia;
    }

    function setFkProcesso($fkProcesso) {
        self::checkModify( __FUNCTION__ );
        $this->fkProcesso = $fkProcesso;
    }

    public function getFkProcesso() {
        return $this->fkProcesso;
    }

    function setFkJuizo($fkJuizo) {
        self::checkModify( __FUNCTION__ );
        $this->fkJuizo = $fkJuizo;
    }

    public function getFkJuizo() {
        return $this->fkJuizo;
    }
}

?>