 <?php include 'class/database.class.php';?>   

<?php

class Auth {
		
	var $err = array();
	var $Login;
	var $Email;
	var $Password;
	var $Passwordagain;
	var $check;
	
	public function __construct ($Login, $Email, $Password, $Passwordagain){
	$this->Login = $Login;
	$this->Password = $Password;
	$this->Email = $Email;
	$this->Passwordagain = $Passwordagain;
	//$this->check = null;
	
	if(empty ($Email)){
	$this->err[]='Не введен логин';}
	
	if(empty ($Login)){
	$this->err[]='Не введен email';}
	
	if(empty ($Password)){
	$this->err[]='Не введен пароль';}
	
	if(empty ($Passwordagain)){
	$this->err[]='Не введен пароль';}
	
	
	
	
	
	if(count($this->err)>0){
		print_r($this->err);
	}
	else{

	return true;
	 //$res = mysql_query($query);
           
	}		
}
	
	/*public function checking() {
		    
			$query = "SELECT * FROM users WHERE login = '".$this->Login."'";   //пытаемся сваять валидацию
			return $query;                    */                 
						
		
	
	
	public function regi(){
	    $database = new Database();
		$database->query("INSERT INTO users VALUES (Null,'".$this->Login."', '".$this->Password."', '".$this->Email."',  now(),now(),'unblock')");
			
			$database->bind(':Id', Null);
			$database->bind(':Login', $this->Login);
            $database->bind(':Password', $this->Password);
            $database->bind(':Email', $this->Email);
          	$database->bind(':blockunblock', 'unblock');
			$database->execute();
			
			//$query = "INSERT INTO users VALUES (Null,'".$this->Login."', '".$this->Password."', '".$this->Email."',  now(),now(),'unblock')";
			return $query;
		}
	
	
		
}
	
	









