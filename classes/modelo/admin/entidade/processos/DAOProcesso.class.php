<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOProcesso extends DAOObjectDB {
    function save(&$processo) {
        parent::save($processo);
    }

    function update(&$processo) {
        parent::update($processo);
    }

    public function countTotal() {
        return DBUtil::countTable("tbprocesso");
    }

    public static function getMapPrimeira() {

        $sql = "select tbprimeira_instancia.* from tbprimeira_instancia";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $itens = $dbResult->getAllResult ();
            $result = array ();

            foreach ( $itens as $tmp ) {
                $result [$tmp ['idPrimeiraInstancia']] = $tmp ['fkProcesso'];
            }

            return $result;

        } else {
            return false;
        }
    }

    public static function getMapSegunda() {

        $sql = "select tbsegunda_instancia.* from tbsegunda_instancia";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $itens = $dbResult->getAllResult ();
            $result = array ();

            foreach ( $itens as $tmp ) {
                $result [$tmp ['idSegundaInstancia']] = $tmp ['fkProcesso'];
            }

            return $result;

        } else {
            return false;
        }
    }

    public function deleteProcesso($idProcesso) {
        $dbCon = $this->getDbConn();

        $sql = "delete from tbprocesso where idProcesso = '{$idProcesso}'";

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public static function getNumeroProcesso($id) {

        $sql = "SELECT numeroProcesso, idProcesso
				FROM tbprocesso
				WHERE idProcesso = '{$id}'";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            //$item = $dbResult->getOneResult();
            //return $item ['numeroProcesso'];
            return $dbResult->getOneResult();

        } else {
            return false;
        }
    }

    public static function numeroProcesso($id) {

        $sql = "SELECT tbprocesso.numeroProcesso
                FROM tbprocesso 
                WHERE tbprocesso.idProcesso = ( SELECT pi.fkProcesso
                                                FROM tbprocesso p, tbsegunda_instancia s, 
                                                     tbsegunda_instancia_derivado sd, tbprimeira_instancia pi
                                                WHERE p.idProcesso = s.fkProcesso AND 
                                                      s.idSegundaInstancia = sd.fkSegundaInstancia AND
                                                      sd.fkPrimeiraInstancia = pi.idPrimeiraInstancia AND
                                                      p.idProcesso = '{$id}')";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            //$item = $dbResult->getOneResult();
            //return $item ['numeroProcesso'];
            return $dbResult->getOneResult();

        } else {
            return false;
        }
    }



    public static function checkExistNumeroProcesso($numero) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();
        $sql = "select numeroProcesso from tbprocesso where numeroProcesso = '{$numero}'";
        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMapAutoComplete($numero) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT idProcesso, numeroProcesso FROM tbprocesso WHERE numeroProcesso LIKE '{$numero}%' ORDER BY numeroProcesso ASC";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }

    public static function buscaMovimentacaoProcesso($idProcesso) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();
        $sql = "select tbmovimentacao.* from tbprocesso inner join tbmovimentacao on tbprocesso.idProcesso = tbmovimentacao.fkProcesso
                                                                left outer join tbmovimentacao_a_executar on tbmovimentacao.idMovimentacao = tbmovimentacao_a_executar.fkMovimentacao
                                                                where idProcesso = '{$idProcesso}'";
        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            $array = $dbResult->getAllResult ();

            return $array;

        } else {
            return array();
        }
    }

    public static function buscarPrimeiraInstancia($idProcesso) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();
        $sql = "select tbjuizo.idJuizo, tbjuizo.nome as juizo, tbcidade.idCidade, tbcidade.nome as cidade from tbprocesso inner join tbprimeira_instancia on tbprocesso.idProcesso = tbprimeira_instancia.fkProcesso
                                                              inner join tbjuizo on tbprimeira_instancia.fkJuizo = tbjuizo.idJuizo
                                                              inner join tbcidade on tbjuizo.fkCidade = tbcidade.idCidade
                                              where tbprocesso.idProcesso = '{$idProcesso}'";
        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            $array = $dbResult->getOneResult ();

            return $array;

        } else {
            return array();
        }
    }

    public static function idPrimeiraInstancia($idProcesso) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $sql = "SELECT tbsegunda_instancia_derivado.fkPrimeiraInstancia
                FROM tbprocesso inner join tbsegunda_instancia on tbprocesso.idProcesso = tbsegunda_instancia.fkProcesso
                                   inner join tbsegunda_instancia_derivado on tbsegunda_instancia_derivado.fkSegundaInstancia = tbsegunda_instancia.idSegundaInstancia
                WHERE tbprocesso.idProcesso =  '{$idProcesso}'";
        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            $array = $dbResult->getAllResult ();

            return $array;

        } else {
            return array();
        }
    }


    public static function buscarSegundaInstancia($idProcesso) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $sql = "select tbsegunda_instancia.idSegundaInstancia, tbsegunda_instancia.tipoSegundaInstancia  from tbprocesso inner join tbsegunda_instancia on tbprocesso.idProcesso = tbsegunda_instancia.fkProcesso
                                                              
                                              where tbprocesso.idProcesso = '{$idProcesso}'";

        $dbResult = $dbConn->query($sql);
        if ($dbResult->rowCount() > 0) {
            $array = $dbResult->getAllResult ();

            return $array;

        } else {
            return array();
        }
    }


    public static function nomeProcurador($idProcurador) {
        $idProcurador = intval($idProcurador);

        $sql = "select stbusuarioinfo.nome nome from stbusuarioinfo where stbusuarioinfo.idUsuario = {$idProcurador}";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $dbResult = $dbConn->query($sql);
        //$array = $dbResult->getAllResult();

        if ($dbResult->rowCount () > 0) {

            return $dbResult->getAllResult ();

        } else {
            return "vazio";
        }

    }

    public static function buscarPessoas($idProcesso, $tipo) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

//        $sql = "SELECT pe.nome, pe.parte
//                FROM tbprocesso po inner join tbprocesso_pessoa pp on po.idProcesso = pp.fkProcesso
//                                   inner join tbpessoa pe on pp.fkPessoa = pe.idPessoa
//                WHERE po.idProcesso = '{$idProcesso}'";

        $sql = "SELECT pe.nome, pe.parte, pp.polo
                FROM tbprocesso po inner join tbprocesso_pessoa pp on po.idProcesso = pp.fkProcesso
                                   inner join tbpessoa pe on pp.fkPessoa = pe.idPessoa
                WHERE po.idProcesso = '{$idProcesso}' and (polo = 'ativo{$tipo}' or polo = 'passivo{$tipo}')";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }




    public static function getProcessos() {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        $sql = "SELECT idProcesso,numeroProcesso FROM tbprocesso WHERE idProcesso not in (select processo from tbsubstituicao_procurador where status=1)";
        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getAllResult ();

            return $array;
        } else {
            return array ();
        }
    }

    public static function getProcuradorByProcesso($idProcesso) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();
        $sql = "SELECT u.nome, u.idUsuario, p.numeroProcesso from tbprocesso p, stbusuarioinfo u where p.fkUsuario = u.idUsuario and p.idProcesso={$idProcesso}";
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
