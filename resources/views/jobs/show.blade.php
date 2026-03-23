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
            height: auto;
            border-radius: 8px;
        }

        /* Tablet */
        @media(max-width:992px) {
            .banner-img {
                height: auto;
            }
        }

        /* Mobile */
        @media(max-width:576px) {
            .banner-img {
                height: auto;
            }
        }
    </style>
    <main class="flex-shrink-0">
        <div class="container mt-3">
            <img src="{{ asset('public/job-images/' . $job->image) }}" class="img-fluid banner-img" alt="Job Image">
        </div>

        <style>
            .section-tabs {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: center;
            }

            .section-tabs button {
                border: none;
                padding: 8px 16px;
                border-radius: 25px;
                background: #f1f1f1;
                font-weight: 600;
                cursor: pointer;
                transition: 0.3s;
            }

            .section-tabs button:hover {
                background: #28a745;
                color: #fff;
            }

            .section-box {
                margin-top: 30px;
                padding: 20px;
                border-radius: 12px;
                background: #fff;
                box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
            }
        </style>

        <!-- JS -->
        <script>
            function scrollToSection(id) {
                document.getElementById(id).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        </script>




        <div class="container mt-3">

            <!-- Section Tabs -->
            <div class="section-tabs mb-3">
                <button onclick="scrollToSection('admit')">
                    <i class="fa-solid fa-id-card"></i> Admit Card
                </button>

                <button onclick="scrollToSection('result')">
                    <i class="fa-solid fa-square-poll-vertical"></i> Result
                </button>
                <button onclick="scrollToSection('dates')">📅 Important Dates</button>
                <button onclick="scrollToSection('fee')">💰 Application Fee</button>
                <button onclick="scrollToSection('age')">🎯 Age Limit</button>
                <button onclick="scrollToSection('post')">📌 Total Post</button>
                <button onclick="scrollToSection('category')">📊 Category Wise</button>
                <button onclick="scrollToSection('selection')">✅ Selection Process</button>
                <button onclick="scrollToSection('details')">📄 Post Details</button>
                <button onclick="scrollToSection('instruction')">📝 How to Apply</button>
                <button onclick="scrollToSection('links')">🔗 Important Links</button>
                <button onclick="scrollToSection('docs')">📂 Documents</button>
                <button onclick="scrollToSection('faq')">❓ FAQ</button>
            </div>
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
                                            <strong>{{ str_replace('#', ', ', $job->post_name ?? '') }}</strong> under
                                            {{ $job->category }}.
                                            Interested candidates can apply online from
                                            <strong>{{ \Carbon\Carbon::parse($job->start_date)->format('d-m-Y') ?? 'START DATE' }}</strong>
                                            to
                                            <strong>{{ \Carbon\Carbon::parse($job->end_date)->format('d-m-Y') ?? 'END DATE' }}</strong>
                                            at offical website : <a href="{{ $job->website }}" target="_blank">
                                                {{ 'Click Here' }}
                                            </a>
                                        </p>

                                        <h5>Post Details:</h5>
                                        <ul>
                                            <li><strong>Post Name:</strong>
                                                {{ str_replace('#', ', ', $job->post_name ?? '') }}</li>
                                            <li><strong>Salary:</strong> ₹{{ number_format($job->min_salary ?? 0) }} -
                                                ₹{{ number_format($job->max_salary ?? 0) }}</li>
                                            <li><strong>Minimum Qualification:</strong>
                                                {{ $job->min_qulification ?? 'N/A' }}
                                            </li>
                                            <li><strong>Minimum Age:</strong> {{ $job->min_age ?? 'N/A' }} years</li>
                                            <li><strong>Total Vacancies:</strong>
                                                {{ number_format($job->total_vacancies ?? 0) }}</li>
                                            <li><strong>Exam Date:</strong>
                                                {{ $job->exam_date }}
                                            </li>
                                            {{-- <li><strong>Exam Date:</strong> {{ $job->exam_date ?? 'Update Soon' }}</li> --}}


                                        </ul>

                                        <p>
                                            Read the notification for recruitment eligibility, post information, selection
                                            procedure, Physical Eligibility, pay scale and all other information.</strong>.
                                        </p>

                                        <p style="color: red;">
                                            Note – छात्रो से ये अनुरोध किया जाता है की वो अपना फॉर्म भरने से पहले Official
                                            Notification को ध्यान से जरूर पढे उसके बाद ही अपना फॉर्म भरे । (Last Date, Age
                                            Limit, & Education Qualification)
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

            <div class="row align-items-stretch gy-4 ">

                <!-- Important Dates -->
                <div class="col-md-6 section-box" id="dates">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title mb-3 text-center">
                                {{ $job->title }} – Important Dates
                            </h2>

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Apply Online Start Date</span>
                                    <span class="badge bg-success">{{ $job->start_date }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Apply Online Last Date</span>
                                    <span class="badge bg-danger">{{ $job->end_date }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Last Date For Fee Payment</span>
                                    <span class="badge bg-warning text-dark">{{ $job->last_fee_date }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Correction Last Date</span>
                                    <span class="badge bg-info text-dark">{{ $job->correction_date }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Exam Date</span>
                                    <span class="badge bg-primary">{{ $job->exam_date }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Admit Card</span>
                                    <span class="badge bg-secondary">{{ $job->admit_card }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Result Date</span>
                                    <span class="badge bg-dark">{{ $job->result_date }}</span>
                                </li>

                                <li class="list-group-item text-center">
                                    {{ $job->info_date }}
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Application Fee -->
                <div class="col-md-6 section-box" id="fee">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title mb-3 text-center" id="application-fee">
                                {{ $job->title }} – Application Fee
                            </h2>

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>General Fees</span>
                                    <span class="badge bg-primary">₹{{ $job->genral_fees }}/-</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>OBC Fees</span>
                                    <span class="badge bg-info text-dark">₹{{ $job->obc_fees }}/-</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>SC Fees</span>
                                    <span class="badge bg-success">₹{{ $job->sc_fees }}/-</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>ST Fees</span>
                                    <span class="badge bg-secondary">₹{{ $job->st_fees }}/-</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Portal Charge</span>
                                    <span class="badge bg-warning text-dark">₹{{ $job->extra_charge }}/-</span>
                                </li>

                                <!-- Payment Info -->
                                <li class="list-group-item mt-2" style="font-size: 14px; line-height: 1.6;">
                                    <b>Payment Methods:</b><br>
                                    Debit Card, Credit Card, Internet Banking, IMPS, Cash Card / Mobile Wallet
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>

            </div>


            <div class="row align-items-stretch">

                <!-- Age Limit -->
                <div class="col-md-6 section-box" style="margin-top: 10px;" id="age">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title mb-3 text-center" id="age-limit">
                                {{ $job->title }} – Age Limit
                            </h2>

                            <ul class="list-group list-group-flush">

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Minimum Age</span>
                                    <span class="badge bg-success">{{ $job->min_age }} Years</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Max Age (General)</span>
                                    <span class="badge bg-primary">{{ $job->max_age_genral }} Years</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Max Age (OBC)</span>
                                    <span class="badge bg-info text-dark">{{ $job->max_age_obc }} Years</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Max Age (SC)</span>
                                    <span class="badge bg-warning text-dark">{{ $job->max_age_sc_st }} Years</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Max Age (ST)</span>
                                    <span class="badge bg-secondary">{{ $job->max_age_sc_st }} Years</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Max Age (Female)</span>
                                    <span class="badge bg-dark">{{ $job->max_age_female }} Years</span>
                                </li>

                                <!-- Relaxation -->
                                <li class="list-group-item mt-2" style="font-size: 14px; line-height: 1.6;">
                                    <b>Age Relaxation:</b><br>
                                    {{ $job->relaxation }}
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>

                <!-- Total Post -->
                <div class="col-md-6 section-box" style="margin-top: 10px;" id="post">
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
                    <div class="col-6 mb-3 section-box" id="category">
                        <div class="card shadow-sm">
                            <div class="card-body">

                                <h2 class="card-title mb-3 text-center">{{ $job->title }} – Category Wise Post</h2>

                                @php
                                    $categories = [
                                        'General' => $job->genral_post,
                                        'EWS' => $job->ews_post,
                                        'OBC' => $job->obc_post,
                                        'SC' => $job->sc_post,
                                        'ST' => $job->st_post,
                                    ];

                                    // Prepare array of posts
                                    $allPosts = [];

                                    foreach ($categories as $catName => $catData) {
                                        $posts = explode('#', $catData);
                                        foreach ($posts as $post) {
                                            $parts = explode('$', $post);
                                            $postName = trim($parts[0] ?? '');
                                            $count = intval($parts[1] ?? 0);

                                            if (!isset($allPosts[$postName])) {
                                                $allPosts[$postName] = [
                                                    'General' => 0,
                                                    'EWS' => 0,
                                                    'OBC' => 0,
                                                    'SC' => 0,
                                                    'ST' => 0,
                                                    'total' => 0,
                                                ];
                                            }
                                            $allPosts[$postName][$catName] = $count;
                                            $allPosts[$postName]['total'] += $count;
                                        }
                                    }
                                @endphp

                                <div class="table-responsive">
                                    <table class="table table-bordered text-center align-middle">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Post Name</th>
                                                <th>General</th>
                                                <th>EWS</th>
                                                <th>OBC</th>
                                                <th>SC</th>
                                                <th>ST</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allPosts as $postName => $data)
                                                <tr>
                                                    <td class="text-start">{{ $postName }}</td>
                                                    <td>{{ $data['General'] }}</td>
                                                    <td>{{ $data['EWS'] }}</td>
                                                    <td>{{ $data['OBC'] }}</td>
                                                    <td>{{ $data['SC'] }}</td>
                                                    <td>{{ $data['ST'] }}</td>
                                                    <td>{{ $data['total'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Mode Of Selection -->
                    <div class="col-md-6 mb-3 section-box" id="selection">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h2 class="card-title mb-3 text-center" id="selection-process">
                                    {{ $job->title }} – Mode Of Selection
                                </h2>

                                <ul class="list-group list-group-flush">
                                    @php
                                        $modes = explode(',', $job->mode_selection);
                                        $p = 1;
                                    @endphp

                                    @foreach ($modes as $mode)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ trim($mode) }}</span>
                                            <span class="badge bg-primary">Step {{ $p++ }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div class="container mt-4 section-box" id="details">

                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="container mt-4">
                            <div class="card shadow-sm">
                                <div class="card-body">

                                    <!-- Title -->
                                    <h2 class="card-title mb-4 text-center">
                                        {{ $job->title }} – Post Details
                                    </h2>

                                    @php
                                        $names = explode('#', $job->post_name);
                                        $eligibilities = explode('#', $job->post_eligibility);
                                        $salaries = explode('#', $job->post_salary);

                                        $total = count($names);
                                    @endphp

                                    <!-- Header Row -->
                                    <div class="row fw-bold border-bottom pb-2 mb-2" id="eligibility">
                                        <div class="col-md-1">Sno</div>
                                        <div class="col-md-3">Post Name</div>
                                        <div class="col-md-5">Eligibility</div>
                                        <div class="col-md-3 text-end">Salary</div>
                                    </div>

                                    @for ($i = 0; $i < $total; $i++)
                                        <div class="row py-3 border-bottom align-items-center">

                                            <!-- Sno -->
                                            <div class="col-md-1 text-muted" style="font-size: 13px;">
                                                {{ $i + 1 }}
                                            </div>

                                            <!-- Post Name -->
                                            <div class="col-md-3 fw-semibold" style="font-size: 15px;">
                                                {{ trim($names[$i] ?? '') }}
                                            </div>

                                            <!-- Eligibility -->
                                            <div class="col-md-5" style="font-size: 14px; line-height: 1.6;">
                                                {{ trim($eligibilities[$i] ?? '') }}
                                            </div>

                                            <!-- Salary -->
                                            <div class="col-md-3 text-end text-success fw-semibold"
                                                style="font-size: 14px;">
                                                {{ trim($salaries[$i] ?? 'N/A') }}
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

                <div class="card shadow-sm section-box" id="instruction">
                    <div class="card-body">

                        <h2 class="card-title mb-4 text-center" id="online-form">
                            {{ $job->title }} – Online Form Fill Instruction
                        </h2>

                        <ul class="list-group list-group-flush">
                            @php
                                $instructions = explode('#', $job->instruction);
                            @endphp

                            @foreach ($instructions as $instruction)
                                <li class="list-group-item">
                                    <b>{{ $loop->iteration }}.</b> {!! $instruction !!}
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>







            <div class="container mt-4 section-box" id="links">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">
                            {{ $job->title }} – Important Links
                        </h2>

                        <div class="row text-center">
                            @php
                                // Replace multiple # with single # and remove trailing #
                                $cleanLinks = rtrim(preg_replace('/#+/', '#', $job->link), '#');

                                // Split by '#' for multiple links
                                $links = explode('#', $cleanLinks);
                            @endphp

                            @foreach ($links as $link)
                                @php
                                    $link = trim($link);
                                    if (empty($link)) {
                                        continue;
                                    }

                                    // Split by $ for title and url
                                    $parts = explode('$', $link);
                                    $title = $parts[0] ?? 'Link Title';
                                    $url = $parts[1] ?? '#';
                                @endphp

                                <div class="col-md-4 mb-3">
                                    <div class="border p-3 rounded h-100 d-flex flex-column justify-content-between">
                                        <h5>{{ $title }}</h5>
                                        <a href="{{ $url }}" class="btn btn-danger mt-2" target="_blank">
                                            Click Here
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mt-4 section-box" id="docs">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title text-center mb-4" id="documents">
                            {{ $job->title }} – Documents Required
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th style="width:10%">S.No</th>
                                        <th style="width:30%">Documents Name</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Split comma-separated documents
                                        $docs = explode('#', $job->doc);
                                    @endphp

                                    @foreach ($docs as $index => $doc)
                                        @php
                                            // Split each doc into title and details
                                            $parts = explode('-', $doc);
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="fw-bold">{{ $parts[0] ?? 'Title' }}</td>
                                            <td>{{ $parts[1] ?? 'Details' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <style>

            </style>
            <div class="container mt-3" id="admit">
                <div class="card shadow-sm border-0 admit-card">

                    <!-- Header -->
                    <div class="card-header text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold">
                            {{ $job->title }} – Admit Card
                        </h6>
                        <span class="badge bg-light text-success fw-bold">
                            Released
                        </span>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-3">

                        <!-- Exam + Button Row -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">

                            <div class="small">
                                <i class="fa-solid fa-calendar-days"></i>
                                Exam: <b>March 2026</b>
                            </div>

                            <a href="{{ $job->admit_card_link }}" target="_blank" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-download"></i> Download
                            </a>

                        </div>

                        <!-- Divider -->
                        <hr class="my-2">

                        <!-- Info Grid -->
                        <div class="row small">

                            <div class="col-md-6 mb-2">
                                <i class="fa-solid fa-key"></i>
                                Login: Reg No / DOB
                            </div>

                            <div class="col-md-6 mb-2">
                                <i class="fa-solid fa-location-dot"></i>
                                Center: Check Admit Card
                            </div>

                            <div class="col-md-6 mb-2">
                                <i class="fa-solid fa-id-card"></i>
                                Carry ID Proof
                            </div>

                            <div class="col-md-6 mb-2">
                                <i class="fa-solid fa-print"></i>
                                Print A4 Size
                            </div>

                        </div>

                        <!-- Instructions -->
                        <div class="mt-2 p-2 bg-light rounded small">
                            <b><i class="fa-solid fa-circle-info"></i> Steps:</b>
                            Login → Download → Print
                        </div>

                        <!-- Warning -->
                        <div class="alert alert-danger mt-2 py-1 px-2 small text-center mb-0">
                            Admit Card mandatory for entry
                        </div>

                    </div>
                </div>
            </div>
            <style>
                .admit-card .card-header {
                    background: linear-gradient(45deg, #007bff, #0056b3);
                    padding: 10px 15px;
                }

                .admit-card .btn {
                    padding: 4px 10px;
                    font-size: 13px;
                }

                .admit-card hr {
                    margin: 6px 0;
                }

                .admit-card i {
                    margin-right: 4px;
                    color: #555;
                }
            </style>

            <div class="container mt-5 section-box" id="faq">
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
            </div>
        </div>

    </main>
@endsection
