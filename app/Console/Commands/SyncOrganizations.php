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
            INSERT INTO organizations (
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
                ON TRIM(o.original_name) = TRIM(jd.organization)
            WHERE jd.organization_verified = 1
              AND jd.organization_full_form_verified = 1
              AND jd.organization IS NOT NULL
              AND jd.organization <> ''
              AND o.id IS NULL;
        ");

        $this->info('Organizations synced successfully.');
    }
}
