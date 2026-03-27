<form action="{{ route('job.admitStoreJson') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="job_id" value="{{ $id }}">

    @php
        // ✅ JSON prefill
        $jsonData = $admit
            ? json_encode(
                [
                    'job_title' => $admit->job_title,
                    'full_title' => $admit->full_title,
                    'result_card_release_date' => $admit->result_card_release_date,
                    'exam_dates' => $admit->exam_dates,
                    'how_to_download_admit_card' => $admit->how_to_download_admit_card,
                    'official_link' => $admit->official_link,
                    'category' => $admit->category,
                    'advertisement_no' => $admit->advertisement_no,
                    'total_vacancies' => $admit->total_vacancies,
                    'post_name' => $admit->post_name,
                    'exam_list' => $admit->exam_list,
                    'min_salary' => $admit->min_salary,
                    'max_salary' => $admit->max_salary,
                    'min_qualification' => $admit->min_qualification,
                    'min_age' => $admit->min_age,
                    'max_age' => $admit->max_age,
                    'admit_card_release_date' => $admit->admit_card_release_date,
                ],
                JSON_PRETTY_PRINT,
            )
            : '';

        // ✅ Links split
        $links = [];
        if ($admit && $admit->official_link) {
            $items = explode('#', $admit->official_link);
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
        <textarea name="admit_json" rows="10" style="width:100%;">{{ $jsonData }}</textarea>
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

        @if ($admit && $admit->logo)
            <br><br>
            <img src="{{ asset('public/job-images/' . $admit->logo) }}" width="120">
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
        {{ $admit ? 'Update Job' : 'Submit Job' }}
    </button>
</form>
