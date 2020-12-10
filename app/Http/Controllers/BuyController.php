<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\ChiTietSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BuyController extends Controller
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
}
