@extends('layouts.app')

@section('content')
<h2>{{ $state }} Jobs</h2>

@foreach($jobs as $job)
    <div class="job-box">
        <a href="{{ url('/job/'.$job->id) }}">
            {{ $job->title }}
        </a>
    </div>
@endforeach

@endsection