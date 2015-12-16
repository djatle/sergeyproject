<?php 
 $db_location = 'localhost';  //значение не изменится 
 $db_name = 'sergeyproject';  // имя базы данных, создаст Компания
 $db_user = 'root';           // имя созданное хост-компанией
 $db_password = '';
 
 $db_con = mysql_connect($db_location, $db_user, $db_password);
 
 if (!$db_con){
	 exit('Server error');
 }
 
 $db_sel = mysql_select_db($db_name, $db_con);
 
 if(!$db_sel){
	 exit('use db error');
 }
 
@mysql_query("SET NAMES 'utf-8'");  //@ подавляет вывод ошибки