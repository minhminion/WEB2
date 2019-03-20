<?php
    $output = '<div class="cart-list" >';
    $total = 0;
    $num = 0;
    if(isset($_SESSION['id']))
    {
        foreach($_SESSION['id'] as $item)
        {    
            $output .= '<div class="single-cart-item">
                            <a href="#" class="product-image">
                                <img src="./img/sanpham/'.$item->img.'" class="cart-thumb" alt="">
                                <!-- Cart Item Desc -->
                                <div class="cart-item-desc">
                                <span class="product-remove"><i class="fa fa-close delete_item" id="'.$item->id.'" aria-hidden="true"></i></span>
                                    <span class="badge">'.$item->brand.'</span>
                                    <h6>'.$item->name.'</h6>
                                    <p class="size">Số lượng: '.$item->quality.'</p>
                                    <p class="price">'.number_format($item->price,0,".",".").'</p>
                                </div>
                            </a>
                        </div>';
            $total += $item->price*$item->quality;
            $num += $item->quality;
                        
        }
    }
    $output .= '</div>

                    <!-- Cart Summary -->
                    <div class="cart-amount-summary">

                        <h2>Summary</h2>
                        <ul class="summary-table">
                            <li><span>Tổng:</span> <span>'.number_format($total,0,".",".").' đ</span></li>
                            <li><span>Phí vận chuyển :</span> <span>Free</span></li>
                            <li><span>Giảm giá:</span> <span>-15%</span></li>
                            <li><span>Tổng tiển:</span> <span>'.number_format($total/100*(100-15),0,".",".").' đ</span></li>
                        </ul>
                        <div class="checkout-btn mt-100">
                            <a href="checkout.html" class="btn essence-btn">Kiểm tra</a>
                        </div>
                    </div>
                </div>';
    echo $num.="?";
    echo $output;
?>