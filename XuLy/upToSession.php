<?php
//
class Item
{
    var $id= "";
    var $name = "";
    var $brand = "";
    var $img = "";
    var $price = "";
    var $quality = 1;
    function __contruct($id,$name,$brand,$img,$price,$quality)
    {
        $this->id .= $id; 
        $this->name .= $name; 
        $this->brand .= $brand; 
        $this->img .= $img;
        $this->price .= $price; 
        $this->quality = $quality;
    }
    function toString()
    {
        return  $this->id . 
        $this->name .
        $this->brand .
        $this->img.
        $this->price;
    }
    function upQuality($quality)
    {
        $this->quality = $this->quality + $quality;
    }

}

    session_start();
//    echo sizeof($_SESSION['id']);
   
    if(isset($_SESSION['id']))
    {
        if(isset($_POST['id']))
        {
            $flag = true;
            foreach($_SESSION['id'] as $item)
            {
                if($_POST['id'] == $item->id)
                {
                    $quality = isset($_POST['quality']) ? $_POST['quality'] : 1;
                    $item->upQuality($quality);
                    $flag = false;
                }
            }
            if($flag)
            {
                $item = new Item;
                $quality = isset($_POST['quality']) ? $_POST['quality'] : 1;
                $item->__contruct($_POST['id'],$_POST['name'],$_POST['brand'],$_POST['img'],$_POST['price'],$quality);
                array_push($_SESSION['id'],$item);
            }
        }

    }
    else
    {
        $_SESSION['id'] = array();
    }     
    include("cartBag.php");
?>