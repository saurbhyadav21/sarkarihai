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
    white-space: nowrap;
}

.job-table th,
.job-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: top;
}

.job-table th {
    background: #f5f5f5;
    font-weight: 700;
}

.job-table tr:nth-child(even) {
    background: #fafafa;
}
</style>

<table class="job-table">
    <thead>
        <tr>
            {{-- JOB 1 HEADERS --}}
            <th>ID</th>
            <th>Title</th>
            <th>Organization</th>
            <th>Qualification</th>
            <th>Post Name</th>
            <th>Last Date</th>
            <th>Apply Mode</th>
            <th>Vacancies</th>
            <th>Salary</th>
            <th>Age</th>
            <th>State</th>

            {{-- JOB 2 HEADERS --}}
            <th>ID</th>
            <th>Title</th>
            <th>Organization</th>
            <th>Qualification</th>
            <th>Post Name</th>
            <th>Last Date</th>
            <th>Apply Mode</th>
            <th>Vacancies</th>
            <th>Salary</th>
            <th>Age</th>
            <th>State</th>
        </tr>
    </thead>

    <tbody>

        @forelse($jobs->chunk(2) as $pair)

            <tr>

                {{-- JOB 1 --}}
                @if(isset($pair[0]))

                    <td>{{ $pair[0]->id }}</td>

                    <td>{{ $pair[0]->title }}</td>

                    <td>{{ $pair[0]->organization }}</td>

                    <td>{{ $pair[0]->min_qulification }}</td>

                    <td>{{ $pair[0]->post_name }}</td>

                    <td>
                        {{ $pair[0]->end_date
                            ? \Carbon\Carbon::parse($pair[0]->end_date)->format('d M Y')
                            : '-' }}
                    </td>

                    <td>{{ $pair[0]->apply_mode ?: '-' }}</td>

                    <td>{{ $pair[0]->total_vacancies ?: '-' }}</td>

                    <td>{{ $pair[0]->post_salary ?: '-' }}</td>

                    <td>{{ $pair[0]->age_p ?: '-' }}</td>

                    <td>{{ $pair[0]->state ?: '-' }}</td>

                @endif


                {{-- JOB 2 --}}
                @if(isset($pair[1]))

                    <td>{{ $pair[1]->id }}</td>

                    <td>{{ $pair[1]->title }}</td>

                    <td>{{ $pair[1]->organization }}</td>

                    <td>{{ $pair[1]->min_qulification }}</td>

                    <td>{{ $pair[1]->post_name }}</td>

                    <td>
                        {{ $pair[1]->end_date
                            ? \Carbon\Carbon::parse($pair[1]->end_date)->format('d M Y')
                            : '-' }}
                    </td>

                    <td>{{ $pair[1]->apply_mode ?: '-' }}</td>

                    <td>{{ $pair[1]->total_vacancies ?: '-' }}</td>

                    <td>{{ $pair[1]->post_salary ?: '-' }}</td>

                    <td>{{ $pair[1]->age_p ?: '-' }}</td>

                    <td>{{ $pair[1]->state ?: '-' }}</td>

                @else

                    {{-- Agar last mein sirf 1 job ho --}}
                    <td colspan="11">-</td>

                @endif

            </tr>

        @empty

            <tr>
                <td colspan="22">
                    No jobs found.
                </td>
            </tr>

        @endforelse

    </tbody>
</table>