<?php
$firstNameError = "";
$lastNameError = "";
$userError = "";
$emailError = "";
$pswdError = "";
$confirmpswdError = "";
if(isset($_POST['info'])){
$firstName  = GetParameter($_POST['info'],"firstName");
$lastName  = GetParameter($_POST['info'],"lastName");
$user = GetParameter($_POST['info'],"user");
$email  = GetParameter($_POST['info'],"email");
$email = urldecode($email);
$password  = GetParameter($_POST['info'],"password");
$confirmpassword  = GetParameter($_POST['info'],"confirmpassword");

	if(empty($firstName)){
		$firstNameError = " Vui lòng nhập họ";
	} else{
		if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$firstName)){
			$firstNameError = "Họ gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($lastName)){
		$lastNameError = "Vui lòng nhập tên";
	} else{
		if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$lastName)){
			$lastNameError = "Tên gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($user)){
		$userError = "Vui lòng nhập tên đăng nhập";
	} else{
		if(!preg_match("/^[A-Za-z0-9]{5,32}$/",$user)){
			$userError = "Tên đăng nhập gồm 5 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($email)){
		$emailError = "Vui lòng nhập email";
	} else{
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)){
			$emailError = "Vui lòng nhập email hợp lệ";
		}
	}
	
	if(empty($password)){
		$pswdError = "Vui lòng nhập mật khẩu";
	} else{
		if(!preg_match("/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/",$password)){
			$pswdError = "Vui lòng nhập mật khẩu hợp lệ, gồm 6 kí tự trở lên bao gồm chữ in hoa, chữ thường và số";
		}
	}
	
	if(empty($confirmpassword)){
		$confirmpswdError = "Vui lòng nhập mật khẩu nhập lại";
	} else{
		if(!($password === $confirmpassword)){
			$confirmpswdError = "Mật khẩu nhập lại phải trùng với mật khẩu";
		}
	}
}
    function GetParameter($string,$sParam) {
        $sVariables = explode("&",$string);
        for ($i = 0; $i < count($sVariables); $i++){
            $sParameterName = explode("=",$sVariables[$i]);
            if ($sParameterName[0] == $sParam)
            {
                return $sParameterName[1];
            }
        }
    }
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }
    echo $firstNameError."?";
    echo $lastNameError."?";
    echo $userError."?";
    echo $emailError."?";
    echo $pswdError."?";
    echo $confirmpswdError."?";
	echo $confirmpassword."?";
	echo $email
?>
