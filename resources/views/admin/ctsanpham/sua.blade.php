@extends('admin.layout.index')

@section('content')


    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết sản phẩm
                        <small>Sửa</small>
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
                    <form action="admin/ctsanpham/sua/{{$ctsanpham->id}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                                    <option value="{{$ctsanpham->sanpham->theloai->id}}">{{$ctsanpham->sanpham->theloai->Ten}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select class="form-control" name="SanPham" id="SanPham1">
                                    <option value="{{$ctsanpham->sanpham->id}}">{{$ctsanpham->sanpham->Ten}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$ctsanpham->TieuDe}}"/>
                        </div>
                        <div class="form-group">
                            <label>Tóm tắc</label>
                            <textarea id="demo" name="TomTat" class="form-control ckeditor tomtat" rows="3">{{$ctsanpham->TomTat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5">{{$ctsanpham->NoiDung}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá (VNĐ)</label>
                            <textarea id="demo" name="Gia" class="form-control" rows="3">{{$ctsanpham->Gia}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Khuyến Mãi (%)</label>
                            <textarea id="demo" name="KhuyenMai" class="form-control" rows="3">{{$ctsanpham->KhuyenMai}}</textarea>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Uploaded Image</h3>
                            </div>
                            <div class="panel-body" id="uploaded_image">
                                <div class="col-md-2" style="margin-bottom:16px; display: flex;" align="center";>
                                    <?php $idimg = 0 ?>
                                    @foreach($ctsanpham->sanpham->hinh as $hinhsp)
                                            <?php $idimg = $idimg+1 ?>
                                    <div>
                                    <img src="admin_asset\upload\images\san-pham\{{$hinhsp->Hinh}}" class="img-{{$idimg}}" style="height: 175px; margin: 3px; padding: 5px; border: solid 1px; border-radius: 3px;"/>
                                    <button type="button" class="btn btn-link remove_image" data-img="{{$idimg}}" id="{{$hinhsp->Hinh}}">Remove</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default submitctsp" style="position: absolute;margin-top: 225px;margin-left: 89px;">Sửa</button>
                        <button type="reset" class="btn btn-default" style="position: absolute;margin-top: 225px;">Làm mới</button>
                    </form>
                    <div class="form-group">
                        <label>Hình ảnh (<2mb)</label>
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
    <input type="hidden" name="checksuaorthem" value="1">

@endsection
@section('script')
@endsection

