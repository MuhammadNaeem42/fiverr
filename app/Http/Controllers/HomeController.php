<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{


    public function index()
    {

        return redirect()->to(route('admin.get.login'));
    }


    public function contact(Request $request)
    {
        $request_data = $request->only('message', 'email');

        $data = [
            'subject' => 'رسالة جديدة',
            'my_message' => $request_data['message'],
            'email' => $request_data['email'],

        ];

        Mail::send('emails.contact_us', $data, function ($message) use ($data) {
            $message->to(setting('MAIL_FROM_ADDRESS', env('MAIL_FROM_ADDRESS')), setting('MAIL_FROM_NAME', env('MAIL_FROM_NAME')))
                ->from(setting('MAIL_FROM_ADDRESS', env('MAIL_FROM_ADDRESS')))
                ->subject($data['subject']);
        });
        session()->flash('success', __('lang.sent_successfully'));
        return redirect()->to(url('/#contact'));

    }


}
