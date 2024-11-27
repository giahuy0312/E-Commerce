<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\ContatcMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function show()
    {
        return view('contact');
    }
    public function send()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'subject' => 'required|min:3|max:50',
            'message' => 'required|min:3|max:255'
        ]);

        Mail::to('tranquangthang3160@gmail.com')->send(new ContactMail($data));
        return redirect('/contact')->with('success', 'Chúng tôi đã gửi mail để lấy lại mật khẩu.');
    }
}