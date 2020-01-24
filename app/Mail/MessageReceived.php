<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $msg;
    public $subject;
    public $name;
    public $address;

    public function __construct($email)
    {
        //
        $this->msg = $email;
        $this->name = $email['nombre'];
        $this->subject = $email['asunto'];
        $this->address = 'custom.digital.iig@gmail.com';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail=$this->msg;

        return $this->view('email.recieved')->with(compact('mail'));
    }
}
