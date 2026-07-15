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
        $job = DB::table('job_details')
            ->whereNull('slug')
            ->whereNotNull('title')
            ->orderBy('id')
            ->first();

        if (!$job) {
            $this->info('No pending records found.');
            return;
        }

        $title = $job->title;

        /*
        |--------------------------------------------------------------------------
        | SEO Cleanup Rules
        |--------------------------------------------------------------------------
        */

        $removeWords = [

            // Apply related
            'Apply Online',
            '- Apply Online',
            '| Apply Online',
            'Online Form',
            'Registration',

            // Extra words
            'For Men',
            'For Women',
            'Men Women',
            'Men & Women',
            'Male Female',
            'Latest Update',
            'Official Notification',
            'Notification Out',
            'Download PDF',
            'PDF Download',

            // Common fillers
            'Check Details',
            'Check Eligibility',
            'Direct Link',
            'Apply Now',

        ];

        $title = str_ireplace($removeWords, '', $title);

        // Extra spaces remove
        $title = preg_replace('/\s+/', ' ', $title);

        // Trim
        $title = trim($title);

        // Slug generate
        $slug = Str::slug($title);

        // Duplicate slug handling
        $originalSlug = $slug;
        $counter = 1;

        // while (
        //     DB::table('job_details')
        //         ->where('slug', $slug)
        //         ->where('id', '!=', $job->id)
        //         ->exists()
        // ) {
        //     $slug = $originalSlug . '-' . $counter;
        //     $counter++;
        // }
        //TEmplted ID
        // Template Combination Generate (20 x 20 x 20)

        $number = $job->id % 8000;

        // P1 (1-20)
        $p1 = ($number % 20) + 1;

        // P2 (1-20)
        $p2 = (intdiv($number, 20) % 20) + 1;

        // P3 (1-20)
        $p3 = (intdiv($number, 400) % 20) + 1;


        // Store comma separated
        $templateCombination = $p1 . ',' . $p2 . ',' . $p3;

        DB::table('job_details')
            ->where('id', $job->id)
            ->update([
                'slug' => $slug,
                'template_combination_id' => $templateCombination,
                'updated_at' => now(),
            ]);

        $this->info(
            "ID {$job->id} updated: {$slug}"
        );
    }
}
