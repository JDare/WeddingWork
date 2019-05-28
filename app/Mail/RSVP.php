<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RSVP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "You're invited to Lillian and Jeremys Wedding";
        return $this->subject($subject)
                    ->view('mail.rsvp', [
                        "subject" => $subject,
                        "after_subject" => "Lilly and Jeremy are getting married on the 26th October 2019",
                        ])
                    ->text('mail.rsvp_plain');
    }
}
