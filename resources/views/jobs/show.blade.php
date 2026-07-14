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