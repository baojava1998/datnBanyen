$(document).ready(function() {
    function addToCart(){
        let urlGio = $(this).data('url');
        let hinh = $(this).data('hinh');
        $.ajax({
            type: 'GET',
            url: urlGio,
            dataType: 'json',
            data:{
                hinh: hinh,
            },
            success: function (data) {

                alertify.success('Đã thêm mới sản phẩm');
                // if(data.code===200){
                //     alert('ok');
                // }
            },
            error: function () {

            }
        });
    }

    $(function() {
        $(document).on('click', '.add_to_cart', addToCart);
        // $(document).on('click', '.cart_update', cartUpdate);
        // $(document).on('click', '.cart_delete', cartDelete);
    })
    function RenderCart(response) {
        $(".cart_wrapper").html(response);
    }
});
