@extends('layouts.app')

@section('title')
    {{ $job->title }} Recruitment {{ $job->year }} – {{ $job->vacancy }} Posts | Apply Online
@endsection

@section('meta_description')
    Apply online for {{ $job->title }} Recruitment {{ $job->year }}. Check {{ $job->vacancy }} vacancy, eligibility,
    age limit, selection process and important dates.
@endsection

@section('meta_keywords')
    {{ $job->title }} recruitment {{ $job->year }}, railway apprentice jobs, ITI jobs
@endsection

@section('content')
    <style>
        .banner-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Tablet */
        @media(max-width:992px) {
            .banner-img {
                height: 180px;
            }
        }

        /* Mobile */
        @media(max-width:576px) {
            .banner-img {
                height: 140px;
            }
        }
    </style>
    <main class="flex-shrink-0">
        <div class="container mt-3">
            <img src="{{ asset('job-images/' . $job->image) }}" class="img-fluid banner-img" alt="Job Image">
        </div>

        <div class="container mt-3">
            <img src="{{ asset('job-images/' . $job->image) }}" class="img-fluid banner-img" alt="Job Image">
        </div>



        <div class="container mt-3">


            <div class="row align-items-stretch gy-4" style="margin-bottom: 10px;">

                <!-- Important Info -->
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-body">

                            {{-- <h2 class="card-title">{{ $job->title }}</h2> --}}
                            <div class="container my-5">

                                <div class="card shadow">
                                    <div class="card-header bg-primary text-white">
                                        <h1 class="mb-0">
                                            {{ $job->title }}
                                        </h1>
                                    </div>
                                    <div class="card-body">

                                        <p>
                                            <strong>{{ $job->title }}</strong> has released notification for various
                                            posts
                                            <strong>{{ $job->post_name }}</strong> under {{ $job->category }}.
                                            Interested candidates can apply online from
                                            <strong>{{ \Carbon\Carbon::parse($job->start_date)->format('d-m-Y') ?? 'START DATE' }}</strong>
                                            to
                                            <strong>{{ \Carbon\Carbon::parse($job->end_date)->format('d-m-Y') ?? 'END DATE' }}</strong>
                                            at offical website : https://google.com.
                                        </p>

                                        <h5>Post Details:</h5>
                                        <ul>
                                            <li><strong>Post Name:</strong> {{ $job->post_name ?? 'POST' }}</li>
                                            <li><strong>Salary:</strong> ₹{{ $job->min_salary ?? 'N/A' }} -
                                                ₹{{ $job->max_salary ?? 'N/A' }}</li>
                                            <li><strong>Minimum Qualification:</strong>
                                                {{ $job->min_qulification ?? 'N/A' }}
                                            </li>
                                            <li><strong>Minimum Age:</strong> {{ $job->min_age ?? 'N/A' }} years</li>
                                            <li><strong>Total Vacancies:</strong> {{ $job->total_vacancies ?? 'N/A' }}</li>
                                            <li><strong>Exam Date:</strong> {{ $job->exam_date ?? 'Update Soon' }}</li>
                                        </ul>

                                        <p>
                                            Read the notification for recruitment eligibility, post information, selection
                                            procedure, Physical Eligibility, pay scale and all other information.</strong>.
                                        </p>

                                        <a href="#date-fee" class="btn btn-success">Read Official
                                            Notification / Apply Online</a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="row align-items-stretch gy-4" id="date-fee">

                <!-- Important Dates -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title">{{ $job->title }} – Important Dates</h2>

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item">
                                    Apply Online Start Date :
                                    <span class="badge bg-success">{{ $job->start_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    Apply Online Last Date :
                                    <span class="badge bg-danger">{{ $job->end_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    Last Date For Fee Payment :
                                    <span class="badge bg-warning text-dark">{{ $job->last_fee_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    Correction Last Date :
                                    <span class="badge bg-info text-dark">{{ $job->correction_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    Exam Date :
                                    <span class="badge bg-primary">{{ $job->exam_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    Admit Card :
                                    <span class="badge bg-secondary">{{ $job->admit_card }}</span>
                                </li>

                                <li class="list-group-item">
                                    Result Date :
                                    <span class="badge bg-dark">{{ $job->result_date }}</span>
                                </li>

                                <li class="list-group-item">
                                    {{ $job->info_date }}
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Application Fee -->
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title" id="application-fee">{{ $job->title }} – Application Fee
                            </h2>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">General Fees : ₹{{ $job->genral_fees }}/-</li>
                                <li class="list-group-item">OBC Fees : ₹{{ $job->obc_fees }}/-</li>
                                <li class="list-group-item">SC Fees : ₹{{ $job->sc_fees }}/-</li>
                                <li class="list-group-item">ST Fees : ₹{{ $job->st_fees }}/-</li>
                                <li class="list-group-item">Portal Charge : ₹{{ $job->extra_charge }}/-</li>
                                <li class="list-group-item fw-bold">
                                    Payment Mode : Debit Card, Credit Card, Internet Banking, IMPS / Wallet
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>


            <div class="row align-items-stretch">

                <!-- Age Limit -->
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title" id="age-limit">{{ $job->title }} – Age Limit</h2>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>Minimum Age :</b> {{ $job->min_age }} Years
                                </li>

                                <li class="list-group-item">
                                    <b>Maximum Age General Category :</b> {{ $job->max_age_genral }} Years
                                </li>

                                <li class="list-group-item">
                                    <b>Maximum Age OBC Category :</b> {{ $job->max_age_obc }} Years
                                </li>

                                <li class="list-group-item">
                                    <b>Maximum Age SC Category :</b> {{ $job->max_age_sc_st }} Years
                                </li>


                                <li class="list-group-item">
                                    <b>Maximum Age ST Category :</b> {{ $job->max_age_sc_st }} Years
                                </li>

                                <li class="list-group-item">
                                    <b>Maximum Age Female Category :</b> {{ $job->max_age_female }} Years
                                </li>

                                <li class="list-group-item">
                                    <b>Age Relaxation :</b> {{ $job->relaxation }}
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Total Post -->
                <div class="col-md-6" style="margin-top: 10px;">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <div class="card-body">

                            <h2 class="card-title" id="total-post">{{ $job->title }} – Total Post</h2>

                            <div style="font-size:70px;font-weight:700;color:#ff7a18;">
                                {{ $job->total_vacancies }}
                            </div>

                            <div>Total Vacancies</div>

                            <hr>

                            <div style="font-size:28px;font-weight:600;color:#198754;">
                                ₹{{ $job->min_salary }} - ₹{{ $job->max_salary }}
                            </div>

                            <div>{{ $job->title }} – Salary / Pay Scale</div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="container mt-4">

                <div class="row">

                    <!-- Category Wise Post -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">

                                <h2 class="card-title mb-4" id="category-post">
                                    {{ $job->title }} – Category Wise Post
                                </h2>

                                <!-- Header -->
                                <div class="row fw-bold border-bottom pb-2 mb-2 text-center">
                                    <div class="col-6">Category Name</div>
                                    <div class="col-6">No. Of Post</div>
                                </div>

                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-6">General</div>
                                    <div class="col-6">{{ $job->genral_post }}</div>
                                </div>

                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-6">EWS</div>
                                    <div class="col-6">{{ $job->ews_post }}</div>
                                </div>

                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-6">OBC</div>
                                    <div class="col-6">{{ $job->obc_post }}</div>
                                </div>

                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-6">SC</div>
                                    <div class="col-6">{{ $job->sc_post }}</div>
                                </div>

                                <div class="row py-2 text-center">
                                    <div class="col-6">ST</div>
                                    <div class="col-6">{{ $job->st_post }}</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Mode Of Selection -->
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <h2 class="card-title mb-4 text-center" id="selection-process">
                                    {{ $job->title }} – Mode Of Selection
                                </h2>

                                <ul class="list-group list-group-flush text-center">
                                    @php

                                        $modes = explode(',', $job->mode_selection);
                                    @endphp

                                    @foreach ($modes as $mode)
                                        <li class="list-group-item">{{ trim($mode) }}</li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="container mt-4">

                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        <h2 class="card-title mb-4" id="eligibility">
                            {{ $job->title }} – Post & Eligibility Criteria

                        </h2>

                        <!-- Header -->
                        <div class="row mb-3 text-center" style="border-bottom:3px solid #ff7a18; padding-bottom:10px;">

                            <div class="col-md-4">
                                <span
                                    style="font-size:18px; font-weight:700; letter-spacing:1px; text-transform:uppercase;">
                                    Post Name
                                </span>
                            </div>

                            <div class="col-md-8">
                                <span
                                    style="font-size:18px; font-weight:700; letter-spacing:1px; text-transform:uppercase;">
                                    Eligibility Criteria
                                </span>
                            </div>

                        </div>


                        <div class="container mt-4">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    

                                    @php
                                        
                                        $names = explode(',', $job->post_name);
                                        $eligibilities = explode(',', $job->post_eligibility);
                                        $salaries = explode(',', $job->post_salary);
                                        $total = count($names); // total number of posts
                                    @endphp

                                    @for ($i = 0; $i < $total; $i++)
                                        <div class="row py-3 border-bottom">
                                            <div class="col-md-4 fw-bold">
                                                {{ trim($names[$i]) }}
                                            </div>

                                            <div class="col-md-8">
                                                {{ trim($eligibilities[$i]) }}
                                                
                                                <span class="fw-bold text-success">( Pay Scale :
                                                    ₹{!! trim($salaries[$i]) !!})</span>
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

            <div class="container mt-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title mb-4 text-center" id="online-form">
                            {{ $job->title }} – Online Form Fill Instruction
                        </h2>

                        <ul class="list-group list-group-flush">
                            @php
                                // Split the comma-separated instruction string into array
                                $instructions = explode('#', $job->instruction);
                            @endphp

                            @foreach ($instructions as $instruction)
                                <li class="list-group-item">{!! $instruction !!}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div> --}}







            {{-- <div class="container mt-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title text-center mb-4">
                            {{ $job->title }} – Important Links
                        </h2>

                        <div class="row text-center">
                            @php
                                // Split the comma-separated links from DB
                                $links = explode(',', $job->link); // $job->link = "Apply Online Link,https://example.com,Link Activate On 13 March 2026"
                            @endphp

                            @foreach ($links as $link)
                                @php
                                    // Split each part by dash or pipe if needed (title-url-text)
                                    $parts = explode('-', $link);
                                    // Example: $parts[0] = Title, $parts[1] = URL, $parts[2] = optional text
                                @endphp

                                <div class="col-md-4 mb-3">
                                    <div class="border p-3 rounded">
                                        <h5>{{ $parts[0] ?? 'Link Title' }}</h5>
                                        <a href="{{ $parts[1] ?? '#' }}" class="btn btn-danger mt-2" target="_blank">
                                            Click Here
                                        </a>
                                        @if (isset($parts[2]))
                                            <p class="mt-2 text-muted" style="font-size:14px;">
                                                {{ $parts[2] }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div> --}}


            {{-- <div class="container mt-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title text-center mb-4" id="documents">
                            {{ $job->title }} – Documents Required
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th style="width:30%">Documents Name</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Split comma-separated documents
                                        $docs = explode(',', $job->doc); // e.g. "Aadhaar Card-The Aadhaar number is required...,10th Class-Used as DOB proof"
                                    @endphp

                                    @foreach ($docs as $doc)
                                        @php
                                            // Split each doc into title and details
                                            $parts = explode('-', $doc);
                                        @endphp
                                        <tr>
                                            <td class="fw-bold">{{ $parts[0] ?? 'Title' }}</td>
                                            <td>{{ $parts[1] ?? 'Details' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div> --}}


            {{-- <div class="container mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title text-center mb-4">{{ $job->title }} – Frequently Asked
                            Questions (FAQ)
                        </h2>

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>1. What are the important dates for {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>2. When will the Apply Online start for {{ $job->title }} recruitment
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>3. What is the last date to apply for {{ $job->title }} online form 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>4. What is the last date for fee payment in {{ $job->title }} recruitment
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>5. What is the correction last date for {{ $job->title }} application form
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>6. When will the exam be conducted for {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>7. When will the admit card release for {{ $job->title }} exam 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#date-fee">
                                    <b>8. When will the result be declared for {{ $job->title }} recruitment
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#age-limit">
                                    <b>9. What is the age limit for {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#application-fee">
                                    <b>10. What is the application fee for General, OBC, SC and ST candidates in
                                        {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#total-post">
                                    <b>11. What is the total number of vacancies in {{ $job->title }} recruitment
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#total-post">
                                    <b>12. What is the salary or pay scale for {{ $job->title }} paramedical
                                        posts?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#category-post">
                                    <b>13. What is the category wise vacancy distribution in {{ $job->title }}
                                        recruitment
                                        2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#selection-process">
                                    <b>14. What is the selection process for {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#eligibility">
                                    <b>15. What is the eligibility criteria for {{ $job->title }} paramedical
                                        posts?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#eligibility">
                                    <b>16. Which posts are available in {{ $job->title }} recruitment 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#online-form">
                                    <b>17. How to fill the {{ $job->title }} online application form 2026?</b>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="#documents">
                                    <b>18. What documents are required while filling {{ $job->title }} online form
                                        2026?</b>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div> --}}
        </div>

    </main>
@endsection
