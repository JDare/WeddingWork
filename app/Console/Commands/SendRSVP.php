<?php

namespace App\Console\Commands;

use App\Mail\RSVP;
use App\Mail\SaveTheDate;
use App\Models\Party;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRSVP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:rsvp {--prod} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends RSVP emails';

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
        $isProd = $this->option('prod');
        $force = $this->option('force');
        if (!$isProd)
            $this->info('Begin Dry Run ...');

        $this->info("Starting Email Send");
        $parties = Party::all();
        foreach($parties as $party)
        {
            if ($party->rsvp_sent && !$force)
            {
                $this->info('Skipping ' . $party->name . ', emails already sent.');
            } elseif ($party->canSendEmail()) {
                $this->info('Sending emails for ' . $party->name);
                foreach($party->getEmailsForSending() as $email)
                {
                    if ($isProd)
                    {
                        //send email
                        try {
                            Mail::to($email)->send(new RSVP($party));
                            $this->info('Email sent for ' . $email);
                            //flag as actually sent in db
                            $party->rsvp_sent = true;
                        }catch (\Exception $e)
                        {
                            $this->error("Failed to send to " . $email);
                            $this->error($e->getMessage());
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
