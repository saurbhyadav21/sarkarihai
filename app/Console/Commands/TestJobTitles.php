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

    protected $description = 'Test scrape job post title from different overview table formats';

    public function handle()
    {
        $jobs = DB::table('job_details')
            ->select('id', 'source_url', 'title')
            ->where('post_flag', 0)
            ->whereNotNull('source_url')
            ->where('source_url', '!=', '')
            ->orderBy('id', 'asc')
            // ->skip(10)
            // ->limit(25)
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
                ])->timeout(30)->retry(2, 1000)->get($job->source_url);

                if (!$response->successful()) {
                    $this->error('Request failed: ' . $response->status());
                    continue;
                }

                $html = $response->body();

                libxml_use_internal_errors(true);

                $dom = new DOMDocument();
                $dom->loadHTML('<?xml encoding="UTF-8">' . $html);

                $xpath = new DOMXPath($dom);

                $postName = null;
                $matchedFormat = null;

                /*
                |--------------------------------------------------------------------------
                | FORMAT 1: FreeJobAlert fja-t-kv table
                | Label: Post Name
                |--------------------------------------------------------------------------
                */

                $tables1 = $xpath->query(
                    "//table[contains(concat(' ', normalize-space(@class), ' '), ' fja-t-kv ')]"
                );

                foreach ($tables1 as $table) {

                    $rows = $xpath->query('.//tr', $table);

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

                            if ($postName !== '') {
                                $matchedFormat = 'Format 1 - fja-t-kv / Post Name';
                                break 2;
                            }
                        }
                    }
                }

                /*
                |--------------------------------------------------------------------------
                | FORMAT 2: Overview heading + scrollable-table
                | Label: Posts
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'OVERVIEW', 'overview'), 'overview')]"
                    );

                    foreach ($headings as $heading) {

                        // Heading ke baad aane wali tables check karo
                        $tables2 = $xpath->query(
                            "following::table[contains(concat(' ', normalize-space(@class), ' '), ' scrollable-table ')]",
                            $heading
                        );

                        foreach ($tables2 as $table) {

                            $rows = $xpath->query('.//tr', $table);

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

                                if (in_array(strtolower($label), [
                                    'post name',
                                    'post name(s)',
                                    'post(s)',
                                    'posts',
                                    'posts covered'
                                ], true)) {

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $cells->item(1)->textContent
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 2 - Overview / scrollable-table / Posts';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }



                
                /*
                |--------------------------------------------------------------------------
                | FORMAT 3: Walk-in Interview Date, Time and Venue
                | Label: Posts
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'walk-in interview date, time and venue')]"
                    );

                    foreach ($headings as $heading) {

                        $tables3 = $xpath->query(
                            "following::table[contains(concat(' ', normalize-space(@class), ' '), ' scrollable-table ')]",
                            $heading
                        );

                        foreach ($tables3 as $table) {

                            $rows = $xpath->query('.//tr', $table);

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

                                if (strcasecmp($label, 'Posts') === 0) {

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $cells->item(1)->textContent
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 3 - Walk-in Interview / Posts';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }


                
                /*
                |--------------------------------------------------------------------------
                | FORMAT 4: Overview table
                | Label: Post Names
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'overview')]"
                    );

                    foreach ($headings as $heading) {

                        $tables4 = $xpath->query(
                            "following::table[contains(concat(' ', normalize-space(@class), ' '), ' scrollable-table ')]",
                            $heading
                        );

                        foreach ($tables4 as $table) {

                            $rows = $xpath->query('.//tr', $table);

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

                                if (strcasecmp($label, 'Post Names') === 0) {

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $cells->item(1)->textContent
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 4 - Overview / Post Names';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }



                /*
                |--------------------------------------------------------------------------
                | FORMAT 5: Banking Associates at a Glance
                | Label: Post Name
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'at a glance')]"
                    );

                    foreach ($headings as $heading) {

                        $tables = $xpath->query(
                            "following::table[contains(concat(' ', normalize-space(@class), ' '), ' scrollable-table ')]",
                            $heading
                        );

                        foreach ($tables as $table) {

                            $rows = $xpath->query('.//tr', $table);

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

                                if (in_array(strtolower($label), ['post name', 'post name(s)', 'post(s)'], true)) {

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $cells->item(1)->textContent
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 5 - At a Glance / Post Name';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }


                
                /*
                |--------------------------------------------------------------------------
                | FORMAT 6: FreeJobAlert entry-content
                | Text: Name of the Post:
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $paragraphs = $xpath->query(
                        "//div[contains(concat(' ', normalize-space(@class), ' '), ' entry-content ')]//p"
                    );

                    foreach ($paragraphs as $paragraph) {

                        $text = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $paragraph->textContent
                        ));

                        if (preg_match('/Name\s+of\s+the\s+Post\s*:/iu', $text)) {

                            $postName = preg_replace(
                                '/^.*?Name\s+of\s+the\s+Post\s*:\s*/iu',
                                '',
                                $text
                            );

                            $postName = trim($postName);

                            if ($postName !== '') {
                                $matchedFormat = 'Format 6 - Entry Content / Name of the Post';
                                break;
                            }
                        }
                    }
                }
                


                
                /*
                |--------------------------------------------------------------------------
                | FORMAT 7: Quick Summary table
                | Label: Posts
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'quick summary')]"
                    );

                    foreach ($headings as $heading) {

                        $tables = $xpath->query(
                            "following::table[contains(concat(' ', normalize-space(@class), ' '), ' scrollable-table ')]",
                            $heading
                        );

                        foreach ($tables as $table) {

                            $rows = $xpath->query('.//tr', $table);

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

                                if (strcasecmp($label, 'Posts') === 0) {

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $cells->item(1)->textContent
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 7 - Quick Summary / Posts';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }



                //update the table with the extracted post title and set post_flag to 1
                if ($postName) {

                    $updated = DB::table('job_details')
                        ->where('id', $job->id)
                        ->update([
                            'post_name' => $postName,
                            'post_flag' => 1,
                            'updated_at' => now(),
                        ]);

                    $this->info('Matched: ' . $matchedFormat);
                    $this->info('Extracted Post Title: ' . $postName);

                    if ($updated) {
                        $this->info('Database Updated: ID ' . $job->id);
                    } else {
                        $this->warn('Database not changed for ID: ' . $job->id);
                    }

                } else {

                    $this->warn('Post title not found. ID: ' . $job->id);
                }

                libxml_clear_errors();

                if ($postName) {

                    $this->info('Matched: ' . $matchedFormat);
                    $this->info('Extracted Post Title: ' . $postName);

                } else {

                    $this->warn('Post title not found.');

                    // Debug: available table labels print karo
                    // $this->line('Available table labels:');

                    // $allRows = $xpath->query('//table//tr');

                    // foreach ($allRows as $row) {

                    //     $cells = $xpath->query('./td', $row);

                    //     if ($cells->length >= 2) {

                    //         $label = trim(preg_replace(
                    //             '/\s+/u',
                    //             ' ',
                    //             $cells->item(0)->textContent
                    //         ));

                    //         $this->line('- ' . $label);
                    //     }
                    // }
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
