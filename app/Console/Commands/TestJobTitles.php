<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestJobTitles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-job-titles';

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
        $jobs = DB::table('job_details')
            ->select('id', 'title')
            ->whereNotNull('title')
            ->where('title', '!=', '')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        if ($jobs->isEmpty()) {
            $this->info('No job titles found.');
            return 0;
        }

        foreach ($jobs as $job) {
            $this->line('ID: ' . $job->id);
            $this->info('Title: ' . $job->title);
            $this->line('--------------------------------');
        }

        $this->info('Total titles: ' . $jobs->count());

        return 0;
    }
}
