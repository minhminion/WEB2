
$(document).ready(function(){
        load_data();
        load_cart_item();
        checkOutBag();
        checkOutDetails();

        function load_data(page)
        {
            $order = $("#sortByselect").val();
            $min = $("#sortPrice").attr('min');
            $max = $("#sortPrice").attr('max');
            $search = decodeURI(GetURLParameter('search'));
            $search = $search.replace("+"," ");
            console.log($search);
            $.ajax({
                url:"./XuLy/phantrang.php",
                method:"POST",
                data:{  page:page,
                        brand:GetURLParameter('brand'),
                        cetorgry:GetURLParameter('cetorgry'),
                        search:$search,
                        order:$order,
                        min:$min,
                        max:$max},
                datatype:"json",
                success:function(data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    $("#title-shop").html(data.cetorgry);
                    $("#total-item").html(data.totalRecord);
                    $("#itemShow").html(data.output);
                    $("#pagination-box").html(data.paging);
                }
            })
        }

        //CHECK OUT
        function checkOutBag()
        {
            $.ajax({
                url :"./XuLy/checkOutBag.php",
                method:"POST",
                datatype:"json",
                success:function(data)
                {
                    data = JSON.parse(data);
                    $(".checkout-bag").html(data.checkOutBag);
                }
            })
        }
        function checkOutDetails()
        {
            $.ajax({
                url :"./XuLy/checkOutDetails.php",
                method:"POST",
                datatype:"json",
                success:function(data)
                {
                    data = JSON.parse(data);
                    $(".order-details-form").html(data.checkOutDetails);
                }
            })
        }


        function login_logout(post_url,request_method,form_data)
        {
            $.ajax({
                url: post_url,
                method: request_method,
                datatype: "json",
                data: form_data,
                success:function(data)
                {
                    
                    console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    if(data.islogin == false)
                    {
                        $("#logout").modal("hide");
                        $("#user-info").html(data.output);
                    }
                    else if(data.login == true)
                    {
                        $("#login").modal("hide");
                        loginSuccess();
                        $("#user-info").html(data.output);
                    }
                    else
                    {
                        $(".login-error").html(data.output);
                    }
                }
            })
        }

        $(document).on("click",".btn-decinc",function(e)
        {
            $id = $(this).attr("id");
            $quality = $(this).attr("quality");
            console.log($id);
            console.log($quality);
            valueCart($quality,$id);
        })

        function valueCart(quality,id)
        {
            $.ajax({
                url: "./XuLy/cart-quality.php",
                method:'POST',
                data: { id: id, quality: quality },
                success:function(data)
                {
                    console.log(data);
                    $("#"+$id+"-quality").val(data);
                    load_cart_item();
                    checkOutDetails();
                }
            })
        }

        // LOGIN 
        $('#login-form').on("submit",function(event){
            event.preventDefault();
            var post_url = "./XuLy/validateuser.php";
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            console.log(form_data);
            login_logout(post_url,request_method,form_data);
        });

        // LOGOUT
        $('#logout-form').on("submit",function(event){
            event.preventDefault();
            var post_url = "./XuLy/validateuser.php";
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            console.log(form_data);
            login_logout(post_url,request_method,form_data);
        });

        // Phân Trang
        $(document).on("click",".page-item",function()
        {
            var page = $(this).attr("id");
            window.scrollBy({
                top: -1500,
                left:0,
                behavior:'smooth'
            });
            load_data(page);
        });



        // Thêm giỏ hàng SP
        $(document).on("click",".add-to-cart-btn",function()
        {
            var id = $(this).attr("id");
            var name = $(this).attr("name");
            var brand = $(this).attr("brand");
            var img = $(this).attr("img");
            var price = $(this).attr("price");
            var quality = $(".quality-item").val();
            console.log(id+name+brand+img+price);
            load_cart_item(id,name,brand,img,price,quality);
            addsuccess(name);
        });



        /*** Sự kiện tạo giỏ hàng */ 
        function load_cart_item(id,name,brand,img,price,quality)
        {
            $.ajax({
                url:"./XuLy/upToSession.php",
                method:"POST",
                data:{id : id,name: name,brand: brand,img: img,price: price,quality :quality},
                datatype:"json",
                success:function(data)
                {
                    data = JSON.parse(data);
                    $("#cart-list").html(data.output);
                    $(".sizeBag").html(data.num);
                }
            });
        }
        {

        /* Xóa Item khỏi giỏ hàng */
        $(document).on("click",".product-remove",function()
        {
            $.ajax({
                url:"./XuLy/upToSession_delete.php",
                method:"POST",
                data:{id : $(this).attr("data")},
                datatype:"json",
                success:function(data)
                {
                    data = JSON.parse(data);
                    $("#cart-list").html(data.output);
                    $(".sizeBag").html(data.num);
                    checkOutBag();
                    checkOutDetails();
                }
            });
        });
        }
        
        /***** *********************/
        $('#search-box').on("submit",function(event)
        {
            $url = $(location).attr("pathname").split("/")[2];
            console.log($url);
            $search = $('#search-box').serialize();

            event.preventDefault();
            URLpush($search.split("=")[1],GetURLParameter("brand"));
            
            if($url != "shop.php")
            {
                window.location.reload();
            }
            load_data();
        });

        $("#DK").on("submit",function(e)
        {
            e.preventDefault();
            $.ajax({
                url:"./XuLy/validation.php",
                method:"POST",
                data:{info : $(this).serialize()},
                success:function(data)
                {
                    console.log($(".error").toArray());
                    var error = $(".error");
                    var infoE = data.split("?");
                    console.log(infoE[7]);
                    console.log(infoE[8]);
                    for(var i = 0 ; i<= error.length ;i++)
                    {
                        var s = infoE[i];
                        error[i].innerText = s;
                    }

                    
                }
            })
        });

        $(document).on("click",".sub-item",function()
        {   
            $brand = $(this).attr("brand");
            $cetorgry = $(this).attr("cetorgry");
            if($brand != undefined || $cetorgry != undefined)
            {
               URLpush(GetURLParameter('search'),$brand,$cetorgry);
            }
            else{
                URLpush();
            }
            load_data();
            
        })
        
        $(document).on("change","#sortByselect",function()
        {
            load_data();
        })

        $(document).on("click",".changeUpIn",function()
        {
            // alert("click");
            $("#login").modal("toggle");
            $("#register").modal("toggle");
        });
    });

    
    $(document).ready(function(){
        $(document).on('click','.plus',function()
        {
            // alert("click");
            if($('.quality').val() == $('.quality').attr("max"))
            {
                alert("Không đủ hàng !!");
                return;
            }
            $('.quality').val(parseInt($('.quality').val()) + 1 );
        });
        $(document).on('click','.minus',function()
        {
            $('.quality').val(parseInt($('.quality').val()) - 1 );
            // alert("click");
            if ($('.quality').val() == 0) 
            {
                $('.quality').val(1);
                }
            });
        $("input[name='quant']").change(function()
        {
            if($('.quality').val() >= $('.quality').attr("max"))
            {
                alert("Không đủ hàng !!");
                $('.quality').val($('.quality').attr("max"));
                return;
            }
        });
    });

    $("")

// FUNCTION   
    function addsuccess(name)
    {
        $.notify({
            // options
            icon: 'glyphicon glyphicon-warning-sign',
            title: 'Thêm vào giỏ ',
            message: name,
        },{
            // settings
            element: 'body',
            position: null,
            type: "success",
            allow_dismiss: false,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 60,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutLeft',
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-12 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span style="font-weight:bold" data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>' 
        });
    }

    function loginSuccess()
    {
        Swal.fire(
            {
            type : "success",
            title :'Đăng nhập thành công!',
            html:'Cửa sổ sẽ đóng trong <strong></strong> seconds.<br/><br/>',
            timer: 5000,
            onBeforeOpen: () => {
                timerInterval = setInterval(() => {
                    Swal.getContent().querySelector('strong')
                      .textContent = (Swal.getTimerLeft() / 1000)
                        .toFixed(0)
                  }, 100)
                },
            onClose: () => {
                clearInterval(timerInterval)
                }
            }
        )
    }

    function GetURLParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('?');
        for (var i = 0; i < sURLVariables.length; i++){
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }
    function URLpush(search,brand,cetorgry)
    {
        $oldUrl = "shop.php";
    
        $search = search === undefined ?"":"?search="+search;
        $brand = brand === undefined ?"":"?brand="+brand;
        $cetorgry = cetorgry === undefined ?"":"?cetorgry="+cetorgry;
    
        console.log($search);
        console.log($brand);
        console.log($cetorgry);
    
        $newURL  = $oldUrl + $search + $brand + $cetorgry;
        
        window.history.pushState("String","",$newURL);
    
    }
    



    