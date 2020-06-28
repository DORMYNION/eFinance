<?php

namespace App\Observers;

use App\CustomerDocument;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CustomerDocumentActionObserver
{
    public function created(CustomerDocument $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'CustomerDocument'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(CustomerDocument $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'CustomerDocument'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
