<?php

namespace App\Http\Livewire;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMassageListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function cml_action($id,$type)
    {
        $status = '';
        $cml= ContactMessage::query()->find($id);
        if ($type == 'under_review'){
            $status = 0;
            $cml->update(['status'=>$status , 'user'=>auth()->user()->name]);
            Mail::to($cml->email)->send(new ContactMessageMail($cml));
        }elseif ($type == 'answered'){
            $status = 1;
            $cml->update(['status'=>$status , 'user'=>auth()->user()->name]);
            Mail::to($cml->email)->send(new ContactMessageMail($cml));
        }elseif ($type == 'Reject'){
            $status = 2;
            $cml->update(['status'=>$status , 'user'=>auth()->user()->name]);
        }
        session()->flash('message',__('Status Updated Successfully'));
        $this->emitSelf('$refresh');
    }

    public function render()
    {
        $cml = ContactMessage::query()->paginate($this->numbers);
        return view('livewire.admin.contact-massage-list-component',compact('cml'));
    }
}
