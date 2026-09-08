@php
    $jobs = DB::table('job_details')
        ->select('*')
        ->where('created_at', '>=', $date . ' 00:00:00')
        ->where('created_at', '<', date('Y-m-d', strtotime($date . ' +1 day')) . ' 00:00:00')
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
            <th>Job 1 - Title</th>
            <th>Job 1 - Organization</th>
            <th>Job 1 - Qualification</th>
            <th>Job 1 - Post Name</th>
            <th>Job 1 - Last Date</th>
            <th>Job 1 - Apply Mode</th>
            <th>Job 1 - Vacancies</th>
            <th>Job 1 - Salary</th>
            <th>Job 1 - Age</th>
            <th>Job 1 - State</th>
            <th>Job 1 - YouTube Description</th>

            <th>Job 2 - Title</th>
            <th>Job 2 - Organization</th>
            <th>Job 2 - Qualification</th>
            <th>Job 2 - Post Name</th>
            <th>Job 2 - Last Date</th>
            <th>Job 2 - Apply Mode</th>
            <th>Job 2 - Vacancies</th>
            <th>Job 2 - Salary</th>
            <th>Job 2 - Age</th>
            <th>Job 2 - State</th>
            <th>Job 2 - YouTube Description</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($jobs->chunk(2) as $jobPair)
            <tr>

                @foreach ($jobPair as $job)
                    <td>
                        {{ $job->title }}
                    </td>

                    <td>
                        {{ $job->organization ?: '-' }}
                    </td>

                    <td>
                        {{ $job->min_qulification ?: 'Various Qualifications' }}
                    </td>

                    <td>
                        {{ $job->post_name ?: 'Various Posts' }}
                    </td>

                    <td>
                        {{ $job->end_date ? \Carbon\Carbon::parse($job->end_date)->format('d M Y') : '-' }}
                    </td>

                    <td>
                        {{ $job->apply_mode ?: '-' }}
                    </td>

                    <td>
                        {{ $job->total_vacancies ?: '-' }}
                    </td>

                    <td>
                        {{ $job->post_salary ?: '-' }}
                    </td>

                    <td>
                        {{ $job->min_age ?: '-' }}
                        -
                        {{ $job->max_age_genral ?: '-' }}
                    </td>

                    <td>
                        {{ $job->state ? ucwords(str_replace('-', ' ', strtolower($job->state))) : '-' }}
                    </td>

                    <td>
                        {{-- YouTube Description - BOTH JOBS IN ONE TEXTAREA --}}

                        @php
                            $youtubeDescription = '';

                            foreach ($jobPair as $job) {
                                $youtubeDescription .=
                                    "📢 {$job->title}\n\n" .
                                    '🏢 Organization: ' .
                                    ($job->organization ?: '-') .
                                    "\n" .
                                    '💼 Post: ' .
                                    ($job->post_name ?: 'Various Posts') .
                                    "\n" .
                                    '🎓 Qualification: ' .
                                    ($job->min_qulification ?: 'Various Qualifications') .
                                    "\n" .
                                    '👥 Total Vacancies: ' .
                                    ($job->total_vacancies ?: '-') .
                                    "\n" .
                                    '💰 Salary: ' .
                                    ($job->post_salary ?: '-') .
                                    "\n" .
                                    '🎯 Age Limit: ' .
                                    (($job->min_age ?: '-') . ' - ' . ($job->max_age_genral ?: '-')) .
                                    "\n" .
                                    '📅 Last Date: ' .
                                    ($job->end_date ? \Carbon\Carbon::parse($job->end_date)->format('d M Y') : '-') .
                                    "\n" .
                                    '📝 Apply Mode: ' .
                                    ($job->apply_mode ?: '-') .
                                    "\n" .
                                    '📍 State: ' .
                                    ($job->state ? ucwords(str_replace('-', ' ', strtolower($job->state))) : '-') .
                                    "\n\n";
                            }
                        @endphp

                    <td>
                        <textarea id="youtubeDescription{{ $jobPair->first()->id }}" rows="18" style="width:500px;">{{ $youtubeDescription }}</textarea>

                        <br>

                        <button type="button" onclick="copyYoutubeDescription({{ $jobPair->first()->id }}, this)"
                            style="margin-top:5px; padding:8px 15px; cursor:pointer;">
                            📋 Copy
                        </button>
                    </td>
                @endforeach

                {{-- अगर आखिरी में केवल 1 job बची --}}
                @if ($jobPair->count() == 1)
                    @for ($i = 0; $i < 11; $i++)
                        <td>-</td>
                    @endfor
                @endif

            </tr>
        @endforeach

    </tbody>
</table>

<script>
    function copyYoutubeDescription(id, button) {

        const textarea =
            document.getElementById('youtubeDescription' + id);

        navigator.clipboard.writeText(textarea.value)
            .then(function() {

                const oldText = button.innerHTML;

                button.innerHTML = '✅ Copied!';

                setTimeout(function() {
                    button.innerHTML = oldText;
                }, 1500);

            })
            .catch(function() {

                textarea.select();

                document.execCommand('copy');

                button.innerHTML = '✅ Copied!';

                setTimeout(function() {
                    button.innerHTML = '📋 Copy';
                }, 1500);
            });
    }
</script>
