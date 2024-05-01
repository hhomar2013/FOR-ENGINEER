<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserMenu extends Component
{
    protected $listeners = ['refresh-me'=>'$refresh'];
    public function render()
    {
        return view('livewire.site.user-menu');
    }
}
