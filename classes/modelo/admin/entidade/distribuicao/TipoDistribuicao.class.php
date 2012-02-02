<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class TipoDistribuicao extends ObjectDB {
    private $idTipoDistribuicao;
    private $modo;
    private $criterio;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbtipo_distribuicao'][] = "idTipoDistribuicao";
        $table['tbtipo_distribuicao'][] = "modo";
        $table['tbtipo_distribuicao'][] = "criterio";
        return $table;
    }

    public static function getAttributesKey() {
        $key[] = "idTipoDistribuicao";
   
        return $key;
    }

    final public static function getAttributeInc() {
        return "idTipoDistribuicao";



    }


    function setIdTipoDistribuicao($idTipoDistribuicao) {
        $this->checkForUpdateHashKey();
        self::checkModify( __FUNCTION__ );

        $this->idTipoDistribuicao = $idTipoDistribuicao;
    }

    public function getIdTipoDistribuicao() {
        return $this->idTipoDistribuicao;
    }
    function setModo($modo) {
        self::checkModify( __FUNCTION__ );

        $this->modo = $modo;
    }

    public function getModo() {
        return $this->modo;
    }
    function setCriterio($criterio) {
        self::checkModify( __FUNCTION__ );

        $this->criterio = $criterio;
    }

    public function getCriterio() {
        return $this->criterio;
    }
}

?>