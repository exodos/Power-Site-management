<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LineBoardWdmDeleteNotify extends Notification
{
    use Queueable;

    public $lineBoardWdm;

    /**
     * Create a new notification instance.
     *
     * @param $lineBoardWdm
     */
    public function __construct($lineBoardWdm)
    {
        $this->lineBoardWdm = $lineBoardWdm;
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
            ->line('One Of Line Boards Wdm Trails Attribute With Id ' . $this->lineBoardWdm->id . ' Has Been Deleted')
            ->action('Notification Action', url('line_boards_wdm_trails'))
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
