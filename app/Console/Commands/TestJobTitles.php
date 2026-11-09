<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use DOMDocument;
use DOMXPath;

class TestJobTitles extends Command
{
    protected $signature = 'jobs:test-titles';

    protected $description = 'Scrape Post Name from FreeJobAlert overview table';

    public function handle()
    {
        $jobs = DB::table('job_details')
            ->select('id', 'source_url')
            ->where('post_flag', 0)
            ->whereNotNull('source_url')
            ->where('source_url', '!=', '')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        if ($jobs->isEmpty()) {
            $this->info('No pending jobs found.');
            return 0;
        }

        foreach ($jobs as $job) {

            $this->newLine();
            $this->info("Processing ID: {$job->id}");
            $this->line("URL: {$job->source_url}");

            try {

                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120.0.0.0 Safari/537.36',
                    'Accept' => 'text/html,application/xhtml+xml',
                ])->timeout(30)->get($job->source_url);

                if (!$response->successful()) {
                    $this->error('Page request failed: ' . $response->status());
                    continue;
                }

                $html = $response->body();

                libxml_use_internal_errors(true);

                $dom = new DOMDocument();

                $dom->loadHTML('<?xml encoding="UTF-8">' . $html);

                $xpath = new DOMXPath($dom);

                // Overview table ki Post Name row find karo
                $rows = $xpath->query('//table//tr');

                $postName = null;

                foreach ($rows as $row) {

                    $cells = $xpath->query('./td', $row);

                    if ($cells->length < 2) {
                        continue;
                    }

                    $label = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        $cells->item(0)->textContent
                    ));

                    if (strcasecmp($label, 'Post Name') === 0) {

                        $postName = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $cells->item(1)->textContent
                        ));

                        break;
                    }
                }

                libxml_clear_errors();

                if ($postName) {
                    $this->info('Post Name: ' . $postName);
                } else {
                    $this->warn('Post Name not found in overview table.');
                }

            } catch (\Throwable $e) {

                $this->error('Error: ' . $e->getMessage());
            }
        }

        $this->newLine();
        $this->info('Scraping test completed.');

        return 0;
    }
}
