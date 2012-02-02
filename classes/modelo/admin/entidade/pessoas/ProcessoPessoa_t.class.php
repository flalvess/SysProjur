<?php
require_once 'classes/base/entidade/ObjectDB.class.php';

class ProcessoPessoa extends ObjectDB {
    private $fkProcesso;
    private $fkPessoa;

    function __construct() {
        parent::__construct();
    }

    public static function getInfoTable() {
        $table['tbprocesso_pessoa'][] = "fkProcesso";
        $table['tbprocesso_pessoa'][] = "fkPessoa";
        return $table;
    }

    public static function getAttributesKey() {



        return $key;
    }

    final public static function getAttributeInc() {


    }


    function setFkProcesso($fkProcesso) {
        self::checkModify( __FUNCTION__ );

        $this->fkProcesso = $fkProcesso;
    }

    public function getFkProcesso() {
        return $this->fkProcesso;
    }
    function setFkPessoa($fkPessoa) {
        self::checkModify( __FUNCTION__ );

        $this->fkPessoa = $fkPessoa;
    }

    public function getFkPessoa() {
        return $this->fkPessoa;
    }
}

?>