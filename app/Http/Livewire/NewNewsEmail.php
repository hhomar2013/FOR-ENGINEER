<?php

namespace App\Http\Livewire;

use App\Models\NewNewsEmails;
use Livewire\Component;

class NewNewsEmail extends Component
{
    public $email;
    public function send_email(){
        $this->validate([
            'email'=>'required|email'
        ]);
            NewNewsEmails::query()->create(['email'=>$this->email]);
            session()->flash('message', __("You're subscribed in for engineer new news"));
            $this->reset();
    }
    public function render()
    {
        return view('livewire.new-news-email');
    }
}
