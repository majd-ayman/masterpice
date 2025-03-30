<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewAppointmentNotification extends Notification
{
    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // الإشعارات عبر البريد الإلكتروني و قاعدة البيانات
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('تم تحديد موعد جديد.')
                    ->action('رؤية التفاصيل', url('/appointments/'.$this->appointment->id))
                    ->line('شكراً لاستخدامك خدماتنا!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'message' => 'تم تحديد موعد جديد مع الطبيب: ' . $this->appointment->doctor->name,
        ];
    }
}
