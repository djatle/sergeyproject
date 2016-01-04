<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>


       <?php  
	   
	   
	   
		 $cats_id = $_GET['id'];	 		
		 
		 $database = new Database();
		 $database->query("SELECT * FROM cats WHERE id = '$cats_id'");
		 $cat_edit = $database->single();
		
		 
		 
				if($_POST){
				 
				$catname = $_POST['CatName_1'];
				$catcolor = $_POST['CatColor'];
				$catchar = $_POST['CatChar'];
				$catcont = $_POST['editor1'];
		       	
				
				
				
				$database->query("UPDATE cats SET name = '".$catname."', color = '".$catcolor."', chara = '".$catchar."' WHERE id = '$cats_id'");
				
				
				$database->execute();
		         echo "<pre>";
                      print_r($catname);
					 
                echo "</pre>";
				
				 echo "<pre>";
                      print_r($cats_id);
					 
                echo "</pre>";
				
				}
		 
		      
		?> 
		 <div class="cat">Здесь вы можете разместить параметры ваших котов. Наша организация гарантирует бережное отношение
			 к параматрам ваших котов.</div>
	<form method = "POST" action = 'edit_cat.php?id=<?=$cat_edit['id'];?>' enctype = 'multipart/form-data'>
		 <div class="form-group">
    <label for="exampleInputName2">Имя кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="<?=$cat_edit['name']?>" name = "CatName_1">
  </div>
  <div>
  <label for="exampleInputName2">Масть кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="<?=$cat_edit['color']?>" name = "CatColor">
  </div>
  <div>
  <label for="exampleInputName2">Характер кота</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="<?=$cat_edit['chara']?>" name = "CatChar">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Описание особенностей кота</label>
    <textarea class="ckeditor" name="editor1"></textarea>
	
  </div>
  <div> 
   <label>Здесь вы можете поместить фотографию кота</label>
  <input type = "file" name = 'addfile'>
  </div>
  <button type="submit" class="btn btn-default">Сохранить изменения</button>
  </form>
  
			   <?
	   
	
	        
	      
	
	?>   
	   <?php require_once('templates/bottom.php');?>
<script src = "media/ckeditor/ckeditor.js"></script>