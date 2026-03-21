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
    </style>






    <div class="container mt-3">

        <h2 class="mb-3 c-t">
            <span><b>Latest Jobs</b></span>

            <span class="last-update">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>
        </h2>

        <div class="row">

            @foreach ($jobs as $job)
                @php
                    $names = explode(',', $job->post_name);
                    $salaries = explode(',', $job->post_salary);
                    $eligibilities = explode(',', $job->min_qulification);
                    $count = max(count($names), count($salaries), count($eligibilities));
                @endphp

                @for ($i = 0; $i < $count; $i++)
                    <div class="col-6 col-md-2">

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
                                        {{ ucfirst($job->title) . (!empty($names[$i]) ? ' - ' . ucfirst($names[$i]) : '') }}


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
                                <span style="color: green; font-weight:600;">
                                    {{ $job->min_qulification ?? '' }}
                                </span>
                                |
                                <span style="color: {{ $color }}; font-weight:600;">
                                    {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                                </span>
                            </div>
                        </a>

                    </div>
                @endfor
            @endforeach

        </div>
    </div>

    {{-- <div class="container mt-3">
        <h2 class="mb-3 text-center">Latest Jobs</h2>
        <style>
            .k {
                color: #fff;
                margin-bottom: 0px;
                font-size: 14px;
            }
        </style>
        @foreach ($jobs as $job)
            @php
                $names = explode(',', $job->post_name);
                $salaries = explode(',', $job->post_salary);
                $eligibilities = explode(',', $job->min_qulification);
                $count = max(count($names), count($salaries), count($eligibilities));
                $lastDate = \Carbon\Carbon::parse($job->last_date);
                $today = \Carbon\Carbon::today();
                if ($lastDate->lt($today)) {
                    continue; // skip old jobs
                }
            @endphp

            @for ($i = 0; $i < $count; $i++)
                <p class="k">
                    {{ ucfirst($job->category) .
                        ' | ' .
                        ucfirst($job->title) .
                        ' | ' .
                        (ucfirst($names[$i]) ?? '') .
                        ' | ' .
                        ($salaries[$i] ?? '') .
                        ' | ' .
                        date('d-m-Y', strtotime($job->end_date)) .
                        ' | ' .
                        ($eligibilities[$i] ?? '') }}
                </p>
            @endfor
        @endforeach
    </div> --}}

    {{-- <div class="container mt-4">
        <h2 class="mb-3 text-center">Latest Jobs</h2>
    </div> --}}
    {{-- <div class="container mt-4">
        <h2 class="mb-3 c-t">

            <span><b>Upcoming Job Deadlines</b></span>

            <span class="last-update">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif">
            </span>

        </h2>
        <div class="row">
            @foreach ($jobs as $job)
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
                        <div class="card-body p-2 text-center">
                            <h6 class="card-title fw-bold mb-2" style="font-size:14px;">
                        
                                {{ $job->title }}
                            </h6>
                            <p class="mb-1" style="font-size:12px;">
                                <b>Last Date:</b> {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                            </p>
                            <p class="mb-2" style="font-size:12px;">
                                <b>Category:</b> {{ $job->category ?? 'General' }}
                            </p>
                            <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}"
                                class="btn btn-sm btn-light w-100">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}



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


    <div class="container mt-4">
        <div class="row">


            <div class="col-6 col-md-6 mb-4">
                <script src="https://code.highcharts.com/maps/highmaps.js"></script>
                <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
                <style>
                    #container {
                        height: 500px;
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
                <div id="container"></div>
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
    'Dadra and Nagar Haveli and Daman and Diu' => 'in-dn' // ⚠️ correct code
];
@endphp
                <script>
                    const data1 = [
                        @foreach($stateCounts as $state => $count)
    @if(isset($stateMap[$state]))
        ['{{ $stateMap[$state] }}', {{ $count }}],
    @endif
@endforeach
                    ];
                    console.log(data1);
                    
                </script>
                <script>
                    (async () => {

                        const topology = await fetch(
                            'https://code.highcharts.com/mapdata/countries/in/in-all.topo.json'
                        ).then(response => response.json());


                        const data = [
                            ['in-tn', 10],
                            ['in-py', 11],
                            ['in-hp', 12],
                            ['in-sk', 13],
                            ['in-dl', 14],
                            ['in-up', 15],
                            ['in-hr', 16],
                            ['in-pb', 17],
                            ['in-ch', 18],
                            ['in-rj', 19],
                            ['in-jk', 20],
                            ['in-gj', 21],
                            ['in-mp', 22],
                            ['in-mh', 23],
                            ['in-dh', 24],
                            ['in-br', 25],
                            ['in-wb', 26],
                            ['in-jh', 27],
                            ['in-cg', 28],
                            ['in-od', 29],
                            ['in-kl', 30],
                            ['in-ka', 31],
                            ['in-ap', 32],
                            ['in-an', 33],
                            ['in-as', 34],
                            ['in-tr', 35],
                            ['in-ar', 36],
                            ['in-ld', 37],
                            ['in-ml', 38],
                            ['in-mn', 39],
                            ['in-nl', 40],
                            ['in-mz', 41],
                            ['in-ts', 42],
                            ['in-la', 43],
                            ['in-uk', 44],
                            ['in-ga', 45]
                        ];


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
                                name: 'Random data',
                                states: {
                                    hover: {
                                        color: '#BADA55'
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
            </div>
            <div class="col-6 col-md-6 mb-4">
                <h2 class="mb-3 c-t">
                    <span><b>Latest State Wise Job India - 2026</b></span>


                </h2>
            </div>


        </div>
    </div>
@endsection
