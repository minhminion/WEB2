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
                    $item->upQuality();
                    $flag = false;
                }
            }
            if($flag)
            {
                $item = new Item;
                $item->__contruct($_POST['id'],$_POST['name'],$_POST['brand'],$_POST['img'],$_POST['price']);
                array_push($_SESSION['id'],$item);
            }
        }

    }
    else
    {
        $_SESSION['id'] = array();
    }     
    
/*
    foreach($_SESSION['id'] as $item)
    {
        print_r($item->toString());
    }
*/
    include("cartBag.php");
   // echo $_SESSION["id"];
/*
    $query = 'SELECT * FROM sanpham WHERE idSP="'.$_SESSION['id'].'"';
    $result = mysqli_query($connect,$query);
    if(!$result)
    {
    echo "Fail";
    exit;
    }
    $output = "";
    while($row = mysqli_fetch_array($result))
    {    
        $output .= '<div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img src="./img/sanpham/'.$row['idSP'].'.jpg" class="cart-thumb" alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">'.$row['HANG'].'</span>
                                <h6>'.$row['nameSP'].'</h6>
                                <p class="size">Số lượng: 1</p>
                                <p class="price">'.number_format($row["priceSP"],0,".",".").'</p>
                            </div>
                        </a>
                    </div>';
    }
    echo $output;
*/
?>