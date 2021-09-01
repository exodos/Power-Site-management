<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FiberSplicePointUpdateNotify extends Notification
{
    use Queueable;

    public $fiberSplice;

    /**
     * Create a new notification instance.
     *
     * @param $fiberSplice
     */
    public function __construct($fiberSplice)
    {
        $this->fiberSplice = $fiberSplice;
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
            ->line('One Of Fiber Splice Points Attribute With Id ' . $this->fiberSplice->id . ' Has Been Updated')
            ->action('Notification Action', url('fiber_splice_points'))
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