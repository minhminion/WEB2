<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require("./../XuLy/conSQL.php");
        include("./model/head_css.php") 
    ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include("./model/menuBar.php") ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <?php include("./model/header.php") ?>
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="main-content">
            <!-- END BREADCRUMB-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 select2-hidden-accessible product-cetorgry" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="">Sắp xếp</option>
                                                <option value="date">Ngày</option>
                                                <option value="total">Tổng tiền</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 select2-hidden-accessible product-brand" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="">Thứ tự</option>
                                                <option value="">Tăng</option>
                                                <option value="">Giảm</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter product-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Lọc</button>
                                    </div>
                                </div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Mã hóa đơn</th>
                                                <th>Họ Tên</th>
                                                <th>Tài khoản mua</th>
                                                <th>Địa chỉ</th>
                                                <th>Tổng tiền</th>
                                                <th>Tình trạng</th>
                                                <th>Ngày mua</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="receiptTable">
                                        </tbody>
                                    </table>
                                    <div class="receiptPaging mt-3">
                                    </div>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
            <!-- END PAGE CONTAINER-->
                        </div>
                    </div>
                </div>  
            </div>     

    </div>

    <?php include("./model/script.php") ?>

</body>

</html>
<!-- end document-->