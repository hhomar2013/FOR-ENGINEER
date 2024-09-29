<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Company;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth:web']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->status == 0){
            Auth::logout();
//        Auth::guard('users')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('error',__('Your Account is not activated'));
            return  redirect()->route("site.index");
        }else{
            return view('home');
        }

    }

    public function index_customer()
    {
        $categories = categories::query()->where('status',1)
        // ->whereNotNull('parent_id')
        ->get();
        return view('welcome1',compact('categories'));
    }

    public function about(){
        return view('site_v2.about_index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function SeriveShow($id){
        $service = categories::query()->findOrFail($id);
        return view('site_v2.service',compact('service'));
    }

    public function careers()
    {
        return view('careers');
    }
    public function orders(Request $request)
    {

        return view('site.orders.index');
    }

    public function UserOrders()
    {

        return view('site.user_orders.index');
    }

    /*Users Methods*/
    public function users_profile()
    {
        return view('site.users.profile');
    }
    /*End Users Methods*/


    public function emailshow(){
        return view('emails.NewRequestEmail');
    }

}
