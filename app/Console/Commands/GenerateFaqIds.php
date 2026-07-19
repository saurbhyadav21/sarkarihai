<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateFaqIds extends Command
{
    protected $signature = 'faq:generate-ids';

    protected $description = 'Generate random FAQ IDs for one job';

    public function handle()
    {
        // Ek pending job uthao
        $job = DB::table('job_details')
            ->where(function ($q) {
                $q->whereNull('faq_question_numbering')
                    ->orWhere('faq_question_numbering', '');
            })
            ->orderBy('id')
            ->first();

        if (!$job) {
            $this->info('All jobs already updated.');
            return;
        }

        // Sab FAQ IDs
        $faqIds = DB::table('faq_templates')
            ->pluck('id')
            ->toArray();

        if (count($faqIds) < 8) {
            $this->error('Minimum 8 FAQ templates required.');
            return;
        }

        $attempt = 0;

        do {

            $attempt++;

            $temp = $faqIds;

            shuffle($temp);

            $selected = array_slice($temp, 0, 8);

            // sort() nahi karna
            $combination = implode(',', $selected);

            $exists = DB::table('job_details')
                ->where('faq_question_numbering', $combination)
                ->exists();
        } while ($exists && $attempt < 100);

        if ($exists) {
            $this->error('Unique FAQ combination not found.');
            return;
        }

        DB::table('job_details')
            ->where('id', $job->id)
            ->update([
                'faq_question_numbering' => $combination
            ]);

        $this->info("Updated Job ID : {$job->id}");
        $this->line("FAQ IDs : {$combination}");
    }
}
