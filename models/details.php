
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

<!-- Single Product Thumb -->
<?php
    require('./XuLy/conSQL.php');
    $query = "";
    if(isset($_GET['id']))
    {
        $query = 'SELECT * FROM sanpham WHERE idSP="'.$_GET['id'].'" ';
        $result = conSQL::executeQuery($query);
        while($row = mysqli_fetch_array($result))
        {
            $a="<ul class='product-desc'>";
            $description = explode("%",$row["DESCRIPTION"]);
            foreach($description as $s)
            {
                $a .= '<li>'.$s.'</li>' ;
            }
            $a .="</ul>";
            $out =
            '    
            <div class="single_product_thumb clearfix" style="width:300px">
                <div class="product_thumbnail_slides owl-carousel" style="width:300px heigth:300px" >
                    <img src="./img/sanpham/'.$row["IMG"].'" alt="" >
                    <img src="./img/sanpham/'.$row["IMG"].'" alt="" >
                </div>
            </div>

            <div class="single_product_desc clearfix">
                <span>'.$row["HANG"].'</span>
                <a href="cart.html">
                    <h2>'.$row["nameSP"].'</h2>
                </a>
                <p class="product-price"><span class="old-price">$65.00</span>'.number_format($row["priceSP"],0,".",".").'đ</p>
                '. $a.'
                <div class="input-group col-12 col-md-4"> 
                <span class="input-group-btn"> 
                    <button type="button" class="btn btn-success btn-number minus" data-type="minus" data-field="quant"> 
                        <i class="fas fa-minus"></i>
                    </button>
                </span> 
                <input style="height:38px;text-align:center;" name="quant" class="quality-item form-control input-number quality" value="1" min="1" max="'.$row['SL'].'" type="text"> 
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="quant"> 
                        <i class="fas fa-plus" ></i>
                    </button>
                </span> 
            </div> 
                <div class="cart-fav-box d-flex align-items-center mt-5">
                    <button name="addtocart" value="5" class="btn essence-btn" 
                    id="'.$row["idSP"].'" 
                    name="'.$row["nameSP"].'" 
                    brand="'.$row["HANG"].'" 
                    img="'.$row["IMG"].'" 
                    price="'.$row["priceSP"].'"
                    >Add to cart</button>
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </div>';
        }
    }
    echo $out;
?>
</section>
<!-- ##### Single Product Details Area End ##### -->
