<?php

namespace App\Observers;

use App\Models\TradeSignal;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TradeSignalActionObserver
{
    public function created(TradeSignal $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'TradeSignal'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
