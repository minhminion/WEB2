<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $data = "web2";
    
    // Create connection
    $connect = mysqli_connect($servername, $username, $password,$data);
    mysqli_set_charset($connect,"UTF8");
?>