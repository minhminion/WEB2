<?php
    require("./../../XuLy/conSQL.php");
    header("Content-type: text/html; charset=utf-8");

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
        else if($do == "editUser")
        {
            $str = $_POST['firstName'];
            // $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            //     return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
            // }, $str);

            $myObj = new stdClass();
            $myObj->firstName = utf8_urldecode($str);
            $myObj->lastName = html_entity_decode($_POST['lastName']);
            $myObj->email = $_POST['email'];

            echo json_encode($myObj);
>>>>>>> parent of 71ef4e1... update
        }
    }

    function utf8_urldecode($str) {
        return html_entity_decode(preg_replace("/u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
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