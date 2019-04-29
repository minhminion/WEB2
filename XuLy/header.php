<?php
    $output = "";
    if(isset($_SESSION["isLOGIN"]) && $_SESSION["isLOGIN"] == "1")
    {
        $customer = $_SESSION['user'];
        $output = $customer->userName;
        $output = '<div class="user-login-info" data-toggle="modal" data-target="#logout">
                <a style="width:12em;"> Chào,'.$customer->userName.' </a>
                </div>';
    }
    else
    {
        
        $output = '<div class="user-login-info" data-toggle="modal" data-target="#login">
                <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>';
    }
    return $output;
?>