<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Notifications\NewMessageNotification;
use Livewire\Component;

class NotificationList extends Component
{

    public $message;
    public $recipient;
    public function sendNotification()
    {
        $recipient = Company::find($this->recipient);

        $recipient->notify(new NewMessageNotification($this->message));

        // Optionally, you can show a success message or perform other actions after sending the notification

        // Reset the form fields
        $this->message = '';
        $this->recipient = '';
    }

    public function render()
    {
        return view('livewire.notification-list');
    }
}
