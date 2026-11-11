<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Date Extraction</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }

        .table td {
            vertical-align: top;
        }

        .title-box {
            min-width: 250px;
            max-width: 350px;
            font-size: 13px;
            white-space: normal;
        }

        .prompt-box {
            min-width: 420px;
        }

        .output-box {
            min-width: 500px;
        }

        .output-box textarea {
            min-height: 280px;
            font-size: 13px;
            font-family: monospace;
        }

        .copy-btn {
            white-space: nowrap;
        }

        .chunk-heading {
            background: #e9ecef;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container-fluid mt-4 mb-5">

        <div class="card shadow">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Jobs — Date Extraction Management</h5>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <p>
                    Pending Records:
                    <strong>{{ $jobs->total() }}</strong>
                </p>

                @php
    $chunks = $jobs->getCollection()->chunk(5);

    $prompt = <<<'PROMPT'
You are an expert recruitment data extractor and deep research analyst.

TASK:
For each Job ID and Title provided below, conduct deep web research to locate the official recruitment notification and extract accurate date details for the 2026 recruitment cycle.

You must research each job individually using its Job ID, Job Title, recruitment authority, and available source information.

MANDATORY RESEARCH INSTRUCTIONS:

1. Search the official recruitment website, official notification PDF, recruitment authority website, and reliable job portals.
2. Search using the exact Job ID and Job Title wherever possible.
3. Verify dates from the official recruitment notification or official website whenever available.
4. If the official notification is unavailable, consult reliable recruitment portals and other credible sources.
5. Cross-check important dates from multiple sources wherever possible.
6. Do not assume that all recruitment dates are the same as another year's recruitment.
7. Give priority to the 2026 recruitment notification. If the 2026 notification is not available, do not use previous-year dates as 2026 dates.
8. Do NOT leave fields as N/A without proper research.
9. Do not invent, assume, or estimate any dates.
10. If a date is genuinely unavailable after research, return N/A with a short Hindi explanation.

OUTPUT REQUIREMENTS:

Return strictly valid JSON as an array of objects.

Each object must contain exactly these 12 fields:

{
    "id": "[JOB ID]",
    "notification_date": "[Exact Date with short context in Hindi or N/A with reason]",
    "start_date": "[Exact Date with short context in Hindi or N/A with reason]",
    "end_date": "[Exact Date with short context in Hindi or N/A with reason]",
    "walkin_date": "[Exact Date/Time details or N/A with reason]",
    "interview_date": "[Exact Date/Time details or N/A with reason]",
    "last_fee_date": "[Fee Last Date or N/A with reason]",
    "correction_date": "[Correction Date or N/A with reason]",
    "exam_date": "[Exam Date or N/A with reason]",
    "result_date": "[Result Date status in Hindi or N/A with reason]",
    "info_date": "[Info Date details or N/A with reason]"
}

DATE EXTRACTION RULES:

1. notification_date:
   Official notification publication date.

2. start_date:
   Online application starting date or registration start date.

3. end_date:
   Online application closing date or last application submission date.

4. walkin_date:
   Walk-in interview date, reporting time, and venue timing if officially available.

5. interview_date:
   Interview date, schedule, and time if officially available.

6. last_fee_date:
   Last date for application fee payment.

7. correction_date:
   Application form correction window start and end dates.

8. exam_date:
   Written examination, CBT, skill test, or other examination dates.

9. result_date:
   Result declaration date or current result status, with Hindi context.

10. info_date:
    Important information dates such as admit card release, answer key, document verification, or other important announcements.

STRICT RULES:

1. Extract dates only from researched and verifiable information.
2. Never guess or invent dates.
3. Always provide a short Hindi context with every date or N/A with a reason in Hindi.
4. Preserve exact dates in DD Month YYYY format.
5. Include short Hindi context with every available date.
   Example: "15 November 2026 (आवेदन की अंतिम तिथि)"
6. If a date is genuinely not applicable, return N/A with a short Hindi reason.
   Example: "N/A (इस भर्ती में वॉक-इन इंटरव्यू नहीं है)"
7. If a date has not yet been officially announced, mention:
   "N/A (आधिकारिक तिथि अभी घोषित नहीं हुई है)"
8. If reliable sources provide conflicting dates, prioritize the latest official notification.
9. Do not confuse notification date, application start date, and application last date.
10. Copy the exact Job ID. Never modify IDs.
11. Return exactly one object per supplied job.
12. Maintain the same order as the supplied Job IDs.
13. Do not skip any job, even if information is unavailable.
14. Every object must contain all 12 fields.
15. Return valid JSON array only.
16. Do not include Markdown, explanations, citations outside JSON, or commentary.
17. Ensure the final JSON is syntactically valid and can be decoded using PHP json_decode().

JOB DATA:
PROMPT;
@endphp

                <div class="table-responsive">

                    <table class="table table-bordered table-striped align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th style="width:70px;">ID</th>
                                <th>Source</th>
                                <th>Title</th>
                                <th>Prompt</th>
                                <th>ChatGPT Output JSON</th>
                            </tr>
                        </thead>

                        <tbody>
    @forelse($chunks as $chunkIndex => $chunk)

        @php
            $ids = $chunk->pluck('id')->implode(', ');

            $titles = $chunk
                ->pluck('title')
                ->map(fn($title) => trim($title ?? ''))
                ->implode(', ');

            $chunkPrompt = $prompt . "\n\nJOB IDs:\n" . $ids .
                "\n\nJOB TITLES:\n" . $titles .
                "\n\nFor each ID, extract dates from its corresponding job notification. Use the supplied job data below.";
        @endphp

        <tr>
            <td>
                <strong>Chunk {{ $chunkIndex + 1 }}</strong>
                <br>
                <span class="badge bg-primary">{{ $chunk->count() }} Jobs</span>
                <br>
                <small>{{ $chunk->first()->id }} - {{ $chunk->last()->id }}</small>
            </td>

            <td>
                @foreach($chunk as $job)
                    <div class="mb-2">
                        <a href="{{ $job->source_url }}" target="_blank"
                           rel="noopener noreferrer">
                            ID: {{ $job->id }} - {{ $job->source ?? 'Source' }}
                        </a>
                    </div>
                @endforeach
            </td>

            <td class="title-box">
                {{ $titles }}

                <button type="button"
                    class="btn btn-sm btn-outline-primary mt-2"
                    onclick="copyText(this, @js($titles))">
                    Copy All {{ $chunk->count() }} Titles
                </button>
            </td>

            <td class="prompt-box">
                <textarea class="form-control mb-2" rows="12" readonly>{{ $chunkPrompt }}</textarea>

                <button type="button"
                    class="btn btn-sm btn-primary w-100"
                    onclick="copyText(this, this.parentElement.querySelector('textarea').value)">
                    Copy Prompt
                </button>
            </td>

            <td class="output-box">
                <form action="{{ route('job.date.update') }}" method="POST">
                    @csrf

                    <textarea name="date_json"
                        class="form-control"
                        rows="20"
                        placeholder="Paste 10 Jobs JSON Array Here..."
                        required>{{ old('date_json') }}</textarea>

                    <button type="submit" class="btn btn-success mt-2 w-100">
                        Submit & Update {{ $chunk->count() }} Jobs
                    </button>
                </form>
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="5" class="text-center text-success">
                No pending records found.
            </td>
        </tr>
    @endforelse
</tbody>

                    </table>

                </div>

                {{ $jobs->appends(['limit' => $limit])->links('pagination::bootstrap-5') }}

            </div>
        </div>

    </div>

    <script>
        function copyText(button, text) {

            navigator.clipboard.writeText(text).then(function() {

                let oldText = button.innerText;

                button.innerText = 'Copied!';

                setTimeout(function() {
                    button.innerText = oldText;
                }, 1500);

            }).catch(function() {
                alert('Copy failed. Please copy manually.');
            });
        }
    </script>

</body>

</html>
