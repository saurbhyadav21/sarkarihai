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
    $processed = 0;
    $failed = 0;

    while (true) {
        $job = DB::table('job_details')
            ->where('source', 'freejobalert')
            ->where('age_flag', 0)
            ->select('id', 'source', 'source_url')
            ->orderBy('id', 'asc')
            ->first();

        if (!$job) {
            $this->info('No pending age records found.');
            break;
        }

        $this->info("Processing ID: {$job->id}");

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
                $this->error("HTTP Error ID {$job->id}: {$response->status()}");
                $failed++;

                // Failed record ko dobara loop mein uthane se roko
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'age_flag' => 2,
                        'updated_at' => now(),
                    ]);

                continue;
            }

            $ageData = FreeJobAlertHelper::extractAgeLimit(
                $response->body()
            );

            $hasAge = $ageData && (
                (isset($ageData['min_age']) && $ageData['min_age'] !== '' && $ageData['min_age'] !== 'TBA') ||
                (isset($ageData['max_age_genral']) && $ageData['max_age_genral'] !== '' && $ageData['max_age_genral'] !== 'TBA')
            );

            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'min_age'        => $hasAge ? ($ageData['min_age'] ?? 'TBA') : 'TBA',
                    'max_age_genral' => $hasAge ? ($ageData['max_age_genral'] ?? 'TBA') : 'TBA',
                    'max_age_obc'    => $hasAge ? ($ageData['max_age_obc'] ?? 'TBA') : 'TBA',
                    'max_age_sc_st'  => $hasAge ? ($ageData['max_age_sc_st'] ?? 'TBA') : 'TBA',
                    'max_age_female' => $hasAge ? ($ageData['max_age_female'] ?? 'TBA') : 'TBA',
                    'relaxation'     => $ageData['relaxation'] ?? 'TBA',
                    'post_age_limit' => $hasAge ? ($ageData['post_age_limit'] ?? 'TBA') : 'TBA',
                    'age_flag'       => 1,
                    'updated_at'     => now(),
                ]);

            $processed++;

            $this->info(
                "DONE ID {$job->id} | " .
                ($hasAge ? 'Age found' : 'Age not found — TBA saved')
            );

        } catch (\Throwable $e) {
            $this->error("ERROR ID {$job->id}: {$e->getMessage()}");

            // Is record ko skip karke next record process hoga
            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'age_flag' => 2,
                    'updated_at' => now(),
                ]);

            $failed++;
            continue;
        }
    }

    $this->info("Completed. Processed: {$processed} | Failed: {$failed}");

    return Command::SUCCESS;
}


}
