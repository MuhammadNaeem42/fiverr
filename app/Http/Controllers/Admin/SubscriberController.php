<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\Admin\SubscriberDataTable;
use App\Http\Controllers\Controller;


class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_subscribers|create_subscribers|update_subscribers|delete_subscribers', ['only' => ['index']]);

    }


    /**
     * List Category
     * @param SubscriberDataTable $subscriberDataTable
     * @return mixed
     */
    public function index(SubscriberDataTable $subscriberDataTable)
    {

        return $subscriberDataTable->render('admin.subscribers.index');

    }


}
