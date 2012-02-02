<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOProcessoPessoa extends DAOObjectDB {
    function save(&$processoPessoa) {
        //$pessoa->setStatus(1);

        parent::save($processoPessoa);
    }

    function update(&$processoPessoa) {
        parent::update($processoPessoa);
    }

    public function countTotal() {
        return DBUtil::countTable("tbprocesso_pessoa");
    }

    public static function apagarPessoas($idProcesso) {
        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        //$sql = "SELECT * FROM tbpessoa WHERE idPessoa = {$idPessoa}";
        $sql = "delete from tbprocesso_pessoa WHERE fkProcesso = {$idProcesso}";

        $dbResult = $dbConn->query ( $sql );

    }

     public static function ListarPessoas($idProcesso) {
        //$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT pe.nome
                FROM tbprocesso po inner join tbprocesso_pessoa pp on po.idProcesso = pp.fkProcesso
                                   inner join tbpessoa pe on pp.fkPessoa = pe.idPessoa
                WHERE po.idProcesso = '{$idProcesso}'";

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
            $array = $dbResult->getOneResult ();

            return $array['nome'];
        } else {
            return array ();
        }
    }

}

?>
