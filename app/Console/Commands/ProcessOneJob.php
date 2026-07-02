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
    $this->error(
        'No pending jobs found'
    );
    return;
}

/*
DEBUG
*/

$this->info(
    'Processing Feed'
);

$this->line(
    'ID        : ' . $feed->id
);

$this->line(
    'URL TYPE  : ' . $feed->url_type
);

$this->line(
    'TITLE     : ' . $feed->title
);

$this->line(
    'URL       : ' . $feed->url
);

$this->line(
    'STATUS    : ' . $feed->scrape_status
);

try
{
    $json =
        FreeJobAlertHelper::scrape(
            $feed->url
        );

    echo "\n";
    echo "SCRAPED JSON\n";
    echo "====================\n";

    echo json_encode(
        $json,
        JSON_PRETTY_PRINT |
        JSON_UNESCAPED_UNICODE
    );

    echo "\n";

    $feed->scrape_status =
        'completed';

    $feed->save();

    $this->info(
        'DONE'
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
}}
}