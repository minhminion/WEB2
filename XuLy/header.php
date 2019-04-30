<?php
    $user = " ";
    if(isset($_SESSION["isLOGIN"]) && $_SESSION["isLOGIN"] == "1")
    {
        $customer = $_SESSION['user'];
        $user = $customer->userName;
        $user = '<div class="user-login-info" data-toggle="modal" data-target="#logout">
                <a style="width:12em;"> Chào,'.$customer->userName.' </a>
                </div>';
    }
    else
    {
        
        $user = '<div class="user-login-info" data-toggle="modal" data-target="#login">
                <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>';
    }

    $userInfo = " ";
    if(isset($_SESSION['isLOGIN']) && $_SESSION["isLOGIN"] == 1)
    {
        $customer = $_SESSION['user'];
        $userInfo =   '<div class="mb-1"><strong> Họ và tên :</strong> '.$customer->firstName.' '.$customer->lastName.'</div><br>'.
                    '<div class="mb-1"><strong> Email :</strong> '.$customer->email.'</div><br>'.
                    '<button type="button" class="btn btn-primary mb-1">Xem các đơn hàng</button>
                    <form id="logout-form">
                        <div class="row">
                            <div class="col-md-12 mb-3 mt-3">
                                <input type="submit" class="form-control" value="Đăng xuất">
                            </div>
                        </div>
                    </form>';   
    }
    
    $output = new stdClass();
    $output->user = $user;
    $output->userInfo = $userInfo;

    return $output;
?>