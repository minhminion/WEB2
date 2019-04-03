<?php

$firstNameError = "";
$lastNameError = "";
$userError = "";
$emailError = "";
$pswdError = "";
$confirmpswdError = "";

if(isset($_POST['submit'])){
	if(empty($_POST['firstName'])){
		$firstNameError = "Họ không được để trống. Vui lòng nhập họ";
	} else{
		$firstName = test_input($_POST['firstName']);
		if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$firstName)){
			$firstNameError = "Họ gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($_POST['lastName'])){
		$lastNameError = "Tên không được để trống. Vui lòng nhập tên";
	} else{
		$lastName = test_input($_POST['lastName']);
		if(!preg_match("/^[a-zA-Z _ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}+$/",$lastName)){
			$lastNameError = "Tên gồm 2 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($_POST['user'])){
		$userError = "Tên đăng nhập không được để trống. Vui lòng nhập tên đăng nhập";
	} else{
		$user = test_input($_POST['user']);
		if(!preg_match("/^[A-Za-z0-9]{5,32}$/",$user)){
			$userError = "Tên đăng nhập gồm 5 kí tự trở lên, không bao gồm kí tự đặc biệt";
		}
	}
	
	if(empty($_POST['email'])){
		$emailError = "Email không được để trống. Vui lòng nhập tên đăng nhập";
	} else{
		$email = test_input($_POST['email']);
		if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3})+$/",$email)){
			$emailError = "Vui lòng nhập email hợp lệ";
		}
	}
	
	if(empty($_POST['password'])){
		$pswdError = "Mật khẩu không được để trống. Vui lòng nhập mật khẩu";
	} else{
		$pswd = test_input($_POST['password']);
		if(!preg_match("/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/",$pswd)){
			$pswdError = "Vui lòng nhập mật khẩu hợp lệ, gồm 6 kí tự trở lên bao gồm chữ in hoa, chữ thường và số";
		}
	}
	
	if(empty($_POST['confirm_password'])){
		$confirmpswdError = "Mật khẩu nhập lại không được để trống. Vui lòng nhập mật khẩu nhập lại";
	} else{
		$confirmpswd = test_input($_POST['confirm_password']);
		if(!preg_match($confirmpswd,$pswd)){
			$confirmpswdError = "Mật khẩu nhập lại phải trùng với mật khẩu";
		}
	}
}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
