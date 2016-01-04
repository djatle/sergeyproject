<?php require_once('libs/phpQuery/phpQuery/phpQuery.php');?>
<?php include 'class/database.class.php';?>
<?php require_once('config/config.php');?>
<?php 
      
	  
	  
	  $database = new Database();
	  $query = "SELECT * FROM cats WHERE files = ''";
	  $database->query($query);
	  $rows = $database->resultset();
	  
	  foreach($rows as $key=>$value)
	  {
	  $str = ereg_replace(" ","+",$value['name']);
	  

	  
	  $url = 'http://www.google.by/search?q='.$str.'&biw=1280&bih=913&source=lnms&tbm=isch&sa=X&sqi=2&ved=0ahUKEwjzpM3AxI_KAhXkEXIKHdDhBP0Q_AUIBygC#tbm=isch&q='.$str;
	  
	  $hub = file_get_contents($url);
	  
	  $document = phpQuery::newDocument($hub);
	  $hentry = $document->find('.images_table img:eq(0)')->attr('src');
	  $dir = "media/uploaded/".$value['usersid']."/";
	    
	  
	  $name = time().'.jpg';
	  if(!copy($hentry, $dir.$name))
	  {echo "Ошибка копирования";}
	  
	  $query = "UPDATE cats SET files = '".$name."' WHERE name = '".$value['name']."'";
	  $database->query($query);
	  $database->execute();
	  
	  echo "<br/>";
	  sleep(1);
	
	  
	  echo $url;
	  
	  }