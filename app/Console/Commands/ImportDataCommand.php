<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import main data of Database';

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
        try {
            DB::unprepared(file_get_contents('database/imports/main.sql'));
            $this->info("Import data successfully");
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
