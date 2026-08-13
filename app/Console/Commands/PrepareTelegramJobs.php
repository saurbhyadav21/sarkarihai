<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class PrepareTelegramJobs extends Command
{
    protected $signature = 'telegram:prepare-jobs';

    protected $description = 'Send newly updated jobs to Telegram';


    public function handle()
    {
        $this->info('Telegram Job Cron Started...');


        /*
        |--------------------------------------------------------------------------
        | Last Successful Run
        |--------------------------------------------------------------------------
        */

        $lastRun = Cache::get('telegram_last_run');


        if (!$lastRun) {

            $lastRun = now()->subMinute();

        }


        $this->info(
            'Checking jobs updated after: ' . $lastRun
        );


        /*
        |--------------------------------------------------------------------------
        | Get New / Updated Jobs
        |--------------------------------------------------------------------------
        */

        $jobs = DB::table('job_details')

            ->where('updated_at', '>', $lastRun)

            ->whereNull('telegram_sent_at')

            ->select(
                'id',
                'title',
                'slug',
                'state',
                'category',
                'last_date',
                'updated_at'
            )

            ->orderBy('updated_at')

            ->get();


        /*
        |--------------------------------------------------------------------------
        | No Jobs
        |--------------------------------------------------------------------------
        */

        if ($jobs->isEmpty()) {

            $this->info('No new jobs found.');

            /*
            | Update last run because checking was successful.
            */

            Cache::put(
                'telegram_last_run',
                now(),
                now()->addDays(2)
            );

            return Command::SUCCESS;
        }


        $this->info(
            'Found ' . $jobs->count() . ' jobs.'
        );


        $sent = 0;

        $failed = 0;


        /*
        |--------------------------------------------------------------------------
        | Process Jobs
        |--------------------------------------------------------------------------
        */

        foreach ($jobs as $job) {

            $this->line(
                'Processing Job ID: ' . $job->id
            );


            try {

                /*
                |--------------------------------------------------------------------------
                | Send Telegram
                |--------------------------------------------------------------------------
                */

                $telegramSent =
                    FreeJobAlertHelper::sendTelegramJob($job);


                /*
                |--------------------------------------------------------------------------
                | Success
                |--------------------------------------------------------------------------
                */

                if ($telegramSent) {

                    DB::table('job_details')

                        ->where('id', $job->id)

                        ->update([
                            'telegram_sent_at' => now(),
                        ]);


                    $sent++;


                    $this->info(
                        'Telegram Sent: '
                        . $job->id
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | Failed
                |--------------------------------------------------------------------------
                */

                else {

                    $failed++;


                    $this->error(
                        'Telegram Failed: '
                        . $job->id
                    );
                }


            } catch (\Throwable $e) {

                $failed++;


                $this->error(
                    'Error Job '
                    . $job->id
                    . ': '
                    . $e->getMessage()
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Update Last Run
        |--------------------------------------------------------------------------
        */

        Cache::put(
            'telegram_last_run',
            now(),
            now()->addDays(2)
        );


        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        $this->newLine();

        $this->info(
            'Completed'
        );

        $this->info(
            'Total Found: ' . $jobs->count()
        );

        $this->info(
            'Telegram Sent: ' . $sent
        );

        $this->info(
            'Failed: ' . $failed
        );


        return Command::SUCCESS;
    }
}