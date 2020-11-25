@extends('layout.index')
@section('content')
<!-- Product Shop Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
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
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
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
                                    <input type="text" value="1">
                                </div>
                                <a href="#" class="primary-btn pd-cart">Add To Cart</a>
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
                                <div class="customer-review-option">

                                    <span class="heading">User Rating</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <p>4.1 average based on 254 reviews.</p>
                                    <hr style="border:3px solid #f1f1f1">

                                    <div class="row">
                                        <div class="side">
                                            <div>5 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>150</div>
                                        </div>
                                        <div class="side">
                                            <div>4 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-4"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>63</div>
                                        </div>
                                        <div class="side">
                                            <div>3 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-3"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>15</div>
                                        </div>
                                        <div class="side">
                                            <div>2 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-2"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>6</div>
                                        </div>
                                        <div class="side">
                                            <div>1 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-1"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>20</div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4>{{count($chitietsanpham->comment)}} Comments</h4>
                                    <div class="comment-option">
                                        @foreach($chitietsanpham->comment as $cm)
                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="img/product-single/avatar-2.png" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>{{$cm->user->name}} <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">{{$cm->NoiDung}}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="personal-rating">
                                        <h6>Your Ratind</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment</h4>
                                        <form action="#" class="comment-form">
                                            <div class="row">
{{--                                                <div class="col-lg-6">--}}
{{--                                                    <input type="text" placeholder="Name">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-6">--}}
{{--                                                    <input type="text" placeholder="Email">--}}
{{--                                                </div>--}}
                                                <div class="col-lg-12">
                                                    <textarea placeholder="Messages"></textarea>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
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

