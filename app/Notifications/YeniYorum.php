<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class YeniYorum extends Notification{
    use Queueable;

    public $email;
    public $yorum;
    public $yazi;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $yorum, $yazi){
        $this->email = $email;
        $this->yorum = $yorum;
        $this->yazi = $yazi;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            "email" => $this->email,
            "yorum" => $this->yorum,
            "yazi" => $this->yazi
        ];
    }
}
