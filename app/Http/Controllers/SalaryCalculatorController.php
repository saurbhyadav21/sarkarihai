<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryCalculatorController extends Controller
{
    public function index()
    {
       
     $metaTitle = 'Age Calculator - Calculate Your Exact Age | SarkariHai';
        $title = 'Age Calculator - Calculate Your Exact Age | SarkariHai';

        $metaDescription = 'Use our free Age Calculator to calculate your exact age in years, months and days from your date of birth. Find your age as of today or any specific date.';

        $canonicalUrl = url('/age-calculator');

        $robots = 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1';

        $ogType = 'website';

        $ogImage = asset('images/logo.png') . '?v=2';

    $categories = DB::table('job_details')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('tools/salary-calculator', compact('categories','title',
            'metaDescription',
            'canonicalUrl',
            'robots',
            'ogType',
            'ogImage',
            'metaTitle'));
    }

    public function organizations(Request $request)
    {
        $request->validate([
            'category' => 'required|string'
        ]);

        $organizations = DB::table('job_details')
            ->where('category', $request->category)
            ->whereNotNull('organization')
            ->where('organization', '!=', '')
            ->select(
                'organization',
                'organization_full_form'
            )
            ->distinct()
            ->orderBy('organization')
            ->get();

        return response()->json($organizations);
    }

    public function posts(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'organization' => 'required|string'
        ]);

        $rows = DB::table('job_details')
            ->where('category', $request->category)
            ->where('organization', $request->organization)
            ->whereNotNull('post_name')
            ->where('post_name', '!=', '')
            ->select('post_name', 'post_salary')
            ->get();

        $posts = [];

        foreach ($rows as $row) {

            $postNames = explode('#', $row->post_name);
            $salaries  = explode('#', (string) $row->post_salary);

            foreach ($postNames as $index => $postName) {

                $postName = trim($postName);

                if ($postName === '') {
                    continue;
                }

                $salary = isset($salaries[$index])
                    ? trim($salaries[$index])
                    : '';

                $posts[] = [
                    'post_name'   => $postName,
                    'post_salary' => $salary
                ];
            }
        }

        // Duplicate posts remove
        $unique = [];

        foreach ($posts as $post) {
            $key = strtolower($post['post_name']);

            if (!isset($unique[$key])) {
                $unique[$key] = $post;
            }
        }

        return response()->json(array_values($unique));
    }

    public function salary(Request $request)
    {
        $request->validate([
            'category'    => 'required|string',
            'organization'=> 'required|string',
            'post_name'   => 'required|string'
        ]);

        $rows = DB::table('job_details')
            ->where('category', $request->category)
            ->where('organization', $request->organization)
            ->whereNotNull('post_name')
            ->select('post_name', 'post_salary')
            ->get();

        foreach ($rows as $row) {

            $postNames = explode('#', $row->post_name);
            $salaries  = explode('#', (string) $row->post_salary);

            foreach ($postNames as $index => $postName) {

                if (trim($postName) === trim($request->post_name)) {

                    return response()->json([
                        'post_name'   => trim($postName),
                        'post_salary' => isset($salaries[$index])
                            ? trim($salaries[$index])
                            : null
                    ]);
                }
            }
        }

        return response()->json([
            'post_name' => $request->post_name,
            'post_salary' => null
        ], 404);
    }
}