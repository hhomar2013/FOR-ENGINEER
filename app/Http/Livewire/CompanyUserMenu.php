<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\User;
use App\Traits\Helper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyUserMenu extends Component
{
    use Helper;
    protected $listeners = ['refresh-company-user'=>'$refresh'];
    public function render()
    {

        $user = Company::query()->find(Auth::id());

        return view('livewire.company.company-user-menu' ,['user'=>$user]);
    }
}
