<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\ContactUs;

class ContactFormSubmitted extends Notification
{
    use Queueable;

    protected $contact;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contact)
    {
        $this->contact = $contact;

        return $this->contact;
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
        $url = url('/');

        return (new MailMessage)
                    ->subject('New Contact Form Submitted')
                    ->line('A new contact form has been submitted')
                    ->line('Full Name: '.$this->contact->full_name)
                    ->line('Company Name: '.$this->contact->company_name)
                    ->line('Email: '.$this->contact->email)
                    ->line('Phone #: '.$this->contact->phone_number)
                    ->line('Message: '.$this->contact->contact_message)
                    ->line('Date Submitted: '.$this->contact->created_at->toFormattedDateString())
                    ->markdown('notifications.contactformsubmitted', ['url' => $url]);
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
