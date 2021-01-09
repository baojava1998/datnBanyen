@extends('layout.index')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{route('finish.checkout')}}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Thông tin của bạn</h4>
                        <div class="row">
                            @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{$err}} <br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <label for="cun">Thành phố/ Tỉnh<span>*</span></label>
                                <input type="text" id="cun" name="location">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ<span>*</span></label>
                                <input type="text" id="street" name="DiaChi" class="street-first">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Số điện thoại<span>*</span></label>
                                <input type="text" id="phone" name="phone">
                            </div>
                            <div class="col-lg-12">
{{--                                <div class="create-item">--}}
{{--                                    <label for="acc-create">--}}
{{--                                        Create an account?--}}
{{--                                        <input type="checkbox" id="acc-create">--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Sản phẩm của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @forelse($giohang as $gio)
                                    <li class="fw-normal"><img src="admin_asset/upload/images/san-pham/{{$gio->Hinh}}" width="50px" alt=""> - {{$gio->ctsanpham->sanpham->theloai->Ten}} x {{$gio->SoLuong}}<span>{{number_format($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100)}} VNĐ</span></li>
{{--                                        <input type="hidden" name="idSanPham-{{$gio->id}}" value="{{$gio->id}}">--}}
{{--                                        <input type="hidden" name="Gia-{{$gio->id}}" value="{{$gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100}}">--}}
{{--                                        <input type="hidden" name="SoLuong-{{$gio->id}}" value="{{$gio->SoLuong}}">--}}
                                    @empty
                                        <li class="fw-normal">Không có sản phẩm nào</li>
                                    @endforelse
{{--                                    <li class="fw-normal">Subtotal <span>$240.00</span></li>--}}
                                    <li class="total-price">Tổng tiền <span>{{number_format($tongtien)}} VNĐ</span></li>
                                    <input type="hidden" name="total" value="{{$tongtien}}">
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán trực tiếp khi nhận hàng
                                            <i class="fa fa-truck" aria-hidden="true"></i>
                                            <input type="checkbox" id="pc-check" name="methodPay" value="nhận hàng">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                                            <input type="checkbox" id="pc-paypal" name="methodPay" value="thẻ">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
