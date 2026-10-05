<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\File;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//To Fetch FreeJobAlert Google News Sitemap
Schedule::command('jobs:fetch-news')
    ->everyMinute();

//Scrap the FreeJobAlert Google News Sitemap and store in job_details table
Schedule::command('jobs:process-one')
    ->everyTenMinutes();


//This is fetch the data from sarkarihai.com and store in job_feeds table
//wget -q -O /dev/null "https://sarkarihai.com/import/wpx/all"







Schedule::command('jobs:generate-slug')
    ->everyMinute();











Schedule::command('jobs:detect-category')
    ->everyMinute();


Schedule::command('faq:generate-ids')->everyMinute();

Schedule::command('sync:organization-fullform')
    ->everyMinute();

Schedule::command('sync:organizations')
    ->everyMinute();

Schedule::command('app:update-application-mode')
    ->everyMinute()
    ->withoutOverlapping();

Schedule::command('telegram:prepare-jobs')
    ->everyMinute()
    ->withoutOverlapping();

    
Schedule::call(function () {

    File::append(
        storage_path('cron_test.txt'),
        now() . " : Cron Working\n"
    );
})->everyMinute();
