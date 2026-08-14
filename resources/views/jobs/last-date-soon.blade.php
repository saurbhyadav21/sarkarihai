{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>SSC CGL Recruitment 2026</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
</head>

<body> --}}

{{-- <header class="header">

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

    </header> --}}

@extends('layouts.front')
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
@section('content')
    <section class="hero">

        <div class="container">

            <div class="hero-flex">

                <div class="col-lg-8">

                    <h1>🏆 SarkariHai — हर सरकारी नौकरी की सही जानकारी</h1>

                    <div class="row mt-4">

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>4,742+</h3>
                                <small>Jobs</small>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>230+</h3>
                                <small>Results</small>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="stats">
                                <h3>505+</h3>
                                <small>Admit Card</small>
                            </div>
                        </div>



                    </div>
                    <br/>
            
                    <p>
                        Find the latest Sarkari Naukri 2026, Government Jobs, Admit Cards, Results, and Exam Updates in
                        one place.
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
    <small>Apply Online</small>
    <strong>{{ number_format($onlineJobs) }}</strong>
</div>

    <div class="summary-item">
        <small>Total Vacancies</small>
        <strong>{{ number_format($totalVacancies) }}</strong>
    </div>

    <div class="summary-item">
        <small>{{ $closingLabel }}</small>
        <strong>{{ number_format($jobsFound) }}</strong>
    </div>

    <div class="summary-item">
        <small>Last Date</small>

        <strong>
            @if (!empty($listingLastDate))
                {{ \Carbon\Carbon::parse($listingLastDate)->format('d M Y') }}
            @else
                Not Available
            @endif
        </strong>
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


    <div class="main-wrapper">


        <!-- LEFT -->

        <div class="sidebar">
            <div class="sidebar-inner">




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

        <style>
            /* ================================
               JOB LISTING PAGE
            ================================= */

            .job-listing-wrapper {
                max-width: 1320px;
                margin: 0 auto;
                padding: 25px 15px 40px;
            }

            /* Page Header */

            .job-listing-header {
                background: #fff;
                border: 1px solid #e8edf3;
                border-radius: 12px;
                padding: 22px 25px;
                margin-bottom: 20px;
                box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
            }

            .job-listing-header h2 {
                margin: 0;
                color: #172b4d;
                font-size: 28px;
                font-weight: 700;
                line-height: 1.4;
            }

            .job-listing-header p {
                margin: 7px 0 0;
                color: #6b7280;
                font-size: 14px;
            }

            /* Table Card */

            .job-table-card {
                background: #fff;
                border: 1px solid #e8edf3;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 3px 15px rgba(0, 0, 0, .04);
            }

            .job-table {
                margin: 0;
                width: 100%;
                border-collapse: collapse;
            }

            .job-table thead th {
                background: #f5f8fc;
                color: #374151;
                font-size: 14px;
                font-weight: 700;
                padding: 15px 16px;
                border-bottom: 1px solid #e3e8ef;
                white-space: nowrap;
            }

            .job-table tbody td {
                padding: 16px;
                vertical-align: middle;
                border-bottom: 1px solid #edf0f4;
                color: #4b5563;
                font-size: 14px;
            }

            .job-table tbody tr:last-child td {
                border-bottom: 0;
            }

            .job-table tbody tr {
                transition: .2s ease;
            }

            .job-table tbody tr:hover {
                background: #f9fbfd;
            }

            /* Serial Number */

            .job-number {
                width: 55px;
                color: #6b7280 !important;
                font-weight: 600;
                text-align: center;
            }

            /* Job Title */

            .job-title-link {
                color: #1459a6;
                font-weight: 600;
                text-decoration: none;
                line-height: 1.5;
                display: inline-block;
            }

            .job-title-link:hover {
                color: #0d6efd;
                text-decoration: underline;
            }

            /* State / Category */

            .job-tag {
                display: inline-block;
                background: #f1f5f9;
                color: #475569;
                border-radius: 6px;
                padding: 5px 9px;
                font-size: 12px;
                font-weight: 600;
                white-space: nowrap;
            }

            /* Last Date */

            .last-date {
                color: #374151;
                font-weight: 600;
                white-space: nowrap;
            }

            /* Pagination */

            .job-pagination {
    margin-top: 25px;
    display: flex;
    justify-content: center;
    width: 100%;
}

.job-pagination .pagination {
    margin: 0;
    display: flex;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap;
    justify-content: center;
}

.job-pagination .page-item .page-link {
    min-width: 40px;
    height: 40px;
    padding: 8px 13px;
    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #dee2e6;
    border-radius: 7px;

    background: #fff;
    color: #0d6efd;

    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}

.job-pagination .page-item .page-link:hover {
    background: #f1f6ff;
    border-color: #0d6efd;
}

.job-pagination .page-item.active .page-link {
    background: #0d6efd;
    border-color: #0d6efd;
    color: #fff;
}

.job-pagination .page-item.disabled .page-link {
    color: #999;
    background: #f8f9fa;
}


/* Mobile */
@media (max-width: 576px) {

    .job-pagination {
        margin-top: 20px;
        padding: 0 10px;
    }

    .job-pagination .page-link {
        min-width: 36px !important;
        height: 36px !important;
        padding: 6px 10px !important;
        font-size: 13px !important;
    }
}

            /* Empty */

            .no-jobs {
                padding: 50px 20px !important;
                text-align: center;
                color: #6b7280 !important;
                font-size: 15px;
            }

            .no-jobs-icon {
                font-size: 35px;
                display: block;
                margin-bottom: 10px;
            }


            /* =================================
               MOBILE
            ================================= */

            @media (max-width: 767px) {

                .job-listing-wrapper {
                    padding: 15px 10px 30px;
                }

                .job-listing-header {
                    padding: 18px 16px;
                    margin-bottom: 15px;
                }

                .job-listing-header h2 {
                    font-size: 21px;
                }

                .job-listing-header p {
                    font-size: 13px;
                }

                /* Hide desktop table */

                .job-table-card {
                    background: transparent;
                    border: 0;
                    box-shadow: none;
                    overflow: visible;
                }

                .job-table,
                .job-table thead,
                .job-table tbody,
                .job-table tr,
                .job-table td {
                    display: block;
                    width: 100%;
                }

                .job-table thead {
                    display: none;
                }

                .job-table tbody tr {
                    background: #fff;
                    border: 1px solid #e5eaf0;
                    border-radius: 12px;
                    margin-bottom: 12px;
                    padding: 14px;
                    box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
                }

                .job-table tbody tr:hover {
                    background: #fff;
                }

                .job-table tbody td {
                    border: 0;
                    padding: 6px 0;
                    font-size: 13px;
                }

                .job-table tbody td::before {
                    content: attr(data-label);
                    display: block;
                    color: #7b8491;
                    font-size: 11px;
                    font-weight: 600;
                    margin-bottom: 3px;
                    text-transform: uppercase;
                    letter-spacing: .3px;
                }

                .job-number {
                    width: auto;
                    text-align: left;
                    padding-bottom: 8px !important;
                }

                .job-number::before {
                    display: none !important;
                }

                .job-title-link {
                    font-size: 15px;
                    line-height: 1.55;
                }

                .job-tag {
                    font-size: 11px;
                    padding: 4px 8px;
                }

                .last-date {
                    font-size: 13px;
                }

                .no-jobs {
                    padding: 35px 15px !important;
                }
            }
        </style>


        <div class="content">

            <div class="job-listing-wrapper">

                <!-- PAGE HEADER -->

                <div class="job-listing-header">

                    <h2>
                        {{ $title }}
                    </h2>

                    <p>
                        Browse the latest government job notifications,
                        recruitment updates and important dates.
                    </p>

                </div>


                <!-- JOB TABLE -->

                <div class="job-table-card">

                    <table class="job-table">

                        <thead>

                            <tr>

                                <th class="text-center">#</th>

                                <th>Job Title</th>

                                <th>State</th>

                                <th>Category</th>

                                <th>Last Date</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($jobs as $job)
                                <tr>

                                    <!-- Number -->

                                    <td class="job-number">

                                        {{ $loop->iteration + ($jobs->currentPage() - 1) * $jobs->perPage() }}

                                    </td>


                                    <!-- Job Title -->

                                    <td data-label="Job Title">

                                        <a class="job-title-link"
                                            href="{{ url('sarkari-naukri/' . ($job->state ?: 'all-india') . '/' . ($job->category ?: 'uncategorized') . '/' . $job->slug) }}">

                                            {{ $job->title }}

                                        </a>

                                    </td>


                                    <!-- State -->

                                    <td data-label="State">

                                        <span class="job-tag">

                                            {{ $job->state === 'all-india' ? 'All India' : ucwords(str_replace(['-', '_'], ' ', $job->state ?? '')) }}

                                        </span>

                                    </td>


                                    <!-- Category -->

                                    <td data-label="Category">

                                        <span class="job-tag">

                                            {{ ucwords(str_replace(['-', '_'], ' ', $job->category ?? '')) }}

                                        </span>

                                    </td>


                                    <!-- Last Date -->

                                    <td data-label="Last Date">

                                        @if (!empty($job->end_date))
                                            <span class="last-date">

                                                {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}

                                            </span>
                                        @else
                                            <span class="text-muted">
                                                Not Available
                                            </span>
                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="5" class="no-jobs">

                                        <span class="no-jobs-icon">📋</span>

                                        No Jobs Found

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->

                @if ($jobs->hasPages())
                    <div class="job-pagination">

                        {{ $jobs->links() }}

                    </div>
                @endif

            </div>

        </div>


    </div>
@endsection











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
