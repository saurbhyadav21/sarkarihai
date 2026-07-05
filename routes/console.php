<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\File;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('jobs:fetch-news')
    ->everyMinute();

Schedule::command('jobs:process-one')
    ->everyMinute();

Schedule::command('jobs:generate-slug')
            ->everyMinute();

Schedule::call(function () {

    File::append(
        storage_path('cron_test.txt'),
        now() . " : Cron Working\n"
    );

})->everyMinute();



