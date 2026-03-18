<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <form action="{{ route('job.update', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- 
    @method('PUT') --}}

            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Job</h5>
                    <a href="{{ route('job.edit.list') }}" class="btn btn-warning btn-sm">Edit List</a>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Title</label>
                            <input type="text" name="title" value="{{ $job->title }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" name="start_date" value="{{ $job->start_date }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" name="end_date" value="{{ $job->end_date }}" class="form-control">
                        </div>
                       
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Min Salary</label>
                            <input type="text" name="min_salary" value="{{ $job->min_salary }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Max Salary</label>
                            <input type="text" name="max_salary" value="{{ $job->max_salary }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Min Age</label>
                            <input type="text" name="min_age" value="{{ $job->min_age }}" class="form-control">
                        </div>
                         <div class="col-md-4 mb-3">
                            <label class="form-label">min_qulification</label>
                            {{-- <input type="text" name="post_eligibility" value="{{ $job->post_eligibility }}" class="form-control"> --}}
                            <textarea name="min_qulification" class="form-control" rows="3">{{ $job->min_qulification }}</textarea>
                        </div>
                        <!-- old image -->
                        @if ($job->image)
                            <img src="{{ asset('public/job-images/' . $job->image) }}" width="100" class="mb-2"
                                style="width: 1296px;height: 300px;">
                        @endif

                        <!-- new image -->
                        <input type="file" name="image" class="form-control mb-2">

                         <div class="col-md-3 mb-3">
                            <label class="form-label">Total Vacancies</label>
                            <input type="text" name="total_vacancies" value="{{ $job->total_vacancies }}"
                                class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Exam Date</label>
                            <input type="text" name="exam_date" value="{{ $job->exam_date }}" class="form-control">
                        </div>
                        --------------------------------------------
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="desce" class="form-control" rows="2">{{ $job->desce }}</textarea>
                        </div>

                        
                    </div>

                    <div class="row">
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Last Fee Date</label>
                            <input type="text" name="last_fee_date" value="{{ $job->last_fee_date }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Correction Date</label>
                            <input type="text" name="correction_date" value="{{ $job->correction_date }}"
                                class="form-control">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Admit Card Date</label>
                            <input type="text" name="admit_card" value="{{ $job->admit_card }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Result Date</label>
                            <input type="text" name="result_date" value="{{ $job->result_date }}"
                                class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Info Date</label>
                            <input type="text" name="info_date" value="{{ $job->info_date }}" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Mode of Selection</label>
                            {{-- <input type="text" name="mode_selection" value="{{ $job->mode_selection }}" class="form-control"> --}}
                            <textarea name="mode_selection" class="form-control" rows="3">{{ $job->mode_selection }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">General Fees</label>
                            <input type="text" name="genral_fees" value="{{ $job->genral_fees }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">OBC Fees</label>
                            <input type="text" name="obc_fees" value="{{ $job->obc_fees }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">SC Fees</label>
                            <input type="text" name="sc_fees" value="{{ $job->sc_fees }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">ST Fees</label>
                            <input type="text" name="st_fees" value="{{ $job->st_fees }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Extra_charge</label>
                            <input type="text" name="extra_charge" value="{{ $job->extra_charge }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Max Age General</label>
                            <input type="text" name="max_age_genral" value="{{ $job->max_age_genral }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Max Age OBC</label>
                            <input type="text" name="max_age_obc" value="{{ $job->max_age_obc }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Max Age SC/ST</label>
                            <input type="text" name="max_age_sc_st" value="{{ $job->max_age_sc_st }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Max Age Female</label>
                            <input type="text" name="max_age_female" value="{{ $job->max_age_female }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">relaxation info</label>
                            <input type="text" name="relaxation" value="{{ $job->relaxation }}"
                                class="form-control">
                        </div>

                        
                        <div class="col-md-3 mb-3">
                            <label class="form-label">genral_post</label>
                            <input type="text" name="genral_post" value="{{ $job->genral_post }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">ews_post</label>
                            <input type="text" name="ews_post" value="{{ $job->ews_post }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">obc_post</label>
                            <input type="text" name="obc_post" value="{{ $job->obc_post }}"
                                class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">sc_post</label>
                            <input type="text" name="sc_post" value="{{ $job->sc_post }}" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">st_post</label>
                            <input type="text" name="st_post" value="{{ $job->st_post }}" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Post Name (comma separated)</label>
                            {{-- <input type="text" name="post_name" value="{{ $job->post_name }}" class="form-control"> --}}
                            <textarea name="post_name" class="form-control" rows="3">{{ $job->post_name }}</textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Post Eligibility</label>
                            {{-- <input type="text" name="post_eligibility" value="{{ $job->post_eligibility }}" class="form-control"> --}}
                            <textarea name="post_eligibility" class="form-control" rows="3">{{ $job->post_eligibility }}</textarea>
                        </div>
                       
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Post Salary</label>
                            {{-- <input type="text" name="post_salary" value="{{ $job->post_salary }}" class="form-control"> --}}
                            <textarea name="post_salary" class="form-control" rows="3">{{ $job->post_salary }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Instructions</label>
                        <textarea name="instruction" class="form-control" rows="3">{{ $job->instruction }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link</label>
                            {{-- <input type="text" name="link" value="{{ $job->link }}" class="form-control"> --}}
                            <textarea name="link" class="form-control" rows="3">{{ $job->link }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Document</label>
                            {{-- <input type="text" name="doc" value="{{ $job->doc }}" class="form-control"> --}}
                            <textarea name="doc" class="form-control" rows="3">{{ $job->doc }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Job</button>
                    <a href="{{ route('job.edit.list') }}" class="btn btn-secondary">Back</a>

                </div>
            </div>

        </form>

    </div>

</body>

</html>
