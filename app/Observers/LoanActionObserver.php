<?php

namespace App\Observers;

use App\Loan;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class LoanActionObserver
{
    public function created(Loan $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Loan'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Loan $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Loan'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Loan $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Loan'];
        $users = \App\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        // Notification::send($users, new DataChangeEmailNotification($data));
    }
}
