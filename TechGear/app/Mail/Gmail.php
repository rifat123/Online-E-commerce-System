<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Gmail extends Mailable
{
    use Queueable, SerializesModels;
    public $sub;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        $this->sub = $subject;
        $this->msg = $message;        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $msg = $this->msg;
        return $this->subject($this->subject)->view('mail',compact('msg'));
    }
}
