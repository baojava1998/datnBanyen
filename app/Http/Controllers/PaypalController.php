<?php

namespace App\Http\Controllers;

use App\Models\ChiTietHoaDon;
use App\Models\GioHang;
use App\Models\HoaDon;
use App\Models\ThongTinNhanHang;
use Illuminate\Http\Request;
use App\Services\General;
use Illuminate\Support\Facades\Auth;
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

class PaypalController extends Controller
{
    private $_api_context;
    private $generalService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);

//        $this->generalService = $generalService;
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('testpay');
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal()
    {
        $priceData = Price::where('type',Price::IS_LANDINGPAGE)->first();
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
                return Redirect::route('paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
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
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            $ttkh = session()->get('ttkh');
            $hoadon = new HoaDon();
            $hoadon->id_KhachHang = Auth::id();
            $hoadon->Tong= $ttkh['total'];
            $hoadon->PhuongThuc= 'thẻ';
            $hoadon->ThanhToan= 1;
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
            $thongtinnhanhang->DiaChi = $ttkh['DiaChi'];
            $thongtinnhanhang->ThanhPho = $ttkh['ThanhPho'];
            $thongtinnhanhang->sdt = $ttkh['phone'];
            $thongtinnhanhang->save();
//xoá giỏ hàng
            foreach ($sanphamcheckout as $item){
                $item->delete();
            }

//            \Session::put('successCheckOut','Payment success');
            return redirect()->route('home')->with('successCheckOut','Payment success');
        }
//        \Session::put('errorpayment','Payment failed');

        return redirect()->route('home')->with('falseCheckOut','Payment false');
    }
}
