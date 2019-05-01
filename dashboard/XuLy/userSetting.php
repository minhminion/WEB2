<?php
    require("./../../XuLy/conSQL.php");

    if(isset($_POST['do']) && isset($_POST['userId']) )
    { 
        $do = $_POST['do'];
        $userId = $_POST['userId'];
    
        if($do == "block" && isset($_POST['state']))
        {
            $state = $_POST['state'];
            blockUser($userId,$state);
            $myObj = new stdClass();
            $myObj->state = state($state);
            $myObj->stateBtn = stateBtn($userId,$state);
            echo json_encode($myObj);
        }
        else if($do == "resetPass")
        {
            resetPass($userId);
        }
    }



    function blockUser($userId,$state)
    {
        $sql = "UPDATE user SET  user.state = $state WHERE userID = $userId";
        conSQL :: executeQuery($sql);
        // echo $sql;
    }

    function resetPass($userId)
    {
        $newPass = password_hash("123456789",PASSWORD_DEFAULT);
        $sql = "UPDATE user SET  user.userPass ='".$newPass."' WHERE userID = $userId";
        echo $sql;
        conSQL :: executeQuery($sql);
    }

    function state($state)
    {
        $rs ='<span class="role admin">disable</span>';
        if($state == 1 )
        {
            $rs ='<span class="role member">enable</span>';
        }
        return $rs;
    }

    
    function authentication($authen)
    {
        $option = array("Admin","Sale","Customer");    
        $rs = '  <div class="rs-select2--trans rs-select2--sm" value="2">
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