@extends('layouts.front')
<style>
    /*==========================================================
    FACT CHECKING POLICY
    CSS PART-1
    SarkariHai.com
==========================================================*/

body{

    background:#f5f7fb;

    font-family:'Segoe UI',sans-serif;

    color:#333;

}


/*================ HERO =================*/

.page-hero{

    background:linear-gradient(135deg,#0d6efd,#0052cc);

    color:#fff;

    padding:70px 60px;

    border-radius:18px;

    text-align:center;

    margin-bottom:45px;

    box-shadow:0 20px 45px rgba(0,0,0,.12);

    position:relative;

    overflow:hidden;

}

.page-hero:before{

    content:"";

    position:absolute;

    width:220px;

    height:220px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    top:-70px;

    right:-70px;

}

.page-hero:after{

    content:"";

    position:absolute;

    width:170px;

    height:170px;

    border-radius:50%;

    background:rgba(255,255,255,.05);

    left:-60px;

    bottom:-60px;

}

.page-hero h1{

    font-size:46px;

    font-weight:800;

    margin-bottom:20px;

}

.page-hero p{

    max-width:850px;

    margin:auto;

    font-size:18px;

    line-height:1.9;

}


/*================ BADGES =================*/

.author-badge{

    display:inline-block;

    padding:10px 18px;

    margin:6px;

    border-radius:30px;

    background:rgba(255,255,255,.18);

    backdrop-filter:blur(10px);

    color:#fff;

    font-weight:600;

}


/*================ CARD =================*/

.page-card{

    background:#fff;

    padding:35px;

    border-radius:16px;

    margin-bottom:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.06);

    border:1px solid #edf2f7;

    transition:.35s;

}

.page-card:hover{

    transform:translateY(-4px);

    box-shadow:0 18px 45px rgba(0,0,0,.08);

}

.page-card h2{

    font-size:30px;

    font-weight:800;

    color:#0d47a1;

    margin-bottom:20px;

}

.page-card p{

    color:#555;

    font-size:16px;

    line-height:1.9;

}

.page-card ul{

    padding-left:22px;

}

.page-card li{

    margin-bottom:12px;

    line-height:1.8;

}


/*================ FEATURE =================*/

.feature-card{

    background:#fff;

    border-radius:16px;

    padding:30px;

    height:100%;

    text-align:center;

    border:1px solid #edf2f7;

    transition:.35s;

}

.feature-card:hover{

    transform:translateY(-6px);

    box-shadow:0 18px 35px rgba(0,0,0,.08);

}

.feature-icon{

    width:80px;

    height:80px;

    margin:auto;

    border-radius:50%;

    background:#edf5ff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:36px;

    margin-bottom:18px;

}

.feature-card h5{

    font-size:21px;

    font-weight:700;

    margin-bottom:15px;

}

.feature-card p{

    color:#666;

    line-height:1.8;

    margin:0;

}


/*================ INFO BOX =================*/

.info-box{

    background:#eef6ff;

    border-left:5px solid #0d6efd;

    border-radius:12px;

    padding:20px;

    margin-top:25px;

    line-height:1.8;

}


/*================ ALERT =================*/

.alert{

    border:none;

    border-radius:12px;

    padding:18px 22px;

}

.alert-success{

    background:#eaf8ef;

    color:#146c43;

}

.alert-warning{

    background:#fff8df;

    color:#856404;

}

.alert-danger{

    background:#fdecec;

    color:#842029;

}

.alert-primary{

    background:#eef5ff;

    color:#084298;

}


/*================ LIST =================*/

.page-card ul li{

    position:relative;

    padding-left:6px;

}

.page-card ul li::marker{

    color:#0d6efd;

}


/*================ TITLE =================*/

.section-title{

    font-size:34px;

    font-weight:800;

    margin-bottom:30px;

    color:#0d47a1;

}
</style>
.@section('content')

<div class="container py-5">

    <!-- ================= HERO ================= -->

    <div class="page-hero">

        <h1>Fact Checking Policy</h1>

        <p>

            At <strong>SarkariHai.com</strong>, we are committed to publishing
            accurate, transparent and trustworthy information related to
            Government Jobs, Admit Cards, Results, Answer Keys,
            Admissions and Competitive Examinations.

        </p>

        <div class="mt-4">

            <span class="author-badge">
                ✔️ Verified Information
            </span>

            <span class="author-badge">
                📅 Last Updated : {{ now()->format('d F Y') }}
            </span>

            <span class="author-badge">
                🔎 Human Reviewed
            </span>

        </div>

    </div>


    <!-- ================= HIGHLIGHTS ================= -->

    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">
                    📄
                </div>

                <h5>Official Sources</h5>

                <p>

                    Every article is prepared using official notifications
                    and trusted Government sources.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">
                    ✔️
                </div>

                <h5>Verified Content</h5>

                <p>

                    Information is verified before publication
                    by our editorial team.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">
                    🔄
                </div>

                <h5>Regular Updates</h5>

                <p>

                    Articles are updated whenever official
                    authorities release new information.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">
                    🛡️
                </div>

                <h5>Transparency</h5>

                <p>

                    We correct factual mistakes as quickly
                    as possible after verification.

                </p>

            </div>

        </div>

    </div>



    <!-- ================= OUR COMMITMENT ================= -->

    <div class="page-card">

        <h2>🎯 Our Commitment</h2>

        <p>

            SarkariHai.com believes that students and job seekers deserve
            reliable, accurate and up-to-date information.

        </p>

        <p>

            Every Government Job article published on our website
            is reviewed with the objective of minimizing factual
            errors and providing useful information in a simple format.

        </p>

        <p>

            We continuously monitor official recruitment websites,
            Government departments, examination authorities,
            universities and public notices to keep our content updated.

        </p>

        <div class="info-box">

            Our primary objective is to help users access authentic
            Government recruitment information without confusion.

        </div>

    </div>



    <!-- ================= SOURCES ================= -->

    <div class="page-card">

        <h2>🏛 Sources We Use</h2>

        <p>

            Before publishing any recruitment information,
            our editorial team verifies details from official
            and trusted sources whenever available.

        </p>

        <ul>

            <li>Official Government Department Websites</li>

            <li>Official Recruitment Boards</li>

            <li>Public Service Commissions</li>

            <li>Employment News</li>

            <li>Official Notifications (PDF)</li>

            <li>University Official Websites</li>

            <li>Government Press Releases</li>

            <li>Official Result Portals</li>

            <li>Official Admit Card Portals</li>

            <li>Public Information released by Government Authorities</li>

        </ul>

        <div class="alert alert-success mt-4">

            <strong>Note:</strong>

            Whenever possible, users are encouraged to verify
            recruitment information directly from the official
            notification before submitting applications.

        </div>

    </div>



    <!-- ================= WHAT WE VERIFY ================= -->

    <div class="page-card">

        <h2>🔍 Information We Verify</h2>

        <p>

            Before an article is published, our editorial team
            attempts to verify the following information:

        </p>

        <ul>

            <li>Organization Name</li>

            <li>Post Name</li>

            <li>Total Vacancies</li>

            <li>Eligibility Criteria</li>

            <li>Age Limit</li>

            <li>Educational Qualification</li>

            <li>Application Dates</li>

            <li>Application Fees</li>

            <li>Selection Process</li>

            <li>Salary Details</li>

            <li>Official Notification PDF</li>

            <li>Official Apply Online Link</li>

            <li>Important Instructions</li>

        </ul>

    </div>