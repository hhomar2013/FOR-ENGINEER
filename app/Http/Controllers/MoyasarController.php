<?php

namespace App\Http\Controllers;

use App\Models\account_balance;
use App\Models\Order;
use App\Models\order_invoice;
use App\Models\site_tresury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Moyasar\Moyasar;
use Moyasar\Facades\Payment;
use Moyasar\Facades\Invoice;
use Moyasar\Providers\PaymentService;

class MoyasarController extends Controller
{


    public function index()
    {
        $invoiceService = new \Moyasar\Providers\InvoiceService();
        $invoiceService->create([
            'amount' => 10 * 10, // 10000.00 SAR
            'currency' => 'SAR',
            'description' => 'iPhone XII Purchase',
            'callback_url' => 'http://www.example.com/invoice-status-changed', // Optional
//            'expired_at' => '2024-04-01' // Optional
        ]);


    }


    public function pay(Request $request)
    {
        session()->forget('order_id');
        session()->put('order_id',$request->id);
        return view('transaction',['data'=>$request]);
    }

    public function payInvoice(Request $request)
    {
        session()->forget('order_id');
        session()->put('order_id',$request->id);
        return view('transaction_invoice',['data'=>$request]);
    }


    public function call_back(Request $request)
    {
        $request =  $request->all();

        if (isset($request['status']) && $request['status'] == 'paid'){
            $order_id = session('order_id');
            $order = Order::where('order_ref',$order_id)->with('companies_service')->first();
            $order->update([
                'transaction_id'=>$request['id'],
                'status'=>1
            ]);

            $service = DB::table('companies_services')
                ->join('service_site_prices','companies_services.category_id', '=', 'service_site_prices.category_id')
                ->join('orders', 'companies_services.id','=','orders.company_service')
                ->select
                (
                    'companies_services.id',
                    'service_site_prices.category_id',
                    'service_site_prices.type',
                    'service_site_prices.present',
                    'service_site_prices.price',
                    'service_site_prices.service_price',
                    'service_site_prices.discount',
                    'service_site_prices.after_discount',
                    'service_site_prices.status',
                    'orders.order_ref',
                    'companies_services.company_id'
                )
                ->where('orders.order_ref',$order_id)
                ->first();
            $price = $service->price;
            $present =  $service->present;
            $last_price = $price * $present / 100;
            $total = $price - $last_price;

            if ($service->type == 0)
            {
              account_balance::query()->create([
                    'order_id'=>$service->order_ref,
                    'company_id'=>$service->company_id,
                    'price'=>$total,
                    'status'=>1
                ]);

              site_tresury::query()->create([
                  'order_id'=>$service->order_ref,
                  'company_id'=>$service->company_id,
                  'price'=>$last_price,
                  'status'=>1
              ]);

              }
            session()->flash('message',__('Payment Success'));
            session()->forget(['order_id','service']);

        }elseif (isset($request['status']) && $request['status'] == 'failed') {
            session()->flash('error', __('Unable to process the purchase transaction Please try again'));
        }

        return view('call_back',compact('request'));

    }


    public function call_back_invoice(Request $request)
    {
        $request =  $request->all();

        if (isset($request['status']) && $request['status'] == 'paid'){
            $order_id = session('order_id');
            $order = Order::where('order_ref',$order_id)->with('companies_service')->first();
            $order->update([
                'transaction_id'=>$request['id'],
                'status'=>6
            ]);

            $oi = order_invoice::query()->where('order_ref',$order_id)->first();
            $oi->update(['status'=>1,'transaction_id'=>$request['id'],'user'=>auth()->id()]);

            session()->flash('message',__('Payment Success'));
            session()->forget(['order_id','service']);

        }elseif (isset($request['status']) && $request['status'] == 'failed') {
            session()->flash('error', __('Unable to process the purchase transaction Please try again'));
        }

        return view('call_back',compact('request'));

    }








}
