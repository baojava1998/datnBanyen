<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/get-quick-view', 'HomeController@getQuickView')->name('get.QuickView');
Route::get('/shop', 'HomeController@shop');
Route::get('/shop-detail/{id}', 'HomeController@shopDetail');
Route::get('/TheLoai', 'HomeController@ajaxTheLoai')->name('ajax.TheLoai');
Route::get('/seachPrice', 'HomeController@seachPrice')->name('ajax.seachPrice');
Route::get('/load-more', 'HomeController@loadMore')->name('ajax.loadMore');
Route::get('/view-card', 'HomeController@viewCard');
Route::get('/update-card', 'HomeController@UpdateCard')->name('updateCard');
Route::get('delete-card','HomeController@DeleteCard')->name('deleteCard');
Route::get('/search-category', 'HomeController@searchProduct');
Route::post('/rating', 'HomeController@rating')->name('rating');
Route::get('nguoidung','HomeController@getNguoidung');
Route::post('nguoidung','HomeController@postNguoidung');
//login
Route::get('/dangnhap', 'UserController@getDangnhap');
Route::post('/dangnhap', 'UserController@postDangnhap')->name('login.page');
Route::get('/logout', 'UserController@getDangXuat')->name('logout.page');
//register
Route::post('dangky','UserController@postDangky')->name('register.page');
//buy
Route::get('themgio/{id}', 'BuyController@ThemGio');
Route::get('checkout', 'BuyController@CheckOut');
Route::post('finish-checkout', 'BuyController@finishCheckOut')->name('finish.checkout');
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));
//admin
Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangXuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::group(['prefix' => 'theloai'], function () {
        //admin/theloai/them
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('sua/{id}', 'TheLoaiController@getSua');

        Route::post('sua/{id}', 'TheLoaiController@postSua');

        Route::get('them', 'TheLoaiController@getThem');

        Route::post('them', 'TheLoaiController@postThem');

        Route::get('xoa', 'TheLoaiController@getXoa')->name('xoa.theloai');
    });

    Route::group(['prefix' => 'sanpham'], function () {
        //admin/theloai/them
        Route::get('danhsach', 'SanPhamController@getDanhSach');

        Route::get('sua/{id}', 'SanPhamController@getSua');

        Route::post('sua/{id}', 'SanPhamController@postSua');

        Route::get('them', 'SanPhamController@getThem');

        Route::post('them', 'SanPhamController@postThem');

        Route::get('xoa/{id}', 'SanPhamController@getXoa');
    });

    Route::group(['prefix' => 'ctsanpham'], function () {
        //admin/theloai/them
        Route::get('danhsach', 'ChiTietSanPhamController@getDanhSach');

        Route::get('sua/{id}', 'ChiTietSanPhamController@getSua');

        Route::post('sua/{id}', 'ChiTietSanPhamController@postSua');

        Route::get('them', 'ChiTietSanPhamController@getThem');

        Route::post('them', 'ChiTietSanPhamController@postThem');

        Route::get('xoa/{id}', 'ChiTietSanPhamController@getXoa');

        Route::get('image/upload','ChiTietSanPhamController@fileCreate');

        Route::post('image/upload/store','ChiTietSanPhamController@fileStore');

        Route::post('image/delete','ChiTietSanPhamController@fileDestroy');
    });

    Route::group(['prefix' => 'comment'], function () {

        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('sua/{id}', 'SlideController@getSua');

        Route::post('sua/{id}', 'SlideController@postSua');

        Route::get('them', 'SlideController@getThem');

        Route::post('them', 'SlideController@postThem');

        Route::get('xoa/{id}', 'SlideController@getXoa');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('sua/{id}', 'UserController@getSua');

        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('them', 'UserController@getThem');

        Route::post('them', 'UserController@postThem');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('ctsanpham/{idTheLoai}', 'AjaxController@getSanPham');
    });

    Route::group(['prefix' => 'donhang'], function () {
        Route::get('danhsach', 'DonhangController@getDanhSach');
        Route::get('getDetailBill', 'DonhangController@getDetailBill')->name('detail.bill');
        Route::get('duyetbill', 'DonhangController@doneBill')->name('done.bill');
    });
});

Route::get('/home', 'ChatController@index')->name('home');
Route::get('/mess/{ourid}', 'ChatController@getMess');
Route::post('/mess', 'ChatController@sendMess');
Route::get('/logout', 'UserController@getDangXuatAdmin')->name('logout');
//Route::get('/','Controller@index');
