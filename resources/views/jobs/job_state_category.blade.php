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
            font-size: 15px;
        }

        .job-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .job-item.hidden {
            display: none;
        }

        .tabs-container {
            margin-bottom: 10px;
        }
        .c-t {
            display: flex;
            align-items: center;
            font-size: 30px;
            color: #fff;
            margin-left: -8px;    margin-top: 30px;}
    </style>

    <div class="container">
        <h2 class="mb-3 c-t">
            <span><b>Latest Jobs In States</b></span>

            
        </h2>
        {{-- STATE TABS --}}
        <div class="tabs-container">
            <span class="tab-btn state-tab" data-state="">All States</span>
            @foreach ($states as $s)
                <span class="tab-btn state-tab" data-state="{{ strtolower($s) }}">
                    {{ ucfirst($s) }}
                </span>
            @endforeach
        </div>

        {{-- CATEGORY TABS --}}
        <div class="tabs-container" style="margin-top:10px;">
            <span class="tab-btn cat-tab active" data-cat="">All Categories</span>
            @foreach ($categories as $cat)
                <span class="tab-btn cat-tab" data-cat="{{ strtolower($cat) }}">
                    {{ ucfirst($cat) }}
                </span>
            @endforeach
        </div>

        {{-- JOB LIST --}}
        <div id="job-list" style="margin-top:15px;">
            @foreach ($jobs_upcomming as $job)
                <a href="{{ route('job.show', ['slug' => Str::slug($job->title)]) }}" class="job-link">
                    <div class="job-item"
                        data-state="{{ implode(',', array_map(fn($s) => strtolower(trim($s)), explode(',', $job->state))) }}"
                        data-cat="{{ strtolower(trim($job->category ?? 'all-categories')) }}"
                        style="padding:8px; border-bottom:1px solid #eee; display:flex; gap:15px; flex-wrap:wrap; align-items:center;">
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
                        <span>
                            @php
                                $isNew = \Carbon\Carbon::parse($job->updated_at)->diffInDays(now()) <= 2;
                            @endphp

                            @if ($isNew)
                                <img src="https://media.tenor.com/UBNApyolWz4AAAAj/new-blinking-new-blinking-without-background.gif"
                                    class="new-badge" width="40px">
                            @endif
                            <strong>{{ $job->title }}</strong>
                        </span>
                        <div style="    float: right;">
                            <span>₹{{ $job->min_salary ?? 'N/A' }}-₹{{ $job->max_salary ?? 'N/A' }}</span>
                            <span> | {{ $job->min_qulification ?? 'N/A' }}</span>
                            <span style="color: {{ $color }}; font-weight:600;">
                                {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}
                            </span>
                        </div>


                    </div>
                </a>
            @endforeach
        </div>

    </div>

    <script>
        const stateTabs = document.querySelectorAll('.state-tab');
        const catTabs = document.querySelectorAll('.cat-tab');
        const jobs = document.querySelectorAll('.job-item');

        let selectedState = @json($state ?? '');
        let selectedCat = @json($category ?? '');

        selectedState = selectedState.toLowerCase().replace(/-/g, ' ').trim();
        selectedCat = selectedCat.toLowerCase().replace(/-/g, ' ').trim();

        // ✅ IMPORTANT FIX
        if (selectedCat === "all categories") selectedCat = "";
        if (selectedState === "all states") selectedState = "";

        function filterJobs() {
    jobs.forEach(job => {
        const jobStates = job.dataset.state.split(',').map(s => s.trim().toLowerCase());
        const jobCat = job.dataset.cat.trim().toLowerCase();

        const stateMatch = selectedState ? jobStates.includes(selectedState) : true;

        // ✅ FIX: empty ho to ignore karo
        const catMatch = selectedCat ? jobCat === selectedCat : true;

        job.style.display = (stateMatch && catMatch) ? 'block' : 'none';
    });
}

        // ✅ STATE TAB
        stateTabs.forEach(tab => {
            let tabState = tab.dataset.state.trim().toLowerCase();
            console.log(selectedState);
            console.log(tabState);

            // ✅ match OR both empty (All States)
            if (tabState === selectedState || (tabState === "" && selectedState === "")) {
                tab.classList.add('active');
            }

            tab.addEventListener('click', () => {
                stateTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                selectedState = tabState;
                filterJobs();
            });
        });

        // ✅ CATEGORY TAB
        catTabs.forEach(tab => {
            let tabCat = tab.dataset.cat.trim().toLowerCase();

            // ✅ match OR both empty (All Categories)
            if (tabCat === selectedCat || (tabCat === "" && selectedCat === "")) {
                tab.classList.add('active');
            }

            tab.addEventListener('click', () => {
                catTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                selectedCat = tabCat;
                filterJobs();
            });
        });

        filterJobs();
    </script>
@endsection
