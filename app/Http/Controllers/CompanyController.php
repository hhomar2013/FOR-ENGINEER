<?php

namespace App\Http\Controllers;

use App\Models\account_balance;
use App\Models\logs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    public function index()
    {
        $balance = account_balance::query()->where('status',1)->where('company_id',auth()->id())->get();

        $chart = account_balance::select(DB::raw("SUM(price) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id','ASC')
            ->where('status',1)
            ->pluck('count', 'month_name');

        $labels = $chart->keys();
        $data = $chart->values();
//        dd($labels);
//        dd($data);
        return view('company.dashboard');
    }

    public function profile()
    {
        return view('company.profile');
    }

    public function services()
    {
        return view('company.company_service');
    }

    public function company_order()
    {
        return view('company.company_orders');
    }
}
