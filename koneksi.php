<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "data_santri";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($connection) {
} else {
    echo "Koneksi Gagal! : " . mysqli_connect_error();
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
</head> -->