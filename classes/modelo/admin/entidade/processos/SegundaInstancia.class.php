<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class SegundaInstancia extends ObjectDB {
    private $idSegundaInstancia;
    private $tipoSegundaInstancia;
    private $fkProcesso;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbsegunda_instancia'][] = "idSegundaInstancia";
        $table['tbsegunda_instancia'][] = "tipoSegundaInstancia";
        $table['tbsegunda_instancia'][] = "fkProcesso";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idSegundaInstancia";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idSegundaInstancia";
    }

    function setIdSegundaInstancia($idSegundaInstancia) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idSegundaInstancia = $idSegundaInstancia;
    }

    public function getIdSegundaInstancia() {
        return $this->idSegundaInstancia;
    }

    function setTipoSegundaInstancia($tipoSegundaInstancia) {
        self::checkModify( __FUNCTION__ );
        $this->tipoSegundaInstancia = $tipoSegundaInstancia;
    }

    public function getTipoSegundaInstancia() {
        return $this->tipoSegundaInstancia;
    }

    function setFkProcesso($fkProcesso) {
        self::checkModify( __FUNCTION__ );
        $this->fkProcesso = $fkProcesso;
    }

    public function getFkProcesso() {
        return $this->fkProcesso;
    }
}

?>