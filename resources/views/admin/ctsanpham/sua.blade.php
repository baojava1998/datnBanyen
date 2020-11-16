@extends('admin.layout.index')

@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>{{$ctsanpham->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{$err}} <br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao')){{-- kiểm tra xem có thông báo k--}}
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/tintuc/sua/{{$ctsanpham->id}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach ($theloai as $tl)

                            <option @if ($ctsanpham->sanpham->theloai->id == $tl->id)
                                {{"selected"}}

                                @endif

                                value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            @foreach ($sanpham as $lt)

                            <option @if ($ctsanpham->sanpham->id == $lt->id)
                                {{"selected"}}

                                @endif

                                value="{{$lt->id}}">{{$lt->sanpham->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề"
                            value="{{$ctsanpham->TieuDe}}" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắc</label>
                        <textarea id="demo" name="TomTat" class="form-control ckeditor"
                            rows="3">{{$ctsanpham->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" name="NoiDung" class="form-control ckeditor"
                            rows="5">{{$ctsanpham->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <img width="400px" src="upload/tintuc/{{$ctsanpham->Hinh}}" alt=""><br>
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" @if ($ctsanpham->NoiBat==1)
                            {{"checked"}}
                            @endif type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" @if ($ctsanpham->NoiBat==0)
                            {{"checked"}}
                            @endif
                            type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình Luận
                    <small>Danh sách</small>
                </h1>
                @if(session('thongbao')){{-- kiểm tra xem có thông báo k--}}
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Nội dung</th>
                        <th>Ngày đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ctsanpham->comment as $cm )


                    <tr class="odd gradeX" align="center">
                        <td>{{$cm->id}}</td>
                        <td>{{$cm->user->name}}</td>
                        <td>{{$cm->NoiDung}}</td>
                        <td>{{$cm->created_at}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$ctsanpham->id}}">
                                Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.end row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



@endsection
@section('script')
<script>
    $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){

                    $("#LoaiTin").html(data);
                });
            });
        });
</script>
@endsection
