<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        $customer = $_SESSION['user'];

        $myObj = new stdClass();
        $myObj->userId = $customer->userId;
        $myObj->firstName = $customer->firstName;
        $myObj->lastName = $customer->lastName;
        $myObj->email = $customer->email;
        echo json_encode($myObj);
    }
?>