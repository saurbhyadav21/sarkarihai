@extends('layouts.front')

@section('content')


<style>
/*==========================================================
    SARKARIHAI.COM
    DMCA POLICY
    Premium CSS v2.0
    Part-1
==========================================================*/


/*==============================
        ROOT COLORS
==============================*/

:root{

    --primary:#0f4cdd;
    --primary-dark:#0b3eb2;
    --secondary:#1e88e5;

    --bg:#f5f8fc;
    --white:#ffffff;

    --text:#1e293b;
    --text-light:#64748b;

    --border:#e7edf5;

    --success:#16a34a;
    --danger:#dc2626;
    --warning:#f59e0b;

    --radius:18px;

    --shadow-sm:0 8px 24px rgba(15,76,221,.08);

    --shadow:0 20px 50px rgba(15,76,221,.12);

    --transition:.35s ease;

}


/*==============================
        BODY
==============================*/

body{

    background:var(--bg);

    color:var(--text);

    font-family:
    Inter,
    "Segoe UI",
    Roboto,
    sans-serif;

    font-size:16px;

    line-height:1.8;

}


/*==============================
        CONTAINER
==============================*/

.container{

    max-width:1240px;

}


/*==============================
        LINKS
==============================*/

a{

    color:var(--primary);

    text-decoration:none;

    transition:var(--transition);

}

a:hover{

    color:var(--primary-dark);

}


/*==============================
        HERO
==============================*/

.page-hero{

    position:relative;

    overflow:hidden;

    background:
    linear-gradient(
    135deg,
    #0f4cdd,
    #1f7fff);

    color:#fff;

    padding:85px 70px;

    border-radius:24px;

    margin-bottom:55px;

    box-shadow:var(--shadow);

}


/* decorative circles */

.page-hero:before{

    content:"";

    position:absolute;

    right:-80px;

    top:-80px;

    width:280px;

    height:280px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

}

.page-hero:after{

    content:"";

    position:absolute;

    left:-70px;

    bottom:-70px;

    width:210px;

    height:210px;

    border-radius:50%;

    background:rgba(255,255,255,.06);

}


/*==============================
        HERO TITLE
==============================*/

.page-hero h1{

    position:relative;

    z-index:2;

    font-size:54px;

    font-weight:800;

    letter-spacing:-1px;

    margin-bottom:22px;

}


/*==============================
        HERO TEXT
==============================*/

.page-hero p{

    position:relative;

    z-index:2;

    max-width:850px;

    font-size:19px;

    color:rgba(255,255,255,.92);

    line-height:1.9;

}


/*==============================
        BADGES
==============================*/

.author-badge{

    position:relative;

    z-index:2;

    display:inline-flex;

    align-items:center;

    gap:8px;

    margin:8px 8px 0 0;

    padding:12px 20px;

    border-radius:50px;

    background:rgba(255,255,255,.16);

    border:1px solid rgba(255,255,255,.20);

    backdrop-filter:blur(10px);

    color:#fff;

    font-size:14px;

    font-weight:600;

}


/*==============================
        PAGE CARD
==============================*/

.page-card{

    background:#fff;

    border-radius:22px;

    padding:45px;

    margin-bottom:35px;

    border:1px solid var(--border);

    box-shadow:var(--shadow-sm);

    transition:var(--transition);

}

.page-card:hover{

    transform:translateY(-4px);

    box-shadow:var(--shadow);

}


/*==============================
        HEADINGS
==============================*/

.page-card h2{

    font-size:34px;

    font-weight:800;

    margin-bottom:20px;

    color:#0f172a;

}

.page-card h3{

    font-size:26px;

    font-weight:700;

    margin-bottom:18px;

    color:#1e293b;

}

.page-card h4{

    font-size:22px;

    font-weight:700;

    margin-bottom:15px;

}


/*==============================
        PARAGRAPHS
==============================*/

.page-card p{

    color:var(--text-light);

    font-size:17px;

    line-height:2;

    margin-bottom:18px;

}


/*==============================
        STRONG
==============================*/

.page-card strong{

    color:#0f172a;

    font-weight:700;

}


/*==============================
        HORIZONTAL LINE
==============================*/

.page-card hr{

    border:none;

    border-top:1px solid var(--border);

    margin:35px 0;

}


/*==============================
        TEXT SELECTION
==============================*/

::selection{

    background:#0f4cdd;

    color:#fff;

}
/*==========================================================
    DMCA.CSS
    PART-2
    Cards • Lists • Timeline • Alerts
==========================================================*/


/*==============================
        FEATURE GRID
==============================*/

.feature-card{

    background:#fff;

    border:1px solid #e9eef6;

    border-radius:22px;

    padding:35px 28px;

    text-align:center;

    height:100%;

    transition:.35s;

    box-shadow:
    0 12px 30px rgba(15,76,221,.05);

}

.feature-card:hover{

    transform:translateY(-8px);

    box-shadow:
    0 25px 55px rgba(15,76,221,.15);

    border-color:#d7e6ff;

}

.feature-icon{

    width:78px;

    height:78px;

    margin:auto;

    margin-bottom:20px;

    border-radius:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;

    background:
    linear-gradient(135deg,#0f4cdd,#3fa2ff);

    color:#fff;

    box-shadow:
    0 18px 35px rgba(15,76,221,.25);

}

.feature-card h5{

    font-size:22px;

    font-weight:700;

    margin-bottom:15px;

    color:#111827;

}

.feature-card p{

    margin:0;

    color:#64748b;

    font-size:15px;

    line-height:1.9;

}


/*==============================
        LISTS
==============================*/

.page-card ul{

    margin:25px 0;

    padding:0;

    list-style:none;

}

.page-card ul li{

    position:relative;

    padding-left:38px;

    margin-bottom:18px;

    color:#475569;

    font-size:16px;

    line-height:1.9;

}

.page-card ul li:before{

    content:"✔";

    position:absolute;

    left:0;

    top:2px;

    width:24px;

    height:24px;

    border-radius:50%;

    background:#e8f3ff;

    color:#0f4cdd;

    font-size:13px;

    font-weight:700;

    display:flex;

    align-items:center;

    justify-content:center;

}


/*==============================
        INFO BOX
==============================*/

.info-box{

    margin-top:30px;

    padding:28px;

    border-radius:18px;

    background:

    linear-gradient(
    135deg,
    #eef5ff,
    #f8fbff);

    border-left:6px solid #0f4cdd;

    color:#334155;

    line-height:1.9;

    box-shadow:
    inset 0 1px 0 rgba(255,255,255,.7);

}


/*==============================
        ALERTS
==============================*/

.alert{

    margin-top:25px;

    border:none;

    border-radius:18px;

    padding:24px 28px;

    line-height:1.9;

    font-size:16px;

}

.alert-success{

    background:#edfdf3;

    color:#166534;

    border-left:6px solid #22c55e;

}

.alert-warning{

    background:#fff8eb;

    color:#9a6700;

    border-left:6px solid #f59e0b;

}

.alert-danger{

    background:#fff1f2;

    color:#b42318;

    border-left:6px solid #ef4444;

}

.alert-primary{

    background:#eef6ff;

    color:#0f4cdd;

    border-left:6px solid #0f4cdd;

}


/*==============================
        TIMELINE
==============================*/

.timeline{

    position:relative;

    margin-top:35px;

    padding-left:70px;

}

.timeline:before{

    content:"";

    position:absolute;

    left:24px;

    top:0;

    bottom:0;

    width:4px;

    border-radius:50px;

    background:
    linear-gradient(
    #0f4cdd,
    #5ab2ff);

}

.timeline-item{

    position:relative;

    padding-bottom:45px;

}

.timeline-item:last-child{

    padding-bottom:0;

}

.timeline-item:before{

    content:"";

    position:absolute;

    left:-56px;

    top:2px;

    width:28px;

    height:28px;

    border-radius:50%;

    background:#fff;

    border:6px solid #0f4cdd;

    box-shadow:
    0 0 0 6px rgba(15,76,221,.10);

}

.timeline-title{

    font-size:23px;

    font-weight:700;

    color:#0f172a;

    margin-bottom:10px;

}

.timeline p{

    color:#64748b;

    margin:0;

}


/*==============================
        QUOTE BOX
==============================*/

.quote-box{

    margin-top:30px;

    padding:35px;

    border-radius:18px;

    background:#f8fbff;

    border-left:6px solid #0f4cdd;

    font-size:18px;

    color:#475569;

    font-style:italic;

    line-height:1.9;

}


/*==============================
        SECTION GAP
==============================*/

.page-card+.page-card{

    margin-top:40px;

}
/*==========================================================
    DMCA.CSS
    PART-3
    Contact • FAQ • CTA • Buttons
==========================================================*/


/*=========================================
            CONTACT CARD
=========================================*/

.contact-card{

    background:#ffffff;

    border-radius:22px;

    padding:35px;

    border:1px solid #e8eef8;

    box-shadow:
        0 20px 45px rgba(0,0,0,.06);

}

.contact-card h3{

    font-size:28px;

    font-weight:700;

    margin-bottom:25px;

}

.contact-info{

    display:flex;

    align-items:center;

    gap:18px;

    padding:18px 0;

    border-bottom:1px solid #eef3f8;

}

.contact-info:last-child{

    border-bottom:none;

}

.contact-icon{

    width:65px;

    height:65px;

    flex-shrink:0;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(135deg,#0f4cdd,#53b2ff);

    color:#fff;

    font-size:28px;

    box-shadow:
    0 15px 30px rgba(15,76,221,.18);

}

.contact-title{

    font-size:15px;

    color:#64748b;

    margin-bottom:3px;

}

.contact-value{

    font-size:18px;

    font-weight:600;

    color:#111827;

}



/*=========================================
              ACCORDION
=========================================*/

.accordion{

    margin-top:25px;

}

.accordion-item{

    border:none;

    border-radius:18px !important;

    overflow:hidden;

    margin-bottom:18px;

    box-shadow:

        0 12px 28px rgba(0,0,0,.05);

}

.accordion-button{

    background:#fff;

    font-size:18px;

    font-weight:600;

    padding:22px 24px;

    color:#111827;

}

.accordion-button:not(.collapsed){

    background:#0f4cdd;

    color:#fff;

}

.accordion-button:focus{

    box-shadow:none;

}

.accordion-body{

    background:#ffffff;

    padding:22px 24px;

    color:#64748b;

    line-height:1.9;

}



/*=========================================
              CTA
=========================================*/

.page-cta{

    margin-top:60px;

    border-radius:24px;

    overflow:hidden;

    padding:70px 50px;

    text-align:center;

    background:

    linear-gradient(135deg,#0f4cdd,#2563eb,#38bdf8);

    color:#fff;

    position:relative;

}

.page-cta::before{

    content:"";

    position:absolute;

    width:300px;

    height:300px;

    border-radius:50%;

    background:rgba(255,255,255,.08);

    right:-100px;

    top:-100px;

}

.page-cta::after{

    content:"";

    position:absolute;

    width:240px;

    height:240px;

    border-radius:50%;

    background:rgba(255,255,255,.06);

    left:-80px;

    bottom:-80px;

}

.page-cta h2{

    position:relative;

    z-index:2;

    font-size:42px;

    font-weight:800;

    margin-bottom:18px;

}

.page-cta p{

    position:relative;

    z-index:2;

    font-size:18px;

    max-width:760px;

    margin:auto;

    line-height:1.9;

    color:rgba(255,255,255,.92);

}

.page-cta .btn{

    position:relative;

    z-index:2;

    margin-top:35px;

}



/*=========================================
             BUTTONS
=========================================*/

.btn-primary{

    background:#0f4cdd;

    border:none;

    padding:14px 32px;

    border-radius:50px;

    font-weight:600;

    transition:.35s;

}

.btn-primary:hover{

    background:#0b3eb2;

    transform:translateY(-3px);

}



.btn-light{

    padding:14px 34px;

    border-radius:50px;

    font-weight:700;

    transition:.35s;

}

.btn-light:hover{

    transform:translateY(-3px);

}



/*=========================================
         SMALL LABELS
=========================================*/

.badge-soft{

    display:inline-block;

    padding:8px 18px;

    border-radius:40px;

    background:#eef5ff;

    color:#0f4cdd;

    font-size:14px;

    font-weight:600;

}



/*=========================================
        HOVER EFFECTS
=========================================*/

.contact-card:hover{

    transform:translateY(-5px);

    transition:.35s;

}

.feature-card:hover .feature-icon{

    transform:rotate(8deg) scale(1.05);

}

.timeline-item:hover{

    transform:translateX(5px);

    transition:.3s;

}

.page-card{

    transition:.35s;

}
/*==========================================================
    DMCA.CSS
    PART-4
    Responsive + Animation + Polish
==========================================================*/


/*=========================================
        TABLET (992px)
=========================================*/

@media (max-width:992px){

.page-hero{

padding:60px 40px;

text-align:center;

}

.page-hero h1{

font-size:42px;

}

.page-hero p{

font-size:17px;

max-width:100%;

}

.page-card{

padding:35px;

}

.feature-card{

margin-bottom:25px;

}

.page-cta{

padding:55px 35px;

}

.page-cta h2{

font-size:34px;

}

}


/*=========================================
        MOBILE (768px)
=========================================*/

@media (max-width:768px){

.container{

padding-left:15px;

padding-right:15px;

}

/* HERO */

.page-hero{

padding:40px 25px;

border-radius:18px;

}

.page-hero h1{

font-size:32px;

line-height:1.3;

margin-bottom:18px;

}

.page-hero p{

font-size:15px;

line-height:1.8;

}

/* BADGES */

.author-badge{

display:inline-flex;

margin:6px 4px;

padding:10px 15px;

font-size:12px;

}

/* CARD */

.page-card{

padding:25px;

border-radius:18px;

margin-bottom:25px;

}

.page-card h2{

font-size:26px;

}

.page-card h3{

font-size:22px;

}

.page-card p{

font-size:15px;

line-height:1.8;

}

/* FEATURE */

.feature-card{

padding:25px;

}

.feature-icon{

width:65px;

height:65px;

font-size:28px;

}

.feature-card h5{

font-size:20px;

}

/* TIMELINE */

.timeline{

padding-left:35px;

}

.timeline:before{

left:10px;

}

.timeline-item:before{

left:-33px;

width:20px;

height:20px;

border-width:4px;

}

.timeline-title{

font-size:18px;

}

/* CONTACT */

.contact-info{

align-items:flex-start;

}

.contact-icon{

width:55px;

height:55px;

font-size:24px;

}

.contact-value{

font-size:16px;

}

/* CTA */

.page-cta{

padding:40px 20px;

}

.page-cta h2{

font-size:28px;

}

.page-cta p{

font-size:15px;

}

.page-cta .btn{

width:100%;

}

/* FAQ */

.accordion-button{

font-size:16px;

padding:18px;

}

}


/*=========================================
        SMALL MOBILE (480px)
=========================================*/

@media (max-width:480px){

.page-hero{

padding:35px 20px;

}

.page-hero h1{

font-size:28px;

}

.page-card{

padding:20px;

}

.page-card h2{

font-size:22px;

}

.page-card p{

font-size:14px;

}

.feature-card{

padding:20px;

}

.feature-icon{

width:58px;

height:58px;

font-size:24px;

}

.contact-icon{

width:48px;

height:48px;

font-size:20px;

}

.page-cta{

padding:35px 18px;

}

.page-cta h2{

font-size:24px;

}

.page-cta p{

font-size:14px;

}

}


/*=========================================
        IMAGE
=========================================*/

img{

max-width:100%;

height:auto;

display:block;

}


/*=========================================
        SCROLLBAR
=========================================*/

::-webkit-scrollbar{

width:10px;

}

::-webkit-scrollbar-thumb{

background:#0f4cdd;

border-radius:20px;

}

::-webkit-scrollbar-track{

background:#eef4fb;

}


/*=========================================
        SELECTION
=========================================*/

::selection{

background:#0f4cdd;

color:#fff;

}


/*=========================================
        SMOOTH SCROLL
=========================================*/

html{

scroll-behavior:smooth;

}


/*=========================================
        FADE ANIMATION
=========================================*/

@keyframes fadeUp{

0%{

opacity:0;

transform:translateY(25px);

}

100%{

opacity:1;

transform:translateY(0);

}

}

.page-card{

animation:fadeUp .5s ease;

}


/*=========================================
        ICON ANIMATION
=========================================*/

.feature-icon{

transition:.35s;

}

.feature-card:hover .feature-icon{

transform:rotate(10deg) scale(1.08);

}


/*=========================================
        BUTTON EFFECT
=========================================*/

.btn{

transition:.35s;

}

.btn:hover{

transform:translateY(-3px);

box-shadow:0 12px 25px rgba(0,0,0,.18);

}


/*=========================================
        CARD EFFECT
=========================================*/

.page-card,
.feature-card,
.contact-card{

transition:.35s;

}

.page-card:hover,
.feature-card:hover,
.contact-card:hover{

transform:translateY(-5px);

}


/*=========================================
        PRINT MODE
=========================================*/

@media print{

.page-hero{

background:#fff !important;

color:#000 !important;

box-shadow:none;

}

.page-cta{

display:none;

}

body{

background:#fff;

}

}
</style>
<div class="container py-5">

    <!-- ================= HERO ================= -->

    <div class="page-hero">

        <h1>DMCA Policy</h1>

        <p>

            SarkariHai.com respects the intellectual property rights of others
            and complies with applicable copyright laws. If you believe that
            any content available on our website infringes your copyright,
            you may submit a copyright infringement notice to us for review.

        </p>

        <div class="mt-4">

            <span class="author-badge">
                © Copyright Protection
            </span>

            <span class="author-badge">
                ⚖️ Legal Compliance
            </span>

            <span class="author-badge">
                📅 Last Updated: {{ now()->format('d F Y') }}
            </span>

        </div>

    </div>



    <!-- ================= DMCA HIGHLIGHTS ================= -->

    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">🛡️</div>

                <h5>Copyright Respect</h5>

                <p>

                    We respect the intellectual property rights
                    of all content owners.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">📧</div>

                <h5>Easy Reporting</h5>

                <p>

                    Copyright owners can easily report
                    infringement by contacting us.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">⚖️</div>

                <h5>Fair Review</h5>

                <p>

                    Every complaint is reviewed carefully
                    before any action is taken.

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="feature-card">

                <div class="feature-icon">✅</div>

                <h5>Quick Action</h5>

                <p>

                    Valid copyright complaints are handled
                    promptly after verification.

                </p>

            </div>

        </div>

    </div>



    <!-- ================= WHAT IS DMCA ================= -->

    <div class="page-card">

        <h2>📚 What is DMCA?</h2>

        <p>

            The Digital Millennium Copyright Act (DMCA) is a copyright law
            designed to protect original works published online.

        </p>

        <p>

            If a copyright owner believes that material available on
            SarkariHai.com infringes their copyright, they may send us
            a proper copyright infringement notice for review.

        </p>

        <div class="info-box">

            We review every copyright complaint carefully and,
            where appropriate, remove or disable access to
            infringing material.

        </div>

    </div>



    <!-- ================= OUR COPYRIGHT POLICY ================= -->

    <div class="page-card">

        <h2>📜 Our Copyright Policy</h2>

        <p>

            SarkariHai.com publishes educational and informational
            content related to Government Jobs, Results,
            Admit Cards, Admissions and Competitive Exams.

        </p>

        <p>

            We make every reasonable effort to ensure that
            our published content does not intentionally
            violate the copyrights of others.

        </p>

        <ul>

            <li>Original editorial content is created by our team.</li>

            <li>Government notifications are summarized for educational purposes.</li>

            <li>Official websites are referenced wherever appropriate.</li>

            <li>Copyrighted material is not intentionally reproduced.</li>

            <li>Any valid complaint is investigated promptly.</li>

        </ul>

    </div>



    <!-- ================= OUR COMMITMENT ================= -->

    <div class="page-card">

        <h2>🤝 Our Commitment</h2>

        <p>

            SarkariHai.com is committed to maintaining a transparent,
            responsible and legally compliant publishing environment.

        </p>

        <p>

            If any copyright owner believes that content appearing
            on our website infringes their rights,
            we encourage them to contact us immediately
            so that the matter can be reviewed.

        </p>

        <div class="alert alert-success">

            We believe that protecting intellectual property
            benefits creators, publishers and users alike.

        </div>

    </div>
        <!-- ======================================================
        HOW TO REPORT COPYRIGHT INFRINGEMENT
    ======================================================= -->

    <div class="page-card">

        <h2>📩 How to Report Copyright Infringement</h2>

        <p>

            If you believe that any content available on
            <strong>SarkariHai.com</strong> infringes your copyright,
            you may send us a written DMCA notice by email.

        </p>

        <p>

            Every complaint is reviewed carefully before any action
            is taken.

        </p>

        <div class="info-box">

            Email:
            <strong>official.sarkarihai@gmail.com</strong>

        </div>

    </div>



    <!-- ======================================================
        REQUIRED INFORMATION
    ======================================================= -->

    <div class="page-card">

        <h2>📋 Information Required in Your DMCA Notice</h2>

        <p>

            To help us process your request quickly,
            please include the following information:

        </p>

        <ul>

            <li>Your full name.</li>

            <li>Your contact email address.</li>

            <li>Your organization (if applicable).</li>

            <li>URL of the copyrighted work.</li>

            <li>URL of the allegedly infringing page on SarkariHai.com.</li>

            <li>Description of the copyrighted material.</li>

            <li>A statement that you believe the use is unauthorized.</li>

            <li>A statement that the information is accurate.</li>

            <li>Your electronic or physical signature.</li>

        </ul>

    </div>



    <!-- ======================================================
        TAKEDOWN PROCESS
    ======================================================= -->

    <div class="page-card">

        <h2>⚖️ Copyright Review & Takedown Process</h2>

        <p>

            Once a valid copyright complaint is received,
            our editorial team follows these steps:

        </p>

        <div class="timeline">

            <div class="timeline-item">

                <div class="timeline-title">

                    Step 1 — Complaint Received

                </div>

                <p>

                    We acknowledge the complaint and begin verification.

                </p>

            </div>


            <div class="timeline-item">

                <div class="timeline-title">

                    Step 2 — Verification

                </div>

                <p>

                    The reported content is reviewed against
                    the submitted copyright information.

                </p>

            </div>


            <div class="timeline-item">

                <div class="timeline-title">

                    Step 3 — Decision

                </div>

                <p>

                    If infringement is confirmed,
                    the content may be removed,
                    updated or disabled.

                </p>

            </div>


            <div class="timeline-item">

                <div class="timeline-title">

                    Step 4 — Notification

                </div>

                <p>

                    The complainant may be informed
                    regarding the action taken.

                </p>

            </div>

        </div>

    </div>



    <!-- ======================================================
        COUNTER NOTICE
    ======================================================= -->

    <div class="page-card">

        <h2>📝 Counter Notification</h2>

        <p>

            If you believe that your content has been removed
            due to a mistake or misidentification,
            you may submit a counter notification.

        </p>

        <p>

            Your counter notice should clearly explain
            why you believe the material was removed
            incorrectly and include supporting information.

        </p>

        <div class="alert alert-warning">

            Submission of a false counter notification
            may have legal consequences.

        </div>

    </div>



    <!-- ======================================================
        REPEAT INFRINGER POLICY
    ======================================================= -->

    <div class="page-card">

        <h2>🚫 Repeat Infringer Policy</h2>

        <p>

            SarkariHai.com reserves the right to remove,
            restrict or permanently disable content
            submitted by repeat copyright infringers
            where applicable.

        </p>

        <p>

            We take repeated copyright violations seriously
            and may refuse future publication requests
            from individuals who repeatedly violate
            intellectual property rights.

        </p>

    </div>



    <!-- ======================================================
        FALSE CLAIMS
    ======================================================= -->

    <div class="page-card">

        <h2>⚠ False Claims</h2>

        <p>

            Knowingly submitting false copyright claims
            or misleading information may violate applicable laws.

        </p>

        <p>

            We reserve the right to reject complaints
            that are incomplete, misleading,
            fraudulent or unsupported by sufficient evidence.

        </p>

        <div class="alert alert-danger">

            Please ensure that all information submitted
            in your DMCA notice is truthful and accurate.

        </div>

    </div>
        <!-- ======================================================
        CONTACT INFORMATION
    ======================================================= -->

    <div class="page-card">

        <h2>📞 Contact for Copyright Issues</h2>

        <p>

            If you have any copyright-related concerns or wish to submit
            a DMCA notice, you may contact us using the details below.

        </p>

        <div class="contact-card mt-4">

            <div class="contact-info">

                <div class="contact-icon">📧</div>

                <div>

                    <strong>Email Address</strong><br>

                    official.sarkarihai@gmail.com

                </div>

            </div>

            <div class="contact-info">

                <div class="contact-icon">🌐</div>

                <div>

                    <strong>Website</strong><br>

                    https://sarkarihai.com

                </div>

            </div>

            <div class="contact-info">

                <div class="contact-icon">⏰</div>

                <div>

                    <strong>Response Time</strong><br>

                    Usually within 2–5 Business Days

                </div>

            </div>

        </div>

    </div>



    <!-- ======================================================
        HINDI VERSION
    ======================================================= -->

    <div class="page-card">

        <h2>🇮🇳 DMCA नीति (कॉपीराइट नीति)</h2>

        <p>

            SarkariHai.com दूसरों के बौद्धिक संपदा (Intellectual Property)
            अधिकारों का सम्मान करता है।

        </p>

        <p>

            यदि आपको लगता है कि हमारी वेबसाइट पर उपलब्ध कोई सामग्री
            आपके कॉपीराइट का उल्लंघन करती है,
            तो आप हमें ईमेल के माध्यम से सूचित कर सकते हैं।

        </p>

        <ul>

            <li>आधिकारिक शिकायत भेजें।</li>

            <li>कॉपीराइट सामग्री का विवरण दें।</li>

            <li>संबंधित URL साझा करें।</li>

            <li>अपनी संपर्क जानकारी प्रदान करें।</li>

            <li>हम शिकायत की समीक्षा करेंगे।</li>

            <li>आवश्यक होने पर सामग्री हटाई या संशोधित की जाएगी।</li>

        </ul>

        <div class="alert alert-primary">

            हमारा उद्देश्य कॉपीराइट धारकों के अधिकारों का सम्मान करना
            तथा उचित शिकायतों पर शीघ्र कार्रवाई करना है।

        </div>

    </div>



    <!-- ======================================================
        FAQ
    ======================================================= -->

    <div class="page-card">

        <h2>❓ Frequently Asked Questions</h2>

        <div class="accordion" id="dmcaFaq">

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                        How do I report copyright infringement?

                    </button>

                </h2>

                <div id="faq1"
                     class="accordion-collapse collapse show"
                     data-bs-parent="#dmcaFaq">

                    <div class="accordion-body">

                        Send your DMCA notice to
                        <strong>official.sarkarihai@gmail.com</strong>
                        with all required information.

                    </div>

                </div>

            </div>



            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                        How long does the review take?

                    </button>

                </h2>

                <div id="faq2"
                     class="accordion-collapse collapse"
                     data-bs-parent="#dmcaFaq">

                    <div class="accordion-body">

                        Most valid copyright complaints are reviewed
                        within a few business days.

                    </div>

                </div>

            </div>



            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                        Can I submit a counter notification?

                    </button>

                </h2>

                <div id="faq3"
                     class="accordion-collapse collapse"
                     data-bs-parent="#dmcaFaq">

                    <div class="accordion-body">

                        Yes.
                        If you believe your content was removed
                        due to an error,
                        you may submit a counter notification.

                    </div>

                </div>

            </div>



            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq4">

                        Does SarkariHai intentionally publish copyrighted content?

                    </button>

                </h2>

                <div id="faq4"
                     class="accordion-collapse collapse"
                     data-bs-parent="#dmcaFaq">

                    <div class="accordion-body">

                        No.
                        We make every reasonable effort to publish
                        original editorial content and summarize
                        official Government notifications responsibly.

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ======================================================
        CTA
    ======================================================= -->

    <div class="page-cta">

        <h2>

            Respecting Copyright & Intellectual Property

        </h2>

        <p>

            SarkariHai.com believes in responsible publishing,
            transparency and protecting intellectual property rights.

        </p>

        <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">

            Contact Us

        </a>

    </div>

</div>

@endsection


