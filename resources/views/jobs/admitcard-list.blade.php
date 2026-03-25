@extends('layouts.app')
@section('content')

    {{-- ================= TOP LATEST SECTION ================= --}}
    <div class="container mt-4">

        <h2 class="mb-3 c-t d-flex justify-content-between align-items-center flex-wrap">
            <span><b style="color: #fff">Admit Card Out 2026</b></span>

            <span class="last-update small text-muted">
                Last Updated : {{ now()->format('d-m-Y H:i') }}
                <img src="https://i.pinimg.com/originals/41/de/77/41de7763b09c771b14c8eb302b9bc4d2.gif" width="20">
            </span>
        </h2>

        <div class="row g-3">

            @foreach ($admitCards as $job)
                @php
                    $isReleased =
                        !empty($job->admit_card_release_date) && strtotime($job->admit_card_release_date) <= time();
                    $dates = !empty($job->exam_dates) ? explode('#', $job->exam_dates) : [];
                @endphp

                @if ($isReleased)
                    @foreach ($dates as $d)
                        @php $data = explode('$', $d); @endphp

                        @if (count($data) == 2)
                            <div class="col-6 col-md-3">

                                <a href="{{ route('admit.show', $job->slug) }}" class="job-link text-decoration-none">

                                    <div class="job-box position-relative shadow-sm">

                                        <!-- NEW Badge -->
                                        <img src="https://media.tenor.com/UBNApyolWz4AAAAj/new-blinking-new-blinking-without-background.gif"
                                            class="new-badge">

                                        <!-- Logo -->
                                        <img src="{{ asset('public/job-images/' . $job->logo) }}" class="job-logo">

                                        <!-- Title -->
                                        <div class="job-title small">
                                            {{ $job->job_title }} <br>
                                            {{ trim($data[0]) }} - Admit Card Out
                                        </div>

                                        <!-- Meta -->
                                        <div class="job-meta small text-success mt-1">
                                            📝 {{ date('d M Y', strtotime($data[1])) }}
                                            <br>
                                            ⏳ <span class="countdown" data-date="{{ $data[1] }}"></span>
                                        </div>
                                    </div>



                                </a>

                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </div>

    </div>


    {{-- ================= TABLE SECTION ================= --}}
    <div class="container mt-5">

        <h2 class="mb-3 text-center fw-bold" style="color: #fff">
            📄 All Admit Cards
        </h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Admit Release</th>
                        <th>Exam Dates</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($admitCards as $card)
                        @php
                            $isReleased =
                                !empty($card->admit_card_release_date) &&
                                strtotime($card->admit_card_release_date) <= time();
                        @endphp

                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <td><strong>{{ $card->job_title }}</strong></td>

                            <td class="text-center">
                                {{ $card->admit_card_release_date ? date('d M Y', strtotime($card->admit_card_release_date)) : 'Coming Soon' }}
                            </td>

                            <td>
                                @if (!empty($card->exam_dates))
                                    @php $dates = explode('#', $card->exam_dates); @endphp

                                    @foreach ($dates as $d)
                                        @php $data = explode('$', $d); @endphp

                                        @if (count($data) == 2)
                                            <div class="small">
                                                • {{ $data[0] }} -
                                                <span class="badge bg-primary">
                                                    {{ date('d M Y', strtotime($data[1])) }}
                                                </span>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-muted">Not Available</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <span class="badge {{ $isReleased ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $isReleased ? 'Released' : 'Not Released' }}
                                </span>
                            </td>

                            <td class="text-center">
                                @if ($isReleased)
                                    <a href="{{ route('admit.show', $card->slug) }}" class="btn btn-sm btn-success">
                                        Download
                                    </a>
                                @else
                                    <button class="btn btn-sm btn-dark" disabled>
                                        🔒 Locked
                                    </button>
                                @endif
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                No Admit Cards Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

    </div>


    {{-- ================= CSS ================= --}}
    <style>
        .job-box {
            background: #fff;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            gap: 8px;
            align-items: center;
            transition: 0.3s;
        }

        .job-box:hover {
            transform: translateY(-3px);
        }

        .job-logo {
            width: 35px;
            height: 35px;
        }

        .new-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 35px;
        }

        .job-title {
            font-size: 12px;
            font-weight: 600;
        }

        .job-meta {
            font-size: 11px;
        }
        @media (min-width: 768px) {
    .col-md-3 {
        flex: 0 0 auto;
        width: 26%;
    }
}
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function updateCountdown() {
                document.querySelectorAll('.countdown').forEach(function(el) {

                    let dateStr = el.getAttribute('data-date');

                    if (!dateStr) return;

                    let targetDate = new Date(dateStr).getTime();
                    let now = new Date().getTime();
                    let diff = targetDate - now;

                    if (diff <= 0) {
                        el.innerHTML = "Exam Started";
                        return;
                    }

                    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    let hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    let minutes = Math.floor((diff / (1000 * 60)) % 60);

                    el.innerHTML = `${days}d ${hours}h ${minutes}m left`;
                });
            }

            updateCountdown();
            setInterval(updateCountdown, 60000); // update every 1 min

        });
    </script>
@endsection
