<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // public $newRequest;

    public function mount(){
        // $this->newRequest  = NewRequest::query()->where('user_id','=',Auth::id())->paginate(10);
    }

    public function render()
    {
        $newRequest =  NewRequest::query()->where('user_id','=',Auth::id())->get();
        $newRequest_paginate =  NewRequest::query()->where('user_id','=',Auth::id())->paginate(5);
        return view('livewire.sitev2.user.user-dashboard-component' ,['newRequest'=>$newRequest ,'pages'=>$newRequest_paginate]);
    }
}
