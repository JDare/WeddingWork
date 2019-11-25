<?php

namespace App\Mail;

use App\Models\Party;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Thankyou extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thanks for Coming!";
        return $this->subject($subject)
                    ->view('mail.thankyou', [
                        "subject" => $subject,
                        "after_subject" => "Dare Wedding 2019"
                        ])
                    ->text('mail.thankyou_plain');
    }
}
