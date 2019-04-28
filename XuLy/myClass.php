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
?>