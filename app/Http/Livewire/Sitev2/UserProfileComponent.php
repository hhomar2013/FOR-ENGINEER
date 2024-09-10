<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileComponent extends Component
{
    public $name;

    public function mount()
    {
        $user = User::findOrFail(auth()->id());
        $this->name =$user->name;
    }

    public function save(){
        dd($this->name);
    }

    public function render()
    {
        return view('livewire.sitev2.user.user-profile-component');

    }
}
