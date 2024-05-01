<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrders extends Component
{
    public $order_count;

    public function boot(){
    }

    public function render()
    {
        $this->order_count = Order::query()->count();
        return view('livewire.admin-orders');
    }
}
