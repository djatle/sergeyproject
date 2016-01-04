<?php require_once('templates/top.php');?>
<?php include 'class/database.class.php';?>

<a href = "#" class = 'google_search'>
Найти изображение
</a>
<div id = "result">
</div>

<script>
$(function(){
	$.ajaxSetup({
		url:"google_search.php",
		type:"POST",
		beforeSend: function(){
			$("#result").html("<img src = 'media/loader.gif'/>");
		},
		success: function(data){
			$("#result").html(data);
		},
		error: function(msg){
			$("#result").html(msg);
		}
	});
		
		$('.google_search').click(function(){
			$.ajax({data:'q = 1'});
		});
 
});
</script>

<?php
            
			
			$database = new Database();
			$database->query("SELECT * FROM cats ORDER BY id");
			$rows = $database->resultset();
				
			?>	
			<form action = 'onecategory.php' method = 'POST' enctype = 'multipart/form-data'>
			<label for="exampleInputName2">Выберите категорию кота</label>
            <select class="form-control" name = "CatCategory">
            <option>Домашний, ласковый</option>
            <option>Дикий, лесной</option>
            </select>
			<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<?
			
			if($_POST){
				
				header('Location: onecategory.php');
				
			}
			  
			  else{
			  
			foreach($rows as $key =>$value){
				
				if($value['files']!=''){
					$pic = "<img src = '/media/uploaded/".$value['usersid']."/".$value['files']."' class='pic'/>";
					
				}
				else {
					$pic = "<img src = '/media/uploaded/no_photo.png' class = 'pic'/>";
				}
			
			 
			
		     
			 $database->query("SELECT * FROM users WHERE id = '".$value['usersid']."'" );
			 $author = $database->single();
			 // $query = "SELECT * FROM categories WHERE catname = '".$value['name']."'";
			 // $database->query($query);
			 // $category = $database->single();
			 
			 
			 
			 // if($category['category'] == 1)
			 // {$category = 'Домашний, ласковый';}
		     // if($category['category'] == 2)
			 // {$category = 'Дикий, лесной';}
			 
			 
			 
				
			  
			 
				
			 
			 echo $pic;
			 echo "Автор кота:".$author['login'];?><br>
			 <span class = 'opr'><?echo "Имя кота:";?></span><?echo $value['name'];?><br>
			 <span class = 'opr'><?echo "Категория кота:";?></span><? echo "$category";?><br>
			 <span class = 'opr'><?echo "Масть кота:";?></span><?echo $value['color'];?><br>
			 <span class = 'opr'><?echo "Характер кота:";?></span><?echo $value['chara'];?><br>
			 <div class = 'opr'><?echo "Особенности кота:";?></div><?echo $value['content'];?><hr><?
			
			}	
			
			  }
			
			
			
			
 require_once('templates/bottom.php');?>			
			
			
		