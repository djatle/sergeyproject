<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>



<?php
              $cats_id = $_GET['id'];
			  $database = new Database();
			  $database->query("SELECT * FROM cats WHERE id = '$cats_id'");
			  $one_cat = $database->single();
			  
			  if($one_cat['files']!=''){
					$pic = "<img src = '/media/uploaded/".$one_cat['usersid']."/".$one_cat['files']."' class='pic'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
				
			    ?>
				
				<table class = 'table table-bordered'>
				 <tr>
				     <th>
					    Фото
						</th>
						<th>Имя кота</th>
						<th>Масть кота</th>
						<th>Характер кота</th>
						<th>Личные особенности</th>
						</tr>
										 
				 
				  
				  
					  <tr>
					     <td><? echo $pic;?></td>
						 <td><? echo $one_cat['name'];?></td>
						 <td><? echo $one_cat['color'];?></td>
						 <td><? echo $one_cat['chara'];?></td>
						 <td><? echo $one_cat['content'];?></td>
						     
						 </tr>
						  </table>
				
				
				
				
				





		<?php require_once('templates/bottom.php');?>			
				