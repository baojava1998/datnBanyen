$(document).ready(function() {
    function addToCart(){
        if ($('input[name=checkAuth]').val() == 'true') {
            let urlGio = $(this).data('url');
            let hinh = $(this).data('hinh');
            let qty = $(this).data('qty');
            $.ajax({
                type: 'GET',
                url: urlGio,
                dataType: 'json',
                data: {
                    hinh: hinh,
                    qty: qty
                },
                success: function (data) {
                    $('.cart-hover').html(data.data);
                    $('.soluong').html(data.soluong);
                    alertify.success('Đã thêm mới sản phẩm');
                },
                error: function () {

                }
            });
        }else {
            alert('Vui lòng đăng nhập để mua hàng');
        }
    }


    function cartUpdate() {
        let qty = $(this).parents('tr').find('input').val();
        let urlUpdateCart = $('.pro-qty').data('url');
        let id = $(this).closest('.pro-qty').data('id');
        $.ajax({
            type: "GET",
            url: urlUpdateCart,
            data: {
                id: id,
                qty: qty
            },
            success: function (data) {
                $('.shopping-cart').html(data.data);
                alertify.success('Cập nhật thành công');
                quanty();
            },
            error: function () {

            }
        });
    }
    function cartDelete() {
        let id = $(this).data('id');
        let urlDeleteCart = $('.cart-table').data('url');
        $.ajax({
            type: "GET",
            url: urlDeleteCart,
            data: {
                id: id,
            },
            success: function (data) {
                $('.shopping-cart').html(data.data);
                alertify.success('Xoá thành công');
                quanty();
            },
            error: function () {

            }
        });
    }

    $(function() {
        $(document).on('click', '.add_to_cart', addToCart);
        $(document).on('click', '.close-td', cartDelete);
        $(document).on('click', '.qtybtn',cartUpdate);
    })
    function RenderCart(response) {
        $(".cart_wrapper").html(response);
    }
    function quanty(){
        var proQty = $('.pro-qty');
        proQty.on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.closest('.pro-qty').find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.closest('.pro-qty').find('input').val(newVal);
        });
    }
});
