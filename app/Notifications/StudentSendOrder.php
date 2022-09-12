<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentSendOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $notification;
     public $name;
     public $order_id;
    public function __construct($notification , $name,$order_id)
    {
        $this->notification = $notification;
        $this->name = $name;
        $this->order_id = $order_id;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    public function toDatabase($notifiable)
    {
        return [
            'price' => $this->notification['price'] ?? '',
            'quantity' => $this->notification['quantity'] ?? '',
            'student_id' => $this->notification['student_id'] ?? '',
            'canteen_id' => $this->notification['canteen_id'] ?? '',
            'meal_id' => $this->notification['meal_id'] ?? '',
            'school_id' => $this->notification['school_id'] ?? '',
            'total' => $this->notification['total'] ?? '',
            'name' => $this->name ?? '',
            'order_id' => $this->order_id ?? '',
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
