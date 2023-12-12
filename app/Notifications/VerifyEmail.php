<?php
namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject('Patvirtini elektroninį paštą')
            ->line('Kad patvirtintį jūsų paštą SERMIS sistemoje, paspauskite and mygtuko.')
            ->action(
                'Patvirtinti el. paštą',
                // Lang::getFromJson('Patvirtinti el. paštą'),
                $this->verificationUrl($notifiable)
            )
            ->line('Jei jūs nebuvote kūrę paskyros, spausti nereikia.');
    }
}