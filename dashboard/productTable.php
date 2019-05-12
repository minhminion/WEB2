<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require("./../XuLy/conSQL.php");
        include("./model/head_css.php") 
    ?>
</head>
<div class="modal fade" id="userEdit" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Chỉnh sửa</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="user-edit-error"></div>
            <div class="modal-body">
            <form id="userEdit-form">
                <div class="row">
                    <input type="hidden" name="userId" class="form-control" value="" required="" placeholder="Nguyễn Văn">
                    <div class="col-md-12 mb-3">
                        <label for="user">Họ<span>*</span></label>
                        <input type="text" name="firstName" class="form-control" value="" required="" placeholder="Nguyễn Văn">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="password">Tên<span>*</span></label>
                        <input type="text" name="lastName" class="form-control" value="" required="" placeholder="A">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="user">Email<span>*</span></label>
                        <input type="text" name="email" class="form-control"  value="" required="" placeholder="abc@example.com">
                    </div>
                    <div class="col-md-12 mb-3">
                        
                    </div>
                    <div class="col-md-12 mb-3 mt-3">
                        <input type="submit" class="form-control" value="Xác nhận">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

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
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 select2-hidden-accessible" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Loại</option>
                                                <?php
                                                    $sql = "SELECT * FROM cetorgry WHERE 1";
                                                    $result = conSQL :: executeQuery($sql);
                                                    $output = "";
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $output .='<option value="'.$row["cetorgryID"].'">'.$row['cetorgryName'].'</option>';
                                                    }
                                                    echo $output;
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 select2-hidden-accessible" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected">Hãng</option>
                                                <?php
                                                    $sql = "SELECT * FROM brand WHERE 1";
                                                    $result = conSQL :: executeQuery($sql);
                                                    $output = "";
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $output .='<option value="'.$row["brandID"].'">'.$row['brandName'].'</option>';
                                                    }
                                                    echo $output;
                                                ?>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Lọc</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <colgroup>
                                            <col class="col-md-0">
                                            <col class="col-md-1">
                                            <!-- <col class="col-md-1"> -->
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>Mã SP</th>
                                                <th>Tên SP</th>
                                                <th>Loại</th>
                                                <th>Hãng</th>
                                                <th>Chi tiết</th>
                                                <th>Tồn kho</th>
                                                <th>Giá (VNĐ)</th>
                                                <th>Tình trạng</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="productTable">
                                        
                                        </tbody>
                                    </table>
                                    <div class="productPaging">
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
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