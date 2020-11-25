<div class="col-lg-3">
    <div class="filter-widget">
        <h4 class="fw-title">Thể Loại</h4>
        <ul class="filter-catagories">
            @foreach($theloai as $tl)
                <li><a href="javascript:" data-url="{{route('ajax.TheLoai')}}"
                       data-local="{{isset($_GET['sale']) ? 'sale' : 'product'}}"
                       data-id="{{$tl->id}}" class="theloai">{{$tl->Ten}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount">
                    <input type="text" id="maxamount">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                 data-min="0" data-max="10000000">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <a href="#" class="filter-btn" data-load="{{$loadmore}}" data-url="{{route('ajax.seachPrice')}}">Filter</a>
    </div>
</div>
