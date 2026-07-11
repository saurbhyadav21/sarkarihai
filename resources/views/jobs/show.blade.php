{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>SSC CGL Recruitment 2026</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    
</head>

<body>

    <header class="header">

        <div class="container">

            <div class="nav">

                <div class="logo">
                    <a href="/">Sarkari Hai</a>
                </div>

                <div class="menu">
                    <a href="#">Home</a>
                    <a href="#">Jobs</a>
                    <a href="#">Results</a>
                    <a href="#">Admit Card</a>
                    <a href="#">State Wise</a>
                    <a href="#">News</a>
                </div>

                <a href="#" class="search-btn">
                    Search Jobs
                </a>

            </div>

        </div>

    </header>



    <section class="hero">

        <div class="container">

            <div class="hero-flex">

                <div>

                    

                        @php
                            $state = request()->segment(2);
                            $category = request()->segment(3);
                        @endphp

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

                        </nav>

                       

                    <h1>

                    </h1>

                    <p>
                        Show all job here
                    </p>

                </div>


                <div class="search-card">

                    <h3>
                        Search Job
                    </h3>

                    <input type="text" placeholder="SSC, Railway, Bank">

                    <button>
                        Search
                    </button>

                </div>

            </div>

        </div>

    </section>



    <div class="container">

        <div class="summary">

            <div class="summary-card">

                <div class="summary-item">
                    <small>Organization</small>
                    <strong>SSC</strong>
                </div>

                <div class="summary-item">
                    <small>Total Vacancy</small>
                    <strong>14582</strong>
                </div>

                <div class="summary-item">
                    <small>Application Mode</small>
                    <strong>Online</strong>
                </div>

                <div class="summary-item">
                    <small>Last Date</small>
                    <strong>30 July 2026</strong>
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

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .highlight-box {
            background: #fff;
            border: 1px solid #eee;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
        }

        .highlight-box h3 {
            font-size: 30px;
            color: #0F766E;
            margin-bottom: 10px;
        }

        .highlight-box p {
            font-size: 14px;
        }

        .sidebar-inner {
            position: sticky;
            top: 90px;
        }
    </style>






















    <!-- FOOTER -->

    <footer class="site-footer">

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
            background: linear-gradient(135deg,
                    #0B4F6C,
                    #0F766E);
            padding: 55px 0;
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
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .summary-item {
            text-align: center;
        }

        .summary-item small {
            display: block;
            color: #888;
            margin-bottom: 10px;
        }

        .summary-item strong {
            font-size: 20px;
            color: #0B4F6C;
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
                </style>
    <section class="hero">

        <div class="container">

            <div class="hero-flex">

                <div>

                    <nav aria-label="breadcrumb" class="breadcrumb">

                        <a href="https://sarkarihai.com">
                            Home
                        </a>

                        <span class="sep">/</span>

                        <a href="https://sarkarihai.com/sarkari-naukri">
                            Sarkari Naukri
                        </a>

                       

                    </nav>

                    <h1>
                        xxxx
                    </h1>

                    <p>
                        xxxx
                    </p>

                </div>


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
                    <strong>SSC</strong>
                </div>

                <div class="summary-item">
                    <small>Total Vacancy</small>
                    <strong>14582</strong>
                </div>

                <div class="summary-item">
                    <small>Application Mode</small>
                    <strong>Online</strong>
                </div>

                <div class="summary-item">
                    <small>Last Date</small>
                    <strong>30 July 2026</strong>
                </div>

            </div>

        </div>

    </div>

    {{-- ========================================= --}}
{{-- Sarkari Naukri Listing Page --}}
{{-- Part 1A --}}
{{-- ========================================= --}}

@extends('layouts.app')

@section('title', 'Sarkari Naukri 2026 - Latest Government Jobs')

@section('content')

<div class="container-fluid py-4">

    <div class="container-xxl">

        <!-- ===================== -->
        <!-- Page Heading -->
        <!-- ===================== -->

        <div class="row align-items-center mb-4">

            <div class="col-lg-8">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb mb-2">

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

                <h1 class="fw-bold mb-2">

                    Sarkari Naukri 2026

                </h1>

                <p class="text-muted mb-0">

                    Latest Government Jobs, Online Forms, Recruitment,
                    Admit Card, Result & Government Vacancy Updates.

                </p>

            </div>

            <div class="col-lg-4">

                <div class="text-lg-end mt-3 mt-lg-0">

                    <a href="#jobs"
                       class="btn btn-primary px-4">

                        Browse Jobs

                    </a>

                </div>

            </div>

        </div>

        <!-- ===================== -->
        <!-- Search Section -->
        <!-- ===================== -->

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-lg-8">

                        <div class="input-group">

                            <span class="input-group-text">

                                <i class="fa fa-search"></i>

                            </span>

                            <input
                                type="text"
                                id="keyword"
                                class="form-control"
                                placeholder="Search job title, department, organization...">

                        </div>

                    </div>

                    <div class="col-lg-2">

                        <button
                            class="btn btn-primary w-100"
                            id="searchBtn">

                            Search

                        </button>

                    </div>

                    <div class="col-lg-2">

                        <button
                            class="btn btn-outline-secondary w-100"
                            id="resetBtn">

                            Reset

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- ===================== -->
        <!-- Statistics -->
        <!-- ===================== -->

        <div class="row g-3 mb-4">

            <div class="col-xl-3 col-md-6">

                <div class="card stat-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Total Jobs

                                </small>

                                <h3 class="fw-bold mt-2 mb-0">

                                    {{ number_format($totalJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-primary">

                                <i class="fa fa-briefcase"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="card stat-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    New Today

                                </small>

                                <h3 class="fw-bold mt-2 mb-0">

                                    {{ number_format($todayJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-success">

                                <i class="fa fa-bolt"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="card stat-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Closing Soon

                                </small>

                                <h3 class="fw-bold mt-2 mb-0">

                                    {{ number_format($closingSoonJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-danger">

                                <i class="fa fa-clock"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="card stat-card h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Active Recruitments

                                </small>

                                <h3 class="fw-bold mt-2 mb-0">

                                    {{ number_format($activeJobs) }}

                                </h3>

                            </div>

                            <div class="icon-box bg-warning">

                                <i class="fa fa-building"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ===================== -->
        <!-- Main Content -->
        <!-- ===================== -->

        <div class="row g-4">

            <!-- Left Sidebar -->

            <div class="col-lg-3">

                <div class="card border-0 shadow-sm sticky-top">

                    <div class="card-header">

                        <strong>

                            Filters

                        </strong>

                    </div>

                    <div class="card-body">
                                                <!-- ===================== -->
                        <!-- State -->
                        <!-- ===================== -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                State

                            </label>

                            <select
                                class="form-select"
                                id="state">

                                <option value="">

                                    All States

                                </option>

                                @foreach($states as $state)

                                    <option value="{{ $state->slug }}">

                                        {{ $state->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- ===================== -->
                        <!-- Category -->
                        <!-- ===================== -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Category

                            </label>

                            <select
                                class="form-select"
                                id="category">

                                <option value="">

                                    All Categories

                                </option>

                                @foreach($categories as $category)

                                    <option value="{{ $category->slug }}">

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- ===================== -->
                        <!-- Sub Category -->
                        <!-- ===================== -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Sub Category

                            </label>

                            <select
                                class="form-select"
                                id="sub_category">

                                <option value="">

                                    All Sub Categories

                                </option>

                            </select>

                        </div>

                        <!-- ===================== -->
                        <!-- Qualification -->
                        <!-- ===================== -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Qualification

                            </label>

                            <select
                                class="form-select"
                                id="qualification">

                                <option value="">

                                    All Qualifications

                                </option>

                                @foreach($qualifications as $qualification)

                                    <option value="{{ $qualification->slug }}">

                                        {{ $qualification->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- ===================== -->
                        <!-- Job Type -->
                        <!-- ===================== -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Job Type

                            </label>

                            <select
                                class="form-select"
                                id="job_type">

                                <option value="">

                                    All Job Types

                                </option>

                                <option value="regular">

                                    Regular

                                </option>

                                <option value="contract">

                                    Contract

                                </option>

                                <option value="deputation">

                                    Deputation

                                </option>

                                <option value="walk-in">

                                    Walk-In

                                </option>

                                <option value="internship">

                                    Internship

                                </option>

                            </select>

                        </div>

                        <!-- ===================== -->
                        <!-- Last Date -->
                        <!-- ===================== -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Last Date

                            </label>

                            <select
                                class="form-select"
                                id="last_date">

                                <option value="">

                                    Any Time

                                </option>

                                <option value="today">

                                    Today

                                </option>

                                <option value="7">

                                    Next 7 Days

                                </option>

                                <option value="15">

                                    Next 15 Days

                                </option>

                                <option value="30">

                                    Next 30 Days

                                </option>

                            </select>

                        </div>

                        <div class="d-grid gap-2">

                            <button
                                class="btn btn-primary"
                                id="applyFilter">

                                <i class="fa fa-filter me-2"></i>

                                Apply Filters

                            </button>

                            <button
                                class="btn btn-light border"
                                id="clearFilter">

                                <i class="fa fa-rotate-left me-2"></i>

                                Clear Filters

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ===================== -->
            <!-- Right Content -->
            <!-- ===================== -->

            <div class="col-lg-9">

                <div class="card border-0 shadow-sm mb-3">

                    <div class="card-body">

                        <div class="row align-items-center">

                            <div class="col-lg-6">

                                <h5 class="mb-0">

                                    Latest Government Jobs

                                </h5>

                            </div>

                            <div class="col-lg-6">

                                <div class="d-flex justify-content-lg-end align-items-center gap-2">

                                    <span class="badge bg-primary px-3 py-2">

                                        <span id="jobCount">

                                            {{ number_format($totalJobs) }}

                                        </span>

                                        Jobs

                                    </span>

                                    <select
                                        class="form-select w-auto"
                                        id="sortBy">

                                        <option value="latest">

                                            Latest First

                                        </option>

                                        <option value="last_date">

                                            Last Date

                                        </option>

                                        <option value="title">

                                            Job Title

                                        </option>

                                        <option value="organization">

                                            Organization

                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="jobs">

                    <!-- Job Cards Start -->
                                        <!-- ================================= -->
                    <!-- Job Card -->
                    <!-- ================================= -->

                    @forelse($jobs as $job)

                    <div class="card border-0 shadow-sm mb-3 job-card">

                        <div class="card-body">

                            <div class="row">

                                <div class="col-lg-9">

                                    <div class="d-flex align-items-start">

                                        <div class="job-icon me-3">

                                            <i class="fa-solid fa-briefcase"></i>

                                        </div>

                                        <div class="flex-grow-1">

                                            <h5 class="mb-2">

                                                <a href="{{ url($job->slug) }}"
                                                   class="text-dark text-decoration-none fw-bold">

                                                    {{ $job->title }}

                                                </a>

                                            </h5>

                                            <div class="d-flex flex-wrap gap-2 mb-3">

                                                <span class="badge bg-primary">

                                                    {{ $job->organization->name ?? 'Government Department' }}

                                                </span>

                                                <span class="badge bg-success">

                                                    {{ $job->state->name ?? 'All India' }}

                                                </span>

                                                <span class="badge bg-warning text-dark">

                                                    {{ $job->category->name ?? 'Government Job' }}

                                                </span>

                                                @if($job->subCategory)

                                                <span class="badge bg-info text-dark">

                                                    {{ $job->subCategory->name }}

                                                </span>

                                                @endif

                                            </div>

                                            <div class="row g-3">

                                                <div class="col-md-6">

                                                    <small class="text-muted">

                                                        <i class="fa-solid fa-graduation-cap me-2"></i>

                                                        Qualification

                                                    </small>

                                                    <div class="fw-semibold">

                                                        {{ $job->qualification->name ?? 'As Per Notification' }}

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <small class="text-muted">

                                                        <i class="fa-solid fa-calendar-days me-2"></i>

                                                        Last Date

                                                    </small>

                                                    <div class="fw-semibold text-danger">

                                                        {{ $job->last_date }}

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <small class="text-muted">

                                                        <i class="fa-solid fa-indian-rupee-sign me-2"></i>

                                                        Salary

                                                    </small>

                                                    <div class="fw-semibold">

                                                        {{ $job->salary ?? 'As Per Rules' }}

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <small class="text-muted">

                                                        <i class="fa-solid fa-users me-2"></i>

                                                        Total Posts

                                                    </small>

                                                    <div class="fw-semibold">

                                                        {{ $job->vacancy ?? '-' }}

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="h-100 d-flex flex-column justify-content-between">

                                        <div class="text-lg-end mb-3">

                                            @php

                                                $days = now()->diffInDays(\Carbon\Carbon::parse($job->last_date), false);

                                            @endphp

                                            @if($days <= 3)

                                                <span class="badge bg-danger">

                                                    Closing Soon

                                                </span>

                                            @elseif($days <= 10)

                                                <span class="badge bg-warning text-dark">

                                                    Apply Fast

                                                </span>

                                            @else

                                                <span class="badge bg-success">

                                                    Active

                                                </span>

                                            @endif

                                        </div>

                                        <div class="d-grid gap-2">

                                            <a href="{{ url($job->slug) }}"
                                               class="btn btn-primary">

                                                <i class="fa-solid fa-eye me-2"></i>

                                                View Details

                                            </a>

                                            <a href="{{ url($job->slug) }}#apply"
                                               class="btn btn-outline-success">

                                                <i class="fa-solid fa-paper-plane me-2"></i>

                                                Apply Now

                                            </a>

                                            <a href="{{ url($job->slug) }}#notification"
                                               class="btn btn-light border">

                                                <i class="fa-solid fa-file-pdf me-2"></i>

                                                Notification

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="card border-0 shadow-sm">

                        <div class="card-body text-center py-5">

                            <i class="fa-solid fa-folder-open fa-3x text-muted mb-3"></i>

                            <h4>

                                No Jobs Found

                            </h4>

                            <p class="text-muted mb-0">

                                Try changing your search or filters.

                            </p>

                        </div>

                    </div>

                    @endforelse
                                        <!-- ================================= -->
                    <!-- Pagination -->
                    <!-- ================================= -->

                    @if($jobs->hasPages())

                    <div class="card border-0 shadow-sm mt-4">

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-lg-4">

                                    <small class="text-muted">

                                        Showing

                                        <strong>

                                            {{ $jobs->firstItem() }}

                                        </strong>

                                        -

                                        <strong>

                                            {{ $jobs->lastItem() }}

                                        </strong>

                                        of

                                        <strong>

                                            {{ number_format($jobs->total()) }}

                                        </strong>

                                        Jobs

                                    </small>

                                </div>

                                <div class="col-lg-8">

                                    <div class="d-flex justify-content-lg-end justify-content-center mt-3 mt-lg-0">

                                        {{ $jobs->links() }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @endif

                </div>

            </div>

        </div>

        <!-- ================================= -->
        <!-- Popular Searches -->
        <!-- ================================= -->

        <div class="row mt-5">

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white">

                        <h5 class="mb-0">

                            Popular Searches

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="d-flex flex-wrap gap-2">

                            <a href="#" class="btn btn-light border">
                                SSC Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Railway Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Banking Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                UPSC Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Defence Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Police Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Teaching Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Engineering Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Medical Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                ITI Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                10th Pass Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                12th Pass Jobs
                            </a>

                            <a href="#" class="btn btn-light border">
                                Graduate Jobs
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================================= -->
        <!-- SEO Content -->
        <!-- ================================= -->

        <div class="row mt-4">

            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h2 class="h4 mb-3">

                            Latest Sarkari Naukri 2026

                        </h2>

                        <p class="text-muted mb-3">

                            Find the latest Government Job Notifications,
                            Online Forms, Recruitment Updates, Admit Cards,
                            Results and Answer Keys in one place. Browse jobs
                            by State, Category, Qualification and Organization
                            using the filters above to quickly find suitable
                            government vacancies.

                        </p>

                        <p class="text-muted mb-0">

                            All recruitment information is updated regularly,
                            including important dates, eligibility criteria,
                            age limit, application fee, selection process,
                            salary details and official notification links.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

