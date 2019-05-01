$(document).ready(function()
{
    isLogin();

    function isLogin()
    {
        console.log("abc");
        $.ajax({
            url: "../dashboard/XuLy/isLogin.php",
            method:"POST",
            datatype: "json",
            success:function(data)
            {
                data = JSON.parse(data);
                console.log(data.isLogin);
                if(data.isLogin == false)
                {
                    window.location.href = "login.php";
                }
            }
        })
    }

    $(document).on("click",".block-user",function()
    {
        $userId = $(this).attr("userid");
        $state = $(this).attr("state");
        console.log($userId);
        blockUser($userId,$state);
    })
    $(document).on("click",".pass-reset",function()
    {
        $userId = $(this).attr("userid");
        resetPass($userId);
    })

    function blockUser(userId,state)
    {
        $do = "block";
        $.ajax({
            url :"../dashboard/XuLy/userSetting.php",
            method:"POST",
            data : {userId: userId ,state: state ,do : $do},
            datatype :'json',
            success:function(data)
            {
                console.log(data);
                data = JSON.parse(data);
                // alert("Done");
                $("#"+userId+"-state").html(data.state);
                $("#"+userId+"-state-btn").html(data.stateBtn);
                // window.location.reload();
            }
        })
    }
    function resetPass(userId)
    {
        $do = "resetPass";
        $.ajax({
            url :"../dashboard/XuLy/userSetting.php",
            method:"POST",
            data : {userId: userId ,do : $do},
            datatype :'json',
            success:function(data)
            {
                console.log(data);
                alert("Done");
                // window.location.reload();
            }
        })
    }

})