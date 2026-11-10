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
    $chunks =$jobs->getCollection()->chunk(25);

    foreach ($chunks as$chunk) {
        // जॉब्स की आईडी और टाइटल्स की लिस्ट तैयार करना ताकि AI उन्हें सर्च कर सके
        $jobDataList = $chunk->map(function ($job) {
            return "ID: {$job->id}, Title: {$job->title}";
        })->implode("\n");

        $prompt = <<<PROMPT
You are an expert recruitment data extractor and deep research analyst.

TASK:
For each Job ID and Title provided below, conduct a deep web search to locate the official recruitment notification and exact date details for 2026/2027. Do NOT leave fields as N/A unless the date truly does not exist in the official notification.

Return strictly valid JSON as an array of objects.

Each object must contain these 12 fields:
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
    "info_date": "[Info Date details or N/A with reason]",
    "important_date": "[Key Highlighted Date or N/A with reason]"
}

INSTRUCTIONS & RULES:
1. MANDATORY RESEARCH: You MUST search the web/online job portals for each job title and ID to extract accurate date information.
2. DO NOT DEFAULT TO N/A: Only use N/A if a specific field (like Walk-in date or Correction date) is genuinely not applicable for that job type (e.g., Online-only jobs don't have Walk-in dates).
3. ACCURACY: Preserve exact dates in "DD Month YYYY" format with short Hindi context (e.g., "15 November 2026 (आवेदन की अंतिम तिथि)").
4. Copy exact ID. Never change IDs.
5. Return exactly one object per supplied job, in the same order. Do not skip any job.
6. Return valid JSON array only. No markdown formatting (no ```json ... ``` tags), no commentary.

JOB DATA:
{$jobDataList}
PROMPT;

        // यहाँ आप अपने AI API को कॉल कर सकते हैं:
        // $response = AiService::generate($prompt);
    }
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
