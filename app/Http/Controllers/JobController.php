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
            'website' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $data = $request->all(); // pehle data lo
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = time() . '.' . $file->getClientOriginalExtension();
            // dd(public_path('job-images'), $name);
            $file->move(public_path('job-images'), $name);
        }

        $data['image'] = $name;
        Job::create($data);

        return redirect()->back()->with('success', 'Job added successfully!');
    }


    public function landing()
    {
        $jobs = Job::whereDate('end_date', '>=', now())
            ->orderBy('end_date', 'asc')

            ->get();

        $jobsxxx = Job::whereDate('end_date', '>=', now())
            ->orderBy('end_date', 'asc')
            ->limit(10)
            ->get();
        // dd($jobsxxx);
        $stateCounts = [];
        $jobs1 = Job::get();
        foreach ($jobs1 as $job) {

            // comma separated states ko array me convert karo
            $states = explode(',', $job->state);

            foreach ($states as $state) {
                $state = trim($state); // extra space remove

                if ($state == '') continue;

                // count increase
                if (isset($stateCounts[$state])) {
                    $stateCounts[$state]++;
                } else {
                    $stateCounts[$state] = 1;
                }
            }
        }

        // sort (optional)
        arsort($stateCounts);
        // dd($stateCounts);
        return view('welcome', compact('jobs', 'jobsxxx', 'stateCounts'));
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
        $job = Job::findOrFail($id);
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
            'website' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        // 🔥 image update logic
        if ($request->hasFile('image')) {
            // dd(public_path('job-images' . $job->image));
            // old image delete
            if ($job->image && file_exists(public_path('job-images/' . $job->image))) {
                unlink(public_path('job-images/' . $job->image));
            }

            // new image upload
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('job-images'), $name);

            $data['image'] = $name;
        }

        $job->update($data);

        return redirect()->back()->with('success', 'Job updated successfully!');
    }


    public function storeJson(Request $request)
    {
        // Validate JSON
        $request->validate([
            'job_json' => 'required|json'
        ]);

        // Decode JSON
        $json = json_decode($request->job_json, true);

        // Map fields
        $data = [
            'title'            => $json['title'] ?? null,
            'start_date'       => $json['start_date'] ?? null,
            'end_date'         => $json['last_date'] ?? null,
            'exam_date'        => $json['exam_date'] ?? null,
            'min_salary'       => $json['salary_min'] ?? null,
            'max_salary'       => $json['salary_max'] ?? null,
            'min_age'          => $json['age_min'] ?? null,
            'max_age_genral'   => $json['age_max'] ?? null,
            'total_vacancies'  => $json['total_vacancy'] ?? null,
            'post_eligibility' => $json['qualification'] ?? null,
            'website'          => $json['website'] ?? null,
        ];

        // Save
        Job::create($data);

        return back()->with('success', 'Job added via JSON!');
    }

    public function stateJobs($state)
    {
        $state = urldecode($state); // URL se decode

        $jobs = Job::get()
            ->filter(function ($job) use ($state) {
                $states = array_map('trim', explode(',', $job->state));
                return in_array($state, $states);
            });
        // dd($jobs);
        return view('jobs/state_jobs', compact('jobs', 'state'));
    }

    public function stateJobsPage()
    {
        $states = ['Uttar Pradesh', 'Bihar', 'Delhi', 'Maharashtra'];

        $categories = ['All', 'Railway', 'UPSC', 'Police'];

        $jobs = Job::whereDate('end_date', '>=', now())->get();

        return view('state_jobs', compact('states', 'categories', 'jobs'));
    }

    public function stateCategoryJobs($state = null, $category = null)
    {
        // Get all jobs
        $jobs = Job::all();

        // Get all unique states from jobs
        $states = Job::pluck('state')
            ->flatMap(fn($s) => explode(',', $s))
            ->map(fn($s) => strtolower(trim($s)))
            ->unique()
            ->sort()
            ->values();

        // Get all unique categories from jobs
        $categories = Job::pluck('category')
            ->map(fn($c) => strtolower(trim($c)))
            ->unique()
            ->sort()
            ->values();

        // Pass everything to the view
        return view('jobs/job_state_category', compact(
    'jobs',
    'states',
    'categories',
    'state',       // 👈 add karo
    'category'     // 👈 add karo
));
    }
}
