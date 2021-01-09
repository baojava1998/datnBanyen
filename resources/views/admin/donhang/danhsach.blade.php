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
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Phương thức </th>
                        <th>Duyệt</th>
                        <th>Chi tiết đơn hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($donhang as $id => $dh )


                        <tr class="odd gradeX" align="center">
                            <td>{{$id}}</td>
                            <td>{{$dh->user->name}}</td>
                            <td>{{number_format($dh->Tong)}} VNĐ<br>
{{--                                @foreach($tt->sanpham->hinh as $hinhsp)--}}
{{--                                    <img height="100px"  src="admin_asset\upload\images\san-pham\{{$hinhsp->Hinh}}" alt="">--}}
{{--                                @endforeach--}}
                            </td>
                            <td>{{$dh->ThanhToan}}</td>
                            <td>{{$dh->PhuongThuc}}</td>
                            <td class="center"><i class="fa fa-check fa-fw"></i> <a
                                    href="" data-id="{{$dh->id}}" class="donebill" data-url="{{route('done.bill')}}">Duyệt</a></td>
                            <td class="center"><i class="fa fa fa-ellipsis-h fa-fw"></i> <a
                                    href="" class="tg_detailbill" data-url="{{route('detail.bill')}}" data-id="{{$dh->id}}" data-name="{{$dh->user->name}}" data-toggle="modal" data-target="#detailbill">Chi tiết</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="detailbill" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
@endsection
