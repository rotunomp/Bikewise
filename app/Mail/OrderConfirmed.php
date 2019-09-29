<?php

namespace App\Mail;

use App\MailInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    private $mailinfo;

    /**
     * Create a new message instance.
     *
     * @param MailInfo $mailInfo
     */
    public function __construct(MailInfo $mailInfo)
    {
        $this->mailinfo = $mailInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('rotunomp@miamioh.edu')
                    ->view('mail.orderConfirm');
    }
}
