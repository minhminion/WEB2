<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require("./../XuLy/conSQL.php");
        include("./model/head_css.php");
    ?>
</head>

<body class="animsition" id="stattstic">
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
                                        <span class="au-breadcrumb-span">Bạn đang ở:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item">Trang thống kê</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">
                                        <?php
                                            $total = 0;
                                            $sql='  SELECT * 
                                                    FROM user 
                                                    WHERE user.state = 1';
                                            $rs = conSQL :: executeQuery($sql);
                                            echo mysqli_num_rows($rs);
                                        ?>
                                    </h2>
                                    <span class="desc">Thành viên hoạt động</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">
                                        <?php
                                            $total = 0;
                                            $sql='  SELECT receiptdetail.productID,sum(receiptdetail.quality) as quality 
                                                    FROM `receipt` INNER JOIN receiptdetail ON receipt.receiptID = receiptdetail.receiptID 
                                                    WHERE receipt.status = 1 
                                                    GROUP BY receiptdetail.productID';
                                            $rs = conSQL :: executeQuery($sql);
                                            while($row = mysqli_fetch_array($rs))
                                            {
                                                $total += $row["quality"];
                                            }
                                            echo $total;
                                        ?>
                                    </h2>
                                    <span class="desc">Sản phẩm bán được</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="statistic__item">
                                    <h2 class="number">
                                    <?php
                                            $total = 0;
                                            $sql='  SELECT * 
                                                    FROM `receipt` 
                                                    WHERE receipt.status = 1 ';
                                            $rs = conSQL :: executeQuery($sql);
                                            while($row = mysqli_fetch_array($rs))
                                            {
                                                $total += $row["receiptTotal"];
                                            }
                                            echo number_format($total,0,".",".");
                                        ?>
                                     VNĐ</h2>
                                    <span class="desc">Tổng thu nhập</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
            <!-- TOP CAMPAIGNS -->
            <div class="row ml-3 mr-3">
                <div class="col-lg-6">
                    <div class="top-campaign pb-5">
                        <h3 class="title-3 m-b-30">Top sản phẩm bán chạy</h3>
                        <div class="table-responsive">
                            <table class="table table-top-campaign">
                                <thead>
                                    <tr style="font-weight:bolder">
                                        <td>Tên sản phẩm</td>
                                        <td style="text-align:center">Số lượng</td>
                                    </tr>
                                </thead>           
                                <tbody>
                                    <?php
                                        $out="";
                                        $sql = 'SELECT productID , productName , SUM(quality) quality 
                                                FROM receipt,receiptdetail 
                                                WHERE receipt.receiptID = receiptdetail.receiptID AND receipt.status = 1 
                                                GROUP BY productID 
                                                ORDER BY quality DESC LIMIT 5';
                                        $rs = conSQL :: executeQuery($sql);
                                        while($row = mysqli_fetch_array($rs))
                                        {
                                            $out.= '<tr>
                                                        <td>'.$row['productName'].'</td>
                                                        <td style="text-align:center">'.$row['quality'].'</td>
                                                    </tr>';
                                        }
                                        echo $out;
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card chart-percent-card pb-2">
                        <div class="au-card-inner">
                            <h3 class="title-2 tm-b-5">Loại được mua nhiều nhất (%)</h3>
                            <div class="row no-gutters">
                                <div class="col-xl-5">
                                    <div class="chart-note-wrap">
                                        <div class="chart-note mr-0 d-block">
                                            <span class="dot dot--blue"></span>
                                            <span>Bàn phím</span>
                                        </div>
                                        <div class="chart-note mr-0 d-block">
                                            <span class="dot dot--red"></span>
                                            <span>Chuột</span>
                                        </div>
                                        <div class="chart-note mr-0 d-block">
                                            <span class="dot dot--green"></span>
                                            <span>Tai nghe</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="percent-chart">
                                        <canvas id="my-percent-chart" data-val="
                                        <?php
                                            $total = 0;
                                            $data =[0,0,0];
                                            $out="";
                                            $sql = 'SELECT productCetorgry , SUM(quality) quality 
                                                    FROM receipt,receiptdetail,product
                                                    WHERE receipt.receiptID = receiptdetail.receiptID AND receiptdetail.productID = product.productID  AND receipt.status = 1 
                                                    GROUP BY productCetorgry
                                                    ORDER BY quality ';
                                            $rs = conSQL :: executeQuery($sql);
                                            while($row = mysqli_fetch_array($rs))
                                            {
                                                $total += $row['quality'];
                                                $data[$row['productCetorgry']-1]=$row['quality'];
                                            }
                                            foreach ($data as $i => $s)
                                            {
                                                $s = round($s*100/$total);
                                                if($i+1 == count($data))
                                                {
                                                    $out .= $s;
                                                }
                                                else{
                                                    $out .= $s.",";
                                                }
                                            }
                                            echo $out;
                                        ?>
                                        "></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TOP CAMPAIGNS -->
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">Tổng thu nhập (Triệu
                                    )</h3>
                                    <div class="chart-info ">
                                        <div class="chart-info__left">
                                            <div class="rs-select2--dark rs-select2--md">
                                                <select class="js-select2 au-select-dark" name="time" id="selectTimeOrder">
                                                    <option value="month">Theo tháng</option>
                                                    <option value="day">theo ngày</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                        <div class="chart-info-right">
                                            <div class="rs-select2--dark rs-select2--md m-r-10 selectMonth" style="visibility:hidden">
                                                <select class="js-select2" name="property" id="selectMonth">
                                                    <?php
                                                        $month = date("m");
                                                        $out = '';
                                                        for($i = 1 ; $i <= 12 ;$i++)
                                                        {
                                                            if($i == $month) 
                                                            {
                                                                $out .= '<option value="'.$i.'" selected="selected">Tháng '.$i.'</option>';
                                                            }
                                                            else{
                                                                $out .= '<option value="'.$i.'" >Tháng '.$i.'</option>';
                                                            }
                                                        }
                                                        echo $out;
                                                        ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--dark rs-select2--md m-r-10 selectYear" style="visibility:hidden">
                                                <select class="js-select2" name="property" id="selectYear">
                                                    <?php
                                                        $year = date("Y");
                                                        $out = '';
                                                        for($i = $year ; $i > ($year-20) ;$i--)
                                                        {
                                                            if($i == $year)
                                                            {
                                                                $out .= '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                                                            }    
                                                            else{
                                                                $out .= '<option value="'.$i.'">'.$i.'</option>';
                                                            }
                                                            
                                                        }
                                                        echo $out;
                                                    ?>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="recent-report__chart" id="myReportChart">
                                        <canvas id="my-singelBarChart" data-val=""></canvas>
                                    </div>
                                </div>
                                <!-- END RECENT REPORT 2 -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php include("./model/script.php") ?>

</body>

</html>
<!-- end document-->