<?php
    require('../XuLy/conSQL.php');
    session_start();
    if(isset($_SESSION["isLOGIN"]) && $_SESSION["isLOGIN"] == 1)
    {
        logout();
    }
    else
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        // echo $_POST['password'];
        echo password_hash($pass , PASSWORD_DEFAULT)."<br>";
        $sql = "SELECT * FROM user WHERE userNAME='$username' AND state ='1' " ;
        echo $sql.'<br>';
        $result = conSQL::executeQuery($sql);
        if(!$result)
        {
            echo "Sai tên đăng nhập"; 
        }
        while($row = mysqli_fetch_array($result))
        {
            echo "ABC<br>";
            echo $row["userPass"]."<br>";
            // echo password_verify($pass,$row["userPass"])."</br>"; 
            if(password_verify($pass,$row["userPass"])) 
            { 
                $_SESSION["isLOGIN"] = 1;
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["AUTHENTICATION"] = $row["userAuthentication"];
                echo "Đăng nhập thành công"; 
            }else{
                echo "Sai mật khẩu";
            }
        }
    }
    // header("Location: ../index.php");
    function logout()
    {
        unset($_SESSION["userName"]);
        unset($_SESSION["AUTHENTICATION"]);
        $_SESSION['isLOGIN'] = 0;
    }

    include("./header.php");
?>