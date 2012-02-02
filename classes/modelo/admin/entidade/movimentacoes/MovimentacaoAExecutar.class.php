<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class MovimentacaoAExecutar extends ObjectDB {
    private $idMovimentacaoAExecutar;
    private $dataLimite;
    private $status;
    private $pendencia;
    private $fkMovimentacao;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbmovimentacao_a_executar'][] = "idMovimentacaoAExecutar";
        $table['tbmovimentacao_a_executar'][] = "dataLimite";
        $table['tbmovimentacao_a_executar'][] = "status";
        $table['tbmovimentacao_a_executar'][] = "pendencia";
        $table['tbmovimentacao_a_executar'][] = "fkMovimentacao";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idMovimentacaoAExecutar";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idMovimentacaoAExecutar";
    }

    function setIdMovimentacaoAExecutar($idMovimentacaoAExecutar) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idMovimentacaoAExecutar = $idMovimentacaoAExecutar;
    }

    public function getIdMovimentacaoAExecutar() {
        return $this->idMovimentacaoAExecutar;
    }

    function setDataLimite($dataLimite) {
        self::checkModify( __FUNCTION__ );
        $this->dataLimite = $dataLimite;
    }

    public function getDataLimite() {
        return $this->dataLimite;
    }

    function setStatus($status) {
        self::checkModify( __FUNCTION__ );
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    function setPendencia($pendencia) {
        self::checkModify( __FUNCTION__ );
        $this->pendencia = $pendencia;
    }

    public function getPendencia() {
        return $this->pendencia;
    }

    function setFkMovimentacao($fkMovimentacao) {
        self::checkModify( __FUNCTION__ );
        $this->fkMovimentacao = $fkMovimentacao;
    }

    public function getFkMovimentacao() {
        return $this->fkMovimentacao;
    }
}

?>