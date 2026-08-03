<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncOrganizationFullForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:organization-fullform';

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

        $jobs = DB::table('job_details')
            ->where('organization_verified', 1)
            ->where(function ($query) {
                // $query->whereNull('organization_full_form')
                //     ->orWhere('organization_full_form', '');
            })
            ->limit(500)
            ->get();

        foreach ($jobs as $job) {

            $org = DB::table('organizations')
                ->select('full_name', 'short_name')
                ->where('original_name', trim($job->organization))
                ->first();

            if ($org) {

                DB::table('job_details')
                    ->where('id', $job->id)
                    ->update([
                        'organization_full_form' => $org->full_name,
                        'organization_short_form' => $org->short_name,
                        'organization_full_form_verified' => 1,
                        'updated_at' => now(),
                    ]);

                $updated++;
            }
        }

        $this->info("Updated Records: {$updated}");
    }
}
