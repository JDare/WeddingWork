<?php

namespace App\Console\Commands;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Console\Command;

class GuestsExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:export {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports guests from a simple CSV specified by {file}';

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
     * @param $file
     * @return mixed
     */
    public function handle()
    {
        $handle = fopen($this->argument('file'), "r");
        $guests = 0;
        $parties = 0;

        $p = Party::with('guests')->get();
        foreach($p as $party)
        {

        }

        $this->info("Exported " . $guests . " guests and " . $parties . " parties to " + $this->argument('file'));
    }
}
