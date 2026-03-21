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
        }

        .tab-btn.active {
            background: #ff7a00;
            color: #fff;
        }

        .job-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
    </style>

    <div class="container">

        {{-- STATE TABS --}}
        <div>
            @foreach ($states as $state)
                <span class="tab-btn state-tab" data-state="{{ $state }}">
                    {{ $state }}
                </span>
            @endforeach
        </div>

        {{-- CATEGORY TABS --}}
        <div style="margin-top:10px;">
            @foreach ($categories as $cat)
                <span class="tab-btn cat-tab" data-cat="{{ $cat }}">
                    {{ $cat }}
                </span>
            @endforeach
        </div>

        {{-- JOB LIST --}}
        <div id="job-list" style="margin-top:15px;">
            @foreach ($jobs as $job)
                <div class="job-item" data-state="{{ $job->state }}" data-cat="{{ $job->category ?? 'Other' }}">

                    {{ $job->title }}
                </div>
            @endforeach
        </div>

    </div>

    <script>
        let selectedState = '';
        let selectedCat = '';

        document.querySelectorAll('.state-tab').forEach(btn => {
            btn.addEventListener('click', function() {

                document.querySelectorAll('.state-tab').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                selectedState = this.dataset.state;
                filterJobs();
            });
        });

        document.querySelectorAll('.cat-tab').forEach(btn => {
            btn.addEventListener('click', function() {

                document.querySelectorAll('.cat-tab').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                selectedCat = this.dataset.cat;
                filterJobs();
            });
        });

        function filterJobs() {
            document.querySelectorAll('.job-item').forEach(job => {

                let jobState = job.dataset.state;
                let jobCat = job.dataset.cat;

                let matchState = selectedState === '' || jobState.includes(selectedState);
                let matchCat = selectedCat === '' || selectedCat === 'All' || jobCat === selectedCat;

                if (matchState && matchCat) {
                    job.style.display = 'block';
                } else {
                    job.style.display = 'none';
                }

            });
        }
    </script>
@endsection
