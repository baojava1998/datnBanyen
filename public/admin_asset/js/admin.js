$(document).ready(function() {
    dropzonebao();
    $("#TheLoai").change(function () {
        var idTheLoai = $(this).val();
        $.get("admin/ajax/ctsanpham/" + idTheLoai, function (data) {

            $("#SanPham").html(data);
        });
    });
    var idTheLoai = $("#TheLoai").val();
    $.get("admin/ajax/ctsanpham/" + idTheLoai, function (data) {

        $("#SanPham").html(data);
    });
    $("#SanPham,#TheLoai").change(function(){
        Dropzone.forElement('#dropzone').removeAllFiles(true)
    });
    function dropzonebao(){
        Dropzone.options.dropzone =
            {
                maxFilesize: 3,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.svg",
                addRemoveLinks: true,
                timeout: 50000,
                sending: function(file, xhr, formData) {
                    if ($('input[name=checksuaorthem]').val() == 2 ) {
                        formData.append("idSanPham", $('#SanPham').val());
                    }else{
                        formData.append("idSanPham", $('#SanPham1').val());
                    }
                },
                removedfile: function (file) {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: 'admin/ctsanpham/image/delete',
                        data: {filename: name},
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    }
    $(document).on('click', '.remove_image', function(){
        var name = $(this).attr('id');
        var dataimg = $(this).data('img');
        _this = $(this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url:"admin/ctsanpham/image/delete",
            data:{filename : name},
        success:function(data){
            $('.img-'+dataimg).remove();
            _this.remove();
        }
    })
    });
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
