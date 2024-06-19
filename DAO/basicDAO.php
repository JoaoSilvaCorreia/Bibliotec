<?php 

class basicDAO{
	public $mysql;

	function __construct(){
		$servername = "********";
		$username = "********";
		$password = "*********";
		$dbname = "*********";


		$this->mysql = new mysqli($servername, $username, $password, $dbname);

		if ($this->mysql->connect_error) {
			die("Connection failed: " . $this->mysql->connect_error);
		} 
	}

	public function exec($sql){ 
		if (!$this->mysql->query($sql)) {
			echo "$sql";
			die("Error: " . $this->mysql->error);
		}
		return true;
	}

	public function fecha_conexao(){
		$this->mysql->close();
	}
}

?>
