<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ImportDataSampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data-sample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Sample of Database';

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
            DB::unprepared(file_get_contents('database/imports/sample.sql'));
            $this->info("Import data sample successfully");
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
