<?php
require_once 'config.php';
require_once 'func.php';

$conn = connect();

if (isset($_COOKIE['id']) && isset($_COOKIE['hash'])) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id=" . $_COOKIE['id'] . " LIMIT 1");
    $user = mysqli_fetch_assoc($query);
    if ($user['hash'] !== $_COOKIE['hash']) {
//        mysqli_query($conn, "UPDATE users SET hash='".$hash."' WHERE id=".$user['id']);
        setcookie('id', $user['id'], time() - 30 * 24 * 60 * 60, "/");
        setcookie('hash', $user['hash'], time() - 30 * 24 * 60 * 60, "/");
        header('Location:  entrance.php');
    }
} else {
    setcookie('id', "", time() - 30 * 24 * 60 * 60, "/");
    setcookie('hash', "", time() - 30 * 24 * 60 * 60, "/");
    header('Location:  entrance.php');
}


if (isset($_COOKIE['recording_successful']) && $_COOKIE['recording_successful'] != '') {
    if ($_COOKIE['recording_successful'] === 'ok') {
        setcookie('recording_successful', 'ok', time() - 10);
        echo '<div class="alert alert-success" role="alert">';
        echo 'Фотка загружена!';
        echo '</div>';
    }
}

?>

<!-- HTML-->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <title>Админ панель</title>
</head>
<body>
<?php
echo '<div class="admin-title"><h2 style="font-weight: bold">Админ панель</h2></div><hr><p class="logout"><a href="logout.php">Выйти</a></p><hr><hr>';

echo '<div class="admin-btn"><a href="add.php"><button class="btn btn-primary btn-lg">Добавить фото</button></a></div>';

// Вывод данных
$img = select($conn);

echo '<div class="album py-5">';
echo '<div class="container">';

echo '<div class="row">';
?>

<!--// Вывод картинок -->
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

            <?php

            foreach ($img as $image) {
                $del = "delete{$image['id']}";

                $imgWay = "../images/works/{$image['image']}";

                // Удаление файлов
                if (isset($_POST[$del])) {
                    $imgID = $image['id'];
                    // Удаление с БД
                    $sql = "DELETE FROM img WHERE id={$imgID}";
                    if (mysqli_query($conn, $sql)) {
//            echo "Record deleted successfully";
//            echo '<div class="alert alert-danger" role="alert">';
//            echo 'Изображение удалено!';
//            echo '</div>';


                    }
                    // Удаление с сервера
                    if (file_exists($imgWay)) {
                        unlink($imgWay);
                    } else {


                    }
                }// if
                ?>

                <?php
                if (file_exists($imgWay)) {
                    ?>

                    <div class="col-md-4 col-sm-4">
                        <div class="card mb-4 shadow-sm">
                            <?php
                            // Вывод самой картинки
                            echo "<div class='bd-placeholder-img card-img-top' ><img src='{$imgWay}' alt='' width = '100%' height = '330' focusable = 'false' role = 'img' class='col_img'></div>";
                            ?>


                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php
                                        // Вывод кнопки "Удалить"
                                        echo "<form method='POST'><button name='delete{$image['id']}' class='btn btn-outline-info'>Удалить</button></form>";
                                        ?>
                                    </div>
                                    <?
                                    // Вывод номера изображения
                                    echo "<small class='text-muted'>{$image['id']}</small>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                } //if


            } // foreach

            close($conn);
            ?>
        </div>
        <!--/ row  -->
    </div>
    <!--/ container  -->
</div>
<!--/ albom py-5  -->

<!--==============================================================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


</body>
</html>