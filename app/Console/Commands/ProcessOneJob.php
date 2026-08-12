<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobFeed;
use App\Helpers\FreeJobAlertHelper;
use Illuminate\Support\Facades\DB;

class ProcessOneJob extends Command
{
    protected $signature = 'jobs:process-one';

    protected $description =
    'Process one pending job';

    public function handle()
    {
        $feed = JobFeed::where(
            'scrape_status',
            'pending'
        )
            ->where(
                'url_type',
                'job'
            )
            ->where(
                'source',
                'FreeJobAlert'
            )
            ->orderBy('id')
            ->first();

        if (!$feed) {
            $this->error(
                'No pending jobs found'
            );
            return;
        }

        /*
DEBUG
*/

        $this->info(
            'Processing Feed'
        );

        $this->line(
            'ID        : ' . $feed->id
        );

        $this->line(
            'URL TYPE  : ' . $feed->url_type
        );

        $this->line(
            'TITLE     : ' . $feed->title
        );

        $this->line(
            'URL       : ' . $feed->url
        );

        $this->line(
            'STATUS    : ' . $feed->scrape_status
        );

        try {

            /*
            SARKARI RESULT JSON
            */
            // if ($feed->source == 'sarkariresult.com.cm') {

            //     $this->info('Processing JSON Source');

            //     $json = json_decode(
            //         $feed->raw_json,
            //         true
            //     );

            //     // yaha baad me apna
            //     // SarkariResult parser likhoge

            //     dd($json);

            //     return;
            // }


            /*
    FREEJOBALERT SCRAPING
    */

                $json =
                    FreeJobAlertHelper::scrape(
                        $feed->url
                    );

                   
                DB::table('job_details')
                    ->updateOrInsert(

                        [
                            // unique condition
                            'source_url' =>
                            $json['source_url']
                        ],

                        [

                            'title' =>
                            $json['title'],

                            // 'state' =>
                            // $json['state'],
                            'state' =>
                            'All Indiax',

                            'start_date' =>
                            $json['start_date'],

                            'end_date' =>
                            $json['last_date'],

                            'last_fee_date' =>
                            $json['last_fee_date'],

                            'correction_date' =>
                            $json['correction_date'],

                            'exam_date' =>
                            $json['exam_date'],

                            'info_date' =>
                            $json['notification_date'],

                            'genral_fees' =>
                            $json['genral_fees'],

                            'obc_fees' =>
                            $json['obc_fees'],

                            'sc_fees' =>
                            $json['sc_fees'],

                            'st_fees' =>
                            $json['st_fees'],

                            'extra_charge' =>
                            $json['extra_charge'],

                            'min_age' =>
                            $json['age_min'],

                            'max_age_genral' =>
                            $json['max_age_genral'],

                            'max_age_obc' =>
                            $json['max_age_obc'],

                            'max_age_sc_st' =>
                            $json['max_age_sc_st'],

                            'max_age_female' =>
                            $json['max_age_female'],

                            'relaxation' =>
                            $json['relaxation'],

                            'total_vacancies' =>
                            $json['total_vacancy'],

                            'min_salary' =>
                            $json['salary_min'],

                            'max_salary' =>
                            $json['salary_max'],

                            'genral_post' =>
                            $json['genral_post'],

                            'ews_post' =>
                            $json['ews_post'],

                            'obc_post' =>
                            $json['obc_post'],

                            'sc_post' =>
                            $json['sc_post'],

                            'st_post' =>
                            $json['st_post'],

                            'mode_selection' =>
                            $json['Mode_Of_Selection'],

                            'post_name' =>
                            $json['post_name'],

                            'post_eligibility' =>
                            $json['post_eligibility'],

                            'post_salary' =>
                            $json['post_salary'],

                            'instruction' =>
                            $json['instruction'],

                            'doc' =>
                            $json['doc'],

                            'link' =>
                            $json['link'],

                            'website' =>
                            $json['official_website'],


                            'source' =>
                            'freejobalert',

                            'updated_at' =>
                            now(),

                            'created_at' =>
                            now()
                        ]
                    );


                // FreeJobAlertHelper::sendTelegramJob($json);

                echo "\n";
                echo "SCRAPED JSON\n";
                echo "====================\n";

                echo json_encode(
                    $json,
                    JSON_PRETTY_PRINT |
                        JSON_UNESCAPED_UNICODE
                );

                echo "\n";

                $feed->scrape_status =
                    'completed';

                $feed->save();

                $this->info(
                    'DONE'
                );
            
        } catch (\Exception $e) {
            $feed->scrape_status =
                'failed';

            $feed->save();

            $this->error(
                $e->getMessage()
            );
        }
    }
}
