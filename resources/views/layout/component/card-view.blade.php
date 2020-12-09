<li class="cart-icon">
    <a href="#">
        <i class="icon_bag_alt"></i>
        <span>3</span>
    </a>
    <div class="cart-hover">
        <div class="select-items">
            <table>
                <tbody>
                @forelse($giohang as $gio)
                <tr>
                    <td class="si-pic"><img src="admin_asset/upload/images/san-pham/{{$gio->Hinh}}" alt=""></td>
                    <td class="si-text">
                        <div class="product-selected">
                            <p>$60.00 x 1</p>
                            <h6>Kabino Bedside Table</h6>
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
            <h5>$120.00</h5>
        </div>
        <div class="select-button">
            <a href="#" class="primary-btn view-card">VIEW CARD</a>
            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
        </div>
    </div>
</li>
