<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $db = "registration";

    $connect = mysqli_connect($server,$username, $password,$db);

    if(!$connect){
        echo 'connection unsuccessfull';
    }
?>