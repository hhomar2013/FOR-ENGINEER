<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{

    public $newRequest;

    public function mount(){
        $this->newRequest  = NewRequest::query()->where('user_id','=',Auth::id())->get();
    }

    public function render()
    {

        return view('livewire.sitev2.user.user-dashboard-component');
    }
}
