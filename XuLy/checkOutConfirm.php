<?php
    include("./myClass.php");
    require("./conSQL.php");
    session_start();
    $isLogin = false;
    $isBagEmpty = true;
    $isAddressError = true;
    $error='';

    $userName = $_POST['userName'];
    $userId = $_POST['userId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $country = $_POST['country'];
    $street_address = $_POST['street_address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $receiptSQL="";

    if(isset($_SESSION['isLOGIN']) && $_SESSION['isLOGIN'] == 1)
    {
        $isLogin = true;
    }
    if(isset($_SESSION['id']) && !empty($_SESSION['id']))
    {
        $isBagEmpty = false;
    }

    // Kiểm tra địa chỉ đơn hàng
    if(empty($firstName)){
        $error = " Vui lòng nhập họ";
    } 
    else if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$firstName))
    {
        $error = "Họ gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
    }
    else if(empty($lastName))
    {
        $error = "Vui lòng nhập tên";
    } 
    else if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$lastName))
    {
        $error = "Tên gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
    }
    else if(empty($street_address)){
        $error = "Vui lòng nhập địa chỉ";
    }   
    else if(empty($phone)){
        $error = "Vui lòng số điện thoại ";
    }   
    else if(empty($email)){
        $error = "Vui lòng nhập email";
    } 
    else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email))
    {
        $error = "Vui lòng nhập email hợp lệ";
    }

    if(empty($error))
    {
        $isAddressError = false;
    }

    if($isLogin == true
        && $isBagEmpty == false
        && $isAddressError == false)
    {
        $total = 0;
        foreach($_SESSION['id'] as $key => $item)
        {
            $total += $item->price*$item->quality;
            $receiptDetailSQL ='INSERT INTO receiptdetail VALUES ("","'.$userName.'","'.$firstName.'","'.$lastName.'","'.$country.'","'.$phone.'","'.$email.'","'.$description.'")';
        }

        $total = $total/100*(100-15);
        $receiptSQL='INSERT INTO receipt VALUES ("","'.$userName.'","'.$firstName.'","'.$lastName.'","'.$country.'","'.$street_address.'",
                                                    "'.$phone.'","'.$email.'","'.$description.'",'.$total.',"'.date("Y-m-d H:i:s").'")';
        conSQL :: executeQuery($receiptSQL);


    }

    $error = '<div class="alert alert-danger" role="alert" data-aos="fade-left">
                    '.$error.'
                </div>';

    $myObj = new stdClass();
    $myObj->isLogin = $isLogin;
    $myObj->isBagEmpty = $isBagEmpty;
    $myObj->isAddressError = $isAddressError;
    $myObj->error = $error;
    $myObj->sql = $receiptSQL;

    echo json_encode($myObj);
?>