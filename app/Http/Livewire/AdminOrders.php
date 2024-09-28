<?php

namespace App\Http\Livewire;

use App\Models\NewRequest;
use App\Models\Order;
use Livewire\Component;

class AdminOrders extends Component
{

    public $orderCount;
    public $requestOldCount;
    public $audio = false;

    protected $listeners = ['AdminOrderRefresh'=>'$refresh' ,'getData'];

    public function getData(){
        $this->dispatchBrowserEvent('getData');
    }

    public function render()
    {
        // $this->order_count = Order::query()->count();
        $this->orderCount = NewRequest::query()->count();
        return view('livewire.admin-orders');
    }
}
