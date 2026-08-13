@extends('layouts.front')

@section('content')


<style>
    .about-page {
        background: #f4f7fb;
        padding: 22px 0 40px;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .about-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Hero */
    .about-hero {
        position: relative;
        overflow: hidden;
        background: #064c5d;
        color: #fff;
        border-radius: 8px;
        padding: 32px 25px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        margin-bottom: 15px;
    }

    .about-hero:before {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        right: -35px;
        top: -45px;
        background: rgba(255,255,255,0.07);
        border-radius: 50%;
    }

    .about-hero:after {
        content: "";
        position: absolute;
        width: 85px;
        height: 85px;
        left: -35px;
        bottom: -45px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }

    .about-hero h1 {
        margin: 0 0 10px;
        font-size: 30px;
        font-weight: 700;
    }

    .about-hero p {
        max-width: 750px;
        margin: 0 auto;
        font-size: 13px;
        line-height: 1.7;
        color: #e8f5f7;
    }

    /* Cards */
    .about-cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
        margin-bottom: 15px;
    }

    .about-card {
        background: #fff;
        border-radius: 6px;
        padding: 18px 12px;
        text-align: center;
        box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        border: 1px solid #e9eef4;
    }

    .about-card-icon {
        font-size: 25px;
        margin-bottom: 8px;
    }

    .about-card h3 {
        font-size: 14px;
        color: #0755ad;
        margin: 0 0 6px;
    }

    .about-card p {
        margin: 0;
        font-size: 10px;
        line-height: 1.5;
        color: #777;
    }

    /* Content */
    .about-section {
        background: #fff;
        border-radius: 7px;
        padding: 22px 18px;
        margin-bottom: 15px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        border: 1px solid #e9eef4;
    }

    .about-section h2 {
        margin: 0 0 12px;
        color: #0755ad;
        font-size: 20px;
        font-weight: 700;
    }

    .about-section h2 span {
        margin-right: 5px;
    }

    .about-section p {
        font-size: 12px;
        line-height: 1.8;
        margin: 0 0 10px;
        color: #555;
    }

    .about-section p:last-child {
        margin-bottom: 0;
    }

    /* Highlight */
    .about-highlight {
        background: #fff6dd;
        border-left: 4px solid #f0b323;
        padding: 12px 14px;
        border-radius: 4px;
        font-size: 11px;
        line-height: 1.7;
        color: #705500;
        margin-top: 12px;
    }

    /* Blue notice */
    .about-notice {
        background: #edf6ff;
        border-left: 4px solid #1976d2;
        padding: 12px 14px;
        border-radius: 4px;
        font-size: 11px;
        line-height: 1.7;
        color: #345;
        margin-top: 12px;
    }

    /* Lists */
    .about-list {
        margin: 10px 0 0;
        padding-left: 20px;
    }

    .about-list li {
        font-size: 12px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 3px;
    }

    /* Mission */
    .mission-box {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-top: 12px;
    }

    .mission-item {
        background: #f8fafc;
        border: 1px solid #e8edf3;
        border-radius: 5px;
        padding: 14px;
    }

    .mission-item strong {
        display: block;
        color: #0755ad;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .mission-item p {
        font-size: 11px;
        margin: 0;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-cards {
            grid-template-columns: repeat(2, 1fr);
        }

        .mission-box {
            grid-template-columns: 1fr;
        }

        .about-hero h1 {
            font-size: 25px;
        }
    }

    @media (max-width: 480px) {
        .about-cards {
            grid-template-columns: 1fr 1fr;
            gap: 7px;
        }

        .about-card {
            padding: 15px 8px;
        }

        .about-section {
            padding: 18px 14px;
        }
    }
</style>


<div class="about-page">

    <div class="about-container">

        <!-- Hero -->
        <section class="about-hero">
            <h1>About SarkariHai</h1>

            <p>
                SarkariHai.com is an independent information platform created
                to help job seekers, students and government job aspirants
                find useful information about government jobs, recruitment,
                exams, admit cards, results and other important updates.
            </p>
        </section>


        <!-- Quick Information -->
        <div class="about-cards">

            <div class="about-card">
                <div class="about-card-icon">📢</div>
                <h3>Job Updates</h3>
                <p>
                    Find information about government job notifications
                    and recruitment opportunities.
                </p>
            </div>

            <div class="about-card">
                <div class="about-card-icon">📄</div>
                <h3>Exam Information</h3>
                <p>
                    Useful information related to exams, eligibility,
                    important dates and application processes.
                </p>
            </div>

            <div class="about-card">
                <div class="about-card-icon">✓</div>
                <h3>Results & Admit Cards</h3>
                <p>
                    Stay updated with results, admit cards, answer keys
                    and examination-related information.
                </p>
            </div>

            <div class="about-card">
                <div class="about-card-icon">🔎</div>
                <h3>Easy Information</h3>
                <p>
                    Important recruitment information organized in a
                    simple and easy-to-understand format.
                </p>
            </div>

        </div>


        <!-- About -->
        <section class="about-section">

            <h2><span>📌</span> About Us</h2>

            <p>
                Welcome to <strong>SarkariHai.com</strong>, an independent
                educational and informational website focused on government
                job and examination-related information.
            </p>

            <p>
                Our goal is to make recruitment information easier to find
                and understand. We organize information related to government
                vacancies, recruitment notifications, application dates,
                eligibility, admit cards, results, answer keys, syllabus and
                other examination updates.
            </p>

            <div class="about-highlight">
                <strong>Important:</strong>
                SarkariHai.com is not an official government website and is
                not affiliated with any government department, recruitment
                board, examination authority or university unless explicitly
                stated otherwise.
            </div>

        </section>


        <!-- What We Provide -->
        <section class="about-section">

            <h2><span>📚</span> What We Provide</h2>

            <p>
                SarkariHai provides information that can help users discover
                and understand recruitment and examination opportunities.
            </p>

            <ul class="about-list">
                <li>Government job recruitment information</li>
                <li>Recruitment notifications and vacancy details</li>
                <li>Eligibility and important dates</li>
                <li>Online and offline application information</li>
                <li>Admit card and examination updates</li>
                <li>Government examination results</li>
                <li>Answer key and syllabus information</li>
                <li>Useful links to official websites and notifications</li>
            </ul>

        </section>


        <!-- Our Mission -->
        <section class="about-section">

            <h2><span>🎯</span> Our Mission</h2>

            <p>
                Our mission is to make government recruitment and examination
                information easier for students and job seekers to discover.
            </p>

            <div class="mission-box">

                <div class="mission-item">
                    <strong>Simple Information</strong>
                    <p>
                        We try to present important recruitment information
                        in a simple and easy-to-read format.
                    </p>
                </div>

                <div class="mission-item">
                    <strong>Easy Discovery</strong>
                    <p>
                        We organize jobs, exams, results and other updates
                        so users can find relevant information quickly.
                    </p>
                </div>

                <div class="mission-item">
                    <strong>Useful Updates</strong>
                    <p>
                        We focus on information that is useful to students,
                        applicants and government job aspirants.
                    </p>
                </div>

                <div class="mission-item">
                    <strong>Official Sources</strong>
                    <p>
                        Users are encouraged to verify important information
                        through the concerned official website or notification.
                    </p>
                </div>

            </div>

        </section>


        <!-- Accuracy -->
        <section class="about-section">

            <h2><span>🔎</span> Accuracy of Information</h2>

            <p>
                We make reasonable efforts to keep the information published
                on SarkariHai accurate and updated. However, recruitment
                notifications, examination schedules, eligibility criteria,
                vacancies and application details may change.
            </p>

            <p>
                Therefore, users should always verify important details from
                the official notification or official website of the concerned
                organization before submitting an application.
            </p>

            <div class="about-notice">
                <strong>Always Verify:</strong>
                Check the official recruitment notification for eligibility,
                age limit, vacancies, application dates, fees, selection
                process and other important conditions before applying.
            </div>

        </section>


        <!-- Independent Platform -->
        <section class="about-section">

            <h2><span>🏛️</span> Independent Information Platform</h2>

            <p>
                SarkariHai.com is an independent website created for
                informational and educational purposes. The website does not
                represent any government department or recruitment authority.
            </p>

            <p>
                Names, logos, trademarks and recruitment authorities mentioned
                on the website belong to their respective owners.
            </p>

            <div class="about-highlight">
                SarkariHai does not guarantee selection, employment or
                recruitment outcomes. Applicants are responsible for checking
                and following the official recruitment instructions.
            </div>

        </section>


        <!-- Contact / Feedback -->
        <section class="about-section">

            <h2><span>💬</span> Feedback & Suggestions</h2>

            <p>
                We value feedback from our users. If you find an incorrect,
                outdated or incomplete piece of information, you can contact
                us so that the information can be reviewed and updated where
                appropriate.
            </p>

            <p>
                Your feedback helps us improve the quality and usefulness of
                the information available on SarkariHai.com.
            </p>

        </section>

    </div>

</div>

@endsection


