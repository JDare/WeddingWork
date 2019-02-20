<?php

namespace App\Console\Commands;

use App\Models\Party;
use Illuminate\Console\Command;

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
            if (filter_var($party->email, FILTER_VALIDATE_EMAIL)) {
                $this->info('Sending email to: ' . $party->email);
                if ($force)
                {
                    //send email
                    $email = trim($party->email);

                    //flag as actually sent in db


                }else{
                    $this->info('[Dry Run] Email sent for ' . $party->email);
                }

            }else{
                $this->warn("Party " . $party->name . " has no valid email, not sending to them.");
            }

        }

    }
}
