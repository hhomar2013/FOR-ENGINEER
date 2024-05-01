<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompanySideBard extends Component
{
    protected $listeners = ['refresh-company-sidebar'=>'$refresh'];
    public function render()
    {
        return view('livewire.company.company-side-bard');
    }
}
