<?php

namespace RentFood\Notifications;

use RentFood\Channels\Messages\WhatsAppMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use RentFood\Channels\WhatsAppChannel;
use RentFood\Models\Pedido;


class OrderProcessed extends Notification
{
  use Queueable;


  public $order;
  
  public function __construct(Pedido $order)
  {
    $this->order = $order;
  }
  
  public function via($notifiable)
  {
    return [WhatsAppChannel::class];
  }
  
  public function toWhatsApp($notifiable)
  {
    $orderUrl = url("/orders/{$this->order->id}");
    $company = 'RentFood.';
    $deliveryDate = $this->order->created_at->addDays(4)->toFormattedDateString();


    return (new WhatsAppMessage)->content("Your {$company} order of {$this->order->total} has shipped and should be delivered on {$deliveryDate}. Details: {$orderUrl}");
  }
}