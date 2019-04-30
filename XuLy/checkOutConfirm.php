<?php
    session_start();
    $isLogin = false;
    $isBagEmpty = true;
    $output ="";

    if(isset($_SESSION['isLOGIN']) && $_SESSION['isLOGIN'] == 1)
    {
        $isLogin = true;
    }
    if(isset($_SESSION['id']) && !empty($_SESSION['id']))
    {
        $isBagEmpty = false;
    }
    $output='
            <div class="checkout_details_area col-10 m-auto clearfix " data-aos="fade-right">
                <div class="cart-page-heading mb-30">
                    <h5>Billing Address</h5>
                </div>

                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name">Họ <span>*</span></label>
                            <input type="text" class="form-control" id="first_name" value="" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name">Tên <span>*</span></label>
                            <input type="text" class="form-control" id="last_name" value="" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="country">Thành Phố <span>*</span></label>
                            <select class="w-100" id="country">
                                <option value="usa">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ger">Germany</option>
                                <option value="fra">France</option>
                                <option value="ind">India</option>
                                <option value="aus">Australia</option>
                                <option value="bra">Brazil</option>
                                <option value="cana">Canada</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="street_address">Địa chỉ <span>*</span></label>
                            <input type="text" class="form-control mb-3" id="street_address" value="">
                            <input type="text" class="form-control" id="street_address2" value="">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="phone_number">Số điện thoại <span>*</span></label>
                            <input type="number" class="form-control" id="phone_number" min="0" value="">
                        </div>
                        <div class="col-12 mb-4">
                            <label for="email_address">Email Address <span>*</span></label>
                            <input type="email" class="form-control" id="email_address" value="">
                        </div>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox d-block mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                            </div>
                            <div class="custom-control custom-checkbox d-block mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Create an accout</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>';
    $myObj = new stdClass();
    $myObj->isLogin = $isLogin;
    $myObj->isBagEmpty = $isBagEmpty;
    $myObj->output = $output;

    echo json_encode($myObj);
?>