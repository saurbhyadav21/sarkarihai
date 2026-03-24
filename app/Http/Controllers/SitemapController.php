<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Job;
use Illuminate\Support\Str;
use App\Models\State; // Make sure you have a Job model
use App\Models\Category; // Make sure you have a Job model


class SitemapController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();
        $states = State::all();
        $categories = Category::all();



        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // ✅ STATIC PAGES
        $staticPages = [
            '/',
            '/about',
            '/contact',
            '/privacy-policy',
            '/disclaimer',
            '/terms-and-conditions',
            '/fact-checking-policy',

        ];

        foreach ($staticPages as $page) {
            $xml .= '<url>
                    <loc>' . url($page) . '</loc>
                    <priority>0.8</priority>
                </url>';
        }


        // ✅ STATE PAGES
        foreach ($states as $state) {
            foreach ($categories as $category) {

                $stateSlug = Str::slug($state->name);
                $catSlug = Str::slug($category->name);

                // ✅ latest job nikal lo us state + category ke liye
                $latestJob = Job::where('state', $state->name)
                                ->where('category', $category->name)
                                ->latest('updated_at')
                                ->first();

                // agar job exist karti hai tabhi add karo
                if ($latestJob) {

                    $xml .= '<url>
                                <loc>' . url('/jobs/' . $stateSlug . '/' . $catSlug) . '</loc>
                                <lastmod>' . $latestJob->updated_at->toAtomString() . '</lastmod>
                                <priority>0.7</priority>
                            </url>';
                }
            }
        }

        // ✅ STATE + CATEGORY PAGES
        foreach ($states as $state) {
            foreach ($categories as $category) {

                $stateSlug = Str::slug($state->name);
                $catSlug = Str::slug($category->name);

                $xml .= '<url>
                        <loc>' . url('/jobs/' . $stateSlug . '/' . $catSlug) . '</loc>
                        
                        <priority>0.7</priority>
                    </url>';
            }
        }


        // ✅ DYNAMIC JOBS
        foreach ($jobs as $job) {

            $slug = Str::slug($job->title);

            $xml .= '<url>
                    <loc>' . url('/sarkari-naukri/' . $slug) . '</loc>
                    <lastmod>' . $job->updated_at->toAtomString() . '</lastmod>
                    <priority>0.9</priority>
                </url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
