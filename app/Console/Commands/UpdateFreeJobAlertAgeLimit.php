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

            if ($ageData && (
                !empty($ageData['min_age']) ||
                !empty($ageData['max_age_genral']) ||
                !empty($ageData['relaxation'])
            )) {
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'min_age'        => $ageData['min_age'] ?? 'TBA',
                        'max_age_genral' => $ageData['max_age_genral'] ?? 'TBA',
                        'max_age_obc'    => $ageData['max_age_obc'] ?? 'TBA',
                        'max_age_sc_st'  => $ageData['max_age_sc_st'] ?? 'TBA',
                        'max_age_female' => $ageData['max_age_female'] ?? 'TBA',
                        'relaxation'     => $ageData['relaxation'] ?? 'TBA',
                        'post_age_limit' => $ageData['post_age_limit'] ?? 'TBA',
                        'age_flag'       => 1,
                        'updated_at'     => now(),
                    ]);
            } else {
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'min_age'        => 'TBA',
                        'max_age_genral' => 'TBA',
                        'max_age_obc'    => 'TBA',
                        'max_age_sc_st'  => 'TBA',
                        'max_age_female' => 'TBA',
                        'relaxation'     => 'TBA',
                        'post_age_limit' => 'TBA',
                        'age_flag'       => 1,
                        'updated_at'     => now(),
                    ]);

                $this->warn("AGE NOT FOUND: ID {$job->id} — TBA saved.");
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
