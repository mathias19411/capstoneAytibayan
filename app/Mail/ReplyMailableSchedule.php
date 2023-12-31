<?php


namespace
 
App\Mail;

use
 
Illuminate\Bus\Queueable;
use
 
Illuminate\Mail\Mailable;
use
 
Illuminate\Queue\SerializesModels;
use
 
Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMailableSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    protected $body;
    public $senderName;
    public $recipientName;

    public $time;

    public function __construct($subject, $body, $senderName, $recipientName, $time) {
        $this->subject = $subject;
        $this->body = $body;
        $this->senderName = $senderName;
        $this->recipientName = $recipientName;
        $this->time = $time;
    }

    public function build()
    {
        return $this
            ->subject($this->subject)
            ->view('Emails.schedulemessage', [
                'name' => $this->recipientName,
                'subject' => $this->subject,
                'body' => $this->body,
                'senderName' => $this->senderName,
                'time' => $this->time
            ]);
    }
}
