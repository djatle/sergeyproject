<?php require_once 'class/database.class.php';?>


<?php
   $database = new Database();
   
   if ($_GET['id']){
	   $id = $_GET['id'];
	   
	   $query = "SELECT * FROM cats WHERE id = '$id'";
	   $database->query($query);
	   $val = $database->single();
	
	   // if(file_exists('media/uploaded/'.$val['id'])
	   // {
		   // @unlink('media/uploaded/'.$val['id']);
	   // }
	   
	   
	   $query = "DELETE FROM cats WHERE id = '$id'";
	   $database->query($query);
	   $database->execute();
	   print_r($query);
	   header('location:cabinet.php');
   }
	  
	   
	   