<div class="modal fade" id="myModal" role="dialog" >
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Đăng ký</h4>
                        </div>
                        <div class="modal-body">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" value="" required="">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="last_name">Tên tài khoản <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Mật khẩu <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Nhập lại mật khẩu <span>*</span></label>
                                    <input type="text" class="form-control" id="last_name" value="" required="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Số điện thoại <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" min="0" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email<span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" value="">
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đăng Nhập</button>
                        </div>
                    </div>
                </div>
            </div>
<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="index.php" id="logo"><img src="./img/logoG.png" alt="" width="200px"></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Shop</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Bàn Phím</li>
                                    <li><a href="shop.php">All</a></li>
                                    <li><a href="shop.php?brand=razer">Razer</a></li>
                                    <li><a href="shop.php?brand=logitech">Logitech</a></li>
                                    <li><a href="shop.php?brand=asus">Asus</a></li>
                                    <li><a href="shop.php?brand=corsair">Corsair</a></li>
                                    <li><a href="shop.php?brand=steelseries">Steelseries</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Chuột</li>
                                    <li><a href="shop.php">Asus</a></li>
                                    <li><a href="shop.php">Corsair</a></li>
                                    <li><a href="shop.php">Steelseries</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Tai Nghe</li>
                                    <li><a href="shop.php">Razer</a></li>
                                    <li><a href="shop.php">Logitech</a></li>
                                    <li><a href="shop.php">Asus</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Phụ kiện</li>
                                    <li><a href="shop.php">All</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="index.php?id=shop">Shop</a></li>
                                <li><a href="single-product-details.html">Product Details</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="regular-page.html">Regular Page</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
                <form id="search-box" action="#" method="post">
                    <input type="search" name="search" id="headerSearch" placeholder="Tìm kiếm ......">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
                <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
            </div>
            <!-- User Login Info -->
            <div class="user-login-info" data-toggle="modal" data-target="#myModal">
                <a href="#"><img src="img/core-img/user.svg" alt=""></a>
            </div>
            
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span class="sizeBag"></span></a>
            </div>
        </div>

    </div>
    
</header>

