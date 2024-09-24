<?php

namespace App\Notifications;

use App\Models\orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class orderStatusUpdated extends Notification
{
    use Queueable;

    private $order;

    /**
     * Create a new notification instance.
     *
     * @param orders $order
     */
    public function __construct(orders $order)
    {
        $this->order = $order; // Store the order for later use
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // You can add more channels if needed
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("Your order #{$this->order->id} status has been updated to {$this->order->status}.")
                    ->action('View Order', url('/orders/' . $this->order->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'status' => $this->order->status,
        ];
    }
}
