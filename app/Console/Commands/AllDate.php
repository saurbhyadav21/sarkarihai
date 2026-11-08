<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AllDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:all-date';

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
        ini_set('max_execution_time', 0);

        // Date keywords: यहां अपने keywords बढ़ा सकते हो
        $dateKeywords = [

            'start_date' => [
                'application start date',
                'online application start date',
                'online registration start date',
                'starting date',
                'start date',
                'apply online from',
                'online form start date',
                'commencement of online application',
                'date of commencement',
                'registration begins',
                'application begins',
                'form start date',
                'opening date',
            ],

            'end_date' => [
                'last date to apply',
                'last date for submission',
                'application end date',
                'online application end date',
                'closing date',
                'last date',
                'end date',
                'apply online last date',
                'last date of application',
                'submission last date',
                'application deadline',
                'registration closing date',
            ],

            'last_fee_date' => [
                'last date for fee payment',
                'last date to pay fee',
                'fee payment last date',
                'last date of fee submission',
                'last date for payment',
                'payment of fee last date',
                'fee last date',
                'exam fee last date',
                'application fee last date',
            ],

            'correction_date' => [
                'correction date',
                'correction window',
                'application correction date',
                'form correction date',
                'edit application date',
                'correction starts',
                'correction last date',
                'modification window',
                'edit window',
            ],

            'exam_date' => [
                'exam date',
                'examination date',
                'written examination date',
                'written exam date',
                'computer based test date',
                'cbt date',
                'tentative exam date',
                'exam schedule',
                'examination schedule',
                'date of examination',
                'test date',
            ],

            'result_date' => [
                'result date',
                'result declaration date',
                'result declared on',
                'date of result',
                'result announcement',
                'written result date',
                'final result date',
                'merit list date',
            ],

            'info_date' => [
                'information date',
                'information notice date',
                'notice date',
                'update date',
                'latest update',
                'date of information',
            ],

            'notification_date' => [
                'notification date',
                'official notification date',
                'advertisement date',
                'notification released on',
                'notification release date',
                'date of advertisement',
                'advertisement released',
                'publication date',
                'published on',
                'release date',
            ],

            'interview_date' => [
                'interview date',
                'interview schedule',
                'date of interview',
                'interview starts',
                'interview from',
                'personal interview date',
                'interview will be held',
            ],

            'walkin_date' => [
                'walk in interview date',
                'walk-in interview date',
                'walk in date',
                'walk-in date',
                'walkin interview',
                'walk in starts',
                'walk in from',
                'date of walk in interview',
            ],

            'important_date' => [
                'important dates',
                'important date',
                'important events',
                'schedule of events',
                'event dates',
                'important dates and events',
            ],
        ];

        $total = 0;
        $updated = 0;
        $failed = 0;

        DB::table('job_details')
            ->whereNotNull('source_url')
            ->where('source_url', '!=', '')
            ->orderBy('id')
            ->chunkById(50, function ($jobs) use (
                $dateKeywords,
                &$total,
                &$updated,
                &$failed
            ) {

                foreach ($jobs as $job) {

                    $total++;

                    try {

                        $url = trim($job->source_url);

                        if (!filter_var($url, FILTER_VALIDATE_URL)) {
                            continue;
                        }

                        $response = Http::timeout(25)
                            ->retry(2, 1000)
                            ->withHeaders([
                                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120 Safari/537.36',
                            ])
                            ->get($url);

                        if (!$response->successful()) {
                            $failed++;
                            continue;
                        }

                        $html = $response->body();

                        $dates = $this->extractDates(
                            $html,
                            $dateKeywords
                        );

                        if (!empty($dates)) {

                            DB::table('job_details')
                                ->where('id', $job->id)
                                ->update($dates);

                            $updated++;

                            $this->info(
                                "Updated ID: {$job->id} | " .
                                json_encode($dates)
                            );
                        }

                    } catch (\Throwable $e) {

                        $failed++;

                        $this->error(
                            "ID {$job->id}: " . $e->getMessage()
                        );
                    }
                }
            });

        $this->newLine();

        $this->info("Total Checked: {$total}");
        $this->info("Updated: {$updated}");
        $this->info("Failed: {$failed}");

        return Command::SUCCESS;
    }


    private function extractDates($html, $dateKeywords)
    {
        $found = [];

        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();

        $dom->loadHTML('<?xml encoding="UTF-8">' . $html);

        $xpath = new \DOMXPath($dom);

        // सभी table rows से label और value निकालना
        $rows = $xpath->query('//tr');

        foreach ($rows as $row) {

            $cells = [];

            foreach ($row->childNodes as $node) {

                if (
                    $node instanceof \DOMElement &&
                    in_array(strtolower($node->tagName), ['td', 'th'])
                ) {
                    $cells[] = trim($node->textContent);
                }
            }

            for ($i = 0; $i < count($cells) - 1; $i++) {

                $this->matchDate(
                    $cells[$i],
                    $cells[$i + 1],
                    $dateKeywords,
                    $found
                );
            }
        }

        // Paragraph और list वाले content से भी date निकालना
        $elements = $xpath->query('//p | //li | //dt');

        foreach ($elements as $element) {

            $text = trim(preg_replace(
                '/\s+/',
                ' ',
                $element->textContent
            ));

            $this->matchDate(
                $text,
                $text,
                $dateKeywords,
                $found,
                true
            );
        }

        libxml_clear_errors();

        return $found;
    }


    private function matchDate(
        $label,
        $value,
        $dateKeywords,
        &$found,
        $sameText = false
    ) {

        $normalized = strtolower(
            preg_replace('/[^a-z0-9]+/', ' ', $label)
        );

        // Specific keyword पहले match होगा
        foreach ($dateKeywords as $column => $keywords) {

            if (isset($found[$column])) {
                continue;
            }

            foreach ($keywords as $keyword) {

                $keyword = strtolower($keyword);

                if (!str_contains($normalized, $keyword)) {
                    continue;
                }

                if ($sameText) {

                    $position = stripos($value, $keyword);

                    $dateText = substr(
                        $value,
                        $position + strlen($keyword),
                        150
                    );

                } else {

                    $dateText = $value;
                }

                $date = $this->parseDate($dateText);

                if ($date) {
                    $found[$column] = $date;
                    break;
                }
            }
        }
    }


    private function parseDate($text)
    {
        $text = html_entity_decode(
            strip_tags($text),
            ENT_QUOTES | ENT_HTML5,
            'UTF-8'
        );

        $text = preg_replace('/\s+/', ' ', trim($text));

        $patterns = [
            // 08 October 2026
            '/\b\d{1,2}(?:st|nd|rd|th)?\s+[A-Za-z]{3,12},?\s+\d{4}\b/i',

            // October 08, 2026
            '/\b[A-Za-z]{3,12}\s+\d{1,2}(?:st|nd|rd|th)?,?\s+\d{4}\b/i',

            // 08-10-2026 / 08/10/2026
            '/\b\d{1,2}[-\/.]\d{1,2}[-\/.]\d{4}\b/',

            // 2026-10-08
            '/\b\d{4}-\d{2}-\d{2}\b/',
        ];

        foreach ($patterns as $pattern) {

            if (!preg_match($pattern, $text, $matches)) {
                continue;
            }

            $dateText = preg_replace(
                '/(\d)(st|nd|rd|th)\b/i',
                '$1',
                $matches[0]
            );

            try {

                if (preg_match('/^\d{4}-/', $dateText)) {

                    $date = Carbon::createFromFormat(
                        '!Y-m-d',
                        $dateText
                    );

                } elseif (preg_match('/^\d{1,2}[-\/.]/', $dateText)) {

                    $separator = preg_quote($dateText[2], '/');

                    $date = Carbon::createFromFormat(
                        '!d' . $dateText[2] . 'm' . $dateText[2] . 'Y',
                        $dateText
                    );

                } else {

                    $date = Carbon::parse($dateText);
                }

                if ($date && $date->year >= 2000 && $date->year <= 2100) {
                    return $date->format('Y-m-d');
                }

            } catch (\Throwable $e) {
                continue;
            }
        }

        return null;
    }
}
