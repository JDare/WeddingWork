<?php

namespace App\Mail;

use App\Models\Party;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RSVP extends Mailable
{
    use Queueable, SerializesModels;


    private $party;

    /**
     * Create a new message instance.
     *
     * @param Party $party
     */
    public function __construct(Party $party)
    {
        $this->party = $party;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "You're invited to Lilly and Jeremy's Wedding";
        return $this->subject($subject)
                    ->view('mail.rsvp', [
                        "subject" => $subject,
                        "after_subject" => "Lilly and Jeremy are getting married on the 26th October 2019",
                        'party' => $this->party,
                        ])
                    ->text('mail.rsvp_plain', ['party' => $this->party,]);
    }
}
