<div class="select-items">
    <table>
        <tbody>
        @forelse($giohang as $gio)
            <tr>
                <td class="si-pic"><img src="admin_asset/upload/images/san-pham/{{$gio->Hinh}}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>{{number_format($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100)}} VNĐ
                            x {{$gio->SoLuong}}</p>
                        <h6>Sản phẩm...</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close"></i>
                </td>
            </tr>
        @empty
            <p>Chưa có sản phẩm nào</p>
        @endforelse
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{number_format($tongtien)}} VNĐ</h5>
</div>
<div class="select-button">
    <a href="/view-card" class="primary-btn view-card">XEM GIỎ</a>
    <a href="#" class="primary-btn checkout-btn">THANH TOÁN</a>
</div>


