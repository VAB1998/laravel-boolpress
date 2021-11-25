<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\ContactUsMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The contactUsMail instance.
     *
     * @var ContactUsMail
     */
    protected $contactUsMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUsMail $contactUsMail)
    {
        $this->contactUsMail = $contactUsMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactUsMail = $this->contactUsMail;
        return $this->replyTo($this->contactUsMail->address)->markdown('guests.email.body', compact('contactUsMail'));
    }
}
