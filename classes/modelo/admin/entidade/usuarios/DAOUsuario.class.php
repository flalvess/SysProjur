<?php
require_once 'classes/base/sistema/Seguranca.class.php';
require_once 'classes/base/entidade/DAOObjectDB.class.php';
require_once 'classes/base/persistencia/DatabaseConnectionFactory.class.php';
require_once 'classes/base/sistema/DBUtil.class.php';

class DAOUsuario extends DAOObjectDB
{
	function save(&$usuario)
	{
		$usuario->setSenha(Seguranca::createSenha($usuario->getSenha()));
		$usuario->setDataCadastro(time());
		$usuario->setDataSenha(time());
		$usuario->setStatus(1);
		
		parent::save($usuario);
	}
	
	function update(&$usuario)
	{
		if ($usuario->getSenha() != "")
		{
			$usuario->setSenha(Seguranca::createSenha($usuario->getSenha()));
		}
		parent::update($usuario);
	}
	
	public static function checkExistLogin($login)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection();
		$sql = "select idUsuario from stbusuario where login = '{$login}'";
		$dbResult = $dbConn->query($sql);
		if ($dbResult->rowCount() > 0)
		{
			return true;
		} else
		{
			return false;
		}
	}
	
	public function countTotal()
	{
		return DBUtil::countTable("stbusuario", "status <> '-1'");
	}
	
	public function mudaStatus($idUsuario, $novoStatus)
	{
		$dbCon = $this->getDbConn();
		
		$tabela = "stbusuario";
		$records ['status'] = $novoStatus;
		$sql = DBUtil::getSqlUpdate($tabela, $records, "idUsuario = '{$idUsuario}'");
		
		try
		{
			$dbCon->query($sql);
			return true;
		} catch ( Exception $e )
		{
			return false;
		}
	}
	
	public function deleteUser($idUsuario)
	{
		$dbCon = $this->getDbConn();
		
		$tabela = "stbusuario";
		$records ['status'] = -1;
		$records ['senha'] = sha1(time());
		
		$sql = DBUtil::getSqlUpdate($tabela, $records, "idUsuario = '{$idUsuario}'");
		
		try
		{
			$dbCon->query($sql);
			return true;
		} catch ( Exception $e )
		{
			return false;
		}
	}

    public static function getMapAutoComplete($nome)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT stbui.idUsuario, stbui.nome FROM stbusuario stbu inner join stbusuarioinfo stbui on stbu.idUsuario = stbui.idUsuario
                                                         inner join stbgrupo_stbusuario stbgu on stbu.idUsuario = stbgu.idUsuario
                                                         inner join stbgrupo stbg on stbg.idGrupo = stbgu.idGrupo
                WHERE stbui.nome LIKE '{$nome}%' and (stbg.nome = 'Procurador' or stbg.nome = 'Administrador do Sistema') and stbu.status = 1 and stbu.afastamento = 'Não' ORDER BY stbui.nome ASC";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getAllResult ();

			return $array;
		} else
		{
			return array ();
		}
	}


    public static function getNomeUsuarioById($idUsuario)
	{
		$dbConn = DatabaseConnectionFactory::getDefaultConnection ();

		$sql = "SELECT stbusuarioinfo.nome, stbusuarioinfo.idUsuario FROM stbusuario inner join stbusuarioinfo on stbusuario.idUsuario = stbusuarioinfo.idUsuario
                WHERE stbusuarioinfo.idUsuario = {$idUsuario}";

		$dbResult = $dbConn->query ( $sql );

		if ($dbResult->rowCount () > 0)
		{
			$array = $dbResult->getOneResult ();

			return $array;
		} else
		{
			return array ();
		}
	}
}

?>
