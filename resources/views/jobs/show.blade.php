@extends('layouts.app')
@php
    $seoTitle =
        $job->title .
        ' Recruitment ' .
        date('Y') .
        ' | Apply Online, Eligibility, Exam Date, Admit Card, Result - SarkariHai.com';
@endphp
@section('title')
    {{ $seoTitle }}
@endsection

@section('meta_description')
    Apply online for {{ $job->title }} Recruitment {{ date('Y') }}. Check eligibility, application fee, age limit,
    important dates, admit card, and result details.
@endsection

@section('meta_keywords')
    {{ $job->title }}, {{ $job->title }} recruitment, {{ $job->title }} apply online, {{ $job->category }} jobs,
    government jobs {{ date('Y') }}
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
                background: #000;
                padding: 10px;
                border-radius: 8px;
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                transition: all 0.3s ease;
            }

            /* Buttons */
            .section-tabs button {
                border: none;
                background: #f1f1f1;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 13px;
                cursor: pointer;
            }

            .section-tabs button:hover {
                background: #007bff;
                color: #fff;
            }


            .section-box {
                margin-top: 30px;
                padding: 20px;
                border-radius: 12px;
                background: #000;
                box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
            }

            .sticky-active {
                position: fixed;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 100%;
                max-width: 1340px;
                z-index: 999;
                background: #000;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            /* 👇 jab sticky ho tab content niche shift */
            .add-space {
                margin-top: 80px;
                /* 👈 same height as menu */
            }

            #tabsSpacer {
                transition: height 0.3s ease;
            }

            .add-offset {
                padding-top: 120px;
                margin-top: -120px;
            }

            /* Tablet */
            @media (max-width: 992px) {
                .add-offset {
                    padding-top: 100px;
                    margin-top: -100px;
                }
            }

            /* Mobile */
            @media (max-width: 576px) {
                .add-offset {
                    padding-top: 140px;
                    margin-top: -140px;
                }
            }

            html {
                scroll-behavior: smooth;
            }

            .locked-card {
                position: relative;
                overflow: hidden;
            }

            .locked-card .card-body {
                filter: blur(3px);
                opacity: 0.5;
                pointer-events: none;
            }

            /* Overlay */
            .locked-card::after {
                content: "🔒 Coming Soon";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);

                background: rgba(0, 0, 0, 0.7);
                color: #fff;
                padding: 10px 20px;
                border-radius: 8px;
                font-weight: bold;
                font-size: 16px;
                letter-spacing: 0.5px;
                text-align: center;
            }

            .disabled-btn {
                cursor: not-allowed;
            }
        </style>

        <!-- JS -->
        <script>
            function scrollToSection(id) {

                // 👇 sabse pehle sab sections se remove
                document.querySelectorAll('.add-offset').forEach(el => {
                    el.classList.remove('add-offset');
                });

                // 👇 current section me add
                const target = document.getElementById(id);
                target.classList.add('add-offset');

                // 👇 scroll karo
                target.scrollIntoView({
                    behavior: "smooth"
                });

            }
        </script>





        <div class="container mt-3">
            <!-- Spacer (auto height milega) -->
            <div id="tabsSpacer"></div>
            <!-- Section Tabs -->
            <div class="section-tabs mb-3" id="stickyTabs">
                <button onclick="scrollToSection('admit')">
                    <i class="fa-solid fa-id-card"></i> Admit Card
                </button>

                <button onclick="scrollToSection('result')">
                    <i class="fa-solid fa-square-poll-vertical"></i> Result
                </button>
                <button onclick="scrollToSection('Syllabus')">
                    <i class="fa-solid fa-square-poll-vertical"></i> Syllabus
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
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
            @php
                function isLocked($value)
                {
                    return trim($value) == 'To Be Announced' || empty($value);
                }

                $admitLocked = isLocked($job->admit_card);
                $resultLocked = isLocked($job->result_date);

            @endphp

            {{-- ADmit card --}}
            <div class="container mt-3" id="admit">
                <div class="card admit-card border-0 {{ $admitLocked ? 'locked-card' : '' }}">

                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold text-white">
                            {{ $job->title }} – Admit Card Out
                        </h6>

                        <span
                            class="badge status-badge 
                {{ $admitLocked ? 'bg-dark' : 'bg-light text-success' }}">
                            {{ $admitLocked ? '🔒 Not Released' : '🟢 Released' }}
                        </span>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-3">

                        <!-- Top Info -->
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">

                            <!-- Exam Dates -->
                            <div class="small fw-semibold text-primary flex-grow-1">
                                <div class="mb-1">
                                    <i class="fa-solid fa-calendar-days"></i> <strong>Exam Dates:</strong>
                                </div>

                                @if (!empty($admitCard->exam_dates))
                                    @php $dates = explode('#', $admitCard->exam_dates); @endphp

                                    @foreach ($dates as $date)
                                        @php $data = explode('$', $date); @endphp

                                        @if (count($data) == 2)
                                            <div class="d-flex justify-content-between align-items-center exam-row">
                                                <span>{{ $loop->iteration }}. {{ trim($data[0]) }}</span>
                                                <span class="badge bg-primary">
                                                    {{ date('d M Y', strtotime($data[1])) }}
                                                </span>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-muted">Coming Soon</span>
                                @endif
                            </div>
                            <style>
                                @keyframes pulseGlow {
                                    0% {
                                        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.6);
                                    }

                                    70% {
                                        box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
                                    }

                                    100% {
                                        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
                                    }
                                }

                                .view-btn {
                                    background: linear-gradient(45deg, #28a745, #00c851);
                                    color: #fff;
                                    border-radius: 20px;
                                    font-weight: 600;
                                    animation: pulseGlow 2s infinite;
                                }

                                .view-btn:hover {
                                    transform: scale(1.05);
                                }
                            </style>
                            <!-- Button -->
                            <div>
                                {{-- <a href="{{ route('admit.show', $job->slug) }}" class="job-link"> --}}
                                {{-- <a href="{{ route('admit.show', $admitCard->slug) }}" class="btn view-btn">
    🔍 View Details
</a> --}}
                                {{-- <a href="{{ route('result.show', $result->slug) }}" class="btn"> --}}
                                @if ($admitCard)
                                    <a href="{{ route('admit.show', $admitCard->slug) }}" class="btn view-btn">
                                        🔍 View Details
                                    </a>
                                @else
                                    <a href="/" class="btn view-btn">
                                        🔍 View Details
                                    </a>
                                @endif
                            </div>

                        </div>

                        <!-- Info Grid -->
                        <div class="row g-3">

                            <!-- Release Date -->
                            <div class="col-md-6">
                                <div class="info-box d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="fa-solid fa-calendar-check text-success"></i>
                                        Admit Card Release
                                    </span>
                                    <span class="badge bg-success">
                                        {{ !empty($admitCard->admit_card_release_date)
                                            ? date('d M Y', strtotime($admitCard->admit_card_release_date))
                                            : 'Coming Soon' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Important Links -->
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="mb-1">
                                        <i class="fa-solid fa-link text-primary"></i>
                                        <strong>Important Links</strong>
                                    </div>

                                    @if (!empty($admitCard->official_link))
                                        @php $links = explode('#', $admitCard->official_link); @endphp

                                        @foreach ($links as $link)
                                            @php $data = explode('$', $link); @endphp

                                            @if (count($data) == 2)
                                                <a href="{{ trim($data[1]) }}" target="_blank"
                                                    class="d-flex justify-content-between align-items-center link-item">
                                                    <span>👉 {{ trim($data[0]) }}</span>
                                                    <span class="badge bg-light text-primary">Open</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- How to Download -->
                            <div class="col-12">
                                <div class="instruction-box">

                                    <h6 class="mb-2">
                                        <i class="fa-solid fa-download text-warning"></i>
                                        How to Download Admit Card
                                    </h6>

                                    @if (!empty($admitCard->how_to_download_admit_card))
                                        @php $steps = explode('#', $admitCard->how_to_download_admit_card); @endphp

                                        @foreach ($steps as $step)
                                            @if (!empty(trim($step)))
                                                <div class="step-item">
                                                    <span class="step-badge">{{ $loop->iteration }}</span>
                                                    <span>{{ trim($step) }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                            </div>

                        </div>

                        <!-- Warning -->
                        <div class="warning-box mt-3">
                            ⚠️ Admit Card is mandatory for exam entry
                        </div>

                    </div>
                </div>
            </div>
            <style>
                .admit-card {
                    border-radius: 12px;
                    overflow: hidden;
                    background: #fff;
                }

                /* Header Gradient */
                .admit-card .card-header {
                    background: linear-gradient(45deg, #ff6a00, #ee0979);
                    padding: 10px 15px;
                }

                /* Status Badge */
                .status-badge {
                    background: #fff;
                    color: #28a745;
                    font-weight: bold;
                    padding: 4px 10px;
                    border-radius: 20px;
                }

                /* Download Button */
                .download-btn {
                    background: linear-gradient(45deg, #007bff, #00c6ff);
                    color: #fff;
                    border: none;
                    padding: 5px 12px;
                    font-size: 13px;
                    border-radius: 20px;
                }

                .download-btn:hover {
                    opacity: 0.9;
                }

                /* Info Boxes */
                .info-box {
                    background: #f8f9fa;
                    padding: 6px 8px;
                    border-radius: 6px;
                }

                /* Steps */
                .steps-box {
                    background: #e3f2fd;
                    padding: 6px 10px;
                    border-radius: 6px;
                    font-size: 13px;
                }

                /* Instructions */
                .instruction-box {
                    background: #fff3cd;
                    border-left: 4px solid #ffc107;
                    padding: 10px;
                    border-radius: 6px;
                    font-size: 13px;
                }

                /* Warning */
                .warning-box {
                    background: #ffe5e5;
                    color: #d63031;
                    padding: 6px;
                    border-radius: 6px;
                    font-size: 13px;
                    text-align: center;
                }

                .view-btn {
                    background: linear-gradient(45deg, #28a745, #00c851);
                    color: #fff;
                    border: none;
                    padding: 6px 14px;
                    font-size: 13px;
                    border-radius: 20px;
                    font-weight: 600;
                }

                .view-btn:hover {
                    opacity: 0.9;
                }
            </style>

            {{-- Result --}}
            <div class="container mt-3" id="result">
                <div class="card admit-card border-0 {{ $resultLocked ? 'locked-card' : '' }}">

                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold text-white">
                            {{ $job->title }} – Result Out
                        </h6>
                        {{-- <span class="badge status-badge">
                            🟢 Result Declared
                        </span> --}}
                        <span
                            class="badge status-badge 
                            {{ $resultLocked ? 'bg-dark' : 'bg-light text-success' }}">

                            {{ $resultLocked ? '🔒 Not Released' : '🟢 Result Declared' }}

                        </span>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-3">

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="small fw-semibold text-success">
                                <i class="fa-solid fa-calendar-check"></i>
                                Result Date: {{ $result->result_card_release_date }}
                            </div>

                            {{-- <a href="{{ route('result.show', $result->slug) }}" class="btn">
                                <i class="fa-solid fa-square-poll-vertical"></i> Check Result
                            </a> --}}
                            <a href="{{ route('result.show', $result->slug) }}" class="btn view-btn">
                                🔍 View Details
                            </a>


                        </div>

                        <!-- Info -->


                        <!-- Steps -->


                        <!-- Instructions -->
                        <div class="instruction-box mt-2">
                            <h6 class="mb-2">
                                <i class="fa-solid fa-circle-info"></i> How to Check Result
                            </h6>
                            <ul class="mb-0 ps-3">
                                @php
                                    // Result steps ko '#' se split kar do
                                    $steps = explode('#', $result->how_to_download_result_card);
                                @endphp

                                @foreach ($steps as $step)
                                    @if (trim($step) != '')
                                        <li>{{ trim($step) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            {{-- syllbus --}}
            {{-- <div class="container mt-3" id="syllabus">
                <div class="card admit-card border-0 locked-card">

                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-bold text-white">
                            {{ $job->title }} – Syllabus
                        </h6>
                        <span class="badge status-badge">
                            📘 Available
                        </span>
                    </div>

                    <!-- Body -->
                    <div class="card-body p-3">

                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <div class="small fw-semibold text-primary">
                                <i class="fa-solid fa-book"></i>
                                Subject Wise Syllabus
                            </div>

                            <a href="{{ $job->syllabus_link }}" target="_blank" class="btn download-btn">
                                <i class="fa-solid fa-download"></i> Download PDF
                            </a>

                        </div>

                        <!-- Subjects -->
                        <div class="row small">

                            <div class="col-6 mb-2 info-box">
                                <i class="fa-solid fa-brain"></i>
                                Reasoning
                            </div>

                            <div class="col-6 mb-2 info-box">
                                <i class="fa-solid fa-calculator"></i>
                                Mathematics
                            </div>

                            <div class="col-6 mb-2 info-box">
                                <i class="fa-solid fa-globe"></i>
                                General Knowledge
                            </div>

                            <div class="col-6 mb-2 info-box">
                                <i class="fa-solid fa-language"></i>
                                English / Hindi
                            </div>

                        </div>

                        <!-- Steps -->
                        <div class="steps-box mt-2">
                            <i class="fa-solid fa-circle-info"></i>
                            Download → Read → Prepare
                        </div>

                        <!-- Instructions -->
                        <div class="instruction-box mt-2">
                            <h6 class="mb-2">
                                <i class="fa-solid fa-circle-info"></i> Syllabus Details
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li>Official syllabus PDF download karein.</li>
                                <li>Har subject ke topics check karein.</li>
                                <li>Important topics par focus karein.</li>
                                <li>Previous year questions practice karein.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div> --}}


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

    <script>
        const tabs = document.getElementById("stickyTabs");
        const content = document.getElementById("mainContent"); // 👈 neeche ka content wrapper

        const offset = tabs.offsetTop;
        const FIXED_HEIGHT = 80;

        window.addEventListener("scroll", function() {

            if (window.pageYOffset >= offset) {
                tabs.classList.add("sticky-active");
                content.classList.add("add-space");
            } else {
                tabs.classList.remove("sticky-active");
                content.classList.remove("add-space");
            }

        });
    </script>
@endsection
