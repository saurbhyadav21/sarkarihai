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

                            <a href="{{ route('jobs.details', $job->slug) }}"
                                class="text-dark text-decoration-none fw-bold">

                                {{ $job->title }}

                            </a>

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

                                <div class="fw-semibold">

                                    {{ $job->salary ?: 'As Per Rules' }}

                                </div>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted">

                                    <i class="fa-solid fa-users me-2"></i>

                                    Total Posts

                                </small>

                                <div class="fw-semibold">

                                    {{ $job->total_post ?: ($job->vacancy ?: '-') }}

                                </div>

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

                        <a href="{{ route('jobs.details', $job->slug) }}"
                            class="btn btn-primary btn-sm">

                            <i class="fa-solid fa-eye me-1"></i>

                            View Details

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>