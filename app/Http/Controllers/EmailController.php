<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    protected function contactEmailValidatedData()
    {
        return request()->validate([
            'name' => 'required',
            'client_email' => '',
            'message' => 'required',
        ]);
    }


    public function contactEmail()
    {

        $data = $this->contactEmailValidatedData();
        Mail::to("bulacantour@gmail.com")->send(new ContactMail($data));
        // return new ContactMail($data);

        return redirect()->back()->with('status', 'Email Sent!');

        dd(request()->all());
    }
}
