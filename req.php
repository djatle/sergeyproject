<?php require_once('templates/top.php');?>
<?php require_once('class/Auth.php');?>


<h2>Регистрация</h2>
<?php



      if ($_POST) 
	  {
		  $obj = new Auth( $_POST['Login'], $_POST['Email'], $_POST['Password'], $_POST['Passwordagain']);
		  if(count($obj->err)>0){
			  print_r($obj->err);
		  }   else {
			  mysql_query($obj->reg());
		  ?>
          <script>
            document.location.href = 'index.php';
           </script>
            <?php
		  
		  }        
						   
	  }

	  ?>
<form method = "POST" action = 'req.php'>
 
  <div class="form-group">
    <label for="exampleInputName2">Name</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe" name = "Login">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='Password'>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="Passwordagain">
  </div>
  
 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
