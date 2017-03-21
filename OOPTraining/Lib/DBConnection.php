<?php

class DBConnection{
	protected $localhost = "localhost";
	protected $username = "root";
	protected $password = "";
	protected $dbname = "dboop";
	public function __protectedruct(){
		$localhost = "localhost";
		$username = "root";
		$password = "";
		$dbname = "webhr";
	}
	public function getConnection(){
		return $con = new mysqli($this->localhost, $this->username, $this->password, $this->dbname);
	}
	// protected con=new mysqli($localhost, $username, $password, $dbname);

}


?>