@extends('admin.layout.index')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                <small>{{$sanpham->Ten}}</small>
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
            <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai">
                        {{-- <option value="{{$theloai->id}}">{{$sanpham->theloai->Ten}}</option> --}}
                         @foreach ($theloai as $tl)
                        <option
                        @if ($sanpham->idTheLoai==$tl->id)
                        {{'selected'}}

                        @endif
                         value="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên loại tin</label>
                    <input class="form-control" name="Ten" placeholder="Nhập tên loại tin" value="{{$sanpham->Ten}}"/>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
