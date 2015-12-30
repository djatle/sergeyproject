<?php require_once('templates/top.php');?>
 <?php include 'class/database.class.php';?>
 <?php
     if ($_SESSION['id'])
		 
		 {
			$thid = $_SESSION['id']; 
			 if ($_FILES){
				 $tmp_name = $_FILES['addfile']['tmp_name'];
				 $name = $_FILES['addfile']['name'];
				 $dir = $_SERVER['DOCUMENT_ROOT'].'/media/uploaded/';
				  echo "<pre>";
                        print_r($_FILES);
                     echo "</pre>";
				 
				 if(is_uploaded_file($tmp_name)){
					 move_uploaded_file($tmp_name, $dir.$name);
				     
					 $handle = fopen($dir.$name, 'r');
					 $data = array();
					 $k = 0;  
					while(!feof($handle))
					{$data[$k] = fgetcsv($handle);
				     $k++;
					}
					unset($data[0]);
					foreach($data as $key=>$value)
					{ 
					// print_r($value);
					// echo "$key";
					// echo "<hr/>";
					
					$array_value = explode(';', $value[0]);
					
					$vv0 = $array_value[0];
					$vv1 = $array_value[1];
					$vv2 = $array_value[2];
					$vv3 = $array_value[3];
					$database = new Database();
					
					$sel = "SELECT * FROM cats WHERE name = '$vv0'";
					$database->query($sel);
					$row = $database->single();
					
					
					if ($row['name']==$vv0)
					{ echo "Кот с имнем"."$vv0"."уже существует и не добавлен в базу"?><hr/><?;}
				      
					
					 else{
					
					$query = "INSERT INTO cats VALUES(null, '$thid', '$vv0', '$vv1', '$vv2', '$vv3', '', 'show', 'now()')";
					$database->query($query);
					
					$database->execute();
					echo "Кот по имени"."$vv0"."добавлен";
					 }
					
					}
					
					
				 }
				 else{
					 echo "ошибка загрузки файла";
				 }
			 }
			 
			 ?>
			 
 
    <form method = "POST" action = 'parse_scv.php' enctype = 'multipart/form-data'>
 
   <div> 
   <label>Пример</label>
  <input type = "file" name = 'addfile'>
  </div>
  <button type="submit" class="btn btn-default">Загрузить</button>
  </form>
  <?
		 }
		 
		 else
		 { echo "ошибка входа"; }
	 
		 
		 
		 
		 require_once('templates/bottom.php');?>	 
			