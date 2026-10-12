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
    $processed = 0;
    $failed = 0;

    $jobs = DB::connection()
        ->getPdo()
        ->query("SELECT * FROM `job_details` WHERE `total_vacancies` IS NULL OR TRIM(`total_vacancies`) = '' AND `vacancy_flag` = 0")
        ->fetchAll(\PDO::FETCH_OBJ);

    if (!$jobs) {
        $this->info('No pending vacancy records found.');
        return Command::SUCCESS;
    }

    foreach ($jobs as $job) {
        $this->info("Processing ID: {$job->id} | Source: {$job->source}");

        try {
            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/154.0.0.0 Safari/537.36',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.9',
                ])
                ->get($job->source_url);

            if (!$response->successful()) {
                $this->error(
                    "HTTP ERROR: ID {$job->id} | Status: {$response->status()}"
                );

                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'vacancy_flag' => 2,
                        'updated_at' => now(),
                    ]);

                $failed++;
                continue;
            }

            $totalVacancies = FreeJobAlertHelper::totalVacancies(
                $response->body()
            );

            if ($totalVacancies !== null) {
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'total_vacancies' => $totalVacancies,
                        'vacancy_flag' => 1,
                        'updated_at' => now(),
                    ]);

                $this->info(
                    "UPDATED: ID {$job->id} | Posts: {$totalVacancies}"
                );
            } else {
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'vacancy_flag' => 1,
                        'updated_at' => now(),
                    ]);

                $this->warn(
                    "NOT FOUND: ID {$job->id} | Vacancy not detected"
                );
            }

            $processed++;

        } catch (\Throwable $e) {
            $this->error("ERROR: ID {$job->id} | {$e->getMessage()}");

            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'vacancy_flag' => 2,
                    'updated_at' => now(),
                ]);

            $failed++;
            continue;
        }
    }

    $this->info("Completed | Processed: {$processed} | Failed: {$failed}");

    return Command::SUCCESS;
}



    
}
