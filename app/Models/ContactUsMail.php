<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsMails extends Model
{
    protected $table = 'contact_us_mails';

    protected $fillable = ['name', 'address', 'subject', 'message'];
}
