<?php 
    include("./myClass.php");
    session_start();
    $checkOutBag = "";
    $checkOutDetails ='<li style="font-weight:bold;"><span>Sản phẩm</span> <span>Tổng tiền</span></li>';                   
    $total = 0;
    if(isset($_SESSION['id']))
    {
        if(!empty($_SESSION['id']))
        {
            $checkOutBag .='<table class="table"> 
                        <caption>by Minhminion</caption>
                            <thead>
                                <tr>
                                <th scope="col">Stt</th>
                                <th scope="col">Hỉnh ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                </tr>
                        </thead>
                    <tbody>';
            foreach($_SESSION['id'] as $key => $item)
            {
                $checkOutBag .= '<tr>
                                <th scope="row">'.($key+1).'</th>
                                    <td><img src="./img/sanpham/'.$item->img.'" alt="" width="120"></td>
                                    <td>'.$item->name.'</td>
                                    <td>'.number_format($item->price,0,".",".").'</td>
                                    <td><input type="number" class="form-control qty col-12 col-md-6 col-lg-5 m-auto" min="0" value="'.$item->quality.'"></td>
                                </tr>
                            <tr>';
                $total += $item->price*$item->quality;
                $checkOutDetails .='<li><span>'.$item->name.'</span> <span>'.number_format($item->price*$item->quality,0,".",".").'đ</span></li>';
            }
            $checkOutBag .= '   </tbody></table>';
            $checkOutDetails .='<li style="font-weight:bold;" ><span>Giảm giá</span> <span>15%</span></li>
                                 <li style="font-weight:bold;" ><span>Shipping</span> <span>Free</span></li>
                                 <li style="font-weight:bold;" ><span>Tổng tiền</span> <span>'.number_format($total/100*(100-15),0,".",".").'đ</span></li>';
        }
        else{
            $checkOutBag .= '<div class="alert alert-danger" role="alert">
                            Không có sản phẩm trong giỏ !!
                        </div>';
        }
    }

    $myObj = new stdClass();
    $myObj->checkOutBag = $checkOutBag;
    $myObj->checkOutDetails = $checkOutDetails;

    echo json_encode($myObj);
?>