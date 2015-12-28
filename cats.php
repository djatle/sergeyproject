<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>

<?php
            
			$database = new Database();
			$database->query("SELECT * FROM cats ORDER BY id");
			$rows = $database->resultset();
			
			$user_name = $database->single();
			foreach($rows as $key =>$value){
				
				if($value['files']!=''){
					$pic = "<img src = '/media/uploaded/".$value['files']."' class='pic'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
			
			 
			 //echo $pic;
		     
			 $database->query("SELECT * FROM users WHERE id = '".$value['usersid']."'" );
			 $author = $database->single();
			 
			 echo $pic;
			 echo "Автор кота".$author['login'];?><br><?
			 echo "Имя кота:".$value['name'];?><br><?
			 echo "Масть кота".$value['color'];?><br><?
			 echo "Характер кота".$value['chara'];?><br><?
			 echo "Особенности кота".$value['content'];?><hr><?
			
			}	
			
			
			
			
			
			
 require_once('templates/bottom.php');?>			
			
			
		