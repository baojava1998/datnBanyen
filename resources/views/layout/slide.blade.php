<section class="hero-section">
    <div class="hero-items owl-carousel">
        @foreach($slide as $sl)
        <div class="single-hero-items set-bg" data-setbg="admin_asset/upload/images/slide/{{$sl->Hinh}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
{{--                        <span>Bag,kids</span>--}}
                        <h1>{{$sl->Ten}}</h1>
                        <p>{!!$sl->NoiDung!!}</p>
                        <a href="/shop" class="primary-btn">Shop Now</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Sale <span>50%</span></h2>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
