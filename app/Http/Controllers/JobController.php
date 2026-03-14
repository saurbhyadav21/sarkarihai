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

        if (!$job) {
            abort(404); // Agar slug match na ho
        }

        return view('jobs.show', compact('job'));
    }

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
}
