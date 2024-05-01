<?php

namespace App\Http\Livewire;

use App\Models\account_balance;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function Symfony\Component\HttpKernel\Log\format;

class CompaniesStatistics extends Component
{
    public $month;
    protected $listeners = ['commentUpdated' => 'WhenCommentUpdated' ,'order_send'=>'playAudio'];

    public function WhenCommentUpdated()
    {
//        session()->flash('message','You have New Order');
//        $this->emit('commentUpdated');
        $this->emit('playAudio');
    }


    public function play()
    {
        $this->emit('orderSend');
//        session()->flash('message','You have New Order');
//        $this->emit('commentUpdated');
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
        return view('livewire.company.companies-statistics',compact('balance','labels','data','daily_orders','pending_orders'));
    }
}
