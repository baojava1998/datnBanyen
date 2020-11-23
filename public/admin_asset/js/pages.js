$(document).ready(function() {
    countproduct();
    $(document).on('click','.toggle-quick-view',function (){
        let id = $(this).data('id');
        let url = $(this).data('url');
        _this = $(this);
        $.ajax({
            url: url,
            data:{
                id: id,
            },
            success: function (data) {
                $('.modal-content').html(data.data);
            }
        });
    })

    $(document).on('click','.theloai',function (){
        let id = $(this).data('id');
        let url = $(this).data('url');
        _this = $(this);
        $.ajax({
            url: url,
            data:{
                id: id,
            },
            success: function (data) {
                $('.product-list').html(data.data);
                countproduct();
            }
        });
    })
    //seach
    $(document).on('click','.filter-btn',function (e){
        e.preventDefault();
        let minamount = $('#minamount').val();
        let maxamount = $('#maxamount').val();
        url = $(this).data('url');
        $.ajax({
            url: url,
            data:{
                min: minamount,
                max: maxamount
            },
            success: function (data) {
                $('.product-list').html(data.data);
                countproduct();
            }
        });
    })
    $(document).on('click', '#load-more', function(e){
        e.preventDefault();
        let minamount = $('#minamount').val();
        let maxamount = $('#maxamount').val();
        $(this).text('Loading More').append('<i class="icon_loading"></i>');
        let length = countproduct();
        let load = $(this).data('load');
        url = $(this).data('url');
        $.ajax({
            url: url,
            data:{
                load: load,
                length: length,
                min: minamount,
                max: maxamount
            },
            success: function (data) {
                $('.loading-more').remove();
                $('.product-list').append(data.data);
                countproduct();
            }
        });

    });
    function countproduct(){
        lengtht =$('.product-list').find('.product-item').length;
        $('.show-text-right').find('p').text('Show 1-'+" "+lengtht+" "+'Of'+" "+ $('.show-text-right').data('count'));
        return lengtht;
    }
});
