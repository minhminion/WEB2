
$(document).ready(function(){
        load_data();
        load_cart_item();
///////////////
        function load_data(page)
        {
            $order = $("#sortByselect").val();
            console.log($order);
            $.ajax({
                url:"./XuLy/phantrang.php",
                method:"POST",
                data:{  page:page,brand:GetURLParameter('brand'),
                        search:GetURLParameter('search'),
                        order:$order},
                success:function(data)
                {
                    $("#title-shop").html(data.split("?")[0]);
                    $("#total-item").html(data.split("?")[1]);
                    // console.log(data.split("?")[1]);
                    $("#itemShow").html(data.split("?")[2]);
                    $("#pagination-box").html(data.split("?")[3]);
                }
            })
        }
/////////////
        $(document).on("click",".page-item",function()
        {
            var page = $(this).attr("id");
            load_data(page);
        });
    //////////////
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
            $url = window.location.href.split("?")[0];
            $search = $('#search-box').serialize();
            event.preventDefault();
            URLpush($search.split("=")[1],GetURLParameter("brand"));
            load_data();
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



    