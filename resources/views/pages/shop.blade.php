@extends('layout.index')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            @include('layout.component.menu-product')
{{--            menu-left--}}
            <div class="col-lg-9 order-1 order-lg-2">
                @include('layout.component.show-option-product')
                <div class="product-list">
                    @include('layout.component.content-product')
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
