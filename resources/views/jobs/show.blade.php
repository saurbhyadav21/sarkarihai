@extends('layouts.front')

@section('content')
<style>
    /* ===========================================================
   SARKARIHAI - JOB LISTING PAGE
   =========================================================== */

body{
    background:#f5f7fb;
}

/* ==========================
   Cards
========================== */

.card{
    border:none;
    border-radius:16px;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    font-weight:600;
}

/* ==========================
   Hero
========================== */

.hero-section{
    background:#fff;
    border-radius:18px;
    padding:40px;
}

.hero-section h1{
    font-size:34px;
    font-weight:700;
}

.hero-section p{
    color:#666;
    line-height:1.7;
}

/* ==========================
   Statistics
========================== */

.stat-card{
    transition:.25s;
    overflow:hidden;
}

.stat-card:hover{

    transform:translateY(-5px);

    box-shadow:0 15px 35px rgba(0,0,0,.12);

}

.icon-box{

    width:60px;

    height:60px;

    border-radius:12px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:#fff;

    font-size:22px;

}

.bg-primary{

    background:#0d6efd!important;

}

.bg-success{

    background:#198754!important;

}

.bg-danger{

    background:#dc3545!important;

}

.bg-warning{

    background:#ffc107!important;

}

/* ==========================
   Filters
========================== */

label{

    font-weight:600;

    margin-bottom:8px;

}

.form-control,
.form-select{

    border-radius:10px;

    min-height:46px;

    box-shadow:none!important;

}

.form-control:focus,
.form-select:focus{

    border-color:#0d6efd;

    box-shadow:0 0 0 .15rem rgba(13,110,253,.15)!important;

}

/* ==========================
   Sidebar
========================== */

.sticky-top{

    top:20px;

}

.badge{

    font-weight:500;

    padding:7px 12px;

    border-radius:30px;

}

/* Continue CSS Part 2 */
/* ==========================
   Job Card
========================== */

.job-card{

    transition:.25s;

    border-left:4px solid transparent;

}

.job-card:hover{

    transform:translateY(-4px);

    border-left-color:#0d6efd;

    box-shadow:0 15px 35px rgba(0,0,0,.12);

}

.job-card h3{

    font-size:20px;

    font-weight:700;

    line-height:1.5;

}

.job-card h3 a{

    color:#222;

    transition:.2s;

}

.job-card h3 a:hover{

    color:#0d6efd;

}

.job-card table td{

    padding:4px 0;

    font-size:14px;

    border:none;

    vertical-align:top;

}

.job-card strong{

    color:#555;

    font-weight:600;

}

.job-card .btn{

    border-radius:10px;

    padding:10px 15px;

    font-weight:600;

}

/* ==========================
   Buttons
========================== */

.btn{

    border-radius:10px;

    font-weight:600;

    transition:.25s;

}

.btn-primary:hover{

    transform:translateY(-2px);

}

.btn-success:hover{

    transform:translateY(-2px);

}

.btn-outline-primary:hover{

    transform:translateY(-2px);

}

/* ==========================
   Pagination
========================== */

.pagination{

    margin-bottom:0;

}

.pagination .page-link{

    border-radius:8px;

    margin:0 3px;

    border:1px solid #dee2e6;

    color:#0d6efd;

    min-width:42px;

    text-align:center;

}

.pagination .page-item.active .page-link{

    background:#0d6efd;

    border-color:#0d6efd;

    color:#fff;

}

.pagination .page-link:hover{

    background:#0d6efd;

    color:#fff;

}

/* ==========================
   Empty State
========================== */

.empty-state{

    padding:80px 20px;

    text-align:center;

}

.empty-state i{

    font-size:70px;

    color:#adb5bd;

}

.empty-state h2{

    margin-top:20px;

    font-weight:700;

}

.empty-state p{

    color:#6c757d;

    max-width:650px;

    margin:15px auto;

}

/* Continue CSS Part 3 */
/* ==========================
   SEO Section
========================== */

section{

    margin-bottom:30px;

}

section h2,
section h3{

    font-weight:700;

    color:#212529;

}

section p{

    color:#555;

    line-height:1.9;

    font-size:15px;

}

section a{

    color:#0d6efd;

    transition:.2s;

}

section a:hover{

    color:#084298;

    text-decoration:underline;

}

/* ==========================
   FAQ
========================== */

.accordion-item{

    border:1px solid #ececec;

    border-radius:10px!important;

    overflow:hidden;

    margin-bottom:12px;

}

.accordion-button{

    font-weight:600;

    background:#fff;

    box-shadow:none!important;

}

.accordion-button:not(.collapsed){

    background:#eef5ff;

    color:#0d6efd;

}

.accordion-body{

    color:#555;

    line-height:1.8;

}

/* ==========================
   Breadcrumb
========================== */

.breadcrumb{

    margin-bottom:20px;

}

.breadcrumb-item a{

    color:#0d6efd;

    text-decoration:none;

}

.breadcrumb-item.active{

    color:#6c757d;

}

/* ==========================
   Table
========================== */

.table td{

    border:none;

    padding:6px 0;

    vertical-align:top;

}

.table tr{

    border-bottom:1px dashed #eee;

}

.table tr:last-child{

    border-bottom:none;

}

/* ==========================
   Scrollbar
========================== */

::-webkit-scrollbar{

    width:8px;

}

::-webkit-scrollbar-thumb{

    background:#c5c5c5;

    border-radius:20px;

}

::-webkit-scrollbar-thumb:hover{

    background:#999;

}

/* ==========================
   Utilities
========================== */

.shadow-hover:hover{

    box-shadow:0 15px 35px rgba(0,0,0,.12)!important;

}

.rounded-4{

    border-radius:16px!important;

}

.text-small{

    font-size:14px;

}

.fw-600{

    font-weight:600;

}

/* ==========================
   Responsive
========================== */

@media(max-width:991px){

    .hero-section{

        padding:25px;

    }

    .hero-section h1{

        font-size:28px;

    }

    .sticky-top{

        position:relative!important;

        top:auto;

    }

    .job-card .btn{

        margin-top:10px;

    }

}

@media(max-width:767px){

    .hero-section{

        text-align:center;

    }

    .hero-section h1{

        font-size:24px;

    }

    .stat-card{

        margin-bottom:15px;

    }

    .pagination{

        justify-content:center;

    }

    .table td{

        display:block;

        width:100%;

    }

    .job-card h3{

        font-size:18px;

    }

}
</style>
    <div class="container-xxl py-4">

        {{-- ================= Breadcrumb ================= --}}

        <nav aria-label="breadcrumb" class="mb-3">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Sarkari Naukri
                </li>

            </ol>

        </nav>

        {{-- ================= Hero ================= --}}

        <div class="card shadow-sm border-0 rounded-4 mb-4">

            <div class="card-body p-4 p-lg-5">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <span class="badge bg-primary mb-3">

                            <i class="fa-solid fa-briefcase me-1"></i>

                            Government Jobs 2026

                        </span>

                        <h1 class="fw-bold mb-3">

                            Latest Sarkari Naukri 2026

                        </h1>

                        <p class="text-muted mb-0">

                            Browse the latest Government Jobs, Railway, SSC,
                            Banking, UPSC, Defence, Police, Teaching,
                            PSU and State Government Recruitment.

                        </p>

                    </div>

                    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                        <a href="#jobs" class="btn btn-primary btn-lg px-4">

                            Browse Jobs

                        </a>

                    </div>

                </div>

            </div>

        </div>

        {{-- ================= Statistics ================= --}}

        <div class="row g-4 mb-4">

            <div class="col-lg-3 col-md-6">

                <div class="card stat-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Total Jobs

                                </small>

                                <h3 class="mt-2">

                                    {{ number_format($totalJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-primary">

                                <i class="fa-solid fa-briefcase"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card stat-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Today Added

                                </small>

                                <h3 class="mt-2">

                                    {{ number_format($todayJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-success">

                                <i class="fa-solid fa-plus"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card stat-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Active Jobs

                                </small>

                                <h3 class="mt-2">

                                    {{ number_format($activeJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-warning">

                                <i class="fa-solid fa-fire"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card stat-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Closing Soon

                                </small>

                                <h3 class="mt-2">

                                    {{ number_format($closingSoonJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-danger">

                                <i class="fa-solid fa-clock"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Continue Blade Part 1B --}}
        {{-- ================= Search Section ================= --}}

        <div class="card shadow-sm border-0 rounded-4 mb-4">

            <div class="card-body">

                <div class="row g-3 align-items-center">

                    <div class="col-lg-8">

                        <div class="input-group">

                            <span class="input-group-text bg-white">

                                <i class="fa-solid fa-magnifying-glass"></i>

                            </span>

                            <input type="text" id="keyword" class="form-control"
                                placeholder="Search jobs, organization, category..." value="{{ request('search') }}">

                        </div>

                    </div>

                    <div class="col-lg-2">

                        <button type="button" id="applyFilter" class="btn btn-primary w-100">

                            <i class="fa-solid fa-filter me-1"></i>

                            Search

                        </button>

                    </div>

                    <div class="col-lg-2">

                        <button type="button" id="clearFilter" class="btn btn-outline-secondary w-100">

                            Reset

                        </button>

                    </div>

                </div>

            </div>

        </div>

        {{-- ================= Quick Categories ================= --}}

        <div class="card shadow-sm border-0 rounded-4 mb-4">

            <div class="card-header">

                <strong>

                    Popular Categories

                </strong>

            </div>

            <div class="card-body">

                <div class="d-flex flex-wrap gap-2">

                    <a href="?category=Railway" class="btn btn-light border">

                        Railway Jobs

                    </a>

                    <a href="?category=SSC" class="btn btn-light border">

                        SSC Jobs

                    </a>

                    <a href="?category=Banking" class="btn btn-light border">

                        Banking Jobs

                    </a>

                    <a href="?category=UPSC" class="btn btn-light border">

                        UPSC Jobs

                    </a>

                    <a href="?category=Defence" class="btn btn-light border">

                        Defence Jobs

                    </a>

                    <a href="?category=Police" class="btn btn-light border">

                        Police Jobs

                    </a>

                    <a href="?category=Teaching" class="btn btn-light border">

                        Teaching Jobs

                    </a>

                    <a href="?category=Medical" class="btn btn-light border">

                        Medical Jobs

                    </a>

                    <a href="?category=Engineering" class="btn btn-light border">

                        Engineering Jobs

                    </a>

                    <a href="?category=Apprentice" class="btn btn-light border">

                        Apprentice Jobs

                    </a>

                </div>

            </div>

        </div>

        {{-- ================= Jobs Wrapper Start ================= --}}

        <div class="row" id="jobs">

            {{-- Continue Blade Part 1C --}}
            <option value="">All States</option>

            @foreach ($states as $stateItem)
                <option value="{{ $stateItem }}" {{ request('state') == $stateItem ? 'selected' : '' }}>

                    {{ $stateItem }}

                </option>
            @endforeach

            </select>

        </div>

        {{-- Category --}}

        <div class="col-lg-3 col-md-6">

            <label class="form-label fw-semibold">

                Category

            </label>

            <select id="category" class="form-select">

                <option value="">All Categories</option>

                @foreach ($categories as $categoryItem)
                    <option value="{{ $categoryItem }}" {{ request('category') == $categoryItem ? 'selected' : '' }}>

                        {{ $categoryItem }}

                    </option>
                @endforeach

            </select>

        </div>

        {{-- Sub Category --}}

        <div class="col-lg-3 col-md-6">

            <label class="form-label fw-semibold">

                Sub Category

            </label>

            <select id="sub_category" class="form-select">

                <option value="">

                    All Sub Categories

                </option>

                @foreach ($subCategories as $subCategory)
                    <option value="{{ $subCategory }}" {{ request('sub_category') == $subCategory ? 'selected' : '' }}>

                        {{ $subCategory }}

                    </option>
                @endforeach

            </select>

        </div>

        {{-- Qualification --}}

        <div class="col-lg-3 col-md-6">

            <label class="form-label fw-semibold">

                Qualification

            </label>

            <select id="qualification" class="form-select">

                <option value="">

                    All Qualification

                </option>

                @foreach ($qualifications as $qualification)
                    <option value="{{ $qualification }}"
                        {{ request('qualification') == $qualification ? 'selected' : '' }}>

                        {{ $qualification }}

                    </option>
                @endforeach

            </select>

        </div>

    </div>

    </div>

    </div>

    {{-- Continue Blade Part 1D --}}
    {{-- ================= Sort + Result Bar ================= --}}

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <div class="row align-items-center g-3">

                <div class="col-lg-6">

                    <h5 class="mb-1 fw-bold">

                        <span id="jobCount">

                            {{ number_format($jobs->total()) }}

                        </span>

                        Government Jobs Found

                    </h5>

                    <small class="text-muted">

                        Latest Sarkari Naukri, Online Forms &
                        Government Recruitment.

                    </small>

                </div>

                <div class="col-lg-6 text-lg-end">

                    <select id="sortBy" class="form-select w-auto d-inline-block">

                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>

                            Latest First

                        </option>

                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>

                            Oldest First

                        </option>

                        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>

                            Job Title

                        </option>

                        <option value="organization" {{ request('sort') == 'organization' ? 'selected' : '' }}>

                            Organization

                        </option>

                        <option value="last_date" {{ request('sort') == 'last_date' ? 'selected' : '' }}>

                            Last Date

                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>

    {{-- ================= Main Content ================= --}}

    <div class="row">

        {{-- Left Sidebar Start --}}

        <div class="col-lg-3 mb-4">

            <div class="card border-0 shadow-sm rounded-4 sticky-top">

                <div class="card-header bg-white">

                    <h5 class="mb-0">

                        <i class="fa-solid fa-filter me-2"></i>

                        Filters

                    </h5>

                </div>

                <div class="card-body">

                    {{-- Sidebar filters will come in Part 2A --}}

                </div>

            </div>

        </div>

        {{-- Right Content Start --}}

        <div class="col-lg-9">

            <div id="jobs">

                {{-- Job Listing will come in Part 3A --}}

            </div>

        </div>

    </div>

    </div>



{{-- Continue Blade Part 2A --}}
{{-- ================= Sidebar Filters ================= --}}

<form id="filterForm">

    {{-- Search --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Search Job

        </label>

        <input type="text" id="keyword" class="form-control" placeholder="Job Title, Organization..."
            value="{{ request('search') }}">

    </div>

    {{-- State --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            State

        </label>

        <select id="state" class="form-select">

            <option value="">

                All States

            </option>

            @foreach ($states as $stateItem)
                <option value="{{ $stateItem }}" {{ request('state') == $stateItem ? 'selected' : '' }}>

                    {{ $stateItem }}

                </option>
            @endforeach

        </select>

    </div>

    {{-- Category --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Category

        </label>

        <select id="category" class="form-select">

            <option value="">

                All Categories

            </option>

            @foreach ($categories as $categoryItem)
                <option value="{{ $categoryItem }}" {{ request('category') == $categoryItem ? 'selected' : '' }}>

                    {{ $categoryItem }}

                </option>
            @endforeach

        </select>

    </div>

    {{-- Sub Category --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Sub Category

        </label>

        <select id="sub_category" class="form-select">

            <option value="">

                All Sub Categories

            </option>

            @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory }}" {{ request('sub_category') == $subCategory ? 'selected' : '' }}>

                    {{ $subCategory }}

                </option>
            @endforeach

        </select>

    </div>

    {{-- Qualification --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Qualification

        </label>

        <select id="qualification" class="form-select">

            <option value="">

                All Qualifications

            </option>

            @foreach ($qualifications as $qualification)
                <option value="{{ $qualification }}"
                    {{ request('qualification') == $qualification ? 'selected' : '' }}>

                    {{ $qualification }}

                </option>
            @endforeach

        </select>

    </div>

    {{-- Continue Blade Part 2B --}}
    {{-- Job Type --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Job Type

        </label>

        <select id="job_type" class="form-select">

            <option value="">

                All Job Types

            </option>

            <option value="Permanent" {{ request('job_type') == 'Permanent' ? 'selected' : '' }}>

                Permanent

            </option>

            <option value="Contract" {{ request('job_type') == 'Contract' ? 'selected' : '' }}>

                Contract

            </option>

            <option value="Apprentice" {{ request('job_type') == 'Apprentice' ? 'selected' : '' }}>

                Apprentice

            </option>

            <option value="Internship" {{ request('job_type') == 'Internship' ? 'selected' : '' }}>

                Internship

            </option>

            <option value="Walk-In" {{ request('job_type') == 'Walk-In' ? 'selected' : '' }}>

                Walk-In

            </option>

        </select>

    </div>

    {{-- Sort --}}

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Sort By

        </label>

        <select id="sortBy" class="form-select">

            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>

                Latest First

            </option>

            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>

                Oldest First

            </option>

            <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>

                Job Title

            </option>

            <option value="organization" {{ request('sort') == 'organization' ? 'selected' : '' }}>

                Organization

            </option>

            <option value="last_date" {{ request('sort') == 'last_date' ? 'selected' : '' }}>

                Last Date

            </option>

        </select>

    </div>

    {{-- Buttons --}}

    <div class="d-grid gap-2">

        <button type="button" id="btnSearch" class="btn btn-primary">

            <i class="fa-solid fa-magnifying-glass me-2"></i>

            Apply Filters

        </button>

        <a href="{{ url('/sarkari-naukri') }}" class="btn btn-outline-secondary">

            <i class="fa-solid fa-rotate-right me-2"></i>

            Reset Filters

        </a>

    </div>

</form>

{{-- Popular Categories --}}

<hr class="my-4">

<h6 class="fw-bold mb-3">

    Popular Categories

</h6>

<div class="d-flex flex-wrap gap-2">

    @foreach ($categories->take(10) as $category)
        <a href="{{ url('/sarkari-naukri?category=' . $category) }}"
            class="badge bg-light text-dark text-decoration-none border">

            {{ $category }}

        </a>
    @endforeach

</div>

{{-- Sidebar Complete --}}

{{-- Continue Blade Part 3A --}}
{{-- ================= Job Cards ================= --}}

@if ($jobs->count())

    @foreach ($jobs as $job)
        <div class="card shadow-sm border-0 rounded-4 mb-4 job-card">

            <div class="card-body">

                <div class="row align-items-center">

                    {{-- Left --}}

                    <div class="col-lg-9">

                        <div class="d-flex flex-wrap gap-2 mb-3">

                            @if (!empty($job->category))
                                <span class="badge bg-primary">

                                    {{ $job->category }}

                                </span>
                            @endif

                            @if (!empty($job->job_sub_categories))
                                @foreach (explode('#', $job->job_sub_categories) as $sub)
                                    @if (trim($sub) != '')
                                        <span class="badge bg-info text-dark">

                                            {{ trim($sub) }}

                                        </span>
                                    @endif
                                @endforeach
                            @endif

                        </div>

                        <h3 class="h5 mb-3">

                            <a href="{{ url('/sarkari-naukri/' . $job->state . '/' . $job->category . '/' . $job->slug) }}"
                                class="text-decoration-none text-dark">

                                {{ $job->title }}

                            </a>

                        </h3>

                        <div class="row">

                            <div class="col-md-6">

                                <table class="table table-sm table-borderless mb-0">

                                    <tr>

                                        <td width="130">

                                            <strong>

                                                Organization

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->organization ?: 'N/A' }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                State

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->state ?: 'All India' }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                Qualification

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->min_qulification ?: 'As Per Notification' }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                Vacancy

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->total_vacancies ?: 'Various' }}

                                        </td>

                                    </tr>

                                </table>

                            </div>

                            <div class="col-md-6">

                                <table class="table table-sm table-borderless mb-0">

                                    <tr>

                                        <td width="130">

                                            <strong>

                                                Last Date

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->end_date ?: 'Update Soon' }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                Job Type

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->job_type ?: 'Government Job' }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                Salary

                                            </strong>

                                        </td>

                                        <td>

                                            @if (is_numeric($job->min_salary) && is_numeric($job->max_salary))
                                                ₹{{ number_format((float) $job->min_salary) }} -
                                                ₹{{ number_format((float) $job->max_salary) }}
                                            @elseif(is_numeric($job->min_salary))
                                                ₹{{ number_format((float) $job->min_salary) }}
                                            @elseif(!empty($job->salary_text))
                                                {{ $job->salary_text }}
                                            @else
                                                As Per Rules
                                            @endif

                                        </td>

                                    </tr>

                                    <tr>

                                        <td>

                                            <strong>

                                                Apply Mode

                                            </strong>

                                        </td>

                                        <td>

                                            {{ $job->apply_mode ?: 'Online' }}

                                        </td>

                                    </tr>

                                </table>

                            </div>

                        </div>

                    </div>

                    {{-- Right --}}

                    <div class="col-lg-3 text-center">

                        <a href="{{ url('/sarkari-naukri/' . $job->state . '/' . $job->category . '/' . $job->slug) }}"
                            class="btn btn-primary w-100 mb-2">

                            View Details

                        </a>

                        @if (!empty($job->apply_online_link))
                            <a href="{{ $job->apply_online_link }}" target="_blank" rel="nofollow noopener"
                                class="btn btn-success w-100">

                                Apply Online

                            </a>
                        @endif

                    </div>

                </div>

            </div>

        </div>
    @endforeach

@endif

{{-- Continue Blade Part 3B --}}
{{-- ================= Pagination ================= --}}

@if ($jobs->hasPages())
    <div class="card border-0 shadow-sm rounded-4 mt-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <small class="text-muted">

                        Showing

                        <strong>{{ $jobs->firstItem() }}</strong>

                        to

                        <strong>{{ $jobs->lastItem() }}</strong>

                        of

                        <strong>{{ number_format($jobs->total()) }}</strong>

                        Government Jobs

                    </small>

                </div>

                <div class="col-md-6">

                    <div class="float-md-end">

                        {{ $jobs->withQueryString()->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>
@endif

{{-- ================= Quick Navigation ================= --}}

<div class="card border-0 shadow-sm rounded-4 mt-4">

    <div class="card-body">

        <div class="row">

            <div class="col-lg-4 mb-3 mb-lg-0">

                <a href="{{ url('/latest-jobs') }}" class="btn btn-outline-primary w-100">

                    <i class="fa-solid fa-clock me-2"></i>

                    Latest Jobs

                </a>

            </div>

            <div class="col-lg-4 mb-3 mb-lg-0">

                <a href="{{ url('/admit-card') }}" class="btn btn-outline-success w-100">

                    <i class="fa-solid fa-id-card me-2"></i>

                    Admit Card

                </a>

            </div>

            <div class="col-lg-4">

                <a href="{{ url('/results') }}" class="btn btn-outline-danger w-100">

                    <i class="fa-solid fa-square-poll-vertical me-2"></i>

                    Results

                </a>

            </div>

        </div>

    </div>

</div>

{{-- Continue Blade Part 3C --}}
{{-- ================= Empty State ================= --}}

@if ($jobs->isEmpty())
    <div class="card border-0 shadow rounded-4">

        <div class="card-body text-center py-5">

            <div class="mb-4">

                <i class="fa-solid fa-folder-open fa-5x text-secondary opacity-50"></i>

            </div>

            <h2 class="h3 fw-bold mb-3">

                No Government Jobs Found

            </h2>

            <p class="text-muted mb-4">

                Sorry! We couldn't find any jobs matching your search or
                selected filters.

                <br>

                Try changing the State, Category, Qualification,
                or Search Keyword.

            </p>

            <div class="d-flex justify-content-center flex-wrap gap-2">

                <a href="{{ url('/sarkari-naukri') }}" class="btn btn-primary">

                    <i class="fa-solid fa-rotate-right me-2"></i>

                    Reset Filters

                </a>

                <a href="{{ url('/latest-jobs') }}" class="btn btn-outline-primary">

                    <i class="fa-solid fa-clock me-2"></i>

                    Latest Jobs

                </a>

            </div>

        </div>

    </div>
@endif

{{-- ================= Bottom CTA ================= --}}

<div class="card border-0 bg-primary text-white rounded-4 mt-5">

    <div class="card-body p-5 text-center">

        <h3 class="fw-bold mb-3">

            Never Miss a Government Job Update

        </h3>

        <p class="mb-4">

            Get the latest Sarkari Naukri, Admit Card,
            Results, Answer Key, Admissions and Government
            Recruitment updates in one place.

        </p>

        <a href="{{ url('/') }}" class="btn btn-light btn-lg">

            Explore More

        </a>

    </div>

</div>

</div>{{-- #jobs --}}

{{-- ================= End Main Content ================= --}}

{{-- Continue Blade Part 4A (SEO Content + FAQ + Internal Links) --}}
{{-- ================= SEO Content ================= --}}

<section class="mt-5">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-lg-5">

            <h2 class="fw-bold mb-4">

                Latest Sarkari Naukri 2026

            </h2>

            <p>

                SarkariHai.com provides the latest Government Job
                Notifications across India. Candidates can find
                Central Government Jobs, State Government Jobs,
                Railway Recruitment, Banking Jobs, SSC, UPSC,
                Defence, Police, Teaching, PSU, High Court,
                Universities and many more recruitment updates.

            </p>

            <p>

                Every recruitment page includes important dates,
                eligibility, age limit, application fee,
                selection process, salary details,
                vacancy information, official notification,
                online application link and important instructions.

            </p>

            <p>

                We regularly update new Government Jobs from
                organizations like SSC, UPSC, Railway,
                IBPS, SBI, RBI, AIIMS, ESIC, DRDO,
                ISRO, BHEL, ONGC, BEL, High Courts,
                State PSCs, Universities,
                Indian Army, Navy, Air Force and many
                other departments.

            </p>

        </div>

    </div>

</section>


{{-- ================= Popular Categories ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">

                Popular Government Job Categories

            </h3>

            <div class="d-flex flex-wrap gap-2">

                @foreach ($categories as $category)
                    <a href="{{ url('/sarkari-naukri?category=' . $category) }}"
                        class="badge rounded-pill bg-light text-dark border text-decoration-none px-3 py-2">

                        {{ $category }}

                    </a>
                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- ================= Popular States ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">

                Government Jobs by State

            </h3>

            <div class="row">

                @foreach ($states as $state)
                    <div class="col-lg-3 col-md-4 col-6 mb-2">

                        <a href="{{ url('/sarkari-naukri/' . Str::slug($state)) }}" class="text-decoration-none">

                            {{ $state }}

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- Continue Blade Part 4B --}}
{{-- ================= Popular Qualifications ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">

                Jobs by Qualification

            </h3>

            <div class="d-flex flex-wrap gap-2">

                @foreach ($qualifications as $qualification)
                    <a href="{{ url('/sarkari-naukri?qualification=' . urlencode($qualification)) }}"
                        class="badge bg-light border text-dark text-decoration-none px-3 py-2">

                        {{ $qualification }}

                    </a>
                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- ================= Popular Recruiters ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">

                Top Recruiting Organizations

            </h3>

            <div class="row">

                @php

                    $organizations = DB::table('job_details')
                        ->whereNotNull('organization')
                        ->where('organization', '!=', '')
                        ->select('organization')
                        ->distinct()
                        ->orderBy('organization')
                        ->limit(40)
                        ->pluck('organization');

                @endphp

                @foreach ($organizations as $organization)
                    <div class="col-lg-3 col-md-4 col-6 mb-2">

                        <a href="{{ url('/sarkari-naukri?search=' . urlencode($organization)) }}"
                            class="text-decoration-none">

                            {{ $organization }}

                        </a>

                    </div>
                @endforeach

            </div>

        </div>

    </div>

</section>


{{-- ================= Latest Government Job Categories ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h3 class="fw-bold mb-4">

                Explore Government Jobs

            </h3>

            <div class="row">

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/railway') }}">Railway Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/ssc') }}">SSC Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/banking') }}">Bank Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/upsc') }}">UPSC Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/police') }}">Police Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/teaching') }}">Teaching Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/defence') }}">Defence Jobs</a>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-2">
                    <a href="{{ url('/sarkari-naukri/all-india/psu') }}">PSU Jobs</a>
                </div>

            </div>

        </div>

    </div>

</section>

{{-- Continue Blade Part 4C --}}
{{-- ================= Frequently Asked Questions ================= --}}

<section class="mt-4">

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <h2 class="fw-bold mb-4">

                Frequently Asked Questions (FAQs)

            </h2>

            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                            What is Sarkari Naukri?

                        </button>

                    </h2>

                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Sarkari Naukri means Government Jobs offered by
                            Central Government, State Government,
                            Public Sector Undertakings (PSUs),
                            Universities, Railways,
                            Defence, Banking and other Government Departments.

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                            How often are jobs updated?

                        </button>

                    </h2>

                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            New Government Job Notifications are updated
                            regularly whenever official recruitment
                            notifications are released.

                        </div>

                    </div>

                </div>

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                            Are official notification links available?

                        </button>

                    </h2>

                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Yes. Every recruitment page contains
                            Official Notification PDF,
                            Apply Online Link,
                            Official Website,
                            Eligibility,
                            Selection Process,
                            Salary,
                            Vacancy Details
                            and Important Dates.

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ================= Disclaimer ================= --}}

<section class="mt-4">

    <div class="alert alert-light border rounded-4">

        <h5 class="fw-bold">

            Disclaimer

        </h5>

        <p class="mb-0">

            SarkariHai.com is an informational website.

            Candidates are advised to verify every recruitment
            notification from the official website before
            submitting their application form.

        </p>

    </div>

</section>

@endsection
