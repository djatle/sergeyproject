<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>

<?php
            
			$database = new Database;
			$database->query("SELECT * FROM cats ORDER BY id");
			$rows = $database->resultset();
			
			foreach($rows as $key =>$value){
				
				if($value['picture']){
					$pic = "<img src = '/uploads/".$value['files']." class='pic'/>";
				}
				else {
					$pic = "<img src = '/uploads/no_photo.png' class = 'pic'/>";
				}
			
			 echo $pic;
			
			
			}	
			
			
			
			
			
			
 require_once('templates/bottom.php');?>			
			
			
		