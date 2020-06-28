<?php 

namespace App\Observers;

use App\Customer;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CustomerActionObserver {
    public function created(Customer $model) {
        $data = [
            'action'    => 'created', 
            'model_name'    => 'Customer',
        ];
        $users = \App\User::whereHas('roles', function($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Customer $model) {
        $data = [
            'action'    => 'updated', 
            'model_name'    => 'Customer',
        ];
        $users = \App\User::whereHas('roles', function($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Customer $model) {
        $data = [
            'action'    => 'deleted', 
            'model_name'    => 'Customer',
        ];
        $users = \App\User::whereHas('roles', function($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}