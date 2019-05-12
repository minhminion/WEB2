<?php
    require("./../../XuLy/conSQL.php");
    $page="";
    if(isset($_POST["page"]))
    {
        $page = $_POST["page"];
    }
    else{
        $page = 1;
    }

    $record_page = 5;

    $page_query = "SELECT * FROM product WHERE 1";
    $page_result = conSQL::executeQuery($page_query);
    $total_record = mysqli_num_rows($page_result); 
    $total_page = ceil($total_record/$record_page);


    $output = '';
    $start_form = ($page - 1)*$record_page;
    $query = "SELECT * FROM product,cetorgry,brand WHERE productCetorgry = cetorgryID AND productBrand=brandID LIMIT $start_form,$record_page";
    $result = conSQL::executeQuery($query);

    while($row = mysqli_fetch_array($result))
    {
        $output .=' <tr class="tr-shadow">
                        <td>'.$row['productID'].'</td>
                        <td class="desc">'.$row['productName'].'</td>
                        <td>'.$row['cetorgryName'].'</td>
                        <td>'.$row['brandName'].'</td>
                        <td>
                            lori@example.com_create_guid
                        </td>
                        <td>'.$row['productAmount'].'</td>
                        <td>'.number_format($row['productPrice'],0,".",".").'</td>
                        <td>
                            '.productStatus($row['state']).'
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                    <i class="zmdi zmdi-mail-send"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>';
}
    $prev = $page - 1;
    $next = $page + 1;

    if($page == 1)
    {
        $prev = 1;
    }
    else if($page == $total_page)
    {
        $next = $page;
    }  
    $paging = "";
    $paging .=' <ul class="pagination justify-content-center mt-50 mb-70">
                <li class="page-item" id="'.$prev.'"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>';



    for($i = 1 ; $i <= $total_page ; $i++)
    {
        if($i == $page)
        {
            $paging .= '<li class="page-item active" id="'.$i.'"><a class="page-link">'.$i.'</a></li>';
        }
        else
        {
            $paging .= '<li class="page-item" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
        }
    }
    $paging .='<li class="page-item" id="'.$next.'"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li></ul>';

    $myobj = new \stdClass();
    $myobj->output = $output;
    $myobj->total = $total_page;
    $myobj->paging = $paging;

    echo json_encode($myobj);

    function productStatus($status)
    {
        $out='<span class="status--denied">Tạm ngưng</span>';
        if($status == 1)
        {
            $out='<span class="status--process">Đang bán</span>';
            return $out;
        }
    }
?>