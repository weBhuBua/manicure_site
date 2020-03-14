<?php
require_once 'config.php';
require_once 'func.php';
//require_once 'entrance.php';

$conn = connect();
//var_dump($_POST['enterPassword']);
//$login = 12345;
//if ($_POST['enterPassword'] == $login) {
//echo 'helllooooooo';
//} else {
//    header('Location:  entrance.php');
//}

if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id=".$_COOKIE['id']." LIMIT 1");
    $user = mysqli_fetch_assoc($query);
    if ($user['hash'] !== $_COOKIE['hash']) {
//        mysqli_query($conn, "UPDATE users SET hash='".$hash."' WHERE id=".$user['id']);
        setcookie('id', $user['id'], time()-30*24*60*60, "/");
        setcookie('hash', $user['hash'], time()-30*24*60*60, "/");
        header('Location:  entrance.php');
    }
}
else {
    setcookie('id', "", time()  -30*24*60*60, "/");
    setcookie('hash', "", time() -30*24*60*60, "/");
    header('Location:  entrance.php');
}



if (isset($_COOKIE['recording_successful']) && $_COOKIE['recording_successful'] != '') {
    if ($_COOKIE['recording_successful'] === 'ok') {
        setcookie('recording_successful', 'ok', time() -10);
            echo '<div class="alert alert-success" role="alert">';
            echo 'Фотка загружена!';
            echo '</div>';
    }
}
//if (isset($user['id'])) {
//    echo $user['id'].'<br>';
//    echo $user['hash'].'<br>';
//    echo $hash;
//} else {
//    echo 'pizdaaaa';
//}

?>
<!-- HTML-->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/slick/slick.css"/>
    <link rel="stylesheet" href="../assets/slick/slick-theme.css"/>
    <link rel="stylesheet" href="../assets/css/style-sclick.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <title>Админ панель</title>
</head>
<body>
<div class="container container-lg container-md">
<?php
echo '<div class="admin-title"><h2 style="font-weight: bold">Админ панель</h2></div><hr><p class="logout"><a href="logout.php">Выйти</a></p><hr><hr>';
// Вывод данных
$img = select($conn);

//echo '<pre>';
//print_r($img);
//echo '</pre>';
//echo '<pre>';
//print_r($_FILES);
//echo '</pre>';
//echo '<pre>';
//////echo print_r($_GET);
//////echo '</pre>';
///
//if (empty($_POST)) {
//    echo 'NOLLLLLLLL';
//} else {
//    print_r($_POST);
//}
//print_r($_POST[$del]);
//var_dump($_POST[$del1]);
//if (isset($_POST[$del1])) {
//    echo 'hello';
//} else {
//    echo 'byyyyyy';
//}

//echo '<div style="display: flex">';
echo '<div class="admin-btn"><a href="add.php"><button class="btn btn-primary btn-lg">Добавить фото</button></a></div>';

echo '<div class="test">';

foreach ($img as $image) {
    $del = "delete{$image['id']}";
    $del1 = "del{$image['id']}";

    $imgWay = "../images/works/{$image['image']}";
    // Удаление файлов
    if (isset($_POST[$del])) {
        $imgID = $image['id'];

        $sql = "DELETE FROM img WHERE id={$imgID}";
        if (mysqli_query($conn, $sql)) {
//            echo "Record deleted successfully";
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Изображение удалено!';
            echo '</div>';
            if (file_exists("{$imgWay}")) {
                unlink("{$imgWay}");
            }
        }
    }
    ?>

    <?php

    if (file_exists("{$imgWay}")) {

        echo '<div class="test-img">';
        echo "<div><img src='{$imgWay}' alt='#'></div>";
        echo "<div class='btn'><form action='' method='POST'><input name='delete{$image['id']}'     type='submit' class='btn btn-outline-info' value='Удалить'></form></div>";
//        echo "<div><input class='btn btn-outline-info btn-del' type='button' name='del{$image['id']}' value='Delete'></div>";

        echo '</div>'; // test-img

    }

}
echo '</div>'; // test
close($conn);
?>

</div>
<!--/--Container-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--Slick -->
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous">
</script>
<script src="../assets/slick/slick.min.js"></script>
<!--<script src="../assets/js/del.js"></script>-->
<script>
    $(document).ready(function(){
        $('.test').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            responsive: false
        });
    });
</script>

</body>
</html>

