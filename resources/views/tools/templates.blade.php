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

            {{-- ================= JOB 1 ================= --}}
            @php
                $job1 = $jobPair->get(0);
            @endphp

            @if ($job1)

                <td>
                    {{ $job1->title }}
                </td>

                <td>
                    {{ $job1->organization ?: '-' }}
                </td>

                <td>
                    {{ $job1->min_qulification ?: 'Various Qualifications' }}
                </td>

                <td>
                    {{ $job1->post_name ?: 'Various Posts' }}
                </td>

                <td>
                    {{ $job1->end_date
                        ? \Carbon\Carbon::parse($job1->end_date)->format('d M Y')
                        : '-' }}
                </td>

                <td>
                    {{ $job1->apply_mode ?: '-' }}
                </td>

                <td>
                    {{ $job1->total_vacancies ?: '-' }}
                </td>

                <td>
                    {{ $job1->post_salary ?: '-' }}
                </td>

                <td>
                    {{ $job1->min_age ?: '-' }}
                    -
                    {{ $job1->max_age_genral ?: '-' }}
                </td>

                <td>
                    {{ $job1->state
                        ? ucwords(str_replace('-', ' ', strtolower($job1->state)))
                        : '-' }}
                </td>

                {{-- JOB 1 YOUTUBE DESCRIPTION HIDDEN --}}
                <td style="display:none;">
                    Job 1 YouTube Description
                </td>

            @endif


            {{-- ================= JOB 2 ================= --}}
            @php
                $job2 = $jobPair->get(1);
            @endphp

            @if ($job2)

                <td>
                    {{ $job2->title }}
                </td>

                <td>
                    {{ $job2->organization ?: '-' }}
                </td>

                <td>
                    {{ $job2->min_qulification ?: 'Various Qualifications' }}
                </td>

                <td>
                    {{ $job2->post_name ?: 'Various Posts' }}
                </td>

                <td>
                    {{ $job2->end_date
                        ? \Carbon\Carbon::parse($job2->end_date)->format('d M Y')
                        : '-' }}
                </td>

                <td>
                    {{ $job2->apply_mode ?: '-' }}
                </td>

                <td>
                    {{ $job2->total_vacancies ?: '-' }}
                </td>

                <td>
                    {{ $job2->post_salary ?: '-' }}
                </td>

                <td>
                    {{ $job2->min_age ?: '-' }}
                    -
                    {{ $job2->max_age_genral ?: '-' }}
                </td>

                <td>
                    {{ $job2->state
                        ? ucwords(str_replace('-', ' ', strtolower($job2->state)))
                        : '-' }}
                </td>

                {{-- ========================================= --}}
                {{-- COMBINED YOUTUBE DESCRIPTION              --}}
                {{-- JOB 1 + JOB 2 IN ONE TEXTAREA              --}}
                {{-- ========================================= --}}

                @php

                    $youtubeDescription = '';

                    foreach ($jobPair as $descJob) {

                        $youtubeDescription .=
                            "📢 {$descJob->title}\n\n" .

                            "🏢 Organization: " .
                            ($descJob->organization ?: '-') .
                            "\n" .

                            "💼 Post: " .
                            ($descJob->post_name ?: 'Various Posts') .
                            "\n" .

                            "🎓 Qualification: " .
                            ($descJob->min_qulification ?: 'Various Qualifications') .
                            "\n" .

                            "👥 Total Vacancies: " .
                            ($descJob->total_vacancies ?: '-') .
                            "\n" .

                            "💰 Salary: " .
                            ($descJob->post_salary ?: '-') .
                            "\n" .

                            "🎯 Age Limit: " .
                            (($descJob->min_age ?: '-') .
                            ' - ' .
                            ($descJob->max_age_genral ?: '-')) .
                            "\n" .

                            "📅 Last Date: " .
                            ($descJob->end_date
                                ? \Carbon\Carbon::parse($descJob->end_date)->format('d M Y')
                                : '-') .
                            "\n" .

                            "📝 Apply Mode: " .
                            ($descJob->apply_mode ?: '-') .
                            "\n" .

                            "📍 State: " .
                            ($descJob->state
                                ? ucwords(str_replace('-', ' ', strtolower($descJob->state)))
                                : '-') .
                            "\n\n";
                    }

                @endphp

                <td>

                    <textarea
                        id="youtubeDescription{{ $job2->id }}"
                        rows="18"
                        style="width:500px;"
                    >{{ $youtubeDescription }}</textarea>

                    <br>

                    <button
                        type="button"
                        onclick="copyYoutubeDescription({{ $job2->id }}, this)"
                        style="margin-top:5px; padding:8px 15px; cursor:pointer;"
                    >
                        📋 Copy
                    </button>

                </td>

            @else

                {{-- अगर आखिरी row में सिर्फ Job 1 है --}}
                {{-- Job 2 के 10 normal columns खाली --}}
                @for ($i = 0; $i < 10; $i++)
                    <td>-</td>
                @endfor

                {{-- Combined YouTube Description फिर भी Job 1 की होगी --}}
                @php

                    $youtubeDescription = '';

                    $youtubeDescription .=
                        "📢 {$job1->title}\n\n" .

                        "🏢 Organization: " .
                        ($job1->organization ?: '-') .
                        "\n" .

                        "💼 Post: " .
                        ($job1->post_name ?: 'Various Posts') .
                        "\n" .

                        "🎓 Qualification: " .
                        ($job1->min_qulification ?: 'Various Qualifications') .
                        "\n" .

                        "👥 Total Vacancies: " .
                        ($job1->total_vacancies ?: '-') .
                        "\n" .

                        "💰 Salary: " .
                        ($job1->post_salary ?: '-') .
                        "\n" .

                        "🎯 Age Limit: " .
                        (($job1->min_age ?: '-') .
                        ' - ' .
                        ($job1->max_age_genral ?: '-')) .
                        "\n" .

                        "📅 Last Date: " .
                        ($job1->end_date
                            ? \Carbon\Carbon::parse($job1->end_date)->format('d M Y')
                            : '-') .
                        "\n" .

                        "📝 Apply Mode: " .
                        ($job1->apply_mode ?: '-') .
                        "\n" .

                        "📍 State: " .
                        ($job1->state
                            ? ucwords(str_replace('-', ' ', strtolower($job1->state)))
                            : '-') .
                        "\n\n";

                @endphp

                <td>

                    <textarea
                        id="youtubeDescription{{ $job1->id }}"
                        rows="18"
                        style="width:500px;"
                    >{{ $youtubeDescription }}</textarea>

                    <br>

                    <button
                        type="button"
                        onclick="copyYoutubeDescription({{ $job1->id }}, this)"
                        style="margin-top:5px; padding:8px 15px; cursor:pointer;"
                    >
                        📋 Copy
                    </button>

                </td>

            @endif

        </tr>

    @endforeach

</tbody>


<script>
function copyYoutubeDescription(id, button) {

    const textarea =
        document.getElementById('youtubeDescription' + id);

    navigator.clipboard.writeText(textarea.value)
        .then(function () {

            const oldText = button.innerHTML;

            button.innerHTML = '✅ Copied!';

            setTimeout(function () {
                button.innerHTML = oldText;
            }, 1500);

        })
        .catch(function () {

            textarea.select();

            document.execCommand('copy');

            button.innerHTML = '✅ Copied!';

            setTimeout(function () {
                button.innerHTML = '📋 Copy';
            }, 1500);
        });
}
</script>


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
