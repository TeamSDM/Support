<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
        $this->ticket = $data['ticket'];
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject($this->data['action'])
            ->greeting('Hola,')
            ->line($this->data['action'])
            ->line("Autor: ".$this->ticket->author_name) 
            ->line("Nombre del Ticket: ".$this->ticket->title)
            ->line("Breve descripción: ".Str::limit($this->ticket->content, 200))
            ->action('Ver el Ticket completo', route('admin.tickets.show', $this->ticket->id))
            ->line("Este correo electrónico es informativo, recomendamos no responder a este Email")
            ->line('Gracias')
            ->line(config('app.name') . ' Lagobo')
            ->salutation(' ');
    }
}
