<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderCart extends Component
{
    protected $listeners = ['cart-refresh'=>'$refresh'];
    public $order;
    public function render()
    {
        $orders = Order::query()->where('status','0')->where('user',auth()->id())->get();
        return view('livewire.order-cart',compact('orders'));
    }
}
