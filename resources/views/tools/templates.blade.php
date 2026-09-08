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
    .job-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
    min-width: 1600px;
}

.job-table th,
.job-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
    vertical-align: top;
    white-space: normal;
}

.job-table th {
    background: #f5f5f5;
    font-weight: 700;
    white-space: nowrap;
}

.job-table tr:nth-child(even) {
    background: #fafafa;
}
</style>

<table class="job-table">
    <thead>
        <tr>
            <th>Organization</th>
            <th>Organization Full Form</th>
            <th>Post</th>
            <th>Mode</th>
            <th>Post Number</th>
            <th>योग्यता</th>
            <th>पद</th>
            <th>आवेदन शुरू</th>
            <th>जॉब लोकेशन</th>
            <th>वेतनमान</th>
            <th>अंतिम तिथि</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($jobs as $job)

        <tr>

            {{-- Organization --}}
            <td>
                {{ $job->organization ?: '-' }}
            </td>

            {{-- Organization Full Form --}}
            <td>
                {{ $job->organization_full_form ?: '-' }}
            </td>

            {{-- Post --}}
            <td>
                {{ $job->title ?: '-' }}
            </td>

            {{-- Mode --}}
            <td>
                {{ $job->apply_mode ?: '-' }}
            </td>

            {{-- Post Number --}}
            <td>
                {{ $job->total_vacancies
                    ? preg_replace('/\s*posts?\b/i', '', $job->total_vacancies)
                    : '-' }}
            </td>

            {{-- योग्यता --}}
            <td>
                @php
                    $qualificationText = $job->post_eligibility ?? '';

                    $qualifications = preg_split(
                        '/\s*#\s*/',
                        $qualificationText
                    );

                    $qualifications = array_filter(
                        $qualifications,
                        fn($qualification) => trim($qualification) !== ''
                    );

                    $qualifications = array_values(
                        array_unique($qualifications)
                    );
                @endphp

                @if(count($qualifications) === 1)
                    {{ trim($qualifications[0]) }}
                @elseif(!empty($job->min_qulification))
                    {{ $job->min_qulification }}
                @else
                    -
                @endif
            </td>

            {{-- पद --}}
            <td>
                @php
                    $postText = $job->post_name ?? '';

                    $removePosts = [
                        'total posts',
                        'no. of posts',
                        'salary per month',
                        'salary'
                    ];

                    $posts = preg_split(
                        '/\s*#\s*/',
                        $postText
                    );

                    $posts = array_filter(
                        $posts,
                        function ($post) use ($removePosts) {

                            $post = trim($post);

                            if ($post === '') {
                                return false;
                            }

                            return !in_array(
                                strtolower($post),
                                $removePosts
                            );
                        }
                    );

                    $posts = array_values(
                        array_unique($posts)
                    );
                @endphp

                @if(count($posts) === 1)
                    {{ $posts[0] }}
                @elseif(count($posts) > 1)
                    {{ implode(', ', $posts) }}
                @else
                    -
                @endif
            </td>

            {{-- आवेदन शुरू --}}
            <td>
                @if(!empty($job->start_date))
                    {{ \Carbon\Carbon::parse($job->start_date)->format('d-M-y') }}
                @else
                    -
                @endif
            </td>

            {{-- जॉब लोकेशन --}}
            <td>
                {{ $job->job_location ?: ($job->state ?: '-') }}
            </td>

            {{-- वेतनमान --}}
            <td>
                @php
                    $salaryText = $job->post_salary ?? '';

                    preg_match_all(
                        '/(?:Rs\.?|₹)\s*([\d,]+(?:\.\d+)?)/i',
                        $salaryText,
                        $matches
                    );

                    $amounts = [];

                    foreach ($matches[1] as $amount) {
                        $amounts[] = (float) str_replace(',', '', $amount);
                    }

                    // Range ke second amount
                    preg_match_all(
                        '/-\s*([\d,]+(?:\.\d+)?)/',
                        $salaryText,
                        $rangeMatches
                    );

                    foreach ($rangeMatches[1] as $amount) {
                        $amounts[] = (float) str_replace(',', '', $amount);
                    }

                    $amounts = array_filter($amounts);

                    $minSalary = !empty($amounts)
                        ? min($amounts)
                        : null;

                    $maxSalary = !empty($amounts)
                        ? max($amounts)
                        : null;
                @endphp

                @if($minSalary && $maxSalary)
                    Rs. {{ number_format($minSalary) }}
                    -
                    {{ number_format($maxSalary) }}/-
                @elseif($job->post_salary)
                    {{ $job->post_salary }}
                @else
                    -
                @endif
            </td>

            {{-- अंतिम तिथि --}}
            <td>
                @if($job->end_date)
                    {{ \Carbon\Carbon::parse($job->end_date)->format('d-M-y') }}
                @else
                    -
                @endif
            </td>

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
