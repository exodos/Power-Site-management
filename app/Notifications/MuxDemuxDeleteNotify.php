<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MuxDemuxDeleteNotify extends Notification
{
    use Queueable;

    public $muxDemux;

    /**
     * Create a new notification instance.
     *
     * @param $muxDemux
     */
    public function __construct($muxDemux)
    {
        $this->muxDemux = $muxDemux;
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
            ->line('One Of Mux Demux Boards Attribute With Id ' . $this->muxDemux->id . ' Has Been Deleted')
            ->action('Notification Action', url('mux_demux_boards'))
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
