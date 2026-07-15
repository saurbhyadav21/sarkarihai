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
    <div class="job-card">

        <div class="job-card-left">

            <h3>
                <a href="{{ route('jobs.show', $job->slug) }}">
                    {{ $job->title }}
                </a>
            </h3>

            <div class="job-meta">

                @if ($job->organization)
                    <span>
                        <i class="fas fa-building"></i>
                        {{ $job->organization }}
                    </span>
                @endif

                @if ($job->state)
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $job->state }}
                    </span>
                @endif

                @if ($job->qualification)
                    <span>
                        <i class="fas fa-graduation-cap"></i>
                        {{ $job->qualification }}
                    </span>
                @endif

                {{-- @if ($job->vacancy)
                    <span>
                        <i class="fas fa-users"></i>
                        {{ number_format($job->vacancy) }} Posts
                    </span>
                @endif --}}

            </div>

            <div class="job-tags">

                @if ($job->category)
                    <span class="tag">
                        {{ ucfirst(str_replace('-', ' ', $job->category)) }}
                    </span>
                @endif

                {{-- @if ($job->sub_category)
                    <span class="tag">
                        {{ $job->subCategory->name ?? ucfirst(str_replace('-', ' ', $job->sub_category)) }}
                    </span>
                @endif --}}

            </div>

        </div>

        {{-- <div class="job-card-right">

            @php

                $days = now()->diffInDays($job->last_date, false);

            @endphp

            @if ($days < 0)
                <span class="badge bg-danger">
                    Closed
                </span>
            @elseif($days <= 7)
                <span class="badge bg-danger">
                    Last {{ $days }} Days
                </span>
            @elseif($days <= 15)
                <span class="badge bg-warning text-dark">
                    {{ $days }} Days Left
                </span>
            @else
                <span class="badge bg-success">
                    Active
                </span>
            @endif

            <div class="last-date">

                <strong>Last Date</strong>

                <br>

                {{ \Carbon\Carbon::parse($job->last_date)->format('d M Y') }}

            </div>

            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-primary btn-sm mt-3">

                View Details

            </a>

        </div> --}}

    </div>

@empty

    <div class="alert alert-warning">

        No Jobs Found.

    </div>
@endforelse
