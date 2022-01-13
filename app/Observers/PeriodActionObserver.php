<?php

namespace App\Observers;

use App\Models\Period;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PeriodActionObserver
{
    public function created(Period $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Period'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
