
    $(document).ready(function(){
        load_data();
        load_cart_item();
        function load_data(page)
        {
            $.ajax({
                url:"./XuLy/phantrang.php",
                method:"POST",
                data:{page:page,brand:GetURLParameter('brand')},
                success:function(data)
                {
                    $("#itemShow").html(data);
                }
            })
        }

        $(document).on("click",".page-item",function()
        {
            var page = $(this).attr("id");
            load_data(page);
        });

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
            })
        }

        /* Xóa Item khỏi giỏ hàng */
        /* MAi Sửa
        {
        $(document).on("click",".delete_item",function()
        {
            $.ajax({
                url:"./XuLy/upToSession_delete.php",
                method:"POST",
                data:{id : $(this).attr("id")},
                success:function(data)
                {
                    
                    $("#cart-list").html(data.split("?")[1]);
                    $(".sizeBag").html(data.split("?")[0]);
                }
            })
        });
        }
    })
****/
function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++){
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

    