<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{

    public $newRequest;


    public function render()
    {
        $this->newRequest  = NewRequest::query()->where('user_id','=',Auth::id())->get();
        return view('livewire.sitev2.user.user-dashboard-component');
    }
}
