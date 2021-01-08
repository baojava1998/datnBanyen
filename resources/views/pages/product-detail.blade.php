@extends('layout.index')
@section('content')
<!-- Product Shop Section Begin -->
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
    .rating > input { display: none; }
    .rating > label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating > label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="admin_asset/upload/images/san-pham/{{$chitietsanpham->sanpham->hinh[0]->Hinh}}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                @foreach($chitietsanpham->sanpham->hinh as $hinh)
                                <div class=
                                     "{{$hinh->Hinh==$chitietsanpham->sanpham->hinh[0]->Hinh ? 'pt active': 'pt'}}"
                                     data-imgbigurl="admin_asset/upload/images/san-pham/{{$hinh->Hinh}}"><img
                                     src="admin_asset/upload/images/san-pham/{{$hinh->Hinh}}" alt=""></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{$chitietsanpham->sanpham->theloai->Ten}}</span>
                                <h3>{{$chitietsanpham->TieuDe}}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star{{($total>=1) ? "" :"-o" }}"></i>
                                <i class="fa fa-star{{($total>=2) ? "" :"-o" }}"></i>
                                <i class="fa fa-star{{($total>=3) ? "" :"-o" }}"></i>
                                <i class="fa fa-star{{($total>=4) ? "" :"-o" }}"></i>
                                <i class="fa fa-star{{($total>=5) ? "" :"-o" }}"></i>
                                <span>({{count($totalrating)}})</span>
                            </div>
                            <div class="pd-desc">
                                <p>{!!$chitietsanpham->TomTat !!}</p>
                                <h4>{{number_format($chitietsanpham->Gia*(100-$chitietsanpham->KhuyenMai)/100)}} VNĐ
                                @if(isset($chitietsanpham->KhuyenMai))
                                    <span>{{number_format($chitietsanpham->Gia)}} VNĐ</span>
                                @endif
                                </h4>
                            </div>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <span class="dec qtybtn">-</span>
                                    <input type="text" value="1">
{{--                                    <input name="cart_update" type="text" value="1">--}}
                                    <span class="inc qtybtn">+</span>
                                </div>
                                <a href="javascript:" data-url="themgio/{{ $chitietsanpham->id }}" data-hinh="{{$chitietsanpham->sanpham->hinh[0]->Hinh}}" data-qty="1" class="primary-btn pd-cart add_to_cart">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">Chi tiết sản phẩm</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Phản hồi của khách hàng ({{count($chitietsanpham->comment)}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Introduction</h5>
                                            <p>{!! $chitietsanpham->NoiDung !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="raing-user">
                                    @include('layout.component.content-rating')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($splienquan as $splq)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="admin_asset/upload/images/san-pham/{{$splq->sanpham->hinh[0]->Hinh}}" height="250px" alt="">
                        @if(isset($splq->KhuyenMai))
                            <div class="sale pp-sale">Sale</div>
                        @endif
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="javascript:" class="add_to_cart" data-hinh="{{$splq->sanpham->hinh[0]->Hinh}}" data-qty="1" data-url="themgio/{{ $splq->id }}"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="/shop-detail/{{$splq->id}}">+ Chi Tiết</a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <a href="#">
                            <h5>{{$splq->TieuDe}}</h5>
                        </a>
                        <div class="product-price">
                            {{number_format($splq->Gia*(100-$splq->KhuyenMai)/100)}} VNĐ
                            @if(isset($splq->KhuyenMai))
                                <span>{{number_format($splq->Gia)}} VNĐ</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Related Products Section End -->
@endsection

