<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsMail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_us_mails';

    protected $fillable = ['name', 'address', 'subject', 'message'];
}
