<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateFreeJobAlertAgeLimit extends Command
{
    protected $signature = 'app:update-freejobalert-age-limit';

    protected $description = 'Process pending FreeJobAlert age-limit records';

    public function handle()
    {
        $job = DB::table('job_details')
            ->where('source', 'freejobalert')
            ->where('age_flag', 0)
            ->select('id', 'source_url')
            ->orderBy('id', 'asc')
            ->first();

        if (!$job) {
            $this->info('No pending FreeJobAlert age records found.');

            return Command::SUCCESS;
        }

        $this->info("Processing ID: {$job->id}");
        $this->info("URL: {$job->source_url}");

        // Abhi HTML extraction add nahi ki hai.
        // Agle step mein age-limit extraction logic add karenge.

        return Command::SUCCESS;
    }
}