<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>
 <?php           
			if($_SESSION['id']){
				
				$query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
				
				if($_POST)
				{
				$database = new Database;
				
				$catname = $_POST['CatName'];
				$catcolor = $_POST['CatColor'];
				$catchar = $_POST['CatChar'];
				$catcont = $_POST['editor1'];
				
				$database->query("INSERT INTO cats VALUES(Null, '".$catname."', '".$catcolor."', '".$catchar."', '".$catcont."', 'show', now())");
				
				
				
				/*$database->query("INSERT INTO cats(id, name, color, chara, content, showhide, putdate) VALUES (Null,'".$_Post['CatName']."', '".$_Post['CatColor']."', '".$_Post['CatChar']."', '".$_Post['editor1']."', 'show', now())"); */
				
			 
			 
			 
			 
			 /*	$database->bind(':Id', Null);
			    $database->bind(':name', $_POST['CatName']);
                $database->bind(':color', $_Post['CatColor']);
                $database->bind(':chara', $_Post['CatChar']);
				$database->bind(':content', $_Post['editor1']);
          	   	$database->bind(':showhide', 'show'); 
			    $database->bind(':putdate', now);  */
				$database->execute(); 
				
				}
				
				?>
			 <div class="cat">Здесь вы можете разместить параметры ваших котов. Наша организация гарантирует бережное отношение
			 к параматрам ваших котов.</div>
	<form method = "POST" action = 'cabinet.php'>
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
	  