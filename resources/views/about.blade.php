@extends('layouts.front')

@section('content')
    <style>
        /* =========================================================
           SARKARIHAI - ABOUT PAGE
           Same Static Page Design System
           ========================================================= */
/* =========================
   MAIN CONTAINER
========================= */

.about-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding-left: 15px;
    padding-right: 15px;
}
        body {
            background: #f5f7fb;
        }

        /* =========================================================
           HERO
           ========================================================= */

        .page-hero {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            color: #fff;
            padding: 60px 45px;
            border-radius: 16px;
            text-align: center;
            margin-bottom: 28px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .10);
        }

        .page-hero h1 {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
        }

        .page-hero p {
            font-size: 16px;
            max-width: 800px;
            margin: auto;
            line-height: 1.8;
            color: #fff;
            opacity: .95;
        }


        /* =========================================================
           MAIN CONTENT CARD
           ========================================================= */

        .page-card {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 22px;
            box-shadow: 0 7px 24px rgba(0, 0, 0, .06);
            border: 1px solid #edf1f6;
        }

        .page-card h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #0755ad;
        }

        .page-card h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #222;
        }

        .page-card p {
            color: #555;
            line-height: 1.85;
            font-size: 14px;
            margin-bottom: 12px;
        }


        /* =========================================================
           FEATURE CARDS
           ========================================================= */

        .feature-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px 18px;
            text-align: center;
            height: 100%;
            border: 1px solid #e9eef5;
            transition: .25s;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .04);
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .feature-icon {
            font-size: 34px;
            margin-bottom: 10px;
        }

        .feature-card h4 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0755ad;
        }

        .feature-card p {
            font-size: 12px;
            color: #666;
            line-height: 1.65;
            margin-bottom: 0;
        }


        /* =========================================================
           ABOUT INTRO / HIGHLIGHT
           ========================================================= */

        .info-box {
            background: #f8fbff;
            border-left: 4px solid #0d6efd;
            border-radius: 7px;
            padding: 16px 18px;
            margin-top: 15px;
            color: #444;
            font-size: 13px;
            line-height: 1.75;
        }


        /* =========================================================
           IMPORTANT / WARNING BOX
           ========================================================= */

        .alert {
            border-radius: 8px;
            padding: 14px 16px;
            font-size: 13px;
            line-height: 1.7;
            margin-top: 15px;
        }


        /* =========================================================
           ABOUT FEATURES GRID
           ========================================================= */

        .about-features {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }


        /* =========================================================
           MISSION / VALUES
           ========================================================= */

        .about-values {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            margin-top: 18px;
        }

        .about-value {
            background: #f8fafc;
            border: 1px solid #e8edf3;
            border-radius: 8px;
            padding: 18px;
        }

        .about-value h4 {
            color: #0755ad;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .about-value p {
            font-size: 12px;
            line-height: 1.7;
            margin: 0;
        }


        /* =========================================================
           LIST
           ========================================================= */

        .page-card ul {
            padding-left: 22px;
            margin-top: 10px;
        }

        .page-card li {
            margin-bottom: 7px;
            color: #444;
            line-height: 1.75;
            font-size: 13px;
        }


        /* =========================================================
           SIMPLE TWO COLUMN CONTENT
           ========================================================= */

        .about-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .about-columns h3 {
            color: #0755ad;
            font-size: 17px;
            margin-bottom: 10px;
        }


        /* =========================================================
           CTA
           ========================================================= */

        .page-cta {
            background: linear-gradient(135deg, #0d6efd, #0056d6);
            color: #fff;
            padding: 35px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 22px;
        }

        .page-cta h2 {
            color: #fff;
            margin-bottom: 10px;
            font-size: 25px;
        }

        .page-cta p {
            color: #fff;
            opacity: .95;
            font-size: 14px;
            line-height: 1.7;
        }


        /* =========================================================
           BUTTON
           ========================================================= */

        .btn-primary {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 600;
        }


        /* =========================================================
           MOBILE
           ========================================================= */

        @media(max-width:768px) {

            .page-hero {
                padding: 40px 22px;
                margin-bottom: 20px;
            }

            .page-hero h1 {
                font-size: 30px;
            }

            .page-hero p {
                font-size: 14px;
            }

            .page-card {
                padding: 22px 18px;
                margin-bottom: 16px;
            }

            .page-card h2 {
                font-size: 21px;
            }

            .page-card h3 {
                font-size: 18px;
            }

            .feature-card {
                margin-bottom: 0;
            }

            .about-features {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .about-values {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .about-columns {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .page-cta {
                padding: 28px 18px;
            }
        }


        @media(max-width:480px) {

            .about-features {
                grid-template-columns: 1fr 1fr;
            }

            .feature-card {
                padding: 18px 10px;
            }

            .feature-icon {
                font-size: 28px;
            }

            .feature-card h4 {
                font-size: 14px;
            }

            .feature-card p {
                font-size: 10px;
            }

            .page-card p,
            .page-card li {
                font-size: 12px;
            }
        }
    </style>



    <div class="about-page">

        <div class="about-container">

            <!-- =========================
         ABOUT PAGE
    ========================= -->

            <div class="page-hero">

                <h1>About SarkariHai</h1>

                <p>
                    SarkariHai.com is an independent educational and informational
                    platform created to help students, job seekers and government
                    job aspirants find important recruitment and examination updates
                    in a simple and convenient way.
                </p>

            </div>


            <!-- =========================
         FEATURE CARDS
    ========================= -->

            <div class="row g-3 mb-4">

                <div class="col-md-3 col-6">
                    <div class="feature-card">

                        <div class="feature-icon">📢</div>

                        <h4>Government Jobs</h4>

                        <p>
                            Find information about government jobs,
                            recruitment notifications and vacancies.
                        </p>

                    </div>
                </div>


                <div class="col-md-3 col-6">
                    <div class="feature-card">

                        <div class="feature-icon">📄</div>

                        <h4>Exam Updates</h4>

                        <p>
                            Get useful information about examinations,
                            application dates and eligibility.
                        </p>

                    </div>
                </div>


                <div class="col-md-3 col-6">
                    <div class="feature-card">

                        <div class="feature-icon">✓</div>

                        <h4>Results & Admit Cards</h4>

                        <p>
                            Access information about exam results,
                            admit cards and related updates.
                        </p>

                    </div>
                </div>


                <div class="col-md-3 col-6">
                    <div class="feature-card">

                        <div class="feature-icon">🔎</div>

                        <h4>Easy Information</h4>

                        <p>
                            Important information presented in a simple
                            and easy-to-understand format.
                        </p>

                    </div>
                </div>

            </div>


            <!-- =========================
         ABOUT US
    ========================= -->

            <div class="page-card">

                <h2>📌 About SarkariHai</h2>

                <p>
                    Welcome to <strong>SarkariHai.com</strong>, an independent
                    educational and informational website focused on government
                    jobs, recruitment, examinations, results, admit cards and
                    other career-related updates.
                </p>

                <p>
                    Our purpose is to make important government recruitment
                    information easier to discover and understand for students,
                    job seekers and government job aspirants.
                </p>

                <p>
                    We organize information from publicly available sources and
                    official notifications so that users can quickly find the
                    information they are looking for.
                </p>

                <div class="info-box">

                    <strong>Important:</strong>
                    SarkariHai.com is an independent information platform.
                    It is not an official government website and is not affiliated
                    with any government department, recruitment board or examination
                    authority.

                </div>

            </div>


            <!-- =========================
         WHAT WE PROVIDE
    ========================= -->

            <div class="page-card">

                <h2>📚 What We Provide</h2>

                <p>
                    SarkariHai provides organized information related to
                    government recruitment and examinations, including:
                </p>

                <ul>

                    <li>Government Job Notifications</li>

                    <li>Recruitment and Vacancy Information</li>

                    <li>Eligibility and Qualification Details</li>

                    <li>Important Application Dates</li>

                    <li>Application and Recruitment Information</li>

                    <li>Admit Card Updates</li>

                    <li>Examination Results</li>

                    <li>Government Scheme and Educational Updates</li>

                </ul>

            </div>


            <!-- =========================
         OUR PURPOSE
    ========================= -->

            <div class="page-card">

                <h2>🎯 Our Purpose</h2>

                <p>
                    Finding reliable government job information can sometimes
                    require checking multiple websites and notifications.
                    SarkariHai aims to make this process easier by presenting
                    relevant information in an organized format.
                </p>

                <div class="about-values">

                    <div class="about-value">

                        <h4>📋 Organized Information</h4>

                        <p>
                            We organize recruitment and examination information
                            so users can find important details more easily.
                        </p>

                    </div>


                    <div class="about-value">

                        <h4>🔎 Easy Discovery</h4>

                        <p>
                            Our website is designed to help users discover relevant
                            jobs, examinations and updates quickly.
                        </p>

                    </div>


                    <div class="about-value">

                        <h4>📢 Regular Updates</h4>

                        <p>
                            We regularly update available information when new
                            recruitment and examination updates are published.
                        </p>

                    </div>


                    <div class="about-value">

                        <h4>🎓 For Job Aspirants</h4>

                        <p>
                            Our content is created primarily to help students,
                            applicants and government job aspirants.
                        </p>

                    </div>

                </div>

            </div>


            <!-- =========================
         INFORMATION ACCURACY
    ========================= -->

            <div class="page-card">

                <h2>📖 Information & Accuracy</h2>

                <p>
                    We make reasonable efforts to present information accurately
                    and keep the website updated. However, recruitment rules,
                    vacancies, eligibility criteria, examination dates and other
                    details may change at any time.
                </p>

                <p>
                    Users should always verify important information from the
                    official notification or official website of the concerned
                    government department, recruitment board or examination
                    authority before taking any action.
                </p>

                <div class="alert alert-warning">

                    <strong>Important:</strong>
                    Official government notifications and websites should always
                    be treated as the final and authoritative source of information.

                </div>

            </div>


            <!-- =========================
         INDEPENDENT WEBSITE
    ========================= -->

            <div class="page-card">

                <h2>🏛️ Independent Information Platform</h2>

                <p>
                    SarkariHai.com is an independent website and does not represent
                    or operate on behalf of any government organization.
                </p>

                <p>
                    Government departments, recruitment boards, universities,
                    examination authorities and other organizations mentioned on
                    this website belong to their respective owners.
                </p>

                <div class="info-box">

                    Every recruitment or examination should be verified through
                    the official notification issued by the concerned authority.

                </div>

            </div>


            <!-- =========================
         DISCLAIMER CTA
    ========================= -->

            <div class="page-cta">

                <h2>Stay Informed. Verify Before You Apply.</h2>

                <p>
                    SarkariHai helps you discover useful information, but always
                    check the official notification before submitting an application
                    or making any decision.
                </p>

            </div>

        </div>

    </div>
@endsection
