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

        if (strpos($title, 'admit card') !== false)
            return 'admit_card';

        if (strpos($title, 'answer key') !== false)
            return 'answer_key';

        if (strpos($title, 'result') !== false)
            return 'result';

        if (strpos($title, 'syllabus') !== false)
            return 'syllabus';

        if (strpos($title, 'exam date') !== false)
            return 'exam_date';

        if (strpos($title, 'interview') !== false)
            return 'interview';

        if (strpos($title, 'merit list') !== false)
            return 'merit_list';

        if (strpos($title, 'cut off') !== false)
            return 'cut_off';

        if (
            strpos($title, 'recruitment') !== false ||
            strpos($title, 'vacancy') !== false ||
            strpos($title, 'apply online') !== false ||
            strpos($title, 'apply offline') !== false
        )
            return 'job';

        return 'other';
    }
}
