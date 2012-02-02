<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOMovimentacao extends DAOObjectDB {
    function save(&$movimentacao) {
        parent::save($movimentacao);
    }

    function update(&$movimentacao) {
        parent::update($movimentacao);
    }

    public function deleteMovimentacao($idMovimentacao) {
        $dbCon = $this->getDbConn();

        $sql = "delete from tbmovimentacao where idMovimentacao = '{$idMovimentacao}'";

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public function countTotal() {
        return DBUtil::countTable("tbmovimentacao");
    }

    public function numeroMovimentacao($idProcesso) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT max(tbmovimentacao.numeroMovimentacao) as numero FROM tbmovimentacao WHERE tbmovimentacao.fkProcesso = '{$idProcesso}'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
           $array = $dbResult->getAllResult ();

           foreach ( $array as $numero ) {
                $num = $numero['numero'];
            }

            //return $array;
            //return $dbResult->rowCount () + 1;
            return $num['numero'] + 1;
        } else {
            return 1;
        }
    }

    public static function numeroSemCiente($idProcesso) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT count(*) as numero FROM tbmovimentacao WHERE tbmovimentacao.fkProcesso = '{$idProcesso}' and tbmovimentacao.ciente ='Não'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
           $array = $dbResult->getAllResult ();
           // $array = $dbResult-> ();

           foreach ( $array as $numero ) {
                $num = $numero['numero'];
            }

            //return $array;
            //return $dbResult->rowCount () + 1;
            return $num['numero'];
        } else {
            return 0;
        }
    }

    public static function numeroAExecutar($idProcesso) {
 
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT count(*) as numero FROM tbmovimentacao WHERE tbmovimentacao.fkProcesso = '{$idProcesso}' and tbmovimentacao.tipoMovimentacao ='a executar'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
           $array = $dbResult->getAllResult ();
           // $array = $dbResult-> ();

           foreach ( $array as $numero ) {
                $num = $numero['numero'];
            }

            //return $array;
            //return $dbResult->rowCount () + 1;
            return $num['numero'];
        } else {
            return 0;
        }
    }



    public static function buscarMovimentacao($nome) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT * FROM tbmovimentacao WHERE evento LIKE '%{$nome}%' or tipoMovimentacao LIKE '%{$nome}%'
                        or perfil LIKE '%{$nome}%' or MovimentadoPor LIKE '%{$nome}%' or observacao LIKE '%{$nome}%'
                        or ciente LIKE '%{$nome}%' ORDER BY nome ASC";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }

    public static function buscarMovimentacaoAExecutar($idMovimentacao) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT tbmovimentacao_a_executar.* FROM tbmovimentacao inner join tbmovimentacao_a_executar on tbmovimentacao.idMovimentacao = tbmovimentacao_a_executar.fkMovimentacao
                 WHERE tbmovimentacao.idMovimentacao = '{$idMovimentacao}'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array();
        }
    }

    public static function buscarFkProcesso($idMovimentacao) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT tbmovimentacao.fkProcesso FROM tbmovimentacao WHERE tbmovimentacao.idMovimentacao = '{$idMovimentacao}'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            foreach ( $array as $numero ) {
                $num = $numero['fkProcesso'];
            }
            return $num;
        } else {
            return 0;
        }
    }


    public static function getMapMovimentacaoAExecutar() {

        $sql = "select tbmovimentacao_a_executar.* from tbmovimentacao_a_executar";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $itens = $dbResult->getAllResult();
            $result = array ();

            foreach ( $itens as $tmp ) {
                $result [$tmp ['idMovimentacaoAExecutar']] = $tmp ['status'];
            }

            return $result;

        } else {
            return false;
        }
    }


}

?>
