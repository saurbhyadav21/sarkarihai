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
}
