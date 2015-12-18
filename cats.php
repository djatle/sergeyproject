<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>

<?php
            
			$database = new Database();
			$database->query("SELECT * FROM cats ORDER BY id");
			$rows = $database->resultset();
			
			foreach($rows as $key =>$value){
				
				if($value['files']!=''){
					$pic = "<img src = '/media/uploaded/".$value['files']."' class='pic'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
			
			 
			 echo $pic;
			 echo "Имя кота:".$value['name'];?><br><?
			 echo "Масть кота".$value['color'];?><br><?
			 echo "Характер кота".$value['chara'];?><br><?
			
			
			}	
			
			
			
			
			
			
 require_once('templates/bottom.php');?>			
			
			
		