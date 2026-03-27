@extends('layouts.app')

@section('title')
    {{ $resultCard->title }} Admit Card 2026 Download
@endsection

@section('meta_description')
    Download {{ $resultCard->title }} Admit Card 2026. Check exam dates, hall ticket and official link.
@endsection

@section('content')
    <style>
        .section-box .card {
            border-radius: 12px;
            transition: 0.3s;
        }

        .section-box .card:hover {
            transform: translateY(-5px);
        }
    </style>
    <div class="container mt-4">
        <div class="container mt-3">
            <img src="https://sarkarihai.com/public/job-images/{{ $resultCard->logo }}" class="img-fluid banner-img"
                alt="Job Image">
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
                                        {{ !empty($resultCard->title) ? $resultCard->title : $resultCard->job_title }} - Result Out 2026
                                    </h1>
                                </div>
                                <div class="card-body">

                                    <p>
                                    <p>
                                        The
                                        <strong>
                                            @if (!empty($resultCard->title))
                                                <a href="{{ url('sarkari-naukri/' . \Str::slug($resultCard->title)) }}">
                                                    {{ $resultCard->title }}
                                                </a>
                                            @else
                                                <a href="{{ url('/') }}">
                                                    {{ $resultCard->job_title }}
                                                </a>
                                            @endif
                                        </strong>
                                        result has been officially <strong>released</strong>
                                        @if (!empty($resultCard->advertisement_no))
                                            for candidates who applied under <strong>Advertisement No.
                                                {{ $resultCard->advertisement_no }}</strong>
                                        @else
                                            for eligible candidates
                                        @endif.
                                    </p>

                                    <p>
                                        Applicants for the <strong>{{ $resultCard->total_vacancies ?? 'multiple' }}
                                            vacancies</strong>
                                        @if (!empty($resultCard->post_name))
                                            ({{ implode(', ', array_map('trim', explode('#', $resultCard->post_name))) }})
                                        @endif
                                        can now
                                        <a href="{{ url('/') }}" target="_blank">
                                            <strong>check their results, download admit cards, and verify exam
                                                details</strong>
                                        </a>
                                        through the official portal.
                                    </p>
                                    @if (!empty($resultCard->exam_list))
                                        @php
                                            if (is_array($resultCard->exam_list)) {
                                                $exams = $resultCard->exam_list;
                                            } else {
                                                $exams = explode('#', $resultCard->exam_list);
                                            }
                                        @endphp

                                        <p>
                                            As per the latest notification, the <strong>exam schedule</strong> is as
                                            follows:
                                            <strong>
                                                @foreach ($exams as $exam)
                                                    @php
                                                        if (is_array($exam)) {
                                                            $name = $exam['name'] ?? '';
                                                            $date = $exam['date'] ?? 'To Be Announced';
                                                        } else {
                                                            $parts = explode('$', $exam);
                                                            $name = $parts[0] ?? '';
                                                            $date = !empty($parts[1])
                                                                ? date('d M Y', strtotime($parts[1]))
                                                                : 'To Be Announced';
                                                        }
                                                    @endphp

                                                    {{ $name }} ({{ $date }})@if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </strong>.
                                        </p>
                                    @endif

                                    <p>
                                        Candidates must carefully check their <strong>exam date, admit card, result status,
                                            exam center, shift timing, and important instructions</strong> as provided in
                                        the official update.
                                    </p>

                                    <p>
                                        To avoid last-minute issues, all candidates are advised to <strong>download admit
                                            cards, check exam schedule, and follow official Sarkari Naukri
                                            notifications</strong> well in advance.
                                    </p>

                                    For the
                                    <strong>direct link, latest Sarkari result updates, government job notifications,
                                        admit cards, answer keys, and exam alerts</strong>,
                                    visit
                                    <a href="https://sarkarihai.com" target="_blank">
                                        <strong>SarkariHai.com</strong>
                                    </a>, your trusted platform for
                                    <strong>Sarkari jobs, results, admit cards, and सरकारी नौकरी updates</strong>.
                                    </p>


                                    <h2 class="mt-3">📌 {{ $resultCard->title }} – Post Details, Salary, Eligibility &
                                        Exam
                                        Date</h2>

                                    <ul class="list-unstyled job-details">

                                        <li>
                                            <strong>Post Name:</strong>
                                            {{ !empty($resultCard->post_name) ? str_replace('#', ', ', $resultCard->post_name) : 'Various Posts' }}
                                        </li>

                                        <li>
                                            <strong>Salary / Pay Scale:</strong>
                                            ₹{{ number_format($resultCard->min_salary ?? 0) }} -
                                            ₹{{ number_format($resultCard->max_salary ?? 0) }}
                                        </li>

                                        <li>
                                            <strong>Educational Qualification:</strong>
                                            {{ !empty($resultCard->min_qulification) ? $resultCard->min_qulification : 'Check Official Notification' }}
                                        </li>

                                        <li>
                                            <strong>Age Limit:</strong>
                                            {{ $resultCard->min_age ?? 'N/A' }} Years
                                            @if (!empty($resultCard->max_age))
                                                - {{ $resultCard->max_age }} Years
                                            @endif
                                        </li>

                                        <li>
                                            <strong>Total Vacancies:</strong>
                                            {{ !empty($resultCard->total_vacancies) ? number_format($resultCard->total_vacancies) : 'N/A' }}
                                        </li>

                                        @php
                                            // $examData =
                                            //     "Written Exam$2025-11-02#Physical Standard Test$2026-01-05#Computer Typing Test$2026-02-21#Stenography Test$2026-02-28";
                                            $exams = explode('#', $resultCard->exam_dates); // Split by #
                                        @endphp

                                        <ul>
                                            @foreach ($exams as $exam)
                                                @php
                                                    $parts = explode('$', $exam); // Split by $
                                                    $name = $parts[0] ?? '';
                                                    $date = $parts[1] ?? '';
                                                @endphp
                                                <li>
                                                    <strong>{{ $name }}:</strong> {{ $date }}
                                                </li>
                                            @endforeach

                                            <li><p>{{$resultCard->age_p}}</p></li>
                                            <li><p>{{$resultCard->vaccancy_p}}</p></li>
                                            <li><p>{{$resultCard->category_p}}</p></li>
                                            <li><p>{{$resultCard->selection_p}}</p></li>
                                            <li><p>{{$resultCard->post_p}}</p></li>
                                        </ul>
                                        <li class="mt-3">
                                            <a href="{{ url('/') }}" class="btn btn-success">
                                                👉 View Details • Check Notification • Apply Online
                                            </a>
                                        </li>

                                    </ul>

                                    <p>
                                        Read the notification for recruitment eligibility, post information, selection
                                        procedure, Physical Eligibility, pay scale and all other information..
                                    </p>

                                    <p style="color: red">
                                        <strong>Note –</strong> सभी उम्मीदवारों से अनुरोध किया जाता है कि वे अपना
                                        <strong>Admit Card डाउनलोड करने से पहले Official Notification</strong> को ध्यान से
                                        जरूर पढ़ें।
                                        Admit Card पर दिए गए <strong>Exam Date, Exam Center, Shift Timing, Reporting
                                            Time</strong>
                                        और अन्य महत्वपूर्ण निर्देशों को ध्यानपूर्वक जांच लें। परीक्षा के दिन
                                        <strong>Admit Card के साथ एक वैध ID Proof</strong> अवश्य लेकर जाएं।
                                    </p>

                                    <p>{{$resultCard->main_p}}</p>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row gy-4">

            
            <div class="col-md-6 d-flex">
                <div class="card w-100 h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">

                        <h2 class="card-title mb-3 text-center">
                            {{ $resultCard->job_title ?? 'Admit Card' }} – Important Dates
                        </h2>
                        <p>{{$resultCard->date_p}}</p>
                        <ul class="list-group list-group-flush flex-grow-1">
                            @if (!empty($resultCard->exam_list))
                                @foreach ($resultCard->exam_list as $exam)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Exam Date ({{ $loop->iteration }}) - {{ $exam['name'] }}</span>
                                        <span class="badge bg-primary">
                                            {{ $exam['date'] ?? ($exam['exam_dates'] ?? 'To Be Announced') }}
                                        </span>
                                    </li>
                                @endforeach
                            @endif
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Admit Card Release Date</span>
                                <span class="badge bg-success">
                                    {{ date('d M Y', strtotime($resultCard->admit_card_release_date)) }}
                                </span>
                            </li>
                            @if (!empty($resultCard->result_card_release_date))
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Result Release Date</span>
                                    <span class="badge bg-success">
                                        {{ date('d M Y', strtotime($resultCard->result_card_release_date)) }}
                                    </span>
                                </li>
                            @endif



                        </ul>

                    </div>
                </div>
            </div>

            <!-- Important Links -->
            <div class="col-md-6 d-flex">
                <div class="card w-100 h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">

                        <h2 class="card-title mb-3 text-center text-primary fw-bold" style="color: #fff !important;">
                            🔗 {{ $resultCard->job_title ?? 'Admit Card' }} – Important Links
                        </h2>
                        <p>{{$resultCard->fee_p}}</p>
                        <ul class="list-group list-group-flush flex-grow-1">

                            @if (!empty($resultCard->official_link))
                                @php $links = explode('#', $resultCard->official_link); @endphp

                                @foreach ($links as $link)
                                    @php $data = explode('$', $link); @endphp

                                    @if (count($data) == 2)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">

                                            <span class="fw-semibold">
                                                👉 {{ trim($data[0]) }}
                                            </span>

                                            <a href="{{ trim($data[1]) }}" target="_blank"
                                                class="btn btn-sm btn-success fw-bold">
                                                View
                                            </a>

                                        </li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>

                    </div>
                </div>
            </div>

        </div>

        <!-- How to Download Admit Card -->
        <div class="col-12 section-box mt-4" id="how-to-download" style="color: #fff">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h2 class="card-title mb-3 text-center text-success fw-bold">
                        📥 {{ $resultCard->job_title ?? 'Admit Card' }} – How to Download Admit Card
                    </h2>

                    <ul class="list-group list-group-numbered">

                        @if (!empty($resultCard->how_to_download_result_card))
                            @php
                                $steps = explode('#', $resultCard->how_to_download_result_card);
                            @endphp

                            @foreach ($steps as $step)
                                @if (!empty(trim($step)))
                                    <li class="list-group-item">
                                        {{ trim($step) }}
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li class="list-group-item text-muted">
                                Steps will be updated soon.
                            </li>
                        @endif

                    </ul>

                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="col-12 section-box mt-4" id="faq">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h2 class="card-title text-center fw-bold mb-4 text-primary">
                        ❓ {{ $resultCard->job_title ?? 'Result Out' }} – Frequently Asked Questions (FAQs)
                    </h2>

                    @php
                        $title = $resultCard->job_title ?? 'Result Out';
                        $examDate = $resultCard->exam_list[0]['date'] ?? '';
                        $releaseDate = $resultCard->result_card_release_date ?? '';
                    @endphp

                    <div class="accordion" id="faqAccordion">

                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    When will the {{ $title }} admit card be released?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The admit card is expected to be released on
                                    <strong>{{ $releaseDate ?: 'the official date announced by authority' }}</strong>.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is the exam date for {{ $title }}?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The exam is scheduled on
                                    <strong>{{ $examDate ?: 'the officially घोषित exam date' }}</strong>.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How can I download the {{ $title }} admit card?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Candidates can download their admit card by visiting the official website, entering
                                    login details, and downloading the hall ticket PDF.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What details are mentioned on the admit card?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The admit card contains candidate name, roll number, exam date, shift timing, exam
                                    center, and important instructions.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#faq5">
                                    What documents should I carry with the admit card?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Candidates must carry a printed admit card along with a valid photo ID proof like
                                    Aadhaar Card, PAN Card, or Driving License.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Exam List -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">📅 Upcoming Exams</h4>
            </div>

            <div class="card-body">

                @if (!empty($resultCard->exam_list))
                    <ul class="list-group">
                        @foreach ($resultCard->exam_list as $exam)
                            <li class="list-group-item d-flex justify-content-between align-items-start">

                                <div>
                                    <strong>{{ $exam['name'] }}</strong><br>

                                    <!-- Raw Exam Date from DB -->
                                    <small>
                                        {!! nl2br(str_replace('#', '<br>', $exam['date'] ?? ($exam['exam_dates'] ?? 'To Be Announced'))) !!}
                                    </small>
                                </div>

                                <!-- Optional Badge -->
                                <span class="badge bg-primary">Complted</span>

                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-danger">No Upcoming Exams Found</p>
                @endif

            </div>
        </div>


    </div>

@endsection
