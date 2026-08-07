<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Helpers\FreeJobAlertHelper;

class UpdateApplicationMode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-application-mode';

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
        $job = DB::table('job_details')
            ->whereIn('source', ['freejobalert', 'sarkariresult.com.cm'])
            ->where(function ($q) {
                $q->whereNull('apply_mode')
                    ->orWhere('apply_mode', '');
            })
            ->select('id', 'source_url', 'source')
            ->orderBy('id', 'asc')
            ->first();

        if (!$job) {
            $this->info('No pending records found.');
            return Command::SUCCESS;
        }

        try {

            $response = Http::timeout(30)
                ->retry(2, 1000)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0'
                ])
                ->get($job->source_url);

            if (!$response->successful()) {
                $this->error("Failed : {$job->id}");
                return Command::FAILURE;
            }

            $html = $response->body();

            $mode = null;

            if ($job->source == 'freejobalert') {
                $mode = FreeJobAlertHelper::extractFreeJobAlertMode($html);
            }

            if ($job->source == 'sarkariresult.com.cm') {
                $mode = FreeJobAlertHelper::extractSarkariMode($html);
            }

            if (!empty($mode)) {

                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'apply_mode' => $mode,
                        'updated_at' => now(),
                    ]);

                $this->info("Updated : {$job->id} => {$mode}");
            } else {

                // Optional: dubara process na ho
                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'apply_mode' => 'Not Found',
                        'updated_at' => now(),
                    ]);

                $this->warn("Not Found : {$job->id}");
            }
        } catch (\Exception $e) {

            $this->error($e->getMessage());
        }

        return Command::SUCCESS;
    }
}
