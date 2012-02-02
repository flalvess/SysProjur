<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class SegundaInstanciaDerivado extends ObjectDB {
    private $idSegundaInstanciaDerivado;
    private $fkSegundaInstancia;
    private $fkPrimeiraInstancia;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbsegunda_instancia_derivado'][] = "idSegundaInstanciaDerivado";
        $table['tbsegunda_instancia_derivado'][] = "fkSegundaInstancia";
        $table['tbsegunda_instancia_derivado'][] = "fkPrimeiraInstancia";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idSegundaInstanciaDerivado";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idSegundaInstanciaDerivado";
    }

    function setIdSegundaInstanciaDerivado($idSegundaInstanciaDerivado) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idSegundaInstanciaDerivado = $idSegundaInstanciaDerivado;
    }

    public function getIdSegundaInstanciaDerivado() {
        return $this->idSegundaInstanciaDerivado;
    }

    function setFkSegundaInstancia($fkSegundaInstancia) {
        self::checkModify( __FUNCTION__ );
        $this->fkSegundaInstancia = $fkSegundaInstancia;
    }

    public function getFkSegundaInstancia() {
        return $this->fkSegundaInstancia;
    }

    function setFkPrimeiraInstancia($fkPrimeiraInstancia) {
        self::checkModify( __FUNCTION__ );
        $this->fkPrimeiraInstancia = $fkPrimeiraInstancia;
    }

    public function getFkPrimeiraInstancia() {
        return $this->fkPrimeiraInstancia;
    }
}

?>