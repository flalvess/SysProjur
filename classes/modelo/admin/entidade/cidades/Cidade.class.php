<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Cidade extends ObjectDB {
    private $idCidade;
    private $nome;
    private $fkEstado;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbcidade'][] = "idCidade";
        $table['tbcidade'][] = "nome";
        $table['tbcidade'][] = "fkEstado";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idCidade";

        return $key;
    }

    final public static function getAttributeInc() {
               return "idCidade";


    }


    function setIdCidade($idCidade) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );

        $this->idCidade = $idCidade;
    }

    public function getIdCidade() {
        return $this->idCidade;
    }
    function setNome($nome) {
        self::checkModify( __FUNCTION__ );

        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }
    function setFkEstado($fkEstado) {
        self::checkModify( __FUNCTION__ );

        $this->fkEstado = $fkEstado;
    }

    public function getFkEstado() {
        return $this->fkEstado;
    }
}

?>