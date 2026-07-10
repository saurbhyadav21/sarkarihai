<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateKeywords extends Command
{
    protected $signature = 'jobs:generate-keywords';

    protected $description = 'Generate keyword tables from master tables';

    public function handle()
    {
        $this->generateCategoryKeywords();

        $this->generateSubCategoryKeywords();

        $this->generateTopicKeywords();

        $this->generateStateKeywords();

        $this->generateOrganizationKeywords();

        $this->info('All Keyword Tables Generated Successfully.');
    }

    private function generateCategoryKeywords()
    {
        DB::table('job_category_keywords')->truncate();

        $rows = DB::table('job_categories')->where('status',1)->get();

        foreach($rows as $row){

            DB::table('job_category_keywords')->insert([
                'category_slug'=>$row->slug,
                'keyword'=>$row->slug,
                'weight'=>100,
                'status'=>1
            ]);

            DB::table('job_category_keywords')->insert([
                'category_slug'=>$row->slug,
                'keyword'=>str_replace(' Jobs','',$row->name),
                'weight'=>90,
                'status'=>1
            ]);
        }
    }

    private function generateSubCategoryKeywords()
    {
        DB::table('job_sub_category_keywords')->truncate();

        $rows=DB::table('job_sub_categories')->where('status',1)->get();

        foreach($rows as $row){

            DB::table('job_sub_category_keywords')->insert([
                'sub_category_slug'=>$row->slug,
                'keyword'=>$row->slug,
                'weight'=>100,
                'status'=>1
            ]);

            DB::table('job_sub_category_keywords')->insert([
                'sub_category_slug'=>$row->slug,
                'keyword'=>$row->name,
                'weight'=>100,
                'status'=>1
            ]);
        }
    }

    private function generateTopicKeywords()
    {
        DB::table('job_topic_keywords')->truncate();

        $rows=DB::table('job_topics')->get();

        foreach($rows as $row){

            DB::table('job_topic_keywords')->insert([
                'topic_slug'=>$row->slug,
                'keyword'=>$row->slug,
                'weight'=>100,
                'status'=>1
            ]);

            DB::table('job_topic_keywords')->insert([
                'topic_slug'=>$row->slug,
                'keyword'=>$row->name,
                'weight'=>100,
                'status'=>1
            ]);
        }
    }

    private function generateStateKeywords()
    {
        DB::table('job_state_keywords')->truncate();

        $rows=DB::table('job_states')->where('status',1)->get();

        foreach($rows as $row){

            DB::table('job_state_keywords')->insert([
                'state_slug'=>$row->slug,
                'keyword'=>$row->slug,
                'weight'=>100,
                'status'=>1
            ]);

            DB::table('job_state_keywords')->insert([
                'state_slug'=>$row->slug,
                'keyword'=>$row->name,
                'weight'=>100,
                'status'=>1
            ]);
        }
    }

    private function generateOrganizationKeywords()
    {
        DB::table('job_organization_keywords')->truncate();

        $rows=DB::table('job_organizations')->where('status',1)->get();

        foreach($rows as $row){

            DB::table('job_organization_keywords')->insert([
                'organization_slug'=>$row->slug,
                'keyword'=>$row->slug,
                'weight'=>100,
                'status'=>1
            ]);

            DB::table('job_organization_keywords')->insert([
                'organization_slug'=>$row->slug,
                'keyword'=>$row->name,
                'weight'=>100,
                'status'=>1
            ]);
        }
    }
}