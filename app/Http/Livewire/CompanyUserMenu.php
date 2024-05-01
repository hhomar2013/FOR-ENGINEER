<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CompanyUserMenu extends Component
{
    protected $listeners = ['refresh-company-user'=>'$refresh'];
    public function render()
    {
        return view('livewire.company.company-user-menu');
    }
}
