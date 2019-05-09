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

    $(document).on("click",".edit-user",function(e)
    {
        var userId = $(this).attr("userid");
        var firstName = $(this).attr("firstName");
        var lastName = $(this).attr("lastName");
        var email = $(this).attr("email");

        $(document).find('input[name="userId"]').val(userId);
        $(document).find('input[name="firstName"]').val(firstName);
        $(document).find('input[name="lastName"]').val(lastName);
        $(document).find('input[name="email"]').val(email);

        $("#userEdit").modal("toggle");
    })

    $(document).on("submit","#userEdit",function(event)
    {
        event.preventDefault();

        $userId = $(this).find('input[name="userId"]').val();  
        $firstName = $(this).find('input[name="firstName"]').val();  
        $lastName = $(this).find('input[name="lastName"]').val();  
        $email = $(this).find('input[name="email"]').val();  

        console.log($firstName);

        $do = "editUser";
        $.ajax({
            url :"../dashboard/XuLy/userSetting.php",
            method:"POST",
            data : {userId: $userId , 
                    do : $do ,
                    firstName : $firstName ,
                    lastName : $lastName ,
                    email : $email},
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> parent of 71ef4e1... update
            datatype :'json',
>>>>>>> parent of 71ef4e1... update
            success:function(data)
            {
                console.log(data);
                data = JSON.parse(data);
                // alert("Done");
                // window.location.reload();
            }
        })
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