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
        $updated = 0;
        $failed = 0;

        DB::table('job_details')
            ->whereIn('source', ['freejobalert', 'sarkariresult.com.cm'])
            ->where(function ($q) {
                $q->whereNull('apply_mode')
                    ->orWhere('apply_mode', '');
            })
            ->select('id', 'source_url','source')
            ->orderBy('id')
            ->chunk(100, function ($jobs) use (&$updated, &$failed) {

                foreach ($jobs as $job) {

                    try {

                        $response = Http::timeout(30)
                            ->retry(2, 1000)
                            ->withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/138.0 Safari/537.36'
                            ])
                            ->get($job->source_url);

                        if (!$response->successful()) {
                            $failed++;
                            continue;
                        }

                        $html = $response->body();
                        // DD($html);  
                        // $mode = //$this->extractApplicationMode($html);
                        $mode = null;

                        if ($job->source == 'freejobalert') {
                            $mode = FreeJobAlertHelper::extractFreeJobAlertMode($html);
                        }

                        if ($job->source == 'sarkariresult.com.cm') {
                            $mode = FreeJobAlertHelper::extractSarkariMode($html);
                        }

                        return $mode;

                        if (!empty($mode)) {

                            DB::table('job_details')
                                ->where('id', $job->id)
                                ->update([
                                    'apply_mode' => $mode,
                                    'updated_at' => now()
                                ]);

                            $updated++;

                            echo "Updated : {$job->id} => {$mode}<br>";
                        } else {

                            $failed++;

                            echo "Not Found : {$job->id}<br>";
                        }

                        ob_flush();
                        flush();
                    } catch (\Exception $e) {

                        $failed++;

                        echo "Error {$job->id} : " . $e->getMessage() . "<br>";
                    }
                }
            });

        return "Completed | Updated : {$updated} | Failed : {$failed}";
    }
}
