<?php
require_once 'config.php';
require_once 'func.php';

$login1 = 12345;

//echo $hash;
$conn = connect();

if (isset($_POST['enterPassword']) && trim($_POST['enterPassword'] != '')) {
    $password = $_POST['enterPassword'];
    $login = $_POST['login'];
    $query = mysqli_query($conn, "SELECT id, password FROM users WHERE login = '".$login."' LIMIT 1");
    $row = mysqli_fetch_assoc($query);
//    var_dump($row['password']);
    if ($row['password'] == md5($_POST['enterPassword'])) {
        $hash = generationHash();
        mysqli_query($conn, "UPDATE users SET hash='".$hash."' WHERE id=".$row['id']);
        setcookie('id', $row['id'], time() + 30*24*60*60);
        setcookie('hash', $hash, time() + 30*24*60*60, null, null, null, true);
        header('Location:  admin.php');
        exit();
    }
    else {

    }

} else {
//    header('Location:  entrance.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/enter.css">
    <title>Вход</title>
</head>
<?php

?>

<body>

    <div class="container">

        <div class="enter">
            <form method="POST">
                <p>Введите логин: <input type="text" name="login" required></p>
                <p>Введите пароль: <input type="password" name="enterPassword" required></p>
                <p><input type="submit" value="Войти"></p>

            </form>
<!--            <a href="php/authorization.php" class="enter">Войти</a>-->
<!--            <a href="php/reg.php" class="reg">Зарегистрироваться</a>-->

        </div>
    </div>

</body>
</html>