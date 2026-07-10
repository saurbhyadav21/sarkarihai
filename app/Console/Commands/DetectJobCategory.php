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
            ->where('category_cron_status', 0)
            ->limit(500)
            ->get();

        foreach ($jobs as $job) {

            $category = $this->detectCategory($job->title);

            DB::table('job_details')
                ->where('id', $job->id)
                ->update([
                    'category' => $category,
                    'category_cron_status' => 1,
                ]);

            $this->line("ID: {$job->id} => {$category}");
        }

        $this->info('Category Detection Completed Successfully.');
    }

    private function detectCategory($title)
    {
        $title = strtolower($title);

        $categories = [

            'railway' => [
                'railway' => 100,
                'indian railway' => 100,
                'rrb' => 100,
                'rrc' => 100,
                'rail coach' => 80,
                'metro rail' => 80,
                'locomotive' => 60,
                'rail' => 20
            ],

            'ssc' => [
                'ssc' => 100,
                'cgl' => 90,
                'chsl' => 90,
                'mts' => 80,
                'gd' => 80,
                'selection post' => 90,
                'stenographer' => 80,
                'je' => 40,
                'jht' => 80,
                'cpo' => 80
            ],

            'upsc' => [
                'upsc' => 100,
                'civil services' => 100,
                'ias' => 90,
                'ips' => 90,
                'ifs' => 90,
                'nda' => 90,
                'cds' => 90,
                'cms' => 80,
                'engineering services' => 95,
                'ese' => 90
            ],

            'banking' => [
                'ibps' => 100,
                'sbi' => 100,
                'rbi' => 100,
                'nabard' => 100,
                'bank of baroda' => 100,
                'bank of india' => 100,
                'union bank' => 100,
                'canara bank' => 100,
                'indian bank' => 100,
                'bank' => 40
            ],

            'defence' => [
                'army' => 100,
                'navy' => 100,
                'air force' => 100,
                'agniveer' => 100,
                'bsf' => 100,
                'crpf' => 100,
                'cisf' => 100,
                'itbp' => 100,
                'ssb' => 100,
                'assam rifles' => 100,
                'coast guard' => 100
            ],

            'police' => [
                'police' => 100,
                'constable' => 60,
                'sub inspector' => 80,
                'si' => 60,
                'inspector' => 60,
                'fireman' => 50,
                'home guard' => 70,
                'jail' => 50
            ],

            'teaching' => [
                'teacher' => 100,
                'assistant professor' => 100,
                'professor' => 90,
                'lecturer' => 90,
                'faculty' => 80,
                'principal' => 80,
                'pgt' => 90,
                'tgt' => 90,
                'prt' => 90
            ],

            'engineering' => [
                'engineer' => 25,
                'engineering' => 25,
                'junior engineer' => 35,
                'assistant engineer' => 35,
                'ae' => 20,
                'civil engineer' => 40,
                'electrical engineer' => 40,
                'mechanical engineer' => 40
            ],

            'medical' => [
                'doctor' => 100,
                'medical' => 90,
                'staff nurse' => 100,
                'nursing' => 90,
                'pharmacist' => 100,
                'anm' => 90,
                'gnm' => 90,
                'lab technician' => 70,
                'medical officer' => 100
            ],

            'research' => [
                'scientist' => 100,
                'research' => 90,
                'jrf' => 100,
                'srf' => 100,
                'research associate' => 100,
                'isro' => 100,
                'drdo' => 100,
                'csir' => 100,
                'icar' => 100,
                'icmr' => 100
            ],

            'court' => [
                'high court' => 100,
                'supreme court' => 100,
                'district court' => 100,
                'court' => 70,
                'judge' => 80
            ],

            'university' => [
                'university' => 100,
                'college' => 40,
                'iit' => 100,
                'nit' => 100,
                'iiit' => 100,
                'iim' => 100,
                'aiims' => 80
            ],

            'psu' => [
                'ntpc' => 100,
                'ongc' => 100,
                'bhel' => 100,
                'sail' => 100,
                'iocl' => 100,
                'gail' => 100,
                'powergrid' => 100,
                'bel' => 100,
                'hal' => 100,
                'nhpc' => 100
            ],

            'central-govt' => [
                'central government' => 100
            ],

            'state-govt' => [
                'state government' => 100
            ],

            'apprentice' => [
                'trade apprentice' => 100,
                'graduate apprentice' => 100,
                'technician apprentice' => 100,
                'apprentice' => 80
            ],

            'private' => [
                'private' => 100
            ]

        ];

        $scores = [];

        foreach ($categories as $slug => $keywords) {

            $scores[$slug] = 0;

            foreach ($keywords as $keyword => $weight) {

                if (str_contains($title, $keyword)) {

                    $scores[$slug] += $weight;
                }
            }
        }

        arsort($scores);

        $bestSlug = array_key_first($scores);

        if ($scores[$bestSlug] == 0) {
            return 'other';
        }

        return $bestSlug;
    }
}
