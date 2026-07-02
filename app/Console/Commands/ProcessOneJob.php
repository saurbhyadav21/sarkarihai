<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobFeed;
use App\Helpers\FreeJobAlertHelper;

class ProcessOneJob extends Command
{
    protected $signature = 'jobs:process-one';

    protected $description =
        'Process one pending job';

    public function handle()
    {
        /*
        ONE PENDING JOB
        */

        $feed = JobFeed::where(
                    'scrape_status',
                    'pending'
                )
                ->where(
                    'url_type',
                    'job'
                )
                ->orderBy('id')
                ->first();

        if (!$feed)
        {
            $this->info(
                'No pending jobs found'
            );

            return;
        }

        try
        {
            /*
            SCRAPE
            */

            $json =
                FreeJobAlertHelper::scrape(
                    $feed->url
                );

            /*
            STATUS DONE
            */

            $feed->scrape_status =
                'done';

            $feed->save();

            /*
            OUTPUT JSON
            */

            echo json_encode(
                $json,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE
            );
        }
        catch (\Exception $e)
        {
            $feed->scrape_status =
                'failed';

            $feed->save();

            $this->error(
                $e->getMessage()
            );
        }
    }
}