<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Job;

class SitemapController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static URLs
        $xml .= '<url>
                <loc>' . url('/') . '</loc>
                <priority>1.0</priority>
            </url>';

        $xml .= '<url>
                <loc>' . url('/about') . '</loc>
                <priority>0.8</priority>
            </url>';

        // Dynamic Jobs
        foreach ($jobs as $job) {
            $xml .= '<url>
                    <loc>' . url('/job/' . $job->slug) . '</loc>
                    <lastmod>' . $job->updated_at->toAtomString() . '</lastmod>
                    <priority>0.9</priority>
                </url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
