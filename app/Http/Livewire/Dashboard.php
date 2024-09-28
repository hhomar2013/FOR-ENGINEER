<?php

namespace App\Http\Livewire;

use App\Models\account_balance;
use App\Models\Company;
use App\Models\NewRequest;
use App\Models\Order;
use App\Models\service_provider_reservation;
use App\Models\site_tresury;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use function Symfony\Component\HttpKernel\Log\format;

class Dashboard extends Component
{
    use WithPagination;
    public $search='';
    public $orders;
    public $shouldPlayAudio;
    public $rows;
    public $previousRowCount;
    public $listeners =[
    'refreshDashboardAdmin' =>'refresh_page',
    'send_order'=>'order' ,
    'dashboardRefresh'=>'$refresh',
    'Rows' => 'fetchRows'
];
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->fetchRows();
        $this->previousRowCount = count($this->rows); // Set initial count
    }

    public function fetchRows()
    {
        $this->rows = NewRequest::latest()->get();

        // Check if new row is added
        if (count($this->rows) > $this->previousRowCount) {
            // $this->emit('newRowAdded'); // Emit an event if a new row is added
            $this->dispatchBrowserEvent('send_order');
            $this->dispatchBrowserEvent('send_order_message');

        }

        // Update the previous row count
        $this->previousRowCount = count($this->rows);
    }

    public function order()
    {
        $this->emit('dashboardRefresh');
        $this->emit('Rows');
        // $this->dispatchBrowserEvent('send_order');
        // $this->emit('send_order');
    }

    // public function update()
    //     {
    //     // updates
    //     $this->emit('send_order');
    //     }
    public function refresh_page()
    {
        $this->orders = Order::query()->with(['users','companies_service'])
            ->orderBy('id','desc')
            ->limit(10)->get();
    }



    public function render()
    {
//        $SPA = service_provider_reservation::where('name','like','%'.$this->search.'%');
        $spa = service_provider_reservation::where('status',0)
            ->where('created_at',Carbon::now()->format('Y-m-d'))
            ->get();
        $this->orders = Order::query()->with(['users','companies_service'])
            ->orderBy('id','desc')
            ->limit(10)->get();
        $companies = Company::query()->where('status',1)->count();
        $Annual = site_tresury::query()->where('status',1)->whereYear('updated_at',Carbon::now()->format('Y'))->sum('price');
        $monthly = site_tresury::query()->where('status',1)->whereMonth('updated_at', Carbon::now()->format('m'))->sum('price');
        $reservation = service_provider_reservation::query()->where('status','=',0)->count();

        return view('livewire.admin.dashboard',
            ['spa'=>$spa,'orders'=>$this->orders,
            'companies_count'=>$companies,'annual'=>$Annual,'monthly'=>$monthly,
            'reservation'=>$reservation
            ])
            ->layout('layouts.admin_livewire' , ['title'=> __('Dashboard')]);
    }
}
