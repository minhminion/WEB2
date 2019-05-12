<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
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
                                <!-- DATA TABLE-->
                                <h3 class="title-5 m-b-35">data table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2 select2-hidden-accessible product-cetorgry" name="property" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="">Sắp xếp</option>
                                                <option value="">Ngày</option>
                                                <option value="">Tổng tiền</option>
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
                                    <div class="col col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-addon">Tên sản phẩm</div>
                                            <input type="text" id="searchProduct" name="input3-group2" placeholder="Tìm kiếm ... " class="form-control">
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</button>
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
                                        <tbody>
                                            <?php
                                                $output="";        

                                                $sql='SELECT * FROM receipt ';
                                                $rs = conSQL :: executeQuery($sql);
                                                while($row = mysqli_fetch_array($rs))
                                                {
                                                    $output.='  <tr>
                                                                    <td>'.$row['receiptID'].'</td>
                                                                    <td>'.$row['firstName'].' '.$row['lastName'].'</td>
                                                                    <td>'.$row['userName'].'</td>
                                                                    <td>'.$row['address'].'</td>
                                                                    <td>'.number_format($row['receiptTotal'],0,".",".").'</td>
                                                                    '.receiptState($row['status']).'
                                                                    <td>'.$row['receiptDate'].'</td>
                                                                    <td>
                                                                        <div class="table-data-feature">
                                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xử lý dơn hàng">
                                                                                <i class="zmdi zmdi-mail-send"></i>
                                                                            </button>
                                                                            <button id="'.$row['receiptID'].'-block" class="item block-product" data-toggle="tooltip" data-placement="top" title="" receiptid="'.$row['receiptID'].'" data-original-title="Chi tiết">
                                                                                <i class="zmdi zmdi-more"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                </tr>';
                                                }
                                                echo $output;

                                                function receiptState($state)
                                                {
                                                    $out = '<td class="denied">Đang xử lý</td>';
                                                    if($state == 1)
                                                    {
                                                        $out = '<td class="process">Đã xử lý</td>';
                                                    }
                                                    return $out;
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
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