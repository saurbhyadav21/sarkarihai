<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Job;
use Illuminate\Support\Str;
use App\Models\State; // Make sure you have a Job model
use App\Models\Category; // Make sure you have a Job model
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function index()
{
    $jobs = DB::table('job_details')
        ->select('slug', 'state', 'category', 'updated_at')
        ->whereNotNull('slug')
        ->get();

    $states = DB::table('job_states')
        ->select('slug', 'updated_at')
        ->get();

    $categories = DB::table('job_categories')
        ->select('slug', 'updated_at')
        ->get();

    $topics = DB::table('job_topics')
        ->select('slug', 'updated_at')
        ->get();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    /*
    |--------------------------------------------------------------------------
    | Static Pages
    |--------------------------------------------------------------------------
    */

    $pages = [

        ['url'=>'/','priority'=>'1.0'],

        ['url'=>'/about','priority'=>'0.8'],

        ['url'=>'/contact','priority'=>'0.8'],

        ['url'=>'/privacy-policy','priority'=>'0.5'],

        ['url'=>'/terms-and-conditions','priority'=>'0.5'],

        ['url'=>'/disclaimer','priority'=>'0.5'],

        ['url'=>'/fact-checking-policy','priority'=>'0.5'],

        ['url'=>'/age-calculator','priority'=>'0.5'],

        ['url'=>'/salary-calculator','priority'=>'0.5'],

        ['url'=>'/qualification-checker','priority'=>'0.5']

    ];

    foreach ($pages as $page){

        $xml .= '
        <url>
            <loc>'.url($page['url']).'</loc>
            <lastmod>'.now()->toAtomString().'</lastmod>
            <changefreq>weekly</changefreq>
            <priority>'.$page['priority'].'</priority>
        </url>';

    }

    /*
    |--------------------------------------------------------------------------
    | State Pages
    |--------------------------------------------------------------------------
    */

    // foreach($states as $state){

    //     $xml .= '
    //     <url>
    //         <loc>'.url('state/'.$state->slug.'/jobs').'</loc>
    //         <lastmod>'.optional($state->updated_at)->toAtomString().'</lastmod>
    //         <changefreq>daily</changefreq>
    //         <priority>0.8</priority>
    //     </url>';

    // }

    /*
    |--------------------------------------------------------------------------
    | Category Pages
    |--------------------------------------------------------------------------
    */

    // foreach($categories as $category){

    //     $xml .= '
    //     <url>
    //         <loc>'.url('jobs/'.$category->slug).'</loc>
    //         <lastmod>'.optional($category->updated_at)->toAtomString().'</lastmod>
    //         <changefreq>daily</changefreq>
    //         <priority>0.8</priority>
    //     </url>';

    // }

    /*
    |--------------------------------------------------------------------------
    | Topic Pages
    |--------------------------------------------------------------------------
    */

    // foreach($topics as $topic){

    //     $xml .= '
    //     <url>
    //         <loc>'.url('topic/'.$topic->slug).'</loc>
    //         <lastmod>'.optional($topic->updated_at)->toAtomString().'</lastmod>
    //         <changefreq>daily</changefreq>
    //         <priority>0.8</priority>
    //     </url>';

    // }

    /*
    |--------------------------------------------------------------------------
    | Job Detail Pages
    |--------------------------------------------------------------------------
    */

    foreach ($jobs as $job) {

    $jobUrl = url(
        'sarkari-naukri/' .
        Str::slug($job->state ?: 'all-india') . '/' .
        Str::slug($job->category ?: 'government') . '/' .
        $job->slug
    );

    $xml .= '
    <url>
        <loc>' . htmlspecialchars($jobUrl, ENT_XML1, 'UTF-8') . '</loc>
        <lastmod>' . \Carbon\Carbon::parse($job->updated_at)->toAtomString() . '</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>';
}

    $xml .= '</urlset>';

    return response($xml,200)
        ->header('Content-Type','application/xml');
}
}
