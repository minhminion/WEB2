<?php
    require('../XuLy/conSQL.php');
    session_start();

    $myObj = new stdClass();
    $islogin = true;
    $loginSuccess = false;
    $output = ' <div class="alert alert-danger" role="alert" data-aos="fade-left">
                    Sai tài khoản hoặc mật khẩu !!!
                </div>';
            
    if(isset($_SESSION["isLOGIN"]) && $_SESSION["isLOGIN"] == 1)
    {
        logout();
        $islogin = false;
        $output = include("./header.php");
    }
    else
    {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM user WHERE userNAME='$username' AND state ='1' " ;
        $result = conSQL::executeQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            if(password_verify($pass,$row["userPass"])) 
            { 
                $loginSuccess = true;
                $islogin = true;
                $_SESSION["isLOGIN"] = 1;
                $_SESSION["userName"] = $row["userName"];
                $_SESSION["AUTHENTICATION"] = $row["userAuthentication"];
                $output = include("./header.php");
            }
        }
    }
    $myObj->islogin = $islogin;
    $myObj->login = $loginSuccess;
    $myObj->output = $output;

    echo json_encode($myObj);

    // header("Location: ../index.php");
    function logout()
    {
        unset($_SESSION["userName"]);
        unset($_SESSION["AUTHENTICATION"]);
        $_SESSION['isLOGIN'] = 0;
    }
?>