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
    public $previousRowCount;
    public $rows;

    protected $listeners = ['AdminOrderRefresh'=>'$refresh' ,'Rows'=>'fetchRows'];

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
            $this->dispatchBrowserEvent('order_count');
            $this->dispatchBrowserEvent('order_count_message');

        }

        // Update the previous row count
        $this->previousRowCount = count($this->rows);
    }

    public function orderCount()
    {
        $this->emit('AdminOrderRefresh');
        $this->emit('Rows');
        // $this->dispatchBrowserEvent('send_order');
        // $this->emit('send_order');
    }


    public function render()
    {
        // $this->order_count = Order::query()->count();
        $this->orderCount = NewRequest::query()->count();
        return view('livewire.admin-orders');
    }
}
