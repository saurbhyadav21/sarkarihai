<?php

namespace App\Helpers;

class FreeJobAlertHelper
{
    public static function scrape($url)
    {
        /*
        Tumhara existing scraper code
        yahi shift hoga
        */

        return [
            'title' => '',
            'state' => '',
            'start_date' => '',
            'last_date' => '',
            'salary_min' => '',
            'salary_max' => '',
            'age_min' => '',
            'age_max' => '',
            'qualification' => '',
            'total_vacancy' => '',
            'official_website' => '',
            'sector' => '',
            'department' => '',
            'last_fee_date' => '',
            'correction_date' => '',
            'genral_fees' => '',
            'obc_fees' => '',
            'sc_fees' => '',
            'st_fees' => '',
            'extra_charge' => '',
            'max_age_genral' => '',
            'max_age_obc' => '',
            'max_age_sc_st' => '',
            'max_age_female' => '',
            'relaxation' => '',
            'genral_post' => '',
            'ews_post' => '',
            'obc_post' => '',
            'sc_post' => '',
            'st_post' => '',
            'Mode_Of_Selection' => '',
            'post_name' => '',
            'post_eligibility' => '',
            'post_salary' => '',
            'instruction' => '',
            'link' => '',
            'doc' => ''
        ];
    }


    public static function detect($title)
    {
        $title = strtolower($title);

        // RESULT
        if (
            strpos($title, 'result') !== false ||
            strpos($title, 'seat allotment') !== false ||
            strpos($title, 'merit list') !== false ||
            strpos($title, 'selection list') !== false ||
            strpos($title, 'score card') !== false
        )
            return 'result';

        // ADMIT CARD
        if (
            strpos($title, 'admit card') !== false ||
            strpos($title, 'hall ticket') !== false ||
            strpos($title, 'call letter') !== false
        )
            return 'admit_card';

        // ANSWER KEY
        if (
            strpos($title, 'answer key') !== false
        )
            return 'answer_key';

        // EXAM DATE
        if (
            strpos($title, 'exam date') !== false ||
            strpos($title, 'exam schedule') !== false
        )
            return 'exam_date';

        // INTERVIEW
        if (
            strpos($title, 'interview') !== false
        )
            return 'interview';

        // SYLLABUS
        if (
            strpos($title, 'syllabus') !== false
        )
            return 'syllabus';

        // JOB
        if (
            strpos($title, 'recruitment') !== false ||
            strpos($title, 'vacancy') !== false ||
            strpos($title, 'apply online') !== false ||
            strpos($title, 'apply offline') !== false ||
            strpos($title, 'walkin') !== false ||
            strpos($title, 'walk-in') !== false ||
            strpos($title, 'notification') !== false ||
            strpos($title, 'apprentice') !== false
        )
            return 'job';

        return 'other';
    }
}
