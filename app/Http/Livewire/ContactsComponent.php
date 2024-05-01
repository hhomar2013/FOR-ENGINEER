<?php

namespace App\Http\Livewire;

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactsComponent extends Component
{

    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [

        'name' => 'required',
        'subject' => 'required',
        'email' => 'required|email',
        'message' => 'required|min:10',

    ];



    public function sentMessage()
    {
            $this->validate();

           $cml = ContactMessage::query()->create([
               'name'=>$this->name,
               'email'=>$this->email,
               'subject'=>$this->subject,
               'message'=>$this->message,
                'status'=>0,
                'note'=>__('under review')
            ]);
            Mail::to($this->email)->send(new ContactMessageMail($cml));
            session()->flash('message', __('Your request has been sent and we will send it to you as soon as possible. Thank you for your understanding'));
           $this->reset();

    }

    public function render()
    {
        return view('livewire.contacts-component');
    }
}
