<div class="row">
    @foreach($sanpham as $sp)
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="admin_asset/upload/images/san-pham/{{$sp->sanpham->hinh[0]->Hinh}}" height="250px" alt="">
                    @if(isset($sp->KhuyenMai))
                        <div class="sale pp-sale">Sale</div>
                    @endif
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="javascript:" class="add_to_cart" data-hinh="{{$sp->sanpham->hinh[0]->Hinh}}" data-url="themgio/{{ $sp->id }}"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="/shop-detail/{{$sp->id}}">+ Chi Tiết</a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    {{--                                    <div class="catagory-name">Towel</div>--}}
                    <a href="#">
                        <h5>{{$sp->TieuDe}}</h5>
                    </a>
                    <div class="product-price">
                        {{number_format($sp->Gia*(100-$sp->KhuyenMai)/100)}} VNĐ
                        @if(isset($sp->KhuyenMai))
                            <span>{{number_format($sp->Gia)}} VNĐ</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="loading-more">
    <a href="#" id="load-more" data-local="{{isset($local) ? $local :'product'}}" data-load="{{$loadmore}}" data-url="{{route('ajax.loadMore')}}">
        More Product
    </a>
</div>
