<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class NotifyToSlackChannel extends Notification
{
    use Queueable;
    private $order = "";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $order = $this->order;
        return (new SlackMessage)
            ->success()
            ->content('Đơn hàng')
            ->attachment(function ($attachment) use ($order) {
                $attachment->title("Mã Đơn Hàng : " . strtoupper($order->ord_no))
                    ->fields([
                        'Tên sản phẩm' => $order->img_title,
                        'Số lượng' => $order->ord_quantity,
                        'Số tiền' => number_format($order->ord_quantity * $order->img_money) . " VNĐ",
                        'Điện thoại' => $order->ord_phone,
                        'Ghi chú' => $order->ord_notes
                    ]);
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}