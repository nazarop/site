<?php
$bd_server = "localhost";// Скрипт создан у Reio https://vk.com/xater0

$bd_login = 'u1049356_345';//логин базы данных

$bd_pass = 'u1049356_345';//пароль базы данных

$bd_name = 'u1049356_345';//имя базы данных
 
mysql_connect($bd_server, $bd_login, $bd_pass)//параметры в скобках ("хост", "имя пользователя", "пароль")
or die("<p>Ошибка подключения к базе данных!</p>");
mysql_select_db($bd_name)//параметр в скобках ("имя базы, с которой соединяемся")
 or die("<p>Ошибка выбора базы данных!</p>");
mysql_query("SET NAMES utf8");

?>
