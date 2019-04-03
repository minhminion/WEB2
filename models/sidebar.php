<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2 id="title-shop"></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50 mt-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Thể loại</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#keyboard">
                                        <a href="#">Bàn Phím</a>
                                    </li>
                                        <ul class="sub-menu collapse show" id="keyboard">
                                            <li><a href="#" class="sub-item">All</a></li>
                                            <li><a href="#" class="sub-item" brand="Razer">Razer</a></li>
                                            <li><a href="#" class="sub-item" brand="Logitech">Logitech</a></li>
                                            <li><a href="#" class="sub-item" brand="Asus">Asus</a></li>
                                            <li><a href="#" class="sub-item" brand="Corsair">Corsair</a></li>
                                            <li><a href="#" class="sub-item" brand="Steelseries">Steelseries</a></li>
                                        </ul>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#mouse" class="collapsed">
                                        <a href="#">Chuột</a>
                                        <ul class="sub-menu collapse" id="mouse">
                                        <li><a href="index.php?id=shop">All</a></li>
                                            <li><a href="index.php?id=shop">Razer</a></li>
                                            <li><a href="index.php?id=shop">Logitech</a></li>
                                            <li><a href="index.php?id=shop">Asus</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#headphone" class="collapsed">
                                        <a href="#">Tai Nghe</a>
                                        <ul class="sub-menu collapse" id="headphone">
                                        <li><a href="index.php?id=shop">All</a></li>
                                            <li><a href="index.php?id=shop">Razer</a></li>
                                            <li><a href="index.php?id=shop">Logitech</a></li>
                                            <li><a href="index.php?id=shop">Asus</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="#">Phụ Kiện</a>
                                        <ul class="sub-menu collapse" id="accessories">
                                            <li><a href="#">All</a></li>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Bộ lọc</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Giá</p>

                            <div class="widget-desc">
                                <div class="slider-range" style ="margin-right:50px">
                                    <div id="sortPrice" data-min="0" data-max="10" data-unit="đ" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="10" data-label-result="Giá : " data-price=".000.000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Giá : 0đ - 10.000.000đ</div>
                                </div>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Nhăn hiệu</p>
                                <div class="widget-desc">
                                    <ul>
                                        <li><a href="#">Asus</a></li>
                                        <li><a href="#">Razer</a></li>
                                        <li><a href="#">Steelseries</a></li>
                                        <li><a href="#">Corsair</a></li>
                                        <li><a href="#">Logitech</a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <!-- Pagination -->
                    <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p>Tìm thấy : <span id="total-item"></span></p>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <p>Sắp xếp:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="DESC">Giá cao - thấp</option>
                                            <option value="ASC">Giá thấp - cao</option>
                                            <!-- <option value="value">Mới nhất</option> -->
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="itemShow">
                    </div>
                    <nav aria-label="navigation" id="pagination-box">
                    </nav>
                </div>
            </div>
        </div>
    </section>
    


