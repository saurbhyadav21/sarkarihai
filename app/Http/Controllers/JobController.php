<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Make sure you have a Job model
use Illuminate\Support\Str;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all(); // Database se sabhi jobs
        return view('jobs.index', compact('jobs'));
    }

    // Single job show
    public function show($slug)
    {
        // Sabhi jobs ke saath slug generate kar ke match kare
        $job = Job::all()->firstWhere(fn($j) => Str::slug($j->title, '-') === $slug);
        $seo = [
            'title' => $job->title . ' - ' . $job->total_vacancies . ' Posts | Apply Online, Eligibility, Last Date, Salary',
            'description' => 'Apply online for ' . $job->title . ' for ' . $job->total_vacancies . ' posts. Check eligibility, application fee, age limit, important dates and direct apply link.',



            'keywords' => $job->title . ', ' . $job->title . ' vacancy ' . ', ' . $job->title . ' apply online, ' .
                $job->title . ' notification ' . ', ' . $job->category . ' recruitment'



        ];


        if (!$job) {
            abort(404); // Agar slug match na ho
        }

        return view('jobs.show', compact('job', 'seo'));
    }
    //     public function show($slug)
    // {
    //     $job = Job::where('slug',$slug)->firstOrFail();

    //     $seo = [
    //         'title' => $job->title.' Recruitment '.$job->year.' – '.$job->vacancy.' Posts | Apply Online',
    //         'description' => 'Apply online for '.$job->title.' Recruitment '.$job->year.'. Check vacancy details, eligibility, age limit, important dates and direct apply link.',
    //         'keywords' => $job->title.' recruitment '.$job->year.', railway jobs, apprentice jobs'
    //     ];

    //     return view('jobs.show', compact('job','seo'));
    // }

    // Show insert form
    public function create()
    {
        return view('job_insert'); // your blade file
    }

    // Store data
    public function store(Request $request)
    {
        // Validation (optional but recommended)
        $request->validate([
            'title' => 'required|string',
            'desce' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'last_fee_date' => 'nullable|string',
            'correction_date' => 'nullable|string',
            'exam_date' => 'nullable|string',
            'admit_card' => 'nullable|string',
            'result_date' => 'nullable|string',
            'info_date' => 'nullable|string',
            'genral_fees' => 'nullable|string',
            'obc_fees' => 'nullable|string',
            'sc_fees' => 'nullable|string',
            'st_fees' => 'nullable|string',
            'min_age' => 'nullable|string',
            'max_age_genral' => 'nullable|string',
            'max_age_obc' => 'nullable|string',
            'max_age_sc_st' => 'nullable|string',
            'max_age_female' => 'nullable|string',
            'total_vacancies' => 'nullable|string',
            'min_salary' => 'nullable|string',
            'max_salary' => 'nullable|string',
            'mode_selection' => 'nullable|string',
            'post_name' => 'nullable|string',
            'post_eligibility' => 'nullable|string',
            'post_salary' => 'nullable|string',
            'instruction' => 'nullable|string',
            'link' => 'nullable|string',
            'doc' => 'nullable|string',
        ]);

        // Create new record
        Job::create($request->all());

        return redirect()->back()->with('success', 'Job added successfully!');
    }


    public function landing()
    {
        $jobs = Job::all(); // Sabhi jobs fetch karo
        return view('welcome', compact('jobs'));
    }

    public function contact()
    {
        $seo = [
            'title' => 'disclaimer',
            'description' => 'disclaimer',



            'keywords' => 'dd'
        ];
        return view('contact', compact('seo'));
    }

    public function privacy()
    {
        $seo = [
            'title' => 'disclaimer',
            'description' => 'disclaimer',



            'keywords' => 'dd'
        ];
        return view('privacy', compact('seo'));
    }

    public function disclaimer()
    {
        $seo = [
            'title' => 'disclaimer',
            'description' => 'disclaimer',



            'keywords' => 'dd'



        ];
        return view('disclaimer', compact('seo'));
    }

    public function policy()
    {
        $seo = [
            'title' => 'disclaimer',
            'description' => 'disclaimer',



            'keywords' => 'dd'



        ];
        return view('policy', compact('seo'));
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs/job_edit', compact('job'));
    }

    public function editList()
    {
        $jobs = Job::latest()->get();
        return view('jobs/job_edit_list', compact('jobs'));
    }


    // Update Data
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'desce' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'last_fee_date' => 'nullable|string',
            'correction_date' => 'nullable|string',
            'exam_date' => 'nullable|string',
            'admit_card' => 'nullable|string',
            'result_date' => 'nullable|string',
            'info_date' => 'nullable|string',
            'genral_fees' => 'nullable|string',
            'obc_fees' => 'nullable|string',
            'sc_fees' => 'nullable|string',
            'st_fees' => 'nullable|string',
            'extra_charge' => 'nullable|string',
            'min_age' => 'nullable|string',
            'max_age_genral' => 'nullable|string',
            'max_age_obc' => 'nullable|string',
            'max_age_sc_st' => 'nullable|string',
            'max_age_female' => 'nullable|string',
            'relaxation' => 'nullable|string',
            'genral_post' => 'nullable|string',
            'ews_post' => 'nullable|string',
            'obc_post' => 'nullable|string',
            'sc_post' => 'nullable|string',
            'st_post' => 'nullable|string',
            'total_vacancies' => 'nullable|string',
            'min_salary' => 'nullable|string',
            'max_salary' => 'nullable|string',
            'mode_selection' => 'nullable|string',
            'post_name' => 'nullable|string',
            'post_eligibility' => 'nullable|string',
            'min_qulification' => 'nullable|string',
            'post_salary' => 'nullable|string',
            'instruction' => 'nullable|string',
            'link' => 'nullable|string',
            'doc' => 'nullable|string',
        ]);

        $job = Job::findOrFail($id);

        // Update only allowed fields
        $job->update($request->only([
            'title',
            'desce',
            'start_date',
            'end_date',
            'last_fee_date',
            'correction_date',
            'exam_date',
            'admit_card',
            'result_date',
            'info_date',
            'genral_fees',
            'obc_fees',
            'sc_fees',
            'st_fees',
            'min_age',
            'extra_charge',
            'max_age_genral',
            'max_age_obc',
            'max_age_sc_st',
            'max_age_female',
            'relaxation',
            'genral_post',
            'ews_post',
            'obc_post',
            'sc_post',
            'st_post',
            'total_vacancies',
            'min_salary',
            'max_salary',
            'mode_selection',
            'post_name',
            'post_eligibility',
            'min_qulification',
            'post_salary',
            'instruction',
            'link',
            'doc'
        ]));

        return redirect()->back()->with('success', 'Job Updated Successfully');
    }
}
