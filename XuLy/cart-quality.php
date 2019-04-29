<?php
    include("./myClass.php");
    session_start();
    $quality = 0;
    if(isset($_POST['id']) &&  isset($_POST['quality']) && isset($_SESSION['id']))
    {
        $id = $_POST['id'];
        $quality = $_POST['quality'];
        foreach($_SESSION['id'] as $item )
        {
            if($item->id == $id)
            {
                $item->upQuality($quality);
                $quality = $item->quality;

                echo $quality;

                exit;
            }
        }
    }

    
?>