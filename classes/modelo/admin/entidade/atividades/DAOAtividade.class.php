<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';
require_once 'classes/modelo/admin/controle/controle_acesso/ControleAcesso.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/DAOGrupo.class.php';
require_once 'classes/modelo/admin/entidade/usuarios/UsuarioInfo.class.php';

class DAOAtividade extends DAOObjectDB {
    function save(&$atividade) {
        parent::save($atividade);
    }

    function update(&$atividade) {
        parent::update($atividade);
    }

    public function deleteAtividade($idAtividade) {
        $dbCon = $this->getDbConn();
        $tabela = "tbatividade";
        $sql = DBUtil::getSqlUpdate($tabela, $records, "idAtividade = '{$idAtividade}'");

        try {
            $dbCon->query($sql);
            return true;
        } catch ( Exception $e ) {
            return false;
        }
    }

    public function countTotal() {
        return DBUtil::countTable("tbatividade");
    }

    public function numeroAtividadeRec($nome, $grupo) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        if (count ( $grupo ) > 0) {
            foreach ( $grupo as $perfil ) {
                $group = $perfil['nome'];
            }
        }

          if( $group != "Apoio"){
             $sql = "SELECT * FROM tbatividade WHERE tbatividade.para = '{$nome}' and (tbatividade.ciente = '---' or tbatividade.ciente = 'Não')";

          }else{
             $sql = "SELECT * FROM tbatividade WHERE (tbatividade.para = 'Apoio' or tbatividade.para = '{$nome}' ) and (tbatividade.ciente = '---' or tbatividade.ciente = 'Não')";
        
        }

        $dbResult = $dbConn->query ( $sql );

        

        if ($dbResult->rowCount () > 0) {
          
            return $dbResult->rowCount ();

        } else {
            return 0;
        }
    }

    public function numeroAtividadeEnv($nome) {

        $dbConn = DatabaseConnectionFactory::getDefaultConnection ();

        $sql = "SELECT * FROM tbatividade WHERE tbatividade.de = '{$nome}'";

        $dbResult = $dbConn->query ( $sql );

        if ($dbResult->rowCount () > 0) {
         
            return $dbResult->rowCount () + 1;

        } else {
            return 1;
        }
    }

}

?>
