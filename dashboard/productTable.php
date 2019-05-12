<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require("./../XuLy/conSQL.php");
        include("./model/head_css.php") 
    ?>
</head>


<body class="animsition">
<div class="modal fade" id="productEdit" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="product-error"></div>
                <div class="modal-body">
                    <form id="product-form">
                        <div class="row">
                        <div class="form-group col-md-12 mb-3">
                                <label for="">Mã sản phẩm:</label>
                                <input type="text" name="id" class="form-control" placeholder="Mã sản phẩm" id="">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="">Tên sản phẩm:</label>
                                <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" id="">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="">Loại sản phẩm:</label>
                                <select name="category" class="form-control" id="productCetorgry">
                                    <?php
                                        $output="";
                                        $sql = 'SELECT * FROM cetorgry WHERE 1';
                                        // echo $sql;
                                        $rs = conSQL::executeQuery($sql);
                                        while($row = mysqli_fetch_array($rs))
                                        {
                                            $output .= '<option value="'.$row['cetorgryID'].'">'.$row['cetorgryName'].'</option>';
                                        }
                                        echo $output;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="">Thương hiệu:</label>
                                <select name="brand" class="form-control" id="productBrand">
                                    <?php
                                        $output="";
                                        $sql = 'SELECT * FROM brand WHERE 1';
                                        // echo $sql;
                                        $rs = conSQL::executeQuery($sql);
                                        while($row = mysqli_fetch_array($rs))
                                        {
                                            $output .= '<option value="'.$row['brandID'].'">'.$row['brandName'].'</option>';
                                        }
                                        echo $output;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="">Ảnh sản phẩm:</label>
                                <img class="mx-auto d-block" id="productImg" width="320">
                                <input type="file" accept=".jpeg,.jpg,.png,.gif" name="img" id="productImgChoice" class="form-control">
                            </div>
                            <div class="form-group col-md-7 mb-3">
                                <label for="">Giá sản phẩm:</label>
                                <input type="text" name="price" class="form-control" placeholder="Nhập giá" id="">
                            </div>
                            <div class="form-group col-md-5 mb-3">
                                <label for="">Số lượng:</label>
                                <input type="text" name="amount" class="form-control" placeholder="Nhập số lượng" id="">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control rounded-0" id="description" rows="5"></textarea>
                            </div>
                            <!-- <div class="col-md-12 mb-3">
                                <label for="">Thứ tự:</label>
                                <input type="text" name="ordernum" id=""class="form-control" placeholder="Thứ tự">
                            </div> -->
                            <!-- <div class="col-md-12 mb-3">
                                <label for="" style="display:block;">Trạng thái:</label>
                                <label for="rad1" class="radio-inline"><input type="radio" checked="check" name="status" id="rad1" value="1">Hiển thị</label>
                                <label for="rad2" class="radio-inline"><input type="radio" name="status" id="rad2" value="0">Không hiển thị</label>
                            </div> -->
                            <div class="col-md-12 mb-3">
                                <input type="submit" value="Thêm mới" name="submit" class="form-control btn btn-primary"> 
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                            <select class="js-select2 select2-hidden-accessible product-cetorgry" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="">Loại</option>
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
                                            <select class="js-select2 select2-hidden-accessible product-brand" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="">Hãng</option>
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
                                        <button class="au-btn-filter product-filter">
                                            <i class="zmdi zmdi-filter-list"></i>Lọc</button>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">Tên sản phẩm</div>
                                            <input type="text" id="searchProduct" name="input3-group2" placeholder="Tìm kiếm ... " class="form-control">
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#productEdit">
                                            <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="productTable">
                                        
                                        <thead>
                                            <tr>
                                                <th>Mã SP</th>
                                                <th>Tên SP</th>
                                                <th>Loại</th>
                                                <th>Hãng</th>
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