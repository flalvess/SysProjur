<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Assunto extends ObjectDB {
    private $idAssunto;
    private $assunto;
    private $fkProcurador;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbassunto'][] = "idAssunto";
        $table['tbassunto'][] = "assunto";
        $table['tbassunto'][] = "fkProcurador";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idAssunto";

        return $key;
    }

    final public static function getAttributeInc() {

        return "idAssunto";

    }


    function setIdAssunto($idAssunto) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );

        $this->idAssunto = $idAssunto;
    }

    public function getIdAssunto() {
        return $this->idAssunto;
    }
    function setAssunto($assunto) {
        self::checkModify( __FUNCTION__ );

        $this->assunto = $assunto;
    }

    public function getAssunto() {
        return $this->assunto;
    }
    function setFkProcurador($fkProcurador) {
        self::checkModify( __FUNCTION__ );

        $this->fkProcurador = $fkProcurador;
    }

    public function getFkProcurador() {
        return $this->fkProcurador;
    }
}

?>