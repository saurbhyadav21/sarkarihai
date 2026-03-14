<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tools Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* page background */
        body {
            background: #0b1224;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        /* navbar style */
        .navbar {
            background: #0b1224;
            border-bottom: 1px solid #e5e7eb;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            color: #fff;
        }

        /* brand */
        .navbar-brand {
            font-weight: 600;
            color: #ff7a18;
        }

        /* menu link */
        .nav-link {
            color: #fff;
            padding-right: 30px !important;
            padding-left: 30px !important;
        }

        /* hover */
        .nav-link:hover {
            color: #ff7a18;
            border: 1px #fff solid;
        }

        /* button style */
        .btn-custom {
            background: #ff7a18;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background: #e86a10;
        }

        /* search input */
        .form-control {
            border: 1px solid #e5e7eb;
        }

        .banner-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 6px;
        }

        .card-title {
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            background: #111a35;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 5px;
            border-left: 4px solid #ff7a18;
        }

        .ytot-share {
            padding: 32px 24px;
            color: #fff;
            background: #1e293b;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md) 0 4px 12px rgba(0, 0, 0, 0.4);
            margin-bottom: 48px;
            border: 1px solid var(--border);
            text-align: left;
        }
    </style>

</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Sarakrihai</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">




                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Admit Card</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Result</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Syllabus</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Answer Key</a>
                        </li>



                    </ul>

                    <form class="d-flex" style="margin-left: 10px;">
                        <input class="form-control me-2" type="search" placeholder="Search Tools">
                        <button class="btn btn-custom" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0">
        <div class="container mt-3">
            <img src="https://sarkariresult.com.cm/wp-content/uploads/2026/03/UPPSC-PCS-Result-2025-1764589055980.jpg"
                class="img-fluid banner-img" alt="Result Banner">
        </div>

        @php
            use Illuminate\Support\Facades\DB;

            // jobs table से data get करना
            $job = DB::table('job_details')->select('*')->where('id', 1)->first();

        @endphp

        <div class="container mt-3">


            <div class="row align-items-stretch gy-4" style="margin-bottom: 10px;">

                <!-- Important Info -->
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-body">

                            <h2 class="card-title">{{ $job->title }}</h2>

                            <p class="mb-0">
                                {{ $job->desce }}
                            </p>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-stretch gy-4" id="date-fee">

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
                                    <b>Age Relaxation :</b> As per rules
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
                            {{ $job->title }} – Post & Eligibility

                        </h2>

                        <!-- Header -->
                        <div class="row mb-3 text-center"
                            style="border-bottom:3px solid #ff7a18; padding-bottom:10px;">

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

                                    <h2 class="card-title mb-4 text-center">Post & Eligibility</h2>

                                    @php
                                        // explode comma-separated values into arrays
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
                                                <br><br>
                                                <span class="fw-bold text-success">Pay Scale :
                                                    ₹{!! trim($salaries[$i]) !!}</span>
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

                            @foreach($instructions as $instruction)
                                <li class="list-group-item">{!! $instruction !!}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>





            {{-- <div class="container mt-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h2 class="card-title text-center mb-4">
                            {{ $job->title }} – Important Questions
                        </h2>

                        <div class="accordion" id="faqAccordion">

                            <!-- Question 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#q1">
                                        When will the online application for MPESB Group 5 Paramedical Recruitment 2026
                                        start?
                                    </button>
                                </h2>
                                <div id="q1" class="accordion-collapse collapse show"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        The online application for this recruitment will start from <b>13 March
                                            2026</b>.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#q2">
                                        What is the last date for MPESB Group 5 Paramedical Online Form 2026?
                                    </button>
                                </h2>
                                <div id="q2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        The last date for online application is <b>27 March 2026</b>.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#q3">
                                        What is the age limit for MPESB Group 5 Paramedical Bharti 2026?
                                    </button>
                                </h2>
                                <div id="q3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Minimum Age : <b>18 Years</b><br>
                                        Maximum Age : <b>40 – 45 Years</b> (Category Wise)<br>
                                        Age calculated as on <b>01 January 2026</b>.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#q4">
                                        What is the eligibility for MPESB Group 5 Paramedical Vacancy 2026?
                                    </button>
                                </h2>
                                <div id="q4" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        The eligibility criteria for this recruitment are based on the official
                                        notification rules. Candidates should check the detailed notification for
                                        complete eligibility information.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#q5">
                                        What is the official website for MPESB?
                                    </button>
                                </h2>
                                <div id="q5" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        The official website for MPESB is:<br>
                                        <a href="https://esb.mp.gov.in/e_default.html" target="_blank">
                                            https://esb.mp.gov.in
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div> --}}

            <div class="container mt-4">

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

    @foreach($links as $link)
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
                @if(isset($parts[2]))
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

            </div>


            <div class="container mt-4">

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

            @foreach($docs as $doc)
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

            </div>


            <div class="container mt-5">
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
        <footer class="bg-dark text-light pt-5 pb-3 mt-5">
            <div class="container">
                <div class="row">

                    <!-- About Website -->
                    <div class="col-md-4 mb-4">
                        <h5 class="mb-3">About Us</h5>
                        <p>
                            Our website provides the latest updates on government jobs, admit cards,
                            results, answer keys and online forms. Stay updated with the latest
                            recruitment notifications across India.
                        </p>
                    </div>

                    <!-- Important Links -->
                    <div class="col-md-4 mb-4">
                        <h5 class="mb-3">Important Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-light text-decoration-none">Latest Jobs</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Admit Card</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Results</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Answer Key</a></li>
                            <li><a href="#" class="text-light text-decoration-none">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-4 mb-4">
                        <h5 class="mb-3">Contact Info</h5>
                        <p>Email: info@example.com</p>
                        <p>Phone: +91 9876543210</p>

                        <!-- Social Media -->
                        <div>
                            <a href="#" class="text-light me-3">Facebook</a>
                            <a href="#" class="text-light me-3">Twitter</a>
                            <a href="#" class="text-light me-3">Instagram</a>
                            <a href="#" class="text-light">YouTube</a>
                        </div>
                    </div>

                </div>

                <hr class="border-light">

                <!-- Copyright -->
                <div class="text-center">
                    <p class="mb-0">
                        © 2026 YourWebsiteName.com | All Rights Reserved
                    </p>
                </div>

            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
