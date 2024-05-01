<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Moyasar\Facades\Payment;
use Moyasar\Providers\PaymentService;


class AdminController extends Controller
{

    public  $page =1;

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function company_dashboard()
    {
        return view('company.dashboard');
    }

    public function spa()
    {
        return view('admin.spa');
    }

    public function ContactMessageList()
    {
        return view('admin.ContactMessageList');
    }

    public function CareerRequest()
    {
        return view('admin.CareerRequest');
    }

    public function profile()
    {
        return view('admin.profile');
    }


    public function spa_action($id,$action)
    {
        return view('admin.spa_actions',['id'=>$id,'action'=>$action]);
    }

    public function company_type()
    {
        return view('admin.company_types');
    }

    public function categories()
    {
        return view('admin.categories');
    }

    public function service_price()
    {
        return view('admin.service_site_price');
    }

    public function CareersType()
    {
        return view('admin.careerstype');
    }

    public function companiesAccountant(){
        return view('admin.acountant.companies-accountant');
    }

    public function payments($id)
    {
        $page_num = $id;
        app(PaymentService::class);
        $search =  \Moyasar\Search::query()->page($page_num);
        $pay =  Payment::all($search);
        // dd($pay);
        $payments = $pay;
        return view('admin.payments',compact('payments'));

    }

    public function refund($id)
    {
        app(PaymentService::class);

        $pay =  Payment::fetch($id);
        $payments = $pay->refund();
        $order = Order::where('transaction_id',$id)->first();
        $order->update(['status'=>2]);
        if ($pay->refunded > 0 && $order){
            return redirect()->route('admin.payments',['id'=>1])->with(['message'=>__('Done Refunded')]);
        }else{
            return redirect()->route('admin.payments',['id'=>1])->with(['error'=>__('Something went wrong.')]);
        }

    }


    public function notifications()
    {
        return view('notification');
    }

    public function admin_user()
    {
        return view('admin.users.index');
    }


    public function Orders()
    {
        return view('admin.Orders');
    }
}
