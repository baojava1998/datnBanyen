$(document).ready(function() {
    function addToCart(){
        let urlGio = $(this).data('url');
        let hinh = $(this).data('hinh');
        let qty = $(this).data('qty');
        $.ajax({
            type: 'GET',
            url: urlGio,
            dataType: 'json',
            data:{
                hinh: hinh,
                qty:qty
            },
            success: function (data) {
                $('.cart-hover').html(data.data);
                $('.soluong').html(data.soluong);
                alertify.success('Đã thêm mới sản phẩm');
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
