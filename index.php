<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';  //подключение класса базы данных ?>               
<?php	  
	  

	  $database = new Database();	          //проинстанцировали класс базы данных
	                               

	  
	  if ($_GET['url']){
       $file = $_GET['url'];
      }else{
		  $file = 'index';
	  }	   
      $database->query("SELECT * FROM maintexts WHERE url = '$file'");
 
	  $adr = $database->single();
	
	  
	  if(!$adr)
	  {
		  exit($error);
      }
	  	  
	  ?>
    <h2><?php echo $adr['name'];?></h2>
	

	<?php echo $adr['body'];?>
		
	
	
	
	
	  

<?php require_once('templates/bottom.php');?>