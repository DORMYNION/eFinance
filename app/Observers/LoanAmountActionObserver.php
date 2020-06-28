<?php

namespace App\Observers;

use App\LoanAmount;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class LoanAmountActionObserver
{
    public function created(LoanAmount $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'LoanAmount'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(LoanAmount $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'LoanAmount'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(LoanAmount $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'LoanAmount'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
