<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    protected $body;
    protected $attachment;

    public function __construct($subject, $body, $attachment)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
    }

    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('Emails.replies') // You can create an email template in the "resources/views/emails" directory
            ->with(['body' => $this->body])
            ->attach($this->attachment);
    }
}


