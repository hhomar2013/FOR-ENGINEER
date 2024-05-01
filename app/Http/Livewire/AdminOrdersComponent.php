<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrdersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers=5;
    public $search;

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }
    public function render()
    {
        $orders = Order::query()->where('order_ref','like','%'.$this->search.'%')->paginate($this->numbers);
        return view('livewire.admin-orders-component',compact('orders'));
    }
}
