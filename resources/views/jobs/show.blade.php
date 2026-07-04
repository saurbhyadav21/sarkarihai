<!-- ======================================================
HOME PAGE - PART 1
HEADER + HERO + SEARCH + QUICK LINKS
BOOTSTRAP 5 REQUIRED
====================================================== -->

<style>
:root{
    --primary:#0a5467;
    --primary-dark:#08384b;
    --yellow:#f4b400;
    --light:#f5f7fa;
    --border:#e7edf3;
    --text:#173b5b;
}

body{
    background:#f3f5f8;
}

/* HEADER */

.top-header{
    background:#fff;
    border-bottom:1px solid var(--border);
}

.site-logo{
    font-size:28px;
    font-weight:700;
    color:var(--primary);
    text-decoration:none;
}

.main-menu a{
    color:#1f3556;
    text-decoration:none;
    font-weight:600;
    margin:0 12px;
    font-size:15px;
}

.main-menu a:hover{
    color:var(--primary);
}

.header-btn{
    background:var(--yellow);
    border:none;
    padding:10px 20px;
    border-radius:6px;
    font-weight:700;
}

/* HERO */

.hero-section{
    background:linear-gradient(
        135deg,
        var(--primary),
        var(--primary-dark)
    );
    color:#fff;
    border-radius:10px;
    padding:40px;
    margin-top:20px;
    margin-bottom:20px;
}

.hero-title{
    font-size:42px;
    font-weight:700;
    line-height:1.2;
}

.hero-desc{
    opacity:.9;
    margin-top:15px;
    font-size:16px;
}

.search-card{
    background:#fff;
    border-radius:10px;
    padding:25px;
    box-shadow:0 5px 25px rgba(0,0,0,.1);
}

.search-card h5{
    color:var(--text);
    font-weight:700;
}

.search-btn{
    background:var(--yellow);
    border:none;
    font-weight:700;
}

/* QUICK LINKS */

.quick-card{
    border-radius:10px;
    color:#fff;
    text-decoration:none;
    display:block;
    padding:20px;
    text-align:center;
    font-weight:700;
    transition:.2s;
}

.quick-card:hover{
    transform:translateY(-3px);
    color:#fff;
}

.bg1{background:#0a5467;}
.bg2{background:#1565c0;}
.bg3{background:#00897b;}
.bg4{background:#ef6c00;}
.bg5{background:#8e24aa;}
.bg6{background:#3949ab;}

/* SECTION */

.home-card{
    background:#fff;
    border:1px solid var(--border);
    border-radius:10px;
    margin-bottom:20px;
}

.section-title{
    font-size:24px;
    color:var(--text);
    font-weight:700;
    margin-bottom:20px;
}

/* UPDATES */

.update-box{
    background:#fff7e0;
    border-left:5px solid var(--yellow);
    padding:15px;
    border-radius:6px;
}

/* STATS */

.stats{
    text-align:center;
    padding:30px;
    border-right:1px solid #eee;
}

.stats:last-child{
    border-right:none;
}

.stats-number{
    color:var(--primary);
    font-size:32px;
    font-weight:700;
}

.stats-title{
    color:#666;
}
</style>


<!-- HEADER -->

<header class="top-header">

    <div class="container">

        <div class="d-flex
                    justify-content-between
                    align-items-center
                    py-3">

            <a href="/"
               class="site-logo">
                Sarkari Hai
            </a>

            <nav class="main-menu
                        d-none
                        d-lg-block">

                <a href="#">
                    Latest Jobs
                </a>

                <a href="#">
                    Admit Card
                </a>

                <a href="#">
                    Result
                </a>

                <a href="#">
                    Syllabus
                </a>

                <a href="#">
                    Answer Key
                </a>

                <a href="#">
                    Contact
                </a>

            </nav>

            <button class="header-btn">
                Search Jobs
            </button>

        </div>

    </div>

</header>



<div class="container">


    <!-- HERO -->

    <section class="hero-section">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h1 class="hero-title">

                    Sarkari Result 2026<br>

                    Latest Sarkari Naukri,
                    Admit Card & Results

                </h1>

                <div class="hero-desc">

                    Find Latest Government Jobs,
                    Admit Cards,
                    Results,
                    Answer Keys,
                    Admissions,
                    and Official Notifications.

                </div>

            </div>

            <div class="col-lg-4">

                <div class="search-card">

                    <h5>
                        Search Jobs
                    </h5>

                    <input
                        class="form-control mt-3"
                        placeholder="SSC CGL, Railway, UPSC">

                    <button
                        class="btn search-btn w-100 mt-3">

                        Search

                    </button>

                </div>

            </div>

        </div>

    </section>



    <!-- QUICK LINKS -->

    <div class="row g-3 mb-4">

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg1">
                Latest Jobs
            </a>
        </div>

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg2">
                Results
            </a>
        </div>

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg3">
                Admit Card
            </a>
        </div>

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg4">
                Answer Key
            </a>
        </div>

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg5">
                Admission
            </a>
        </div>

        <div class="col-lg-2 col-6">
            <a href="#"
               class="quick-card bg6">
                Syllabus
            </a>
        </div>

    </div>



    <!-- LATEST UPDATES -->

    <div class="home-card">

        <div class="card-body">

            <h3 class="section-title">
                Latest Updates
            </h3>

            <div class="update-box">

                🔥 SSC CGL Recruitment 2026 •

                RRB NTPC Answer Key 2026 •

                IBPS PO Recruitment 2026 •

                UPSC NDA II Form 2026 •

                Railway Technician Vacancy 2026

            </div>

        </div>

    </div>



    <!-- STATS -->

    <div class="home-card">

        <div class="row">

            <div class="col-md-3">

                <div class="stats">

                    <div class="stats-number">
                        9540+
                    </div>

                    <div class="stats-title">
                        Active Jobs
                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats">

                    <div class="stats-number">
                        1350+
                    </div>

                    <div class="stats-title">
                        Results
                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats">

                    <div class="stats-number">
                        820+
                    </div>

                    <div class="stats-title">
                        Admit Cards
                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats">

                    <div class="stats-number">
                        350+
                    </div>

                    <div class="stats-title">
                        Admissions
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>