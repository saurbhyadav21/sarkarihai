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
use DOMDocument;
use DOMXPath;
use Carbon\Carbon;


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


    public function dmca()
    {
        $seo = [
            'title' => 'dmca',
            'description' => 'dmca',



            'keywords' => 'dd'



        ];
        return view('dmca', compact('seo'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs/job_edit', compact('job'));
    }

    public function editList($limit = 10)
    {
        $jobs = Job::orderBy('id', 'desc')
            ->paginate($limit);

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


    // public function latestJobs($state = null, $category = null)
    // {

    //     $query = DB::table('job_details');

    //     // State filter
    //     if (!empty($state)) {
    //         $query->where('state', $state);
    //     }

    //     // Category filter
    //     if (!empty($category)) {
    //         $query->where('category', $category);
    //     }

    //     $jobs = $query
    //         ->orderBy('id', 'DESC')
    //         ->paginate(20);

    //     return view('jobs.show', [
    //         'jobs' => $jobs,
    //         'state' => $state,
    //         'category' => $category,
    //     ]);
    // }

    // public function latestJobs(
    //     Request $request,
    //     $state = null,
    //     $category = null
    // ) {
    //     $jobs = Job::query();

    //     if ($request->filled('search')) {

    //         $search = $request->search;

    //         $jobs->where(function ($q) use ($search) {

    //             $q->where('title', 'LIKE', "%{$search}%")
    //                 ->orWhere('category', 'LIKE', "%{$search}%")
    //                 ->orWhere('organization', 'LIKE', "%{$search}%")
    //                 ->orWhere('state', 'LIKE', "%{$search}%");
    //         });
    //     }

    //     if ($state && $state != 'all-india') {
    //         $jobs->where('state', $state);
    //     }

    //     if ($category) {
    //         $jobs->where('category', $category);
    //     }

    //     $jobs = $jobs
    //         ->latest('id')
    //         ->paginate(20);


    //     return view('jobs.show', compact(
    //         'jobs',
    //         'state',
    //         'category'
    //     ));
    // }


    // public function latestJobs(Request $request, $state = null, $category = null)
    // {
    //     $jobs = DB::table('job_details')
    //         ->where('status', 1);

    //     if ($request->filled('search')) {

    //         $search = trim($request->search);

    //         $jobs->where(function ($q) use ($search) {

    //             $q->where('title', 'like', "%{$search}%")
    //                 ->orWhere('organization', 'like', "%{$search}%")
    //                 ->orWhere('category', 'like', "%{$search}%")
    //                 ->orWhere('sub_category', 'like', "%{$search}%")
    //                 ->orWhere('qualification', 'like', "%{$search}%")
    //                 ->orWhere('state', 'like', "%{$search}%");
    //         });
    //     }

    //     if (!empty($state) && $state != 'all-india') {
    //         $jobs->where('state', $state);
    //     }

    //     if (!empty($category)) {
    //         $jobs->where('category', $category);
    //     }

    //     $jobs = $jobs
    //         ->orderByDesc('id')
    //         ->paginate(20);

    //     // ======================
    //     // Statistics
    //     // ======================

    //     $totalJobs = DB::table('job_details')->count();

    //     $todayJobs = DB::table('job_details')
    //         ->where('status', 1)
    //         ->whereDate('created_at', today())
    //         ->count();

    //     $closingSoonJobs = DB::table('job_details')
    //         ->where('status', 1)
    //         ->whereDate('end_date', '>=', today())
    //         ->whereDate('end_date', '<=', today()->copy()->addDays(7))
    //         ->count();

    //     $activeJobs = DB::table('job_details')
    //         ->where('status', 1)
    //         ->whereDate('end_date', '>=', today())
    //         ->count();

    //     // ======================
    //     // Filters
    //     // ======================

    //     $states = DB::table('job_details')
    //         ->select('state')
    //         ->whereNotNull('state')
    //         ->where('state', '!=', '')
    //         ->distinct()
    //         ->orderBy('state')
    //         ->pluck('state');

    //     $categories = DB::table('job_details')
    //         ->select('category')
    //         ->whereNotNull('category')
    //         ->where('category', '!=', '')
    //         ->distinct()
    //         ->orderBy('category')
    //         ->pluck('category');

    //     $qualifications = DB::table('job_details')
    //         ->whereNotNull('min_qulification')
    //         ->where('min_qulification', '!=', '')
    //         ->pluck('min_qulification');

    //     $uniqueQualifications = [];

    //     foreach ($qualifications as $item) {

    //         $parts = explode('#', $item);

    //         foreach ($parts as $qualification) {

    //             $qualification = trim($qualification);

    //             if ($qualification != '') {

    //                 $uniqueQualifications[$qualification] = $qualification;
    //             }
    //         }
    //     }

    //     ksort($uniqueQualifications);

    //     $qualifications = array_values($uniqueQualifications);

    //     return view('jobs.show', compact(
    //         'jobs',
    //         'state',
    //         'category',
    //         'totalJobs',
    //         'todayJobs',
    //         'closingSoonJobs',
    //         'activeJobs',
    //         'states',
    //         'categories',
    //         'qualifications'
    //     ));
    // }

    public function latestJobs(
        Request $request,
        $state = null,
        $category = null
    ) {

        if ($request->search === 'undefined') {
            return redirect()->route('sarkari.naukri');
        }

        $jobs = DB::table('job_details');

        /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

        // if ($request->filled('search')) {

        //     $search = trim($request->search);

        //     $jobs->where(function ($q) use ($search) {

        //         $q->where('title', 'LIKE', "%{$search}%")
        //             ->orWhere('organization', 'LIKE', "%{$search}%")
        //             ->orWhere('department', 'LIKE', "%{$search}%")
        //             ->orWhere('category', 'LIKE', "%{$search}%")
        //             ->orWhere('job_sub_categories', 'LIKE', "%{$search}%")
        //             ->orWhere('qualification', 'LIKE', "%{$search}%")
        //             ->orWhere('min_qulification', 'LIKE', "%{$search}%")
        //             ->orWhere('state', 'LIKE', "%{$search}%");

        //     });

        // }

        /*
    |--------------------------------------------------------------------------
    | State Filter
    |--------------------------------------------------------------------------
    */

        if ($request->filled('state')) {

            if ($request->state != 'all-india') {

                $jobs->where('state', $request->state);
            }
        } elseif (!empty($state) && $state != 'all-india') {

            $jobs->where('state', $state);
        }

        /*
    |--------------------------------------------------------------------------
    | Category Filter
    |--------------------------------------------------------------------------
    */

        if ($request->filled('category')) {

            $jobs->where('category', $request->category);
        } elseif (!empty($category)) {

            $jobs->where('category', $category);
        }

        /*
    |--------------------------------------------------------------------------
    | Sub Category Filter
    |--------------------------------------------------------------------------
    */

        if ($request->filled('sub_category')) {

            $jobs->where(function ($q) use ($request) {

                $q->where('job_sub_categories', 'LIKE', '%' . $request->sub_category . '%');
            });
        }

        /*
    |--------------------------------------------------------------------------
    | Qualification Filter
    |--------------------------------------------------------------------------
    */

        if ($request->filled('qualification')) {

            $jobs->where(function ($q) use ($request) {

                $q->where('qualification', 'LIKE', '%' . $request->qualification . '%')
                    ->orWhere('min_qulification', 'LIKE', '%' . $request->qualification . '%');
            });
        }

        /*
    |--------------------------------------------------------------------------
    | Job Type Filter
    |--------------------------------------------------------------------------
    */

        if ($request->filled('job_type')) {

            $jobs->where('job_type', $request->job_type);
        }

        /*
    |--------------------------------------------------------------------------
    | Employment Type
    |--------------------------------------------------------------------------
    */

        if ($request->filled('employment_type')) {

            $jobs->where('employment_type', $request->employment_type);
        }

        /*
    |--------------------------------------------------------------------------
    | Organization
    |--------------------------------------------------------------------------
    */

        if ($request->filled('organization')) {

            $jobs->where('organization', $request->organization);
        }

        /*
    |--------------------------------------------------------------------------
    | Apply Mode
    |--------------------------------------------------------------------------
    */

        if ($request->filled('apply_mode')) {

            $jobs->where('apply_mode', $request->apply_mode);
        }


        /*
    |--------------------------------------------------------------------------
    | Sorting
    |--------------------------------------------------------------------------
    */

        switch ($request->get('sort')) {

            case 'oldest':

                $jobs->orderBy('id', 'ASC');

                break;

            case 'title':

                $jobs->orderBy('title', 'ASC');

                break;

            case 'organization':

                $jobs->orderBy('organization', 'ASC');

                break;

            case 'last_date':

                $jobs->orderBy('end_date', 'ASC');

                break;

            default:

                $jobs->orderBy('id', 'DESC');

                break;
        }

        /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

        $jobs = $jobs->paginate(20)->withQueryString();

        /*
    |--------------------------------------------------------------------------
    | Dashboard Counts
    |--------------------------------------------------------------------------
    */

        $totalJobs = DB::table('job_details')->count();

        $todayJobs = DB::table('job_details')
            ->whereDate('created_at', today())
            ->count();

        $activeJobs = DB::table('job_details')
            // ->where('status', 'Active')
            ->whereDate('end_date', '>=', now()->toDateString())
            ->count();

        $closingSoonJobs = DB::table('job_details')
            // ->where('status', 'Active')
            ->whereBetween('end_date', [
                now()->toDateString(),
                now()->addDays(7)->toDateString()
            ])
            ->count();

        /*
    |--------------------------------------------------------------------------
    | Sidebar Filters
    |--------------------------------------------------------------------------
    */

        $states = DB::table('job_details')
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->distinct()
            ->orderBy('state')
            ->pluck('state');

        $categories = DB::table('job_details')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        /*
    |--------------------------------------------------------------------------
    | Qualifications
    |--------------------------------------------------------------------------
    */

        $rows = DB::table('job_details')
            ->whereNotNull('min_qulification')
            ->where('min_qulification', '!=', '')
            ->pluck('min_qulification');

        $qualificationArray = [];

        foreach ($rows as $row) {

            foreach (explode('#', $row) as $item) {

                $item = trim($item);

                if ($item != '') {

                    $qualificationArray[$item] = $item;
                }
            }
        }

        ksort($qualificationArray);

        $qualifications = array_values($qualificationArray);

        /*
    |--------------------------------------------------------------------------
    | Sub Categories
    |--------------------------------------------------------------------------
    */

        $rows = DB::table('job_details')
            ->whereNotNull('job_sub_categories')
            ->where('job_sub_categories', '!=', '')
            ->pluck('job_sub_categories');

        $subCategoryArray = [];

        foreach ($rows as $row) {

            foreach (explode('#', $row) as $item) {

                $item = trim($item);

                if ($item != '') {

                    $subCategoryArray[$item] = $item;
                }
            }
        }

        ksort($subCategoryArray);

        $subCategories = array_values($subCategoryArray);

        /*
    |--------------------------------------------------------------------------
    | AJAX Response
    |--------------------------------------------------------------------------
    */

        if ($request->ajax()) {

            $html = view(
                'partials.job-list',
                compact('jobs')
            )->render();

            return response()->json([

                'html' => $html,

                'total' => $jobs->total()

            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    */

        return view('jobs.show', compact(

            'jobs',

            'state',

            'category',

            'totalJobs',

            'todayJobs',

            'activeJobs',

            'closingSoonJobs',

            'states',

            'categories',

            'qualifications',

            'subCategories'

        ));
    }

    public function jobDetail($state, $category, $slug)
{
    $job = Job::where('slug', $slug)->firstOrFail();


    /*
    |--------------------------------------------------------------------------
    | Dynamic Overview Content
    |--------------------------------------------------------------------------
    */

    $content = DB::table('dyanamic_content')
        ->first();


    $overview = null;


    if ($content) {


        $template = explode(',', $job->template_combination_id);


        $p1 = $template[0] ?? 1;
        $p2 = $template[1] ?? 1;
        $p3 = $template[2] ?? 1;


        $overview_p1 = DB::table('dyanamic_content')
            ->where('id', $p1)
            ->value('overview_p1');


        $overview_p2 = DB::table('dyanamic_content')
            ->where('id', $p2)
            ->value('overview_p2');


        $overview_p3 = DB::table('dyanamic_content')
            ->where('id', $p3)
            ->value('overview_p3');


        $overview = implode("\n\n", array_filter([

            $overview_p1,
            $overview_p2,
            $overview_p3

        ]));


        /*
        |--------------------------------------------------------------------------
        | Replace Dynamic Variables
        |--------------------------------------------------------------------------
        */


        $overview = str_replace(

            [
                '{{Organization Full Form}}',
                '{{Organization}}',
                '{{Job Title}}',
                '{{Job Topic}}',
                '{{Category}}',
                '{{Sub Category}}',
                '{{State}}',
            ],


            [
                $job->organization_full_form ?? '',
                $job->organization ?? '',
                $job->title ?? '',
                $job->job_topic ?? '',
                $job->category ?? '',
                $job->job_sub_categories ?? '',
                $job->state ?? '',
            ],


            $overview

        );


    }


    return view('jobs.show_details', [

        'job' => $job,

        'state' => $state,

        'category' => $category,

        'overview' => $overview,

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

            $response = Http::timeout(120)->get($url);

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

    public function testSarkariResult()
    {
        $feed = DB::table('job_feeds')
            ->where('source', 'sarkariresult.com.cm')
            ->where('scrape_status', 'pending')
            ->orderBy('id')
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

        $fee = strip_tags(
            html_entity_decode(
                $json['acf']['application_fee'] ?? ''
            )
        );

        $general = null;
        $obc = null;
        $ews = null;
        $sc = null;
        $st = null;

        if (
            preg_match(
                '/General.*?OBC.*?EWS.*?₹\s*([0-9]+)/is',
                $fee,
                $m
            )
        ) {
            $general = $m[1];
            $obc     = $m[1];
            $ews     = $m[1];
        }

        if (
            preg_match(
                '/SC\s*\/\s*ST.*?₹\s*([0-9]+)/is',
                $fee,
                $m
            )
        ) {
            $sc = $m[1];
            $st = $m[1];
        }

        $ageText = strip_tags(
            html_entity_decode(
                $json['acf']['age_limits_details'] ?? ''
            )
        );

        $minAge = null;
        $maxAge = null;

        if (
            preg_match(
                '/Minimum Age\s*:\s*(\d+)/i',
                $ageText,
                $m
            )
        ) {
            $minAge = $m[1];
        }

        if (
            preg_match(
                '/Maximum Age\s*:\s*(\d+)/i',
                $ageText,
                $m
            )
        ) {
            $maxAge = $m[1];
        }


        //vacancy detials

        $genral_post = null;
        $ews_post = null;
        $obc_post = null;
        $sc_post = null;
        $st_post = null;

        $post_name = null;
        $post_eligibility = null;
        $post_salary = null;

        $vacancyHtml = html_entity_decode(
            $json['acf']['vacancy_details'] ?? ''
        );

        // CATEGORY WISE VACANCY
        $isCategoryTable =
            preg_match('/\b(General|GEN|UR|EWS|OBC|SC|ST)\b/i', $vacancyHtml);

        $isPostTable =
            stripos($vacancyHtml, 'Post Name') !== false ||
            stripos($vacancyHtml, 'Course Name') !== false;


        if ($isCategoryTable) {

            preg_match('/(?:General|GEN|UR)[^0-9]*(\d+)/i', $vacancyHtml, $m);
            $genral_post = $m[1] ?? null;

            preg_match('/EWS[^0-9]*(\d+)/i', $vacancyHtml, $m);
            $ews_post = $m[1] ?? null;

            preg_match('/OBC[^0-9]*(\d+)/i', $vacancyHtml, $m);
            $obc_post = $m[1] ?? null;

            preg_match('/SC[^0-9]*(\d+)/i', $vacancyHtml, $m);
            $sc_post = $m[1] ?? null;

            preg_match('/ST[^0-9]*(\d+)/i', $vacancyHtml, $m);
            $st_post = $m[1] ?? null;
        }

        // POST NAME TABLE
        else if (
            stripos($vacancyHtml, 'Post Name') !== false ||
            stripos($vacancyHtml, 'Course Name') !== false
        ) {

            $names = [];
            $counts = [];
            $eligibility = [];

            preg_match_all(
                '/<tr[^>]*>(.*?)<\/tr>/is',
                $vacancyHtml,
                $rows
            );

            foreach ($rows[1] as $row) {

                preg_match_all(
                    '/<td[^>]*>(.*?)<\/td>/is',
                    $row,
                    $cols
                );

                if (count($cols[1]) == 3) {

                    $name = trim(strip_tags($cols[1][0]));

                    if (
                        stripos($name, 'Post Name') !== false ||
                        stripos($name, 'Course Name') !== false ||
                        stripos($name, 'Join Our') !== false ||
                        stripos($name, 'WhatsApp') !== false ||
                        stripos($name, 'Telegram') !== false ||
                        stripos($name, 'Follow Now') !== false ||
                        stripos($name, 'You May Also Check') !== false ||
                        stripos($name, 'How To Fill') !== false
                    ) {
                        continue;
                    }

                    $names[] = $name;

                    $counts[] = trim(
                        preg_replace(
                            '/\s+/',
                            ' ',
                            strip_tags($cols[1][1])
                        )
                    );

                    $eligibility[] = trim(
                        preg_replace(
                            '/\s+/',
                            ' ',
                            strip_tags($cols[1][2])
                        )
                    );
                } elseif (count($cols[1]) == 2) {

                    $name = trim(strip_tags($cols[1][0]));

                    if (
                        stripos($name, 'Post Name') !== false ||
                        stripos($name, 'Course Name') !== false ||
                        stripos($name, 'Join Our') !== false ||
                        stripos($name, 'WhatsApp') !== false ||
                        stripos($name, 'Telegram') !== false ||
                        stripos($name, 'Follow Now') !== false ||
                        stripos($name, 'You May Also Check') !== false ||
                        stripos($name, 'How To Fill') !== false
                    ) {
                        continue;
                    }

                    $names[] = $name;

                    $eligibility[] = trim(
                        preg_replace(
                            '/\s+/',
                            ' ',
                            strip_tags($cols[1][1])
                        )
                    );
                }
            }

            $post_name = !empty($names)
                ? implode('#', $names)
                : null;

            $post_salary = !empty($counts)
                ? implode('#', $counts)
                : null;

            $post_eligibility = !empty($eligibility)
                ? implode('#', $eligibility)
                : null;
        }

        // vacncy end


        $mode_selection = null;

        $html = html_entity_decode(
            $json['acf']['vacancy_details'] ?? ''
        );

        // HTML saaf karo
        $text = preg_replace('/\r|\n/', "\n", strip_tags($html));
        $text = html_entity_decode($text);

        // Mode Of Selection section nikalo
        if (
            preg_match(
                '/Mode\s*Of\s*Selection(.*?)(Join Our|Important Link|$)/is',
                $text,
                $match
            )
        ) {

            $lines = preg_split(
                '/\n+/',
                trim($match[1])
            );

            $modes = [];

            foreach ($lines as $line) {

                $line = trim($line);

                if ($line != '') {
                    $modes[] = $line;
                }
            }

            $mode_selection =
                !empty($modes)
                ? implode(', ', $modes)
                : null;
        }

        // min qulification
        $qualification = [];

        $text = strip_tags(
            html_entity_decode(
                $json['acf']['vacancy_details'] ?? ''
            )
        );

        $patterns = [
            '10th',
            '10\\+2',
            '12th',
            'Intermediate',
            'ITI',
            'Diploma',
            'Engineering Diploma',
            'Polytechnic',
            'BE',
            'B.E',
            'B.Tech',
            'BTech',
            'B.Sc',
            'BA',
            'B.Com',
            'BCA',
            'BBA',
            'B.Pharm',
            'D.Pharm',
            'Graduation',
            'Any Graduate',
            'Bachelor Degree',
            'Post Graduation',
            'Master Degree',
            'M.Tech',
            'MCA',
            'MBA',
            'CA',
            'CS',
            'CMA',
            'LLB',
            'LLM',
            'MBBS',
            'BDS',
            'Nursing',
            'GNM',
            'ANM',
            'PhD'
        ];

        foreach ($patterns as $q) {

            if (
                preg_match(
                    '/\b' . $q . '\b/i',
                    $text
                )
            ) {
                $qualification[] = str_replace('\\', '', $q);
            }
        }

        $min_qulification =
            !empty($qualification)
            ? implode(
                '#',
                array_unique($qualification)
            )
            : null;



        $instruction = null;

        $html = html_entity_decode(
            $json['acf']['vacancy_details'] ?? ''
        );

        // How To Fill section pakdo
        if (
            preg_match(
                '/How\s+To\s+Fill.*?<ul>(.*?)<\/ul>/is',
                $html,
                $match
            )
        ) {

            preg_match_all(
                '/<li[^>]*>(.*?)<\/li>/is',
                $match[1],
                $items
            );

            $instructions = [];

            foreach ($items[1] as $item) {

                $text = trim(
                    preg_replace(
                        '/\s+/',
                        ' ',
                        strip_tags($item)
                    )
                );

                if ($text != '') {
                    $instructions[] = $text;
                }
            }

            $instruction = implode('#', $instructions);
        }


        $html = html_entity_decode(
            $json['acf']['important_links'] ?? ''
        );

        $important_links = [];

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML(
            '<?xml encoding="utf-8" ?>' . $html
        );

        $xpath = new DOMXPath($dom);

        foreach ($xpath->query('//tr') as $tr) {

            // row me pehla link nikalo
            $a = $tr->getElementsByTagName('a')
                ->item(0);

            if (!$a) {
                continue;
            }

            $url = trim(
                $a->getAttribute('href')
            );

            if (!$url) {
                continue;
            }

            // poori row ka text
            $rowText = trim(
                preg_replace(
                    '/\s+/',
                    ' ',
                    strip_tags(
                        $tr->textContent
                    )
                )
            );

            // Click Here, Follow Now hata do
            $title = preg_replace(
                '/(Click Here|Follow Now)$/i',
                '',
                $rowText
            );

            $title = trim($title);

            if ($title != '') {
                $important_links[] =
                    $title . '$' . $url;
            }
        }

        $important_links =
            !empty($important_links)
            ? implode('#', $important_links)
            : null;

        $website = null;

        if (!empty($important_links) && is_array($important_links)) {

            foreach ($important_links as $item) {

                list($title, $link) =
                    array_pad(
                        explode('$', $item, 2),
                        2,
                        null
                    );

                if (
                    stripos($title, 'official website') !== false
                    || stripos($title, 'official site') !== false
                ) {
                    $website = $link;
                    break;
                }
            }
        }

        // $important_links =
        //     !empty($important_links)
        //     ? implode('#', $important_links)
        //     : null;

        $title = html_entity_decode(
            $json['acf']['long_post_title']
                ?? $json['title']['rendered']
                ?? ''
        );

        $jobYear = null;

        // 2000-2099 ka pehla year nikalo
        if (preg_match('/\b20\d{2}\b/', $title, $match)) {
            $jobYear = $match[0];
        }









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
                'last_fee_date'   => isset($fee[1]) ? trim(preg_replace('/\x{00A0}/u', ' ', $fee[1])) : null,
                'correction_date' => null,
                'exam_date'       => $exam[1] ?? 'To Be Announced',
                'admit_card'      => $admit[1] ?? 'To Be Announced',
                'result_date'     => $result[1] ?? 'To Be Announced',
                'syllabus'        => 'To Be Announced',

                // 14-19
                'info_date'             => $json['date'] ?? null,
                'genral_fees' => $general,
                'obc_fees'    => $obc,
                'ews_fees'    => $ews,
                'sc_fees'     => $sc,
                'st_fees'     => $st,
                'extra_charge' => null,

                // 20-25
                // Age
                'min_age'         => $minAge,
                'max_age_genral'  => $maxAge,
                'max_age_obc'     => $maxAge,
                'max_age_sc_st'   => $maxAge,
                'max_age_female'  => $maxAge,

                'relaxation'      => strip_tags(
                    html_entity_decode(
                        $json['acf']['age_limits_details'] ?? ''
                    )
                ),

                'post_age_limit'  => $json['acf']['age_limit_for']
                    ?? null,

                // 26-33
                'total_vacancies'       => $json['acf']['total_post'] ?? null,
                'min_salary'            => 0,
                'max_salary'            => 0,
                'genral_post' => $genral_post,
                'ews_post'    => $ews_post,
                'obc_post'    => $obc_post,
                'sc_post'     => $sc_post,
                'st_post'     => $st_post,

                // 34-41
                'mode_selection' => $mode_selection,
                'post_name'        => $post_name,
                'post_eligibility' => $post_eligibility,
                'post_salary'      => $post_salary,
                'min_qulification'      => $min_qulification,
                'instruction'           => $instruction,
                'link'                  => $important_links,
                'doc'                   => null,

                // 42-45
                'image'                 => null,
                'website'               => $website,
                'updated_at'            => now(),
                'created_at'            => now(),

                // 46-53
                'main_p'                => null,
                'date_p'                => null,
                'fee_p'                 => null,
                'age_p'                 => null,
                'vaccancy_p'            => null,
                'category_p'            => null,
                'selection_p'           => null,
                'post_p'                => null,

                // 54-59
                'slug'                  => null,
                'year'                  => $jobYear,
                'organization'          => null,
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

                'ph_fees'               => null,
                'female_fees'           => null,
                'apply_mode'            => null,

                'post_experience'       => null,
                'application_process'  => null,

                // 79-88
                'advt_no'               => null,
                'notification_number'   => null,
                'official_notification_pdf' =>  null,
                'apply_online_link'     => null,
                'answer_key_link'       => null,
                'admit_card_link'       => null,
                'result_link'           => null,
                'reservation'           => null,
                'important_dates'        => null,
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


        // successful hone par
        DB::table('job_feeds')
            ->where('id', $feed->id)
            ->update([
                'scrape_status' => 'completed',
                'updated_at'    => now(),
            ]);



        return response()->json([
            'success' => true,
            'feed_id' => $feed->id,
            'title' => $json['title']['rendered'] ?? '',
            'url' => $json['link'] ?? '',
            'message' => 'Inserted into job_details'
        ]);
    }



    public function home()
    {
        // BASE QUERY

        $baseQuery = DB::table('job_details');

        // ======================
        // LATEST JOBS
        // ======================
        $latestJobs = (clone $baseQuery)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        // ======================
        // LAST DATE JOBS (URGENT)
        // ======================
        $lastDateJobs = (clone $baseQuery)
            ->whereNotNull('last_fee_date')
            ->orderBy('last_fee_date', 'asc')
            ->limit(10)
            ->get();

        // ======================
        // RESULTS (SAFE TYPE CHECK)
        // ======================
        $results = (clone $baseQuery)
            ->where(function ($q) {
                $q->where('result_date', '!=', null)
                    ->where('result_date', '!=', 'To Be Announced');
            })
            ->latest('id')
            ->limit(10)
            ->get();

        // ======================
        // ADMIT CARDS
        // ======================
        $admitCards = (clone $baseQuery)
            ->where(function ($q) {
                $q->where('admit_card', '!=', null)
                    ->where('admit_card', '!=', 'To Be Announced');
            })
            ->latest('id')
            ->limit(10)
            ->get();

        // ======================
        // STATES (SAFE + CLEAN)
        // ======================
        $states = DB::table('job_states as s')
            ->leftJoin('job_details as j', function ($join) {
                $join->on(
                    DB::raw('j.state COLLATE utf8mb4_unicode_ci'),
                    '=',
                    's.slug'
                );
            })
            ->select(
                's.name',
                's.slug',
                DB::raw('COUNT(j.id) as total_jobs')
            )
            ->groupBy(
                's.id',
                's.name',
                's.slug'
            )
            ->orderBy('s.name')
            ->get();

        // ======================
        // CATEGORIES (SAFE)
        // ======================
        $categories = DB::table('job_categories as c')
            ->leftJoin('job_details as j', function ($join) {
                $join->on(
                    DB::raw('j.category COLLATE utf8mb4_unicode_ci'),
                    '=',
                    'c.slug'
                );
            })
            ->select(
                'c.name',
                'c.slug',
                DB::raw('COUNT(j.id) as total_jobs')
            )
            ->groupBy(
                'c.id',
                'c.name',
                'c.slug'
            )
            ->orderBy('c.name')
            ->limit(8)
            ->get();

        $totalJobs = DB::table('job_details')
            ->count();

        $totalResults = DB::table('job_details')
            ->whereNotNull('result_date')
            ->where('result_date', '!=', 'To Be Announced')
            ->count();

        $totalAdmitCards = DB::table('job_details')
            ->whereNotNull('admit_card')
            ->where('admit_card', '!=', 'To Be Announced')
            ->count();

        $totalStates = DB::table('job_details')
            ->whereNotNull('state')
            // ->distinct()
            ->count('state');
        $latestUpdates = DB::table('job_details')
            // ->where('status', 'active')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        $today = now()->format('Y-m-d');
        $thirdDay = now()->addDays(2)->format('Y-m-d');

        $lastDateSoon = DB::table('job_details')
            ->whereNotNull('end_date')
            ->where('end_date', '!=', '')
            ->where('end_date', '!=', 'To Be Announced')
            ->whereRaw("
        CASE
            WHEN end_date REGEXP '^[0-9]{4}-[0-9]{2}-[0-9]{2}$'
                THEN STR_TO_DATE(end_date, '%Y-%m-%d')
            WHEN end_date REGEXP '^[0-9]{1,2} [A-Za-z]+ [0-9]{4}$'
                THEN STR_TO_DATE(end_date, '%d %M %Y')
            ELSE NULL
        END BETWEEN ? AND ?
    ", [$today, $thirdDay])
            ->orderByRaw("
        CASE
            WHEN end_date REGEXP '^[0-9]{4}-[0-9]{2}-[0-9]{2}$'
                THEN STR_TO_DATE(end_date, '%Y-%m-%d')
            WHEN end_date REGEXP '^[0-9]{1,2} [A-Za-z]+ [0-9]{4}$'
                THEN STR_TO_DATE(end_date, '%d %M %Y')
            ELSE '9999-12-31'
        END ASC
    ")
            // ->limit(10)
            ->get();


        $organizations = DB::table('job_details')
            ->select(
                'job_topics',
                DB::raw('COUNT(*) as total_jobs')
            )
            ->whereNotNull('job_topics')
            ->where('job_topics', '!=', '')
            ->groupBy('job_topics')
            ->orderBy('job_topics')
            ->get();


        $popularSearches = DB::table('popular_searches')
            ->orderByDesc('count')
            // ->orderByDesc('updated_at')
            ->limit(8)
            ->get();


        $todayJobs = Job::whereDate('end_date', today())
            ->orderBy('end_date')->limit(10)
            ->get();
        $todayCount = Job::whereDate('end_date', today())->count();

        $tomorrowJobs = Job::whereDate('end_date', today()->addDay())
            ->orderBy('end_date')->limit(10)
            ->get();
        $tomorrowCount = Job::whereDate('end_date', today()->addDay())->count();
        $weekJobs = Job::whereBetween('end_date', [
            today()->addDays(2),
            today()->addDays(7)
        ])
            ->limit(10)
            ->orderBy('end_date')
            ->get();
        $weekCount = Job::whereBetween('end_date', [today()->addDays(2), today()->addDays(7)])->count();

        return view('welcome', compact(
            'latestJobs',
            'lastDateJobs',
            'results',
            'admitCards',
            'states',
            'categories',
            'totalJobs',
            'totalResults',
            'totalAdmitCards',
            'totalStates',
            'latestUpdates',
            'lastDateSoon',
            'organizations',
            'popularSearches',
            'todayJobs',
            'tomorrowJobs',
            'weekJobs',
            'todayCount',
            'tomorrowCount',
            'weekCount'
        ));
    }

    public function searchJobs(Request $request)
    {
        $keyword = trim($request->query('q'));

        if (strlen($keyword) >= 3) {

            $exists = DB::table('popular_searches')
                ->where('keyword', $keyword)
                ->exists();

            if ($exists) {
                DB::table('popular_searches')
                    ->where('keyword', $keyword)
                    ->increment('count');
            } else {
                DB::table('popular_searches')->insert([
                    'keyword' => $keyword,
                    'count' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        return DB::table('job_details')
            ->select(
                'title',
                'slug',
                'state',
                'category'
            )
            ->where('title', 'like', '%' . $request->q . '%')
            ->orderByDesc('id')
            ->limit(5)
            ->get();
    }


    public function search(Request $request)
    {
        $keyword = trim($request->q);

        $popularSearches = Job::where('title', 'LIKE', "%{$keyword}%")
            ->paginate(20);

        return view('search', compact('popularSearches', 'keyword'));
    }

    public function lastDateSoon($type)
    {
        $query = DB::table('job_details');

        switch ($type) {

            case 'today':
                $title = 'Today Last Date Jobs';
                $query->whereDate('end_date', Carbon::today());
                break;

            case 'tomorrow':
                $title = 'Tomorrow Last Date Jobs';
                $query->whereDate('end_date', Carbon::tomorrow());
                break;

            case 'week':
                $title = 'Next 7 Days Last Date Jobs';
                $query->whereBetween('end_date', [
                    Carbon::today(),
                    Carbon::today()->addDays(7)
                ]);
                break;

            default:
                abort(404);
        }

        $jobs = $query
            ->orderBy('end_date')
            ->paginate(30);

        return view('jobs.last-date-soon', compact('jobs', 'title'));
    }
}
