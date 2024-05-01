<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminUser extends Component
{
    protected $listeners = ['refresh-admin-user'=>'$refresh'];
    public function render()
    {
        return view('livewire.admin.admin-user');
    }
}
