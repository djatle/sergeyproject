<?php session_start();?>
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "sergeyproject");        
define("DB_PORT", 3307);
?>

<!Docktype html>
<html>
<script src= "../media/js/jquery.min.js"></script>
<meta charset = "utf-8">
<meta name = "description" content = "">
<meta name = "keywords" content = "">
<meta name = "author" content = "">
<link type = "text/css"
href = "media/bootstrap/css/bootstrap.min.css"
rel = "stylesheet">
<link type = "text/css"
href = "media/css/style.css"
rel = "stylesheet">
<title>
Название Сайта
</title>


<body id = "body">

<header id= "header">
<img class = "logo" src = "media/img/logo.png">


<h1>Теплый ламповый разработчик</h1>


</header>
<nav class = "top-menu">
 <a href = "index.php?url=index"> Главная</a>
 <a href = "index.php?url=goods"> Товары</a>
 <a href = "index.php?url=services"> Услуги</a>
 <a href = "index.php?url=contact"> Контакты</a>
 <a href = "../cats.php"> Коты</a>
 <?php 
 if($_SESSION['id'])
 { ?>
 <a href = "logout.php">Выход</a>
 <a href = "cabinet.php">Кабинет</a>
 <?;}
 
  else {
  ?><a href = "enter.php">Вход</a>
   <a href = "reg.php">Регистрация</a>
  <?;}
  ?>

 
 </nav> 

<div class = "content">
  <div id = "left" class = "col-md-3">
  
  <a href = "#" class = 'btn btn-warning btn-block'>
  Разработка сайтов</a>
    <a href = "#" class = 'btn btn-warning btn-block'>
  Сопровождение и поддержка</a>
    <a href = "#" class = 'btn btn-warning btn-block'>
  SEO-продвижение</a>
    <a href = "#" class = 'btn btn-warning btn-block'>
  Корпоративное обучение</a>
    <a href = "#" class = 'btn btn-warning btn-block'>
  Монтаж оборудования</a>
  
  <?php if ($_SESSION['id']){
echo $_SESSION['id'];}
else{
echo "авторизация не прошла";}
?>
  </div>
   <div class = "col-md-6">