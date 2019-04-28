<?php
    $output = "";
    if(isset($_SESSION["isLOGIN"]) && $_SESSION["isLOGIN"] == "1")
    {
        $output = '<div class="user-login-info" data-toggle="modal" data-target="#logout">
                <a style="width:12em;"> Chào,'.$_SESSION['userName'].' </a>
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