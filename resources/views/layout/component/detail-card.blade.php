<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-table" data-url="{{route('deleteCard')}}">
                <table>
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th class="p-name">Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th><i class="ti-close"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($giohang as $id=>$gio)
                        <tr>
                            <td class="cart-pic first-row"><img src="admin_asset/upload/images/san-pham/{{$gio->Hinh}}" width="150px" alt=""></td>
                            <td class="cart-title first-row">
                                <h5>{{$gio->SanPham}}</h5>
                            </td>
                            <td class="p-price first-row">{{number_format($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100)}} VNĐ</td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="pro-qty" data-url="{{route('updateCard')}}" data-id="{{$id}}">
                                        <span class="dec qtybtn" {{$gio->SoLuong == 1 ? 'hidden' : '' }}>-</span>
                                        <input name="cart_update" type="text" value="{{$gio->SoLuong}}">
                                        <span class="inc qtybtn">+</span>
{{--                                        <input type="number" name="cart_update" value="{{$gio->SoLuong}}" min="1">--}}
                                    </div>
                                </div>
                            </td>
                            <td class="total-price first-row">{{number_format(($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100)*$gio->SoLuong)}} VNĐ</td>
                            <td class="close-td first-row" data-id="{{$id}}"><i class="ti-close"></i></td>
                        </tr>
                    @empty
                        <p>Chưa có sản phẩm nào</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="cart-buttons">
                        <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                        <a href="#" class="primary-btn up-cart">Update cart</a>
                    </div>
                    <div class="discount-coupon">
                        <h6>Discount Codes</h6>
                        <form action="#" class="coupon-form">
                            <input type="text" placeholder="Enter your codes">
                            <button type="submit" class="site-btn coupon-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-4">
                    <div class="proceed-checkout">
                        <ul>
                            <li class="subtotal">Subtotal <span>{{number_format($tongtien)}} VNĐ</span></li>
                            <li class="cart-total">Total <span>{{number_format($tongtien)}} VNĐ</span></li>
                        </ul>
                        <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

