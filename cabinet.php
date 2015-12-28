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
				  // if(count($row_cats)>0){
					 
					 
					  
					  foreach($row_cats as $key=>$value)
				         { 	
				  			                 
				  			if(!empty($value['files'])){
				             $pict = "<img src = '/media/uploaded/".$value['usersid']."/".$value['files']."' class='pic' data_id=".$value['id']."/>";
			                                          }
			                 else {
				              $pict ="<img src = '/media/uploaded/no_photo.png' class='pic'/>";
			                      } ?>
						 <table class = 'table table-bordered'>
				 <tr>
				     <th>
					    Фото
						</th>
						<th>Имя кота</th>
						<th>Что делать с котом</th>
						</tr>
										 
				 
				  
				  
					  <tr>
					     <td><? echo $pict;?></td>
						 <td><? echo $value['name'];?></td>
						 <td>
						 <a class = 'btn btn-default btn-block edit'  href = 'edit_cat.php?id=<?=$value['id'];?>'>Помыть и причесать</a>
						 <a class = 'btn btn-default btn-block dell'  href = 'one_cat.php?id=<?=$value['id'];?>'>Узнать больше</a>
						 <a class = 'btn btn-default btn-block dell'  href = 'cats_del.php?id=<?=$value['id'];?>'>Выгнать на улицу</a></td>
						     
						 </tr>
						  </table>
					  <?
				      }			  
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
 <script src = "media/ckeditor/ckeditor.js"></script>
 
 <script src = "/cabinet.js"></script>