<?php

namespace App\Http\Livewire;

use App\Models\NewRequest;
use App\Models\Order;
use Livewire\Component;

class AdminOrders extends Component
{
    public $order_count;

    protected $listeners = ['AdminOrderRefresh'=>'$refresh' ,
    'get_data'
];

    public function get_data(){
        dd('ok');
    }

    public function render()
    {
        // $this->order_count = Order::query()->count();
        $this->order_count = NewRequest::query()->count();
        return view('livewire.admin-orders');
    }
}
