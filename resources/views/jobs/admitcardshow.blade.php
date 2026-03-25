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

            @if(count($admitCard->exam_list) > 0)

                <ul class="list-group">

                    @foreach($admitCard->exam_list as $exam)

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
                            @if($date->isToday())
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
    @if($admitCard->link)
        <div class="text-center mt-4">
            <a href="{{ $admitCard->link }}" target="_blank" class="btn btn-success btn-lg">
                🎟 Download Admit Card
            </a>
        </div>
    @endif

</div>

@endsection