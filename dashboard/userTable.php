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
                    <div class="col-md-5 mb-3">
                        <label for="user">Họ<span>*</span></label>
                        <input type="text" name="firstName" class="form-control" value="" required="" placeholder="Nguyễn Văn">
                    </div>
                    <div class="form-group col-md-7 mb-3">
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
            <!-- END BREADCRUMB-->

        <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>username</td>
                                                    <td>password</td>
                                                    <td>email</td>
                                                    <td>role</td>
                                                    <td>state</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    // require("./../XuLy/conSQL.php");
                                                    $sql = "SELECT * FROM user,customer WHERE user.userID = customer.userID";
                                                    $result = conSQL :: executeQuery($sql);
                                                    $output = "";
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $output .=' <tr id="'.$row['userID'].'-row">
                                                                        <td>
                                                                            '.$row['userName'].'
                                                                        </td>
                                                                        <td>
                                                                            *********
                                                                        </td>
                                                                        <td>
                                                                            <span class="block-email">'.$row['email'].'</span>
                                                                        </td>
                                                                        <td>
                                                                            '.authentication($row['userID'],$row['userAuthentication']).'
                                                                        </td>
                                                                        <td id="'.$row['userID'].'-state">
                                                                            '.state($row["state"]).'
                                                                        </td>
                                                                        <td>
                                                                            <div class="table-data-feature float-left">
                                                                                <button class="item pass-reset" data-toggle="tooltip" data-placement="top" title=""  userid='.$row['userID'].' data-original-title="Reset pass">
                                                                                    <i class="zmdi zmdi-rotate-left"></i>
                                                                                </button>
                                                                                <button class="item edit-user" data-toggle="tooltip" data-placement="top" title=""  userid='.$row['userID'].'  firstName="'.$row['firstName'].'" lastName="'.$row['lastName'].'" email="'.$row["email"].'" data-original-title="Chỉnh sửa">
                                                                                    <i class="zmdi zmdi-edit"></i>
                                                                                </button>
                                                                                <span id="'.$row['userID'].'-state-btn">
                                                                                        '.stateBtn($row['userID'],$row['state']).'
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>';
                                                    }
                                                    echo $output;

                                                    function state($state)
                                                    {
                                                        $rs ='<span class="role admin">disable</span>';
                                                        if($state == 1 )
                                                        {
                                                            $rs ='<span class="role member">enable</span>';
                                                        }
                                                        return $rs;
                                                    }

                                                    function authentication($userId,$authen)
                                                    {
                                                        $option = array("Admin","Sale","Customer");    
                                                        $rs = '  <div class="rs-select2--trans rs-select2--sm userAuthen" value="2" id="'.$userId.'-authen" userid='.$userId.' >
                                                                    <select class="js-select2" name="property">';
                                                        foreach($option as $key => $s)
                                                        {
                                                            // $rs .= $key;
                                                            if($key == $authen)
                                                            {
                                                                $rs.='<option value="'.$key.'" selected>'.$s.'</option>';
                                                            }
                                                            else{
                                                                $rs.='<option value="'.$key.'">'.$s.'</option>';
                                                            }
                                                        }
                                                        $rs.=       '</select>
                                                                    <div class="dropDownSelect2"></div>
                                                                </div>';
                                                        return $rs;
                                                    }

                                                    function stateBtn($userId,$state)
                                                    {
                                                        $rs='
                                                            <button class="item block-user" data-toggle="tooltip" data-placement="top" title="" userid='.$userId.' state=1 data-original-title="Bỏ chặn">
                                                                <i class="zmdi zmdi-check"></i>
                                                            </button>';
                                                        if($state == 1)
                                                        {
                                                            $rs='
                                                            <button class="item block-user" data-toggle="tooltip" data-placement="top" title="" userid='.$userId.' state=0 data-original-title="Chặn">
                                                                <i class="zmdi zmdi-block"></i>
                                                            </button>';
                                                        }   
                                                        return $rs;
                                                    }

                                                    
                                                ?>      
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div> 
            <!-- END PAGE CONTAINER-->
                        </div>
                    </div>
                </div>  
            </div>     
        </section>

    </div>

    <?php include("./model/script.php") ?>

</body>

</html>
<!-- end document-->