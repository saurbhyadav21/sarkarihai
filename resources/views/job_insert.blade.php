{{-- @extends('layouts.app')

@section('content') --}}
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Add New Job / Recruitment</h2>

            <form action="{{ route('job.store') }}" method="POST">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Job Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="desce" class="form-label">Description</label>
                    <textarea name="desce" id="desce" class="form-control" rows="3"></textarea>
                </div>

                <!-- Dates -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="last_fee_date" class="form-label">Last Date For Fee</label>
                        <input type="date" name="last_fee_date" id="last_fee_date" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="correction_date" class="form-label">Correction Last Date</label>
                        <input type="date" name="correction_date" id="correction_date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="exam_date" class="form-label">Exam Date</label>
                        <input type="date" name="exam_date" id="exam_date" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="admit_card" class="form-label">Admit Card Info</label>
                        <input type="text" name="admit_card" id="admit_card" class="form-control">
                    </div>
                </div>

                <!-- Result / Info Date -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="result_date" class="form-label">Result Date</label>
                        <input type="date" name="result_date" id="result_date" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="info_date" class="form-label">Information Date</label>
                        <input type="date" name="info_date" id="info_date" class="form-control">
                    </div>
                </div>

                <!-- Fees -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="genral_fees" class="form-label">General Fees</label>
                        <input type="text" name="genral_fees" id="genral_fees" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="obc_fees" class="form-label">OBC Fees</label>
                        <input type="text" name="obc_fees" id="obc_fees" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="sc_fees" class="form-label">SC Fees</label>
                        <input type="text" name="sc_fees" id="sc_fees" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="st_fees" class="form-label">ST Fees</label>
                        <input type="text" name="st_fees" id="st_fees" class="form-control">
                    </div>
                </div>

                <!-- Age Limits -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="min_age" class="form-label">Minimum Age</label>
                        <input type="text" name="min_age" id="min_age" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="max_age_genral" class="form-label">Max Age (General)</label>
                        <input type="text" name="max_age_genral" id="max_age_genral" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="max_age_obc" class="form-label">Max Age (OBC)</label>
                        <input type="text" name="max_age_obc" id="max_age_obc" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="max_age_sc_st" class="form-label">Max Age (SC/ST)</label>
                        <input type="text" name="max_age_sc_st" id="max_age_sc_st" class="form-control">
                    </div>
                </div>

                <!-- Total Vacancies -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="total_vacancies" class="form-label">Total Vacancies</label>
                        <input type="text" name="total_vacancies" id="total_vacancies" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="min_salary" class="form-label">Min Salary</label>
                        <input type="text" name="min_salary" id="min_salary" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="max_salary" class="form-label">Max Salary</label>
                        <input type="text" name="max_salary" id="max_salary" class="form-control">
                    </div>
                </div>

                <!-- Mode Selection / Posts -->
                <div class="mb-3">
                    <label for="mode_selection" class="form-label">Mode of Selection (comma separated)</label>
                    <input type="text" name="mode_selection" id="mode_selection" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="post_name" class="form-label">Post Names (comma separated)</label>
                    <textarea name="post_name" id="post_name" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="post_eligibility" class="form-label">Post Eligibility (comma separated)</label>
                    <textarea name="post_eligibility" id="post_eligibility" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="post_salary" class="form-label">Post Salary (comma separated)</label>
                    <textarea name="post_salary" id="post_salary" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="instruction" class="form-label">Instructions (# separated)</label>
                    <textarea name="instruction" id="instruction" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Links (comma separated)</label>
                    <textarea name="link" id="link" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="doc" class="form-label">Documents (title-detail, comma separated)</label>
                    <textarea name="doc" id="doc" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>

            </form>
        </div>
    </div>
</div>
{{-- @endsection --}}