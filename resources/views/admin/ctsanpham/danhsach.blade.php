@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm
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
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th>Thể loai</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Khuyến Mãi</th>
                        <th>Tên</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ctsanpham as $tt )


                    <tr class="odd gradeX" align="center">
                        <td>{{$tt->id}}</td>
                        <td>{{$tt->TieuDe}} <br>
                            @foreach($tt->sanpham->hinh as $hinhsp)
                            <img width="100px" src="admin_asset\upload\images\san-pham\{{$hinhsp->Hinh}}" alt="">
                                @endforeach
                        </td>
                        <td>{!!$tt->TomTat!!}</td>
                        <td>{{$tt->sanpham->theloai->Ten}}</td>
                        <td>{{$tt->sanpham->Ten}}</td>
                        <td>{{number_format($tt->Gia)}}</td>
                        <td>{{$tt->KhuyenMai}}%</td>
                        <td>{{$tt->sanpham->Ten}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/ctsanpham/xoa/{{$tt->id}}">
                                Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                href="admin/ctsanpham/sua/{{$tt->id}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
