<?php
    require('../XuLy/conSQL.php');
    session_start();
    $username = $_POST['username'];
    $pass = password_hash( $_POST['password'], PASSWORD_DEFAULT);
    // echo $_POST['password'];
    echo $pass;
    $sql = "SELECT * FROM user WHERE userNAME='$username' AND userPASS='$pass'";
    $result = conSQL::executeQuery($sql);
    while($row = mysqli_fetch_array($result))
    {
        $_SESSION["isLOGIN"] = 1;
        $_SESSION["userName"] = $row["userName"];
        $_SESSION["AUTHENTICATION"] = $row["AUTHENTICATION"];
        echo "Đăng nhập";  
    }
    // header("Location: ../index.php");
?>