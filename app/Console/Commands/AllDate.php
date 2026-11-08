<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AllDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Your cron code here

        $this->info('All Date Cron Job Successfully Run');

        return Command::SUCCESS;
    }
}
