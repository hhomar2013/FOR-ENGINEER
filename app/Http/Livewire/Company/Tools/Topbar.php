<?php

namespace App\Http\Livewire\Company\Tools;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Topbar extends Component
{

    protected $listeners = ['company_topbar'=>'$refresh'];

    public function render()
    {
        $user = Company::query()->find(Auth::id());
        return view('livewire.company.tools.topbar',['user'=>$user]);
    }
}
