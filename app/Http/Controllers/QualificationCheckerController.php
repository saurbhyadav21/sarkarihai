<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QualificationCheckerController extends Controller
{
    public function index()
    {
        $categories = DB::table('job_details')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('tools/qualification-checker', compact('categories'));
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
            ->select(
                'post_name',
                'post_eligibility'
            )
            ->get();

        $posts = [];

        foreach ($rows as $row) {

            $postNames = explode('#', $row->post_name);

            $eligibilities = explode(
                '#',
                (string) $row->post_eligibility
            );

            foreach ($postNames as $index => $postName) {

                $postName = trim($postName);

                if ($postName === '') {
                    continue;
                }

                $eligibility = isset($eligibilities[$index])
                    ? trim($eligibilities[$index])
                    : '';

                $posts[] = [
                    'post_name' => $postName,
                    'post_eligibility' => $eligibility
                ];
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Remove Duplicate Posts
        |--------------------------------------------------------------------------
        */

        $unique = [];

        foreach ($posts as $post) {

            $key = strtolower(
                preg_replace(
                    '/\s+/',
                    ' ',
                    trim($post['post_name'])
                )
            );

            if (!isset($unique[$key])) {
                $unique[$key] = $post;
            }
        }

        return response()->json(
            array_values($unique)
        );
    }
}