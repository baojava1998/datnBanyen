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
use Illuminate\Support\Facades\Mail;
use Validator;
use URL;
use Session;
use Redirect;
use Input;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
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

class BuyController extends HomeController
{
    private $paylanding;
    public function __construct(PaypalController $paylanding)
    {
        /** setup PayPal api context **/
        $this->paylanding = $paylanding;

        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
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
        dd($request->all());
        if ($request->methodPay == 'thẻ'){
//            $priceData = Price::where('type',Price::IS_LANDINGPAGE)->first();
            $priceData = $request->
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName('Item 1') /** item name **/
            ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($priceData->price); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($priceData->price);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error','Connection timeout');
                    return Redirect::route('landingNews');
                    /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                    /** $err_data = json_decode($ex->getData(), true); **/
                    /** exit; **/
                } else {
                    \Session::put('error','Some error occur, sorry for inconvenient');
                    return Redirect::route('landingNews');
                    /** die('Some error occur, sorry for inconvenient'); **/
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());

            if(isset($redirect_url)) {
                /** redirect to paypal **/
                return Redirect::away($redirect_url);
            }

            \Session::put('error','Unknown error occurred');
            return Redirect::route('landingNews');
        }
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
