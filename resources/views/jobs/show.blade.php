<!DOCTYPE html>
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
    </style>
</head>

<body>

    <header class="header">

        <div class="container">

            <div class="nav">

                <div class="logo">
                    Sarkari Hai
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

                    <div class="breadcrumb">
                        Home / Latest Jobs / SSC CGL Recruitment
                    </div>

                    <h1>
                        SSC CGL Recruitment 2026
                    </h1>

                    <p>
                        Complete Notification, Eligibility,
                        Vacancy, Salary, Selection Process,
                        Important Dates, Exam Pattern,
                        Documents and Apply Online Link.
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
            top: 90px;
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

                    SSC Combined Graduate Level Examination
                    is conducted by Staff Selection Commission
                    for recruitment in various Group B and
                    Group C posts in ministries,
                    departments and government offices.

                </p>

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
                    Job Highlights
                </h2>

                <div class="highlight-grid">

                    <div class="highlight-box">

                        <h3>
                            14582
                        </h3>

                        <p>
                            Vacancies
                        </p>

                    </div>


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
                            India
                        </h3>

                        <p>
                            Job Location
                        </p>

                    </div>

                </div>

            </div>



            <div class="content-card">

                <h2>
                    Important Notice
                </h2>

                <div class="notice-box">

                    Candidates are advised to read
                    the official notification carefully
                    before applying online.

                </div>

            </div>

            <!-- APPLICATION FEE -->

            <div class="content-card" id="fee">

                <h2>
                    Application Fee
                </h2>

                <table class="info-table">

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

                </table>

            </div>

        </div>


    </div>







    <!-- AGE LIMIT -->

    <div class="content-card" id="age">

        <h2>
            Age Limit
        </h2>

        <table class="info-table">

            <tr>
                <td>Minimum Age</td>
                <td>18 Years</td>
            </tr>

            <tr>
                <td>Maximum Age</td>
                <td>27 Years</td>
            </tr>

            <tr>
                <td>OBC Relaxation</td>
                <td>3 Years</td>
            </tr>

            <tr>
                <td>SC/ST Relaxation</td>
                <td>5 Years</td>
            </tr>

        </table>

        <div class="notice-box">

            Age relaxation will be provided
            as per government rules.

        </div>

    </div>



    <!-- VACANCY DETAILS -->

    <div class="content-card" id="vacancy">

        <h2>
            Vacancy Details
        </h2>

        <table class="info-table">

            <tr>
                <td>Post Name</td>
                <td>Junior Assistant</td>
            </tr>

            <tr>
                <td>Total Vacancy</td>
                <td>500</td>
            </tr>

            <tr>
                <td>Job Location</td>
                <td>All India</td>
            </tr>

            <tr>
                <td>Job Type</td>
                <td>Permanent</td>
            </tr>

        </table>

    </div>



    <!-- CATEGORY WISE -->

    <div class="content-card">

        <h2>
            Category Wise Vacancy
        </h2>

        <div class="highlight-grid">

            <div class="highlight-box">
                <h3>220</h3>
                <p>General</p>
            </div>

            <div class="highlight-box">
                <h3>55</h3>
                <p>EWS</p>
            </div>

            <div class="highlight-box">
                <h3>135</h3>
                <p>OBC</p>
            </div>

            <div class="highlight-box">
                <h3>60</h3>
                <p>SC</p>
            </div>

            <div class="highlight-box">
                <h3>30</h3>
                <p>ST</p>
            </div>

        </div>

    </div>



    <!-- QUALIFICATION -->

    <div class="content-card" id="qualification">

        <h2>
            Educational Qualification
        </h2>

        <p>

            Candidates must possess
            Bachelor Degree from
            any recognized university.

        </p>

        <table class="info-table">

            <tr>
                <td>Minimum Qualification</td>
                <td>Graduate</td>
            </tr>

            <tr>
                <td>Experience</td>
                <td>Not Required</td>
            </tr>

            <tr>
                <td>Eligible Stream</td>
                <td>Any Stream</td>
            </tr>

        </table>

    </div>



    <!-- SALARY -->

    <div class="content-card" id="salary">

        <h2>
            Salary Details
        </h2>

        <table class="info-table">

            <tr>
                <td>Minimum Salary</td>
                <td>₹44,900</td>
            </tr>

            <tr>
                <td>Maximum Salary</td>
                <td>₹1,42,400</td>
            </tr>

            <tr>
                <td>Pay Level</td>
                <td>Level 7</td>
            </tr>

            <tr>
                <td>Allowances</td>
                <td>As Per Government Rules</td>
            </tr>

        </table>

    </div>


    <!-- SELECTION PROCESS -->

    <div class="content-card" id="selection">

        <h2>
            Selection Process
        </h2>

        <div class="highlight-grid">

            <div class="highlight-box">
                <h3>01</h3>
                <p>Written Exam</p>
            </div>

            <div class="highlight-box">
                <h3>02</h3>
                <p>Skill Test</p>
            </div>

            <div class="highlight-box">
                <h3>03</h3>
                <p>Document Verification</p>
            </div>

            <div class="highlight-box">
                <h3>04</h3>
                <p>Medical Test</p>
            </div>

        </div>

    </div>



    <!-- POST WISE VACANCY -->

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

    </div>



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

    </footer>
