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
    <style>
        body {
            background: #f4f7fb;
            color: #212529;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ========================================= */

        .container-xxl {
            max-width: 1450px;
        }

        /* ========================================= */

        .card {
            border: none;
            border-radius: 14px;
            transition: .25s;
        }

        .card:hover {

            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);

        }

        /* ========================================= */

        .card-header {

            background: #ffffff;
            border-bottom: 1px solid #edf1f7;
            padding: 18px 22px;
            font-weight: 700;

        }

        /* ========================================= */

        .card-body {

            padding: 22px;

        }

        /* ========================================= */

        .job-card {

            overflow: hidden;
            border: 1px solid #edf1f7;
            transition: .25s;

        }

        .job-card:hover {

            transform: translateY(-3px);

            border-color: #0d6efd;

        }

        /* ========================================= */

        .job-icon {

            width: 65px;

            height: 65px;

            border-radius: 14px;

            background: #eef5ff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

            color: #0d6efd;

            flex-shrink: 0;

        }

        /* ========================================= */

        .stat-card {

            border-left: 5px solid #0d6efd;

        }

        /* ========================================= */

        .icon-box {

            width: 55px;

            height: 55px;

            border-radius: 12px;

            display: flex;

            justify-content: center;

            align-items: center;

            color: #fff;

            font-size: 22px;

        }

        /* ========================================= */

        h1 {

            font-size: 34px;

            font-weight: 800;

        }

        h2 {

            font-weight: 700;

        }

        h3 {

            font-weight: 700;

        }

        h4 {

            font-weight: 700;

        }

        h5 {

            font-weight: 700;

        }

        /* ========================================= */

        .text-muted {

            color: #6c757d !important;

        }

        /* ========================================= */

        a {

            transition: .2s;

        }

        a:hover {

            text-decoration: none;

        }

        /* ========================================= */

        .job-card h5 a {

            color: #222;

        }

        .job-card h5 a:hover {

            color: #0d6efd;

        }

        /* ========================================= */

        .badge {

            font-size: 12px;

            font-weight: 600;

            padding: 8px 12px;

            border-radius: 40px;

        }

        /* ========================================= */

        .form-control {

            min-height: 48px;

            border-radius: 10px;

            border: 1px solid #dbe4f0;

        }

        .form-control:focus {

            box-shadow: none;

            border-color: #0d6efd;

        }

        /* ========================================= */

        .form-select {

            min-height: 48px;

            border-radius: 10px;

            border: 1px solid #dbe4f0;

        }

        .form-select:focus {

            box-shadow: none;

            border-color: #0d6efd;

        }

        /* ========================================= */

        .input-group-text {

            background: #fff;

            border: 1px solid #dbe4f0;

        }

        /* ========================================= */

        .btn {

            border-radius: 10px;

            min-height: 46px;

            font-weight: 600;

            transition: .25s;

        }

        .btn-primary {

            background: #0d6efd;

            border-color: #0d6efd;

        }

        .btn-primary:hover {

            background: #0b5ed7;

            border-color: #0b5ed7;

        }

        .btn-outline-success:hover {

            color: #fff;

        }

        .btn-light {

            background: #fff;

        }

        /* Continue in Part 2B */
        /* ========================================= */
        /* Sidebar */
        /* ========================================= */

        .sticky-top {

            top: 20px;

            z-index: 100;

        }

        /* ========================================= */

        .card-header strong {

            font-size: 17px;

            font-weight: 700;

        }

        /* ========================================= */

        .form-label {

            font-size: 14px;

            margin-bottom: 8px;

            color: #444;

        }

        /* ========================================= */

        #applyFilter {

            height: 48px;

        }

        #clearFilter {

            height: 48px;

        }

        /* ========================================= */
        /* Search Box */
        /* ========================================= */

        #keyword {

            font-size: 15px;

        }

        #keyword::placeholder {

            color: #999;

        }

        /* ========================================= */
        /* Toolbar */
        /* ========================================= */

        #sortBy {

            min-width: 190px;

        }

        #jobCount {

            font-weight: 700;

        }

        /* ========================================= */

        .badge.bg-primary {

            background: #0d6efd !important;

        }

        .badge.bg-success {

            background: #198754 !important;

        }

        .badge.bg-danger {

            background: #dc3545 !important;

        }

        .badge.bg-warning {

            background: #ffc107 !important;

            color: #222 !important;

        }

        .badge.bg-info {

            background: #0dcaf0 !important;

            color: #222 !important;

        }

        /* ========================================= */
        /* Job Card */
        /* ========================================= */

        .job-card {

            position: relative;

            background: #fff;

        }

        .job-card::before {

            content: "";

            position: absolute;

            left: 0;

            top: 0;

            width: 5px;

            height: 100%;

            background: #0d6efd;

            opacity: 0;

            transition: .3s;

        }

        .job-card:hover::before {

            opacity: 1;

        }

        .job-card h5 {

            font-size: 21px;

            line-height: 30px;

        }

        .job-card small {

            font-size: 13px;

        }

        .job-card .fw-semibold {

            font-size: 15px;

        }

        /* ========================================= */

        .job-icon {

            transition: .25s;

        }

        .job-card:hover .job-icon {

            background: #0d6efd;

            color: #fff;

        }

        /* ========================================= */

        .job-card .btn {

            margin-bottom: 8px;

        }

        .job-card .btn:last-child {

            margin-bottom: 0;

        }

        /* ========================================= */
        /* Empty Result */
        /* ========================================= */

        .fa-folder-open {

            opacity: .30;

        }

        /* ========================================= */
        /* Popular Search Buttons */
        /* ========================================= */

        .card .btn-light.border {

            border-color: #dfe7ef !important;

        }

        .card .btn-light.border:hover {

            background: #0d6efd;

            color: #fff;

            border-color: #0d6efd !important;

        }

        /* ========================================= */
        /* Pagination */
        /* ========================================= */

        .pagination {

            margin: 0;

        }

        .pagination .page-link {

            border: none;

            margin: 0 4px;

            border-radius: 8px;

            color: #0d6efd;

            padding: 10px 16px;

            font-weight: 600;

        }

        .pagination .page-item.active .page-link {

            background: #0d6efd;

            color: #fff;

        }

        .pagination .page-link:hover {

            background: #eef5ff;

        }

        /* Continue in Part 2C */
        /* ===========================================================
       PART 2C
       Premium UI Enhancements
    =========================================================== */

        /* ========================================= */
        /* Breadcrumb */
        /* ========================================= */

        .breadcrumb {

            margin: 0;

            background: transparent;

            padding: 0;

        }

        .breadcrumb-item {

            font-size: 14px;

        }

        .breadcrumb-item a {

            color: #0d6efd;

            text-decoration: none;

        }

        .breadcrumb-item.active {

            color: #6c757d;

        }

        /* ========================================= */
        /* Stat Cards */
        /* ========================================= */

        .stat-card {

            overflow: hidden;

            position: relative;

        }

        .stat-card::after {

            content: "";

            position: absolute;

            right: -30px;

            top: -30px;

            width: 110px;

            height: 110px;

            border-radius: 50%;

            background: rgba(13, 110, 253, .05);

        }

        .stat-card h3 {

            font-size: 30px;

        }

        .icon-box {

            box-shadow: 0 10px 25px rgba(0, 0, 0, .10);

        }

        /* ========================================= */
        /* Filter Card */
        /* ========================================= */

        .sticky-top {

            max-height: calc(100vh - 30px);

            overflow-y: auto;

        }

        .sticky-top::-webkit-scrollbar {

            width: 6px;

        }

        .sticky-top::-webkit-scrollbar-thumb {

            background: #d8d8d8;

            border-radius: 20px;

        }

        /* ========================================= */
        /* Card Animation */
        /* ========================================= */

        .job-card {

            transition:
                transform .25s,
                box-shadow .25s,
                border-color .25s;

        }

        .job-card:hover {

            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

        }

        /* ========================================= */
        /* Job Meta */
        /* ========================================= */

        .job-card small {

            display: block;

            margin-bottom: 3px;

        }

        .job-card .fw-semibold {

            color: #222;

        }

        /* ========================================= */
        /* Salary Highlight */
        /* ========================================= */

        .job-card .salary {

            color: #198754;

            font-weight: 700;

        }

        /* ========================================= */
        /* Last Date */
        /* ========================================= */

        .job-card .last-date {

            color: #dc3545;

            font-weight: 700;

        }

        /* ========================================= */
        /* Buttons */
        /* ========================================= */

        .job-card .btn {

            font-size: 14px;

            font-weight: 600;

        }

        .job-card .btn i {

            width: 18px;

            text-align: center;

        }

        /* ========================================= */
        /* Search Card */
        /* ========================================= */

        .input-group {

            overflow: hidden;

            border-radius: 12px;

        }

        .input-group-text {

            border-right: none;

        }

        .input-group .form-control {

            border-left: none;

        }

        /* ========================================= */
        /* Card Header */
        /* ========================================= */

        .card-header {

            border-top-left-radius: 14px !important;

            border-top-right-radius: 14px !important;

        }

        /* ========================================= */
        /* SEO Content */
        /* ========================================= */

        .card-body p {

            line-height: 1.8;

        }

        /* ========================================= */
        /* Popular Searches */
        /* ========================================= */

        .card-body .btn {

            transition: .20s;

        }

        .card-body .btn:hover {

            transform: translateY(-2px);

        }

        /* ========================================= */
        /* Loading Overlay (Future AJAX) */
        /* ========================================= */

        .loading-overlay {

            position: absolute;

            inset: 0;

            background: rgba(255, 255, 255, .75);

            display: none;

            align-items: center;

            justify-content: center;

            z-index: 20;

        }

        .loading-overlay.show {

            display: flex;

        }

        .loading-spinner {

            width: 45px;

            height: 45px;

            border: 4px solid #e9ecef;

            border-top: 4px solid #0d6efd;

            border-radius: 50%;

            animation: spin .8s linear infinite;

        }

        @keyframes spin {

            from {

                transform: rotate(0deg);

            }

            to {

                transform: rotate(360deg);

            }

        }

        /* Continue in Part 2D */
        /* ===========================================================
       PART 2D
       Responsive Design + Final CSS
    =========================================================== */

        /* ========================================= */
        /* Desktop (1400px+) */
        /* ========================================= */

        @media (min-width:1400px) {

            .container-xxl {

                max-width: 1480px;

            }

        }

        /* ========================================= */
        /* Laptop */
        /* ========================================= */

        @media (max-width:1200px) {

            h1 {

                font-size: 30px;

            }

            .job-card h5 {

                font-size: 19px;

                line-height: 28px;

            }

            #sortBy {

                min-width: 160px;

            }

        }

        /* ========================================= */
        /* Tablet */
        /* ========================================= */

        @media (max-width:991px) {

            .sticky-top {

                position: relative !important;

                top: 0 !important;

                max-height: unset;

                overflow: visible;

            }

            .job-card .btn {

                width: 100%;

            }

            .job-card .col-lg-3 {

                margin-top: 20px;

            }

            .card-body {

                padding: 18px;

            }

            .icon-box {

                width: 48px;

                height: 48px;

                font-size: 20px;

            }

            .job-icon {

                width: 55px;

                height: 55px;

                font-size: 20px;

            }

        }

        /* ========================================= */
        /* Mobile */
        /* ========================================= */

        @media (max-width:768px) {

            body {

                font-size: 14px;

            }

            h1 {

                font-size: 26px;

            }

            h5 {

                font-size: 17px;

            }

            .job-card h5 {

                font-size: 17px;

                line-height: 26px;

            }

            .badge {

                margin-bottom: 5px;

            }

            .pagination {

                justify-content: center;

                flex-wrap: wrap;

            }

            .pagination .page-link {

                margin: 3px;

                padding: 8px 12px;

            }

            .card-header {

                padding: 14px 16px;

            }

            .card-body {

                padding: 16px;

            }

        }

        /* ========================================= */
        /* Small Mobile */
        /* ========================================= */

        @media (max-width:576px) {

            .input-group {

                flex-wrap: nowrap;

            }

            #sortBy {

                width: 100% !important;

                margin-top: 10px;

            }

            .job-icon {

                display: none;

            }

            .d-flex.justify-content-between {

                flex-direction: column;

                align-items: flex-start !important;

            }

            .stat-card h3 {

                font-size: 24px;

            }

            .icon-box {

                margin-top: 12px;

            }

        }

        /* ========================================= */
        /* Utilities */
        /* ========================================= */

        .shadow-hover {

            transition: .25s;

        }

        .shadow-hover:hover {

            box-shadow: 0 12px 30px rgba(0, 0, 0, .08);

        }

        .rounded-12 {

            border-radius: 12px;

        }

        .rounded-14 {

            border-radius: 14px;

        }

        .rounded-16 {

            border-radius: 16px;

        }

        .cursor-pointer {

            cursor: pointer;

        }

        .text-small {

            font-size: 13px;

        }

        .fw-600 {

            font-weight: 600;

        }

        .fw-700 {

            font-weight: 700;

        }

        .bg-soft-primary {

            background: #eef5ff;

        }

        .bg-soft-success {

            background: #edf8f1;

        }

        .bg-soft-warning {

            background: #fff8e5;

        }

        .bg-soft-danger {

            background: #fff0f1;

        }

        /* ========================================= */
        /* Smooth Scroll */
        /* ========================================= */

        html {

            scroll-behavior: smooth;

        }

        /* ========================================= */
        /* Selection */
        /* ========================================= */

        ::selection {

            background: #0d6efd;

            color: #fff;

        }

        /* ========================================= */
        /* End of CSS */
        /* ========================================= */
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



    <div class="container-fluid py-4">

        <div class="container-xxl">

            <!-- ===================== -->
            <!-- Page Heading -->
            <!-- ===================== -->
            {{-- 
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

        </div> --}}

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

                                <input type="text" id="keyword" class="form-control"
                                    placeholder="Search job title, department, organization...">

                            </div>

                        </div>

                        <div class="col-lg-2">

                            <button class="btn btn-primary w-100" id="searchBtn">

                                Search

                            </button>

                        </div>

                        <div class="col-lg-2">

                            <button class="btn btn-outline-secondary w-100" id="resetBtn">

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

                                        {{-- {{ number_format($totalJobs) }} --}}

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

                                        {{-- {{ number_format($todayJobs) }} --}}

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

                                        {{-- {{ number_format($closingSoonJobs) }} --}}

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

                                        {{-- {{ number_format($activeJobs) }} --}}

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

                                <select class="form-select" id="state">

                                    <option value="">

                                        All States

                                    </option>

                                    @foreach ($states as $state)
                                        <option value="{{ $state }}">
                                            {{ $state }}
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

                                <select class="form-select" id="category">

                                    <option value="">

                                        All Categories

                                    </option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}">
                                            {{ $category }}
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

                                <select class="form-select" id="sub_category">

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

                                <select class="form-select" id="qualification">

                                    <option value="">

                                        All Qualifications

                                    </option>

                                    @foreach ($qualifications as $qualification)
                                        <option value="{{ $qualification }}">
                                            {{ $qualification }}
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

                                <select class="form-select" id="job_type">

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

                                <select class="form-select" id="last_date">

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

                                <button class="btn btn-primary" id="applyFilter">

                                    <i class="fa fa-filter me-2"></i>

                                    Apply Filters

                                </button>

                                <button class="btn btn-light border" id="clearFilter">

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

                                                {{-- {{ number_format($totalJobs) }} --}}

                                            </span>

                                            Jobs

                                        </span>

                                        <select class="form-select w-auto" id="sortBy">

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

                                                        @if ($job->subCategory)
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

                                                        $days = now()->diffInDays(
                                                            \Carbon\Carbon::parse($job->last_date),
                                                            false,
                                                        );

                                                    @endphp

                                                    @if ($days <= 3)
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

                                                    <a href="{{ url($job->slug) }}" class="btn btn-primary">

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

                        @if ($jobs->hasPages())
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
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    <script>
        

            $(document).ready(function() {

                    /* ==========================================
                       CSRF
                    ========================================== */

                    $.ajaxSetup({

                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                    });

                    /* ==========================================
                       Variables
                    ========================================== */

                    let typingTimer;

                    let page = 1;

                    /* ==========================================
                       Auto Search
                    ========================================== */

                    $('#keyword').on('keyup', function() {

                        clearTimeout(typingTimer);

                        typingTimer = setTimeout(function() {

                            page = 1;

                            loadJobs();

                        }, 500);

                    });

                    /* ==========================================
                       Dropdown Filters
                    ========================================== */

                    $('#state').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#category').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#sub_category').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#qualification').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#job_type').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#last_date').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    $('#sortBy').change(function() {

                        page = 1;

                        loadJobs();

                    });

                    /* ==========================================
                       Apply Button
                    ========================================== */

                    $('#applyFilter').click(function() {

                        page = 1;

                        loadJobs();

                    });

                    /* ==========================================
                       Clear Filter
                    ========================================== */

                    $('#clearFilter').click(function() {

                        $('#keyword').val('');

                        $('#state').val('');

                        $('#category').val('');

                        $('#sub_category').val('');

                        $('#qualification').val('');

                        $('#job_type').val('');

                        $('#last_date').val('');

                        $('#sortBy').val('latest');

                        page = 1;

                        loadJobs();

                    });

                    /* ==========================================
                       Pagination
                    ========================================== */

                    $(document).on('click', '.pagination a', function(e) {

                        e.preventDefault();

                        page = $(this).attr('href').split('page=')[1];

                        loadJobs();

                        $('html,body').animate({

                            scrollTop: $("#jobs").offset().top - 20

                        }, 300);

                    });


                        /* ==========================================
       AJAX Load Jobs
    ========================================== */

    function loadJobs() {

        let data = {

            search: $('#keyword').val(),

            state: $('#state').val(),

            category: $('#category').val(),

            sub_category: $('#sub_category').val(),

            qualification: $('#qualification').val(),

            job_type: $('#job_type').val(),

            last_date: $('#last_date').val(),

            sort: $('#sortBy').val(),

            page: page

        };

        $("#jobs").addClass("position-relative");

        if ($("#jobs .loading-overlay").length == 0) {

            $("#jobs").append(

                '<div class="loading-overlay show">' +
                    '<div class="loading-spinner"></div>' +
                '</div>'

            );

        } else {

            $("#jobs .loading-overlay").addClass("show");

        }

        $.ajax({

            url: window.location.pathname,

            type: "GET",

            data: data,

            success: function (response) {

                $("#jobs").html(response.html);

                $("#jobCount").text(response.total);

            },

            error: function () {

                $("#jobs").html(

                    '<div class="alert alert-danger">' +
                    'Something went wrong. Please try again.' +
                    '</div>'

                );

            },

            complete: function () {

                $(".loading-overlay").removeClass("show");

            }

        });

    }
    /* ==========================================
       Browser URL Update
    ========================================== */

    function updateUrl() {

        let params = new URLSearchParams();

        if ($('#keyword').val() != '')
            params.set('search', $('#keyword').val());

        if ($('#state').val() != '')
            params.set('state', $('#state').val());

        if ($('#category').val() != '')
            params.set('category', $('#category').val());

        if ($('#sub_category').val() != '')
            params.set('sub_category', $('#sub_category').val());

        if ($('#qualification').val() != '')
            params.set('qualification', $('#qualification').val());

        if ($('#job_type').val() != '')
            params.set('job_type', $('#job_type').val());

        if ($('#last_date').val() != '')
            params.set('last_date', $('#last_date').val());

        if ($('#sortBy').val() != 'latest')
            params.set('sort', $('#sortBy').val());

        if (page > 1)
            params.set('page', page);

        let url = window.location.pathname;

        if (params.toString() != '') {

            url += '?' + params.toString();

        }

        window.history.replaceState({}, '', url);

    }

    /* ==========================================
       Update URL After Every Load
    ========================================== */

    $(document).ajaxSuccess(function () {

        updateUrl();

    });

    /* ==========================================
       Browser Back / Forward
    ========================================== */

    window.onpopstate = function () {

        location.reload();

    };

    /* ==========================================
       Dynamic Sub Category
       (AJAX endpoint later)
    ========================================== */

    $('#category').change(function () {

        let category = $(this).val();

        $('#sub_category').html(
            '<option value="">Loading...</option>'
        );

        $.ajax({

            url: "/ajax/sub-categories",

            type: "GET",

            data: {

                category: category

            },

            success: function (response) {

                let html = '';

                html += '<option value="">All Sub Categories</option>';

                $.each(response, function (index, item) {

                    html += '<option value="' + item.slug + '">';

                    html += item.name;

                    html += '</option>';

                });

                $('#sub_category').html(html);

            },

            error: function () {

                $('#sub_category').html(
                    '<option value="">All Sub Categories</option>'
                );

            }

        });

    });

});
    /* ==========================================
       Filter From URL On Page Load
    ========================================== */

    (function () {

        let params = new URLSearchParams(window.location.search);

        if (params.has('search'))
            $('#keyword').val(params.get('search'));

        if (params.has('state'))
            $('#state').val(params.get('state'));

        if (params.has('category'))
            $('#category').val(params.get('category'));

        if (params.has('sub_category'))
            $('#sub_category').val(params.get('sub_category'));

        if (params.has('qualification'))
            $('#qualification').val(params.get('qualification'));

        if (params.has('job_type'))
            $('#job_type').val(params.get('job_type'));

        if (params.has('last_date'))
            $('#last_date').val(params.get('last_date'));

        if (params.has('sort'))
            $('#sortBy').val(params.get('sort'));

        if (params.has('page'))
            page = parseInt(params.get('page'));

    })();

    /* ==========================================
       Enter Key Search
    ========================================== */

    $('#keyword').keypress(function (e) {

        if (e.which == 13) {

            page = 1;

            loadJobs();

        }

    });

    /* ==========================================
       Scroll To Top Button
    ========================================== */

    $('body').append(

        '<button id="scrollTopBtn" class="btn btn-primary">' +

            '<i class="fa-solid fa-arrow-up"></i>' +

        '</button>'

    );

    $('#scrollTopBtn').css({

        position: 'fixed',
        right: '20px',
        bottom: '20px',
        width: '45px',
        height: '45px',
        borderRadius: '50%',
        display: 'none',
        zIndex: '9999'

    });

    $(window).scroll(function () {

        if ($(this).scrollTop() > 300) {

            $('#scrollTopBtn').fadeIn();

        } else {

            $('#scrollTopBtn').fadeOut();

        }

    });

    $(document).on('click', '#scrollTopBtn', function () {

        $('html, body').animate({

            scrollTop: 0

        }, 400);

    });

    /* ==========================================
       Initialize
    ========================================== */

    updateUrl();


/* ==========================================
   End Script
========================================== */

</script>

@endsection
