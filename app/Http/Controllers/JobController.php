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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Helpers\FreeJobAlertHelper;

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
        // // Job fetch
        // $job = Job::all()->firstWhere(fn($j) => Str::slug($j->title, '-') === $slug);

        // if (!$job) {
        //     abort(404);
        // }

        // // ✅ Admit Card fetch using job_id
        // $admitCard = \App\Models\AdmitCard::where('job_id', $job->id)->first();



        // $result = \App\Models\Result::where('job_id', $job->id)->first();

        // // ✅ Lock condition

        // // SEO
        // $seo = [
        //     'title' => $job->title . ' - ' . $job->total_vacancies . ' Posts | Apply Online, Eligibility, Last Date, Salary',
        //     'description' => 'Apply online for ' . $job->title . ' for ' . $job->total_vacancies . ' posts. Check eligibility, application fee, age limit, important dates and direct apply link.',
        //     'keywords' => $job->title . ', ' . $job->title . ' vacancy, ' . $job->title . ' apply online, ' . $job->title . ' notification, ' . $job->category . ' recruitment'
        // ];

        // return view('jobs.show', compact('job', 'seo', 'admitCard', 'result'));

        // Job fetch
        $job = Job::all()->firstWhere(fn($j) => Str::slug($j->title, '-') === $slug);
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
            ->limit(33)
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

        // foreach ($admitCard as $card) {
        //     $exams = [];

        //     if ($card->exam_dates) {
        //         $parts = explode('#', $card->exam_dates);

        //         foreach ($parts as $part) {
        //             $data = explode('$', $part);

        //             if (count($data) == 2) {
        //                 $examDate =  \Carbon\Carbon::parse($data[1]);

        //                 // ✅ Only future or today exams
        //                 if ($examDate->isToday() || $examDate->isFuture()) {
        //                     $exams[] = [
        //                         'name' => $data[0],
        //                         'date' => $data[1]
        //                     ];
        //                 }
        //             }
        //         }
        //     }

        //     $card->exam_list = $exams; // dynamic property
        // }

        $resultOut = Result::orderBy('result_card_release_date', 'asc')->get();



        return view('welcome', compact('jobs', 'jobsxxx', 'stateCounts', 'jobs_upcomming', 'categories', 'admitCard', 'pastJobs', 'resultOut'));
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
        $categories = DB::table('job_categories')
            ->orderBy('name')
            ->get();

        $subCategories = DB::table('job_sub_categories')
            ->orderBy('name')
            ->get();

        $states = DB::table('job_states')
            ->orderBy('name')
            ->get();

        $job_topics = DB::table('job_topics')
            ->orderBy('name')
            ->get();

        return view('jobs/job_edit_list', compact(
            'jobs',
            'categories',
            'subCategories',
            'states',
            'job_topics'
        ));
    }

    public function resultList()
    {

        $result = Result::latest()->get();

        return view('jobs/result_edit_list', compact('result'));
    }

    public function admitList()
    {

        $admit_card = AdmitCard::latest()->get();

        return view('jobs/admit_card_edit_list', compact('admit_card'));
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


    public function resultDestroy($id)
    {
        $job = Result::findOrFail($id);

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

            // 👇 YE TERE NEW FIELDS ADD KIYE
            'main_p' => 'nullable|string',
            'date_p' => 'nullable|string',
            'fee_p' => 'nullable|string',
            'age_p' => 'nullable|string',
            'vaccancy_p' => 'nullable|string',
            'category_p' => 'nullable|string',
            'selection_p' => 'nullable|string',
            'post_p' => 'nullable|string',

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
            // 'states' => 'required|array',
            'category_id' => 'required',
            // 'min_education' => 'required'
        ]);

        // Decode JSON
        $json = json_decode($request->job_json, true);
        // $state = is_array($request->states)
        //     ? implode(',', $request->states)
        //     : $request->states;
        // Map fields
        $data = [
            'title'             => $json['title'] ?? null,
            'state'             => $json['state'] ?? null,
            'start_date'        => $json['start_date'] ?? null,
            'end_date'          => $json['last_date'] ?? null,
            'min_salary'        => $json['salary_min'] ?? null,
            'max_salary'        => $json['salary_max'] ?? null,
            'min_age'           => $json['age_min'] ?? null,
            'max_age_genral'    => $json['age_max'] ?? null,
            'min_qulification'  => $json['qualification'] ?? null,
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

        if ($request->job_id == 'add' || empty($request->job_id)) {

            // ✅ CREATE
            AdmitCard::create([
                'job_id' => $request->job_id,
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'result_card_release_date' => $data['result_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_admit_card' => $data['how_to_download_admit_card'] ?? null,
                'official_link' => $links,
                'category' => $data['category'] ?? null,
                'advertisement_no' => $data['advertisement_no'] ?? null,
                'total_vacancies' => $data['total_vacancies'] ?? null,
                'post_name' => $data['post_name'] ?? null,
                'exam_list' => $data['exam_list'] ?? null,
                'min_salary' => $data['min_salary'] ?? null,
                'max_salary' => $data['max_salary'] ?? null,
                'min_qualification' => $data['min_qualification'] ?? null,
                'min_age' => $data['min_age'] ?? null,
                'max_age' => $data['max_age'] ?? null,
                'logo' => $imageName,
                'admit_card_release_date' => $data['admit_card_release_date'] ?? null,

                // 🔥 NEW FIELDS
                'main_p' => $data['main_p'] ?? null,
                'date_p' => $data['date_p'] ?? null,
                'fee_p' => $data['fee_p'] ?? null,
                'age_p' => $data['age_p'] ?? null,
                'vaccancy_p' => $data['vaccancy_p'] ?? null,
                'category_p' => $data['category_p'] ?? null,
                'selection_p' => $data['selection_p'] ?? null,
                'post_p' => $data['post_p'] ?? null,
            ]);
        } else {


            // Pehle existing record nikaalo
            $existing = AdmitCard::where('id', $request->job_id)->first();

            $updateData = [
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'result_card_release_date' => $data['result_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_admit_card' => $data['how_to_download_admit_card'] ?? null,
                'official_link' => $links,
                'category' => $data['category'] ?? null,
                'advertisement_no' => $data['advertisement_no'] ?? null,
                'total_vacancies' => $data['total_vacancies'] ?? null,
                'post_name' => $data['post_name'] ?? null,
                'exam_list' => $data['exam_list'] ?? null,
                'min_salary' => $data['min_salary'] ?? null,
                'max_salary' => $data['max_salary'] ?? null,
                'min_qualification' => $data['min_qualification'] ?? null,
                'min_age' => $data['min_age'] ?? null,
                'max_age' => $data['max_age'] ?? null,
                'admit_card_release_date' => $data['admit_card_release_date'] ?? null,


                'main_p' => $request->main_p,
                'date_p' => $request->date_p,
                'fee_p' => $request->fee_p,
                'age_p' => $request->age_p,
                'vaccancy_p' => $request->vaccancy_p,
                'category_p' => $request->category_p,
                'selection_p' => $request->selection_p,
                'post_p' => $request->post_p,
            ];

            // ✅ Image logic
            if ($imageName) {
                $updateData['logo'] = $imageName; // new image
            } else {
                $updateData['logo'] = $existing->logo ?? null; // old image preserve
            }

            // ✅ Final update
            AdmitCard::updateOrCreate(
                ['id' => $request->job_id],
                $updateData
            );
        }
        // ✅ Create OR Update (🔥 main logic)
        // AdmitCard::updateOrCreate(
        //     ['job_id' => $request->job_id], // condition
        //     [
        //         'job_title' => $data['job_title'] ?? null,
        //         'full_title' => $data['full_title'] ?? null,
        //         'admit_card_release_date' => $data['admit_card_release_date'] ?? null,
        //         'exam_dates' => $data['exam_dates'] ?? null,
        //         'how_to_download_admit_card' => $data['how_to_download_admit_card'] ?? null,
        //         'official_link' => $links,
        //         'logo' => $imageName // null bhi ho sakta hai
        //     ]
        // );

        // Job::updateOrCreate(
        //     ['id' => $request->job_id], // condition
        //     [
        //         'admit_card' => $data['admit_card_release_date'] ?? null,
        //         'exam_date' => $data['exam_dates'] ?? null,
        //     ]
        // );

        return back()->with('success', 'Saved / Updated Successfully ✅');
    }

    public function resultStoreJson(Request $request)
    {

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
        // ✅ Image Upload
        $imageName = null;

        if ($request->hasFile('job_image')) {
            $image = $request->file('job_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('job-images'), $imageName);
        }
        // dd($request->job_id);
        // ✅ Create OR Update (🔥 mainx logic)
        if ($request->job_id == 'add' || empty($request->job_id)) {

            // ✅ CREATE
            Result::create([
                'job_id' => $request->job_id,
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'result_card_release_date' => $data['result_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_result_card' => $data['how_to_download_result_card'] ?? null,
                'official_link' => $links,
                'category' => $data['category'] ?? null,
                'advertisement_no' => $data['advertisement_no'] ?? null,
                'total_vacancies' => $data['total_vacancies'] ?? null,
                'post_name' => $data['post_name'] ?? null,
                'exam_list' => $data['exam_list'] ?? null,
                'min_salary' => $data['min_salary'] ?? null,
                'max_salary' => $data['max_salary'] ?? null,
                'min_qualification' => $data['min_qualification'] ?? null,
                'min_age' => $data['min_age'] ?? null,
                'max_age' => $data['max_age'] ?? null,
                'logo' => $imageName,
                'admit_card_release_date' => $data['admit_card_release_date'] ?? null,

                // 🔥 NEW FIELDS
                'main_p' => $data['main_p'] ?? null,
                'date_p' => $data['date_p'] ?? null,
                'fee_p' => $data['fee_p'] ?? null,
                'age_p' => $data['age_p'] ?? null,
                'vaccancy_p' => $data['vaccancy_p'] ?? null,
                'category_p' => $data['category_p'] ?? null,
                'selection_p' => $data['selection_p'] ?? null,
                'post_p' => $data['post_p'] ?? null,
            ]);
        } else {


            // Pehle existing record nikaalo
            $existing = Result::where('id', $request->job_id)->first();

            $updateData = [
                'job_title' => $data['job_title'] ?? null,
                'full_title' => $data['full_title'] ?? null,
                'result_card_release_date' => $data['result_card_release_date'] ?? null,
                'exam_dates' => $data['exam_dates'] ?? null,
                'how_to_download_result_card' => $data['how_to_download_result_card'] ?? null,
                'official_link' => $links,
                'category' => $data['category'] ?? null,
                'advertisement_no' => $data['advertisement_no'] ?? null,
                'total_vacancies' => $data['total_vacancies'] ?? null,
                'post_name' => $data['post_name'] ?? null,
                'exam_list' => $data['exam_list'] ?? null,
                'min_salary' => $data['min_salary'] ?? null,
                'max_salary' => $data['max_salary'] ?? null,
                'min_qualification' => $data['min_qualification'] ?? null,
                'min_age' => $data['min_age'] ?? null,
                'max_age' => $data['max_age'] ?? null,
                'admit_card_release_date' => $data['admit_card_release_date'] ?? null,

                'main_p' => $request->main_p,
                'date_p' => $request->date_p,
                'fee_p' => $request->fee_p,
                'age_p' => $request->age_p,
                'vaccancy_p' => $request->vaccancy_p,
                'category_p' => $request->category_p,
                'selection_p' => $request->selection_p,
                'post_p' => $request->post_p,
            ];

            // ✅ Image logic
            if ($imageName) {
                $updateData['logo'] = $imageName; // new image
            } else {
                $updateData['logo'] = $existing->logo ?? null; // old image preserve
            }

            // ✅ Final update
            Result::updateOrCreate(
                ['id' => $request->job_id],
                $updateData
            );
        }
        // if (!empty($request->job_id) && is_numeric($request->job_id)) {

        //     Job::updateOrCreate(
        //         ['id' => $request->job_id],
        //         [
        //             'result_date' => $data['result_release_date'] ?? null,
        //             'exam_date' => $data['exam_dates'] ?? null,
        //         ]
        //     );
        // }

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

        $state = $state ?? 'all-states';
        $category = $category ?? 'all-categories';
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
        $categories = Category::orderBy('name', 'asc')->get();
        $mineducation = Mineducation::all();

        return view('jobs.add-job', compact('states', 'categories', 'mineducation'));
    }

    public function admitEdit($id)
    {
        // ✅ check record exist ya nahi
        // $admit = AdmitCard::where('job_id', $id)->first();

        // return view('jobs.admit-card', compact('id', 'admit'));

        $result = null; // ✅ default define

        // ✅ check record exist ya nahi
        $admit = AdmitCard::where('id', $id)->first();
        if ($id != 'add') {
            return view('jobs.admit-card', compact('id', 'admit'));
        } else {
            return view('jobs.admit-card',  compact('id', 'admit'));
        }
    }

    public function resultEdit($id)
    {

        $result = null; // ✅ default define

        // ✅ check record exist ya nahi
        if ($id != 'add') {
            $result = Result::where('id', $id)->first();
            return view('jobs.result', compact('id', 'result'));
        } else {
            return view('jobs.result',  compact('id', 'result'));
        }
    }


    public function admitShow($slug)
    {
        // 1️⃣ Slug se admit card fetch karo
        $admitCard = AdmitCard::where('slug', $slug)->firstOrFail();

        // 👉 Direct job fetch using job_id
        // $job = null;
        // if ($admitCard->job_id) {
        //     $job = Job::where('id', $admitCard->job_id)->first();
        // }


        // 2️⃣ Only upcoming exams filter karo
        // $exams = [];
        // if ($admitCard->exam_dates) {
        //     $parts = explode('#',$admitCard->exam_dates);
        //     foreach ($parts as $part) {
        //         $data = explode('$', $part);
        //         if (count($data) == 2) {
        //             $date = \Carbon\Carbon::parse($data[1]);
        //             if ($date->isToday() || $date->isFuture()) {
        //                 $exams[] = [
        //                     'name' => $data[0],
        //                     'date' => $data[1]
        //                 ];
        //             }
        //         }
        //     }
        // }

        // $admitCard->exam_list = $exams;

        // 3️⃣ View return karo
        return view('jobs/admitcardshow', compact('admitCard'));
    }

    public function resultShow($slug)
    {
        // 1️⃣ Slug se admit card fetch karo
        $resultCard = Result::where('slug', $slug)->firstOrFail();

        // 👉 Direct job fetch using job_id
        $job = null;
        if ($resultCard->job_id) {
            $job = Job::where('id', $resultCard->job_id)->first();
        }


        // 2️⃣ Only upcoming exams filter karo
        $exams = [];
        if ($resultCard->exam_dates) {
            $parts = explode('#', $resultCard->exam_dates); // split multiple stages
            foreach ($parts as $part) {
                $data = explode('$', $part); // split name and date
                if (count($data) >= 1) {
                    $exams[] = [
                        'name' => $data[0],                    // exam/stage name
                        'date' => $data[1] ?? ''               // date if exists, else empty
                    ];
                }
            }
        }

        $resultCard->exam_list = $exams;
        // dd($resultCard);
        // 3️⃣ View return karo
        return view('jobs/resultcardshow', compact('resultCard', 'job'));
    }


    public function admitIndex()
    {
        $admitCards = AdmitCard::orderBy('admit_card_release_date', 'asc')->get();

        return view('jobs/admitcard-list', compact('admitCards'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => true,
            'name' => $category->name
        ]);
    }


    public function deleteCategory(Request $request)
    {
        $category = Category::where('name', $request->name)->first();

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => true
        ]);
    }


    public function latestJobs($state = null, $category = null)
    {
        // Default values
        $state = $state ?: null;
        $category = $category ?: null;

        // Jobs
        $jobs = Job::latest()->get();

        return view('jobs.show', [
            'jobs' => $jobs,
            'state' => $state,
            'category' => $category,
        ]);
    }

    public function jobDetail($state, $category, $slug)
    {


        $job = Job::where('slug', $slug)->firstOrFail();

        return view('jobs.show', [
            'job' => $job,
            'state' => $state,
            'category' => $category,
        ]);
    }

    public function updateCategory($id)
    {
        $main_category = request('main_category');

        if (request()->filled('new_main_category')) {

            $main_category = \Illuminate\Support\Str::slug(
                request('new_main_category')
            );

            DB::table('job_categories')->insert([
                'slug' => $main_category,
                'name' => request('new_main_category'),
            ]);
        }

        DB::table('job_details')
            ->where('id', $id)
            ->update([
                'category' => $main_category
            ]);

        return back();
    }



    public function updateSubCategory($id)
    {
        $sub_category = request('sub_category');

        if (request()->filled('new_sub_category')) {

            $sub_category = \Illuminate\Support\Str::slug(
                request('new_sub_category')
            );

            DB::table('job_sub_categories')->insert([
                'slug' => $sub_category,
                'name' => request('new_sub_category'),
                'category_slug' => null,
            ]);
        }

        DB::table('job_details')
            ->where('id', $id)
            ->update([
                'job_sub_categories' => $sub_category
            ]);

        return back();
    }




    public function updateTopic($id)
    {
        DB::table('job_details')
            ->where('id', $id)
            ->update([
                'job_topics' => request('topic')
            ]);

        return back();
    }



    public function updateState($id)
    {
        DB::table('job_details')
            ->where('id', $id)
            ->update([
                'state' => request('state_slug')
            ]);

        return back();
    }


    public function importWpPosts($page = 1)
    {
        $url = "https://sarkariresult.com.cm/wp-json/wp/v2/posts?per_page=100&page=" . $page;

        $response = Http::timeout(60)->get($url);

        if (!$response->successful()) {
            return "API Error";
        }

        $posts = $response->json();

        foreach ($posts as $post) {

            $json = json_encode(
                $post,
                JSON_UNESCAPED_UNICODE
            );

            $hash = md5($json);

            $old = DB::table('job_feeds')
                ->where('article_id', $post['id'])
                ->where('source', 'sarkariresult.com.cm')
                ->first();

            /*
        NEW POST
        */
            if (!$old) {

                DB::table('job_feeds')->insert([

                    'source'        => 'sarkariresult.com.cm',

                    'article_id'    => $post['id'],

                    'url'           => $post['link'] ?? '',

                    'title'         => html_entity_decode(
                        $post['title']['rendered'] ?? ''
                    ),

                    'published_at'  =>
                    $post['date_gmt'] ?? now(),

                    'status'        => 'pending',

                    'scrape_status' => 'pending',

                    'url_type'      =>
                    FreeJobAlertHelper::detectUrlType($post),

                    'item'          => $json,

                    'item_hash'     => $hash,

                    'created_at'    => now(),

                    'updated_at'    => now(),
                ]);

                continue;
            }

            /*
        POST UPDATED
        */
            if ($old->item_hash != $hash) {

                DB::table('job_feeds')
                    ->where('id', $old->id)
                    ->update([

                        'url' => $post['link'] ?? '',

                        'title' => html_entity_decode(
                            $post['title']['rendered'] ?? ''
                        ),

                        'published_at' =>
                        $post['date_gmt'] ?? now(),

                        'url_type' =>
                        FreeJobAlertHelper::detectUrlType($post),

                        'item' => $json,

                        'item_hash' => $hash,

                        // dobara process hoga
                        'status' => 'pending',

                        'scrape_status' => 'pending',

                        'updated_at' => now(),
                    ]);
            }
        }

        return count($posts) . ' posts checked';
    }

    public function importAllWpPosts()
    {
        $total = 0;

        for ($page = 1; $page <= 13; $page++) {

            $url = "https://sarkariresult.com.cm/wp-json/wp/v2/posts?per_page=100&page=" . $page;

            $response = Http::timeout(60)->get($url);

            if (!$response->successful()) {
                continue;
            }

            $posts = $response->json();

            foreach ($posts as $post) {

                $json = json_encode(
                    $post,
                    JSON_UNESCAPED_UNICODE
                );

                $hash = md5($json);

                $old = DB::table('job_feeds')
                    ->where('article_id', $post['id'])
                    ->where('source', 'sarkariresult.com.cm')
                    ->first();

                // naya post
                if (!$old) {

                    DB::table('job_feeds')->insert([

                        'article_id'     => $post['id'],
                        'source'         => 'sarkariresult.com.cm',
                        'url'            => $post['link'] ?? '',
                        'title'          => html_entity_decode(
                            $post['title']['rendered'] ?? ''
                        ),
                        'published_at'   => $post['date_gmt'] ?? now(),
                        'status'         => 'pending',
                        'scrape_status'  => 'pending',
                        'url_type'       => FreeJobAlertHelper::detectUrlType($post),
                        'item'           => $json,
                        'hash'           => $hash,
                        'created_at'     => now(),
                        'updated_at'     => now(),
                    ]);

                    $total++;
                }

                // existing post update hua
                else if ($old->hash != $hash) {

                    DB::table('job_feeds')
                        ->where('id', $old->id)
                        ->update([

                            'url'           => $post['link'] ?? '',
                            'title'         => html_entity_decode(
                                $post['title']['rendered'] ?? ''
                            ),
                            'published_at'  => $post['date_gmt'] ?? now(),
                            'item'          => $json,
                            'hash'          => $hash,
                            'status'        => 'pending',
                            'scrape_status' => 'pending',
                            'updated_at'    => now(),
                        ]);

                    $total++;
                }
            }

            sleep(1); // server load kam
        }

        return "Imported/Updated : " . $total;
    }

    public function testSarkariResult($id)
    {
        $feed = DB::table('job_feeds')
            ->where('id', $id)
            ->first();

        if (!$feed) {
            return 'Feed not found';
        }

        $json = json_decode(
            $feed->item,
            true
        );
        $important_dates = html_entity_decode(
            $json['acf']['important_dates'] ?? ''
        );

        preg_match('/Online Apply Start Date\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $start);
        preg_match('/Online Apply Last Date\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $last);
        preg_match('/Last Date For Fee Payment\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $fee);
        preg_match('/Exam Date\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $exam);
        preg_match('/Admit Card\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $admit);
        preg_match('/Result Date\s*:.*?(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', $important_dates, $result);

        DB::table('job_details')->updateOrInsert(

            [
                'source_url' => $json['link'] ?? ''
            ],

            [

                // 2-5
                'title'                 => html_entity_decode($json['acf']['long_post_title'] ?? $json['title']['rendered'] ?? ''),
                'category'              => null,
                'state'                 => 'All Indiax',
                'desce'                 => null,


                // 6-13
                'start_date'      => $start[1] ?? null,
                'end_date'        => $last[1] ?? null,
                'last_fee_date'   => $fee[1] ?? null,
                'correction_date' => null,
                'exam_date'       => $exam[1] ?? 'To Be Announced',
                'admit_card'      => $admit[1] ?? 'To Be Announced',
                'result_date'     => $result[1] ?? 'To Be Announced',
                'syllabus'        => 'To Be Announced',

                // 14-19
                'info_date'             => $json['date'] ?? null,
                'genral_fees'           => null,
                'obc_fees'              => null,
                'sc_fees'               => null,
                'st_fees'               => null,
                'extra_charge'          => null,

                // 20-25
                'min_age'               => null,
                'max_age_genral'        => null,
                'max_age_obc'           => null,
                'max_age_sc_st'         => null,
                'max_age_female'        => null,
                'relaxation'            => null,

                // 26-33
                'total_vacancies'       => $json['acf']['total_post'] ?? null,
                'min_salary'            => 0,
                'max_salary'            => 0,
                'genral_post'           => null,
                'ews_post'              => null,
                'obc_post'              => null,
                'sc_post'               => null,
                'st_post'               => null,

                // 34-41
                'mode_selection'        => null,
                'post_name'             => null,
                'post_eligibility'      => null,
                'min_qulification'      => null,
                'post_salary'           => null,
                'instruction'           => null,
                'link'                  => $json['link'] ?? null,
                'doc'                   => null,

                // 42-45
                'image'                 => $json['featured_media'] ?? null,
                'website'               => $json['link'] ?? null,
                'updated_at'            => now(),
                'created_at'            => now(),

                // 46-53
                'main_p'                => $json['acf']['short_details:'] ?? null,
                'date_p'                => $json['acf']['important_dates'] ?? null,
                'fee_p'                 => $json['acf']['application_fee'] ?? null,
                'age_p'                 => $json['acf']['age_limits_details'] ?? null,
                'vaccancy_p'            => $json['acf']['vacancy_details'] ?? null,
                'category_p'            => null,
                'selection_p'           => null,
                'post_p'                => $json['acf']['vacancy_details'] ?? null,

                // 54-59
                'slug'                  => $json['slug'] ?? null,
                'year'                  => date('Y', strtotime($json['date'] ?? now())),
                'organization'          => $json['acf']['long_post_title'] ?? null,
                'department'            => null,
                'sector'                => null,
                'sub_sector'            => null,

                // 60-68
                'job_location'          => null,
                'job_location_type'     => null,
                'job_type'              => null,
                'employment_type'       => null,
                'notification_date'     => $json['date'] ?? null,
                'interview_date'        => null,
                'walkin_date'           => null,
                'salary_text'           => null,
                'pay_level'             => null,

                // 69-78
                'qualification'         => null,
                'experience'            => null,
                'experience_years'      => null,
                'ews_fees'              => null,
                'ph_fees'               => null,
                'female_fees'           => null,
                'apply_mode'            => null,
                'post_age_limit'        => $json['acf']['age_limits_details'] ?? null,
                'post_experience'       => null,
                'application_process'  => $json['acf']['application_fee'] ?? null,

                // 79-88
                'advt_no'               => null,
                'notification_number'   => null,
                'official_notification_pdf'
                => $json['link'] ?? null,
                'apply_online_link'     => null,
                'answer_key_link'       => null,
                'admit_card_link'       => null,
                'result_link'           => null,
                'reservation'           => null,
                'important_dates'       => $json['acf']['important_dates'] ?? null,
                'important_links'       => null,

                // 89-96
                'is_interview_only'     => 0,
                'is_exam_required'      => 1,
                'is_walkin'             => 0,
                'is_contractual'        => 0,
                'is_apprentice'         => 0,
                'status'                => $json['status'] ?? null,
                'source'                => 'sarkariresult.com.cm',
                'source_url'            => $json['link'] ?? null,

                // 97-98
                'job_sub_categories'    => null,
                'job_topics'            => null,
            ]
        );

        return response()->json([
            'success' => true,
            'feed_id' => $feed->id,
            'title' => $json['title']['rendered'] ?? '',
            'url' => $json['link'] ?? '',
            'message' => 'Inserted into job_details'
        ]);
    }
}
