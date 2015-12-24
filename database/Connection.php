<?php
class Connection {




	protected $host=null;
	protected $user;
	protected $password;
	protected $dbname;

	public $connection = null;

	public function __construct($host,$username,$password,$dbname){

		$this->host = $host;
		$this->user = $username;
		$this->password = $password;
		$this->dbname = $dbname;

		try{

			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';',$this->user,$this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		}

		catch(Exception $e){

			echo $e->getMessage();die();
		}

	}

	public function getConnction(){
		return $this->connection;
	}
}