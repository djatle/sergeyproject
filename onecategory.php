<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>
<?php 
     
	  $catcat = 0;
	  
	  if($_POST['CatCategory'] == "Домашний, ласковый")
	  {$catcat = 1;}
      
	  if($_POST['CatCategory'] == "Дикий, лесной")
	  {$catcat = 2;}
  
      $database = new Database();
	  
	  
	    $query = "SELECT * FROM categories WHERE category = '$catcat'";
	    $database->query($query);
	    $rows = $database->resultset();
      
	  foreach($rows as $key=>$value)
	  
	    {
				
		$database->query("SELECT * FROM cats WHERE name = '".$value['catname']."'");
		$cat_row = $database->single();
		
		$database_1 = new Database();
		$database_1->query("SELECT * FROM Users WHERE id = '".$cat_row['usersid']."'");
		$author = $database_1->single();
		
		if($cat_row['files']!=''){
					$pic = "<img src = '/media/uploaded/".$cat_row['usersid']."/".$cat_row['files']."' class='pic'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
		
		     echo $pic;?><br>
			 <span class = 'opr'><?echo "Автор кота:"?></span><?echo $author['login'];?><br>
			 <span class = 'opr'><?echo "Имя кота:";?></span><?echo $cat_row['name'];?><br>
			 <span class = 'opr'><?echo "Масть кота:";?></span><?echo $cat_row['color'];?><br>
			 <span class = 'opr'><?echo "Характер кота:";?></span><?echo $cat_row['chara'];?><br>
			 <div class = 'opr'><?echo "Особенности кота:";?></div><?echo $cat_row['content'];?><hr><?
		
			
		}

	  
	  
	  
	  
	  
	  
	  
?>	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
<?php require_once('templates/bottom.php');?>