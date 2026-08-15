@extends('layouts.front')
@section('content')
    <!-- ================= HERO ================= -->
    <style>
        .ticker-heading {
            display: inline-block;
            margin-top: 25px;
            padding: 8px 15px;
            background: #f4b400;
            color: #000;
            font-size: 15px;
            font-weight: 700;
            border-radius: 6px;
        }

        @media(max-width:991px) {

            .hero {
                padding: 35px 0;
            }

            .hero h1 {
                font-size: 34px;
                text-align: center;
            }

            .hero p {
                text-align: center;
                font-size: 16px;
            }

            .stats {
                margin-bottom: 15px;
            }

            .search-card {
                margin-top: 25px;
            }

        }

        @media(max-width:767px) {

            .hero {
                padding: 25px 0;
            }

            .hero h1 {
                font-size: 28px;
                line-height: 1.3;
            }

            .hero p {
                font-size: 15px;
                line-height: 1.7;
            }

            .stats h3 {
                font-size: 22px;
            }

            .stats small {
                font-size: 13px;
            }

            .search-card {
                padding: 18px;
            }

            .search-card h5 {
                font-size: 18px;
            }

            #jobSearch {
                font-size: 15px;
            }

        }

        @media(max-width:767px) {

            .search-dropdown {

                left: 0;

                right: 0;

                border-radius: 15px;

                max-height: 350px;

            }

            .search-item {

                padding: 15px;

            }

            .search-title {

                font-size: 14px;

            }

            .search-meta {

                font-size: 12px;

            }

        }

        .latest-ticker marquee {

            font-size: 13px;

        }

        .search-card {

            border-radius: 18px;

        }

        @media(max-width:767px) {

            .search-card {

                margin-top: 20px;

            }

        }
    </style>
    <div class="hero">
        <div class="container">

            <div class="row align-items-center">

                <!-- LEFT -->
                <div class="col-lg-8">

                    <h1>🏆 SarkariHai — Latest Sarakri Result, Sarkari Naukri & Government Jobs</h1>

                    <p>
                        Find the latest Sarkari Naukri 2026, Government Jobs, Admit Cards, Results, and Exam Updates in one
                        place.
                    </p>

                    <div class="row mt-4">

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>{{ number_format($totalJobs) }}+</h3>
                                <small>Jobs</small>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>{{ number_format($totalResults) }}+</h3>
                                <small>Results</small>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>{{ number_format($totalAdmitCards) }}+</h3>
                                <small>Admit Card</small>
                            </div>
                        </div>

                        {{-- <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>{{ $totalStates }}+</h3>
                                <small>States</small>
                            </div>
                        </div> --}}

                    </div>
                    <div class="latest-ticker">

                        <div class="ticker-heading"
                            style="margin-top: 30px;font-size: 15px;background: #f4b400;color: #000;border-radius: 5px;">
                            🔥 Latest Updates
                        </div>

                        <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();"
                            onmouseout="this.start();">

                            @foreach ($latestUpdates as $job)
                                <a href="{{ url(
                                    'sarkari-naukri/' . ($job->state ?? 'all-india') . '/' . ($job->category ?? 'government') . '/' . $job->slug,
                                ) }}"
                                    style="color: #fff;text-decoration: none;">
                                    {{ $job->title }}
                                </a>

                                <span class="ticker-separator">●</span>
                            @endforeach

                        </marquee>

                    </div>

                </div>
                <style>
                    /* DROPDOWN BOX */
                    .search-dropdown {
                        position: absolute;
                        top: 100%;
                        left: 0;
                        right: 0;
                        background: #fff;
                        border-radius: 20px;
                        overflow: hidden;
                        margin-top: 12px;
                        z-index: 99999;
                        box-shadow:
                            0 10px 30px rgba(0, 0, 0, .10),
                            0 1px 3px rgba(0, 0, 0, .08);
                        border: 1px solid #e8edf5;
                        max-height: 600px;
                        overflow-y: auto;
                    }

                    /* ITEM */
                    .search-item {
                        display: flex;
                        align-items: center;
                        gap: 5px;
                        padding: 24px;
                        text-decoration: none;
                        color: #111827;
                        border-bottom: 1px solid #edf2f7;
                        transition: all .2s ease;
                    }

                    .search-item:hover {
                        background: #f8fbff;
                        text-decoration: none;
                        color: #111827;
                    }

                    /* LEFT ICON */
                    .search-icon {

                        border-radius: 50%;
                        background: #eef4ff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 28px;
                        margin-top: 0px;
                    }

                    /* CONTENT */
                    .search-body {
                        flex: 1;
                    }

                    .search-title {
                        font-size: 11px;
                        font-weight: 700;
                        line-height: 1.4;
                        color: #0f172a;
                        margin-bottom: 10px;
                    }

                    .search-meta {
                        display: flex;
                        align-items: center;
                        gap: 5px;
                        flex-wrap: wrap;
                    }

                    .search-category {
                        color: #2563eb;
                        font-size: 13px;
                        font-weight: 500;
                    }

                    .search-separator {
                        color: #9ca3af;
                    }

                    .search-type {
                        color: #4b5563;
                        font-size: 13px;
                    }

                    /* RIGHT ARROW */
                    .search-arrow {
                        font-size: 13px;
                        color: #94a3b8;
                        transition: .2s;
                    }

                    .search-item:hover .search-arrow {
                        color: #2563eb;
                        transform: translateX(5px);
                    }

                    /* FOOTER */
                    .search-footer {
                        background: #f3f7fd;
                        display: flex;
                        align-items: center;
                        gap: 20px;
                        padding: 22px 28px;
                    }

                    .search-footer-icon {
                        width: 60px;
                        height: 60px;
                        background: #2563eb;
                        color: #fff;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 24px;
                    }

                    .search-footer-text {
                        flex: 1;
                        font-size: 22px;
                        color: #0f172a;
                    }

                    .search-footer-text strong {
                        color: #2563eb;
                    }

                    .search-footer-btn {
                        background: #2563eb;
                        color: #fff;
                        border: none;
                        padding: 15px 28px;
                        border-radius: 14px;
                        font-size: 18px;
                        font-weight: 600;
                        transition: .2s;
                    }

                    .search-footer-btn:hover {
                        background: #1d4ed8;
                    }

                    /* SCROLLBAR */
                    .search-dropdown::-webkit-scrollbar {
                        width: 8px;
                    }

                    .search-dropdown::-webkit-scrollbar-thumb {
                        background: #cbd5e1;
                        border-radius: 10px;
                    }

                    .search-dropdown::-webkit-scrollbar-track {
                        background: #f8fafc;
                    }
                </style>
                <!-- RIGHT SEARCH -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                <style>
                    .social-links {
                        display: flex;
                        gap: 8px;
                        margin-top: 15px;
                    }

                    .social-card {
                        flex: 1;
                        min-width: 0;

                        display: flex;
                        align-items: center;
                        gap: 7px;

                        padding: 9px 8px;

                        border-radius: 10px;

                        background: #fff;
                        border: 1px solid #e7ebf0;

                        text-decoration: none !important;

                        transition: all .25s ease;
                    }

                    .social-icon {
                        width: 30px;
                        height: 30px;
                        min-width: 30px;

                        display: flex;
                        align-items: center;
                        justify-content: center;

                        border-radius: 8px;

                        font-size: 14px;
                        font-weight: 700;

                        color: #fff;
                    }

                    .social-info {
                        min-width: 0;
                        flex: 1;
                        display: flex;
                        flex-direction: column;
                    }

                    .social-info strong {
                        font-size: 11px;
                        line-height: 1.2;
                        color: #26384a;
                    }

                    .social-info small {
                        font-size: 9px;
                        margin-top: 2px;
                        color: #8995a3;
                        white-space: nowrap;
                    }

                    .social-arrow {
                        font-size: 14px;
                        color: #aab3bd;
                        transition: transform .25s ease;
                    }


                    /* YouTube */

                    .youtube .social-icon {
                        background: #ff0000;
                    }

                    .youtube:hover {
                        border-color: #ffcccc;
                        background: #fff8f8;
                        transform: translateY(-2px);
                    }

                    .youtube:hover .social-arrow {
                        color: #ff0000;
                        transform: translateX(3px);
                    }


                    /* Instagram */

                    .instagram .social-icon {
                        background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
                    }

                    .instagram:hover {
                        border-color: #f0d5e5;
                        background: #fff9fc;
                        transform: translateY(-2px);
                    }

                    .instagram:hover .social-arrow {
                        color: #c13584;
                        transform: translateX(3px);
                    }


                    /* Telegram */

                    .telegram .social-icon {
                        background: #229ed9;
                    }

                    .telegram:hover {
                        border-color: #ccebf8;
                        background: #f7fcff;
                        transform: translateY(-2px);
                    }

                    .telegram:hover .social-arrow {
                        color: #229ed9;
                        transform: translateX(3px);
                    }


                    /* Mobile */

                    @media (max-width: 575px) {

                        .social-links {
                            gap: 6px;
                        }

                        .social-card {
                            padding: 8px 6px;
                            gap: 5px;
                        }

                        .social-icon {
                            width: 27px;
                            height: 27px;
                            min-width: 27px;
                            font-size: 12px;
                        }

                        .social-info strong {
                            font-size: 10px;
                        }

                        .social-info small {
                            font-size: 8px;
                        }

                        .social-arrow {
                            font-size: 12px;
                        }

                    }
                </style>
                <div class="search-card">

                    <h5 class="mb-3 fw-bold">
                        🔍 Search Sarkari Jobs
                    </h5>

                    <div class="position-relative">

                        <input type="text" id="jobSearch" class="form-control form-control-lg rounded-4 shadow-sm"
                            placeholder="Search SSC, Railway, UPSC..." autocomplete="off">

                        <div class="search-dropdown" style="display:none">
                        </div>

                    </div>

                </div>
                <div class="social-links">

                    <a href="YOUR_YOUTUBE_URL" target="_blank" rel="noopener" class="social-card youtube">

                        <span class="social-icon">▶</span>

                        <span class="social-info">
                            <strong>YouTube</strong>
                            <small>Watch Updates</small>
                        </span>

                        <span class="social-arrow">→</span>

                    </a>


                    <a href="YOUR_INSTAGRAM_URL" target="_blank" rel="noopener" class="social-card instagram">

                        <span class="social-icon">◎</span>

                        <span class="social-info">
                            <strong>Instagram</strong>
                            <small>Follow Us</small>
                        </span>

                        <span class="social-arrow">→</span>

                    </a>


                    <a href="YOUR_TELEGRAM_URL" target="_blank" rel="noopener" class="social-card telegram">

                        <span class="social-icon">✈</span>

                        <span class="social-info">
                            <strong>Telegram</strong>
                            <small>Join Alerts</small>
                        </span>

                        <span class="social-arrow">→</span>

                    </a>

                </div>
            </div>

        </div>

    </div>
    </div>

    <!-- =========================
                                                PART 2 - MAIN CONTENT BLOCK
                                                ========================= -->

    <style>
        .section-title {
            font-size: 22px;
            font-weight: 800;
            color: #0a5467;
            margin: 25px 0 15px;
        }

        .job-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: .2s;
        }

        .job-card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
            transform: translateY(-2px);
        }

        .job-title {
            font-weight: 700;
            font-size: 16px;
            color: #173b5b;
            text-decoration: none;
        }

        .job-meta {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }

        .badge-new {
            background: #ff3d00;
            color: #fff;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 5px;
            float: right;
        }

        .badge-date {
            background: #f4b400;
            color: #000;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 5px;
            float: right;
        }

        .side-box {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 15px;
        }

        .side-title {
            font-weight: 800;
            margin-bottom: 10px;
            color: #0a5467;
        }

        .small-link {
            display: block;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .small-link:hover {
            color: #0a5467;
        }

        .last-date-tabs {
            display: flex;
            margin: 10px 0;
            gap: 5px;
        }

        .tab-btn {
            flex: 1;
            border: 0;
            background: #f3f3f3;
            padding: 6px;
            cursor: pointer;
            font-size: 12px;
            border-radius: 4px;
        }

        .tab-btn.active {
            background: #ffb300;
            color: #000;
            font-weight: 600;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .live-badge {
            width: 7%;
            height: auto;
            animation: livePulse 1.2s infinite;
        }

        @keyframes livePulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .35;
                transform: scale(1.08);
            }
        }

        .last-update {
            font-size: 12px;
            color: #666;
            background: #f5f5f5;
            padding: 3px 8px;
            border-radius: 20px;
            font-weight: 600;
        }
    </style>

    <div class="container mt-4">

        <div class="row">

            <!-- LEFT MAIN CONTENT -->
            <div class="col-lg-8">

                <!-- LATEST JOBS -->
                <div class="section-title">
                    <span>Latest Government Jobs</span>

                    <img src="https://sarkarihai.com/public/images/live.png?v=5" alt="LIVE" class="live-badge">

                    <span class="last-update">
                        Last Updated:
                        {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y H:i:s') }}
                    </span>
                </div>

                @foreach ($latestJobs as $job)
                    <div class="job-card">

                        {{-- 🔥 NEW BADGE --}}
                        @if (!empty($job->created_at) && \Carbon\Carbon::parse($job->created_at)->greaterThanOrEqualTo(now()->subHour()))
                            <span class="badge-new">NEW</span>
                        @endif

                        {{-- 🧾 TITLE --}}
                        <a href="{{ url(
                            'sarkari-naukri/' . ($job->state ?: 'all-indiax') . '/' . ($job->category ?: 'uncategorized') . '/' . $job->slug,
                        ) }}"
                            class="job-title">

                            {{ $job->title }}

                        </a>

                        {{-- 📊 META INFO --}}
                        <div class="job-meta">

                            @if (!empty($job->total_vacancies))
                                Total Vacancies:
                                <strong>
                                    {{ number_format((int) preg_replace('/[^0-9]/', '', $job->total_vacancies)) }}
                                </strong>
                            @endif
                            |
                            @if (!empty($job->updated_at))
                                @if (!empty($job->total_posts))
                                    |
                                @endif
                                Last updated on:
                                <strong>{{ $job->updated_at }}</strong>
                            @endif

                            @if (!empty($job->apply_mode))
                                @if (!empty($job->total_posts) || !empty($job->updated_at))
                                    |
                                @endif
                                Apply Mode:
                                <strong>{{ $job->apply_mode }}</strong>
                            @endif

                            @if (!empty($job->max_salary))
                                @if (!empty($job->total_posts) || !empty($job->updated_at) || !empty($job->apply_mode))
                                    |
                                @endif
                                Salary:

                                <strong>
                                    {{ number_format((int) preg_replace('/[^0-9]/', '', $job->max_salary)) }}
                                </strong>
                            @endif

                        </div>

                    </div>
                @endforeach


            </div>


            <!-- RIGHT SIDEBAR -->
            <div class="col-lg-4">

                <!-- LAST DATE BOX -->
                <div class="side-box mb-3">

                    <div class="side-title">Last Date Soon</div>

                    <div class="last-date-tabs">
                        <button class="tab-btn active" data-tab="today">Today ({{ $todayCount }})</button>
                        <button class="tab-btn" data-tab="tomorrow">Tomorrow ({{ $tomorrowCount }})</button>
                        <button class="tab-btn" data-tab="week">7 Days ({{ $weekCount }})</button>
                    </div>

                    <div id="today" class="tab-content active">
                        @foreach ($todayJobs as $job)
                            @include('partials.last-date-job', ['job' => $job])
                        @endforeach
                        @if ($todayCount > 10)
                            <a href="{{ route('last-date-soon', ['type' => 'today']) }}"
                                class="btn btn-sm btn-primary w-100 mt-2">
                                View All {{ $todayCount }} Jobs →
                            </a>
                        @endif
                    </div>

                    <div id="tomorrow" class="tab-content">
                        @foreach ($tomorrowJobs as $job)
                            @include('partials.last-date-job', ['job' => $job])
                        @endforeach
                        @if ($todayCount > 10)
                            <a href="{{ route('last-date-soon', ['type' => 'tomorrow']) }}"
                                class="btn btn-sm btn-warning w-100 mt-2">
                                View All {{ $tomorrowCount }} Jobs →
                            </a>
                        @endif
                    </div>

                    <div id="week" class="tab-content">
                        @foreach ($weekJobs as $job)
                            @include('partials.last-date-job', ['job' => $job])
                        @endforeach
                        @if ($todayCount > 10)
                            <a href="{{ route('last-date-soon', ['type' => 'week']) }}"
                                class="btn btn-sm btn-success w-100 mt-2">
                                View All {{ $weekCount }} Jobs →
                            </a>
                        @endif
                    </div>

                </div>


                <!-- RESULT BOX -->
                <div class="side-box mb-3">

                    <div class="side-title">Latest Results</div>

                    <a class="small-link" href="#">SSC GD Result 2026</a>
                    <a class="small-link" href="#">Railway ALP Result</a>
                    <a class="small-link" href="#">UPSC CDS Result</a>
                    <a class="small-link" href="#">SBI Clerk Result</a>

                </div>


                <!-- ADMIT CARD BOX -->
                <div class="side-box">

                    <div class="side-title">Admit Card</div>

                    <a class="small-link" href="#">SSC CGL Admit Card</a>
                    <a class="small-link" href="#">RRB NTPC Admit Card</a>
                    <a class="small-link" href="#">UPSC NDA Admit Card</a>
                    <a class="small-link" href="#">IBPS PO Admit Card</a>

                </div>

            </div>

        </div>

    </div>


    <style>
        /* SECTION TITLE */
        .sec-title {
            font-size: 20px;
            font-weight: 800;
            margin: 25px 0 15px;
            color: #0a5467;
        }

        /* GRID BUTTON STYLE */
        .link-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .link-grid a {
            background: #fff;
            border: 1px solid #e8edf3;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            color: #333;
            transition: .2s;
        }

        .link-grid a:hover {
            background: #0a5467;
            color: #fff;
        }

        /* CATEGORY CARDS */
        .cat-card {
            background: #fff;
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: .2s;
        }

        .cat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        }

        .cat-card i {
            font-size: 22px;
            color: #0a5467;
            margin-bottom: 5px;
        }

        .cat-title {
            font-weight: 700;
            font-size: 14px;
        }

        /* POPULAR TAGS */
        .tag {
            display: inline-block;
            background: #f4b400;
            color: #000;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
            margin: 5px;
            text-decoration: none;
        }

        .tag:hover {
            background: #ffcc00;
        }
    </style>

    <div class="container mt-4">

        <!-- ================= STATE WISE ================= -->
        {{-- <div class="sec-title">State Wise Government Jobs</div>

        <div class="link-grid mb-4">

            <a href="{{ route('sarkari.naukri.state', 'all-india') }}">
                All India
                <span>
                    ({{ $totalJobs }})
                </span>
            </a>

            @foreach ($states as $state)
                <a href="{{ route('sarkari.naukri.state', $state->slug) }}">

                    {{ $state->name }}

                    <span>
                        ({{ $state->total_jobs }})
                    </span>

                </a>
            @endforeach

        </div> --}}


        <!-- ================= CATEGORY WISE ================= -->
        {{-- <div class="sec-title">
            Category Wise Jobs
        </div>

        <div class="row g-3 mb-4">

            @foreach ($categories as $category)
                <div class="col-6 col-md-3">

                    <a href="{{ route('sarkari.naukri.category', [
                        'state' => 'all-india',
                        'category' => $category->slug,
                    ]) }}"
                        class="text-decoration-none">

                        <div class="cat-card">

                            <div class="cat-title">
                                {{ $category->name }}
                            </div>

                            <small>
                                {{ $category->total_jobs }} Jobs
                            </small>

                        </div>

                    </a>

                </div>
            @endforeach

        </div> --}}


        <!-- ================= ORGANIZATION WISE ================= -->


        <div class="sec-title">Category Wise Jobs</div>

        <div class="link-grid mb-4">

            @foreach ($categories as $category)
                <a href="{{ url('/jobs/' . $category->slug) }}">

                    {{ $category->name }}

                    ({{ number_format($category->total_jobs) }})
                </a>
            @endforeach

        </div>

        <!-- ================= POPULAR SEARCHES ================= -->
        <div class="sec-title">Popular Searches</div>

        <div>
            @foreach ($popularSearches as $search)
                <a class="tag" href="{{ url('/search?q=' . urlencode($search->keyword)) }}">
                    {{ strtoupper($search->keyword) }}
                </a>
            @endforeach
        </div>



        <style>
            /* FAQ */
            .faq-box {
                background: #fff;
                border: 1px solid #e8edf3;
                border-radius: 10px;
                padding: 20px;
                margin-top: 25px;
            }

            .faq-item {
                border-bottom: 1px solid #eee;
                padding: 15px 0;
            }

            .faq-q {
                font-weight: 800;
                color: #0a5467;
                margin-bottom: 5px;
            }

            .faq-a {
                color: #555;
                font-size: 14px;
                line-height: 1.6;
            }

            /* ABOUT */
            .about-box {
                background: #fff;
                border: 1px solid #e8edf3;
                border-radius: 10px;
                padding: 25px;
                margin-top: 25px;
            }

            .about-box h2 {
                font-size: 22px;
                font-weight: 800;
                color: #0a5467;
                margin-bottom: 10px;
            }

            .about-box p {
                color: #555;
                line-height: 1.7;
                font-size: 14px;
            }
        </style>

        <div class="container">

            <!-- ================= FAQ ================= -->
            <div class="faq-box">

                <h3 style="font-weight:800;color:#0a5467;">Frequently Asked Questions</h3>

                <div class="faq-item">
                    <div class="faq-q">What is SarkariHai?</div>
                    <div class="faq-a">
                        SarkariHai provides the latest government job notifications, admit cards, results, answer keys,
                        admissions, syllabus, and exam updates from Central and State Government organizations across
                        India.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-q">How can I apply for Sarkari Jobs?</div>
                    <div class="faq-a">
                        Open the job notification on SarkariHai, check the eligibility criteria, important dates,
                        application fee, and required documents, then apply through the official Apply Online link
                        provided in the job post.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-q">Is SarkariHai free to use?</div>
                    <div class="faq-a">
                        Yes. SarkariHai is completely free to use. You can access the latest government job
                        notifications, admit cards, results, answer keys, admissions, and other exam updates without any
                        subscription or registration.
                    </div>
                </div>

            </div>


            <!-- ================= ABOUT ================= -->
            <div class="about-box">

                <h2>About SarkariHai – Latest Sarkari Naukri, Results, Admit Card & Government Jobs 2026</h2>

                <p>
                    <strong>SarkariHai.com</strong> is a trusted platform for the latest <strong>Sarkari
                        Naukri</strong>,
                    <strong>Government Jobs</strong>, <strong>Online Forms</strong>, <strong>Admit Cards</strong>,
                    <strong>Results</strong>, <strong>Answer Keys</strong>, <strong>Admissions</strong>,
                    <strong>Syllabus</strong>, and <strong>Exam Updates</strong> across India. We regularly publish
                    verified
                    updates for Central Government Jobs, State Government Jobs, PSU Recruitment, Apprentice Jobs, and
                    other
                    government employment opportunities.
                </p>

                <p>
                    Whether you are preparing for
                    @foreach ($categories as $category)
                        <a href="{{ url('/jobs/' . $category->slug) }}">

                            <strong>{{ $category->name }}</strong>

                            ({{ number_format($category->total_jobs) }})
                        </a> ,
                    @endforeach
                    or State Government recruitment exams, <a href="/contact">SarkariHai helps</a>
                    you
                    stay updated with the latest notifications, eligibility, important dates, vacancies, exam patterns,
                    admit
                    cards, results, and official application links.
                </p>

                <p>
                    Our goal is to make searching for <strong>Sarkari Naukri</strong> and
                    <strong>Government Jobs</strong> simple, fast, and reliable. Thousands of aspirants visit
                    <a href="/"><strong>SarkariHai</strong></a> every day to check the latest job notifications,
                    online forms,
                    exam results, answer keys, admissions, and recruitment updates from official sources in one place.
                </p>

            </div>
        @endsection
