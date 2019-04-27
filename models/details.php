
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

<!-- Single Product Thumb -->
<?php
    require('./XuLy/conSQL.php');
    $query = "";
    if(isset($_GET['id']))
    {
        $query = 'SELECT product.*,brand.brandName FROM product,brand WHERE productID="'.$_GET['id'].'" AND productBrand = brandID ';
        $result = conSQL::executeQuery($query);
        while($row = mysqli_fetch_array($result))
        {
            $a="<ul class='product-desc'>";
            $description = explode("%",$row["productDescription"]);
            foreach($description as $s)
            {
                $a .= '<li>'.$s.'</li>' ;
            }
            $a .="</ul>";
            // echo $a;
            $out =
            '    
            <div class="single_product_thumb clearfix" style="width:300px">
                <div class="product_thumbnail_slides owl-carousel" style="width:300px heigth:300px" >
                    <img src="./img/sanpham/'.$row["IMG"].'" alt="" >
                    <img src="./img/sanpham/'.$row["IMG"].'" alt="" >
                </div>
            </div>

            <div class="single_product_desc clearfix">
                <span>'.$row["brandName"].'</span>
                <a href="cart.html">
                    <h2>'.$row["productName"].'</h2>
                </a>
                <p class="product-price"><span class="old-price">$65.00</span>'.number_format($row["productPrice"],0,".",".").'đ</p>
                '. $a.'
                <div class="input-group col-12 col-md-4"> 
                <span class="input-group-btn"> 
                    <button type="button" class="btn btn-success btn-number minus" data-type="minus" data-field="quant"> 
                        <i class="fas fa-minus"></i>
                    </button>
                </span> 
                <input style="height:38px;text-align:center;" name="quant" class="quality-item form-control input-number quality" value="1" min="1" max="'.$row['productAmount'].'" type="text"> 
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="quant"> 
                        <i class="fas fa-plus" ></i>
                    </button>
                </span> 
            </div> 
                <div class="cart-fav-box d-flex align-items-center mt-5">
                    <button name="addtocart" value="5" class="btn essence-btn" 
                    id="'.$row["productID"].'" 
                    name="'.$row["productName"].'" 
                    brand="'.$row["brandName"].'" 
                    img="'.$row["IMG"].'" 
                    price="'.$row["productPrice"].'"
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
