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
                                    'posts covered',
                                    'post',
                                    'project position'
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

                                if (in_array(strtolower($label), [
                                    'post name',
                                    'post name(s)',
                                    'post(s)',
                                    'posts',
                                    'posts covered',
                                    'post'
                                ], true)) {

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


                
                /*
                |--------------------------------------------------------------------------
                | FORMAT 8: Quick Highlights UL list
                | Label: Post Name
                |--------------------------------------------------------------------------
                */

                if (!$postName) {

                    $headings = $xpath->query(
                        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'quick highlights')]"
                    );

                    foreach ($headings as $heading) {

                        $lists = $xpath->query('following-sibling::ul[1]', $heading);

                        foreach ($lists as $list) {

                            $items = $xpath->query('.//li', $list);

                            foreach ($items as $item) {

                                $strong = $xpath->query('.//strong', $item);

                                if ($strong->length == 0) {
                                    continue;
                                }

                                $label = trim($strong->item(0)->textContent);

                                $label = trim(str_replace(':', '', $label));

                                if (strcasecmp($label, 'Post Name') === 0) {

                                    // Strong tag ke baad ka text extract karo
                                    $postName = '';

                                    foreach ($item->childNodes as $node) {

                                        if ($node->isSameNode($strong->item(0))) {
                                            continue;
                                        }

                                        $postName .= ' ' . $node->textContent;
                                    }

                                    $postName = trim(preg_replace(
                                        '/\s+/u',
                                        ' ',
                                        $postName
                                    ));

                                    if ($postName !== '') {
                                        $matchedFormat = 'Format 8 - Quick Highlights / UL';
                                        break 3;
                                    }
                                }
                            }
                        }
                    }
                }


                // Format - LIC HFL: H6 Heading + First Column Post Name
                if (!$postName) {
                    $headings = $xpath->query(
                        "//h6[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'junior assistant')]"
                    );

                    foreach ($headings as $heading) {
                        $tables = $xpath->query(
                            "following::table[1]",
                            $heading
                        );

                        if ($tables->length > 0) {
                            $rows = $xpath->query('.//tr', $tables->item(0));

                            if ($rows->length > 1) {
                                $cells = $xpath->query('./td', $rows->item(1));

                                if ($cells->length > 0) {
                                    $postName = trim(
                                        preg_replace('/\s+/u', ' ', $cells->item(0)->textContent)
                                    );

                                    if ($postName !== '') {
                                        $matchedFormat = 'LIC HFL Format - H6 Heading / First Column';
                                    }
                                }
                            }
                        }
                    }
                }

                // Format - Overview Table: TH Label + TD Value
if (!$postName) {
    $headings = $xpath->query(
        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'overview')]"
    );

    foreach ($headings as $heading) {
        $tables = $xpath->query("following::table[1]", $heading);

        if ($tables->length > 0) {
            $rows = $xpath->query('.//tr', $tables->item(0));

            foreach ($rows as $row) {
                $th = $xpath->query('./th', $row);
                $td = $xpath->query('./td', $row);

                if ($th->length > 0 && $td->length > 0) {
                    $label = strtolower(trim($th->item(0)->textContent));

                    if ($label === 'post name') {
                        $postName = trim(
                            preg_replace('/\s+/u', ' ', $td->item(0)->textContent)
                        );

                        if ($postName !== '') {
                            $matchedFormat = 'Overview Format - TH Label / TD Value';
                            break 2;
                        }
                    }
                }
            }
        }
    }
}

// Format - H6 Vacancy Details / Multiple Post Names
if (!$postName) {
    $headings = $xpath->query(
        "//h6[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'vacancy details')]"
    );

    foreach ($headings as $heading) {
        $tables = $xpath->query("following::table[1]", $heading);

        if ($tables->length > 0) {
            $rows = $xpath->query('.//tr', $tables->item(0));
            $postNames = [];
            $postColumn = null;

            foreach ($rows as $row) {
                $cells = $xpath->query('./td | ./th', $row);

                if ($cells->length == 0) {
                    continue;
                }

                // Find Post Name column
                foreach ($cells as $index => $cell) {
                    $label = strtolower(trim($cell->textContent));

                    if ($label === 'post name') {
                        $postColumn = $index;
                        break;
                    }
                }

                // Extract post names from subsequent rows
                if ($postColumn !== null && $cells->length > $postColumn) {
                    $value = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        $cells->item($postColumn)->textContent
                    ));

                    if ($value !== '' && strtolower($value) !== 'post name') {
                        $postNames[] = $value;
                    }
                }
            }

            if (!empty($postNames)) {
                $postName = implode(', ', array_unique($postNames));
                $matchedFormat = 'H6 Vacancy Details - Multiple Post Names';
            }
        }
    }
}


 // Format - H6 Vacancy Details / Multiple Tables / Post Name
if (!$postName) {

    $headings = $xpath->query(
        "//h6[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'vacancy details')]"
    );

    foreach ($headings as $heading) {

        $tables = $xpath->query("following::table", $heading);

        foreach ($tables as $table) {

            $rows = $xpath->query('./tbody/tr', $table);

            if ($rows->length < 2) {
                continue;
            }

            $headerCells = $xpath->query('./td | ./th', $rows->item(0));

            $postColumn = null;

            foreach ($headerCells as $index => $cell) {

                $label = strtolower(trim(preg_replace(
                    '/\s+/u',
                    ' ',
                    $cell->textContent
                )));

                if ($label === 'post name') {
                    $postColumn = $index;
                    break;
                }
            }

            if ($postColumn !== null) {

                $postNames = [];

                for ($i = 1; $i < $rows->length; $i++) {

                    $cells = $xpath->query(
                        './td | ./th',
                        $rows->item($i)
                    );

                    if ($cells->length > $postColumn) {

                        $value = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $cells->item($postColumn)->textContent
                        ));

                        if ($value !== '') {
                            $postNames[] = $value;
                        }
                    }
                }

                if (!empty($postNames)) {
                    $postName = implode(', ', array_unique($postNames));
                    $matchedFormat = 'H6 Vacancy Details - Post Name Column';
                    break;
                }
            }
        }

        if ($postName) {
            break;
        }
    }
}         

// Format - H6 Admission Details / Exam Name
if (!$postName) {
    $headings = $xpath->query(
        "//h6[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'admission details')]"
    );

    foreach ($headings as $heading) {
        $tables = $xpath->query("following::table[1]", $heading);

        foreach ($tables as $table) {
            $rows = $xpath->query('.//tr', $table);

            foreach ($rows as $row) {
                $cells = $xpath->query('./td | ./th', $row);

                if ($cells->length >= 2) {
                    $label = trim(preg_replace('/\s+/u', ' ', $cells->item(0)->textContent));

                    if (strcasecmp($label, 'Exam Name') === 0) {
                        $postName = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $cells->item(1)->textContent
                        ));

                        if ($postName !== '') {
                            $matchedFormat = 'Admission Details - Exam Name';
                            break 3;
                        }
                    }
                }
            }
        }
    }
}


// Format - H6 Vacancy Details / Course Name Column
if (!$postName) {
    $headings = $xpath->query(
        "//h6[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'vacancy details')]"
    );

    foreach ($headings as $heading) {
        $tables = $xpath->query("following::table", $heading);

        foreach ($tables as $table) {
            $rows = $xpath->query('.//tr', $table);

            if ($rows->length < 2) {
                continue;
            }

            // First row ke column headings check karo
            $headerCells = $xpath->query('./td | ./th', $rows->item(0));
            $courseColumn = null;

            foreach ($headerCells as $index => $cell) {
                $label = strtolower(trim(preg_replace(
                    '/\s+/u',
                    ' ',
                    $cell->textContent
                )));

                if ($label === 'course name') {
                    $courseColumn = $index;
                    break;
                }
            }

            // Course Name column milne par saari rows se values lo
            if ($courseColumn !== null) {
                $names = [];

                for ($i = 1; $i < $rows->length; $i++) {
                    $cells = $xpath->query('./td | ./th', $rows->item($i));

                    if ($cells->length > $courseColumn) {
                        $value = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $cells->item($courseColumn)->textContent
                        ));

                        if ($value !== '') {
                            $names[] = $value;
                        }
                    }
                }

                if (!empty($names)) {
                    $postName = implode(', ', array_unique($names));
                    $matchedFormat = 'H6 Vacancy Details - Course Name Column';
                    break;
                }
            }
        }

        if ($postName) {
            break;
        }
    }
}

// Format - Table Header Exam Name / Multiple Rows
if (!$postName) {
    $tables = $xpath->query("//table");

    foreach ($tables as $table) {
        $rows = $xpath->query('.//tr', $table);

        if ($rows->length < 2) {
            continue;
        }

        $headerCells = $xpath->query('./td | ./th', $rows->item(0));
        $examColumn = null;
        $columnIndex = 0;

        foreach ($headerCells as $cell) {
            $label = trim(preg_replace(
                '/\s+/u',
                ' ',
                $cell->textContent
            ));

            if (strcasecmp($label, 'Exam Name') === 0) {
                $examColumn = $columnIndex;
                break;
            }

            $columnIndex++;
        }

        if ($examColumn !== null) {
            $names = [];

            for ($i = 1; $i < $rows->length; $i++) {
                $cells = $xpath->query('./td | ./th', $rows->item($i));

                if ($cells->length > $examColumn) {
                    $value = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        $cells->item($examColumn)->textContent
                    ));

                    if ($value !== '') {
                        $names[] = $value;
                    }
                }
            }

            if (!empty($names)) {
                $postName = implode(', ', array_unique($names));
                $matchedFormat = 'Table Format - Exam Name Column';
                break;
            }
        }
    }
}

// Format - District Name / Anganwadi District Wise Table
if (!$postName) {

    $tables = $xpath->query("//table");

    foreach ($tables as $table) {

        $rows = $xpath->query('.//tr', $table);

        if ($rows->length < 2) {
            continue;
        }

        $districtColumn = null;
        $headerRowIndex = null;

        // District Name header find karo
        foreach ($rows as $rowIndex => $row) {

            $cells = $xpath->query('./td | ./th', $row);
            $columnIndex = 0;

            foreach ($cells as $cell) {

                $label = trim(preg_replace(
                    '/\s+/u',
                    ' ',
                    $cell->textContent
                ));

                if (strcasecmp($label, 'District Name') === 0) {
                    $districtColumn = $columnIndex;
                    $headerRowIndex = $rowIndex;
                    break 2;
                }

                $columnIndex++;
            }
        }

        if ($districtColumn === null) {
            continue;
        }

        $districtNames = [];

        // Header ke baad first column se district names nikalo
        foreach ($rows as $rowIndex => $row) {

            if ($rowIndex <= $headerRowIndex) {
                continue;
            }

            $cells = $xpath->query('./td | ./th', $row);

            if ($cells->length <= $districtColumn) {
                continue;
            }

            $value = trim(preg_replace(
                '/\s+/u',
                ' ',
                $cells->item($districtColumn)->textContent
            ));

            $value = html_entity_decode(
                $value,
                ENT_QUOTES | ENT_HTML5,
                'UTF-8'
            );

            if (
                $value !== '' &&
                !in_array(strtolower($value), [
                    'district name',
                    'last date',
                    'notification',
                    'no. of post'
                ])
            ) {
                $districtNames[] = $value;
            }
        }

        if (!empty($districtNames)) {

            $postName = implode(', ', array_unique($districtNames));

            $matchedFormat = 'Anganwadi - District Name Column';

            break;
        }
    }
}






// Format - BSEB DELED Admission Details
if (!$postName) {

    // Admission Details heading ke baad ka HTML
    if (preg_match(
        '~<h6\b[^>]*>.*?Admission\s+Details.*?</h6>(.*)~is',
        $html,
        $sectionMatch
    )) {

        // Heading ke baad pehli table
        if (preg_match(
            '~<table\b[^>]*>(.*?)</table>~is',
            $sectionMatch[1],
            $tableMatch
        )) {

            // Table ki rows
            preg_match_all(
                '~<tr\b[^>]*>(.*?)</tr>~is',
                $tableMatch[1],
                $rowMatches
            );

            foreach ($rowMatches[1] as $row) {

                // Candidate eligibility wali row identify karo
                if (stripos($row, 'Candidates who have completed') === false) {
                    continue;
                }

                // Row ke cells nikalo
                preg_match_all(
                    '~<td\b[^>]*>(.*?)</td>~is',
                    $row,
                    $cellMatches
                );

                if (!empty($cellMatches[1][0])) {

                    $postName = html_entity_decode(
                        strip_tags($cellMatches[1][0]),
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );

                    $postName = preg_replace('/\x{00A0}/u', ' ', $postName);
                    $postName = trim(preg_replace('/\s+/u', ' ', $postName));

                    if ($postName !== '') {
                        $matchedFormat = 'BSEB DELED - Admission Details';
                    } else {
                        $postName = null;
                    }
                }

                break;
            }
        }
    }
}


// Format - Haryana HTET Vacancy Details / Post Column
if (!$postName) {

    if (preg_match(
        '~<h6\b[^>]*>.*?Haryana\s+HTET.*?Vacancy\s+Details.*?</h6>(.*)~is',
        $html,
        $sectionMatch
    )) {

        // Heading ke baad tables
        preg_match_all(
            '~<table\b[^>]*>.*?</table>~is',
            $sectionMatch[1],
            $tableMatches
        );

        foreach ($tableMatches[0] as $tableHtml) {

            // Table ki rows
            preg_match_all(
                '~<tr\b[^>]*>(.*?)</tr>~is',
                $tableHtml,
                $rowMatches
            );

            if (count($rowMatches[1]) < 2) {
                continue;
            }

            // First row mein Post column identify karo
            preg_match_all(
                '~<(?:td|th)\b[^>]*>(.*?)</(?:td|th)>~is',
                $rowMatches[1][0],
                $headerCells
            );

            $postColumn = null;

            foreach ($headerCells[1] as $index => $cellHtml) {

                $label = html_entity_decode(
                    strip_tags($cellHtml),
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                );

                $label = trim(preg_replace('/\s+/u', ' ', $label));

                if (strcasecmp($label, 'Post') === 0) {
                    $postColumn = $index;
                    break;
                }
            }

            if ($postColumn === null) {
                continue;
            }

            // Post column ki values extract karo
            $postNames = [];

            for ($i = 1; $i < count($rowMatches[1]); $i++) {

                preg_match_all(
                    '~<(?:td|th)\b[^>]*>(.*?)</(?:td|th)>~is',
                    $rowMatches[1][$i],
                    $cells
                );

                if (isset($cells[1][$postColumn])) {

                    $value = html_entity_decode(
                        strip_tags($cells[1][$postColumn]),
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );

                    $value = trim(preg_replace('/\s+/u', ' ', $value));

                    if ($value !== '') {
                        $postNames[] = $value;
                    }
                }
            }

            if (!empty($postNames)) {

                $postName = implode(', ', array_unique($postNames));

                $matchedFormat = 'Haryana HTET - Vacancy Details / Post Column';

                break;
            }
        }
    }
}


// Format - NEET PG Course Details / Course Column
if (!$postName) {

    if (preg_match(
        '~<h6\b[^>]*>.*?NEET\s+PG.*?Course\s+Details.*?</h6>(.*)~is',
        $html,
        $sectionMatch
    )) {

        if (preg_match(
            '~<table\b[^>]*>(.*?)</table>~is',
            $sectionMatch[1],
            $tableMatch
        )) {

            preg_match_all(
                '~<tr\b[^>]*>(.*?)</tr>~is',
                $tableMatch[1],
                $rowMatches
            );

            if (isset($rowMatches[1][1])) {

                preg_match(
                    '~<td\b[^>]*>(.*?)</td>~is',
                    $rowMatches[1][1],
                    $cellMatch
                );

                if (!empty($cellMatch[1])) {

                    $postName = html_entity_decode(
                        strip_tags($cellMatch[1]),
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );

                    $postName = trim(preg_replace('/\s+/u', ' ', $postName));

                    if ($postName !== '') {
                        $matchedFormat = 'NEET PG - Course Details';
                    } else {
                        $postName = null;
                    }
                }
            }
        }
    }
}


// Format - JEECUP Admission Details / Course Name Column
if (!$postName) {

    if (preg_match(
        '~<h6\b[^>]*>.*?JEECUP.*?Admission\s+Details.*?</h6>(.*)~is',
        $html,
        $sectionMatch
    )) {

        preg_match_all(
            '~<table\b[^>]*>.*?</table>~is',
            $sectionMatch[1],
            $tableMatches
        );

        foreach ($tableMatches[0] as $tableHtml) {

            preg_match_all(
                '~<tr\b[^>]*>(.*?)</tr>~is',
                $tableHtml,
                $rowMatches
            );

            if (count($rowMatches[1]) < 2) {
                continue;
            }

            // Header row mein Course Name column find karo
            preg_match_all(
                '~<(?:td|th)\b[^>]*>(.*?)</(?:td|th)>~is',
                $rowMatches[1][0],
                $headerCells
            );

            $courseColumn = null;

            foreach ($headerCells[1] as $index => $cellHtml) {

                $label = html_entity_decode(
                    strip_tags($cellHtml),
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                );

                $label = trim(preg_replace('/\s+/u', ' ', $label));

                if (strcasecmp($label, 'Course Name') === 0) {
                    $courseColumn = $index;
                    break;
                }
            }

            if ($courseColumn === null) {
                continue;
            }

            // Course Name column ki values nikalo
            $courseNames = [];

            for ($i = 1; $i < count($rowMatches[1]); $i++) {

                preg_match_all(
                    '~<(?:td|th)\b[^>]*>(.*?)</(?:td|th)>~is',
                    $rowMatches[1][$i],
                    $cells
                );

                if (isset($cells[1][$courseColumn])) {

                    $value = html_entity_decode(
                        strip_tags($cells[1][$courseColumn]),
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );

                    $value = trim(preg_replace('/\s+/u', ' ', $value));

                    if ($value !== '') {
                        $courseNames[] = $value;
                    }
                }
            }

            if (!empty($courseNames)) {

                $postName = implode(', ', array_unique($courseNames));

                $matchedFormat = 'JEECUP - Admission Details / Course Name';

                break;
            }
        }
    }
}



// Format - Overview Table / Position Label
if (!$postName) {

    $headings = $xpath->query(
        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'overview')]"
    );

    foreach ($headings as $heading) {

        $tables = $xpath->query("following::table[1]", $heading);

        if ($tables->length > 0) {

            $rows = $xpath->query('.//tr', $tables->item(0));

            foreach ($rows as $row) {

                $cells = $xpath->query('./td | ./th', $row);

                if ($cells->length >= 2) {

                    $label = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        $cells->item(0)->textContent
                    ));

                    if (strcasecmp($label, 'Position') === 0) {

                        $postName = trim(preg_replace(
                            '/\s+/u',
                            ' ',
                            $cells->item(1)->textContent
                        ));

                        if ($postName !== '') {
                            $matchedFormat = 'Overview - Position Label';
                            break 2;
                        }
                    }
                }
            }
        }
    }
}


// Format - Overview Table / Position Label
if (!$postName) {

    $headings = $xpath->query(
        "//h2[contains(translate(normalize-space(.), 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz'), 'overview')]"
    );

    foreach ($headings as $heading) {

        $tables = $xpath->query("following::table[1]", $heading);

        if ($tables->length > 0) {

            $rows = $xpath->query('.//tr', $tables->item(0));

            foreach ($rows as $row) {

                $cells = $xpath->query('./td | ./th', $row);

                if ($cells->length < 2) {
                    continue;
                }

                $label = trim(preg_replace(
                    '/\s+/u',
                    ' ',
                    $cells->item(0)->textContent
                ));

                if (strcasecmp($label, 'Position') === 0) {

                    $postName = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        $cells->item(1)->textContent
                    ));

                    if ($postName !== '') {
                        $matchedFormat = 'Overview - Position Label';
                        break 2;
                    }

                    $postName = null;
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
