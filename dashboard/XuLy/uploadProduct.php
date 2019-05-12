<?php
    $error ="";

    $productId="";
    $productName="";
    $productCetorgry="";
    $productBrand="";
    $productPrice="";
    $productAmount="";
    $img="abc";

    if  (isset($_POST['productId']) && isset($_POST['productName']) && isset($_POST['productCetorgry']) && 
        isset($_POST['productBrand']) && isset($_POST['productPrice']) && isset($_POST['productAmount']))
    {
        $img = "OK";
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productCetorgry = $_POST['productCetorgry'];
        $productBrand = $_POST['productBrand'];
        $productPrice = $_POST['productPrice'];
        $productAmount = $_POST['productAmount'];

        if(isset($_FILES['productImg']))
        {
            if($_FILES['productImg']["error"] > 0)
            {
                $error ="Lỗi hình ảnh";
                $img ="noImage.png";
            }
            else{
                move_uploaded_file($_FILES['productImg']['tmp_name'],'./'.$_FILES['productImg']['name']);
                $img = $_FILES['productImg']['name'];
            }
        }
    }
    echo $img;
?>