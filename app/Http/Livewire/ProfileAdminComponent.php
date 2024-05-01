<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;

class ProfileAdminComponent extends Component
{

    public $name,$password,$rePassword;
    protected $listeners=['$refresh'];

    public function mount()
    {
        $user = Admin::query()->findOrFail(auth()->id());
        $this->name = $user->name;
    }

    protected $rules = [
        'name' => 'required',
        'rePassword'=>'required',
        'password' => 'same:rePassword',
    ];

    public function save()
    {
        if ($this->password == '' Or $this->rePassword == '')
        {
            $this->validate([
                'name'=>'required|min:3'
            ],[
                '*.required'=>__('t.validate.required')
            ]);
            $admin = Admin::find(auth()->id());
            $admin->update([
                'name'=>$this->name,
            ]);

        }else{
            $this->validate([
                'name'=>'required|min:3',
                'rePassword'=>'same:password|min:6'
            ],[
                '*.required'=>__('t.validate.required')
            ]);
            $admin = Admin::find(auth()->id());
            $admin->update([
                'name'=>$this->name,
                'password'=>bcrypt($this->rePassword)
            ]);
        }
        $this->emit('refresh-admin-user');
        $this->emitSelf('$refresh');
        session()->flash('message', __('t.Edit_message'));

    }

    public function render()
    {
        return view('livewire.admin.profile-admin-component');
    }
}
