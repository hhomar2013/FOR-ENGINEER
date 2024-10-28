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
    private $ct_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id,$title,$ct_id)
    {
        $this->reqId = $id;
        $this->title = $title;
        $this->ct_id = $ct_id;
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
            'cat_id'=>$this->ct_id,
        ];
    }
}
