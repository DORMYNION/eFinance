<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanFlagNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->data = $data;
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
                        ->subject('Your next Loan Repayment of '. $this->data['loan_amount'] .' is now overdue .')
                        ->greeting('Dear ' . $this->data['first_name'] . ',')
                        ->line('We would like to inform you that your next Loan Repayment of '. $this->data['loan_amount'] . ' is now overdue.')
                        ->line('Note that your loan now has a late payment fee.')
                        // ->line('Contact ')
                        ->line('Thank you')
                        ->line(config('app.name') . ' Team')
                        ->salutation(' ');
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
