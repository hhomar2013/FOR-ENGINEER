<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use Livewire\Component;

class ShowNewRequest extends Component
{
    public $showRequest;
    public function mount($id){
        $this->showRequest = NewRequest::query()->find($id);
        // dd( $this->showRequest);
    }

    public function render()
    {
        return view('livewire.sitev2.user.show-new-request');
    }
}
