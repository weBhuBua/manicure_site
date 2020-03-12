<?php
require_once 'config.php';
require_once 'func.php';

$conn = connect();
if (isset($_COOKIE['recording_successful']) && $_COOKIE['recording_successful'] != '') {
    if ($_COOKIE['recording_successful'] === 'ok') {
        setcookie('recording_successful', 'ok', time() -10);
        echo '<div class="alert alert-success" role="alert">';
        echo 'Фотка загружена!';
        echo '</div>';
    }
}

echo '<form method="get"><input type="text" name="test"></form>';

if (empty($_FILES)) {
    echo 'NOLLLLLLLL';
} else {
    var_dump($_FILES);
}
?>



