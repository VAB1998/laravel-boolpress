<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUsMail;
use App\Mail\SendContactUsMail;
use Illuminate\Http\Request;

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

        Mail::to('boolpress@live.com')->send(new SendContactUsMail($contactUsMail));

        return redirect()->route('guests.home');
    }

    //thanks
}
