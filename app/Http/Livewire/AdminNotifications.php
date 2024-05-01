<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminNotifications extends Component
{

    protected $listeners = ['AdminNotification'=>'$refresh','adminPlay'=>'play'];
    public $notification_count;
    public $notifications ='';
    public $old_count;

    public function play()
    {
//        $this->emit('play_notify');
    }

    public function get_notification()
    {
        $this->notifications = Order::query()->where('status',1)->orderBy('id','desc')->limit(5)->get();
        if ($this->notifications->count() >= $this->old_count){
            $this->emit('adminPlay');
            $this->old_count = $this->notifications->count();
        }
    }

    public function render()
    {
        $this->get_notification();
        $this->old_count = 2;
        return view('livewire.admin-notifications');
    }
}
