<?php
    require("./../../XuLy/conSQL.php");

    $id = "";
    $name = "";
    $category = "";
    $brand = '';
    $price = '';
    $amount = '';
    $description = '';

    if($_POST)
    {
        $id = $_POST['id'];
        $sql='SELECT * FROM product WHERE productID = "'.$id.'"';
        $rs = conSQL :: executeQuery($sql);
        while($row = mysqli_fetch_array($rs))
        {
            $name = $row['productName'];
            $category = $row['productCetorgry'];
            $brand = $row['productBrand'];
            $price = $row['productPrice'];
            $amount = $row['productAmount'];
            $description = $row['productDescription'];
        }
    }

    $myProduct = new stdClass();
    $myProduct->id = $id;
    $myProduct->name = $name;
    $myProduct->category = $category;
    $myProduct->brand = $brand;
    $myProduct->price = $price;
    $myProduct->amount = $amount;
    $myProduct->description = $description;

    echo json_encode($myProduct);
?>