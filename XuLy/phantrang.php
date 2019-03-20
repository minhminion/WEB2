<?php
    require("conSQL.php");


    $record_page = 6;
    $page =" ";

    if(isset($_POST["page"]))
    {
        $page = $_POST["page"];
    }
    else{
        $page = 1;
    }
    /**** Lấy Nhăn Hiệu */
    if(isset($_POST["brand"]))
    {

        $where = 'WHERE HANG="'.$_POST["brand"].'"';
  //      echo "<h1>".$where."</h1>";
    }
    else
    {
        $where = "";
    }
    ////////////////////
    
    $page_query = "SELECT * FROM sanpham $where";
    $page_result = mysqli_query($connect, $page_query);
    $total_record = mysqli_num_rows($page_result); 
    $total_page = ceil($total_record/$record_page);

    $output = '<div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p>Tìm thấy : <span>'.$total_record.'</span></p>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <p>Sắp xếp:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="value">Giá cao - thấp</option>
                                            <option value="value">Mới nhất</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" >';
    $start_form = ($page - 1)*$record_page;
    $query = "SELECT * FROM sanpham $where LIMIT $start_form,$record_page";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result))
    {
        $output .='<div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="./img/sanpham/'.$row["IMG"].'" alt="">

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>'.$row["HANG"].'</span>
                                <a href="single-product-details.html">
                                    <h6>'.$row["nameSP"].'</h6>
                                </a>
                                <p class="product-price">'.number_format($row["priceSP"],0,".",".").' Đ</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div id="'.$row["idSP"].'" name="'.$row["nameSP"].'" brand="'.$row["HANG"].'"  img="'.$row["IMG"].'" price="'.$row["priceSP"].'" class="add-to-cart-btn">
                                        <a class="btn essence-btn" style="color:white;">Mua Ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
    $output .="</div></div>";
if($page == 1)
{
    $prev = 1;
    $next = $page + 1;
}
elseif($page == $total_page)
{
    $prev = $page - 1;
    $next = $total_page;
}
else
{    
    $prev = $page - 1;
    $next = $page + 1;
}

    $output .='<nav aria-label="navigation">
                <ul class="pagination mt-50 mb-70">
                <li class="page-item" id="'.$prev.'"><a class="page-link"><i class="fa fa-angle-left"></i></a></li>';



    for($i = 1 ; $i <= $total_page ; $i++)
    {
        $output .= '<li class="page-item" id="'.$i.'"><a class="page-link">'.$i.'</a></li>';
    }
    $output .='<li class="page-item" id="'.$next.'"><a class="page-link"><i class="fa fa-angle-right"></i></a></li></ul></nav>';

    echo $output
?>