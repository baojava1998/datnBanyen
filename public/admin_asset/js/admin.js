$(document).ready(function() {
         // admin
    function DeleteTL(){
        url = $(this).data('url');
        id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: id,
            },
            success:function(res){
                RenderTL(res.data);
                alertify.success('Xóa thành công');
            }
        });
    }

    $(function() {
        $(document).on('click', '.tl_delete', DeleteTL);
    })
    function RenderTL(response) {
        $("#dataTables-example").html(response);
    }
});
