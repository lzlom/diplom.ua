<?php
	
$db_host ='localhost';
$db_user = 'root';
$db_pass = '1111';
$db_database ='db_shop';

$link = mysql_connect($db_host,$db_user,$db_pass);
mysql_query("SET NAMES utf8");
mysql_select_db($db_database,$link) or die("Соединение отсутствует".mysql_error());

?>