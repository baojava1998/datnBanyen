<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinishCheckOut;
use App\Models\ChiTietHoaDon;
use App\Models\GioHang;
use App\Models\ChiTietSanPham;
use App\Models\HoaDon;
use App\Models\ThongTinNhanHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BuyController extends HomeController
{
    public function ThemGio($id, Request $request)
    {
        $output = '';
        $tongtien = 0;
        $soluong = 0;
        $sp = ChiTietSanPham::find($id);
        $user = Auth::user()->id;
        $giotheoid = GioHang::where([
            ['idSanPham', '=', $id],
            ['idUser', '=', $user],
        ])->first();
        if ($giotheoid != null){
            $giotheoid->SoLuong = $giotheoid->SoLuong +$request->qty;
            $giotheoid->save();
        }else{
            $gio = new GioHang();
            $gio->SanPham = $sp->TieuDe;
            $gio->SoLuong = $request->qty;
            $gio->Gia = $sp->Gia;
            $gio->idSanPham = $id;
            $gio->Hinh = $request->hinh;
            $gio->idUser = Auth::id();
            $gio->save();
        }
        $giohang = GioHang::where('idUser',Auth::id())->get();
        foreach ($giohang as $gio){
            $tongtien += ($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100) * $gio->SoLuong;
            $soluong += $gio->SoLuong;
        }
        $output .= View::make('layout.component.card-view', ['giohang' => $giohang,'tongtien'=>$tongtien]);
        return response()->json([
            'error' => false,
            'data' => $output,
            'soluong'=>$soluong,
        ]);
    }

    public function CheckOut()
    {
        return view('pages.checkout');
    }
    public function finishCheckOut(FinishCheckOut $request)
    {
        $hoadon = new HoaDon();
        $hoadon->id_KhachHang = Auth::id();
        $hoadon->Tong= $request->total;
        $hoadon->PhuongThuc= $request->methodPay;
        $hoadon->ThanhToan= 0;
        $hoadon->duyet= 0;
        $hoadon->save();
        $sanphamcheckout = GioHang::where('idUser',Auth::id())->get();
        foreach ($sanphamcheckout as $checkout){
            $cthoadon = new ChiTietHoaDon();
            $cthoadon->idHoaDon = $hoadon->id;
            $cthoadon->idChiTiet_Sp = $checkout->idSanPham;
            $cthoadon->SoLuong = $checkout->SoLuong;
            $cthoadon->Gia = $checkout->Gia;
            $cthoadon->save();
        }
        $thongtinnhanhang = new ThongTinNhanHang();
        $thongtinnhanhang->idUser = Auth::id();
        $thongtinnhanhang->idHoaDon = $hoadon->id;
        $thongtinnhanhang->Ten = Auth::user()->name;
        $thongtinnhanhang->DiaChi = $request->DiaChi;
        $thongtinnhanhang->ThanhPho = $request->location;
        $thongtinnhanhang->sdt = $request->phone;
        $thongtinnhanhang->save();
//xoá giỏ hàng
        foreach ($sanphamcheckout as $item){
            $item->delete();
        }
            return redirect()->route('home')->with('successCheckOut','Đặt hàng thành công');
    }
}
