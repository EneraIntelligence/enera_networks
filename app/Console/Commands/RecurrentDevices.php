<?php

namespace Networks\Console\Commands;

use Illuminate\Console\Command;

class RecurrentDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enera:RecurrentDevices {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes summary of the date indicated';

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
        $date = $this->option('date');
        if(!isset($date))
            $date = date("F j, Y", time() - 60 * 60 * 24);

        $this->info("Hola mundo! " . $date);
    }
}
