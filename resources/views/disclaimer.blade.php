@extends('layouts.front')

@section('content')
    <style>
        /* ===========================================================
           SARKARIHAI DISCLAIMER PAGE
           Version : 1.0
        =========================================================== */

        body {
            background: #f4f7fb;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        /* ================= HERO ================= */

        .page-hero {

            background: linear-gradient(135deg, #062a3a, #0a5467);

            color: #fff;

            padding: 70px 50px;

            border-radius: 18px;

            text-align: center;

            margin-bottom: 35px;

            overflow: hidden;

            position: relative;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);

        }

        .page-hero:before {

            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            background: rgba(255, 255, 255, .08);

            border-radius: 50%;

            top: -90px;

            right: -70px;

        }

        .page-hero:after {

            content: "";

            position: absolute;

            width: 180px;

            height: 180px;

            background: rgba(255, 255, 255, .05);

            border-radius: 50%;

            left: -70px;

            bottom: -70px;

        }

        .page-hero h1 {

            font-size: 44px;

            font-weight: 800;

            margin-bottom: 18px;

            position: relative;

            z-index: 2;

        }

        .page-hero p {

            max-width: 900px;

            margin: auto;

            font-size: 18px;

            line-height: 1.9;

            position: relative;

            z-index: 2;

        }

        /* ================= BADGES ================= */

        .author-badge {

            display: inline-block;

            margin: 6px;

            padding: 10px 18px;

            border-radius: 30px;

            background: rgba(255, 255, 255, .15);

            color: #fff;

            font-size: 14px;

            font-weight: 600;

            backdrop-filter: blur(8px);

        }

        /* ================= PAGE CARD ================= */

        .page-card {

            background: #fff;

            padding: 35px;

            border-radius: 15px;

            margin-bottom: 30px;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);

            border: 1px solid #edf2f7;

        }

        .page-card h2 {

            font-size: 30px;

            font-weight: 700;

            color: #0d47a1;

            margin-bottom: 20px;

        }

        .page-card h3 {

            font-size: 24px;

            font-weight: 700;

            margin-bottom: 18px;

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

        /* ================= FEATURE CARD ================= */

        .feature-card {

            background: #fff;

            border-radius: 14px;

            padding: 30px;

            height: 100%;

            text-align: center;

            border: 1px solid #edf2f7;

            transition: .35s;

        }

        .feature-card:hover {

            transform: translateY(-6px);

            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

        }

        .feature-icon {

            font-size: 42px;

            margin-bottom: 18px;

        }

        .feature-card h5 {

            font-size: 21px;

            font-weight: 700;

            margin-bottom: 15px;

        }

        .feature-card p {

            font-size: 15px;

            color: #666;

            margin: 0;

        }

        /* ================= INFO BOX ================= */

        .info-box {

            background: #eef6ff;

            border-left: 5px solid #0d6efd;

            border-radius: 12px;

            padding: 20px;

            margin-top: 25px;

        }

        .info-box strong {

            color: #0d47a1;

        }

        /* ================= ALERT ================= */

        .alert {

            border: none;

            border-radius: 12px;

            padding: 18px 22px;

            line-height: 1.8;

        }

        .alert-warning {

            background: #fff7df;

            color: #856404;

        }

        .alert-success {

            background: #eaf8ef;

            color: #146c43;

        }

        .alert-primary {

            background: #edf5ff;

            color: #084298;

        }

        .alert-danger {

            background: #fdecec;

            color: #842029;

        }

        /* ===========================================================
       DISCLAIMER CSS PART-2A
       FAQ | TABLE | CTA | CONTACT | TIMELINE
    ===========================================================*/


        /*================ FAQ =================*/

        .accordion {

            margin-top: 20px;

        }

        .accordion-item {

            border: none;

            border-radius: 14px !important;

            overflow: hidden;

            margin-bottom: 15px;

            box-shadow: 0 8px 20px rgba(0, 0, 0, .06);

        }

        .accordion-button {

            background: #fff;

            font-weight: 700;

            font-size: 17px;

            padding: 20px 25px;

            color: #222;

            box-shadow: none !important;

        }

        .accordion-button:not(.collapsed) {

            background: #0d6efd;

            color: #fff;

        }

        .accordion-button:focus {

            box-shadow: none;

        }

        .accordion-body {

            padding: 25px;

            line-height: 1.9;

            color: #555;

            background: #fff;

        }


        /*================ CONTACT CARD =================*/

        .contact-card {

            background: #fff;

            border-radius: 16px;

            padding: 30px;

            box-shadow: 0 12px 30px rgba(0, 0, 0, .06);

            border: 1px solid #edf2f7;

        }

        .contact-card h3 {

            font-size: 28px;

            font-weight: 700;

            margin-bottom: 25px;

            color: #0d47a1;

        }

        .contact-item {

            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 22px;

        }

        .contact-icon {

            width: 55px;

            height: 55px;

            border-radius: 50%;

            background: #edf5ff;

            color: #0d6efd;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

            flex-shrink: 0;

        }

        .contact-title {

            font-weight: 700;

            font-size: 16px;

        }

        .contact-value {

            color: #666;

            font-size: 15px;

        }


        /*================ TABLE =================*/

        .table {

            background: #fff;

            border-radius: 12px;

            overflow: hidden;

            margin-top: 20px;

        }

        .table thead {

            background: #0d6efd;

            color: #fff;

        }

        .table th {

            padding: 16px;

            font-weight: 700;

            border: none;

        }

        .table td {

            padding: 16px;

            vertical-align: middle;

        }

        .table tbody tr:hover {

            background: #f8fbff;

        }


        /*================ CTA =================*/

        .page-cta {

            background: linear-gradient(135deg, #0d6efd, #004aad);

            color: #fff;

            padding: 60px 40px;

            text-align: center;

            border-radius: 18px;

            margin-top: 40px;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);

        }

        .page-cta h2 {

            font-size: 34px;

            font-weight: 800;

            margin-bottom: 15px;

        }

        .page-cta p {

            font-size: 18px;

            opacity: .95;

            max-width: 750px;

            margin: auto auto 25px;

        }

        .page-cta .btn {

            padding: 14px 32px;

            border-radius: 10px;

            font-weight: 700;

            font-size: 16px;

        }


        /*================ TIMELINE =================*/

        .timeline {

            position: relative;

            padding-left: 35px;

            margin-top: 20px;

        }

        .timeline:before {

            content: "";

            position: absolute;

            left: 10px;

            top: 0;

            bottom: 0;

            width: 3px;

            background: #0d6efd;

        }

        .timeline-item {

            position: relative;

            margin-bottom: 28px;

        }

        .timeline-item:before {

            content: "";

            position: absolute;

            width: 18px;

            height: 18px;

            border-radius: 50%;

            background: #0d6efd;

            left: -33px;

            top: 5px;

        }

        .timeline-title {

            font-size: 18px;

            font-weight: 700;

            margin-bottom: 8px;

        }

        .timeline p {

            margin: 0;

            color: #666;

            line-height: 1.8;

        }


        /*================ LIST ICON =================*/

        .icon-list {

            list-style: none;

            padding: 0;

            margin: 0;

        }

        .icon-list li {

            padding: 12px 0;

            border-bottom: 1px solid #edf2f7;

            display: flex;

            align-items: center;

            gap: 12px;

        }

        .icon-list li:last-child {

            border-bottom: none;

        }

        .icon-list i {

            color: #0d6efd;

            font-size: 18px;

        }


        /*================ SECTION TITLE =================*/

        .section-title {

            font-size: 32px;

            font-weight: 800;

            color: #0d47a1;

            margin-bottom: 25px;

        }

        /*==========================================================
      DISCLAIMER PAGE CSS
      PART 2B-1 (Responsive + Mobile)
    ==========================================================*/


        /*==========================
        LARGE SCREEN
    ==========================*/

        @media (max-width:1200px) {

            .page-hero {

                padding: 60px 35px;

            }

            .page-hero h1 {

                font-size: 40px;

            }

            .page-card {

                padding: 30px;

            }

            .feature-card {

                padding: 25px;

            }

        }



        /*==========================
            TABLET
    ==========================*/

        @media (max-width:992px) {

            .page-hero {

                padding: 55px 30px;
                text-align: center;

            }

            .page-hero h1 {

                font-size: 34px;

            }

            .page-hero p {

                font-size: 17px;

            }

            .author-badge {

                margin: 5px;

                padding: 9px 15px;

                font-size: 13px;

            }

            .page-card {

                padding: 28px;

            }

            .page-card h2 {

                font-size: 28px;

            }

            .page-card h3 {

                font-size: 22px;

            }

            .feature-card {

                margin-bottom: 20px;

            }

            .contact-card {

                margin-top: 25px;

            }

            .table {

                display: block;
                overflow-x: auto;
                white-space: nowrap;

            }

            .page-cta {

                padding: 45px 25px;

            }

            .page-cta h2 {

                font-size: 28px;

            }

        }



        /*==========================
            MOBILE
    ==========================*/

        @media (max-width:768px) {

            .page-hero {

                padding: 40px 20px;

                border-radius: 14px;

            }

            .page-hero h1 {

                font-size: 28px;

                line-height: 1.4;

            }

            .page-hero p {

                font-size: 15px;

                line-height: 1.8;

            }

            .author-badge {

                display: inline-block;

                margin: 4px;

                padding: 8px 14px;

                font-size: 12px;

            }

            .page-card {

                padding: 22px;

                border-radius: 12px;

            }

            .page-card h2 {

                font-size: 24px;

            }

            .page-card h3 {

                font-size: 20px;

            }

            .page-card p {

                font-size: 15px;

            }

            .page-card li {

                font-size: 15px;

            }

            .feature-card {

                padding: 22px;

                text-align: center;

            }

            .feature-icon {

                font-size: 36px;

            }

            .feature-card h5 {

                font-size: 19px;

            }

            .contact-card {

                padding: 22px;

            }

            .contact-item {

                align-items: flex-start;

            }

            .contact-icon {

                width: 48px;
                height: 48px;
                font-size: 18px;

            }

            .timeline {

                padding-left: 28px;

            }

            .timeline:before {

                left: 8px;

            }

            .timeline-item:before {

                left: -26px;

                width: 15px;
                height: 15px;

            }

            .page-cta {

                padding: 35px 18px;

            }

            .page-cta h2 {

                font-size: 24px;

            }

            .page-cta p {

                font-size: 15px;

            }

            .page-cta .btn {

                width: 100%;

                margin-top: 10px;

            }

        }



        /*==========================
          EXTRA SMALL
    ==========================*/

        @media (max-width:576px) {

            .container {

                padding-left: 15px;

                padding-right: 15px;

            }

            .page-hero {

                padding: 30px 18px;

            }

            .page-hero h1 {

                font-size: 24px;

            }

            .page-card {

                padding: 18px;

            }

            .page-card h2 {

                font-size: 22px;

            }

            .feature-card {

                padding: 18px;

            }

            .feature-icon {

                font-size: 32px;

            }

            .author-badge {

                display: block;

                margin: 8px auto;

                width: fit-content;

            }

            .contact-item {

                flex-direction: column;

                text-align: center;

            }

            .contact-icon {

                margin: auto;

            }

            .timeline {

                padding-left: 22px;

            }

            .page-cta {

                padding: 28px 15px;

            }

            .page-cta h2 {

                font-size: 22px;

            }

            .page-cta p {

                font-size: 14px;

            }

        }


        /*==========================================================
        DISCLAIMER PAGE CSS
        PART 2B-2 (Animation | Utilities | Social | Print)
    ==========================================================*/


        /*==============================
        HOVER EFFECTS
    ==============================*/

        .page-card,
        .feature-card,
        .contact-card {

            transition: all .35s ease;

        }

        .page-card:hover {

            transform: translateY(-4px);

            box-shadow: 0 18px 45px rgba(0, 0, 0, .08);

        }

        .feature-card:hover {

            transform: translateY(-6px);

        }

        .contact-card:hover {

            transform: translateY(-4px);

        }


        /*==============================
        BUTTON
    ==============================*/

        .btn-primary {

            background: #0d6efd;

            border: none;

            transition: .3s;

        }

        .btn-primary:hover {

            background: #004fc7;

            transform: translateY(-2px);

        }


        /*==============================
        LINK
    ==============================*/

        a {

            transition: .25s;

        }

        a:hover {

            text-decoration: none;

        }


        /*==============================
        SOCIAL ICONS
    ==============================*/

        .social-links {

            display: flex;

            gap: 12px;

            flex-wrap: wrap;

            margin-top: 25px;

        }

        .social-links a {

            width: 46px;

            height: 46px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eef5ff;

            color: #0d6efd;

            font-size: 18px;

            transition: .3s;

        }

        .social-links a:hover {

            background: #0d6efd;

            color: #fff;

            transform: translateY(-5px);

        }


        /*==============================
        SHADOW HELPERS
    ==============================*/

        .shadow-sm {

            box-shadow: 0 5px 12px rgba(0, 0, 0, .05) !important;

        }

        .shadow-md {

            box-shadow: 0 12px 30px rgba(0, 0, 0, .08) !important;

        }

        .shadow-lg {

            box-shadow: 0 18px 45px rgba(0, 0, 0, .12) !important;

        }


        /*==============================
        RADIUS HELPERS
    ==============================*/

        .radius-10 {

            border-radius: 10px;

        }

        .radius-15 {

            border-radius: 15px;

        }

        .radius-20 {

            border-radius: 20px;

        }


        /*==============================
        SPACING HELPERS
    ==============================*/

        .mt-40 {

            margin-top: 40px;

        }

        .mb-40 {

            margin-bottom: 40px;

        }

        .py-60 {

            padding-top: 60px;

            padding-bottom: 60px;

        }


        /*==============================
        IMAGE
    ==============================*/

        .img-fluid {

            border-radius: 14px;

        }


        /*==============================
        SCROLLBAR
    ==============================*/

        ::-webkit-scrollbar {

            width: 9px;

        }

        ::-webkit-scrollbar-thumb {

            background: #0d6efd;

            border-radius: 20px;

        }

        ::-webkit-scrollbar-track {

            background: #edf2f7;

        }


        /*==============================
        TEXT SELECTION
    ==============================*/

        ::selection {

            background: #0d6efd;

            color: #fff;

        }


        /*==============================
        SIMPLE FADE
    ==============================*/

        .fade-up {

            animation: fadeUp .6s ease;

        }

        @keyframes fadeUp {

            0% {

                opacity: 0;

                transform: translateY(25px);

            }

            100% {

                opacity: 1;

                transform: translateY(0);

            }

        }


        /*==============================
        PRINT
    ==============================*/

        @media print {

            .page-hero {

                background: #fff !important;

                color: #000 !important;

                box-shadow: none;

            }

            .feature-card,
            .page-card,
            .contact-card {

                box-shadow: none !important;

                border: 1px solid #ddd;

            }

            .page-cta,
            .social-links {

                display: none;

            }

            a {

                color: #000 !important;

                text-decoration: none;

            }

        }


        /*==============================
        END
    ==============================*/



        /*=========================================
        DISCLAIMER PAGE FINAL TOUCH
    =========================================*/

        .page-cta {

            margin-top: 50px;

        }

        .page-cta .btn {

            padding: 14px 35px;

            border-radius: 8px;

            font-weight: 700;

        }

        .page-cta .btn:hover {

            transform: translateY(-2px);

        }

        .accordion-button {

            border-radius: 0 !important;

        }

        .accordion-item {

            overflow: hidden;

        }

        .accordion-body {

            background: #fafcff;

        }

        .page-card:last-child {

            margin-bottom: 0;

        }
    </style>
    <div class="container py-5">

        <!-- ================= HERO ================= -->

        <div class="page-hero">

            <h1>Disclaimer</h1>

            <p>

                Welcome to <strong>SarkariHai.com</strong>. This Disclaimer explains
                the limitations of liability, the purpose of the information published
                on our website, and your responsibilities as a user.

            </p>

            <div class="mt-4">

                <span class="author-badge">
                    ⚖️ Legal Notice
                </span>

                <span class="author-badge">
                    📅 Last Updated: {{ now()->format('d F Y') }}
                </span>

                <span class="author-badge">
                    🔒 Transparency First
                </span>

            </div>

        </div>



        <!-- ================= HIGHLIGHTS ================= -->

        <div class="row g-3 mb-5">

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🏛️</div>

                    <h5>Not Government Website</h5>

                    <p class="mb-0">

                        SarkariHai.com is an independent informational website.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">📑</div>

                    <h5>Official Notification</h5>

                    <p class="mb-0">

                        Always verify information from official notifications.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">✔️</div>

                    <h5>Information Only</h5>

                    <p class="mb-0">

                        Content is published only for educational purposes.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🔄</div>

                    <h5>Regular Updates</h5>

                    <p class="mb-0">

                        Information may change without prior notice.

                    </p>

                </div>

            </div>

        </div>



        <!-- ================= GENERAL DISCLAIMER ================= -->

        <div class="page-card">

            <h2>📌 General Disclaimer</h2>

            <p>

                SarkariHai.com is an independent educational and informational
                platform created to help students, job seekers and aspirants
                access Government Job Notifications, Admit Cards, Results,
                Answer Keys, Admissions and other educational updates.

            </p>

            <p>

                We are <strong>not associated with any Government department,
                    ministry, commission, recruitment board, university or official
                    authority.</strong>

            </p>

            <div class="alert alert-warning mt-4">

                <strong>Important:</strong>

                Users should always verify recruitment details, eligibility,
                important dates, application fees and other information from
                the official notification before submitting any application.

            </div>

        </div>



        <!-- ================= ACCURACY ================= -->

        <div class="page-card">

            <h2>📖 Accuracy of Information</h2>

            <p>

                Our editorial team makes every reasonable effort to publish
                accurate, updated and reliable information.

            </p>

            <p>

                However, recruitment notifications, examination schedules,
                eligibility criteria and official announcements may change
                without prior notice.

            </p>

            <ul>

                <li>Official notifications always take priority.</li>

                <li>Users must verify information independently.</li>

                <li>Website content should not be treated as legal advice.</li>

                <li>Minor errors may occur due to human or technical reasons.</li>

            </ul>

        </div>



        <!-- ================= OFFICIAL WEBSITE ================= -->

        <div class="page-card">

            <h2>🏛️ Official Website Disclaimer</h2>

            <p>

                SarkariHai.com is <strong>not an official Government website.</strong>

            </p>

            <p>

                Names, logos, recruitment boards and examination authorities
                mentioned on this website belong to their respective owners.

            </p>

            <div class="info-box mt-4">

                Every recruitment article includes or refers to the
                official notification issued by the concerned authority.

            </div>

        </div>


        <!-- ================= EXTERNAL LINKS ================= -->

        <div class="page-card">

            <h2>🔗 External Links Disclaimer</h2>

            <p>

                SarkariHai.com may contain links to official Government websites,
                recruitment boards, universities and other third-party websites
                for the convenience of our users.

            </p>

            <p>

                These external websites are not operated or controlled by
                <strong>SarkariHai.com</strong>. Therefore, we are not responsible
                for their content, privacy practices, availability or any changes
                made by those websites.

            </p>

            <div class="alert alert-primary mt-4">

                <strong>Recommendation:</strong>

                Always verify recruitment details, application dates, eligibility,
                fees and official notifications directly from the concerned
                Government department's official website.

            </div>

        </div>



        <!-- ================= ADVERTISEMENT DISCLAIMER ================= -->

        <div class="page-card">

            <h2>📢 Advertisement Disclaimer</h2>

            <p>

                SarkariHai.com may display advertisements provided by
                Google AdSense or other trusted advertising partners.

            </p>

            <p>

                These advertisements help support the maintenance,
                hosting and continuous development of our website.

            </p>

            <p>

                Displaying an advertisement does not imply that
                SarkariHai.com recommends, guarantees or endorses
                the advertised products or services.

            </p>

        </div>



        <!-- ================= AFFILIATE DISCLAIMER ================= -->

        <div class="page-card">

            <h2>🤝 Affiliate Disclosure</h2>

            <p>

                At present, SarkariHai.com primarily provides educational
                and Government Job related information.

            </p>

            <p>

                In the future, some pages may contain affiliate links.

                If users purchase products or services through those links,
                we may earn a small commission without any additional cost
                to the user.

            </p>

            <div class="info-box">

                We only recommend products or services that we believe
                may provide value to our users.

            </div>

        </div>



        <!-- ================= USER RESPONSIBILITY ================= -->

        <div class="page-card">

            <h2>👤 User Responsibility</h2>

            <p>

                Every visitor is responsible for verifying the authenticity
                of recruitment notifications before submitting any application
                or paying any examination fee.

            </p>

            <ul>

                <li>Read the complete official notification carefully.</li>

                <li>Verify eligibility criteria.</li>

                <li>Confirm important dates.</li>

                <li>Check official application links.</li>

                <li>Verify examination fees.</li>

                <li>Keep copies of submitted applications.</li>

            </ul>

            <div class="alert alert-warning">

                SarkariHai.com shall not be responsible for any loss,
                inconvenience or misunderstanding resulting from the use
                of information published on this website.

            </div>

        </div>



        <!-- ================= COPYRIGHT ================= -->

        <div class="page-card">

            <h2>© Copyright Policy</h2>

            <p>

                Unless otherwise stated, all original content published on
                SarkariHai.com including articles, website design, graphics,
                logos and custom materials are protected under applicable
                copyright laws.

            </p>

            <p>

                Unauthorized copying, reproduction, redistribution or
                commercial use of our original content without prior
                written permission is prohibited.

            </p>

        </div>



        <!-- ================= FAIR USE ================= -->

        <div class="page-card">

            <h2>📚 Fair Use Notice</h2>

            <p>

                Some logos, organization names, recruitment board names,
                Government department names and official notification
                references appearing on this website belong to their
                respective owners.

            </p>

            <p>

                Such materials are used solely for identification,
                educational reporting and informational purposes under
                the principles of Fair Use.

            </p>

        </div>



        <!-- ================= LIMITATION OF LIABILITY ================= -->

        <div class="page-card">

            <h2>⚖️ Limitation of Liability</h2>

            <p>

                While every effort is made to publish accurate and updated
                information, SarkariHai.com does not guarantee the completeness,
                reliability or accuracy of every piece of information.

            </p>

            <p>

                We shall not be liable for any direct, indirect, incidental,
                consequential or financial loss arising from the use of this
                website or reliance upon the information published herein.

            </p>

            <div class="alert alert-danger">

                Users are strongly advised to rely upon the official
                notification issued by the concerned Government authority
                before making any decision.

            </div>

        </div>
    @endsection
