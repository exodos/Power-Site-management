<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtnNeCreateNotify extends Notification
{
    use Queueable;

    public $otnNe;

    /**
     * Create a new notification instance.
     *
     * @param $otnNe
     */
    public function __construct($otnNe)
    {
        $this->otnNe = $otnNe;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello Administrator')
            ->line('One Of Ne Attribute With Id ' . $this->otnNe->id . ' Has Been Created')
            ->action('Notification Action', url('otn_nes'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
