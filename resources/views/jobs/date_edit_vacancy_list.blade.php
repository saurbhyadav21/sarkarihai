
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

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
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
You are an expert recruitment data extractor and deep research analyst. Parse the given job notification text carefully and strictly output the response in valid JSON format matching the exact schema below.

### Output JSON Structure (Include all 11 fields and ID):
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

### Strict Rules & Formatting Guidelines:
1. STRICT ACCURACY: Extract information ONLY from the supplied job text. Do not guess or invent dates.
2. MISSING DATES: If not mentioned or not applicable, use "N/A" followed by a short factual reason in Hindi.
3. OUTPUT: Return strictly valid JSON. No markdown or explanation outside JSON.
4. DATE FORMAT: Use DD Month YYYY for dates, with time where available.
5. ID: Copy the exact JOB ID supplied for this job. Never change it.
6. IMPORTANT: Return one JSON object per job, in the same order as the supplied IDs.

Job Text:
[Paste the raw job text here]
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

                            $titles = $chunk->pluck('title')
                                ->map(fn($title) => trim($title ?? ''))
                                ->implode(', ');
                        @endphp

                        <tr class="chunk-heading">
                            <td colspan="5">
                                Chunk {{ $chunkIndex + 1 }}
                                (ID: {{ $chunk->first()->id }} - {{ $chunk->last()->id }})
                                | Total Jobs: {{ $chunk->count() }}
                            </td>
                        </tr>

                        @foreach($chunk as $job)

                            <tr>
                                <td>
                                    <strong>{{ $job->id }}</strong>
                                </td>

                                <td>
                                    <a href="{{ $job->source_url }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        {{ $job->source ?? 'Source' }}
                                    </a>
                                </td>

                                <td class="title-box">

                                    {{ $job->title }}

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-primary copy-btn mt-2"
                                        onclick="copyText(this, @js($titles))">
                                        Copy All 5 Titles
                                    </button>

                                </td>

                                <td class="prompt-box">

                                    <textarea
                                        class="form-control mb-2 prompt-text"
                                        rows="8"
                                        readonly>{{ $prompt }}

JOB IDs: {{ $ids }}

Job Titles:
{{ $titles }}</textarea>

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-primary copy-btn"
                                        onclick="copyText(this, this.parentElement.querySelector('textarea').value)">
                                        Copy Prompt
                                    </button>

                                </td>

                                <td class="output-box">

                                    <textarea
                                        class="form-control"
                                        placeholder="Paste ChatGPT JSON output here..."></textarea>

                                </td>

                            </tr>

                        @endforeach

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

        navigator.clipboard.writeText(text).then(function () {

            let oldText = button.innerText;

            button.innerText = 'Copied!';

            setTimeout(function () {
                button.innerText = oldText;
            }, 1500);

        }).catch(function () {
            alert('Copy failed. Please copy manually.');
        });
    }
</script>

</body>
</html>
