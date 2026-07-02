<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class ProcessOneJob extends Command
{
    protected $signature =
        'app:process-one-job';

    protected $description =
        'Process one pending job';

    public function handle()
    {
        $feed =
            DB::table('job_feeds')
            ->where(
                'scrape_status',
                'pending'
            )
            ->orderBy('id')
            ->first();

        if (!$feed)
        {
            $this->info(
                'No pending rows'
            );

            return;
        }

        $title =
            strtolower(
                $feed->title
            );

        /*
        ignore non jobs
        */

        $ignore = [

            'admit card',

            'result',

            'answer key',

            'syllabus',

            'hall ticket',

            'score card',

            'cut off',

            'merit list',

            'interview schedule'
        ];

        foreach ($ignore as $word)
        {
            if (
                strpos(
                    $title,
                    $word
                ) !== false
            )
            {
                DB::table('job_feeds')
                    ->where(
                        'id',
                        $feed->id
                    )
                    ->update([

                        'scrape_status'
                            =>
                            'ignored'
                    ]);

                $this->warn(
                    'Ignored'
                );

                return;
            }
        }

        DB::table('job_feeds')
            ->where(
                'id',
                $feed->id
            )
            ->update([

                'scrape_status'
                    =>
                    'processing'
            ]);

        try
        {
            $json =
                FreeJobAlertHelper::scrape(
                    $feed->url
                );

            echo
                json_encode(
                    $json,
                    JSON_PRETTY_PRINT
                    |
                    JSON_UNESCAPED_UNICODE
                );

            DB::table('job_feeds')
                ->where(
                    'id',
                    $feed->id
                )
                ->update([

                    'scrape_status'
                        =>
                        'completed'
                ]);
        }
        catch (\Exception $e)
        {
            DB::table('job_feeds')
                ->where(
                    'id',
                    $feed->id
                )
                ->update([

                    'scrape_status'
                        =>
                        'failed'
                ]);

            $this->error(
                $e->getMessage()
            );
        }
    }
}