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
    // Process both FreeJobAlert and SarkariResult records
    $job = DB::table('job_details')
        ->whereIn('source', [
            'freejobalert',
            'sarkariresult.com.cm',
        ])
        ->where('vacancy_flag', 0)
        ->select('id', 'source', 'source_url')
        ->orderBy('id', 'asc')
        ->first();

    if (!$job) {
        $this->info('No pending vacancy records found for either website.');

        return Command::SUCCESS;
    }

    $this->info("Processing ID: {$job->id}");
    $this->info("Source: {$job->source}");
    $this->info("URL: {$job->source_url}");

    try {
        $response = Http::timeout(30)
            ->retry(2, 1000)
            ->withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/154.0.0.0 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])
            ->get($job->source_url);

        if (!$response->successful()) {
            $this->error(
                "HTTP Error: ID {$job->id} | Status: {$response->status()}"
            );

            // Keep pending so it can retry in the next run
            return Command::FAILURE;
        }

        $html = $response->body();

        // Helper handles both website formats
        $totalVacancies = FreeJobAlertHelper::totalVacancies($html);

        if ($totalVacancies !== null && $totalVacancies > 0) {
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
            // Mark checked to prevent repeatedly processing the same page
            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'vacancy_flag' => 1,
                    'updated_at' => now(),
                ]);

            $this->warn(
                "NOT FOUND: ID {$job->id} | Source: {$job->source}"
            );
        }
    } catch (\Throwable $e) {
        $this->error(
            "ERROR: ID {$job->id} | {$e->getMessage()}"
        );

        return Command::FAILURE;
    }

    return Command::SUCCESS;
}

    
}
