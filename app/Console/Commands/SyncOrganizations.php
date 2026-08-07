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

        foreach ($jobs as $job) {

            // Bracket ke andar wali value nikalo (ACMS)
            preg_match('/\(([^)]*)\)/', $job->organization_full_form, $match);

            $organization = $match[1] ?? null;

            // Full form se bracket remove
            $fullName = preg_replace('/\([^)]*\)/', '', $job->organization_full_form);
            $fullName = preg_replace('/\s+/', ' ', $fullName);
            $fullName = preg_replace('/\s+,/', ',', $fullName);
            $fullName = trim($fullName);

            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'organization' => $organization,
                    'organization_full_form' => $fullName,
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

        DB::statement("
            UPDATE job_details
            SET year = YEAR(start_date)
            WHERE (year IS NULL OR year = '')
            AND start_date IS NOT NULL
        ");

        $this->info('Organizations synced successfully.');
        $this->info('Organization Full Forms cleaned successfully.');
        $this->info('Year updated successfully.');
        
    }
}
