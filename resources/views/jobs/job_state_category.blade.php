@extends('layouts.app')

@section('content')
    <style>
    .tab-btn {
        padding: 6px 12px;
        border: 1px solid #ddd;
        cursor: pointer;
        margin: 3px;
        border-radius: 6px;
        background: #f5f5f5;
        transition: 0.2s;
        display: inline-block;
    }

    .tab-btn:hover {
        background: #ffe0b3;
    }

    .tab-btn.active {
        background: #ff7a00;
        color: #fff;
        border-color: #ff7a00;
    }

    .job-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
        transition: 0.2s;
    }

    .job-item.hidden {
        display: none;
    }

    .tabs-container {
        margin-bottom: 10px;
    }
</style>

<div class="container">

    {{-- STATE TABS --}}
    <div class="tabs-container">
        @foreach ($states as $s)
            <span class="tab-btn state-tab" data-state="{{ strtolower($s) }}">
                {{ $s }}
            </span>
        @endforeach
    </div>

    {{-- CATEGORY TABS --}}
    <div class="tabs-container">
        @foreach ($categories as $cat)
            <span class="tab-btn cat-tab" data-cat="{{ strtolower($cat) }}">
                {{ $cat }}
            </span>
        @endforeach
    </div>

    {{-- JOB LIST --}}
    <div id="job-list">
        @foreach ($jobs as $job)
            <div class="job-item" data-state="{{ strtolower($job->state) }}" data-cat="{{ strtolower($job->category ?? 'other') }}">
                {{ $job->title }}
            </div>
        @endforeach
    </div>

</div>

<script>
    const stateTabs = document.querySelectorAll('.state-tab');
    const catTabs = document.querySelectorAll('.cat-tab');
    const jobs = document.querySelectorAll('.job-item');

    let selectedState = '';
    let selectedCat = '';

    function filterJobs() {
        jobs.forEach(job => {
            const jobStates = job.dataset.state.split(',').map(s => s.trim());
            const jobCat = job.dataset.cat.trim();

            const stateMatch = selectedState ? jobStates.includes(selectedState) : true;
            const catMatch = selectedCat ? jobCat === selectedCat : true;

            job.classList.toggle('hidden', !(stateMatch && catMatch));
        });
    }

    stateTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            stateTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            selectedState = tab.dataset.state;
            filterJobs();
        });
    });

    catTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            catTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            selectedCat = tab.dataset.cat;
            filterJobs();
        });
    });
</script>
@endsection
