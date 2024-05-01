<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class Profile extends Component
{


    public $name;
    public $oldPassword,$password,$confirmPassword;
    protected $listeners=['$refresh'];

    public function mount()
    {
        $user = User::findOrFail(auth()->id());
        $this->name = $user->name;
    }

    protected $rules = [
        'name' => 'required',
        'confirmPassword'=>'required',
        'password' => 'same:confirmPassword',
    ];


    public function save()
    {
        $this->validate([

            'password' => 'same:confirmPassword',
        ],[
            '*.required'=>__('t.validate.required')
        ]);

        $user = User::find(auth()->id());
        $user->update([
            'name'=>$this->name,
        ]);
        session()->flash('message',__('t.Edit_message'));
        $this->emit('refresh-me');
        $this->emitSelf('$refresh');
    }

    public function reset_password()
    {
        $this->validate();

        $user = User::find(auth()->id());
        $user->update([
            'password'=>bcrypt($this->confirmPassword),
        ]);
        session()->flash('message',__('t.Edit_message'));
        $this->emitSelf('$refresh');
        $this->password='';
        $this->confirmPassword='';

    }

    public function render()
    {

        // dd($user);
        return view('livewire.site.profile')->layout('layouts.site');
    }
}
