@extends('layouts.app')

@section('title', 'Latest Recruitment Jobs')

@section('content')

    <style>
        .col-6,
        .col-md-4 {
            padding: 4px;
        }

        .new-badge {
            position: absolute;
            top: 30px;
            width: 39px;
            z-index: 10;
            right: -3px;
        }

        .new-badge-p {
            position: absolute;
            top: -5px;
            width: 39px;
            z-index: 10;
            right: -3px;
        }

        .job-box {
            border: 1px solid #eee;
            padding: 0px;
            display: flex;
            align-items: center;
            background: #fff;
            height: 55px;
            overflow: hidden;
        }

        .job-logo {
            width: 55px;
            height: 55px;
            object-fit: cover;
            margin-right: 8px;
            object-position: 0%;
        }

        .job-title {
            font-weight: 600;
            font-size: clamp(11px, 1.2vw, 11px);
            /* white-space: nowrap; */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .job-meta {
            font-size: clamp(10px, 1.1vw, 10px);
            color: #555;
            /* white-space: nowrap; */
            overflow: hidden;
            text-overflow: ellipsis;
            background-color: #fff;
        }

        .c-t {
            display: flex;
            align-items: center;
            font-size: 30px;
            color: #fff;
            margin-left: -8px;
        }

        .last-update {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
        }

        .last-update img {
            height: 28px;
        }

        /* Mobile */
        @media(max-width:768px) {

            .c-t {
                font-size: 16px;
            }

            .last-update {
                font-size: 12px;
            }

            .col-4 {
                flex: 0 0 auto;
                width: 22.333333%;
            }

        }

        /* Mobile Optimization */
        @media(max-width:768px) {

            .job-box {
                height: auto;
                padding: 6px;
            }

            .job-logo {
                width: 40px;
                height: 40px;
                display: none;
            }

            .job-title {
                font-size: 13px;
            }

            .job-meta {
                font-size: 11px;
            }

            .btn {
                padding: 2px 6px;
                font-size: 11px;
            }

        }

        .job-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .job-box {
            cursor: pointer;
        }

        @media (min-width: 768px) {
            .col-md-5th {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        @media (max-width: 768px) {

            .c-t {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
            }

            /* Latest Jobs → full width (1st line) */
            .c-t>span:first-child {
                width: 100%;
                display: block;
                font-size: 35px;
                margin-bottom: 4px;
            }

            /* Last update (left side 2nd line) */
            .c-t .last-update {
                font-size: 12px;
                display: flex;
                align-items: center;
                margin-left: 0px;
            }

            /* View All (right side 2nd line) */
            .c-t a {
                margin-left: auto;
                font-size: 12px;
                float: none !important;
                /* important fix */
            }

            /* Live GIF icon */
            .c-t img {}
        }

        @media (max-width: 768px) {
            .hide-mobile {
                display: none !important;
            }

            .hide-mobile-job {
                display: none !important;
            }
        }

        /* Flicker animation */
        @keyframes flicker {
            0% {
                opacity: 1;
            }

            20% {
                opacity: 0.4;
            }

            40% {
                opacity: 1;
            }

            60% {
                opacity: 0.3;
            }

            80% {
                opacity: 1;
            }

            100% {
                opacity: 0.6;
            }
        }

        /* Apply animation */
        .flicker-btn {
            animation: flicker 1.2s infinite;
        }
    </style>


    <style id="statejob-css">
        /* Wrapper scope (important) */
        .statejob-wrapper a {
            text-decoration: none;
            color: inherit;
        }

        /* Box */
        .statejob-box {
            padding: 5px 6px;
            border-bottom: 1px solid #eee;
            transition: 0.3s;
            background-color: #ffffff;
        }

        .statejob-box:hover {
            background: #e8e8e8;
        }

        /* First Line */
        .statejob-top {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            align-items: center;
        }

        /* Title */
        .statejob-title {
            font-weight: 600;
            font-size: 13px;
            color: #111;
        }

        /* Meta */
        .statejob-meta {
            font-size: 12px;
            color: #555;
            float: right;
        }

        /* States */
        .statejob-tags {
            margin-top: 5px;
        }

        /* Badge */
        .statejob-badge {
            display: inline-block;
            background: #eef2ff;
            color: #3749ff;
            font-size: 12px;
            padding: 3px 8px;
            margin: 2px 4px 2px 0;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.2s;
        }

        .statejob-badge:hover {
            background: #3749ff;
            color: #fff;
        }
    </style>
    <style>
        .highcharts-exporting-group {
            display: none !important;
            /* menu button */
        }

        .highcharts-credits {
            display: none !important;
            /* Highcharts watermark */
        }

        .highcharts-title {
            font-size: 38px !important;
            font-weight: bold !important;
            fill: rgb(255 255 255) !important;
            color: #fff !important;
        }
    </style>
    <style>
        .custom-row {
            display: flex;
            flex-wrap: wrap;
        }

        .custom-col {
            width: 12.5%;
            /* 👈 approx 12% (8 items per row) */
            padding: 5px;
        }

        /* Responsive Fix */
        @media (max-width: 992px) {
            .custom-col {
                width: 20%;
            }

            /* 5 per row */
        }

        @media (max-width: 768px) {
            .custom-col {
                width: 25%;
            }

            /* 4 per row */
        }

        @media (max-width: 576px) {
            .custom-col {
                width: 50%;
            }

            /* 2 per row */
        }

        .category-card {
            border-radius: 10px;
            transition: 0.3s;
        }

        .category-card:hover {
            background: #fff3e6;
            transform: translateY(-3px);
        }

        @media (min-width: 768px) {
            .col-md-6 {
                flex: 0 0 50% !important;
                max-width: 50% !important;
            }
        }
    </style>

    <style>
        #container {
            height: 700px;
            min-width: 310px;
            max-width: 800px;
            margin: 0 auto;
        }

        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }
    </style>
    <div class="container mt-3">

        <h2 class="mb-3 c-t">
            <span><b>Latest Jobs</b></span>

            <span class="last-update flicker-btn">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>
            <a href="https://sarkarihai.com/jobs/all%20states/All%20Categories" class="text-decoration-none fw-bold"
                style="color: #fff; font-size: 13px; float: right;">
                View All →
            </a>
        </h2>

        <div class="row">
            @foreach ($pastJobs as $index => $job)
                @php
                    $names = explode('#', $job->post_name);
                    $salaries = explode('#', $job->post_salary);
                    $eligibilities = explode('#', $job->min_qulification);
                    $count = max(count($names), count($salaries), count($eligibilities));

                @endphp

                {{-- @for ($i = 0; $i < $count; $i++) --}}
                <div class="col-6 col-md-2 {{ $index >= 10 ? 'hide-mobile-job' : '' }}">

                    <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}" class="job-link">

                        <div class="job-box position-relative" style="background-color: #e09696;">
                            @php
                                $isNew = \Carbon\Carbon::parse($job->created_at)->diffInDays(now()) <= 2;
                            @endphp

                            @if ($isNew)
                                <img src="https://media.tenor.com/UBNApyolWz4AAAAj/new-blinking-new-blinking-without-background.gif"
                                    class="new-badge">
                            @endif
                            <img src="{{ asset('public/job-images/' . $job->image) }}" class="job-logo">

                            <div>
                                <div class="job-title ">
                                    {{-- {{ ucfirst($job->title) . (!empty($names[$i]) ? ' - ' . ucfirst($names[$i]) : '') }} --}}
                                    {{ ucfirst($job->title) }}


                                </div>


                            </div>

                        </div>
                        @php
                            $endDate = \Carbon\Carbon::parse($job->end_date);
                            $today = \Carbon\Carbon::now();

                            $daysLeft = $today->diffInDays($endDate, false); // negative bhi allow

                            if ($daysLeft <= 7) {
                                $color = 'red'; // 1 week
                            } elseif ($daysLeft <= 14) {
                                $color = 'orange'; // 2 week
                            } else {
                                $color = 'green'; // more than 2 week
                            }
                        @endphp

                        <div class="job-meta">
                            <span style="color: green; font-weight:600;">
                                ₹{{ number_format($job->min_salary ?? 0) }} -
                                ₹{{ number_format($job->max_salary ?? 0) }}
                            </span>
                            |
                            <span class="hide-mobile" style="color: green; font-weight:600;">
                                {{ $job->min_qulification ?? '' }} |
                            </span>

                            <span style="color: {{ $color }}; font-weight:600;">
                                {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                            </span>
                        </div>
                    </a>

                </div>
                {{-- @endfor --}}
            @endforeach

            @foreach ($jobs as $index => $job)
                @php
                    $names = explode('#', $job->post_name);
                    $salaries = explode('#', $job->post_salary);
                    $eligibilities = explode('#', $job->min_qulification);
                    $count = max(count($names), count($salaries), count($eligibilities));

                @endphp

                {{-- @for ($i = 0; $i < $count; $i++) --}}
                <div class="col-6 col-md-2 {{ $index >= 10 ? 'hide-mobile-job' : '' }}">

                    <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}" class="job-link">

                        <div class="job-box position-relative">
                            @php
                                $isNew = \Carbon\Carbon::parse($job->created_at)->diffInDays(now()) <= 2;
                            @endphp

                            @if ($isNew)
                                <img src="https://media.tenor.com/UBNApyolWz4AAAAj/new-blinking-new-blinking-without-background.gif"
                                    class="new-badge">
                            @endif
                            <img src="{{ asset('public/job-images/' . $job->image) }}" class="job-logo">

                            <div>
                                <div class="job-title ">
                                    {{-- {{ ucfirst($job->title) . (!empty($names[$i]) ? ' - ' . ucfirst($names[$i]) : '') }} --}}
                                    {{ ucfirst($job->title) }}


                                </div>


                            </div>

                        </div>
                        @php
                            $endDate = \Carbon\Carbon::parse($job->end_date);
                            $today = \Carbon\Carbon::now();

                            $daysLeft = $today->diffInDays($endDate, false); // negative bhi allow

                            if ($daysLeft <= 7) {
                                $color = 'red'; // 1 week
                            } elseif ($daysLeft <= 14) {
                                $color = 'orange'; // 2 week
                            } else {
                                $color = 'green'; // more than 2 week
                            }
                        @endphp

                        <div class="job-meta">
                            <span style="color: green; font-weight:600;">
                                ₹{{ number_format($job->min_salary ?? 0) }} -
                                ₹{{ number_format($job->max_salary ?? 0) }}
                            </span>
                            |
                            <span class="hide-mobile" style="color: green; font-weight:600;">
                                {{ $job->min_qulification ?? '' }} |
                            </span>

                            <span style="color: {{ $color }}; font-weight:600;">
                                {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                            </span>
                        </div>
                    </a>

                </div>
                {{-- @endfor --}}
            @endforeach

        </div>
        <a href="https://sarkarihai.com/jobs/all%20states/All%20Categories" class="text-decoration-none fw-bold"
            style="color: #fff;    float: right;
    font-size: 13px;">
            View All →
        </a>
    </div>




    <div class="container mt-4">
        <h2 class="mb-3 c-t">

            <span><b>Upcoming Job Deadlines</b></span>

            <span class="last-update flicker-btn">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>

        </h2>
        <div class="row">
            @foreach ($jobs_upcomming as $job)
                @php
                    $today = \Carbon\Carbon::today();
                    $jobEnd = \Carbon\Carbon::parse($job->end_date);
                    $diff = $today->diffInDays($jobEnd, false);

                    if ($diff <= 3) {
                        $cardColor = 'bg-danger text-white';
                    } elseif ($diff <= 7) {
                        $cardColor = 'bg-warning text-dark';
                    } else {
                        $cardColor = 'bg-success text-white';
                    }
                @endphp

                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-3">
                    <div class="card h-100 shadow-sm {{ $cardColor }}">
                        <div class="card-body p-2 d-flex flex-column text-center">

                            <!-- 👆 TOP: Title -->
                            <h6 class="card-title fw-bold mb-2" style="font-size:14px;">
                                {{ $job->title }}
                            </h6>

                            <!-- 👇 BOTTOM BLOCK -->
                            <div class="mt-auto">

                                <!-- Last Date -->
                                <p class="mb-2" style="font-size:12px;">
                                    <b>Last Date:</b>
                                    {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                                </p>

                                <!-- Button -->
                                <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}"
                                    class="btn btn-sm btn-light w-100">
                                    Apply Now
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="mb-3 c-t">
            <span><b>Admit Card Out 2026</b></span>
            <span class="last-update flicker-btn">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>
        </h2>
        <div class="row">
            @foreach ($admitCard as $job)
                @foreach ($job->exam_list as $exam)
                    <div class="col-6 col-md-5th">

                        <a href="{{ route('admit.show', $job->slug) }}" class="job-link">

                            <div class="job-box position-relative">

                                <img src="https://media.tenor.com/UBNApyolWz4AAAAj/new-blinking-new-blinking-without-background.gif"
                                    class="new-badge-p">

                                <img src="https://sarkarihai.com/public/job-images/{{ $job->logo }}" class="job-logo">

                                <div>
                                    <div class="job-title" style="font-size:12px;">
                                        {{ $job->job_title }} <br> {{ $exam['name'] }} - Admit Card Out
                                    </div>

                                    {{-- <p style="font-size: 10px;margin-bottom:0;">
                                        {{ $exam['name'] }}
                                    </p> --}}
                                </div>

                            </div>

                            <div class="job-meta">
                                <span style="color: green; font-weight:600;">
                                    📝 Exam Date: {{ \Carbon\Carbon::parse($exam['date'])->format('d M Y') }}
                                    <br>
                                    ⏳ <span class="countdown" data-date="{{ $exam['date'] }}"></span>
                                </span>
                            </div>

                        </a>

                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


    @php
        $stateMap = [
            'Andhra Pradesh' => 'in-ap',
            'Arunachal Pradesh' => 'in-ar',
            'Assam' => 'in-as',
            'Bihar' => 'in-br',
            'Chhattisgarh' => 'in-cg',
            'Goa' => 'in-ga',
            'Gujarat' => 'in-gj',
            'Haryana' => 'in-hr',
            'Himachal Pradesh' => 'in-hp',
            'Jharkhand' => 'in-jh',
            'Karnataka' => 'in-ka',
            'Kerala' => 'in-kl',
            'Madhya Pradesh' => 'in-mp',
            'Maharashtra' => 'in-mh',
            'Manipur' => 'in-mn',
            'Meghalaya' => 'in-ml',
            'Mizoram' => 'in-mz',
            'Nagaland' => 'in-nl',
            'Odisha' => 'in-od',
            'Punjab' => 'in-pb',
            'Rajasthan' => 'in-rj',
            'Sikkim' => 'in-sk',
            'Tamil Nadu' => 'in-tn',
            'Telangana' => 'in-ts',
            'Tripura' => 'in-tr',
            'Uttar Pradesh' => 'in-up',
            'Uttarakhand' => 'in-uk',
            'West Bengal' => 'in-wb',

            // 🔥 Union Territories
            'Delhi' => 'in-dl',
            'Jammu and Kashmir' => 'in-jk',
            'Ladakh' => 'in-la',
            'Chandigarh' => 'in-ch',
            'Puducherry' => 'in-py',
            'Andaman and Nicobar Islands' => 'in-an',
            'Lakshadweep' => 'in-ld',
            'Dadra and Nagar Haveli and Daman and Diu' => 'in-dn', // ⚠️ correct code
        ];
    @endphp



    <div class="container mt-4">
        <h2 class="mb-3 c-t">

            <span><b>Latest State Wise Job India - 2026</b></span>

            <span class="last-update flicker-btn">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>

        </h2>
        <div class="row g-3">
            <div class="col-12 col-md-6 mb-4">


                <div id="container"></div>


            </div>


            <a href="https://sarkarihai.com/jobs/all%20states/All%20Categories" class="text-decoration-none fw-bold"
                style="color: #fff; float: right;
    font-size: 13px;">
                View All →
            </a>
            <div class="col-12 col-md-6 mb-4 statejob-wrapper">



                @foreach ($jobsxxx as $jobx)
                    @php
                        $name = explode(',', $jobx->post_name)[0] ?? '';

                        $endDate = \Carbon\Carbon::parse($jobx->end_date);
                        $today = now();
                        $daysLeft = $today->diffInDays($endDate, false);

                        if ($daysLeft <= 7) {
                            $color = 'red';
                        } elseif ($daysLeft <= 14) {
                            $color = 'orange';
                        } else {
                            $color = 'green';
                        }
                    @endphp

                    <a href="{{ route('job.show', ['slug' => Str::slug($jobx->title)]) }}">

                        <div class="statejob-box">

                            <div class="statejob-top">
                                <span class="statejob-title">
                                    {{ ucfirst($jobx->title) . (!empty($name) ? ' - ' . ucfirst(str_replace('#', ', ', $name)) : '') }}
                                </span>


                            </div>
                            <span class="statejob-meta">
                                ({{ $jobx->min_qulification ?? '' }} |
                                ₹{{ number_format($jobx->min_salary ?? 0) }} -
                                ₹{{ number_format($jobx->max_salary ?? 0) }} |
                                <span style="color: {{ $color }}">
                                    {{ $endDate->format('d M Y') }}
                                </span>)
                            </span>
                            @if (!empty($jobx->state))
                                @php $states = explode(',', $jobx->state); @endphp

                                <div class="statejob-tags">
                                    @foreach ($states as $state)
                                        <span class="statejob-badge">{{ trim($state) }}</span>
                                    @endforeach
                                </div>
                            @endif

                        </div>

                    </a>
                @endforeach

            </div>


        </div>
    </div>


    <div class="container mt-4">
        <h2 class="mb-3 c-t">
            <span><b>Category Wise Jobs</b></span>
        </h2>
        <div class="row custom-row">

            @foreach ($categories as $cat)
                <div class="custom-col mb-3">

                    <a href="{{ route('state.category.jobs', ['state' => 'all-states', 'category' => Str::slug($cat)]) }}"
                        class="text-decoration-none">

                        <div class="card shadow-sm h-100 category-card text-center">
                            <div class="card-body p-2">

                                <div style="font-size:24px;">📂</div>

                                <h6 class="mt-1 mb-0 fw-bold" style="font-size:13px;">
                                    {{ ucfirst($cat) }}
                                </h6>

                            </div>
                        </div>

                    </a>

                </div>
            @endforeach

        </div>
    </div>


    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>

    <script>
        function startCountdown() {
            document.querySelectorAll('.countdown').forEach(el => {
                let examDate = new Date(el.getAttribute('data-date')).getTime();

                function update() {
                    let now = new Date().getTime();
                    let diff = examDate - now;

                    if (diff <= 0) {
                        el.innerHTML = "Exam Started / Over";
                        return;
                    }

                    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

                    el.innerHTML = days + " Days " + hours + " Hr " + minutes + " Min Left";
                }

                update();
                setInterval(update, 60000);
            });
        }

        startCountdown();
    </script>

    <script>
        const data = [
            @foreach ($stateCounts as $state => $count)
                @if (isset($stateMap[$state]))
                    ['{{ $stateMap[$state] }}', {{ $count }}],
                @endif
            @endforeach
        ];
        // console.log(data1);
    </script>
    <script>
        (async () => {

            const topology = await fetch(
                'https://code.highcharts.com/mapdata/countries/in/in-all.topo.json'
            ).then(response => response.json());




            Highcharts.mapChart('container', {
                chart: {
                    map: topology,
                    backgroundColor: '#0b1224', // 🔴 red background
                    panning: false,
                    zooming: {
                        mouseWheel: false,
                        pinchType: null
                    }
                },

                title: {
                    text: null
                },

                subtitle: {

                },

                mapNavigation: {
                    enabled: false,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0
                },


                series: [{
                    data: data,
                    name: 'Total Govt Jobs 2026 In',
                    cursor: 'pointer',

                    point: {
                        events: {
                            click: function() {

                                // State name (Highcharts se)
                                let stateName = this.name;

                                // URL slug (space remove + encode)
                                // let url = "/state/" + encodeURIComponent(stateName) + "/jobs";
                                let stateSlug = stateName.toLowerCase().replace(/\s+/g, '-');
                                let categorySlug = "All Categories".toLowerCase().replace(
                                    /\s+/g, '-');

                                let url = "/jobs/" + stateSlug + "/" + categorySlug;
                                //https://sarkarihai.com/jobs/Bihar/All%20Categories
                                window.location.href = url;
                            }
                        }
                    },

                    states: {
                        hover: {
                            color: '#ff7a00'
                        }
                    },

                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }]
            });

        })();
    </script>
@endsection
