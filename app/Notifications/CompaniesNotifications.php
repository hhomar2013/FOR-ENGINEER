<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompaniesNotifications extends Notification
{
    use Queueable;
    private $reqId;
    private $title;

    /**
     * Create a new notification instance.
     */
    public function __construct($id,$title)
    {
        $this->reqId = $id;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'req_id' =>$this->reqId,
            'title'=>$this->title,
            'user_created'=>auth()->user()->name,
        ];
    }
}
