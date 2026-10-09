<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class UpdateVacanciesPostStartEndDateMinMaxAgeTitleName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-vacancies-post-start-end-date-min-max-age-title-name';

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
        /*
        |--------------------------------------------------------------------------
        | Get one pending FreeJobAlert record
        |--------------------------------------------------------------------------
        */

       echo "Getting one pending FreeJobAlert record...\n";
    }
}
