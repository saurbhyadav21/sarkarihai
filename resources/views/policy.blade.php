@extends('layouts.front')
<style>
    /*==========================================================
    FACT CHECKING POLICY
    CSS PART-1
    SarkariHai.com
==========================================================*/

    body {

        background: #f5f7fb;

        font-family: 'Segoe UI', sans-serif;

        color: #333;

    }


    /*================ HERO =================*/

    .page-hero {

        background: linear-gradient(135deg, #0d6efd, #0052cc);

        color: #fff;

        padding: 70px 60px;

        border-radius: 18px;

        text-align: center;

        margin-bottom: 45px;

        box-shadow: 0 20px 45px rgba(0, 0, 0, .12);

        position: relative;

        overflow: hidden;

    }

    .page-hero:before {

        content: "";

        position: absolute;

        width: 220px;

        height: 220px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .08);

        top: -70px;

        right: -70px;

    }

    .page-hero:after {

        content: "";

        position: absolute;

        width: 170px;

        height: 170px;

        border-radius: 50%;

        background: rgba(255, 255, 255, .05);

        left: -60px;

        bottom: -60px;

    }

    .page-hero h1 {

        font-size: 46px;

        font-weight: 800;

        margin-bottom: 20px;

    }

    .page-hero p {

        max-width: 850px;

        margin: auto;

        font-size: 18px;

        line-height: 1.9;

    }


    /*================ BADGES =================*/

    .author-badge {

        display: inline-block;

        padding: 10px 18px;

        margin: 6px;

        border-radius: 30px;

        background: rgba(255, 255, 255, .18);

        backdrop-filter: blur(10px);

        color: #fff;

        font-weight: 600;

    }


    /*================ CARD =================*/

    .page-card {

        background: #fff;

        padding: 35px;

        border-radius: 16px;

        margin-bottom: 35px;

        box-shadow: 0 10px 30px rgba(0, 0, 0, .06);

        border: 1px solid #edf2f7;

        transition: .35s;

    }

    .page-card:hover {

        transform: translateY(-4px);

        box-shadow: 0 18px 45px rgba(0, 0, 0, .08);

    }

    .page-card h2 {

        font-size: 30px;

        font-weight: 800;

        color: #0d47a1;

        margin-bottom: 20px;

    }

    .page-card p {

        color: #555;

        font-size: 16px;

        line-height: 1.9;

    }

    .page-card ul {

        padding-left: 22px;

    }

    .page-card li {

        margin-bottom: 12px;

        line-height: 1.8;

    }


    /*================ FEATURE =================*/

    .feature-card {

        background: #fff;

        border-radius: 16px;

        padding: 30px;

        height: 100%;

        text-align: center;

        border: 1px solid #edf2f7;

        transition: .35s;

    }

    .feature-card:hover {

        transform: translateY(-6px);

        box-shadow: 0 18px 35px rgba(0, 0, 0, .08);

    }

    .feature-icon {

        width: 80px;

        height: 80px;

        margin: auto;

        border-radius: 50%;

        background: #edf5ff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 36px;

        margin-bottom: 18px;

    }

    .feature-card h5 {

        font-size: 21px;

        font-weight: 700;

        margin-bottom: 15px;

    }

    .feature-card p {

        color: #666;

        line-height: 1.8;

        margin: 0;

    }


    /*================ INFO BOX =================*/

    .info-box {

        background: #eef6ff;

        border-left: 5px solid #0d6efd;

        border-radius: 12px;

        padding: 20px;

        margin-top: 25px;

        line-height: 1.8;

    }


    /*================ ALERT =================*/

    .alert {

        border: none;

        border-radius: 12px;

        padding: 18px 22px;

    }

    .alert-success {

        background: #eaf8ef;

        color: #146c43;

    }

    .alert-warning {

        background: #fff8df;

        color: #856404;

    }

    .alert-danger {

        background: #fdecec;

        color: #842029;

    }

    .alert-primary {

        background: #eef5ff;

        color: #084298;

    }


    /*================ LIST =================*/

    .page-card ul li {

        position: relative;

        padding-left: 6px;

    }

    .page-card ul li::marker {

        color: #0d6efd;

    }


    /*================ TITLE =================*/

    .section-title {

        font-size: 34px;

        font-weight: 800;

        margin-bottom: 30px;

        color: #0d47a1;

    }

    /*==========================================================
    FACT CHECKING POLICY
    CSS PART-2
==========================================================*/


    /*========================
        TIMELINE
========================*/

    .timeline {

        position: relative;

        margin-top: 30px;

        padding-left: 45px;

    }

    .timeline:before {

        content: "";

        position: absolute;

        left: 14px;

        top: 0;

        bottom: 0;

        width: 4px;

        background: linear-gradient(#0d6efd, #0dcaf0);

        border-radius: 20px;

    }

    .timeline-item {

        position: relative;

        padding-bottom: 35px;

    }

    .timeline-item:last-child {

        padding-bottom: 0;

    }

    .timeline-item:before {

        content: "";

        position: absolute;

        left: -38px;

        top: 6px;

        width: 20px;

        height: 20px;

        border-radius: 50%;

        background: #0d6efd;

        border: 4px solid #fff;

        box-shadow: 0 0 0 4px rgba(13, 110, 253, .15);

    }

    .timeline-title {

        font-size: 22px;

        font-weight: 700;

        color: #0d47a1;

        margin-bottom: 12px;

    }

    .timeline p {

        color: #555;

        line-height: 1.9;

        margin: 0;

    }


    /*========================
      ICON LIST
========================*/

    .icon-list {

        list-style: none;

        padding: 0;

        margin: 0;

    }

    .icon-list li {

        display: flex;

        align-items: flex-start;

        gap: 12px;

        margin-bottom: 16px;

        line-height: 1.8;

    }

    .icon-list i {

        color: #0d6efd;

        font-size: 18px;

        margin-top: 4px;

    }


    /*========================
      INFO BOX
========================*/

    .info-box {

        margin-top: 25px;

        padding: 20px;

        background: #eef6ff;

        border-left: 5px solid #0d6efd;

        border-radius: 12px;

        color: #084298;

        line-height: 1.9;

    }


    /*========================
       ALERTS
========================*/

    .alert {

        border: none;

        border-radius: 12px;

        padding: 20px;

        line-height: 1.9;

        margin-top: 25px;

    }

    .alert-success {

        background: #e9f8ef;

    }

    .alert-warning {

        background: #fff8df;

    }

    .alert-danger {

        background: #fdecec;

    }

    .alert-primary {

        background: #eef5ff;

    }


    /*========================
       STEP CARD
========================*/

    .step-card {

        background: #fff;

        border: 1px solid #edf2f7;

        border-radius: 15px;

        padding: 25px;

        height: 100%;

        transition: .3s;

    }

    .step-card:hover {

        transform: translateY(-5px);

        box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

    }

    .step-number {

        width: 55px;

        height: 55px;

        border-radius: 50%;

        background: #0d6efd;

        color: #fff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 22px;

        font-weight: 700;

        margin-bottom: 20px;

    }

    .step-card h4 {

        font-size: 22px;

        font-weight: 700;

        margin-bottom: 12px;

    }

    .step-card p {

        color: #666;

        line-height: 1.8;

    }


    /*========================
      CHECK TABLE
========================*/

    .check-table {

        width: 100%;

        border-collapse: collapse;

        margin-top: 25px;

    }

    .check-table th {

        background: #0d6efd;

        color: #fff;

        padding: 16px;

        text-align: left;

    }

    .check-table td {

        padding: 16px;

        border-bottom: 1px solid #edf2f7;

    }

    .check-table tr:hover {

        background: #f8fbff;

    }


    /*========================
      BLOCKQUOTE
========================*/

    .quote-box {

        background: #f8fbff;

        border-left: 5px solid #0d6efd;

        padding: 25px;

        border-radius: 12px;

        font-style: italic;

        color: #555;

        margin-top: 25px;

    }


    /*========================
       RESPONSIVE
========================*/

    @media(max-width:768px) {

        .timeline {

            padding-left: 30px;

        }

        .timeline:before {

            left: 8px;

        }

        .timeline-item:before {

            left: -28px;

            width: 16px;

            height: 16px;

        }

        .timeline-title {

            font-size: 19px;

        }

        .check-table {

            display: block;

            overflow-x: auto;

            white-space: nowrap;

        }

        .step-card {

            margin-bottom: 20px;

        }

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
        <!-- ================= VERIFICATION PROCESS ================= -->

        <div class="page-card">

            <h2>🔍 Our Verification Process</h2>

            <p>

                Before any Government Job, Result, Admit Card or Admission article
                is published on SarkariHai.com, our editorial team follows a
                structured verification process to ensure the information is as
                accurate and reliable as possible.

            </p>

            <div class="timeline">

                <div class="timeline-item">

                    <div class="timeline-title">
                        Step 1 — Collect Official Information
                    </div>

                    <p>

                        We obtain information from official recruitment notifications,
                        Government department websites, public commissions,
                        universities or authorized recruitment boards.

                    </p>

                </div>

                <div class="timeline-item">

                    <div class="timeline-title">
                        Step 2 — Cross Verification
                    </div>

                    <p>

                        Important details like vacancies, eligibility,
                        application dates, age limit, fees and selection
                        process are verified from multiple official sources
                        whenever available.

                    </p>

                </div>

                <div class="timeline-item">

                    <div class="timeline-title">
                        Step 3 — Editorial Review
                    </div>

                    <p>

                        Every article is reviewed before publication to
                        minimize factual errors and improve readability.

                    </p>

                </div>

                <div class="timeline-item">

                    <div class="timeline-title">
                        Step 4 — Continuous Monitoring
                    </div>

                    <p>

                        Whenever Government authorities release corrigendums,
                        revised notifications or important updates,
                        our published articles are updated accordingly.

                    </p>

                </div>

            </div>

        </div>



        <!-- ================= EDITORIAL REVIEW ================= -->

        <div class="page-card">

            <h2>📝 Editorial Review Process</h2>

            <p>

                Our editorial team carefully reviews every article before
                publishing it to ensure clarity, accuracy and consistency.

            </p>

            <ul>

                <li>Grammar and language review.</li>

                <li>Official notification verification.</li>

                <li>Eligibility confirmation.</li>

                <li>Date verification.</li>

                <li>Official website verification.</li>

                <li>Application link verification.</li>

                <li>Duplicate content review.</li>

                <li>SEO quality review.</li>

            </ul>

            <div class="info-box">

                Every article is intended to simplify official notifications
                while preserving their original meaning.

            </div>

        </div>



        <!-- ================= AI POLICY ================= -->

        <div class="page-card">

            <h2>🤖 AI Content Policy</h2>

            <p>

                SarkariHai.com may use Artificial Intelligence (AI)
                tools to assist with drafting, formatting or improving
                readability of content.

            </p>

            <p>

                However, AI-generated content is never published
                automatically without human verification.

            </p>

            <ul>

                <li>Every article is reviewed by a human editor.</li>

                <li>Official notifications remain the primary source.</li>

                <li>AI is used only as an assisting tool.</li>

                <li>Final responsibility always remains with our editorial team.</li>

            </ul>

            <div class="alert alert-warning">

                Users should always refer to the official notification
                before making any decision.

            </div>

        </div>



        <!-- ================= CONTENT UPDATE ================= -->

        <div class="page-card">

            <h2>🔄 Content Update Policy</h2>

            <p>

                Recruitment notifications frequently receive updates,
                corrigendums and revised schedules.

            </p>

            <p>

                Whenever official authorities release updated
                information, we attempt to update our content
                as soon as reasonably possible.

            </p>

            <ul>

                <li>Application Date Changes</li>

                <li>Exam Date Changes</li>

                <li>Vacancy Revisions</li>

                <li>Eligibility Updates</li>

                <li>Official Notice Corrections</li>

                <li>Result & Admit Card Updates</li>

            </ul>

        </div>



        <!-- ================= CORRECTION POLICY ================= -->

        <div class="page-card">

            <h2>✍ Correction Policy</h2>

            <p>

                Despite our best efforts, unintentional errors may occasionally occur.

            </p>

            <p>

                If a factual error is identified by our editorial team,
                official authorities or users, we verify the issue and
                correct the article as quickly as possible.

            </p>

            <div class="alert alert-success">

                We appreciate users who report factual inaccuracies
                through our Contact Us page or official email.

            </div>

        </div>



        <!-- ================= TRANSPARENCY ================= -->

        <div class="page-card">

            <h2>🛡 Transparency Policy</h2>

            <p>

                We believe transparency is essential for building trust.

            </p>

            <p>

                Whenever significant corrections or updates are made,
                the article is revised to reflect the latest verified information.

            </p>

            <ul>

                <li>Information sourced from official authorities.</li>

                <li>No intentionally misleading content.</li>

                <li>No fake recruitment announcements.</li>

                <li>Clear distinction between facts and editorial explanations.</li>

            </ul>

        </div>
        <!-- =======================================================
        CONTACT & REPORT CORRECTIONS
    ======================================================= -->

        <div class="page-card">

            <h2>📩 Report an Error or Suggest a Correction</h2>

            <p>

                SarkariHai.com values feedback from its readers.
                If you notice any factual error, outdated information,
                broken official link, or incorrect recruitment details,
                please inform us.

            </p>

            <p>

                Every correction request is reviewed by our editorial team.
                Verified errors are corrected as quickly as possible.

            </p>

            <div class="contact-card mt-4">

                <div class="contact-info">

                    <div class="contact-icon">
                        📧
                    </div>

                    <div>

                        <strong>Email</strong><br>

                        official.sarkarihai@gmail.com

                    </div>

                </div>

                <div class="contact-info">

                    <div class="contact-icon">
                        🌐
                    </div>

                    <div>

                        <strong>Website</strong><br>

                        https://sarkarihai.com

                    </div>

                </div>

            </div>

        </div>



        <!-- =======================================================
        HINDI VERSION
    ======================================================= -->

        <div class="page-card">

            <h2>🇮🇳 तथ्य जांच नीति</h2>

            <p>

                SarkariHai.com पर प्रकाशित प्रत्येक सरकारी नौकरी,
                एडमिट कार्ड, रिजल्ट, उत्तर कुंजी तथा प्रवेश संबंधी
                जानकारी को प्रकाशित करने से पहले उपलब्ध आधिकारिक
                स्रोतों के आधार पर सत्यापित करने का प्रयास किया जाता है।

            </p>

            <p>

                हमारा उद्देश्य उपयोगकर्ताओं तक सही, विश्वसनीय
                तथा नवीनतम जानकारी पहुंचाना है।

            </p>

            <ul>

                <li>आधिकारिक नोटिफिकेशन का अध्ययन</li>

                <li>सरकारी वेबसाइटों से जानकारी का मिलान</li>

                <li>महत्वपूर्ण तिथियों का सत्यापन</li>

                <li>रिक्तियों एवं पात्रता की जांच</li>

                <li>गलत जानकारी मिलने पर शीघ्र सुधार</li>

                <li>मानव संपादक द्वारा समीक्षा</li>

            </ul>

            <div class="alert alert-primary">

                किसी भी आवेदन से पहले संबंधित विभाग की
                आधिकारिक अधिसूचना अवश्य पढ़ें।

            </div>

        </div>



        <!-- =======================================================
        FAQ
    ======================================================= -->

        <div class="page-card">

            <h2>❓ Frequently Asked Questions</h2>

            <div class="accordion" id="factFaq">

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">

                            Does SarkariHai verify every Government Job?

                        </button>

                    </h2>

                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#factFaq">

                        <div class="accordion-body">

                            Yes. We attempt to verify every article using official
                            notifications and Government websites before publishing.

                        </div>

                    </div>

                </div>


                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">

                            Can information change after publication?

                        </button>

                    </h2>

                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#factFaq">

                        <div class="accordion-body">

                            Yes.
                            Government departments may revise notifications,
                            dates or vacancies.
                            We update articles whenever official changes are released.

                        </div>

                    </div>

                </div>


                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">

                            Can users report errors?

                        </button>

                    </h2>

                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#factFaq">

                        <div class="accordion-body">

                            Absolutely.
                            Users can email us with correction requests,
                            and verified issues are updated promptly.

                        </div>

                    </div>

                </div>


            </div>

        </div>



        <!-- =======================================================
        CTA
    ======================================================= -->

        <div class="page-cta">

            <h2>

                Trusted Government Job Information

            </h2>

            <p>

                We continuously work to provide accurate,
                transparent and up-to-date Government Job,
                Result, Admit Card and Admission information.

            </p>

            <a href="{{ url('/') }}" class="btn btn-light btn-lg">

                🏠 Back to Homepage

            </a>

        </div>
    @endsection
