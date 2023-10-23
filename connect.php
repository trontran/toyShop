<?php
class connect{
	public $server;
	public $dbname;
	public $usernames;
	public $password;

	public function __construct(){
	 $this->server = "ebh2y8tqym512wqs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	 $this->usernames ="s2th5n5fjpvuq6dq";
	 $this->password ="annw9lokiqeh114e";
	 $this->dbname ="z5rezzgy6n20qrlo";	
	}	

	
	public function connectToMySQL():mysqli{
		$conn = new mysqli($this->server,
		$this->usernames,$this->password,$this->dbname);

		if($conn -> connect_error){
			die("Failed". $conn->connect_error);
		}
		else{
			/*echo "Connect!";*/
		}
		return $conn;
	}
	//Option 2: PDO
	public function connectToPDO():PDO{
		try{
		$conn =new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->usernames,$this->password);
		//echo "Connect! PDO";
		}catch(PDOException $e){
			die("Failed".$e);
		}	
		return $conn;
		
	}
	
}
	$c = new connect();
	$c->connectToMySQL();
	//$c->ConnectToMySQL();

?>