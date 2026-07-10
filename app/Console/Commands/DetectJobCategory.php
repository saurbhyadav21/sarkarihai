<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobDetail;
use Illuminate\Support\Facades\DB;

class DetectJobCategory extends Command
{
    protected $signature = 'jobs:detect-category';

    protected $description = 'Detect Job Category from Title';

    public function handle()
    {
        $jobs = DB::table('job_details')
            // ->where('classification_cron_status', 0)
            ->limit(3000)
            ->get();

        foreach ($jobs as $job) {

            $title = strtolower($job->title);

            $category = $this->detectCategory($title);

            // $subCategory = $this->detectSubCategory($title);

            // $topic = $this->detectTopic($title);

            // $state = $this->detectState($title);

            // $organization = $this->detectOrganization($title);

            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'category'                     => $category,
                    // 'job_sub_categories'          => $subCategory,
                    // 'job_topics'                  => $topic,
                    // 'organization'                => $organization,
                    // 'state'                       => $state,
                    'classification_cron_status'  => 1,
                ]);
        }
    }

    private function detectByKeywords($title, $table, $slugField)
    {
        $title = strtolower($title);

        $keywords = DB::table($table)
            ->where('status', 1)
            ->orderByDesc('weight')
            ->get();

        $scores = [];

        foreach ($keywords as $row) {

            $keyword = strtolower(trim($row->keyword));

            if ($keyword == '') {
                continue;
            }

            if (str_contains($title, $keyword)) {

                if (!isset($scores[$row->$slugField])) {
                    $scores[$row->$slugField] = 0;
                }

                $scores[$row->$slugField] += (int)$row->weight;
            }
        }

        if (empty($scores)) {
            return null;
        }

        arsort($scores);

        return array_key_first($scores);
    }

    private function detectCategory($title)
    {
        return $this->detectByKeywords(
            $title,
            'job_category_keywords',
            'category_slug'
        );
    }

    private function detectSubCategory($title)
    {
        return $this->detectByKeywords(
            $title,
            'job_sub_category_keywords',
            'sub_category_slug'
        );
    }


    private function detectTopic($title)
    {
        return $this->detectByKeywords(
            $title,
            'job_topic_keywords',
            'topic_slug'
        );
    }


    private function detectState($title)
    {
        return $this->detectByKeywords(
            $title,
            'job_state_keywords',
            'state_slug'
        );
    }


    private function detectOrganization($title)
    {
        return $this->detectByKeywords(
            $title,
            'job_organization_keywords',
            'organization_slug'
        );
    }
}
