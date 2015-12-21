<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>
 <?php           
			if($_SESSION['id']){
				$users_id = $_SESSION['id'];
				$query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
				
				$database_1 = new Database;
				$database_1->query("SELECT * FROM cats WHERE usersid = '".$users_id."'");
				$row_cats = $database_1->resultset();
			 
				echo 'Коты добавленные вами' ?><br><? 
				  if(count($row_cats)>0){
					 
					 ?>
					 
					 <table class = 'table table-bordered'>
				 <tr>
				     <th>
					    Фото
						</th>
						<th>Имя кота</th>
						<th>Что делать с котом</th>
						</tr>
										 
				 <? for ($i=0; $i<count($row_cats); $i++)
				  
				  {  ?>
					  <tr>
					     <td><? $row_cats[$i]['files'];?></td>
						 <td><? echo $row_cats[$i]['name'];?></td>
						 <td><a class = 'btn btn-default btn-block dell' href = 'cats_del.php?id'  data_url = 'cats_del.php?id=<?=$row_cats[$i]['id'];?>'>Выгнать на улицу</a></td>
						     
						 </tr>
						 
					  <?
				  }
					 // echo $row_cats[$i]['name'];?><br><?}
				  ?>
				     </table>
					 <?
				 
				  
				    // echo "<pre>";
                       // print_r($row_cats);
                    // echo "</pre>";
				   
				 
				
				   
				
				if($_POST)
				{
				 /* echo "<pre>";
                      print_r($_FILES);
                echo "</pre>";
				exit; */
				  if ($_FILES)
				  {   
			       					         
					  
					  $fan = explode('.',$_FILES['addfile']['name']);
					  
					  if (end($fan)=='jpg' or end($fan)=='png')
					  {
						   $real_name   = date('y_m_d_h_m_s').'.'.end($fan);
						     $dir = $_SERVER['DOCUMENT_ROOT'].'/media/uploaded/'.$_SESSION['id'].'/';
							 
					  		 $path = $dir.$real_name;
                      if(!is_file($dir)){
					        @mkdir($dir, 0777, true);}
							
					  move_uploaded_file($_FILES['addfile']['tmp_name'], $path);  
					  echo 'Файл успешно добавлен';
                      					  
					  }
					    
						 else {echo 'недопустимый тип добавляемого файла';
					   $real_name='';
						 }
					  
				  }
                				
				$database = new Database;
				
				$catname = $_POST['CatName'];
				$catcolor = $_POST['CatColor'];
				$catchar = $_POST['CatChar'];
				$catcont = $_POST['editor1'];
				
				
				$database->query("INSERT INTO cats VALUES(Null, '".$users_id."', '".$catname."', '".$catcolor."', '".$catchar."', '".$catcont."', '".$real_name."', 'show', now())");
				
				
				
				
				$database->execute(); 
			 
			 
			 
			 
			 
				
				
				}
				
				
				
				?>
			 <div class="cat">Здесь вы можете разместить параметры ваших котов. Наша организация гарантирует бережное отношение
			 к параматрам ваших котов.</div>
	<form method = "POST" action = 'cabinet.php' enctype = 'multipart/form-data'>
		 <div class="form-group">
    <label for="exampleInputName2">Имя кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Мурзик" name = "CatName">
  </div>
  <div>
  <label for="exampleInputName2">Масть кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Рыжий" name = "CatColor">
  </div>
  <div>
  <label for="exampleInputName2">Характер кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Мерзкий" name = "CatChar">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Описание особенностей кота</label>
    <textarea class="ckeditor" name="editor1"></textarea>
	
  </div>
  <div> 
   <label>Здесь вы можете поместить фотографию кота</label>
  <input type = "file" name = 'addfile'>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>
		

		<?
			
			
			}
			else{
				
				echo "ошибка пользователя";
			}
	?>
	
      
<?php require_once('templates/bottom.php');?>	

 <script src="media/ckeditor/ckeditor.js">
  </script>

  <script src = '/cabinet.js'>
  </script> 
 
  
  
	  