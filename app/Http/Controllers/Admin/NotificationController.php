<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\Admin\NotificationDataTable;
use App\Http\Controllers\Controller;


class NotificationController extends Controller
{


    public function index(NotificationDataTable $notificationDataTable )
    {
        $notifications = auth('admin')->user()->unreadNotifications;
        $notifications->markAsRead();
        return $notificationDataTable->render('admin.notifications.index');

    }


}
