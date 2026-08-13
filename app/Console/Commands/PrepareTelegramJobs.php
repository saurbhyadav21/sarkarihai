<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class PrepareTelegramJobs extends Command
{
    protected $signature = 'telegram:prepare-jobs';

    protected $description = 'Find newly updated jobs for Telegram';

    public function handle()
    {
        /*
        |--------------------------------------------------------------------------
        | Last successful check
        |--------------------------------------------------------------------------
        */

        $lastRun = Cache::get('telegram_last_run');

        if (!$lastRun) {
            $lastRun = now()->subMinute();
        }


        /*
        |--------------------------------------------------------------------------
        | Find newly updated jobs
        |--------------------------------------------------------------------------
        */

        $jobs = DB::table('job_details')
            ->where('updated_at', '>', $lastRun)
            ->whereNull('telegram_sent_at')
            ->orderBy('updated_at')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | No jobs
        |--------------------------------------------------------------------------
        */

        if ($jobs->isEmpty()) {

            $this->info('No new jobs found.');

            /*
            | Important:
            | Last run update only after successful processing.
            */

            Cache::put(
                'telegram_last_run',
                now(),
                now()->addDays(2)
            );

            return Command::SUCCESS;
        }


        /*
        |--------------------------------------------------------------------------
        | Display jobs
        |--------------------------------------------------------------------------
        |
        | Telegram code intentionally NOT included.
        |
        */

        foreach ($jobs as $job) {

            $this->line(
                "Job ID: {$job->id} | Updated: {$job->updated_at}"
            );

            FreeJobAlertHelper::sendTelegramJob($job);
        }


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | Yahan Telegram send hone ke baad hi
        | telegram_sent_at update karna hai.
        |
        | Telegram code tum separately lagaoge.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | Update last successful check
        |--------------------------------------------------------------------------
        */

        Cache::put(
            'telegram_last_run',
            now(),
            now()->addDays(2)
        );


        $this->info(
            "Found {$jobs->count()} new/updated jobs."
        );

        return Command::SUCCESS;
    }
}