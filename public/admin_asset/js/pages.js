$(document).ready(function() {
    countproduct();
    $(document).on('click','.toggle-quick-view',function (e){
        let id = $(this).data('id');
        let url = $(this).data('url');
        _this = $(this);
        $.ajax({
            url: url,
            data:{
                id: id,
            },
            success: function (data) {
                $('#quickview').find('.modal-content').html(data.data);
            }
        });
    })

    $(document).on('click','.theloai',function (){
        let id = $(this).data('id');
        let url = $(this).data('url');
        let local = $(this).data('local');
        _this = $(this);
        $.ajax({
            url: url,
            data:{
                id: id,
                local: local
            },
            success: function (data) {
                $('.product-list').html(data.data);
                $('.filter-btn').data('load',id);
                countproduct();
            }
        });
    })
    //seach
    $(document).on('click','.filter-btn',function (e){
        e.preventDefault();
        let minamount = $('#minamount').val();
        let maxamount = $('#maxamount').val();
        let load = $(this).data('load');
        url = $(this).data('url');
        $.ajax({
            url: url,
            data:{
                min: minamount,
                max: maxamount,
                load: load
            },
            success: function (data) {
                $('.product-list').html(data.data);
                countproduct();
            }
        });
    })
    $(document).on('click', '#load-more', function(e){
        e.preventDefault();
        let local = $(this).data('local');
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
                max: maxamount,
                local: local
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

    var engine = new Bloodhound({
        remote: {
            url: '/search-category?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $('#search_text').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            source: engine.ttAdapter(),
            TieuDe: 'TieuDe',
            display: function (data) {
                return data.TieuDe;
            },
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                suggestion: function (data) {
                    return '<div style="background: #ffffff; width:370px;"><a href="/shop-detail/' + data.id  + '"style="color: #837070; width:370px;" class="list-group-item">' + data.TieuDe + '</a></div>';
                }
            }
        }
    );

    function doStrReplace(Text) {
        return Text
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '')
            ;
    }
    $("#idFormRating").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('.raing-user').html(data.data);
                alertify.success('Đánh giá thành công');
            },
            error: function () {
                alert('Bạn phải chọn số sao')
            }
        });


    });
    let count = $('.product-details').find('input').val();
    if (count==1){
        $(this).find('.dec').attr('hidden',true);
    }
});

$(document).on('click', '.noready', function(e){
    alert('Chức năng hiện tại chưa sẵn sàng')
    return false;
});
$(document).on('click', '.qty-detail', function(e){
let count = $(this).find('input').val();
    if (count >= 2){
        $(this).find('.dec').removeAttr('hidden');
    }else {
        $(this).find('.dec').attr('hidden',true);
    }
});
