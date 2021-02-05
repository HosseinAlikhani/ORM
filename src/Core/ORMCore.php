<?php

namespace App\Core;

class ORMCore {

	/**
	* connection information
	**/
	protected $connectionInfo = [
		'host'	=>	'localhost',
		'db'	=>	'orm',
		'username'	=>	'root',
		'password'	=>	'',
	];

	/**
	 * connection instance
	 */
	protected $connection;

	/**
	* table name
	**/
	protected $table;

	public function __construct() {


	}

	/**
	 * set connection information to database
	 * @param String $host
	 * @param String $db
	 * @param String $username
	 * @param String $password
	 * 
	 * return $this;
	 */
	public function connection($host = null, $db = null, $username = null, $password = null)
	{
		if ( $host && $db && $username )
			$this->connectionInfo = [
				'host'	=>	$host,
				'db'	=>	$db,
				'username'	=>	$username,
				'password'	=>	$password
			];
		try {
			if ( $this->connectionInfo['db'] != null  )
				$type = "mysql:host={$this->connectionInfo[host]};dbname={$this->connectionInfo[db]}";
			else 
				$type = "mysql:host={$this->connectionInfo[host]}";
			$this->connection = $conn = new \PDO($type, $this->connectionInfo['username'], $this->connectionInfo['password']);
			$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // set PDO mode exception
			var_dump("connected successfully");
		} catch ( PDOException $e) {
			var_dump("connection failed: ". $e->getMessage() );
		}

		return $this;
	}

	/**
	 * create database 
	 * @param String $dbName
	 */
	public function createDb($dbName)
	{
		$instance = "CREATE DATABASE $dbName";

		if ( $this->connection->query($instance) ) {
			var_dump( "CREATE DATABASE Successfully" );
		} else {
			var_dump( " Error Creating Database: ". $this->connection->error );
		}
	}

	/**
	 * SET table name
	 * @param String $tableName
	 */
	public function table($tableName)
	{	
		$this->table = $tableName;
		return $this;
	}

	/**
	 * Create Table
	 * @param String $tableName
	 * @param String $design name and structure of table
	 */
	public function createTable($tableName, $design)
	{
		$sql = "CREATE TABLE {$tableName} ({$design})";
		try {
			$this->connection->exec($sql);
			var_dump(" Create Table Successfully");
		} catch ( PDOException $e) {
			var_dump( $sql . " <br> " . $e->getMessage() );
		}
	}
	/**
	 * insert data to table
	 * 
	 */
	public function insert($data)
	{
		$insert = $column = null;
		if ( is_array($data) ) {
			foreach( $data as $key => $value ){
				$column == null ? $column = "$key" : $column = "$column, $key";
				$insert == null ? $insert = "'$value'" : $insert = "$insert, '$value'";
			}
			$sql = " INSERT INTO {$this->table} ( $column ) VALUES ( $insert )";
			if ( $this->connection->query($sql) ) {
				var_dump( "insert Successfully ");
			}else {
				var_dump( "error in insert ");
			}
		}
	}

	/**
	 * render and fetch data
	 */
	public function get()
	{
		return $this->render();
	}

	private function render() 
	{
		$conn = "mysql:host={$this->connectionInfo['host']};dbname={$this->connectionInfo['db']}";
		return new \PDO($conn, $this->connectionInfo['username'], $this->connectionInfo['password']);
	}
}