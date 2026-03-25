@extends('layouts.app')

@section('title')
    {{ $admitCard->title }} Admit Card 2026 Download
@endsection

@section('meta_description')
    Download {{ $admitCard->title }} Admit Card 2026. Check exam dates, hall ticket and official link.
@endsection

@section('content')

    <div class="container mt-4">
        <div class="container mt-3">
            <img src="https://sarkarihai.com/public/job-images/1774179425.png" class="img-fluid banner-img" alt="Job Image">
        </div>
        <div class="row align-items-stretch gy-4" style="margin-bottom: 10px;">

            <!-- Important Info -->
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">


                        <div class="container my-5">

                            <div class="card shadow">
                                <div class="card-header bg-primary text-white">
                                    <h1 class="mb-0">
                                        {{ $job->title }} - Admit Card 2026 Out
                                    </h1>
                                </div>
                                <div class="card-body">

                                    <p>
    The 
    <strong>
        <a href="{{ url('sarkari-naukri/' . \Str::slug($job->title)) }}">
            {{ $job->title }}
        </a>
    </strong> 
    has been officially released by 
    <strong>{{ $job->category ?? 'the organization' }}</strong> 

    @if(!empty($job->advertisement_no))
        for candidates who applied under 
        <strong>{{ $job->advertisement_no }}</strong>
    @else
        for eligible candidates
    @endif.

    Applicants for the 
    <strong>
        {{ $job->total_vacancies ?? 'multiple' }} vacancies 
        @if(!empty($job->post_name))
            (
            {{ implode(', ', array_map('trim', explode('#', $job->post_name))) }}
            )
        @endif
    </strong> 
    can now 
    <a href="{{ url('sarkari-naukri/' . \Str::slug($job->title)) }}" target="_blank">
        <strong>check details and download updates</strong>
    </a> through the official portal.

    @if(!empty($admitCard->exam_list))
        As per the latest update, the 
        <strong>exam date</strong> is scheduled for 
        <strong>
            @foreach($admitCard->exam_list as $exam)
                {{ \Carbon\Carbon::parse($exam['date'])->format('d M Y') }}@if(!$loop->last), @endif
            @endforeach
        </strong>.
    @endif

    Candidates must check their 
    <strong>exam date, admit card, result status, exam center, shift timing, and important instructions</strong> 
    mentioned on the official update.

    To avoid last-minute issues, candidates are advised to 
    <strong>check updates and download required documents</strong> as early as possible.

    For the 
    <strong>direct link, latest Sarkari result updates, government job notifications, admit cards, answer keys, and exam alerts</strong>, 
    visit 
    <a href="https://sarkarihai.com" target="_blank">
        <strong>SarkariHai.com</strong>
    </a>, your trusted platform for 
    <strong>Sarkari jobs, results, admit cards, and सरकारी नौकरी updates</strong>.
</p>

                                    <h5>Post Details:</h5>
                                    <ul>
                                        <li><strong>Post Name:</strong>
                                            Assistant Audit Officer, Assistant Section Officer, Inspector of Income Tax,
                                            Central Excise Inspector, Sub Inspector CBI, Junior Statistical Officer,
                                            Auditor, Tax Assistant, Upper Division Clerk</li>
                                        <li><strong>Salary:</strong> ₹25,500 -
                                            ₹151,100</li>
                                        <li><strong>Minimum Qualification:</strong>
                                            Graduate
                                        </li>
                                        <li><strong>Minimum Age:</strong> 18 years</li>
                                        <li><strong>Total Vacancies:</strong>
                                            15,130</li>
                                        <li><strong>Exam Date:</strong>
                                            To Be Announced
                                        </li>



                                    </ul>

                                    <p>
                                        Read the notification for recruitment eligibility, post information, selection
                                        procedure, Physical Eligibility, pay scale and all other information..
                                    </p>

                                   <p>
<strong>Note –</strong> सभी उम्मीदवारों से अनुरोध किया जाता है कि वे अपना 
<strong>Admit Card डाउनलोड करने से पहले Official Notification</strong> को ध्यान से जरूर पढ़ें। 
Admit Card पर दिए गए <strong>Exam Date, Exam Center, Shift Timing, Reporting Time</strong> 
और अन्य महत्वपूर्ण निर्देशों को ध्यानपूर्वक जांच लें। परीक्षा के दिन 
<strong>Admit Card के साथ एक वैध ID Proof</strong> अवश्य लेकर जाएं।
</p>

                                    

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
                            SSC Combined Graduate Level CGL Recruitment 2025 – Important Dates
                        </h2>

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Apply Online Start Date</span>
                                <span class="badge bg-success">2025-06-09</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Apply Online Last Date</span>
                                <span class="badge bg-danger">2025-07-04</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Last Date For Fee Payment</span>
                                <span class="badge bg-warning text-dark">2025-07-05</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Correction Last Date</span>
                                <span class="badge bg-info text-dark">2025-07-10</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Exam Date</span>
                                <span class="badge bg-primary">To Be Announced</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Admit Card</span>
                                <span class="badge bg-secondary">To Be Announced</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Result Date</span>
                                <span class="badge bg-dark">To Be Announced</span>
                            </li>

                            <li class="list-group-item text-center">

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
                            SSC Combined Graduate Level CGL Recruitment 2025 – Application Fee
                        </h2>

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>General Fees</span>
                                <span class="badge bg-primary">₹100/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>OBC Fees</span>
                                <span class="badge bg-info text-dark">₹100/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>SC Fees</span>
                                <span class="badge bg-success">₹0/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>ST Fees</span>
                                <span class="badge bg-secondary">₹0/-</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Portal Charge</span>
                                <span class="badge bg-warning text-dark">₹0/-</span>
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
        <!-- Title -->
        <div class="card shadow mb-3">
            <div class="card-body text-center">
                <h1>{{ $admitCard->title }}</h1>
                <p class="text-muted">Latest Admit Card Updates</p>
            </div>
        </div>

        <!-- Exam List -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">📅 Upcoming Exams</h4>
            </div>

            <div class="card-body">

                @if (count($admitCard->exam_list) > 0)
                    <ul class="list-group">

                        @foreach ($admitCard->exam_list as $exam)
                            @php
                                $date = \Carbon\Carbon::parse($exam['date']);
                                $today = \Carbon\Carbon::now();

                                $diff = $today->diffInDays($date, false);
                            @endphp

                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <div>
                                    <strong>{{ $exam['name'] }}</strong><br>
                                    <small>{{ $date->format('d M Y') }}</small>
                                </div>

                                <!-- Badge Logic -->
                                @if ($date->isToday())
                                    <span class="badge bg-success">Today</span>
                                @elseif($diff <= 7)
                                    <span class="badge bg-warning text-dark">Within 7 Days</span>
                                @elseif($diff <= 14)
                                    <span class="badge bg-secondary">Within 2 Weeks</span>
                                @else
                                    <span class="badge bg-primary">Upcoming</span>
                                @endif

                            </li>
                        @endforeach

                    </ul>
                @else
                    <p class="text-center text-danger">No Upcoming Exams Found</p>
                @endif

            </div>
        </div>

        <!-- Download Button -->
        @if ($admitCard->link)
            <div class="text-center mt-4">
                <a href="{{ $admitCard->link }}" target="_blank" class="btn btn-success btn-lg">
                    🎟 Download Admit Card
                </a>
            </div>
        @endif

    </div>

@endsection
