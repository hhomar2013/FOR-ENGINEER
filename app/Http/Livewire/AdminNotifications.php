<?php

namespace App\Http\Livewire;

use App\Models\NewRequest;
use App\Models\Order;
use Livewire\Component;

class AdminNotifications extends Component
{

    protected $listeners = ['AdminNotification'=>'$refresh','adminPlay'=>'play'];
    public $notificationCount;
    public $notifications;
    public $oldCount;

    public function play()
    {
//        $this->emit('play_notify');
    }

    public function get_notification()
    {
        $this->notifications = NewRequest::query()->where('status',0)->orderBy('id','desc')->limit(5)->get();
        if ($this->notifications->count() >= $this->oldCount){
            $this->emit('adminPlay');
            $this->oldCount = $this->notifications->count();
        }
    }

    public function render()
    {
        $this->get_notification();
        $this->oldCount = 2;
        return view('livewire.admin-notifications');
    }
}
