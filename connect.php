<?php
class connect{
	public $server;
	public $dbname;
	public $usernames;
	public $password;

	public function __construct(){
	 $this->server = "i0rgccmrx3at3wv3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
	 $this->usernames ="n16lyuak4lxt9w3j";
	 $this->password ="huyrub32w37tk1th";
	 $this->dbname ="uw645arthk4vxkd0";	
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