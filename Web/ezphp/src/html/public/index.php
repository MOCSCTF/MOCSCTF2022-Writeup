<?php
include_once "../vendor/autoload.php";

error_reporting(0);
session_start();

define("UPLOAD_PATH", "/tmp");

if (!empty($_FILES['file'])) {
    $file = $_FILES['file'];
    if ($file['size'] < 1024 * 1024) {
        $upload_file = "/tmp"."/".$file['name'];
        if (move_uploaded_file($file['tmp_name'], $upload_file)) {
            echo $upload_file;
        } else {
            echo "no no no";
        }
    } else {
        echo "no no no";
    }
} else {
    echo <<<CODE
<html>
    <head>
        <title>ezphp</title>
    </head>
    <body>
        <form action="index.php" method="post" enctype="multipart/form-data">
            FILE: <input type="file" name="file">
            <input type="submit">
        </form>
    </body>
</html>
CODE;
phpinfo();
}