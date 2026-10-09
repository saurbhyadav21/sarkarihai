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

        $job = DB::table('job_details')
            ->where('source', 'freejobalert')
            ->where('vacancy_flag', 0)
            ->select(
                'id',
                'source_url'
            )
            ->orderBy('id', 'asc')
            ->first();

        if (!$job) {

            $this->info('No pending FreeJobAlert records found.');

            return Command::SUCCESS;
        }

        $this->info("Processing ID : {$job->id}");
        $this->info("URL : {$job->source_url}");

        try {

            /*
            |--------------------------------------------------------------------------
            | Fetch URL
            |--------------------------------------------------------------------------
            */

            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/154.0.0.0 Safari/537.36',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.9',
                ])
                ->get($job->source_url);

            /*
            |--------------------------------------------------------------------------
            | Check response
            |--------------------------------------------------------------------------
            */

            if (!$response->successful()) {

                $this->error(
                    "Failed : {$job->id} | HTTP {$response->status()}"
                );

                return Command::FAILURE;
            }

            $html = $response->body();

            /*
            |--------------------------------------------------------------------------
            | Extract Total Vacancies
            |--------------------------------------------------------------------------
            */

            $totalVacancies =
                FreeJobAlertHelper::totalVacancies($html);

            /*
            |--------------------------------------------------------------------------
            | Vacancy found
            |--------------------------------------------------------------------------
            */

            if (!empty($totalVacancies)) {

                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'total_vacancies' => $totalVacancies,
                        'vacancy_flag' => 1,
                        'updated_at' => now(),
                    ]);

                $this->info(
                    "Updated : {$job->id} => {$totalVacancies}"
                );

            } else {

                /*
                |--------------------------------------------------------------------------
                | Vacancy not found
                |--------------------------------------------------------------------------
                |
                | Flag 1 kar rahe hain taaki same URL baar-baar process na ho.
                |
                */

                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'vacancy_flag' => 1,
                        'updated_at' => now(),
                    ]);

                $this->warn(
                    "Vacancy Not Found : {$job->id}"
                );
            }

        } catch (\Exception $e) {

            $this->error(
                "Error ID {$job->id} : {$e->getMessage()}"
            );

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
    
}
