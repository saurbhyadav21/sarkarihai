@extends('layouts.front')

@section('content')

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

                    <a href="#jobs"
                       class="btn btn-primary btn-lg px-4">

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

                        <input
                            type="text"
                            id="keyword"
                            class="form-control"
                            placeholder="Search jobs, organization, category..."
                            value="{{ request('search') }}"
                        >

                    </div>

                </div>

                <div class="col-lg-2">

                    <button
                        type="button"
                        id="applyFilter"
                        class="btn btn-primary w-100">

                        <i class="fa-solid fa-filter me-1"></i>

                        Search

                    </button>

                </div>

                <div class="col-lg-2">

                    <button
                        type="button"
                        id="clearFilter"
                        class="btn btn-outline-secondary w-100">

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

                <a href="?category=Railway"
                   class="btn btn-light border">

                    Railway Jobs

                </a>

                <a href="?category=SSC"
                   class="btn btn-light border">

                    SSC Jobs

                </a>

                <a href="?category=Banking"
                   class="btn btn-light border">

                    Banking Jobs

                </a>

                <a href="?category=UPSC"
                   class="btn btn-light border">

                    UPSC Jobs

                </a>

                <a href="?category=Defence"
                   class="btn btn-light border">

                    Defence Jobs

                </a>

                <a href="?category=Police"
                   class="btn btn-light border">

                    Police Jobs

                </a>

                <a href="?category=Teaching"
                   class="btn btn-light border">

                    Teaching Jobs

                </a>

                <a href="?category=Medical"
                   class="btn btn-light border">

                    Medical Jobs

                </a>

                <a href="?category=Engineering"
                   class="btn btn-light border">

                    Engineering Jobs

                </a>

                <a href="?category=Apprentice"
                   class="btn btn-light border">

                    Apprentice Jobs

                </a>

            </div>

        </div>

    </div>

    {{-- ================= Jobs Wrapper Start ================= --}}

    <div class="row" id="jobs">

        {{-- Continue Blade Part 1C --}}
                                <option value="">All States</option>

                        @foreach($states as $stateItem)

                            <option value="{{ $stateItem }}"
                                {{ request('state') == $stateItem ? 'selected' : '' }}>

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

                    <select
                        id="category"
                        class="form-select">

                        <option value="">All Categories</option>

                        @foreach($categories as $categoryItem)

                            <option value="{{ $categoryItem }}"
                                {{ request('category') == $categoryItem ? 'selected' : '' }}>

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

                    <select
                        id="sub_category"
                        class="form-select">

                        <option value="">

                            All Sub Categories

                        </option>

                        @foreach($subCategories as $subCategory)

                            <option value="{{ $subCategory }}"
                                {{ request('sub_category') == $subCategory ? 'selected' : '' }}>

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

                    <select
                        id="qualification"
                        class="form-select">

                        <option value="">

                            All Qualification

                        </option>

                        @foreach($qualifications as $qualification)

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

                    <select
                        id="sortBy"
                        class="form-select w-auto d-inline-block">

                        <option value="latest"
                            {{ request('sort')=='latest' ? 'selected' : '' }}>

                            Latest First

                        </option>

                        <option value="oldest"
                            {{ request('sort')=='oldest' ? 'selected' : '' }}>

                            Oldest First

                        </option>

                        <option value="title"
                            {{ request('sort')=='title' ? 'selected' : '' }}>

                            Job Title

                        </option>

                        <option value="organization"
                            {{ request('sort')=='organization' ? 'selected' : '' }}>

                            Organization

                        </option>

                        <option value="last_date"
                            {{ request('sort')=='last_date' ? 'selected' : '' }}>

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

@endsection

{{-- Continue Blade Part 2A --}}