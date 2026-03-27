<form action="{{ route('job.resultStoreJson') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="job_id" value="{{ $id }}">

    @php
        // ✅ JSON prefill
        $jsonData = $result
            ? json_encode(
                [
                    'job_title' => $result->job_title,
                    'full_title' => $result->full_title,
                    'result_card_release_date' => $result->result_card_release_date,
                    'exam_dates' => $result->exam_dates,
                    'how_to_download_result_card' => $result->how_to_download_result_card,
                    'official_link' => $result->official_link,
                    'category' => $result->category,
                    'advertisement_no' => $result->advertisement_no,
                    'total_vacancies' => $result->total_vacancies,
                    'post_name' => $result->post_name,
                    'exam_list' => $result->exam_list,
                    'min_salary' => $result->min_salary,
                    'max_salary' => $result->max_salary,
                    'min_qualification' => $result->min_qualification,
                    'min_age' => $result->min_age,
                    'max_age' => $result->max_age,
                    'admit_card_release_date'=>$result->admit_card_release_date,
                    'logo'=>$result->logo
                ],
                JSON_PRETTY_PRINT,
            )
            : '';

        // ✅ Links split
        $links = [];
        if ($result && $result->official_link) {
            $items = explode('#', $result->official_link);
            foreach ($items as $item) {
                if (!empty($item)) {
                    $parts = explode('$', $item);
                    $links[] = [
                        'title' => $parts[0] ?? '',
                        'url' => $parts[1] ?? '',
                    ];
                }
            }
        }
    @endphp

    <!-- ✅ JSON -->
    <div>
        <label>Paste Job JSON</label><br>
        <textarea name="result_json" rows="10" style="width:100%;">{{ $jsonData }}</textarea>
    </div>

    <br>

    <!-- ✅ 5 Link Rows (Prefill) -->
    @for ($i = 0; $i < 5; $i++)
        <div style="margin-bottom:10px;">
            <input type="text" name="link_title[]" value="{{ $links[$i]['title'] ?? '' }}"
                placeholder="Title {{ $i + 1 }}" style="width:30%;">

            <input type="text" name="link_url[]" value="{{ $links[$i]['url'] ?? '' }}"
                placeholder="URL {{ $i + 1 }}" style="width:60%;">
        </div>
    @endfor

    <br>

    <!-- ✅ Image -->
    <div>
        <label>Upload Image</label><br>
        <input type="file" name="job_image" accept="image/*">

        @if ($result && $result->logo)
            <br><br>
            <img src="{{ asset('public/job-images/' . $result->logo) }}" width="120">
        @endif
    </div>

    <br>
     <div class="mb-3">
        <label class="form-label">Main</label>
        <textarea name="main_p" class="form-control" rows="3">{{ $admit->main_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Date</label>
        <textarea name="date_p" class="form-control" rows="3">{{ $admit->date_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Fee</label>
        <textarea name="fee_p" class="form-control" rows="3">{{ $admit->fee_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Age</label>
        <textarea name="age_p" class="form-control" rows="3">{{ $admit->age_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Vacancy</label>
        <textarea name="vaccancy_p" class="form-control" rows="3">{{ $admit->vaccancy_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <textarea name="category_p" class="form-control" rows="3">{{ $admit->category_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Selection</label>
        <textarea name="selection_p" class="form-control" rows="3">{{ $admit->selection_p }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Post</label>
        <textarea name="post_p" class="form-control" rows="3">{{ $admit->post_p }}</textarea>
    </div>
    <button type="submit">
        {{ $result ? 'Update Job' : 'Submit Job' }}
    </button>
</form>
