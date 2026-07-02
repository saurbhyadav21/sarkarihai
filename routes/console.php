<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;




Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');




Schedule::command('jobs:fetch-news')
    ->everyMinute();


Schedule::call(function () {

    file_put_contents(
        storage_path('cron_test.txt'),
        date('Y-m-d H:i:s') . PHP_EOL,
        FILE_APPEND
    );
})->everyMinute();



Schedule::command('jobs:process-one')
    ->everyMinute();