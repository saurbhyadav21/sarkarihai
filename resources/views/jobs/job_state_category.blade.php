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
            color: #fff;
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
            <span class="tab-btn state-tab active" data-state="">All States</span>
            @foreach ($states as $s)
                <span class="tab-btn state-tab" data-state="{{ $s }}">
                    {{ ucfirst($s) }}
                </span>
            @endforeach
        </div>

        {{-- CATEGORY TABS --}}
        <div class="tabs-container" style="margin-top:10px;">
            <span class="tab-btn cat-tab active" data-cat="">All Categories</span>
            @foreach ($categories as $cat)
                <span class="tab-btn cat-tab" data-cat="{{ $cat }}">
                    {{ ucfirst($cat) }}
                </span>
            @endforeach
        </div>

        {{-- JOB LIST --}}
        <div id="job-list" style="margin-top:15px;">
            @foreach ($jobs as $job)
                <div class="job-item"
                    data-state="{{ implode(',', array_map(fn($s) => strtolower(trim($s)), explode(',', $job->state))) }}"
                    data-cat="{{ strtolower(trim($job->category ?? 'other')) }}"
                    style="padding:8px; border-bottom:1px solid #eee; display:flex; gap:15px; flex-wrap:wrap; align-items:center;">

                    <span><strong>{{ $job->title }}</strong></span>
                    <div style="    float: right;">
                        <span>Salary: ₹{{ $job->min_salary ?? 'N/A' }}-₹{{ $job->max_salary ?? 'N/A' }}</span>
                        <span>Qualification: {{ $job->min_qulification ?? 'N/A' }}</span>
                        <span style="color:red;">{{ $job->end_date ?? 'Update Soon' }}</span>
                    </div>
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
                const jobStates = job.dataset.state.split(',').map(s => s.trim().toLowerCase());
                const jobCat = job.dataset.cat.trim().toLowerCase();

                const stateMatch = selectedState ? jobStates.includes(selectedState.toLowerCase()) : true;
                const catMatch = selectedCat ? jobCat === selectedCat.toLowerCase() : true;

                job.style.display = (stateMatch && catMatch) ? 'block' : 'none';
            });
        }

        // STATE TAB CLICK
        stateTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                stateTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                selectedState = tab.dataset.state;
                filterJobs();
            });
        });

        // CATEGORY TAB CLICK
        catTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                catTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                selectedCat = tab.dataset.cat;
                filterJobs();
            });
        });

        // Initial filter (show all jobs)
        filterJobs();
    </script>
@endsection
