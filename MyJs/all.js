
$(document).ready(function(){
        load_data();
        load_cart_item();
///////////////
        function load_data(page)
        {
            $order = $("#sortByselect").val();
            $min = $("#sortPrice").attr('min');
            $max = $("#sortPrice").attr('max');
            console.log(decodeURI(GetURLParameter('search')));
            $.ajax({
                url:"./XuLy/phantrang.php",
                method:"POST",
                data:{  page:page,
                        brand:GetURLParameter('brand'),
                        search:decodeURI(GetURLParameter('search')),
                        order:$order,
                        min:$min,
                        max:$max},
                success:function(data)
                {
                    $("#title-shop").html(data.split("?")[0]);
                    $("#total-item").html(data.split("?")[1]);
                    console.log(data.split("?")[3]);
                    $("#itemShow").html(data.split("?")[2]);
                    $("#pagination-box").html(data.split("?")[4]);
                }
            })
        }
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
        $(document).on("click","#sortPrice",function()
        {
            load_data();
        })
        // Thêm vào giỏ hàng 
        $(document).on("click",".add-to-cart-btn",function()
        {
            var id = $(this).attr("id");
            var name = $(this).attr("name");
            var brand = $(this).attr("brand");
            var img = $(this).attr("img");
            var price = $(this).attr("price");
            console.log(id+name+brand+img+price);
            load_cart_item(id,name,brand,img,price);
        });
        /*** Sự kiện tạo giỏ hàng */ 
        function load_cart_item(id,name,brand,img,price)
        {
            $.ajax({
                url:"./XuLy/upToSession.php",
                method:"POST",
                data:{id : id,name: name,brand: brand,img: img,price: price},
                success:function(data)
                {
                    
                    $("#cart-list").html(data.split("?")[1]);
                    $(".sizeBag").html(data.split("?")[0]);
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
                success:function(data)
                {
                //   console.log(data);
                    
                   $("#cart-list").html(data.split("?")[1]);
                   $(".sizeBag").html(data.split("?")[0]);
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
                    var error = $(".error").toArray();
                    for(var i = 0 ; i<= error.length ;i++)
                    {
                        error[i].innerHTML = data.split("?")[i];
                    }
                    console.log(data.split("?")[7]);
                    
                }
            })
        });

        $(document).on("click",".sub-item",function()
        {   
            
            // $url = window.location.href.split("?");
            // $url = window.location.href.split("?")[$url.length - 1];
            // console.log($url);
            $brand = $(this).attr("brand");
            if($brand != undefined)
            {
               URLpush(GetURLParameter('search'),$brand);
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
            $("#signUp").modal("toggle");
        });
    });

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
    function URLpush(search,brand)
    {
        $oldUrl = "shop.php";

        $search = search === undefined ?"":"?search="+search;
        $brand = brand === undefined ?"":"?brand="+brand;

        console.log($search);
        console.log($brand);

        $newURL  = $oldUrl + $search + $brand;
        
        window.history.pushState("String","",$newURL);

    }

    $(document).ready(function(){
        $(document).on('click','.plus',function()
        {
            // alert("click");
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
    });
    



    