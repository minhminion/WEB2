<?php
class Item
{
    var $id= "";
    var $name = "";
    var $brand = "";
    var $img = "";
    var $price = "";
    var $quality = 1;
    function __contruct($id,$name,$brand,$img,$price)
    {
        $this->id .= $id; 
        $this->name .= $name; 
        $this->brand .= $brand; 
        $this->img .= $img;
        $this->price .= $price; 

    }
    function toString()
    {
        return  $this->id . 
        $this->name .
        $this->brand .
        $this->img.
        $this->price;
    }
    function upQuality()
    {
        $this->quality++;
    }

}

    session_start();
    for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
    {
        if($_POST["id"] == $_SESSION['id'][$i]->id)
        {
            unset($_SESSION['id'][$i]);
            $_SESSION['id'] = array_values($_SESSION['id']);
        }

        // echo $item->id;
    }

    include("cartBag.php");
?>