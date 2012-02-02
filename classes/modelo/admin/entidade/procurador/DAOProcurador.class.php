<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOProcurador extends DAOObjectDB {
    function save(&$Procurador) {
        $Procurador->setStatus(1);

        parent::save($Procurador);
    }

    function update(&$Procurador) {
        parent::update($Procurador);
    }

    public function countTotal() {
        return DBUtil::countTable("tbProcurador");
    }


    public static function buscaIdProcurador() {

        $sql = "SELECT su.idUsuario FROM stbusuario su inner join stbgrupo_stbusuario sgu on su.idUsuario = sgu.idUsuario
                 where (sgu.idGrupo = 1 or sgu.idGrupo = 3) and su.status = 1 and su.afastamento = 'Não'";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            //$item = $dbResult->getOneResult();
            //return $item ['numeroProcesso'];
            return $dbResult->getAllResult();

        } else {
            return 0;
        }
    }

    public static function totalProcurador() {

        $sql = "SELECT count(su.idUsuario) as quantidade FROM stbusuario su inner join stbgrupo_stbusuario sgu on su.idUsuario = sgu.idUsuario
                 where (sgu.idGrupo = 1 or sgu.idGrupo = 3) and su.status = 1 and su.afastamento = 'Não'";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getOneResult();

        }
    }

    public static function totalAtual() {

        $sql = "SELECT tbcontrole.total FROM tbcontrole";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getOneResult();
        }
        else {
            //return 0;
            $total = self::totalProcurador();
            $i = $total['quantidade'] - 1;
            $sql = "update tbcontrole set total = ".$i;
            $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
            $dbResult = $dbConn->query ( $sql );
            return $dbResult->getOneResult();

        }
    }

    public static function novaPosicao($posicao) {

        $sql = "update tbcontrole set posicao = ".$posicao;
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        $dbResult = $dbConn->query ( $sql );

    }

    public static function novaTotal($total) {

        $sql = "update tbcontrole set total = ".$total;
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        $dbResult = $dbConn->query ( $sql );

    }

    public static function posicaoAtual() {

        $sql = "SELECT tbcontrole.posicao FROM tbcontrole";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getOneResult();
        }else {
            return 0;
        }

    }

    public static function buscaQuantProcessos($idProcurador) {

        $sql = "SELECT count(*) FROM tbprocesso
                 WHERE tbprocesso.fkUsuario = {$idProcurador}";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            //$item = $dbResult->getOneResult();
            //return $item ['numeroProcesso'];
            return $dbResult->getAllResult();

        } else {
            return 0;
        }
    }

    public function deleteFunc($idProcurador) {
        $dbCon = $this->getDbConn();

        $tabela = "tbProcurador";
        $records ['status'] = -1;

        $sql = DBUtil::getSqlUpdate($tabela, $records, "idProcurador = '{$idProcurador}'");

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public static function getMapAutoComplete($nome) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT idUsuario, nome FROM tbProcurador WHERE nome LIKE '{$nome}%' ORDER BY nome ASC";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }

    public static function getNomeProcuradorById($idProcurador) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT stbusuarioinfo.idUsuario, stbusuarioinfo.nome, stbusuarioinfo.email  FROM stbusuarioinfo WHERE idUsuario = {$idProcurador}";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getOneResult ();

            return $array;
        } else {
            return array ();
        }
    }

}

?>
