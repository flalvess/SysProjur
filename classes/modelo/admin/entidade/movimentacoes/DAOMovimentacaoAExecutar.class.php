<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOMovimentacaoAExecutar extends DAOObjectDB {
    function save(&$movimentacaoAExecutar) {
        parent::save($movimentacaoAExecutar);
    }

    //function update(&$movimentacaoAExecutar) {
    public static function atualizar($movimentacaoAExecutar) {
        //parent::update($movimentacaoAExecutar);
        $dbConn = DatabaseConnectionFactory::getDefaultConnection();

        $sql = "update tbmovimentacao_a_executar set dataLimite ='".$movimentacaoAExecutar['dataLimite']."', status = '".$movimentacaoAExecutar['status']."', pendencia = '".$movimentacaoAExecutar['pendencia']."' where fkMovimentacao = '".$movimentacaoAExecutar['fkMovimentacao']."' ";
        $dbResult = $dbConn->query($sql);

    }

    public function countTotal() {
        return DBUtil::countTable("tbmovimentacao_a_executar");
    }
}

?>
