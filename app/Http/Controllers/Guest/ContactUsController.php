<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs(){
        return view('guests.contactUs');
    }

    public function sendMail(){
        return 'CiaoCiao';
    }

    //thanks
}
