<style>
    .job-card {

        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 20px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 10px;
        margin-bottom: 15px;

    }

    .job-card h3 {

        font-size: 20px;
        margin-bottom: 10px;

    }

    .job-card h3 a {

        color: #222;
        text-decoration: none;

    }

    .job-meta {

        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        font-size: 14px;
        margin-bottom: 12px;
        color: #666;

    }

    .job-tags {

        display: flex;
        gap: 8px;
        flex-wrap: wrap;

    }

    .tag {

        background: #eef5ff;
        padding: 4px 10px;
        border-radius: 30px;
        font-size: 13px;

    }

    .job-card-right {

        text-align: right;
        min-width: 180px;

    }

    .last-date {

        margin-top: 15px;
        font-size: 14px;

    }

    @media(max-width:768px) {

        .job-card {

            flex-direction: column;

        }

        .job-card-right {

            text-align: left;

        }

    }
</style>
@forelse($jobs as $job)
    <div class="card border-0 shadow-sm mb-3 job-card">

        <div class="card-body">

            <div class="row">

                <div class="col-lg-9">

                    <div class="d-flex align-items-start">

                        <div class="job-icon me-3">

                            <i class="fa-solid fa-briefcase"></i>

                        </div>

                        <div class="flex-grow-1">

                            <h5 class="mb-2">

                                @if ($job->state && $job->category && $job->slug)
                                    <a
                                        href="{{ route('sarkari.naukri.detail', [$job->state, $job->category, $job->slug]) }}">
                                        {{ $job->title }}
                                    </a>
                                @else
                                    <span>{{ $job->title }}</span>
                                @endif

                            </h5>

                            <div class="d-flex flex-wrap gap-2 mb-3">

                                <span class="badge bg-primary">

                                    {{ $job->organization ?: 'Government Department' }}

                                </span>

                                <span class="badge bg-success">

                                    {{ $job->state ?: 'All India' }}

                                </span>

                                <span class="badge bg-warning text-dark">

                                    {{ $job->category ?: 'Government Job' }}

                                </span>

                                @if (!empty($job->job_sub_categories))
                                    @php
                                        $sub = explode('#', $job->job_sub_categories);
                                    @endphp

                                    <span class="badge bg-info text-dark">

                                        {{ trim($sub[0]) }}

                                    </span>
                                @endif

                            </div>

                            <div class="row g-3">

                                <div class="col-md-6">

                                    <small class="text-muted">

                                        <i class="fa-solid fa-graduation-cap me-2"></i>

                                        Qualification

                                    </small>

                                    <div class="fw-semibold">

                                        {{ $job->min_qulification ?: ($job->qualification ?: 'As Per Notification') }}

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <small class="text-muted">

                                        <i class="fa-solid fa-calendar-days me-2"></i>

                                        Last Date

                                    </small>

                                    <div class="fw-semibold text-danger">

                                        {{ !empty($job->end_date) ? \Carbon\Carbon::parse($job->end_date)->format('d M Y') : '-' }}

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <small class="text-muted">

                                        <i class="fa-solid fa-indian-rupee-sign me-2"></i>

                                        Salary

                                    </small>

                                    {{-- <div class="fw-semibold">

                                    {{ $job->salary ?: 'As Per Rules' }}

                                </div> --}}

                                </div>

                                <div class="col-md-6">

                                    <small class="text-muted">

                                        <i class="fa-solid fa-users me-2"></i>

                                        Total Posts

                                    </small>

                                    {{-- <div class="fw-semibold">

                                    {{ $job->total_post ?: ($job->vacancy ?: '-') }}

                                </div> --}}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="h-100 d-flex flex-column justify-content-between">

                        <div class="text-lg-end mb-3">

                            @if (!empty($job->end_date))
                                @php
                                    $days = now()->diffInDays(\Carbon\Carbon::parse($job->end_date), false);
                                @endphp

                                @if ($days < 0)
                                    <span class="badge bg-danger">

                                        Closed

                                    </span>
                                @elseif($days <= 7)
                                    <span class="badge bg-warning text-dark">

                                        Closing Soon

                                    </span>
                                @else
                                    <span class="badge bg-success">

                                        Active

                                    </span>
                                @endif
                            @endif

                        </div>

                        <div class="d-grid gap-2">

                            @if (!empty($job->state) && !empty($job->category) && !empty($job->slug))
                                <a href="{{ route('sarkari.naukri.detail', [$job->state, $job->category, $job->slug]) }}"
                                    class="btn btn-primary btn-sm">

                                    View Details

                                </a>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@empty

    <div class="alert alert-warning">

        No Jobs Found.

    </div>
@endforelse
