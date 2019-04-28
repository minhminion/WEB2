<?php 
    include("./myClass.php");
    session_start();
    $output = "";
    if(isset($_SESSION['id']))
    {
        $output .='<table class="table"> 
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
        foreach($_SESSION['id'] as $item)
        {
            $output .= '<tr>
                            <th scope="row">1</th>
                                <td><img src="./img/sanpham/'.$item->img.'" alt="" width="120"></td>
                                <td>'.$item->name.'</td>
                                <td>'.number_format($item->price,0,".",".").'</td>
                                <td><input type="number" class="form-control qty" min="0" value="'.$item->quality.'"></td>
                            </tr>
                        <tr>';
        }
        $output .= '   </tbody></table>';
    }
    else{
        $output .= '<div class="alert alert-danger" role="alert">
                        Không có sản phẩm trong giỏ !!
                    </div>';
    }
    echo $output;
?>