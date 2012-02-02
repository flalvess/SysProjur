<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOSubstituicoes extends DAOObjectDB {
    function save(&$substituicao) {
        $substituicao->setStatus(1);

        parent::save($substituicao);
    }

    function update(&$substituicao) {
        parent::update($substituicao);
    }

    public function countTotal() {
        return DBUtil::countTable("tbsubstituicao_procurador","status!='-1'");
    }

    public function mudaStatus($idSubstituicaoProcurador, $novoStatus) {
        $dbCon = $this->getDbConn();

        $tabela = "tbsubstituicao_procurador";
        $records ['status'] = $novoStatus;
        $sql = DBUtil::getSqlUpdate($tabela, $records, "idSubstituicaoProcurador = '{$idSubstituicaoProcurador}'");

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public function deleteFunc($idSubstituicaoProcurador) {
        $dbCon = $this->getDbConn();

        $tabela = "tbsubstituicao_procurador";
        $records ['status'] = -1;

        $sql = DBUtil::getSqlUpdate($tabela, $records, "idSubstituicaoProcurador = '{$idSubstituicaoProcurador}'");

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public static function getMapAutoComplete($nome) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT idSubstituicaoProcurador, nome, sigla FROM tbsubstituicao_procurador WHERE nome LIKE '{$nome}%' ORDER BY nome ASC";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }
    public static function getlistSubstituicoess($idProcesso= null,$type="in") {

        $query = "";
        if(!is_null($idProcesso)) {
            $ids = DAOSubstituicoes::getSubstituicoesByProcesso($idProcesso);
            $newIds = DAOSubstituicoes::getIdsUnidosByVirgula($ids);
            $queryIn = ($type=="in") ? "":"not";
            $query = "where idSubstituicaoProcurador $queryIn in($newIds)";
        }
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT idSubstituicaoProcurador, processo FROM tbsubstituicao_procurador $query ORDER BY nome ASC";
        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();
            return $array;
        } else {
            return array ();
        }
    }
    public static function saveSubstituicoesInProcesso($idProcesso,$array,$flag = false) {


        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        if($flag) {
            $sql = "delete from tbprocesso_substituicao where fkProcesso = $idProcesso";
            $dbResult = $dbConn->query ( $sql );
        }
        foreach ($array as $key => $value) {

            $sql = "insert into tbprocesso_substituicao values ($idProcesso,$value)";
            $dbResult = $dbConn->query ( $sql );
        }



    }

    public static function getIdsUnidosByVirgula($array) {

        $ids = "";
        foreach ($array as $key => $value) {
            $ids .= ($key==0) ? $value["idSubstituicaoProcurador"]:",".$value["idSubstituicaoProcurador"];
        }
        return $ids;

    }

    public static function getSubstituicoesByProcesso($idProcesso) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT fkSubstituicoes idSubstituicaoProcurador FROM tbprocesso_substituicao WHERE fkProcesso = {$idProcesso}";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }

    }

    public static function getNomeSubstituicoesById($idSubstituicaoProcurador) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT * FROM tbsubstituicao_procurador WHERE idSubstituicaoProcurador = {$idSubstituicaoProcurador}";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getOneResult ();

            return $array;
        } else {
            return array ();
        }
    }
    public static function getSubstituicaoByProcesso($idProcesso) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT idSubstituicaoProcurador FROM tbsubstituicao_procurador WHERE processo = {$idProcesso}";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }

    }

}

?>
