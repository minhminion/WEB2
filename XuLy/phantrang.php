<?php
    require("conSQL.php");


    $record_page = 6;
    $page =" ";

    $where = "";
    /**** Search */
    $data = array();
    if(isset($_POST['search']))
    {
        // echo $_POST["search"]."?";
        $search = ' nameSP LIKE "%'.$_POST["search"].'%"';
        array_push($data,$search);
    }
    /********** */
    

    /**** Lấy Nhăn Hiệu */
    if(isset($_POST["brand"]))
    {
        echo "Bàn Phím : ".$_POST["brand"]."?";
        $brand = 'HANG="'.$_POST["brand"].'"';
        array_push($data,$brand);
    }
    else
    {
        echo "Bàn Phím?";
    }
    /************ */

    /******* Tao SQL WHERE*/
    for($i = 0 ; $i < count($data); $i++)
    {
        if($i+1 == count($data))
        {
            $where .= $data[$i] ;
        }
        else
        {
            $where .= $data[$i]." AND ";
        }
    }
    if($where == "")
    {
        $where = 1;
    }
    /******** */

    /***** Pagging */
    if(isset($_POST["page"]))
    {
        $page = $_POST["page"];
    }
    else{
        $page = 1;
    }
    /**** */
    
    /**** SORT */
    if(isset($_POST['order']))
    {
        $sort = $_POST['order'];
    }
    else{
        $sort = "DESC";
    }
    /************* */
    
    /*** Tim theo gia */

    $min = isset($_POST['min'])?$min = $_POST['min']*1000000:$min = 0;
    $max = isset($_POST['max'])?$max = $_POST['max']*1000000:$max = 10000000;
    /****** */

    $page_query = "SELECT * FROM sanpham WHERE $where AND priceSP BETWEEN $min AND $max";
    // echo $page_query."?";
    $page_result = mysqli_query($connect, $page_query);
    $total_record = mysqli_num_rows($page_result); 
    $total_page = ceil($total_record/$record_page);

    echo $total_record."?";

    $output = '';
    $start_form = ($page - 1)*$record_page;
    $query = "SELECT * FROM sanpham WHERE $where AND priceSP BETWEEN $min AND $max ORDER BY priceSP $sort LIMIT $start_form,$record_page";
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
    $output .="</div>";
if($page == 1)
{
    $prev = 1;
    $next = $page +1 ;
    if($page == $total_page)
    {
        $next = $total_page;
    }
}
else
{    
    $prev = $page - 1;
    $next = $page + 1;
}
    $paging = "";
    $paging .=' <ul class="pagination mt-50 mb-70">
                <li class="page-item" id="'.$prev.'"><a class="page-link"><i class="fa fa-angle-left"></i></a></li>';



    for($i = 1 ; $i <= $total_page ; $i++)
    {
        $paging .= '<li class="page-item" id="'.$i.'"><a class="page-link">'.$i.'</a></li>';
    }
    $paging .='<li class="page-item" id="'.$next.'"><a class="page-link"><i class="fa fa-angle-right"></i></a></li></ul>';

    echo $output."?";
    echo $query."?";
    echo $paging;
?>