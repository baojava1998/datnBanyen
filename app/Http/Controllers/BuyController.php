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
        $sp = ChiTietSanPham::find($id);
        $user = Auth::user()->id;
        $giotheoid = GioHang::where([
            ['idSanPham', '=', $id],
            ['idUser', '=', $user],
        ])->first();
        if ($giotheoid != null){
            $giotheoid->SoLuong = $giotheoid->SoLuong +1;
            $giotheoid->save();
        }else{
            $gio = new GioHang();
            $gio->SanPham = $sp->TieuDe;
            $gio->SoLuong = 1;
            $gio->Gia = $sp->Gia;
            $gio->idSanPham = $id;
            $gio->Hinh = $request->hinh;
            $gio->idUser = Auth::id();
            $gio->save();
        }
        $output .= View::make('layout.component.content-product', ['sanpham' => '$chitietsanpham', 'loadmore'=> '$loadmore']);
    }
}
