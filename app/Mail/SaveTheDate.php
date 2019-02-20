<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveTheDate extends Mailable
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
        $subject = "Wedding Save the Date";
        return $this->subject($subject)
                    ->view('mail.save-the-date', [
                        "subject" => $subject,
                        "after_subject" => "Lilly and Jeremy are getting married on the 26th October 2019",
                        "website_link" => url("/save-the-date"),
                        ])
                    ->text('mail.save-the-date_plain');
    }
}
