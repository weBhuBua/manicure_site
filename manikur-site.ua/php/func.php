<?php

require_once 'config.php';

//Подключение к базе
function connect() {// Create connection
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    // kodirovka
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Выборка с базы
function select($conn) {
    $sql = "SELECT * FROM img";
    $result = mysqli_query($conn, $sql);

    $img = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $img[] = $row;
        }
    }
    return $img;
}

function generationHash() {
    $symbol = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    $code = "";
    for ($i = 0; $i < 15; $i++) {
        $code .= $symbol[rand(0, strlen($symbol) - 1)];
    }

    return $code;
}

// Закрытие базы
function close($conn) {
    mysqli_close($conn);
}


