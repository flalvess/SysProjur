<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class Processo extends ObjectDB {
    private $idProcesso;
    private $numeroProcesso;
    private $tipoProcesso;
    private $descricao;
    private $justica;
    private $instancia;
    private $dataEntrada;
    private $tipoAcao;
    private $litisconsorte;
    private $assunto;
    private $situacaoProcesso;
    //private $fkProcurador;
    private $fkUsuario;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbprocesso'][] = "idProcesso";
        $table['tbprocesso'][] = "numeroProcesso";
        $table['tbprocesso'][] = "tipoProcesso";
        $table['tbprocesso'][] = "descricao";
        $table['tbprocesso'][] = "justica";
        $table['tbprocesso'][] = "instancia";
        $table['tbprocesso'][] = "dataEntrada";
        $table['tbprocesso'][] = "tipoAcao";
        $table['tbprocesso'][] = "litisconsorte";
        $table['tbprocesso'][] = "assunto";
        $table['tbprocesso'][] = "situacaoProcesso";
        //$table['tbprocesso'][] = "fkProcurador";
        $table['tbprocesso'][] = "fkUsuario";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idProcesso";
        return $key;
    }

    final public static function getAttributeInc() {
        return "idProcesso";
    }


    function setIdProcesso($idProcesso) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );
        $this->idProcesso = $idProcesso;
    }

    public function getIdProcesso() {
        return $this->idProcesso;
    }

    function setNumeroProcesso($numeroProcesso) {
        self::checkModify( __FUNCTION__ );
        $this->numeroProcesso = $numeroProcesso;
    }

    public function getNumeroProcesso() {
        return $this->numeroProcesso;
    }

    function setTipoProcesso($tipoProcesso) {
        self::checkModify( __FUNCTION__ );
        $this->tipoProcesso = $tipoProcesso;
    }

    public function getTipoProcesso() {
        return $this->tipoProcesso;
    }

    function setDescricao($descricao) {
        self::checkModify( __FUNCTION__ );
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    function setJustica($justica) {
        self::checkModify( __FUNCTION__ );
        $this->justica = $justica;
    }

    public function getJustica() {
        return $this->justica;
    }

    function setInstancia($instancia) {
        self::checkModify( __FUNCTION__ );
        $this->instancia = $instancia;
    }

    public function getInstancia() {
        return $this->instancia;
    }

    function setDataEntrada($dataEntrada) {
        self::checkModify( __FUNCTION__ );
        $this->dataEntrada = $dataEntrada;
    }

    public function getDataEntrada() {
        return $this->dataEntrada;
    }
    function setTipoAcao($tipoAcao) {
        self::checkModify( __FUNCTION__ );
        $this->tipoAcao = $tipoAcao;
    }

    public function getTipoAcao() {
        return $this->tipoAcao;
    }

    function setLitisconsorte($litisconsorte) {
        self::checkModify( __FUNCTION__ );
        $this->litisconsorte = $litisconsorte;
    }

    public function getLitisconsorte() {
        return $this->litisconsorte;
    }

    function setAssunto($assunto) {
        self::checkModify( __FUNCTION__ );
        $this->assunto = $assunto;
    }

    public function getAssunto() {
        return $this->assunto;
    }

    function setSituacaoProcesso($situacaoProcesso) {
        self::checkModify( __FUNCTION__ );
        $this->situacaoProcesso = $situacaoProcesso;
    }

    public function getSituacaoProcesso() {
        return $this->situacaoProcesso;
    }

    /*function setFkProcurador($fkProcurador) {
        self::checkModify( __FUNCTION__ );
        $this->fkProcurador = $fkProcurador;
    }

    public function getFkProcurador() {
        return $this->fkProcurador;
    }
*/
    function setFkUsuario($fkUsuario) {
        self::checkModify( __FUNCTION__ );
        $this->fkUsuario = $fkUsuario;
    }

    public function getFkUsuario() {
        return $this->fkUsuario;
    }
    
}

?>