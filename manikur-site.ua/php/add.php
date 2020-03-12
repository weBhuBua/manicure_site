<?php
require_once 'config.php';
require_once 'func.php';
//echo '<pre>';
//print_r($_FILES);
//echo '</pre>';
$title = $_POST['title'];
$conn = connect();


if (isset($_FILES['image']['name'])) {
    // Загрузка файлов
    $upload_path = '../images/works/'; // путь сохранения файла
    $imgType = $_FILES['image']['name'];  // Имя файла
    $ext = substr($imgType, strpos($imgType,'.'), strlen($imgType)-1); // извлекаем расширение файла
    $fileName = uniqid('img_').$ext;
    $allowedExtensions = ['.jpg', '.jpeg', '.png'];
    $fileSize = $_FILES['image']['size'];

    if (in_array($ext, $allowedExtensions)) {
        if ($fileSize < 1000000) {
            // Загрузка файла
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_path.$fileName);

            //Вставка данных
            $sql = "INSERT INTO img (image)
            VALUES ('$fileName')";

            if (mysqli_query($conn, $sql)) {
                setcookie('recording_successful', 'ok', time() +10);
                header('Location: /php/admin.php');
            //    echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            close($conn);
        }
        else {
//            echo 'Файл слишком большой';
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Файл слишком большой';
            echo '</div>';
        }
    }
    else {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Неверный тип файла';
        echo '</div>';
    }
}

?>

    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/add.css">

        <title>Загрузка файлов</title>
    </head>
    <body>
    <div class="container container-lg container-md">
        <div class="add-file shadow-sm p-3 mb-5 bg-white rounded">
            <h2>Загрузка файлов</h2>
            <form action="" method="POST" enctype="multipart/form-data" class="file-form">
                <div class="form-group">
                    <p class="txt">Название: </p>
                    <p class="titl"><input type="text" name="title" class="form-control" placeholder="Введите название файла"></p>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile" multiple>
                        <label class="custom-file-label" for="customFile">Выберите файл</label>
                    </div>
<!--                    <p class="txt">Выбери фото: </p>-->
<!--                    <p><input name="image" type="file"></p>-->
                </div>
                <div class="form-group">
                    <p><input type="submit" value="Добавить" class="btn btn-primary btn-submit"></p>
                </div>
            </form>
        </div>
    </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

<?php
   


//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
