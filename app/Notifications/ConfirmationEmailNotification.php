<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class ConfirmationEmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
        //$this->ticket = $data['ticket'];
    }

    public function via($notifiable)
    {
        return ['mail'];
        //dd($this->data['author_email']);
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('¡Su Ticket ha sido enviado!')
            ->greeting('Hola,')
            ->line('¡Su Ticket ha sido enviado!')
            ->line("Autor: ".$this->data['author_name'])
            ->line("Nombre del Ticket: ".$this->data['ticket_title'])
            //->line("Breve descripción: ".Str::limit($this->content, 200))
            ->action('Ver el Ticket completo', route('tickets.show', $this->data['ticket_id']))
            ->line("Este correo electrónico es informativo, recomendamos no responder a este Email")
            ->line('Gracias')
            ->line(config('app.name') . ' Lagobo')
            ->salutation(' ');
    }
}
