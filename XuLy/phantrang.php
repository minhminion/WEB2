<?php
    require("conSQL.php");
    
    
    $record_page = 6;
    $page =" ";
    
    $where = "";

    $brand="";
    $brandName="";

    $cetorgry = "";
    $cetorgryName ="";

    /**** Search */
    $data = array();
    array_push($data,"productBrand = brandID");
    $enable = "state ='1'";
    array_push($data,$enable);
    if(isset($_POST['search']) && $_POST['search'] != "undefined" )
    {
        // echo $_POST["search"]."?";
        $search = ' productName LIKE "%'.$_POST['search'].'%"';
        array_push($data,$search);
    }
    /********** */
    

    /**** Lấy Loại */
    if(isset($_POST["cetorgry"]))
    {
        $rs = conSQL :: executeQuery('SELECT * FROM cetorgry WHERE cetorgryID = "'.$_POST["cetorgry"].'" ');
        while($row = mysqli_fetch_array($rs))
        {
            $cetorgryName = $row['cetorgryName'];
        }
        $cetorgry = 'productCetorgry="'.$_POST["cetorgry"].'"';
        array_push($data,$cetorgry);
    }
    else{
        $cetorgryName = "Tất cả";
    }
    /************* */

    /**** Lấy Nhăn Hiệu */
    if(isset($_POST["brand"]))
    {
        $rs = conSQL :: executeQuery('SELECT * FROM brand WHERE brandID = "'.$_POST["brand"].'" ');
        while($row = mysqli_fetch_array($rs))
        {
            $brandName = $row['brandName'];
        }
        echo $cetorgryName." : ".$brandName."%";
        $brand = 'productBrand="'.$_POST["brand"].'"';
        array_push($data,$brand);
    }
    else
    {
        echo  $cetorgryName."%";
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
        $where = "productBrand = brandID";
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

    $page_query = "SELECT product.*,brand.brandName FROM `product`,brand WHERE $where AND productPrice BETWEEN $min AND $max";
    // echo $page_query."?";
    $page_result = conSQL::executeQuery($page_query);
    $total_record = mysqli_num_rows($page_result); 
    $total_page = ceil($total_record/$record_page);

    echo $total_record."%";

    $output = '';
    $start_form = ($page - 1)*$record_page;
    $query = "SELECT product.*,brand.brandName FROM `product`,brand WHERE $where AND productPrice BETWEEN $min AND $max ORDER BY productPrice $sort LIMIT $start_form,$record_page";
    $result = conSQL::executeQuery($query);

    while($row = mysqli_fetch_array($result))
    {
        $output .='<div class="col-12 col-sm-6 col-lg-4" data-aos="zoom-in" data-aos-duration="850" data-aos-delay="50" data-aos-once="true">
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
                                <span>'.$row["brandName"].'</span>
                                <a href="product-details.php?id='.$row["productID"].'">
                                    <h6>'.$row["productName"].'</h6>
                                </a>
                                <p class="product-price">'.number_format($row["productPrice"],0,".",".").' Đ</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div id="'.$row["productID"].'" name="'.$row["productName"].'" brand="'.$row["brandName"].'"  img="'.$row["IMG"].'" price="'.$row["productPrice"].'" class="add-to-cart-btn">
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

    echo $output."%";
    echo $query."%";
    echo $paging;
    
?>