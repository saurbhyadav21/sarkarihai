<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Make sure you have a Job model
use App\Models\State; // Make sure you have a Job model
use App\Models\Category; // Make sure you have a Job model
use App\Models\Mineducation; // Make sure you have a Job model
use App\Models\AdmitCard; // Make sure you have a Job model
use App\Models\Result; // Make sure you have a Job model
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
        // Job fetch
        $job = Job::all()->firstWhere(fn($j) => Str::slug($j->title, '-') === $slug);

        if (!$job) {
            abort(404);
        }

        // ✅ Admit Card fetch using job_id
        $admitCard = \App\Models\AdmitCard::where('job_id', $job->id)->first();

        // ✅ Lock condition

        // SEO
        $seo = [
            'title' => $job->title . ' - ' . $job->total_vacancies . ' Posts | Apply Online, Eligibility, Last Date, Salary',
            'description' => 'Apply online for ' . $job->title . ' for ' . $job->total_vacancies . ' posts. Check eligibility, application fee, age limit, important dates and direct apply link.',
            'keywords' => $job->title . ', ' . $job->title . ' vacancy, ' . $job->title . ' apply online, ' . $job->title . ' notification, ' . $job->category . ' recruitment'
        ];

        return view('jobs.show', compact('job', 'seo', 'admitCard'));
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
        $pastJobs = Job::whereNotNull('end_date')
            ->whereDate('end_date', '<', \Carbon\Carbon::today())
            ->orderBy('end_date', 'desc') // latest expired first
            ->limit(3)
            ->get();

        $jobs = Job::whereDate('end_date', '>=', \Carbon\Carbon::today())
            // ->whereDate('end_date', '>=', \Carbon\Carbon::today()->subDays(2)) // 2 din pehle tak
            ->whereDate('end_date', '<=', \Carbon\Carbon::today()->addDays(45))
            ->orderBy('end_date', 'asc')
            ->limit(30)
            ->get();

        $jobsxxx = Job::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        // dd($jobsxxx);
        $stateCounts = [];
        $jobs1 = Job::get();
        $allStates = [
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttar Pradesh',
            'Uttarakhand',
            'West Bengal',
            'Delhi',
            'Jammu & Kashmir',
            'Ladakh'
        ];
        foreach ($jobs1 as $job) {
            $states = explode(',', $job->state);

            $states = array_map('trim', $states);

            if (in_array('All India', $states)) {
                // All India matlab sab states me +1
                foreach ($allStates as $st) {
                    if (isset($stateCounts[$st])) {
                        $stateCounts[$st]++;
                    } else {
                        $stateCounts[$st] = 1;
                    }
                }
            } else {
                foreach ($states as $state) {
                    if ($state == '') continue;

                    if (isset($stateCounts[$state])) {
                        $stateCounts[$state]++;
                    } else {
                        $stateCounts[$state] = 1;
                    }
                }
            }
        }

        // sort (optional)
        arsort($stateCounts);
        // dd($stateCounts);

        // $startOfWeek = \Carbon\Carbon::now(); // aaj se
        $today = \Carbon\Carbon::now();
        $next7Days = \Carbon\Carbon::now()->addDays(7);

        $jobs_upcomming = Job::whereBetween('end_date', [$today, $next7Days])
            ->orderBy('end_date', 'asc')
            ->get();

        // dd($jobs_upcomming );

        $categories = Job::pluck('category')
            ->filter() // empty remove
            ->map(fn($c) => strtolower(trim($c)))
            ->unique()
            ->sort()
            ->values();

        //Admit Card
        $admitCard = AdmitCard::orderBy('admit_card_release_date', 'asc')->get();

        foreach ($admitCard as $card) {
            $exams = [];

            if ($card->exam_dates) {
                $parts = explode('#', $card->exam_dates);

                foreach ($parts as $part) {
                    $data = explode('$', $part);

                    if (count($data) == 2) {
                        $examDate =  \Carbon\Carbon::parse($data[1]);

                        // ✅ Only future or today exams
                        if ($examDate->isToday() || $examDate->isFuture()) {
                            $exams[] = [
                                'name' => $data[0],
                                'date' => $data[1]
                            ];
                        }
                    }
                }
            }

            $card->exam_list = $exams; // dynamic property
        }

        $resultOut = Result::orderBy('result_card_release_date', 'asc')->get();
        // dd($admitCard);
        return view('welcome', compact('jobs', 'jobsxxx', 'stateCounts', 'jobs_upcomming', 'categories', 'admitCard', 'pastJobs','resultOut'));
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
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Image delete (optional but recommended)
        if ($job->image && file_exists(public_path('uploads/' . $job->image))) {
            unlink(public_path('uploads/' . $job->image));
        }

        $job->delete();

        return redirect()->back()->with('success', 'Job deleted successfully');
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
        // dd($request);   
        // Validate JSON
        $request->validate([
            'job_json' => 'required|json',
            'states' => 'required|array',
            'category_id' => 'required',
            'min_education' => 'required'
        ]);

        // Decode JSON
        $json = json_decode($request->job_json, true);
        $state = is_array($request->states)
            ? implode(',', $request->states)
            : $request->states;
        // Map fields
        $data = [
            'title'             => $json['title'] ?? null,
            'state'             => $state ?? null,
            'start_date'        => $json['start_date'] ?? null,
            'end_date'          => $json['last_date'] ?? null,
            'min_salary'        => $json['salary_min'] ?? null,
            'max_salary'        => $json['salary_max'] ?? null,
            'min_age'           => $json['age_min'] ?? null,
            'max_age_genral'    => $json['age_max'] ?? null,
            'min_qulification'  => $request->min_education ?? null,
            'total_vacancies'  => $json['total_vacancy'] ?? null,
            // 'exam_date'        => $json['exam_date'] ?? null,
            'website'          => $json['official_website'] ?? null,
            'category'          => $request->category_id ?? null,
            'last_fee_date'          => $json['last_fee_date'] ?? null,
            'correction_date'          => $json['correction_date'] ?? null,
            // 'exam_date'          => $json['exam_date'] ?? null,
            // 'admit_card'          => $json['admit_card'] ?? null,
            // 'result_date'          => $json['result_date'] ?? null,
            'genral_fees'          => $json['genral_fees'] ?? null,
            'obc_fees'          => $json['obc_fees'] ?? null,
            'sc_fees'          => $json['sc_fees'] ?? null,
            'st_fees'          => $json['st_fees'] ?? null,
            'extra_charge'          => $json['extra_charge'] ?? null,
            'min_age'          => $json['age_min'] ?? null,
            'max_age_genral'          => $json['age_max'] ?? null,
            'max_age_obc'          => $json['max_age_obc'] ?? null,
            'max_age_sc_st'          => $json['max_age_sc_st'] ?? null,
            'max_age_female'          => $json['max_age_female'] ?? null,
            'relaxation'          => $json['relaxation'] ?? null,
            'genral_post'          => $json['genral_post'] ?? null,
            'ews_post'          => $json['ews_post'] ?? null,
            'obc_post'          => $json['obc_post'] ?? null,
            'sc_post'          => $json['sc_post'] ?? null,
            'st_post'          => $json['st_post'] ?? null,
            'mode_selection'          => $json['Mode_Of_Selection'] ?? null,
            'post_name'          => $json['post_name'] ?? null,
            'post_eligibility'          => $json['post_eligibility'] ?? null,
            'post_salary'          => $json['post_salary'] ?? null,
            'instruction'          => $json['instruction'] ?? null,
            'doc'          => $json['doc'] ?? null,
            'link'          => $json['link'] ?? null,

        ];
        // $data = [
        //     

        //     



        //     
        //     'post_eligibility' => $json['qualification'] ?? null,
        //     
        //     
        //     
        //     
        // ];
        // dd($data);
        // Save
        Job::create($data);

        return back()->with('success', 'Job added via JSON!');
    }


    public function admitStoreJson(Request $request)
    {
        // dd($request);    
        $request->validate([
            'admit_json' => 'required|json',
            'job_id' => 'required'
        ]);

        $data = json_decode($request->admit_json, true);

        // ✅ Convert links to: title$url#
        $links = '';
        if ($request->link_title && $request->link_url) {
            foreach ($request->link_title as $key => $title) {
                $url = $request->link_url[$key] ?? null;

                if (!empty($title) && !empty($url)) {
                    $links .= trim($title) . '$' . trim($url) . '#';
                }
            }
        }

        // ✅ Image Upload (optional)
        $imageName = null;
        if ($request->hasFile('job_image')) {
            $image = $request->file('job_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('job-images'), $imageName);
            // $file->move(public_path('job-images'), $name);
        }

        // ✅ Create OR Update (🔥 main logic)
        AdmitCard::updateOrCreate(
            ['job_id' => $request->job_id], // condition
            [
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'admit_card_release_date' => $data['admit_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_admit_card' => $data['how_to_download_admit_card'] ?? null,
                'official_link' => $links,
                'logo' => $imageName // null bhi ho sakta hai
            ]
        );

        Job::updateOrCreate(
            ['id' => $request->job_id], // condition
            [
                'admit_card' => $data['admit_card_release_date'] ?? null,
                'exam_date' => $data['exam_dates'] ?? null,
            ]
        );

        return back()->with('success', 'Saved / Updated Successfully ✅');
    }

    public function resultStoreJson(Request $request)
    {
        // dd($request);    
        $request->validate([
            'result_json' => 'required|json',
            'job_id' => 'required'
        ]);

        $data = json_decode($request->result_json, true);

        // ✅ Convert links to: title$url#
        $links = '';
        if ($request->link_title && $request->link_url) {
            foreach ($request->link_title as $key => $title) {
                $url = $request->link_url[$key] ?? null;

                if (!empty($title) && !empty($url)) {
                    $links .= trim($title) . '$' . trim($url) . '#';
                }
            }
        }

        // ✅ Image Upload (optional)
        $imageName = null;
        if ($request->hasFile('job_image')) {
            $image = $request->file('job_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('job-images'), $imageName);
            // $file->move(public_path('job-images'), $name);
        }

        // ✅ Create OR Update (🔥 mainx logic)
        Result::updateOrCreate(
            ['job_id' => $request->job_id], // condition
            [
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'result_card_release_date' => $data['result_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_result_card' => $data['how_to_download_result_card'] ?? null,
                'official_link' => $links,
                'logo' => $imageName // null bhi ho sakta hai
            ]
        );

        Job::updateOrCreate(
            ['id' => $request->job_id], // condition
            [
                'result_date' => $data['result_card_release_date'] ?? null,
                'exam_date' => $data['exam_dates'] ?? null,
            ]
        );

        return back()->with('success', 'Saved / Updated Successfully ✅');
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
        // dd($category);
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


    public function addJob()
    {
        $states = State::all();
        $categories = Category::all();
        $mineducation = Mineducation::all();

        return view('jobs.add-job', compact('states', 'categories', 'mineducation'));
    }

    public function admitEdit($id)
    {
        // ✅ check record exist ya nahi
        $admit = AdmitCard::where('job_id', $id)->first();

        return view('jobs.admit-card', compact('id', 'admit'));
    }

    public function resultEdit($id)
    {
        // ✅ check record exist ya nahi
        $result = Result::where('job_id', $id)->first();

        return view('jobs.result', compact('id', 'result'));
    }


    public function admitShow($slug)
    {
        // 1️⃣ Slug se admit card fetch karo
        $admitCard = AdmitCard::where('slug', $slug)->firstOrFail();

        // 👉 Direct job fetch using job_id
        $job = null;
        if ($admitCard->job_id) {
            $job = Job::where('id', $admitCard->job_id)->first();
        }


        // 2️⃣ Only upcoming exams filter karo
        $exams = [];
        if ($admitCard->exam_dates) {
            $parts = explode('#',              $admitCard->exam_dates);
            foreach ($parts as $part) {
                $data = explode('$', $part);
                if (count($data) == 2) {
                    $date = \Carbon\Carbon::parse($data[1]);
                    if ($date->isToday() || $date->isFuture()) {
                        $exams[] = [
                            'name' => $data[0],
                            'date' => $data[1]
                        ];
                    }
                }
            }
        }

        $admitCard->exam_list = $exams;

        // 3️⃣ View return karo
        return view('jobs/admitcardshow', compact('admitCard', 'job'));
    }


    public function admitIndex()
    {
        $admitCards = AdmitCard::orderBy('admit_card_release_date', 'asc')->get();

        return view('jobs/admitcard-list', compact('admitCards'));
    }
}
