<?php
//
    include("./myClass.php");
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