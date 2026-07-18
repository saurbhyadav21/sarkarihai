<?php

namespace App\Helpers;

use DOMDocument;
use DOMXPath;

class FreeJobAlertHelper
{
    public static function scrape($url)
    {
        $html = @file_get_contents($url);

        if (!$html) {
            throw new \Exception('Unable to fetch URL: ' . $url);
        }

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $raw = [];

        /*
        TITLE
        */

        $h1 = $xpath->query('//h1');

        if ($h1->length) {
            $raw['title'] = trim(
                $h1->item(0)->textContent
            );
        }

        /*
        TABLES
        */

        $tables = $xpath->query('//table');

        foreach ($tables as $table) {

            $rows = $table->getElementsByTagName('tr');

            foreach ($rows as $tr) {

                $cells =
                    $tr->getElementsByTagName('td');

                if ($cells->length >= 2) {

                    $key = strtolower(
                        trim(
                            $cells
                                ->item(0)
                                ->textContent
                        )
                    );

                    $value = trim(
                        $cells
                            ->item(1)
                            ->textContent
                    );

                    $raw[$key] = $value;

                    $links =
                        $cells
                        ->item(1)
                        ->getElementsByTagName('a');

                    if ($links->length) {
                        $raw[$key . '_url'] =
                            $links
                            ->item(0)
                            ->getAttribute('href');
                    }
                }
            }
        }

        /*
        DATES
        */

        $start = self::findKey($raw, [
            'starting date',
            'starting date for apply online',
            'application start date',
            'notification date',
            'notification release date'
        ]);

        $last = self::findKey($raw, [
            'last date',
            'last date to apply',
            'last date for apply online',
            'closing date'
        ]);

        /*
        JSON
        */

        $json = [];

        // $json['title'] =
        //     $raw['title'] ?? '';

        // $json['state'] =
        //     self::getState(
        //         $raw['company name'] ?? ''
        //     );

        // if (!$json['state']) {
        //     $json['state'] =
        //         self::findKey($raw, [
        //             'job location',
        //             'location',
        //             'state',
        //             'place of posting'
        //         ]);
        // }

        // if (!$json['state']) {
        //     $json['state'] = 'All India';
        // }

        // $json['start_date'] =
        //     self::formatDate($start);

        // $json['last_date'] =
        //     self::formatDate($last);

        // $salary =
        //     $raw['salary'] ?? '';

        // $json['salary_min'] =
        //     self::getSalaryMin($salary);

        // $json['salary_max'] =
        //     self::getSalaryMax($salary);

        // $age =
        //     $raw['age limit'] ?? '';

        // $json['age_min'] =
        //     self::getAgeMin($age);

        // $json['age_max'] =
        //     self::getAgeMax($age);

        // $json['qualification'] =
        //     $raw['qualification'] ?? '';

        // $json['total_vacancy'] =
        //     $raw['no of posts'] ?? '';

        // $json['official_website'] =
        //     $raw['official website_url'] ?? '';

        // $json['sector'] =
        //     self::detectSector(
        //         $raw['company name'] ?? ''
        //     );

        // $json['department'] =
        //     $raw['company name'] ?? '';

        // $json['last_fee_date'] = '';
        // $json['correction_date'] = '';

        // $json['genral_fees'] = '';
        // $json['obc_fees'] = '';
        // $json['sc_fees'] = '';
        // $json['st_fees'] = '';

        // $json['extra_charge'] = '';

        // $json['max_age_genral'] =
        //     $json['age_max'];

        // $json['max_age_obc'] = '';
        // $json['max_age_sc_st'] = '';
        // $json['max_age_female'] = '';

        // $json['relaxation'] = '';

        // $post =
        //     $raw['post name'] ?? '';

        // $vacancy =
        //     $raw['no of posts'] ?? '';

        // $json['genral_post'] =
        //     $post . '$' . $vacancy;

        // $json['ews_post'] = '';
        // $json['obc_post'] = '';
        // $json['sc_post'] = '';
        // $json['st_post'] = '';

        // $json['Mode_Of_Selection'] = '';

        // $json['post_name'] =
        //     $post;

        // $json['post_eligibility'] =
        //     $json['qualification'];

        // $json['post_salary'] =
        //     $salary;

        // $json['instruction'] = '';

        // $json['link'] = '';

        // if (isset($raw['official website_url'])) {
        //     $json['link'] .=
        //         'Official Website$'
        //         . $raw['official website_url']
        //         . '#';
        // }

        // if (isset($raw['apply online_url'])) {
        //     $json['link'] .=
        //         'Apply Online$'
        //         . $raw['apply online_url']
        //         . '#';
        // }

        // if (isset($raw['official notification pdf_url'])) {
        //     $json['link'] .=
        //         'Notification PDF$'
        //         . $raw['official notification pdf_url']
        //         . '#';
        // }

        // $json['doc'] = '';

        // return $json;

        $json = [

            'title' => $raw['title'] ?? '',

            'slug' => strtolower(
                trim(
                    preg_replace(
                        '/[^a-z0-9]+/i',
                        '-',
                        $raw['title'] ?? ''
                    ),
                    '-'
                )
            ),

            'year' => date('Y'),

            'organization' =>
            $raw['company name']
                ?? '',

            'department' =>
            $raw['company name']
                ?? '',

            'sector' =>
            self::detectSector(
                $raw['company name']
                    ?? ''
            ),

            'sub_sector' => '',

            'state' =>
            self::getState(
                $raw['company name']
                    ?? ''
            ),

            'job_location' => '',

            'job_location_type' =>
            'Pan India',

            'job_type' =>
            $raw['job type']
                ?? '',

            'employment_type' =>
            'Regular',

            'notification_date' =>
            self::formatDate(
                self::findKey(
                    $raw,
                    [
                        'notification date',
                        'notification release date'
                    ]
                )
            ),

            'start_date' =>
            self::formatDate(
                $start
            ),

            'last_date' =>
            self::formatDate(
                $last
            ),

            'last_fee_date' => '',
            'correction_date' => '',
            'exam_date' => '',
            'admit_card_date' => '',
            'result_date' => '',
            'interview_date' => '',
            'walkin_date' => '',

            'total_vacancy' =>
            $raw['no of posts']
                ?? '',

            'salary_min' =>
            self::getSalaryMin(
                $raw['salary']
                    ?? ''
            ),

            'salary_max' =>
            self::getSalaryMax(
                $raw['salary']
                    ?? ''
            ),

            'salary_text' =>
            $raw['salary']
                ?? '',

            'pay_level' => '',

            'age_min' =>
            self::getAgeMin(
                $raw['age limit']
                    ?? ''
            ),

            'age_max' =>
            self::getAgeMax(
                $raw['age limit']
                    ?? ''
            ),

            'max_age_genral' =>
            self::getAgeMax(
                $raw['age limit']
                    ?? ''
            ),

            'max_age_obc' => '',
            'max_age_sc_st' => '',
            'max_age_female' => '',

            'relaxation' => '',

            'qualification' =>
            $raw['qualification']
                ?? '',

            'experience' =>
            'Fresher Eligible',

            'experience_years' => 0,

            'genral_fees' => '',
            'ews_fees' => '',
            'obc_fees' => '',
            'sc_fees' => '',
            'st_fees' => '',
            'ph_fees' => '',
            'female_fees' => '',
            'extra_charge' => '',

            'apply_mode' =>
            $raw['apply mode']
                ?? '',

            'Mode_Of_Selection' => '',

            'genral_post' => ($raw['post name'] ?? '')
                . '$'
                . ($raw['no of posts'] ?? '')
                . '#',

            'ews_post' => '',
            'obc_post' => '',
            'sc_post' => '',
            'st_post' => '',

            'post_name' => ($raw['post name']
                ?? '')
                . '#',

            'post_eligibility' => ($raw['qualification']
                ?? '')
                . '#',

            'post_salary' => ($raw['salary']
                ?? '')
                . '#',

            'post_age_limit' => (
                self::getAgeMin(
                    $raw['age limit']
                        ?? ''
                )
            )
                . '-'
                .
                (
                    self::getAgeMax(
                        $raw['age limit']
                            ?? ''
                    )
                )
                . ' Years#',

            'post_experience' =>
            'Fresher#',

            'application_process' =>
            '',

            'instruction' => '',

            'doc' => '',

            'advt_no' =>
            $raw['advt no']
                ?? '',

            'notification_number' =>
            $raw['advt no']
                ?? '',

            'official_website' =>
            $raw['official website_url']
                ?? '',

            'official_notification_pdf' =>
            $raw['official notification pdf_url']
                ?? '',

            'apply_online_link' =>
            $raw['apply online_url']
                ?? '',

            'answer_key_link' => '',
            'admit_card_link' => '',
            'result_link' => '',

            'link' => '',

            'reservation' => '',

            'important_dates' => '',

            'important_links' => '',

            'is_interview_only' => false,

            'is_exam_required' => true,

            'is_walkin' => false,

            'is_contractual' => false,

            'is_apprentice' => false,

            'status' => 'Active',




            'source' => 'FreeJobAlert',

            'source_url' => $url,

            'created_at' =>
            date('Y-m-d H:i:s'),

            'updated_at' =>
            date('Y-m-d H:i:s'),
        ];
        if (!$json['state']) {
            $json['state'] =
                self::findKey(
                    $raw,
                    [
                        'job location',
                        'location',
                        'state',
                        'place of posting'
                    ]
                );
        }

        if (!$json['state']) {
            $json['state'] = 'All India';
        }

        if (isset($raw['official website_url'])) {
            $json['link'] .=
                'Official Website$'
                . $raw['official website_url']
                . '#';
        }

        if (isset($raw['apply online_url'])) {
            $json['link'] .=
                'Apply Online$'
                . $raw['apply online_url']
                . '#';
        }

        if (isset($raw['official notification pdf_url'])) {
            $json['link'] .=
                'Official Notification PDF$'
                . $raw['official notification pdf_url']
                . '#';
        }

        $json['important_links']
            =
            $json['link'];
        $json['instruction']
            =
            self::defaultInstructions();


        $json['is_walkin']
            =
            stripos(
                $json['title'],
                'walk'
            ) !== false;

        $json['is_contractual']
            =
            stripos(
                $json['job_type'],
                'contract'
            ) !== false;

        $json['is_apprentice']
            =
            stripos(
                $json['title'],
                'apprentice'
            ) !== false;

        $json['is_interview_only']
            =
            stripos(
                $json['Mode_Of_Selection'],
                'Interview'
            ) !== false
            &&
            stripos(
                $json['Mode_Of_Selection'],
                'Exam'
            ) === false;



        $json['important_dates']
            =
            'Notification Date$'
            . $json['notification_date']
            . '#'
            . 'Apply Start Date$'
            . $json['start_date']
            . '#'
            . 'Last Date$'
            . $json['last_date']
            . '#';
        $fee =
            self::parseFees(
                implode(' ', $raw)
            );
        $json['reservation']
            =
            self::parseReservation(
                implode(' ', $raw)
            );
        $post =
            self::parsePost(
                $raw['post name'] ?? '',
                $raw['qualification'] ?? '',
                $raw['salary'] ?? '',
                $raw['age limit'] ?? ''
            );

        $json['Mode_Of_Selection']
            =
            self::detectSelection(
                implode(' ', $raw)
            );

        $json['important_dates'] = '';

        if ($json['notification_date']) {
            $json['important_dates']
                .=
                'Notification Date$'
                . $json['notification_date']
                . '#';
        }

        if ($json['start_date']) {
            $json['important_dates']
                .=
                'Apply Start Date$'
                . $json['start_date']
                . '#';
        }

        if ($json['last_date']) {
            $json['important_dates']
                .=
                'Last Date$'
                . $json['last_date']
                . '#';
        }

        $json['doc']
            =
            self::defaultDocuments();



        $json['important_links']
            =
            $json['link'];

        $json =
            array_merge(
                $json,
                $fee,
                $post
            );

        return $json;
    }

    public static function findKey($arr, $keys)
    {
        foreach ($keys as $key) {
            if (!empty($arr[$key])) {
                return $arr[$key];
            }
        }

        return '';
    }

    public static function formatDate($date)
    {
        if (!$date)
            return '';

        $t = strtotime($date);

        return $t
            ? date('Y-m-d', $t)
            : '';
    }

    public static function getSalaryMin($salary)
    {
        preg_match_all('/[\d,]+/', $salary, $m);

        return $m[0][0] ?? '';
    }

    public static function getSalaryMax($salary)
    {
        preg_match_all('/[\d,]+/', $salary, $m);

        return $m[0][1] ?? '';
    }

    public static function getAgeMin($age)
    {
        preg_match_all('/\d+/', $age, $m);

        return $m[0][0] ?? '';
    }

    public static function getAgeMax($age)
    {
        preg_match_all('/\d+/', $age, $m);

        return end($m[0]) ?: '';
    }

    public static function getState($org)
    {
        $org = strtolower($org);

        $states = [
            'uttarakhand' => 'Uttarakhand',
            'delhi' => 'Delhi',
            'punjab' => 'Punjab',
            'haryana' => 'Haryana',
            'rajasthan' => 'Rajasthan',
            'maharashtra' => 'Maharashtra',
            'assam' => 'Assam',
        ];

        foreach ($states as $k => $v) {
            if (strpos($org, $k) !== false)
                return $v;
        }

        return '';
    }

    public static function detectSector($company)
    {
        $company = strtolower($company);

        if (strpos($company, 'bank') !== false)
            return 'Bank';

        if (strpos($company, 'railway') !== false)
            return 'Railway';

        if (strpos($company, 'drdo') !== false)
            return 'Defence';

        if (strpos($company, 'aiims') !== false)
            return 'Medical';

        return 'Government';
    }


    public static function detect($title)
    {
        $title = strtolower(trim($title));

        $result = [
            'result',
            'seat allotment',
            'merit list',
            'score card',
            'selected candidates',
            'selection list'
        ];

        foreach ($result as $v) {
            if (str_contains($title, $v))
                return 'result';
        }

        $admit = [
            'admit card',
            'hall ticket',
            'call letter'
        ];

        foreach ($admit as $v) {
            if (str_contains($title, $v))
                return 'admit_card';
        }

        $answer = [
            'answer key',
            'response sheet'
        ];

        foreach ($answer as $v) {
            if (str_contains($title, $v))
                return 'answer_key';
        }

        $exam = [
            'exam date',
            'exam schedule'
        ];

        foreach ($exam as $v) {
            if (str_contains($title, $v))
                return 'exam_date';
        }

        $job = [
            'recruitment',
            'vacancy',
            'apply online',
            'apply offline',
            'walkin',
            'walk-in',
            'apprentice',
            'notification'
        ];

        foreach ($job as $v) {
            if (str_contains($title, $v))
                return 'job';
        }

        return 'other';
    }



    public static function parseFees($text)
    {
        $fees = [
            'genral_fees' => '',
            'ews_fees' => '',
            'obc_fees' => '',
            'sc_fees' => '',
            'st_fees' => '',
            'ph_fees' => '',
            'female_fees' => '',
            'extra_charge' => ''
        ];

        preg_match('/UR.*?(\d+)/i', $text, $m);
        if (isset($m[1])) {
            $fees['genral_fees'] = $m[1];
            $fees['ews_fees'] = $m[1];
            $fees['obc_fees'] = $m[1];
            $fees['female_fees'] = $m[1];
        }

        preg_match('/SC.*?(\d+)/i', $text, $m);
        if (isset($m[1]))
            $fees['sc_fees'] = $m[1];

        preg_match('/ST.*?(\d+)/i', $text, $m);
        if (isset($m[1]))
            $fees['st_fees'] = $m[1];

        preg_match('/PwBD.*?(\d+)/i', $text, $m);
        if (isset($m[1]))
            $fees['ph_fees'] = $m[1];

        return $fees;
    }


    public static function parseReservation($text)
    {
        $r = '';

        preg_match('/UR\s*[:\-]?\s*(\d+)/i', $text, $m);
        if (isset($m[1]))
            $r .= 'UR:' . $m[1] . '#';

        preg_match('/EWS\s*[:\-]?\s*(\d+)/i', $text, $m);
        if (isset($m[1]))
            $r .= 'EWS:' . $m[1] . '#';

        preg_match('/OBC\s*[:\-]?\s*(\d+)/i', $text, $m);
        if (isset($m[1]))
            $r .= 'OBC:' . $m[1] . '#';

        preg_match('/SC\s*[:\-]?\s*(\d+)/i', $text, $m);
        if (isset($m[1]))
            $r .= 'SC:' . $m[1] . '#';

        preg_match('/ST\s*[:\-]?\s*(\d+)/i', $text, $m);
        if (isset($m[1]))
            $r .= 'ST:' . $m[1] . '#';

        return $r;
    }


    public static function detectSelection($text)
    {
        $sel = [];

        if (stripos($text, 'written') !== false)
            $sel[] = 'Written Exam';

        if (stripos($text, 'cbt') !== false)
            $sel[] = 'Computer Based Test';

        if (stripos($text, 'interview') !== false)
            $sel[] = 'Interview';

        if (stripos($text, 'skill') !== false)
            $sel[] = 'Skill Test';

        if (stripos($text, 'medical') !== false)
            $sel[] = 'Medical Examination';

        if (stripos($text, 'document') !== false)
            $sel[] = 'Document Verification';

        return implode(', ', $sel);
    }



    public static function parsePost(
        $post,
        $qualification,
        $salary,
        $age
    ) {
        return [

            'post_name' =>
            $post . '#',

            'post_eligibility' =>
            $qualification . '#',

            'post_salary' =>
            $salary . '#',

            'post_age_limit' =>
            $age . '#',

            'post_experience' =>
            'Fresher#'
        ];
    }


    public static function parseCategoryVacancy($text)
    {
        $out = [];

        $cats = [
            'UR',
            'GEN',
            'GENERAL',
            'EWS',
            'OBC',
            'SC',
            'ST'
        ];

        foreach ($cats as $cat) {
            preg_match(
                '/' . $cat . '\s*[:\-]?\s*(\d+)/i',
                $text,
                $m
            );

            if (isset($m[1])) {
                $key = strtoupper($cat);

                if ($key == 'GENERAL')
                    $key = 'UR';

                if ($key == 'GEN')
                    $key = 'UR';

                $out[$key] = $m[1];
            }
        }

        $str = '';

        foreach ($out as $k => $v) {
            $str .= $k . ':' . $v . '#';
        }

        return $str;
    }


    public static function parsePosts($rows)
    {
        $post_name = '';
        $post_eligibility = '';
        $post_salary = '';
        $post_age = '';
        $post_exp = '';

        foreach ($rows as $r) {
            $post_name
                .= trim($r['name']) . '#';

            $post_eligibility
                .= trim($r['qualification']) . '#';

            $post_salary
                .= trim($r['salary']) . '#';

            $post_age
                .= trim($r['age']) . '#';

            $post_exp
                .= trim($r['experience']) . '#';
        }

        return [
            'post_name' => $post_name,
            'post_eligibility' => $post_eligibility,
            'post_salary' => $post_salary,
            'post_age_limit' => $post_age,
            'post_experience' => $post_exp
        ];
    }


    public static function buildCategoryPosts(
        $post,
        $cats
    ) {
        return [

            'genral_post' =>
            isset($cats['UR'])
                ? $post . '$' . $cats['UR'] . '#'
                : '',

            'ews_post' =>
            isset($cats['EWS'])
                ? $post . '$' . $cats['EWS'] . '#'
                : '',

            'obc_post' =>
            isset($cats['OBC'])
                ? $post . '$' . $cats['OBC'] . '#'
                : '',

            'sc_post' =>
            isset($cats['SC'])
                ? $post . '$' . $cats['SC'] . '#'
                : '',

            'st_post' =>
            isset($cats['ST'])
                ? $post . '$' . $cats['ST'] . '#'
                : ''
        ];
    }


    public static function defaultDocuments()
    {
        return
            'Photograph-Recent passport size photograph.#'
            . 'Signature-Candidate signature.#'
            . 'Identity Proof-Aadhaar Card, PAN Card, Voter ID or Passport.#'
            . 'Educational Certificates-All educational certificates and marksheets.#'
            . 'Category Certificate-SC/ST/OBC/EWS certificate if applicable.#'
            . 'Experience Certificate-If required in notification.#';
    }


    public static function defaultInstructions()
    {
        return
            'Read official notification carefully before applying.#'
            . 'Keep photograph and signature ready.#'
            . 'Fill application form carefully.#'
            . 'Upload required documents.#'
            . 'Pay application fee if applicable.#'
            . 'Verify all details before final submit.#'
            . 'Take printout of submitted application.#';
    }



    public static function detectUrlType($post)
    {
        $title = strtolower(
            html_entity_decode(
                $post['title']['rendered'] ?? ''
            )
        );

        // category ids
        $cats = $post['categories'] ?? [];

        // title based detection
        if (
            str_contains($title, 'result')
            || str_contains($title, 'final result')
        ) {
            return 'result';
        }

        if (
            str_contains($title, 'admit card')
            || str_contains($title, 'hall ticket')
        ) {
            return 'admit-card';
        }

        if (
            str_contains($title, 'answer key')
        ) {
            return 'answer-key';
        }

        if (
            str_contains($title, 'syllabus')
        ) {
            return 'syllabus';
        }

        if (
            str_contains($title, 'exam date')
        ) {
            return 'exam-date';
        }

        if (
            str_contains($title, 'admission')
        ) {
            return 'admission';
        }

        if (
            str_contains($title, 'recruitment')
            || str_contains($title, 'apply online')
            || str_contains($title, 'apply offline')
            || str_contains($title, 'vacancy')
        ) {
            return 'job';
        }

        return 'other';
    }


   public static function sendTelegramJob($job)
    {

        $message = "🚨 New Government Job Alert\n\n";

        $message .= "📌 " . $job->title . "\n";

        $message .= "🏢 " . $job->organization . "\n";

        $message .= "📅 Last Date: " . $job->last_date . "\n\n";

        $message .= "Apply Now:\n";

        $message .= "https://sarkarihai.com/job/" . $job->slug;


        Http::post(
            "https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage",
            [
                'chat_id' => env('TELEGRAM_CHANNEL'),
                'text' => $message,
                'parse_mode' => 'HTML'
            ]
        );
    }
}
