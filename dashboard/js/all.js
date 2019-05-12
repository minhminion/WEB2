$(document).ready(function()
{
    isLogin();
    pagingProduct();
    activeMenuItem();

    function pagingProduct(page)
    {
        $cetorgry = $(".product-cetorgry").val();
        $brand = $(".product-brand").val();
        $search = $("#searchProduct").val();
        console.log($search);

        $.ajax({
            url:"./XuLy/pagingProductTable.php",
            method:"POST",
            data:{  page:page,
                    cetorgry : $cetorgry ,
                    brand : $brand,
                    search : $search},
            datatype:"json",
            success:function(data)
            {
                console.log(data);
                data = JSON.parse(data);
                $(".productTable").html(data.output);
                $(".productPaging").html(data.paging);
            }
        })
    }
    $(document).on("click",".page-item",function(event)
        {
            event.preventDefault();
            var page = $(this).attr("id");
            console.log(page);
            pagingProduct(page);
        });

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
            success:function(data)
            {
                data = JSON.parse(data);
                console.log(data);
                if(data.complete == true)
                {
                    alert("Done");
                }
                else
                {
                    $(".user-edit-error").html(data.error);
                }
                // window.location.reload();
            }
        })
    })

    $(document).on("select2:select",".userAuthen",function(e)
    {
        $userId = $(this).attr("userid")
        $newAuthen = e.params.data.id;
        console.log($newAuthen);
        console.log($userId);
        $confirm = confirm("Bạn muốn thay đổi quyền của user ??")
        console.log($confirm);
        authentication($userId,$newAuthen,$confirm);

    });

    $(document).on("click",".product-filter",function()
    {
        pagingProduct();
    });


    $(document).on("click",".block-product",function()
    {
    $productId = $(this).attr("productid");
        $state = $(this).attr("state");
        $messge ="Bạn muốn tiếp tục bán sản phẩm này ??";
        if($state == 0)
        {
            $messge = "Bạn muốn ngưng bán sản phẩm này ??";
        }
        if(confirm($messge))
        {
            blockProduct($productId,$state);
        }
    });

    $("#searchProduct").keypress(function(event){
    
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            pagingProduct();
        }
    })

    $(document).on("change","#productImgChoice",function()
    {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
        {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#productImg').attr('src',e.target.result);
            }
        reader.readAsDataURL(input.files[0]);
        }
        else
        {
            $('#productImg').attr('src','./../img/logoG.png');
        }
    })

    $(document).on("submit","#product-form",function(event)
    {
        event.preventDefault();
        uploadProduct("add");
    })

    function uploadProduct(make)
    {
        $do = make;
        $input = $("#product-form");
        $productId = $input.find("input[name='id']").val();
        $productName = $input.find("input[name='name']").val();
        $productCetorgry = $("#productCetorgry").val();
        $productBrand = $("#productBrand").val();
        $productPrice= $input.find("input[name='price']").val();
        $productAmount = $input.find("input[name='amount']").val();
        $productDescription = $input.find("input[name='description']").val();
        $img="./../img/logoG.png";

        // var file_data = $('#productImgChoice').prop('files')[0];
        // console.log(file_data);
        // //lấy ra kiểu file
        // var type = file_data.type;
        // console.log(type);
        // //Xét kiểu file được upload
        // var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
        // //kiểm tra kiểu file
        // if (type == match[0] || type == match[1] || type == match[2] || type == match[3])
        // {
        //     //khởi tạo đối tượng form data
        //     var form_data = new FormData();
        //     //thêm files vào trong form data
        //     form_data.append('productImg', file_data);
        //     console.log(form_data);

        var myImg = $('#productImgChoice');
        form_data = new FormData();
        if(myImg.prop('files').length > 0)
        {
            file =myImg.prop('files')[0];
            form_data.append("productImg", file);
        }

            $.ajax({
                url :"../dashboard/XuLy/uploadProduct.php",
                method:"POST",
                data :{ 
                        do : $do,
                        productId : $productId,
                        productName : $productName,
                        productCetorgry : $productCetorgry,
                        productBrand : $productBrand,
                        productPrice : $productPrice,
                        productAmount : $productAmount,
                        productDescription : $productDescription,
                        form_data
                        },
                // processData: false,
                success:function(data)
                {
                    console.log(data);
                    // data = JSON.parse(data);
                    // $("#"+userId+"-authen").html(data.authentication);
                    // // alert("Done");
                    // reloadComboBox("#"+userId+"-row");
                    // window.location.reload();
                }
            })
        // }
        // else {
        //     alert("Chỉ up file hình ");
        // }
    }

    function blockProduct(productId,state)
    {
        $do = "block";
        $.ajax({
            url :"../dashboard/XuLy/productSetting.php",
            method:"POST",
            data : {productId : productId ,state: state ,do : $do},
            datatype :'json',
            success:function(data)
            {
                data = JSON.parse(data);
                console.log(data);
                $("#"+productId+"-state").html(data.state);
                $("#"+productId+"-block").attr('state',data.isBlock);
                $("#"+productId+"-block").html(data.btnIcon);
                // pagingProduct();
            }
        })
    }


    function authentication(userId,authen,confirm)
    {
        console.log(confirm);
        $do = "authentication";
        $.ajax({
            url :"../dashboard/XuLy/userSetting.php",
            method:"POST",
            data : {userId: userId ,authen: authen ,do : $do,confirm : confirm},
            datatype :'json',
            success:function(data)
            {
                console.log(data);
                data = JSON.parse(data);
                $("#"+userId+"-authen").html(data.authentication);
                // alert("Done");
                reloadComboBox("#"+userId+"-row");
                // window.location.reload();
            }
        })
    }

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
                $("#"+userId+"-authen").html(data.authentication);
                reloadComboBox("#"+userId+"-row");
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

    function reloadComboBox($this)
    {
        "use strict";
        try {
            $.each($(""+$this+" .js-select2"),function () {
              console.log("1");
              $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
              });
            });
        
          } catch (error) {
            console.log(error);
          }
    }

    function activeMenuItem()
    {
        $url = $(location).attr("href");
        $parts = $url.split("/");
        $last_part = $parts[$parts.length-1];
        console.log($last_part)
        switch ($last_part)
        {
            case "admin.php":
                $(".dashboard").addClass("active");
            break;
            case "productTable.php":
                $(".product").addClass("active");
            break;
            case "userTable.php":
                $(".user").addClass("active");
            break;
            case "receiptTable.php":
                $(".receipt").addClass("active");
            break;
        }
    }
})