<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class AjaxController extends Controller
{
    //
    public function getSanPham($idTheLoai)
    {
        $sanpham = SanPham::where('idLoaiSanPham',$idTheLoai)->get();
        foreach($sanpham as $sp)
        {
            echo "<option value='".$sp->id."'>".$sp->Ten."</option>";
        }
    }
}
