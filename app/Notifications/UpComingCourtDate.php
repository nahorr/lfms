<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\ClientCase;
use Carbon\Carbon;

class UpComingCourtDate extends Notification
{
    use Queueable;
    public $clientcase;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ClientCase $clientcase)
    {
        $this->clientcase = $clientcase;

        return $this->clientcase;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('There is a new court date coming up soon: ')
                    ->line('Case Title: '.$this->clientcase->case_title )
                    ->line('Client: '.$this->clientcase->client->last_name. ',' . $this->clientcase->client->first_name)
                    ->line('Date: '.$this->clientcase->court_date->toFormattedDateString() )
                    ->line('Time: '.$this->clientcase->court_date->format('g:i A') )
                    ->line('Location: '.$this->clientcase->court_location )
                    ->action('Login to View Upcoming Cases', url('/admin/cases/courtdates'))
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
