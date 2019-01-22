<?php

namespace App\Console\Commands;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Console\Command;

class ImportGuests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:guests {file}';

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
        $parties = 0;
        $guests = 0;
        $party = false;
        while ($csvLine = fgetcsv($handle)) {
            if (!empty($csvLine[0]))
            {
                $party = Party::firstOrCreate(['name' => $csvLine[0]]);
                $parties++;
            }
            if (!empty($csvLine[1])) {
                $guest = Guest::firstOrCreate(['name' => $csvLine[1], 'party_id' => $party->id]);
                $party->guests()->save($guest);
                $guests++;
            }
        }
        $this->info("Imported " . $guests . " guests in " . $parties . " parties");
    }
}
