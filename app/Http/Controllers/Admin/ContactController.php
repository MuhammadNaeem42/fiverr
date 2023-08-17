<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\Admin\ContactDataTable;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:read_contacts|create_contacts|update_contacts|delete_contacts', ['only' => ['index']]);

    }


    /**
     * List Category
     * @param ContactDataTable $contactDataTable
     * @return mixed
     */
    public function index(ContactDataTable $contactDataTable)
    {

        return $contactDataTable->render('admin.contacts.index');

    }


}
