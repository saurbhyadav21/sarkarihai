<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenerateJobSlug extends Command
{
    protected $signature = 'jobs:generate-slug';

    protected $description = 'Generate slug for job_details table';

    public function handle()
    {
        // Ek record uthao jiska slug NULL hai
        $job = DB::table('job_details')
            ->whereNull('slug')
            ->whereNotNull('title')
            ->orderBy('id')
            ->first();

        if (!$job) {
            $this->info('No pending records found.');
            return;
        }

        // Optional: Apply Online hata do
        $title = str_ireplace(
            [' - Apply Online', ' Apply Online'],
            '',
            $job->title
        );

        // Slug banao
        $slug = Str::slug($title);

        // Duplicate slug check
        $originalSlug = $slug;
        $counter = 1;

        while (
            DB::table('job_details')
                ->where('slug', $slug)
                ->where('id', '!=', $job->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Update karo
        DB::table('job_details')
            ->where('id', $job->id)
            ->update([
                'slug' => $slug,
                'updated_at' => now(),
            ]);

        $this->info(
            "ID {$job->id} updated: {$slug}"
        );
    }
}