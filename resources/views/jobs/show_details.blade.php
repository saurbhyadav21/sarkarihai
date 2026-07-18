@extends('layouts.front')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #222;
        }

        a {
            text-decoration: none;
        }

        /* HEADER */

        .header {
            background: #ffffff;
            height: 70px;
            box-shadow: 0 2px 12px rgba(11, 79, 108, .08);
        }

        .container {
            width: 1200px;
            margin: auto;
        }

        .nav {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #0B4F6C;
        }

        .menu {
            display: flex;
            gap: 30px;
        }

        .menu a {
            color: #333;
            font-size: 14px;
        }

        .search-btn {
            background: #F59E0B;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
        }

        /* HERO */

        .hero {
            background: linear-gradient(135deg, #062a3a, #0a5467) padding: 55px 0;
            color: #fff;
        }

        .breadcrumb {
            font-size: 13px;
            opacity: .8;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 16px;
            line-height: 28px;
            opacity: .9;
            max-width: 900px;
        }

        /* SEARCH BOX */

        .hero-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 30px;
        }

        .search-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow:
                0 10px 30px rgba(0, 0, 0, .08);
        }

        .search-card h3 {
            color: #222;
            margin-bottom: 15px;
        }

        .search-card input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        /* STICKY APPLY */

        .sticky-apply {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 999;
        }

        .sticky-apply a {
            background: #F59E0B;
            color: #fff;
            padding: 16px 28px;
            border-radius: 50px;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .2);
            display: inline-block;
        }


        /* SHARE */

        .share-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .share-btn {
            background: #0B4F6C;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            display: inline-block;
        }


        /* AUTHOR */

        .author-box {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .author-image {
            width: 70px;
            height: 70px;
            background: #F59E0B;
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .author-content h3 {
            margin-bottom: 10px;
            color: #0B4F6C;
        }


        /* FOOTER */

        .site-footer {
            background: #0B4F6C;
            color: #fff;
            margin-top: 60px;
            padding: 60px 0 20px;
        }

        .footer-grid {
            width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 50px;
        }

        .site-footer h3 {
            margin-bottom: 20px;
            color: #F59E0B;
        }

        .site-footer ul {
            list-style: none;
            padding: 0;
        }

        .site-footer li {
            margin-bottom: 12px;
        }

        .site-footer a {
            color: #fff;
        }

        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, .1);
        }


        /* MOBILE */

        @media(max-width:992px) {

            .main-wrapper {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .footer-grid {
                width: 95%;
                grid-template-columns: 1fr;
            }

            .related-jobs {
                grid-template-columns: 1fr;
            }

            .highlight-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .author-box {
                flex-direction: column;
                text-align: center;
            }

        }

        @media(max-width:576px) {

            .highlight-grid {
                grid-template-columns: 1fr;
            }

            .info-table td {
                display: block;
                width: 100%;
            }

            .share-buttons {
                flex-direction: column;
            }

            .sticky-apply {
                left: 10px;
                right: 10px;
                bottom: 10px;
            }

            .sticky-apply a {
                display: block;
                text-align: center;
            }

        }

        .search-card button {
            width: 100%;
            padding: 14px;
            background: #f59e0b;
            border: none;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        /* SUMMARY */

        .summary {
            margin-top: -40px;
            margin-bottom: 30px;
        }

        /* .summary-card{
                                                                                                                                                background:#fff;
                                                                                                                                                border-radius:15px;
                                                                                                                                                box-shadow:
                                                                                                                                                0 10px 30px rgba(0,0,0,.08);
                                                                                                                                                padding:30px;
                                                                                                                                                border-top:4px solid #F59E0B;
                                                                                                                                                display:grid;
                                                                                                                                                }

                                                                                                                                                .summary-item{
                                                                                                                                                text-align:center;
                                                                                                                                                } */
        .summary-card {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            border: 1px solid #ffffff21;
        }

        .summary-item {
            text-align: center;
        }

        .summary-item small {
            display: block;
            color: #fff;
            font-size: 12px;
        }

        .summary-item strong {
            color: #f4b400;
            font-weight: 800;
            font-size: 1.75rem;
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #0B4F6C;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 26px;
            font-weight: 700;
            color: #0F766E;
            margin-bottom: 20px;
        }

        .apply-btn {
            background: #F59E0B;
            color: #fff;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 700;
            display: inline-block;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline:before {
            content: '';
            position: absolute;
            left: 8px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #0F766E;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: -30px;
            top: 5px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #F59E0B;
        }

        .timeline-date {
            font-weight: 700;
            color: #0B4F6C;
            margin-bottom: 8px;
        }

        .timeline-content {
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
        }

        .faq-box {
            border: 1px solid #eee;
            padding: 18px;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .faq-box summary {
            cursor: pointer;
            font-weight: 600;
            color: #0B4F6C;
        }

        .faq-box p {
            margin-top: 15px;
            line-height: 28px;
        }

        .related-jobs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .job-box {
            background: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            border-top: 4px solid #F59E0B;
        }

        .job-box h3 {
            color: #0B4F6C;
            margin-bottom: 10px;
        }

        .job-box a {
            display: inline-block;
            margin-top: 15px;
            background: #0B4F6C;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
        }

        .breadcrumb {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 15px;
            color: #fff;
            line-height: 1.7;
        }

        .breadcrumb a {
            color: #fff;
            text-decoration: none;
            transition: all .2s ease;
        }

        .breadcrumb a:hover {
            color: #F59E0B;
            text-decoration: underline;
        }

        .breadcrumb span[aria-current="page"] {
            color: #F59E0B;
            font-weight: 600;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
        }

        .breadcrumb {
            font-size: 16px;
            font-weight: 500;
        }

        .breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb .current {
            color: #fff;
            font-weight: 700;
        }

        .breadcrumb .sep {
            margin: 0 8px;
            color: #fff;
        }
    </style>
    <style>
        .ticker-heading {
            display: inline-block;
            margin-top: 25px;
            padding: 8px 15px;
            background: #f4b400;
            color: #000;
            font-size: 15px;
            font-weight: 700;
            border-radius: 6px;
        }

        @media(max-width:991px) {

            .hero {
                padding: 35px 0;
            }

            .hero h1 {
                font-size: 34px;
                text-align: center;
            }

            .hero p {
                text-align: center;
                font-size: 16px;
            }

            .stats {
                margin-bottom: 15px;
            }

            .search-card {
                margin-top: 25px;
            }

        }

        @media(max-width:767px) {

            .hero {
                padding: 25px 0;
            }

            .hero h1 {
                font-size: 28px;
                line-height: 1.3;
            }

            .hero p {
                font-size: 15px;
                line-height: 1.7;
            }

            .stats h3 {
                font-size: 22px;
            }

            .stats small {
                font-size: 13px;
            }

            .search-card {
                padding: 18px;
            }

            .search-card h5 {
                font-size: 18px;
            }

            #jobSearch {
                font-size: 15px;
            }

        }

        @media(max-width:767px) {

            .search-dropdown {

                left: 0;

                right: 0;

                border-radius: 15px;

                max-height: 350px;

            }

            .search-item {

                padding: 15px;

            }

            .search-title {

                font-size: 14px;

            }

            .search-meta {

                font-size: 12px;

            }

        }

        .latest-ticker marquee {

            font-size: 13px;

        }

        .search-card {

            border-radius: 18px;

        }

        @media(max-width:767px) {

            .search-card {

                margin-top: 20px;

            }

        }
    </style>
    <style>
        .ticker-heading {
            display: inline-block;
            margin-top: 25px;
            padding: 8px 15px;
            background: #f4b400;
            color: #000;
            font-size: 15px;
            font-weight: 700;
            border-radius: 6px;
        }

        @media(max-width:991px) {

            .hero {
                padding: 35px 0;
            }

            .hero h1 {
                font-size: 34px;
                text-align: center;
            }

            .hero p {
                text-align: center;
                font-size: 16px;
            }

            .stats {
                margin-bottom: 15px;
            }

            .search-card {
                margin-top: 25px;
            }

        }

        @media(max-width:767px) {

            .hero {
                padding: 25px 0;
            }

            .hero h1 {
                font-size: 28px;
                line-height: 1.3;
            }

            .hero p {
                font-size: 15px;
                line-height: 1.7;
            }

            .stats h3 {
                font-size: 22px;
            }

            .stats small {
                font-size: 13px;
            }

            .search-card {
                padding: 18px;
            }

            .search-card h5 {
                font-size: 18px;
            }

            #jobSearch {
                font-size: 15px;
            }

        }

        @media(max-width:767px) {

            .search-dropdown {

                left: 0;

                right: 0;

                border-radius: 15px;

                max-height: 350px;

            }

            .search-item {

                padding: 15px;

            }

            .search-title {

                font-size: 14px;

            }

            .search-meta {

                font-size: 12px;

            }

        }

        .latest-ticker marquee {

            font-size: 13px;

        }

        .search-card {

            border-radius: 18px;

        }

        @media(max-width:767px) {

            .search-card {

                margin-top: 20px;

            }

        }
    </style>
    <style>
        /* DROPDOWN BOX */
        .search-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 12px;
            z-index: 99999;
            box-shadow:
                0 10px 30px rgba(0, 0, 0, .10),
                0 1px 3px rgba(0, 0, 0, .08);
            border: 1px solid #e8edf5;
            max-height: 600px;
            overflow-y: auto;
        }

        /* ITEM */
        .search-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 24px;
            text-decoration: none;
            color: #111827;
            border-bottom: 1px solid #edf2f7;
            transition: all .2s ease;
        }

        .search-item:hover {
            background: #f8fbff;
            text-decoration: none;
            color: #111827;
        }

        /* LEFT ICON */
        .search-icon {

            border-radius: 50%;
            background: #eef4ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-top: 0px;
        }

        /* CONTENT */
        .search-body {
            flex: 1;
        }

        .search-title {
            font-size: 11px;
            font-weight: 700;
            line-height: 1.4;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .search-meta {
            display: flex;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .search-category {
            color: #2563eb;
            font-size: 13px;
            font-weight: 500;
        }

        .search-separator {
            color: #9ca3af;
        }

        .search-type {
            color: #4b5563;
            font-size: 13px;
        }

        /* RIGHT ARROW */
        .search-arrow {
            font-size: 13px;
            color: #94a3b8;
            transition: .2s;
        }

        .search-item:hover .search-arrow {
            color: #2563eb;
            transform: translateX(5px);
        }

        /* FOOTER */
        .search-footer {
            background: #f3f7fd;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 22px 28px;
        }

        .search-footer-icon {
            width: 60px;
            height: 60px;
            background: #2563eb;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .search-footer-text {
            flex: 1;
            font-size: 22px;
            color: #0f172a;
        }

        .search-footer-text strong {
            color: #2563eb;
        }

        .search-footer-btn {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 15px 28px;
            border-radius: 14px;
            font-size: 18px;
            font-weight: 600;
            transition: .2s;
        }

        .search-footer-btn:hover {
            background: #1d4ed8;
        }

        /* SCROLLBAR */
        .search-dropdown::-webkit-scrollbar {
            width: 8px;
        }

        .search-dropdown::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .search-dropdown::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        .highlight-grid {
            display: flex;
            gap: 10px;
        }
    </style>
    <section class="hero">

        <div class="container">

            <div class="hero-flex">

                <div>

                    <nav aria-label="breadcrumb" class="breadcrumb">

                        <a href="{{ url('/') }}">
                            Home
                        </a>

                        <span class="sep">/</span>

                        <a href="{{ route('sarkari.naukri') }}">
                            Sarkari Naukri
                        </a>

                        @if ($state)
                            <span class="sep">/</span>
                            <a href="{{ route('sarkari.naukri.state', $state) }}">
                                {{ ucwords(str_replace('-', ' ', $state)) }}
                            </a>
                        @endif


                        @if ($category)
                            <span class="sep">/</span>
                            <a
                                href="{{ route('sarkari.naukri.category', [
                                    'state' => $state,
                                    'category' => $category,
                                ]) }}">
                                {{ ucwords(str_replace('-', ' ', $category)) }}
                            </a>
                        @endif

                        {{-- <span class="sep">/</span>

                        <span class="current">
                            {{ $job->title }}
                        </span> --}}

                    </nav>

                    <h1>
                        {{ $job->title }}
                    </h1>

                    <p>
                        Check complete notification, eligibility,
                        vacancy details, age limit, salary,
                        selection process, important dates,
                        exam pattern, required documents,
                        and apply online process.
                    </p>

                </div>


                <!-- RIGHT SEARCH -->
                <div class="col-lg-4 mt-4 mt-lg-0">

                    <div class="search-card">

                        <h5 class="mb-3 fw-bold">
                            🔍 Search Sarkari Jobs
                        </h5>

                        <div class="position-relative">

                            <input type="text" id="jobSearch" class="form-control form-control-lg rounded-4 shadow-sm"
                                placeholder="Search SSC, Railway, UPSC..." autocomplete="off">

                            <div class="search-dropdown" style="display:none">
                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <div class="container">

        <div class="summary">

            <div class="summary-card">

                <div class="summary-item">
                    <small>Organization</small>
                    <strong>{{ $job->organization }}</strong>
                </div>

                <div class="summary-item">
                    <small>Total Vacancy</small>
                    <strong>{{ $job->total_vacancies }}</strong>
                </div>

                <div class="summary-item">
                    <small>Application Mode</small>
                    <strong>{{ $job->apply_mode }}</strong>
                </div>

                <div class="summary-item">
                    <small>Last Date</small>
                    <strong>{{ \Carbon\Carbon::parse($job->end_date)->format('d F Y') }}</strong>
                </div>

            </div>

        </div>

    </div>

    <style>
        /* MAIN LAYOUT */

        .main-wrapper {
            width: 1200px;
            margin: auto;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 25px;
            align-items: start;
        }

        /* LEFT SIDEBAR */

        .sidebar {
            position: sticky;
            position: -webkit-sticky;
            top: 0px;
            align-self: start;
            height: fit-content;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
            margin-bottom: 20px;
        }

        .sidebar-title {
            background: #0B4F6C;
            color: #fff;
            padding: 16px 20px;
            font-size: 16px;
            font-weight: 600;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar ul li:last-child {
            border: none;
        }

        .sidebar ul li a {
            display: block;
            padding: 14px 20px;
            color: #444;
            font-size: 14px;
            transition: .3s;
        }

        .sidebar ul li a:hover {
            background: #F8FAFC;
            padding-left: 28px;
            color: #0B4F6C;
        }

        /* CONTENT AREA */

        .content {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        /* CONTENT CARD */

        .content-card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
        }

        .content-card h2 {
            font-size: 32px;
            color: #0B4F6C;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .content-card p {
            line-height: 30px;
            font-size: 15px;
            color: #444;
        }

        /* INFO TABLE */

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .info-table tr {
            border-bottom: 1px solid #eee;
        }

        .info-table td {
            padding: 16px;
        }

        .info-table td:first-child {
            width: 280px;
            font-weight: 600;
            background: #f8fafc;
        }

        /* ALERT BOX */

        .notice-box {
            background: #FEF3C7;
            border-left: 5px solid #F59E0B;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        /* HIGHLIGHT BOXES */

        /* .highlight-grid {
                                                                                                                display: grid;
                                                                                                                grid-template-columns: repeat(3, 1fr);
                                                                                                                gap: 20px;
                                                                                                                margin-top: 20px;
                                                                                                            } */

        .highlight-box {
            background: #fff;
            border: 1px solid #eee;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
        }

        .highlight-box h3 {
            font-size: 20px;
            color: #0F766E;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .highlight-box p {
            font-size: 14px;
        }

        .sidebar-inner {
            position: sticky;
            top: 90px;
        }

        .highlight-icon {
            font-size: 50px;
        }
    </style>


    <div class="main-wrapper">


        <!-- LEFT -->

        <div class="sidebar">
            <div class="sidebar-inner">

                <div class="sidebar-card">

                    <div class="sidebar-title">
                        Table Of Contents
                    </div>

                    <ul>

                        <li><a href="#overview">Overview</a></li>

                        <li><a href="#dates">
                                Important Dates
                            </a></li>

                        <li><a href="#fee">
                                Application Fee
                            </a></li>

                        <li><a href="#age">
                                Age Limit
                            </a></li>

                        <li><a href="#vacancy">
                                Vacancy Details
                            </a></li>

                        <li><a href="#qualification">
                                Qualification
                            </a></li>

                        <li><a href="#selection">
                                Selection Process
                            </a></li>

                        <li><a href="#salary">
                                Salary
                            </a></li>

                        <li><a href="#documents">
                                Documents
                            </a></li>

                        <li><a href="#apply">
                                How To Apply
                            </a></li>

                        <li><a href="#links">
                                Important Links
                            </a></li>

                        <li><a href="#faq">
                                FAQ
                            </a></li>

                    </ul>

                </div>


                <div class="sidebar-card">

                    <div class="sidebar-title">
                        Useful Tools
                    </div>

                    <ul>

                        <li>
                            <a href="#">
                                Age Calculator
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Salary Calculator
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Qualification Checker
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Application Fee Checker
                            </a>
                        </li>

                    </ul>

                </div>


                <div class="sidebar-card">

                    <div class="sidebar-title">
                        Latest Jobs
                    </div>

                    <ul>

                        <li>
                            <a href="#">
                                SSC CGL 2026
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Railway NTPC
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                IBPS PO
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                UP Police
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>



        <!-- RIGHT -->

        <div class="content">


            <div class="content-card" id="overview">

                <h2>
                    Overview
                </h2>

                <p>

                    {{-- SSC Combined Graduate Level Examination
                    is conducted by Staff Selection Commission
                    for recruitment in various Group B and
                    Group C posts in ministries,
                    departments and government offices. --}}

                    {!! nl2br($overview) !!}

                </p>

            </div>

            <div class="content-card job-highlights-card">

                <h2>
                    Job Highlights
                </h2>

                <div class="highlight-grid">

                    <div class="highlight-box">
                        <div class="highlight-icon">📌</div>
                        <div>
                            <h3>{{ isset($job->total_vacancies) ? number_format($job->total_vacancies) : 'N/A' }}</h3>
                            <p>Total Vacancies</p>
                        </div>
                    </div>


                    <div class="highlight-box">
                        <div class="highlight-icon">💰</div>
                        <div>
                            <h3>
                                @if (is_numeric(str_replace(',', '', $job->max_salary)))
                                    ₹{{ number_format((float) str_replace(',', '', $job->max_salary)) }}
                                @else
                                    {{ $job->max_salary ?: 'N/A' }}
                                @endif
                            </h3>
                            <p>Maximum Salary</p>
                        </div>
                    </div>


                    <div class="highlight-box">
                        <div class="highlight-icon">📍</div>
                        <div>
                            <h3>{{ isset($job->state) ? ucfirst($job->state) : 'N/A' }}</h3>
                            <p>Job Location</p>
                        </div>
                    </div>


                    <div class="highlight-box">
                        <div class="highlight-icon">📅</div>
                        <div>
                            <h3>
                                {{ $job->end_date ? \Carbon\Carbon::parse($job->end_date)->format('d F Y') : 'N/A' }}
                            </h3>
                            <p>Last Date</p>
                        </div>
                    </div>


                    <div class="highlight-box">
                        <div class="highlight-icon">🏢</div>
                        <div>
                            <h3>{{ $job->organization_full_form ?? 'N/A' }}</h3>
                            <p>Organization</p>
                        </div>
                    </div>


                </div>

            </div>

            <div class="content-card" id="dates">

                <h2>
                    Important Dates
                </h2>

                <table class="info-table">

                    <tr>
                        <td>
                            Application Start
                        </td>
                        <td>
                            01 July 2026
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Last Date
                        </td>
                        <td>
                            30 July 2026
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Exam Date
                        </td>
                        <td>
                            To Be Announced
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Admit Card
                        </td>
                        <td>
                            Before Exam
                        </td>
                    </tr>

                </table>

            </div>







            <div class="content-card">

                <h2>
                    Important Notice
                </h2>

                <div class="notice-box">

                    Candidates are advised to carefully read the official notification before applying online. Applicants
                    should verify eligibility criteria, important dates, application process, and other details before
                    submitting the application form.

                </div>

            </div>

            <!-- APPLICATION FEE -->

            <div class="content-card" id="fee">

                <h2>
                    Application Fee
                </h2>

                {{-- <table class="info-table">

                    <tr>
                        <td>General / OBC / EWS</td>
                        <td>₹100</td>
                    </tr>

                    <tr>
                        <td>SC / ST</td>
                        <td>₹0</td>
                    </tr>

                    <tr>
                        <td>Female</td>
                        <td>₹0</td>
                    </tr>

                    <tr>
                        <td>Payment Mode</td>
                        <td>Online / Offline</td>
                    </tr>

                </table> --}}
                <table class="table table-bordered table-striped info-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Application Fee</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (!empty($job->general_fees))
                            <tr>
                                <td>General / UR</td>
                                {{ is_numeric($job->general_fees) ? '₹' . number_format($job->general_fees) : $job->general_fees }}
                            </tr>
                        @endif

                        @if (!empty($job->obc_fees))
                            <tr>
                                <td>OBC</td>
                                <td>{{ is_numeric($job->obc_fees) ? '₹' . number_format($job->obc_fees) : $job->obc_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->ews_fees))
                            <tr>
                                <td>EWS</td>
                                <td>{{ is_numeric($job->ews_fees) ? '₹' . number_format($job->ews_fees) : $job->ews_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->sc_fees))
                            <tr>
                                <td>SC</td>
                                <td>{{ is_numeric($job->sc_fees) ? '₹' . number_format($job->sc_fees) : $job->sc_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->st_fees))
                            <tr>
                                <td>ST</td>
                                <td>{{ is_numeric($job->st_fees) ? '₹' . number_format($job->st_fees) : $job->st_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->ph_fees))
                            <tr>
                                <td>PwBD / PH</td>
                                <td>{{ is_numeric($job->ph_fees) ? '₹' . number_format($job->ph_fees) : $job->ph_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->female_fees))
                            <tr>
                                <td>Female Candidates</td>
                                <td>{{ is_numeric($job->female_fees) ? '₹' . number_format($job->female_fees) : $job->female_fees }}
                                </td>
                            </tr>
                        @endif

                        @if (!empty($job->extra_charge))
                            <tr>
                                <td>Extra Charges</td>
                                <td>{{ $job->extra_charge }}</td>
                            </tr>
                        @endif

                        @if (!empty($job->payment_mode))
                            <tr>
                                <td>Payment Mode</td>
                                <td>{{ $job->payment_mode }}</td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>


            <!-- AGE LIMIT -->

            @if (
                $job->min_age ||
                    $job->max_age_genral ||
                    $job->max_age_obc ||
                    $job->max_age_sc_st ||
                    $job->max_age_female ||
                    $job->relaxation)
                <div class="content-card" id="age">

                    <h2>Age Limit</h2>

                    <table class="info-table">

                        @if (filled($job->min_age))
                            <tr>
                                <td>Minimum Age</td>
                                <td>{{ $job->min_age }} Years</td>
                            </tr>
                        @endif

                        @if (filled($job->max_age_genral))
                            <tr>
                                <td>Maximum Age (General)</td>
                                <td>{{ $job->max_age_genral }} Years</td>
                            </tr>
                        @endif

                        @if (filled($job->max_age_obc))
                            <tr>
                                <td>Maximum Age (OBC)</td>
                                <td>{{ $job->max_age_obc }} Years</td>
                            </tr>
                        @endif

                        @if (filled($job->max_age_sc_st))
                            <tr>
                                <td>Maximum Age (SC/ST)</td>
                                <td>{{ $job->max_age_sc_st }} Years</td>
                            </tr>
                        @endif

                        @if (filled($job->max_age_female))
                            <tr>
                                <td>Maximum Age (Female)</td>
                                <td>{{ $job->max_age_female }} Years</td>
                            </tr>
                        @endif

                    </table>

                    @if ($job->relaxation)
                        <div class="notice-box">
                            {!! nl2br(e($job->relaxation)) !!}
                        </div>
                    @endif

                </div>
            @endif



            <!-- VACANCY DETAILS -->
            <style>
                .content-card {
                    background: #fff;
                    border-radius: 12px;
                    padding: 20px;
                    margin-bottom: 25px;
                }

                .vacancy-table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .vacancy-table th {

                    background: #0f766e;
                    color: #fff;
                    padding: 12px;
                    text-align: center;
                    font-weight: 600;
                    white-space: nowrap;

                }

                .vacancy-table td {

                    padding: 12px;
                    text-align: center;
                    border-bottom: 1px solid #ececec;

                }

                .vacancy-table td:first-child {

                    text-align: left;
                    font-weight: 600;

                }

                .vacancy-table tbody tr:nth-child(even) {

                    background: #fafafa;

                }

                .vacancy-table tbody tr:hover {

                    background: #f2f8ff;

                }

                .table-responsive {

                    overflow-x: auto;

                }
            </style>
            @if (filled($job->genral_post) ||
                    filled($job->ews_post) ||
                    filled($job->obc_post) ||
                    filled($job->sc_post) ||
                    filled($job->st_post))
                @php

                    function parsePosts($data)
                    {
                        $result = [];

                        if (empty($data)) {
                            return $result;
                        }

                        $items = explode('#', trim($data, '#'));

                        foreach ($items as $item) {
                            if (empty($item)) {
                                continue;
                            }

                            $parts = explode('$', $item);

                            if (count($parts) >= 2) {
                                $result[trim($parts[0])] = trim($parts[1]);
                            }
                        }

                        return $result;
                    }

                    $general = parsePosts($job->genral_post);
                    $ews = parsePosts($job->ews_post);
                    $obc = parsePosts($job->obc_post);
                    $sc = parsePosts($job->sc_post);
                    $st = parsePosts($job->st_post);

                    /* Category Totals */
                    $genTotal = array_sum($general);
                    $ewsTotal = array_sum($ews);
                    $obcTotal = array_sum($obc);
                    $scTotal = array_sum($sc);
                    $stTotal = array_sum($st);

                    $totalVacancy = $genTotal + $ewsTotal + $obcTotal + $scTotal + $stTotal;

                    $posts = array_unique(
                        array_merge(
                            array_keys($general),
                            array_keys($ews),
                            array_keys($obc),
                            array_keys($sc),
                            array_keys($st),
                        ),
                    );

                @endphp


                <div class="content-card" id="vacancy">

                    <h2>Post Wise Vacancy Details</h2>

                    <div class="table-responsive">

                        <table class="info-table vacancy-table">

                            <thead>

                                <tr>
                                    <th>Post Name</th>
                                    <th>GEN</th>
                                    <th>EWS</th>
                                    <th>OBC</th>
                                    <th>SC</th>
                                    <th>ST</th>
                                    <th>Total</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($posts as $post)
                                    @php

                                        $gen = (int) ($general[$post] ?? 0);
                                        $e = (int) ($ews[$post] ?? 0);
                                        $o = (int) ($obc[$post] ?? 0);
                                        $s = (int) ($sc[$post] ?? 0);
                                        $stt = (int) ($st[$post] ?? 0);

                                        $total = $gen + $e + $o + $s + $stt;

                                    @endphp

                                    <tr>

                                        <td>{{ $post }}</td>

                                        <td>{{ $gen ?: '-' }}</td>

                                        <td>{{ $e ?: '-' }}</td>

                                        <td>{{ $o ?: '-' }}</td>

                                        <td>{{ $s ?: '-' }}</td>

                                        <td>{{ $stt ?: '-' }}</td>

                                        <td><strong>{{ $total }}</strong></td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>
            @endif



            <!-- CATEGORY WISE -->
            <style>
                /* .category-grid {
                                                                    display: grid;
                                                                    grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
                                                                    gap: 16px;
                                                                    margin-top: 20px;
                                                                } */

                .category-card {
                    background: linear-gradient(135deg, #062a3a, #0a5467);
                    border: 1px solid #e5e7eb;
                    border-radius: 14px;
                    padding: 18px;
                    text-align: center;
                    color: #fff;
                    width: 132px;
                    margin-right: 10px;
                    float: left;
                    transition: .25s;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, .05);
                }

                .category-card:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
                }

                .category-icon {
                    width: 52px;
                    height: 52px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 12px;
                    font-size: 24px;
                    font-weight: bold;
                }

                .category-title {
                    font-size: 14px;
                    color: #fff;
                    margin-bottom: 6px;
                }

                .category-value {
                    font-size: 30px;
                    font-weight: 700;
                    color: #fff;
                }

                .general .category-icon {
                    background: #eef2ff;
                    color: #4338ca;
                }

                .ews .category-icon {
                    background: #ecfdf5;
                    color: #059669;
                }

                .obc .category-icon {
                    background: #fff7ed;
                    color: #ea580c;
                }

                .sc .category-icon {
                    background: #fef2f2;
                    color: #dc2626;
                }

                .st .category-icon {
                    background: #f5f3ff;
                    color: #7c3aed;
                }

                .total .category-icon {
                    background: #ecfeff;
                    color: #0891b2;
                }
            </style>
            @if ($totalVacancy)
                <div class="content-card">

                    <h2>Category Wise Vacancy</h2>

                    <div class="category-grid">

                        @if ($genTotal)
                            <div class="category-card general">
                                <div class="category-icon">G</div>
                                <div class="category-title">General</div>
                                <div class="category-value">{{ number_format($genTotal) }}</div>
                            </div>
                        @endif

                        @if ($ewsTotal)
                            <div class="category-card ews">
                                <div class="category-icon">E</div>
                                <div class="category-title">EWS</div>
                                <div class="category-value">{{ number_format($ewsTotal) }}</div>
                            </div>
                        @endif

                        @if ($obcTotal)
                            <div class="category-card obc">
                                <div class="category-icon">O</div>
                                <div class="category-title">OBC</div>
                                <div class="category-value">{{ number_format($obcTotal) }}</div>
                            </div>
                        @endif

                        @if ($scTotal)
                            <div class="category-card sc">
                                <div class="category-icon">S</div>
                                <div class="category-title">SC</div>
                                <div class="category-value">{{ number_format($scTotal) }}</div>
                            </div>
                        @endif

                        @if ($stTotal)
                            <div class="category-card st">
                                <div class="category-icon">T</div>
                                <div class="category-title">ST</div>
                                <div class="category-value">{{ number_format($stTotal) }}</div>
                            </div>
                        @endif

                        <div class="category-card total">
                            <div class="category-icon">Σ</div>
                            <div class="category-title">Total Vacancy</div>
                            <div class="category-value">{{ number_format($totalVacancy) }}</div>
                        </div>

                    </div>

                </div>
            @endif


            <!-- QUALIFICATION -->
            <style>
                .post-table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .post-table th {

                    background: #0f766e;
                    color: #fff;
                    padding: 14px;
                    font-size: 15px;
                    text-align: left;
                    white-space: nowrap;

                }

                .post-table td {

                    padding: 14px;
                    border-bottom: 1px solid #ececec;
                    vertical-align: top;
                    line-height: 1.7;

                }

                .post-table tbody tr:nth-child(even) {

                    background: #fafafa;

                }

                .post-table tbody tr:hover {

                    background: #f2f8ff;

                }

                .post-table td:first-child {

                    color: #0f766e;
                    font-weight: 600;

                }

                @media(max-width:768px) {

                    .post-table {

                        min-width: 850px;

                    }

                }
            </style>
            @php

                $postNames = array_map('trim', explode('#', $job->post_name ?? ''));
                $qualifications = array_map('trim', explode('#', $job->post_eligibility ?? ''));
                $salaries = array_map('trim', explode('#', $job->post_salary ?? ''));

            @endphp

            @if (count(array_filter($postNames)))
                <div class="content-card" id="post-details">

                    <h2>Post Wise Details</h2>

                    <div class="table-responsive">

                        <table class="info-table post-table">

                            <thead>

                                <tr>
                                    <th style="width:30%">📌 Post Name</th>
                                    <th style="width:50%">🎓 Qualification</th>
                                    <th style="width:20%">💰 Salary</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($postNames as $index => $post)
                                    @if ($post)
                                        <tr>

                                            <td>
                                                📌 <strong>{{ $post }}</strong>
                                            </td>

                                            <td>
                                                🎓 {{ $qualifications[$index] ?? 'Not Available' }}
                                            </td>

                                            <td>
                                                💰 {{ $salaries[$index] ?? '-' }}
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>
            @endif



            <!-- SELECTION PROCESS -->
            <style>
                /*=========================
      Selection Process
    =========================*/

                .selection-grid {

                    display: flex;
                    align-items: stretch;
                    gap: 15px;
                    overflow-x: auto;
                    overflow-y: hidden;
                    padding: 5px 0 10px;

                }

                .selection-grid::-webkit-scrollbar {

                    height: 8px;

                }

                .selection-grid::-webkit-scrollbar-thumb {

                    background: #cbd5e1;
                    border-radius: 20px;

                }

                .selection-grid::-webkit-scrollbar-track {

                    background: #f3f4f6;

                }

                .selection-card {

                    flex: 0 0 170px;
                    min-height: 190px;

                    padding: 16px;

                    border-radius: 14px;

                    text-align: center;

                    transition: .3s;

                    border: 1px solid rgba(0, 0, 0, .05);

                    box-shadow: 0 3px 10px rgba(0, 0, 0, .06);

                }

                .selection-card:hover {

                    transform: translateY(-6px);

                    box-shadow: 0 12px 25px rgba(0, 0, 0, .12);

                }

                .selection-icon {

                    font-size: 48px;

                    margin: 12px 0;

                    line-height: 1;

                }

                .selection-title {

                    font-size: 16px;

                    font-weight: 700;

                    color: #111827;

                    line-height: 1.5;

                    min-height: 48px;

                }

                .selection-step {

                    display: inline-block;

                    margin-top: 8px;

                    padding: 4px 12px;

                    border-radius: 30px;

                    background: rgba(255, 255, 255, .7);

                    font-size: 13px;

                    font-weight: 600;

                    color: #374151;

                }

                /* Colors */

                .blue {

                    background: #dbeafe;

                }

                .green {

                    background: #dcfce7;

                }

                .orange {

                    background: #ffedd5;

                }

                .purple {

                    background: #ede9fe;

                }

                .red {

                    background: #fee2e2;

                }

                .teal {

                    background: #ccfbf1;

                }

                .brown {

                    background: #fef3c7;

                }

                .dark {

                    background: #e5e7eb;

                }

                /* Success */

                .success-card {

                    background: linear-gradient(135deg, #22c55e, #16a34a);

                    color: #fff;

                }

                .success-card .selection-title {

                    color: #fff;

                }

                .success-card .selection-step {

                    background: rgba(255, 255, 255, .18);

                    color: #fff;

                }

                .success-card .selection-icon {

                    font-size: 55px;

                }

                /* Mobile */

                @media(max-width:768px) {

                    .selection-grid {

                        display: grid;

                        grid-template-columns: repeat(2, 1fr);

                        gap: 12px;

                        overflow: visible;

                    }

                    .selection-card {

                        flex: none;

                        min-height: 190px;

                        padding: 18px;

                    }

                }

                @media(max-width:480px) {

                    .selection-grid {

                        grid-template-columns: 1fr;

                    }

                }
            </style>
            @php
                $steps = array_filter(array_map('trim', explode(',', $job->mode_selection ?? '')));

                $icons = ['📝', '💻', '⌨️', '📄', '🩺', '🏆', '✅', '🎯'];

                $classes = ['blue', 'green', 'orange', 'purple', 'red', 'teal', 'brown', 'dark'];
            @endphp

            @if (count($steps))
                <div class="content-card">

                    <h2>Selection Process</h2>

                    <div class="selection-grid">

                        @foreach ($steps as $step)
                            <div class="selection-card {{ $classes[$loop->index % count($classes)] }}">
                                <div class="selection-step">
                                    Step {{ $loop->iteration }}
                                </div>
                                <div class="selection-icon">
                                    {{ $icons[$loop->index % count($icons)] }}
                                </div>

                                <div class="selection-title">
                                    {{ $step }}
                                </div>
                            </div>
                        @endforeach
                        <div class="selection-card success-card">

                            <div class="selection-icon">
                                🎉
                            </div>

                            <div class="selection-title">
                                Congratulations!
                            </div>

                            <div class="selection-step">
                                🏆 Selected for the Job
                            </div>

                        </div>
                    </div>

                </div>
            @endif



            <!-- POST WISE VACANCY -->
{{-- 
            <div class="content-card">

                <h2>
                    Post Wise Vacancy Details
                </h2>

                <table class="info-table">

                    <tr>
                        <td><b>Post Name</b></td>
                        <td><b>Total Post</b></td>
                    </tr>

                    <tr>
                        <td>Junior Assistant</td>
                        <td>250</td>
                    </tr>

                    <tr>
                        <td>Senior Assistant</td>
                        <td>150</td>
                    </tr>

                    <tr>
                        <td>Inspector</td>
                        <td>100</td>
                    </tr>

                </table>

            </div> --}}



            <!-- POST ELIGIBILITY -->

            <div class="content-card">

                <h2>
                    Post Wise Eligibility
                </h2>

                <table class="info-table">

                    <tr>
                        <td>Junior Assistant</td>
                        <td>
                            Graduate Degree From Recognized University
                        </td>
                    </tr>

                    <tr>
                        <td>Senior Assistant</td>
                        <td>
                            Graduate + Experience
                        </td>
                    </tr>

                    <tr>
                        <td>Inspector</td>
                        <td>
                            Bachelor Degree + Physical Standard
                        </td>
                    </tr>

                </table>

            </div>



            <!-- DOCUMENTS -->

            <div class="content-card" id="documents">

                <h2>
                    Required Documents
                </h2>

                <table class="info-table">

                    <tr>
                        <td>Photograph</td>
                        <td>
                            Recent Passport Size Photo
                        </td>
                    </tr>

                    <tr>
                        <td>Signature</td>
                        <td>
                            Scanned Signature
                        </td>
                    </tr>

                    <tr>
                        <td>ID Proof</td>
                        <td>
                            Aadhaar / PAN / Voter ID
                        </td>
                    </tr>

                    <tr>
                        <td>Education</td>
                        <td>
                            Marksheet & Certificates
                        </td>
                    </tr>

                    <tr>
                        <td>Category Certificate</td>
                        <td>
                            SC/ST/OBC/EWS if applicable
                        </td>
                    </tr>

                    <tr>
                        <td>Experience Certificate</td>
                        <td>
                            If Required
                        </td>
                    </tr>

                </table>

            </div>



            <!-- APPLICATION PROCESS -->

            <div class="content-card" id="apply">

                <h2>
                    How To Apply
                </h2>

                <div style="padding:20px">

                    <div style="
background:#0B4F6C;
color:#fff;
padding:15px;
border-radius:10px;
margin-bottom:15px;">
                        STEP 1 : Read Official Notification
                    </div>

                    <div style="
background:#0F766E;
color:#fff;
padding:15px;
border-radius:10px;
margin-bottom:15px;">
                        STEP 2 : Register Online
                    </div>

                    <div style="
background:#F59E0B;
color:#fff;
padding:15px;
border-radius:10px;
margin-bottom:15px;">
                        STEP 3 : Upload Documents
                    </div>

                    <div style="
background:#0B4F6C;
color:#fff;
padding:15px;
border-radius:10px;
margin-bottom:15px;">
                        STEP 4 : Pay Application Fee
                    </div>

                    <div style="
background:#0F766E;
color:#fff;
padding:15px;
border-radius:10px;">
                        STEP 5 : Final Submit & Print
                    </div>

                </div>

            </div>



            <!-- IMPORTANT HIGHLIGHTS -->

            <div class="content-card">

                <h2>
                    Important Highlights
                </h2>

                <div class="highlight-grid">

                    <div class="highlight-box">
                        <h3>
                            ₹44900
                        </h3>
                        <p>
                            Starting Salary
                        </p>
                    </div>

                    <div class="highlight-box">
                        <h3>
                            500
                        </h3>
                        <p>
                            Vacancies
                        </p>
                    </div>

                    <div class="highlight-box">
                        <h3>
                            18-27
                        </h3>
                        <p>
                            Age Limit
                        </p>
                    </div>

                    <div class="highlight-box">
                        <h3>
                            Graduate
                        </h3>
                        <p>
                            Qualification
                        </p>
                    </div>

                    <div class="highlight-box">
                        <h3>
                            Online
                        </h3>
                        <p>
                            Apply Mode
                        </p>
                    </div>

                    <div class="highlight-box">
                        <h3>
                            India
                        </h3>
                        <p>
                            Posting
                        </p>
                    </div>

                </div>

            </div>


            <!-- IMPORTANT DATES TIMELINE -->

            <div class="content-card" id="timeline">

                <h2>
                    Important Dates Timeline
                </h2>

                <div class="timeline">

                    <div class="timeline-item">
                        <div class="timeline-date">01 Jul 2026</div>
                        <div class="timeline-content">
                            Notification Released
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">02 Jul 2026</div>
                        <div class="timeline-content">
                            Application Started
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">15 Jul 2026</div>
                        <div class="timeline-content">
                            Last Date To Apply
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-date">TBA</div>
                        <div class="timeline-content">
                            Exam Date
                        </div>
                    </div>

                </div>

            </div>



            <!-- IMPORTANT LINKS -->

            <div class="content-card" id="links">

                <h2>
                    Important Links
                </h2>

                <table class="info-table">

                    <tr>
                        <td>
                            Apply Online
                        </td>
                        <td>
                            <a href="#">
                                Apply Here
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Official Notification
                        </td>
                        <td>
                            <a href="#">
                                Download PDF
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Official Website
                        </td>
                        <td>
                            <a href="#">
                                Visit Website
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Join Telegram
                        </td>
                        <td>
                            <a href="#">
                                Join Now
                            </a>
                        </td>
                    </tr>

                </table>

            </div>



            <!-- FAQ -->

            <div class="content-card" id="faq">

                <h2>
                    Frequently Asked Questions
                </h2>

                <details class="faq-box">
                    <summary>
                        What is the last date to apply?
                    </summary>
                    <p>
                        The last date to submit the online application is
                        15 July 2026.
                    </p>
                </details>


                <details class="faq-box">
                    <summary>
                        What is the age limit?
                    </summary>
                    <p>
                        Candidates must be between
                        18 to 27 years.
                    </p>
                </details>


                <details class="faq-box">
                    <summary>
                        What is the qualification?
                    </summary>
                    <p>
                        Candidates should possess
                        a Graduate Degree.
                    </p>
                </details>


                <details class="faq-box">
                    <summary>
                        How many vacancies are available?
                    </summary>
                    <p>
                        There are total
                        500 vacancies.
                    </p>
                </details>

            </div>



            <!-- RELATED JOBS -->

            <div class="content-card">

                <h2>
                    Related Jobs
                </h2>

                <div class="related-jobs">

                    <div class="job-box">
                        <h3>
                            SSC CGL 2026
                        </h3>
                        <p>
                            14582 Vacancies
                        </p>
                        <a href="#">
                            View Details
                        </a>
                    </div>


                    <div class="job-box">
                        <h3>
                            IBPS PO 2026
                        </h3>
                        <p>
                            5208 Vacancies
                        </p>
                        <a href="#">
                            View Details
                        </a>
                    </div>


                    <div class="job-box">
                        <h3>
                            Railway NTPC
                        </h3>
                        <p>
                            11558 Vacancies
                        </p>
                        <a href="#">
                            View Details
                        </a>
                    </div>

                </div>

            </div>

            <!-- STICKY APPLY BUTTON -->

            <div class="sticky-apply">

                <a href="#">
                    Apply Online
                </a>

            </div>



            <!-- SOCIAL SHARE -->

            <div class="content-card">

                <h2>
                    Share This Job
                </h2>

                <div class="share-buttons">

                    <a href="#" class="share-btn">
                        WhatsApp
                    </a>

                    <a href="#" class="share-btn">
                        Telegram
                    </a>

                    <a href="#" class="share-btn">
                        Facebook
                    </a>

                    <a href="#" class="share-btn">
                        Twitter
                    </a>

                </div>

            </div>



            <!-- DISCLAIMER -->

            <div class="content-card">

                <h2>
                    Important Disclaimer
                </h2>

                <div class="notice-box">

                    We provide job information for educational purposes only.
                    Candidates are advised to verify all details from the
                    official notification before applying. We are not
                    responsible for any changes made by the recruiting authority.

                </div>

            </div>



            <!-- AUTHOR BOX -->

            <div class="content-card">

                <div class="author-box">

                    <div class="author-image">
                        SH
                    </div>

                    <div class="author-content">

                        <h3>
                            Team SarkariHai
                        </h3>

                        <p>
                            Verified Government Job Research Team with
                            experience in analyzing recruitment notifications,
                            eligibility criteria, vacancy details and application
                            processes.
                        </p>

                    </div>

                </div>

            </div>

        </div>


    </div>















    <!-- FOOTER -->

    {{-- <footer class="site-footer">

        <div class="footer-grid">

            <div>

                <h3>
                    SarkariHai
                </h3>

                <p>
                    Latest Government Jobs, Admit Card,
                    Result, Answer Key and Sarkari Yojana updates.
                </p>

            </div>

            <div>

                <h3>
                    Quick Links
                </h3>

                <ul>

                    <li>
                        <a href="#">
                            Latest Jobs
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Admit Card
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Results
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Answer Key
                        </a>
                    </li>

                </ul>

            </div>

            <div>

                <h3>
                    Important
                </h3>

                <ul>

                    <li>
                        <a href="#">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Contact
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Disclaimer
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Privacy Policy
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="copyright">

            © 2026 SarkariHai. All Rights Reserved.

        </div>

    </footer> --}}
@endsection
