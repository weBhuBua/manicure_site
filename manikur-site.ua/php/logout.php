<?php
require_once 'config.php';
require_once 'func.php';

setcookie('id', '', time() -30*24*60*60, "/");
setcookie('hash', '', time() -30*24*60*60, "/");
unset($_COOKIE);
header('Location:  entrance.php');
