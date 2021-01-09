<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function getDanhSach()
    {
        $donhang = HoaDon::where('duyet',0)->get();
        return view('admin.donhang.danhsach',compact('donhang'));
    }
    function getDetailBill(Request $request){
        $output = '';
        $quickview = ChiTietHoaDon::where('idHoaDon',$request->id)->get();

        $output .= '    <div class="modal-header">
                    <h4 class="modal-title">Khách hàng: '.$request->name.'</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>';
                foreach ($quickview as $qv) {
                    $output .='
                    <div class="modal-body" style = "display: flex">
                    <img width="50px" src = "admin_asset/upload/images/san-pham/'.$qv->ctsanpham->sanpham->hinh[0]->Hinh.'" alt = "" > &nbsp
                    <p> '.$qv->ctsanpham->TieuDe.'</p>
                    &nbsp<p>x '.$qv->SoLuong.'</p> <br>
                    </div>
                <hr>';
                    }
        $output .='<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>';
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
    function doneBill(Request $request){
        $bill = HoaDon::find($request->id);
        $bill->duyet = 1;
        $bill->save();
        return response()->json([
            'error'=>false,
        ]);
    }
}
