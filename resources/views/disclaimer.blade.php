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

            background: linear-gradient(135deg, #0d6efd, #0056d6);

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
