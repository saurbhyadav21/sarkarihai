@extends('layouts.app')

@section('title', 'Latest Recruitment Jobs')

@section('content')

    <style>
        .col-6,
        .col-md-4 {
            padding: 4px;
        }

        .job-box {
            border: 1px solid #eee;
            padding: 8px;
            display: flex;
            align-items: center;
            background: #fff;
            height: 65px;
            overflow: hidden;
        }

        .job-logo {
            width: 55px;
            height: 55px;
            object-fit: cover;
            margin-right: 8px;
        }

        .job-title {
            font-weight: 600;
            font-size: clamp(11px, 1.2vw, 14px);
            /* white-space: nowrap; */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .job-meta {
            font-size: clamp(10px, 1.1vw, 12px);
            color: #555;
            /* white-space: nowrap; */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .c-t {
            display: flex;
            align-items: center;
            font-size: 20px;
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

        .job-link{
    text-decoration: none;
    color: inherit;
    display: block;
}

.job-box{
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
                <div class="col-6 col-md-4">

                    <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}" class="job-link">

                        <div class="job-box">

                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHlnsXyN43ISgoYhT9J31_lzOUODyeQVx3Nw&s"
                                class="job-logo">

                            <div>
                                <div class="job-title">
                                   {{ ucfirst($job->title) . ' - ' . ucfirst($names[$i] ?? '') }}
                                </div>

                                <div class="job-meta">
                                    {{-- {{ ucfirst($names[$i] ?? '') }} | --}}
                                    {{-- <span style="color: green; font-weight:600;">₹{{ $salaries[$i] ?? '' }} |</span> --}}
                                    <span style="color: green; font-weight:600;">₹{{ $job->min_salary ?? '' }} | {{ $job->max_salary ?? '' }}</span>
                                    {{ $job->min_qulification ?? '' }} |
                                    <span style="color: red;font-weight:600;">{{ date('d M Y', strtotime($job->end_date)) }}</span>
                                </div>
                            </div>

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
    <div class="container mt-4">
        {{-- <h2 class="mb-4 text-center">Upcoming Job Apply Deadlines</h2> --}}
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
                                {{-- {{ Str::limit($job->title, 25) }} --}}
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
    </div>
@endsection
