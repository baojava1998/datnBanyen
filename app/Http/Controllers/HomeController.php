<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\SanPham;
use App\Models\Slide;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        $sanphamall = ChiTietSanPham::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        view()->share('sanphamall',$sanphamall);
        // if(Auth::check())
        // {
        // view()->share('nguoidung',Auth::user());
        // }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function index(){
        $sanphamxao = ChiTietSanPham::with('sanpham')->whereHas('sanpham', function($q){
            $q->where('idLoaiSanPham', 1);
        })->take(5)->get();
        $sanphamnuoc = ChiTietSanPham::with('sanpham')->whereHas('sanpham', function($q){
            $q->where('idLoaiSanPham', 2);
        })->take(5)->get();
        return view('pages.home',compact('sanphamxao','sanphamnuoc'));
    }
    function getQuickView(Request $request){
        $output = '';
        $quickview = ChiTietSanPham::find($request->id);
        $output .= '    <div class="modal-header">
                            <h4 class="modal-title">'.$quickview->TieuDe.'</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>'.$quickview->TomTat.'</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>';
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
    function shop()
    {
        $sanpham = ChiTietSanPham::all()->take(6);
        $loadmore = 'all';
        return view('pages.shop',compact('sanpham','loadmore'));
    }
    function ajaxTheLoai(Request $request)
    {
        $output = '';
        $chitietsanpham = ChiTietSanPham::with('sanpham')->whereHas('sanpham', function($q) use ($request){
            $q->where('idLoaiSanPham', $request->id);
        })->take(6)->get();
        $loadmore = $request->id;
        $output .= View::make('layout.component.content-product', ['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore]);
        if ($request->product){
            return view('pages.shop',['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore]);
        }else {
            return response()->json([
                'error' => false,
                'data' => $output,
            ]);
        }
    }
    function seachPrice(Request $request)
    {
        $output = '';
        $chitietsanpham = ChiTietSanPham::with('sanpham')->whereHas('sanpham', function($q) use ($request){
            $q->whereBetween('Gia', [$request->min, $request->max]);
        })->take(6)->get();
        $loadmore = 'seach';
        $output .= View::make('layout.component.content-product', ['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore]);
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
    function loadMore(Request $request)
    {
        $output = '';
        $chitietsanpham = ChiTietSanPham::with('sanpham')->whereHas('sanpham', function($q) use ($request){
            if ($request->load == 'all') {
            }
            elseif ($request->load == 'seach'){
                $q->whereBetween('Gia', [$request->min, $request->max]);
            }
            else{
                $q->where('idLoaiSanPham',$request->load);
            }
        })->skip($request->length)->take(6)->get();
        $loadmore = $request->load;
        if(!$chitietsanpham->isEmpty()) {
            $output .= View::make('layout.component.content-product', ['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore]);
        }
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
}
