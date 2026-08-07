<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncOrganizations extends Command
{
    protected $signature = 'sync:organizations';

    protected $description = 'Sync organizations from job_details';

    public function handle()
    {

        $jobs = DB::table('job_details')
            ->select('id', 'organization', 'organization_full_form')
            //->where('organization_verified', 1)
            //->where('organization_full_form_verified', 1)
            ->whereNotNull('organization_full_form')
            ->where('organization_full_form', '<>', '')
            ->where(function ($query) {
                $query->where('organization_full_form', 'LIKE', '%(%')
                    ->orWhere('organization_full_form', 'LIKE', '%)%');
            })
            ->get();
        dd($jobs->toArray());
        foreach ($jobs as $job) {

            // Bracket aur uske andar ka text remove
            $fullName = preg_replace('/\s*\([^)]*\)/', '', trim($job->organization_full_form));
            $fullName = preg_replace('/\s+/', ' ', $fullName);
            $fullName = trim($fullName);

            DB::table('organizations')
                ->where('original_name', trim($job->organization))
                ->update([
                    'full_name'  => trim($fullName),
                    'updated_at' => now(),
                ]);
        }



        DB::statement("
            INSERT IGNORE INTO organizations (
                original_name,
                full_name,
                short_name,
                aliases,
                created_at,
                updated_at
            )
            SELECT
                TRIM(jd.organization),
                TRIM(jd.organization_full_form),
                TRIM(jd.organization),
                NULL,
                NOW(),
                NOW()
            FROM job_details jd
            LEFT JOIN organizations o
ON TRIM(o.original_name) COLLATE utf8mb4_unicode_ci =
   TRIM(jd.organization) COLLATE utf8mb4_unicode_ci
            WHERE jd.organization_verified = 1
              AND jd.organization_full_form_verified = 1
              AND jd.organization IS NOT NULL
              AND jd.organization <> ''
              AND o.id IS NULL;
        ");


        $this->info('Organizations synced successfully.');
        $this->info('Organization Full Forms cleaned successfully.');
    }
}
