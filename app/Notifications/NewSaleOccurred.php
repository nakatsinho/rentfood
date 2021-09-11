<?php
 
namespace RentFood\Notifications;
 
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\NexmoMessage;
 
class NewSaleOccurred extends Notification implements ShouldQueue
{
    use Queueable;
 
    public $payload;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }
 
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }
 
    /**
     * Get the Nexmo representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        $amount = $this->payload['data']['object']['amount'] / 100;
 
        $message = 'Hello, you just made a sale of $' .$amount. ' in your store';
 
        return (new NexmoMessage())
                    ->content($message);
    }
 
}