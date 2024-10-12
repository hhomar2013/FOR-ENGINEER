<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\User;
use App\Traits\Helper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UserProfileComponent extends Component
{
    use WithFileUploads;
    use Helper;
    public $name;
    public $password;
    public $photo;
    public $fileName;
    protected $listeners=['$refresh'];

    public function mount()
    {
        $user = User::findOrFail(auth()->id());
        $this->name =$user->name;
        $this->fileName = $user->img;

    }

    public function updateImage(){
        $this->validate([
            'photo' => 'image', // 2MB Max
        ]);
        $this->fileName = $this->ImageUpload($this->photo,'UsersPhoto');
        $id = Auth::id();
        $query = User::query()->find($id);
        $query->update([
            'img' => $this->fileName,
        ]);

        if($query){
            $this->emitSelf('$refresh');
            session()->flash('message', __('t.Edit_message'));
        }
    }

    public function save(){
        $this->validate([
            'name' => 'required', // 2MB Max
        ]);
        $id = Auth::id();
        $query = User::query()->find($id);
        if($query){
            $query->update([
                'name' => $this->name,
            ]);
            session()->flash('message',__('t.Edit_message'));
        }

    }

    public function render()
    {
        return view('livewire.sitev2.user.user-profile-component');

    }
}
