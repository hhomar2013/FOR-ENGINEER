<?php

namespace App\Http\Livewire;

use App\Models\account_balance;
use App\Models\Company;
use App\Models\NewRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function Symfony\Component\HttpKernel\Log\format;

class CompaniesStatistics extends Component
{
    public $month;
    protected $listeners = [
        'send_order_company'=>'order' ,
        'refresh-company-user'=>'$refresh',
        'Rows' => 'fetchRows'
    ];


    public $rows ;
    public $previousRowCount;


    public function mount()
    {
        $this->fetchRows();
        $this->previousRowCount = count($this->rows); // Set initial count
    }

    public function fetchRows()
    {
        $user = Company::query()->find(Auth::id());

        $this->rows = NewRequest::query()->where('companies_type_id',$user->ct_id)->latest()->get();


        // Check if new row is added
        if (count($this->rows) > $this->previousRowCount) {
            // $this->emit('newRowAdded'); // Emit an event if a new row is added
            $this->dispatchBrowserEvent('send_order_company');
            $this->dispatchBrowserEvent('send_order_message_company');

        }

        // Update the previous row count
        $this->previousRowCount = count($this->rows);
    }
    public function order()
    {
        $this->emit('refresh-company-user');
        $this->emit('company_topbar');
        $this->emit('Rows');
    }


    public function render()
    {
        $balance = account_balance::query()->where('status',1)->where('company_id',auth()->id())->get();
        $pending_orders =
            DB::table('orders')
            ->join('companies_services','orders.company_service','=','companies_services.id')
            ->where('companies_services.company_id', auth()->id())
            ->where('orders.status',1)
//            ->whereDate('orders.created_at',Carbon::now())
            ->count();

//        dd($pending_orders);
        $daily_orders =
            DB::table('orders')
                ->join('companies_services','orders.company_service','=','companies_services.id')
                ->where('companies_services.company_id', auth()->id())
                ->where('orders.status',1)
                ->whereDate('orders.created_at',Carbon::now())
                ->count();


//        dd($daily_orders->count());
        $chart = account_balance::select(DB::raw("SUM(price) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('id','ASC')
            ->where('company_id',auth()->id())
            ->where('status',1)
            ->pluck('count', 'month_name');
            $labels = $chart->keys();
            $data   = $chart->values();

        // $title =  auth()->user()->name;
        return view('livewire.company.companies-statistics',compact('balance','labels','data','daily_orders','pending_orders'))->extends('layouts.company');
    }
}
