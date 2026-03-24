<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Job;

class SitemapController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();
            dd($jobs);
        return response()   
            ->view('sitemap', compact('jobs'))
            ->header('Content-Type', 'application/xml');
    }
}
