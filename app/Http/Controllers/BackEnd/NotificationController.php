<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
    public function readnotification()
    {
        $user=Auth::user();
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect::back();
    }
}
