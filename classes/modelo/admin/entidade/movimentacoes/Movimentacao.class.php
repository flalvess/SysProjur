<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Movimentacao extends ObjectDB {
    private $idMovimentacao;
    private $numeroMovimentacao;
    private $tipoMovimentacao;
    private $evento;
    private $data;
    private $perfil;
    private $movimentadoPor;
    private $arquivo;
    private $observacao;
    private $ciente;
    private $fkProcesso;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbmovimentacao'][] = "idMovimentacao";
        $table['tbmovimentacao'][] = "numeroMovimentacao";
        $table['tbmovimentacao'][] = "tipoMovimentacao";
        $table['tbmovimentacao'][] = "evento";
        $table['tbmovimentacao'][] = "data";
        $table['tbmovimentacao'][] = "perfil";
        $table['tbmovimentacao'][] = "movimentadoPor";
        $table['tbmovimentacao'][] = "arquivo";
        $table['tbmovimentacao'][] = "observacao";
        $table['tbmovimentacao'][] = "ciente";
        $table['tbmovimentacao'][] = "fkProcesso";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idMovimentacao";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idMovimentacao";
    }

    function setIdMovimentacao($idMovimentacao) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idMovimentacao = $idMovimentacao;
    }

    public function getIdMovimentacao() {
        return $this->idMovimentacao;
    }

    function setNumeroMovimentacao($numeroMovimentacao) {
        self::checkModify( __FUNCTION__ );
        $this->numeroMovimentacao = $numeroMovimentacao;
    }

    public function getNumeroMovimentacao() {
        return $this->numeroMovimentacao;
    }

    function setTipoMovimentacao($tipoMovimentacao) {
        self::checkModify( __FUNCTION__ );
        $this->tipoMovimentacao = $tipoMovimentacao;
    }

    public function getTipoMovimentacao() {
        return $this->tipoMovimentacao;
    }
    function setEvento($evento) {
        self::checkModify( __FUNCTION__ );
        $this->evento = $evento;
    }

    public function getEvento() {
        return $this->evento;
    }

    public function setData($data) {
        self::checkModify( __FUNCTION__ );
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    function setPerfil($perfil) {
        self::checkModify( __FUNCTION__ );
        $this->perfil = $perfil;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    function setMovimentadoPor($movimentadoPor) {
        self::checkModify( __FUNCTION__ );
        $this->movimentadoPor = $movimentadoPor;
    }

    public function getMovimentadoPor() {
        return $this->movimentadoPor;
    }

    function setArquivo($arquivo) {
        self::checkModify( __FUNCTION__ );
        $this->arquivo = $arquivo;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    function setObservacao($observacao) {
        self::checkModify( __FUNCTION__ );
        $this->observacao = $observacao;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    function setCiente($ciente) {
        self::checkModify( __FUNCTION__ );
        $this->ciente = $ciente;
    }

    public function getCiente() {
        return $this->ciente;
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