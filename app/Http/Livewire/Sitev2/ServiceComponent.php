<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\categories;
use Livewire\Component;

class ServiceComponent extends Component
{
    public $categories;
    public function mount($id)
    {
        $this->categories = categories::find($id);
    }

    public function render()
    {
        return view('livewire.sitev2.service-component');
    }
}
