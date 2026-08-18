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
            'min_age',
            'max_age_genral',
            'state',
            'post_eligibility',
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
        @forelse($jobs as $job)
            <tr>
             

                <td>{{ $job->title }}</td>

                <td>{{ $job->organization }}</td>

                <td>{{ $job->post_eligibility }}</td>

                <td>{{ $job->post_name }}</td>

                <td>
                    {{ $job->end_date
                        ? \Carbon\Carbon::parse($job->end_date)->format('d M Y')
                        : '-' }}
                </td>

                <td>{{ $job->apply_mode ?: '-' }}</td>

                <td>
    {{ $job->total_vacancies
        ? preg_replace('/\s*posts?\b/i', '', $job->total_vacancies)
        : '-' }}
</td>

                @php
    $salaryText = $job->post_salary ?? '';

    preg_match_all('/(?:Rs\.?|₹)\s*([\d,]+(?:\.\d+)?)/i', $salaryText, $matches);

    $amounts = [];

    foreach ($matches[1] as $amount) {
        $amounts[] = (float) str_replace(',', '', $amount);
    }

    // Range ke second amounts bhi pakadne ke liye
    preg_match_all('/-\s*([\d,]+(?:\.\d+)?)/', $salaryText, $rangeMatches);

    foreach ($rangeMatches[1] as $amount) {
        $amounts[] = (float) str_replace(',', '', $amount);
    }

    $amounts = array_filter($amounts);

    $minSalary = !empty($amounts) ? min($amounts) : null;
    $maxSalary = !empty($amounts) ? max($amounts) : null;
@endphp

<td>{{ $minSalary && $maxSalary
    ? 'Rs. ' . number_format($minSalary) . ' - ' . number_format($maxSalary)
    : '-' }}</td>

                <td>
    @php
        $minAge = $job->min_age;
        $maxAge = $job->max_age_genral;

        if ($minAge == $maxAge && $maxAge) {
            $minAge = 18;
        }
    @endphp

    {{ $minAge ?: '-' }} - {{ $maxAge ?: '-' }}
</td>

                <td>
    {{ $job->state
        ? ucwords(str_replace('-', ' ', strtolower($job->state)))
        : '-' }}
</td>
            </tr>
        @empty
            <tr>
                <td colspan="11">
                    No jobs found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>