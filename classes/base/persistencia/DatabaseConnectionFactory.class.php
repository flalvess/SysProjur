<?php
require_once 'classes/base/persistencia/MysqlIConnection.class.php';

class DatabaseConnectionFactory
{
	private static $defaultDbConn = null;
	
	public static function createConnection($params)
	{
		$driver = $params['driver'];
		
		$dbConn = null;
		
		switch ( $driver)
		{
			case MysqlIConnection::keyDriver() :
				$dbConn = new MysqlIConnection( $params );
				break;
			
			default :
				throw new Exception( "Dados incorretos para criar conexão ao banco de dados." );
				break;
		}
		
		return $dbConn;
	}
	
	public static function getDefaultConnection()
	{
		if (self::$defaultDbConn != null)
		{
			return self::$defaultDbConn;
		}
		
		$params['driver'] = "mysqli";
		$params['host'] = "127.0.0.1";
		$params['user'] = "root";
		$params['password'] = "root";
		$params['port'] = null;
		$params['dbname'] = "dbprojur";
		
		self::$defaultDbConn = self::createConnection( $params );
		
		return self::$defaultDbConn;
	}
}

?>