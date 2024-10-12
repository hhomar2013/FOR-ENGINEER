<?php

namespace App\Http\Livewire\Sitev2\Tools;

use Livewire\Component;

class Userlist extends Component
{
    protected $listeners=['refreshUserList'=>'$refresh'];
    public function render()
    {
        return view('livewire.sitev2.tools.userlist');
    }
}
