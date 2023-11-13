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
    public $recipientName;

    public function __construct($subject, $body, $attachment, $recipientName)   
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
        $this->recipientName = $recipientName;
    }

    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('Emails.replies', [
                'name' => $this->recipientName,
                'subject' => $this->subject,
                'body' => $this->body,
            ])
            ->attach($this->attachment);
    }
}


