<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingComment;
use App\Models\ChiTietSanPham;
use App\Models\Comment;
use App\Models\GioHang;
use App\Models\SanPham;
use App\Models\Slide;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

/** All Paypal Details class **/
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DB;

class HomeController extends Controller
{
    protected $user;
    private $paylanding;
    private $_api_context;
    function __construct(PaypalController $paylanding)
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        $sanphamall = ChiTietSanPham::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
        view()->share('sanphamall',$sanphamall);
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            $giohang = GioHang::where('idUser',Auth::id())->get();
            $tongtien = 0;
            $soluong = 0;
            foreach ($giohang as $gio){
                $tongtien += ($gio->ctsanpham->Gia*(100-$gio->ctsanpham->KhuyenMai)/100) * $gio->SoLuong;
                $soluong += $gio->SoLuong;
            }
            if (Auth::check()){
                $user = DB::select("select users.id, users.name, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.email");
                view()->share('user',$user);
            }
            view()->share('giohang',$giohang);
            view()->share('tongtien',$tongtien);
            view()->share('soluong',$soluong);
            return $next($request);
        });

        /** setup PayPal api context **/
        $this->paylanding = $paylanding;

        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
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
    function ajaxTheLoai(Request $request) //ajax and link
    {
        $local = ($request->local == 'sale') ? 'sale' : 'product';
        $output = '';
        $chitietsanpham = ChiTietSanPham::where(function ($query) use ($request){
            if ($request->sale) {
                $query->where('KhuyenMai', '!=', null);
            }else{
                $query->whereHas('sanpham', function($q) use ($request){
                    $q->where('idLoaiSanPham', $request->id);
                    if ($request->local == 'sale'){
                        $q->where('KhuyenMai', '!=', null);
                    }
                });
            }
        })->take(6)->get();
        $loadmore = $request->id;
        $output .= View::make('layout.component.content-product', ['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore, 'local'=> $local]);
        if ($request->product){
            return view('pages.shop',['sanpham' => $chitietsanpham, 'loadmore'=> $loadmore]);
        }elseif ($request->sale){
            return view('pages.shop',['sanpham' => $chitietsanpham, 'loadmore'=> 'sale']);
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
            if ($request->load == 1 || $request->load ==2){
                $q->where('idLoaiSanPham', $request->load);
            }
            elseif ($request->load =='sale'){
                $q->where('KhuyenMai','!=',null);
            }
        })->take(6)->get();
        $loadmore = 'seach';
        if ($request->load == 1 || $request->load ==2){
            $loadmore = 'seach-'.$request->load;
        }
        if ($request->load == 'sale'){
            $loadmore = 'sale';
        }
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
            elseif ($request->load == 'seach-1'){
                $q->whereBetween('Gia', [$request->min, $request->max])->where('idLoaiSanPham', 1);
            }
            elseif ($request->load == 'seach-2'){
                $q->whereBetween('Gia', [$request->min, $request->max])->where('idLoaiSanPham', 2);
            }
            elseif ($request->load == 'sale'){
                $q->where('KhuyenMai','!=',null)->whereBetween('Gia', [$request->min, $request->max]);
            }
            else{
                $q->where('idLoaiSanPham',$request->load);
                if ($request->local = 'sale'){
                    $q->where('KhuyenMai','!=',null);
                }
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
    function shopDetail($id)
    {
        $chitietsanpham = ChiTietSanPham::find($id);
        $splienquan = ChiTietSanPham::whereHas('sanpham', function($query) use ($chitietsanpham) {
            $query->where('idLoaiSanPham',$chitietsanpham->sanpham->idLoaiSanPham);
        })->take(4)->get();
        $countrt = $this->countrating($id);
        return view('pages.product-detail',['chitietsanpham'=>$chitietsanpham,'splienquan'=>$splienquan,
            'checkrating'=>$countrt['checkrating'],'total'=>$countrt['total'],'totalrating'=>$countrt['totalrating'],
            'onestar'=>$countrt['onestar'],'twostar'=>$countrt['twostar'],'threestar'=>$countrt['threestar'],
            'fourstar'=>$countrt['fourstar'],'fivestar'=>$countrt['fivestar']]);
    }
    function countrating($id)
    {
        $checkrating = Comment::where([
            ['idUser',Auth::id()],
            ['idChiTiet_Sp',$id]
        ])->get();
        $totalrating = Comment::where('idChiTiet_Sp',$id)->pluck('star');
        $total = 0;
        foreach ($totalrating as $tt){
            $total += $tt;
        }
        if (count($totalrating) >0 ) {
            $total = $total / count($totalrating);
        }else{
            $total = 0;
        }
        $onestar = count(Comment::where([['star',1], ['idChiTiet_Sp',$id]])->get());
        $twostar = count(Comment::where([['star',2], ['idChiTiet_Sp',$id]])->get());
        $threestar = count(Comment::where([['star',3], ['idChiTiet_Sp',$id]])->get());
        $fourstar = count(Comment::where([['star',4], ['idChiTiet_Sp',$id]])->get());
        $fivestar = count(Comment::where([['star',5], ['idChiTiet_Sp',$id]])->get());
        return ['onestar'=>$onestar,'twostar'=>$twostar,'threestar'=>$threestar,'fourstar'=>$fourstar,'fivestar'=>$fivestar,'total'=>$total,'totalrating'=>$totalrating,'checkrating'=>$checkrating];
    }
    function viewCard(){
        return view('pages.shopping-card');
    }
    public function UpdateCard(Request $request){
        $output = '';
        $user = Auth::user()->id;
        $gio = GioHang::where('idUser',$user)->get();
        $gio[$request->id]['SoLuong'] = $request->qty;
        $gio[$request->id]->save();
        $output = $this->refreshCard();
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
    public function DeleteCard(Request $request){
        $user = Auth::user()->id;
        $gio = GioHang::where('idUser',$user)->get();
        $gio[$request->id]->delete();
        $output = $this->refreshCard();
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
    function refreshCard(){
        $output = '';
        $gio = GioHang::where('idUser',Auth::user()->id)->get();
        $tongtien = 0;
        $soluong = 0;
        foreach ($gio as $giohang){
            $tongtien += ($giohang->ctsanpham->Gia*(100-$giohang->ctsanpham->KhuyenMai)/100) * $giohang->SoLuong;
            $soluong += $giohang->SoLuong;
        }
        $output .= View::make('layout.component.detail-card', ['giohang' => $gio,'tongtien'=>$tongtien,'soluong'=>$soluong]);
        return $output;
    }
    public function searchProduct(Request $request)
    {
        $query = $request->get('value','');
        $posts = ChiTietSanPham::select(['TieuDe', 'id'])->where('TieuDe','LIKE','%'.$query.'%')
            ->get();
        return response()->json($posts);
    }
    public function rating(RatingComment $request)
    {
       $output='';
        $comment = new Comment();
        $comment->idUser = Auth::id();
        $comment->idChiTiet_Sp = $request->idctsanpham;
        $comment->NoiDung = $request->comment;
        $comment->star = $request->rating;
        $comment->save();

        $chitietsanpham = ChiTietSanPham::find($request->idctsanpham);
        $countrt = $this->countrating($request->idctsanpham);
        $output .= View::make('layout.component.content-rating', ['chitietsanpham'=>$chitietsanpham,
                'checkrating'=>$countrt['checkrating'],'total'=>$countrt['total'],'totalrating'=>$countrt['totalrating'],
                'onestar'=>$countrt['onestar'],'twostar'=>$countrt['twostar'],'threestar'=>$countrt['threestar'],
                'fourstar'=>$countrt['fourstar'],'fivestar'=>$countrt['fivestar']]);
        return response()->json([
            'error'=>false,
            'data'=>$output,
        ]);
    }
}
