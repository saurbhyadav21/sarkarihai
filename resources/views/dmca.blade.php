@extends('layouts.front')

@section('content')


<style>
    /*==========================================================
    DMCA PAGE EXTRA CSS
==========================================================*/

/* DMCA Hero */
.page-hero{

    background:linear-gradient(135deg,#0d47a1,#1976d2);

}


/* Contact Card */

.contact-card{

    background:#f8fbff;

    border:1px solid #e6eefb;

    border-radius:18px;

    padding:25px;

}

.contact-info{

    display:flex;

    align-items:center;

    gap:18px;

    padding:18px 0;

    border-bottom:1px solid #edf2f7;

}

.contact-info:last-child{

    border-bottom:none;

}

.contact-icon{

    width:58px;

    height:58px;

    border-radius:50%;

    background:#0d6efd;

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:24px;

    flex-shrink:0;

}


/* CTA */

.page-cta{

    background:linear-gradient(135deg,#0d6efd,#0dcaf0);

    color:#fff;

    text-align:center;

    padding:55px;

    border-radius:18px;

    margin-top:45px;

}

.page-cta h2{

    font-size:34px;

    font-weight:700;

    margin-bottom:15px;

}

.page-cta p{

    font-size:18px;

    max-width:750px;

    margin:0 auto 30px;

    line-height:1.8;

}

.page-cta .btn{

    padding:14px 36px;

    border-radius:30px;

    font-weight:600;

}


/* FAQ */

.accordion-item{

    border:1px solid #e9edf5;

    border-radius:12px !important;

    overflow:hidden;

    margin-bottom:15px;

}

.accordion-button{

    font-weight:600;

    padding:18px 20px;

}

.accordion-button:not(.collapsed){

    background:#eef6ff;

    color:#0d47a1;

    box-shadow:none;

}

.accordion-button:focus{

    box-shadow:none;

}


/* Mobile */

@media(max-width:768px){

.page-hero{

padding:45px 25px;

}

.page-hero h1{

font-size:32px;

}

.page-card{

padding:22px;

}

.page-cta{

padding:40px 20px;

}

.page-cta h2{

font-size:26px;

}

.contact-info{

align-items:flex-start;

}

}
/*==========================================================
    RESPONSIVE CSS
    Static Pages
==========================================================*/


/*======================
        Tablet
======================*/

@media (max-width:992px){

.page-hero{

padding:55px 35px;

text-align:center;

}

.page-hero h1{

font-size:38px;

}

.page-hero p{

font-size:17px;

}

.page-card{

padding:30px;

}

.feature-card{

margin-bottom:25px;

}

.author-meta{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:15px;

}

.contact-card{

margin-top:25px;

}

.page-cta{

padding:45px 30px;

}

.page-cta h2{

font-size:30px;

}

}


/*======================
        Mobile
======================*/

@media (max-width:768px){

.container{

padding-left:15px;

padding-right:15px;

}

.page-hero{

padding:40px 22px;

border-radius:15px;

}

.page-hero h1{

font-size:30px;

line-height:1.3;

}

.page-hero p{

font-size:15px;

line-height:1.8;

}

.author-badge{

display:inline-block;

margin:5px 4px;

font-size:13px;

padding:8px 14px;

}

.page-card{

padding:22px;

border-radius:15px;

margin-bottom:25px;

}

.page-card h2{

font-size:25px;

}

.page-card h3{

font-size:21px;

}

.page-card p{

font-size:15px;

line-height:1.9;

}

.page-card li{

font-size:15px;

line-height:1.8;

}

.feature-card{

padding:22px;

margin-bottom:20px;

}

.feature-icon{

width:65px;

height:65px;

font-size:28px;

}

.contact-info{

flex-direction:row;

align-items:flex-start;

gap:15px;

}

.contact-icon{

width:50px;

height:50px;

font-size:22px;

}

.timeline{

padding-left:28px;

}

.timeline:before{

left:10px;

}

.timeline-item:before{

left:-23px;

width:16px;

height:16px;

}

.timeline-title{

font-size:18px;

}

.author-meta{

grid-template-columns:1fr;

}

.info-box{

padding:18px;

font-size:15px;

}

.alert{

padding:16px;

font-size:15px;

}

.page-cta{

padding:35px 20px;

border-radius:15px;

}

.page-cta h2{

font-size:25px;

}

.page-cta p{

font-size:15px;

}

.page-cta .btn{

width:100%;

margin-top:10px;

}

.accordion-button{

font-size:15px;

padding:16px;

}

.table-responsive{

overflow-x:auto;

}

.check-table{

min-width:650px;

}

}


/*======================
      Small Mobile
======================*/

@media (max-width:480px){

.page-hero{

padding:35px 18px;

}

.page-hero h1{

font-size:26px;

}

.page-card{

padding:18px;

}

.page-card h2{

font-size:22px;

}

.page-card p{

font-size:14px;

}

.feature-card{

padding:18px;

}

.feature-icon{

width:58px;

height:58px;

font-size:24px;

}

.author-badge{

font-size:12px;

padding:7px 12px;

}

.contact-icon{

width:45px;

height:45px;

font-size:20px;

}

.page-cta{

padding:30px 18px;

}

.page-cta h2{

font-size:22px;

}

.page-cta p{

font-size:14px;

}

}


/*======================
      Image Responsive
======================*/

img{

max-width:100%;

height:auto;

display:block;

}


/*======================
      Smooth Scroll
======================*/

html{

scroll-behavior:smooth;

}


/*======================
      Selection
======================*/

::selection{

background:#0d6efd;

color:#fff;

}

/*==========================================================
    DMCA.CSS
    PART-2
==========================================================*/

/*==========================
      TIMELINE
==========================*/

.timeline{

    position:relative;

    margin-top:30px;

    padding-left:45px;

}

.timeline:before{

    content:"";

    position:absolute;

    left:15px;

    top:0;

    bottom:0;

    width:4px;

    background:linear-gradient(180deg,#0d6efd,#00c6ff);

    border-radius:20px;

}

.timeline-item{

    position:relative;

    padding-bottom:35px;

}

.timeline-item:last-child{

    padding-bottom:0;

}

.timeline-item:before{

    content:"";

    position:absolute;

    left:-37px;

    top:5px;

    width:20px;

    height:20px;

    border-radius:50%;

    background:#0d6efd;

    border:4px solid #fff;

    box-shadow:0 0 0 5px rgba(13,110,253,.15);

}

.timeline-title{

    font-size:21px;

    font-weight:700;

    color:#0d47a1;

    margin-bottom:12px;

}

.timeline p{

    color:#555;

    line-height:1.9;

}


/*==========================
        INFO BOX
==========================*/

.info-box{

    margin-top:25px;

    background:#eef6ff;

    border-left:5px solid #0d6efd;

    padding:20px 25px;

    border-radius:12px;

    color:#084298;

    line-height:1.8;

}


/*==========================
        ALERTS
==========================*/

.alert{

    border:none;

    border-radius:12px;

    padding:18px 22px;

    margin-top:25px;

    line-height:1.8;

}

.alert-success{

    background:#e9f8ef;

    color:#146c43;

}

.alert-warning{

    background:#fff4db;

    color:#8a6d3b;

}

.alert-danger{

    background:#fdecec;

    color:#842029;

}

.alert-primary{

    background:#eef5ff;

    color:#084298;

}


/*==========================
        CONTACT CARD
==========================*/

.contact-card{

    background:#fff;

    border-radius:18px;

    border:1px solid #edf2f7;

    padding:25px;

    box-shadow:0 10px 25px rgba(0,0,0,.05);

}

.contact-info{

    display:flex;

    align-items:center;

    gap:18px;

    padding:18px 0;

    border-bottom:1px solid #edf2f7;

}

.contact-info:last-child{

    border-bottom:none;

}

.contact-icon{

    width:58px;

    height:58px;

    border-radius:50%;

    background:#0d6efd;

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:24px;

    flex-shrink:0;

}


/*==========================
            FAQ
==========================*/

.accordion-item{

    border:1px solid #e9edf5;

    border-radius:12px !important;

    overflow:hidden;

    margin-bottom:15px;

}

.accordion-button{

    padding:18px 20px;

    font-size:17px;

    font-weight:600;

    background:#fff;

}

.accordion-button:not(.collapsed){

    background:#eef6ff;

    color:#0d47a1;

    box-shadow:none;

}

.accordion-button:focus{

    box-shadow:none;

}

.accordion-body{

    padding:20px;

    line-height:1.9;

    color:#555;

}


/*==========================
            CTA
==========================*/

.page-cta{

    margin-top:50px;

    background:linear-gradient(135deg,#0d6efd,#0dcaf0);

    border-radius:18px;

    color:#fff;

    text-align:center;

    padding:55px 35px;

}

.page-cta h2{

    font-size:34px;

    font-weight:700;

    margin-bottom:15px;

}

.page-cta p{

    max-width:760px;

    margin:auto;

    margin-bottom:30px;

    line-height:1.9;

    font-size:18px;

}

.page-cta .btn{

    border-radius:35px;

    padding:14px 35px;

    font-weight:700;

}


/*==========================
      HOVER EFFECTS
==========================*/

.page-card{

    transition:.35s;

}

.page-card:hover{

    transform:translateY(-3px);

    box-shadow:0 20px 45px rgba(0,0,0,.08);

}

.contact-card:hover{

    transform:translateY(-3px);

}

.feature-card:hover{

    transform:translateY(-6px);

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


