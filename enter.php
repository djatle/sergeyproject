<?php require_once('templates/top.php');
include 'class/database.class.php';
if($_POST){
    $database = new Database();
	$database->query("SELECT * FROM users WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."'");
	$adr = $database->single();
	if($adr['id']){
		$_SESSION['id'] = $adr['id'];
		?>
		<script>
		 document.location.href = 'cabinet.php'; 
		</script>
		<?php
	}else{
		echo 'Ошибка входа';
	}
}
?>

<?php
   

	
	
	?>

<h2>Вход</h2>

<form method = "POST" action = 'enter.php'>
   <div class="form-group">
    <label for="exampleInputName2">Name</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name = "login">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
  </div>
  
   <button type="submit" class="btn btn-default">Submit</button>
</form>


<?php require_once('templates/bottom.php');?>
  