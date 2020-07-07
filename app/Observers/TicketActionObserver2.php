<?php

namespace App\Observers;

use App\Notifications\DataChangeEmailNotification;
use App\Notifications\AssignedTicketNotification;
use App\Ticket;
use Illuminate\Support\Facades\Notification;

class TicketActionObserver
{
    public function created(Ticket $model)
    {
        $data  = ['action' => '¡Se ha creado un nuevo Ticket!', 'model_name' => 'Ticket', 'ticket' => $model];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'agent');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

}
