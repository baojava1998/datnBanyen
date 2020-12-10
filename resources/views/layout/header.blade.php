<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    baojava1998@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +84 735 04938
                </div>
            </div>
            <div class="ht-right">
                @if(Auth::check())
                <a href="/logout" class="fa" style="float: right;margin-top: 3.5%;margin-left: 10px;"><i style="font-size:24px;
                color: black"class="fa">&#xf08b;</i></a>
                @endif
                <a href="" class="login-panel" data-toggle="modal" data-target="{{Auth::check() ? '' : '#login'}}"><i class="fa fa-user"></i>
                        {{Auth::check() ? Auth::user()->name : 'Đăng nhập'}}
                </a>
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="img/flag-vn.jpg" data-imagecss="flag yt"
                                data-title="English">Viet Nam</option>
                        <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="./">
                            <img src="img/logo.png" height="50px" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <div class="input-group">
                            <input type="text" placeholder="Bạn cần gì?">
                            <button type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right" style="display: flex;float: right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <div id="card-view">
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span class="soluong">{{$soluong}}</span>
                                </a>
                                <div class="cart-hover">
                                    @include('layout.component.card-view')
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>Loại sản phẩm</span>
                    <ul class="depart-hover">
                        @foreach($theloai as $tl)
                            <li><a href="/TheLoai?id={{$tl->id}}&product=true">{{$tl->Ten}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li class="{{(Request::segment(1) == ''?'active': '')}}"><a href="./">Trang chủ</a></li>
                    <li class="{{(Request::segment(1) == 'shop'?'active': (isset($_GET['product'])?'active':(Request::segment(1) == 'shop-detail')?'active':''))}}"><a href="/shop">Sản phẩm</a></li>
                    <li class="{{isset($_GET['sale'])?'active':''}}"><a href="/TheLoai?sale=true">Giảm giá</a></li>
                    <li><a href="./contact.html">Liên Hệ</a></li>
                    <li><a href="#">Phản hồi</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
    <div class="modal fade" id="login" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="register-login-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <h2>Login</h2>
                                    <form action="{{route('login.page')}}" method="post">
                                        @csrf
                                        @if(session('errors-login'))
                                            <div class="alert alert-danger">
                                                {{session('errors-login')}}
                                            </div>
                                        @endif
                                        <div class="group-input">
                                            <label for="username">Username or email address *</label>
                                            <input type="email" id="username" name="email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="group-input">
                                            <label for="pass">Password *</label>
                                            <input type="password" id="pass" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color: red">{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="group-input gi-check">
                                            <div class="gi-more">
{{--                                                <label for="save-pass">--}}
{{--                                                    Save Password--}}
{{--                                                    <input type="checkbox" id="save-pass">--}}
{{--                                                    <span class="checkmark"></span>--}}
{{--                                                </label>--}}
                                                <a href="#" class="forget-pass">Forget your Password</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="site-btn login-btn">Sign In</button>
                                    </form>
                                    <div class="switch-login">
                                        <a href="" class="or-login" data-toggle="modal" data-target="#register" data-dismiss="modal">Or Create An Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="register" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="register-login-section spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="register-form">
                                    <h2>Register</h2>
                                    <form action="#">
                                        <div class="group-input">
                                            <label for="username">Username or email address *</label>
                                            <input type="text" id="username">
                                        </div>
                                        <div class="group-input">
                                            <label for="pass">Password *</label>
                                            <input type="text" id="pass">
                                        </div>
                                        <div class="group-input">
                                            <label for="con-pass">Confirm Password *</label>
                                            <input type="text" id="con-pass">
                                        </div>
                                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                                    </form>
                                    <div class="switch-login">
                                        <a href="./login.html" data-toggle="modal" data-target="#login" data-dismiss="modal" class="or-login">Or Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
