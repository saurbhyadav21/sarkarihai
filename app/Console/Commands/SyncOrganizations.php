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
            SET organization_full_form = TRIM(
                CASE
                    WHEN organization_full_form LIKE '%(%)'
                    THEN SUBSTRING_INDEX(organization_full_form, '(', 1)
                    ELSE organization_full_form
                END
            )
            WHERE organization_verified = 1
              AND organization_full_form_verified = 1
              AND organization_full_form IS NOT NULL
              AND organization_full_form <> ''
              AND organization_full_form LIKE '%(%)'
        ");

        $this->info('Organizations synced successfully.');
         $this->info('Organization Full Forms cleaned successfully.');
    }
}
