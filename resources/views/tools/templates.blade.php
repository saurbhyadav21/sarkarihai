@php
    $jobs = DB::table('job_details')
        ->select(
            'id',
            'title',
            'organization',
            'min_qulification',
            'post_name',
            'end_date',
            'apply_mode',
            'total_vacancies',
            'post_salary',
            'age_p',
            'state'
        )
        ->where('created_at', '>=', '2026-08-10 00:00:00')
        ->where('created_at', '<', '2026-08-11 00:00:00')
        ->whereDate('end_date', '>=', now()->toDateString())
        ->get();
@endphp

<style>
  .job-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    table-layout: fixed;
}

.job-table td {
    width: 50%;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    vertical-align: top;
}

.job-table tr:nth-child(even) {
    background: #fafafa;
}

.job-table strong {
    font-size: 16px;
    display: block;
    margin-bottom: 8px;
}

.job-table small {
    line-height: 1.6;
}
</style>

<table class="job-table">
    <thead>
        <tr>
            <th colspan="2">Job Post 1</th>
            <th colspan="2">Job Post 2</th>
        </tr>
    </thead>

    <tbody>
        @forelse($jobs->chunk(2) as $pair)
            <tr>

                {{-- JOB 1 --}}
                @if(isset($pair[0]))
                    <td>
                        <strong>{{ $pair[0]->title }}</strong><br>
                        <small>{{ $pair[0]->organization }}</small><br>
                        <small>
                            Qualification: {{ $pair[0]->min_qulification ?: '-' }}
                        </small><br>
                        <small>
                            Post: {{ $pair[0]->post_name ?: '-' }}
                        </small><br>
                        <small>
                            Last Date:
                            {{ $pair[0]->end_date
                                ? \Carbon\Carbon::parse($pair[0]->end_date)->format('d M Y')
                                : '-' }}
                        </small><br>
                        <small>
                            Apply: {{ $pair[0]->apply_mode ?: '-' }}
                        </small><br>
                        <small>
                            Vacancies: {{ $pair[0]->total_vacancies ?: '-' }}
                        </small><br>
                        <small>
                            Salary: {{ $pair[0]->post_salary ?: '-' }}
                        </small><br>
                        <small>
                            Age: {{ $pair[0]->age_p ?: '-' }}
                        </small><br>
                        <small>
                            State: {{ $pair[0]->state ?: '-' }}
                        </small>
                    </td>
                @else
                    <td>-</td>
                @endif


                {{-- JOB 2 --}}
                @if(isset($pair[1]))
                    <td>
                        <strong>{{ $pair[1]->title }}</strong><br>
                        <small>{{ $pair[1]->organization }}</small><br>
                        <small>
                            Qualification: {{ $pair[1]->min_qulification ?: '-' }}
                        </small><br>
                        <small>
                            Post: {{ $pair[1]->post_name ?: '-' }}
                        </small><br>
                        <small>
                            Last Date:
                            {{ $pair[1]->end_date
                                ? \Carbon\Carbon::parse($pair[1]->end_date)->format('d M Y')
                                : '-' }}
                        </small><br>
                        <small>
                            Apply: {{ $pair[1]->apply_mode ?: '-' }}
                        </small><br>
                        <small>
                            Vacancies: {{ $pair[1]->total_vacancies ?: '-' }}
                        </small><br>
                        <small>
                            Salary: {{ $pair[1]->post_salary ?: '-' }}
                        </small><br>
                        <small>
                            Age: {{ $pair[1]->age_p ?: '-' }}
                        </small><br>
                        <small>
                            State: {{ $pair[1]->state ?: '-' }}
                        </small>
                    </td>
                @else
                    <td>-</td>
                @endif

            </tr>
        @empty
            <tr>
                <td colspan="2">
                    No jobs found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>