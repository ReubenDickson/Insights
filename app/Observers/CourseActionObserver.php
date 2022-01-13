<?php

namespace App\Observers;

use App\Models\Course;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class CourseActionObserver
{
    public function created(Course $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Course'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Course $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Course'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
