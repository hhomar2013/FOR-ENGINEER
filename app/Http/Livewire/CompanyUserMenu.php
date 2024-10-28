<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\NewRequest;
use App\Models\User;
use App\Traits\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompanyUserMenu extends Component
{
    use Helper;
    public $listeners =[
        'send_order_company'=>'order' ,
        'refresh-company-user'=>'$refresh',
        'Rows' => 'fetchRows'
    ];


    public $rows ;
    public $previousRowCount;

    protected $paginationTheme = 'bootstrap';

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

        // $this->dispatchBrowserEvent('send_order_company');
        // $this->dispatchBrowserEvent('send_order_message_company');

        $this->emit('refresh-company-user');
        $this->emit('Rows');
        // $this->dispatchBrowserEvent('send_order');
        // $this->emit('send_order');
    }



    public function render()
    {
        $user = Company::query()->find(Auth::id());

        // dd($user->notifications);
        return view('livewire.company.company-user-menu' ,['user'=>$user]);
    }
}
