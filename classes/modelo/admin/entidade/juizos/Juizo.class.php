<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Juizo extends ObjectDB {
    private $idJuizo;
    private $nome;
    private $fkCidade;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbjuizo'][] = "idJuizo";
        $table['tbjuizo'][] = "nome";
        $table['tbjuizo'][] = "fkCidade";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idJuizo";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idJuizo";
    }

    function setIdJuizo($idJuizo) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idJuizo = $idJuizo;
    }

    public function getIdJuizo() {
        return $this->idJuizo;
    }

    function setNome($nome) {
        self::checkModify( __FUNCTION__ );
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }
    function setFkCidade($fkCidade) {
        self::checkModify( __FUNCTION__ );
        $this->fkCidade = $fkCidade;
    }

    public function getFkCidade() {
        return $this->fkCidade;
    }
}

?>