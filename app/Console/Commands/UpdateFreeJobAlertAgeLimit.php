<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class UpdateFreeJobAlertAgeLimit extends Command
{
    protected $signature = 'app:update-freejobalert-age-limit';

    protected $description = 'Process pending FreeJobAlert age-limit records';

   
    public function handle()
    {
        $job = DB::table('job_details')
            ->where('source', 'freejobalert')
            ->where('age_flag', 0)
            ->select('id', 'source', 'source_url')
            ->orderBy('id', 'asc')
            ->first();

        if (!$job) {
            $this->info('No pending FreeJobAlert age records found.');

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

                return Command::FAILURE;
            }

            $html = $response->body();

            // Extract age details from FreeJobAlert HTML
            $ageData = FreeJobAlertHelper::extractAgeLimit($html);

            if (
                $ageData !== null &&
                (
                    $ageData['min_age'] !== null ||
                    $ageData['max_age_genral'] !== null
                )
            ) {
                DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'min_age'          => $ageData['min_age'] ?? null,
                    'max_age_genral'   => $ageData['max_age_genral'] ?? null,
                    'max_age_obc'      => $ageData['max_age_obc'] ?? null,
                    'max_age_sc_st'    => $ageData['max_age_sc_st'] ?? null,
                    'max_age_female'   => $ageData['max_age_female'] ?? null,
                    'relaxation'       => $ageData['relaxation'] ?? null,
                    'post_age_limit'   => $ageData['post_age_limit'] ?? null,
                    'age_flag'         => 1,
                    'updated_at'       => now(),
                ]);

                $this->info(
                    "UPDATED: ID {$job->id} | Min Age: " .
                    ($ageData['min_age'] ?? 'NULL') .
                    " | Max Age: " .
                    ($ageData['max_age_genral'] ?? 'NULL')
                );
            } else {
                $this->warn(
                    "AGE NOT FOUND: ID {$job->id} | Record remains pending."
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
