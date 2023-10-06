<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($reporter_name)
    {
      //  $this->user= $user; //making it the private variable
      $this->reporter_name= $reporter_name;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New invoice for you')
                    ->line('The we just created the new ticket')
                    ->action('Download', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            /*'name'=>$this->user->name,
            'email'=>$this->user->email,*/
            'message'=>'This is the new ticket',
            'url'=> '/'
        ];
        /*return [
            'data'=> 'Your deposit'
      ] */
    }
}
