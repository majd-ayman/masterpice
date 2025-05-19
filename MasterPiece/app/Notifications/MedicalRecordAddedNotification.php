<?php

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MedicalRecordAddedNotification extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Medical record added',
            'body' => 'The doctor added the medical record for your appointment on ' . $this->appointment->appointment_date,
            'appointment_id' => $this->appointment->id,
            'doctor_name' => $this->appointment->doctor->name ?? '',
        ];
    }
}
