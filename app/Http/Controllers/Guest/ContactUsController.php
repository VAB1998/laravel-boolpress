<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Mail\ContactUsMail as SendMail;
use App\Models\ContactUsMail;

class ContactUsController extends Controller
{
    public function contactUs(){
        return view('guests.contactUs');
    }

    public function sendMail(Request $request){
        $data = $request->all();

        $contactUsMail = new ContactUsMail();
        // dd($contactUsMail);
        $contactUsMail->fill($data);
        $contactUsMail->save();

        return redirect()->route('guests.home');
    }

    //thanks
}
