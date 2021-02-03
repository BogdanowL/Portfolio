<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
       $this->message = $message;
    }


    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
     // dd($notifiable);

        $chatID = config('app.chatID');


        return TelegramMessage::create()
            // Optional recipient user id.
            ->to($chatID)
            // Markdown supported.
            ->content($this->message);

            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
//            ->button('View Invoice', $url)
//            ->button('Download Invoice', $url);
    }


}
