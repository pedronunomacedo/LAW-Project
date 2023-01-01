<?php

namespace App\Http\Controllers;
// Added to support email sending.
use Mail;
use App\Mail\MailtrapController;
use App\Models\Order;
use App\Models\User;


class TestController extends Controller
{
    // sendEmail method.
    public function sendEmail($id) {
        $order = Order::where('id', $id)->get()->first();
        $user = User::where('id', $order->idusers)->get()->first();

        $mailData = [
            'name' => $user->name,
            'email' => $user->email,
            'order' => $order, 
        ];

        Mail::to($mailData['email'])->send(new MailtrapController($mailData));
           
        // dd("Email was sent successfully.");
    }
}

