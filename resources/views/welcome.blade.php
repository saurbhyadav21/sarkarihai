<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>xs</title>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet">


    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>



    <style>
        /* ===========================
HEADER
=========================== */

        .main-header {
            background: #ffffff;
            border-bottom: 1px solid #e8edf3;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .05);
        }

        .logo img {
            max-height: 42px;
        }

        .desktop-menu {
            gap: 28px;
        }

        .desktop-menu a {
            color: #173b5b;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .desktop-menu a:hover {
            color: #0a5467;
        }

        .search-box {
            display: flex;
            border: 2px solid #edf1f7;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 15px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 220px;
            padding: 10px 15px;
        }

        .search-box button {
            border: none;
            background: #0a5467;
            color: #fff;
            padding: 0 18px;
        }

        .mobile-toggle {
            border: none;
            background: #0a5467;
            color: #fff;
            width: 42px;
            height: 42px;
            border-radius: 8px;
            font-size: 20px;
        }

        .offcanvas-body a {
            display: block;
            padding: 12px 0;
            color: #173b5b;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }
    </style>
    <!-- ===========================
HEADER
=========================== -->

    <header class="main-header">

        <div class="container">

            <div class="d-flex align-items-center justify-content-between">

                <!-- Logo -->
                <a href="/" class="logo">
                    saRAKRI HAI
                </a>

                <!-- Desktop Menu -->
                <nav class="desktop-menu d-none d-lg-flex">

                    <a href="/sarkari-naukri">
                        Latest Jobs
                    </a>

                    <a href="/admit-card">
                        Admit Card
                    </a>

                    <a href="/result">
                        Result
                    </a>

                    <a href="/syllabus">
                        Syllabus
                    </a>

                    <a href="/answer-key">
                        Answer Key
                    </a>

                    <a href="/admission">
                        Admission
                    </a>

                </nav>

                <!-- Search -->
                <div class="header-right d-flex align-items-center">

                    <form class="search-box">

                        <input type="text" placeholder="Search Jobs...">

                        <button type="submit">
                            🔍
                        </button>

                    </form>

                    <!-- Mobile Menu -->
                    <button class="mobile-toggle d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">

                        ☰

                    </button>

                </div>

            </div>

        </div>

    </header>



    <!-- MOBILE MENU -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">

        <div class="offcanvas-header">

            <h5>Sarkari Hai</h5>

            <button class="btn-close" data-bs-dismiss="offcanvas">
            </button>

        </div>

        <div class="offcanvas-body">

            <a href="/sarkari-naukri">
                Latest Jobs
            </a>

            <a href="/admit-card">
                Admit Card
            </a>

            <a href="/result">
                Result
            </a>

            <a href="/syllabus">
                Syllabus
            </a>

            <a href="/answer-key">
                Answer Key
            </a>

            <a href="/admission">
                Admission
            </a>

        </div>

    </div>
<!-- ===================================
HERO BANNER
=================================== -->

<style>
.hero-banner{
    background: linear-gradient(
        135deg,
        #0a5467,
        #08384b
    );
    border-radius: 12px;
    padding: 45px;
    color: #fff;
    margin: 25px 0;
    overflow: hidden;
    position: relative;
}

.hero-banner::before{
    content:'';
    position:absolute;
    right:-100px;
    top:-100px;
    width:250px;
    height:250px;
    background:rgba(255,255,255,.05);
    border-radius:50%;
}

.hero-banner::after{
    content:'';
    position:absolute;
    left:-50px;
    bottom:-50px;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.03);
    border-radius:50%;
}

.hero-title{
    font-size:42px;
    font-weight:700;
    line-height:1.2;
    margin-bottom:15px;
}

.hero-subtitle{
    font-size:17px;
    opacity:.9;
    margin-bottom:25px;
}

.hero-search{
    background:#fff;
    padding:25px;
    border-radius:10px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.hero-search h5{
    color:#173b5b;
    font-weight:700;
    margin-bottom:15px;
}

.hero-search .form-control{
    height:50px;
}

.hero-search button{
    background:#f4b400;
    border:none;
    height:50px;
    font-weight:700;
    color:#000;
}

.quick-stats{
    margin-top:30px;
}

.stat-card{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.1);
    border-radius:10px;
    padding:18px;
    text-align:center;
    backdrop-filter:blur(5px);
}

.stat-number{
    font-size:28px;
    font-weight:700;
    color:#ffc107;
}

.stat-label{
    font-size:14px;
}

.live-update{
    margin-top:25px;
    background:rgba(255,193,7,.15);
    border-left:4px solid #ffc107;
    padding:15px;
    border-radius:8px;
    font-size:14px;
}
</style>


<section class="hero-banner">

    <div class="row align-items-center">

        <!-- LEFT -->

        <div class="col-lg-8">

            <h1 class="hero-title">

                Sarkari Result 2026<br>

                Latest Sarkari Naukri,
                Admit Card &
                Results

            </h1>

            <div class="hero-subtitle">

                Find latest Government Jobs,
                Admit Cards,
                Results,
                Answer Keys,
                Admissions,
                Syllabus and Official Notifications.

            </div>


            <!-- STATS -->

            <div class="row quick-stats">

                <div class="col-md-3 col-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-number">
                            9500+
                        </div>

                        <div class="stat-label">
                            Active Jobs
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-number">
                            1200+
                        </div>

                        <div class="stat-label">
                            Results
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-number">
                            800+
                        </div>

                        <div class="stat-label">
                            Admit Cards
                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-6 mb-3">

                    <div class="stat-card">

                        <div class="stat-number">
                            300+
                        </div>

                        <div class="stat-label">
                            Admissions
                        </div>

                    </div>

                </div>

            </div>


            <!-- LIVE -->

            <div class="live-update">

                🔥 <b>Latest Updates :</b>

                SSC CGL Recruitment 2026 •
                RRB NTPC Answer Key 2026 •
                IBPS PO Recruitment 2026 •
                UPSC NDA II Online Form 2026

            </div>

        </div>


        <!-- RIGHT -->

        <div class="col-lg-4">

            <div class="hero-search">

                <h5>
                    Search Sarkari Jobs
                </h5>

                <input
                    type="text"
                    class="form-control mb-3"
                    placeholder="SSC CGL, Railway, UPSC">

                <button
                    class="btn w-100">

                    Search

                </button>

            </div>

        </div>

    </div>

</section>

<!-- ===================================
SEARCH + STATS + QUICK NAVIGATION
=================================== -->

<style>
.home-search-card,
.stats-card,
.quick-card{
    background:#fff;
    border-radius:12px;
    padding:20px;
    box-shadow:0 2px 15px rgba(0,0,0,.06);
    border:1px solid #edf1f7;
}

.section-title{
    color:#173b5b;
    font-weight:700;
    margin-bottom:20px;
}

.stats-card{
    text-align:center;
    transition:.2s;
}

.stats-card:hover{
    transform:translateY(-3px);
}

.stats-number{
    font-size:30px;
    font-weight:700;
    color:#0a5467;
}

.stats-text{
    color:#666;
    font-size:14px;
}

.quick-card{
    text-align:center;
    text-decoration:none;
    display:block;
    transition:.2s;
    height:100%;
}

.quick-card:hover{
    transform:translateY(-4px);
}

.quick-icon{
    width:55px;
    height:55px;
    line-height:55px;
    border-radius:50%;
    margin:auto;
    margin-bottom:15px;
    color:#fff;
    font-size:22px;
    font-weight:bold;
}

.q-job{
    background:#0a5467;
}

.q-admit{
    background:#2e7d32;
}

.q-result{
    background:#d32f2f;
}

.q-answer{
    background:#f57c00;
}

.q-admission{
    background:#7b1fa2;
}

.q-syllabus{
    background:#1565c0;
}

.quick-title{
    color:#173b5b;
    font-weight:600;
    font-size:15px;
}

.quick-count{
    color:#777;
    font-size:13px;
}
</style>


<!-- SEARCH -->

<div class="row mt-4">

    <div class="col-lg-12">

        <div class="home-search-card">

            <h4 class="section-title">
                Search Sarkari Jobs
            </h4>

            <form>

                <div class="row">

                    <div class="col-lg-10">

                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Search SSC, Railway, UPSC, Bank, State Jobs">

                    </div>

                    <div class="col-lg-2">

                        <button
                            class="btn btn-warning w-100 btn-lg">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>



<!-- STATISTICS -->

<div class="row mt-4">

    <div class="col-lg-3 col-6 mb-3">

        <div class="stats-card">

            <div class="stats-number">
                9,540+
            </div>

            <div class="stats-text">
                Active Jobs
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6 mb-3">

        <div class="stats-card">

            <div class="stats-number">
                650+
            </div>

            <div class="stats-text">
                Results
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6 mb-3">

        <div class="stats-card">

            <div class="stats-number">
                450+
            </div>

            <div class="stats-text">
                Admit Cards
            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6 mb-3">

        <div class="stats-card">

            <div class="stats-number">
                120+
            </div>

            <div class="stats-text">
                Admissions
            </div>

        </div>

    </div>

</div>



<!-- QUICK NAVIGATION -->

<div class="row mt-4">

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/sarkari-naukri" class="quick-card">

            <div class="quick-icon q-job">
                💼
            </div>

            <div class="quick-title">
                Latest Jobs
            </div>

            <div class="quick-count">
                9500+ Jobs
            </div>

        </a>

    </div>

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/admit-card" class="quick-card">

            <div class="quick-icon q-admit">
                🪪
            </div>

            <div class="quick-title">
                Admit Card
            </div>

            <div class="quick-count">
                450+
            </div>

        </a>

    </div>

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/result" class="quick-card">

            <div class="quick-icon q-result">
                📋
            </div>

            <div class="quick-title">
                Results
            </div>

            <div class="quick-count">
                650+
            </div>

        </a>

    </div>

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/answer-key" class="quick-card">

            <div class="quick-icon q-answer">
                🔑
            </div>

            <div class="quick-title">
                Answer Key
            </div>

            <div class="quick-count">
                220+
            </div>

        </a>

    </div>

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/admission" class="quick-card">

            <div class="quick-icon q-admission">
                🎓
            </div>

            <div class="quick-title">
                Admission
            </div>

            <div class="quick-count">
                120+
            </div>

        </a>

    </div>

    <div class="col-lg-2 col-md-4 col-6 mb-4">

        <a href="/syllabus" class="quick-card">

            <div class="quick-icon q-syllabus">
                📚
            </div>

            <div class="quick-title">
                Syllabus
            </div>

            <div class="quick-count">
                300+
            </div>

        </a>

    </div>

</div>