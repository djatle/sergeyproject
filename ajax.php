<?php 
include 'class/database.class.php'; 

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "sergeyproject");        
define("DB_PORT", 3307);

$id =(int) $_POST['id'];
$database = new Database;
$database->query("SELECT * FROM cats WHERE id = '".$id."'");
$adr = $database->single();

 ?><h2><?=$adr['name'];?></h2><?
  if($adr['files']!=''){
					$pic = "<img src = '/media/uploaded/".$adr['usersid']."/".$adr['files']."' class='modal-cat'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
 echo $pic;
 ?><div><?=$adr['content'];?></div>
 
			