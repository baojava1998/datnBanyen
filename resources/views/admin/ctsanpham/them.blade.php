@extends('admin.layout.index')

@section('content')


    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết sản phẩm
                        <small>Thêm</small>
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
                    <form action="admin/ctsanpham/them" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                                {{-- <option >MỜI CHỌN THỂ LOẠI</option> --}}
                                @foreach ($theloai as $tl)

                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select class="form-control" name="SanPham" id="SanPham">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắc</label>
                            <textarea id="demo" name="TomTat" class="form-control ckeditor tomtat" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá (VNĐ)</label>
                            <textarea id="demo" name="Gia" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Khuyến mãi (%)</label>
                            <textarea id="demo" name="KhuyenMai" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default submitctsp" style="position: absolute;margin-top: 225px;margin-left: 89px;">Thêm</button>
                        <button type="reset" class="btn btn-default" style="position: absolute;margin-top: 225px;">Làm mới</button>
                    </form>
                        <div class="form-group">
                            <label>Hình ảnh</label>
{{--                            <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"--}}
{{--                                  class="dropzone" id="dropzone">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
                            <form action="{{url('admin/ctsanpham/image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                    <input name="haloo" value="baohlo"/>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <input type="hidden" name="checksuaorthem" value="2">

@endsection
@section('script')
@endsection

