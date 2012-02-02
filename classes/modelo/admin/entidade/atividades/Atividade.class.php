<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Atividade extends ObjectDB {
    private $idAtividade;
    private $de;
    private $para;
    private $tipoAtividade;
    private $solicitacao;
    private $status;
    private $pendencia;
    private $ciente;
    private $data;
    private $numero;
    private $dataCiente;
    private $arquivo;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbatividade'][] = "idAtividade";
        $table['tbatividade'][] = "de";
        $table['tbatividade'][] = "para";
        $table['tbatividade'][] = "tipoAtividade";
        $table['tbatividade'][] = "solicitacao";
        $table['tbatividade'][] = "status";
        $table['tbatividade'][] = "pendencia";
        $table['tbatividade'][] = "ciente";
        $table['tbatividade'][] = "data";
        $table['tbatividade'][] = "numero";
        $table['tbatividade'][] = "dataCiente";
        $table['tbatividade'][] = "arquivo";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idAtividade";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idAtividade";
    }

    function setIdAtividade($idAtividade) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idAtividade = $idAtividade;
    }

    public function getIdAtividade() {
        return $this->idAtividade;
    }

    function setDe($de) {
        self::checkModify( __FUNCTION__ );
        $this->de = $de;
    }

    public function getDe() {
        return $this->de;
    }

    function setPara($para) {
        self::checkModify( __FUNCTION__ );
        $this->para = $para;
    }

    public function getPara() {
        return $this->para;
    }

    function setTipoAtividade($tipoAtividade) {
        self::checkModify( __FUNCTION__ );
        $this->tipoAtividade = $tipoAtividade;
    }

    public function getTipoAtividade() {
        return $this->tipoAtividade;
    }

    function setSolicitacao($solicitacao) {
        self::checkModify( __FUNCTION__ );
        $this->solicitacao = $solicitacao;
    }

    public function getSolicitacao() {
        return $this->solicitacao;
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

    function setCiente($ciente) {
        self::checkModify( __FUNCTION__ );
        $this->ciente = $ciente;
    }

    public function getCiente() {
        return $this->ciente;
    }

    function setData($data) {
        self::checkModify( __FUNCTION__ );
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    function setNumero($numero) {
        self::checkModify( __FUNCTION__ );
        $this->numero = $numero;
    }

    public function getNumero() {
        return $this->numero;
    }

    function setDataCiente($dataCiente) {
        self::checkModify( __FUNCTION__ );
        $this->dataCiente = $dataCiente;
    }

    public function getDataCiente() {
        return $this->dataCiente;
    }

    function setArquivo($arquivo) {
        self::checkModify( __FUNCTION__ );
        $this->arquivo = $arquivo;
    }

    public function getArquivo() {
        return $this->arquivo;
    }
}

?>