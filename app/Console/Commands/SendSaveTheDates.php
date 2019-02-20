<?php

namespace App\Console\Commands;

use App\Mail\SaveTheDate;
use App\Models\Party;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSaveTheDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:savethedates {--prod}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Save the Date emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $force = $this->option('prod');
        if (!$force)
            $this->info('Begin Dry Run ...');

        $this->info("Starting Email Send");
        $parties = Party::all();
        foreach($parties as $party)
        {
            if ($party->canSendEmail()) {
                $this->info('Sending emails for ' . $party->name);
                foreach($party->getEmailsForSending() as $email)
                {
                    if ($force)
                    {
                        //send email
                        try {
                            Mail::to($email)->send(new SaveTheDate());
                            $this->info('Email sent for ' . $email);
                            //flag as actually sent in db
                            $party->std_sent = true;
                        }catch (\Exception $e)
                        {
                            $this->error("Failed to send to " . $email);
                        }
                    }else{
                        $this->info('[Dry Run] Email sent for ' . $email);
                    }
                }
                $party->save();
            }else{
                $this->warn("Party " . $party->name . " has no valid email, not sending.");
            }

        }

    }
}
