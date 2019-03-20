<?php
    session_start();
    foreach($_SESSION['id'] as $item)
    {
        if($_POST["id"] == $item->id)
        {
            unset($item);
        }
    }
    include("cartBag.php");
?>