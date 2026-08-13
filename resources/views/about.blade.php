@extends('layouts.front')

@section('content')


<style>
   /* ========================================
   SARKARIHAI ABOUT PAGE
   Spacious Layout
======================================== */

.about-page {
    background: #f4f7fb;
    padding: 28px 0 50px;
}

.about-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 18px;
}


/* =========================
   HERO
========================= */

.about-hero {
    padding: 40px 30px !important;
    min-height: 150px;
    margin-bottom: 18px !important;
}

.about-hero h1 {
    font-size: 30px !important;
    margin-bottom: 14px !important;
}

.about-hero p {
    max-width: 780px;
    font-size: 13px !important;
    line-height: 1.8 !important;
}


/* =========================
   TOP CARDS
========================= */

.about-cards {
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-bottom: 20px;
}

.about-card {
    min-height: 115px;
    padding: 22px 15px !important;
}

.about-card-icon {
    font-size: 27px;
    margin-bottom: 9px;
}

.about-card h3 {
    font-size: 14px !important;
    margin-bottom: 8px !important;
}

.about-card p {
    font-size: 10px !important;
    line-height: 1.6 !important;
}


/* =========================
   MAIN SECTIONS
========================= */

.about-section {
    padding: 25px 20px !important;
    margin-bottom: 18px !important;
}

.about-section h2 {
    font-size: 19px !important;
    margin-bottom: 14px !important;
}

.about-section p {
    font-size: 12px !important;
    line-height: 1.85 !important;
    margin-bottom: 12px !important;
}


/* =========================
   LIST
========================= */

.about-list {
    margin-top: 12px;
    padding-left: 22px;
}

.about-list li {
    font-size: 12px !important;
    line-height: 1.9 !important;
    margin-bottom: 4px;
}


/* =========================
   MISSION BOXES
========================= */

.mission-box {
    gap: 14px;
    margin-top: 18px;
}

.mission-item {
    padding: 17px !important;
    min-height: 95px;
}

.mission-item strong {
    font-size: 13px;
    margin-bottom: 7px;
}

.mission-item p {
    font-size: 11px !important;
    line-height: 1.7 !important;
}


/* =========================
   HIGHLIGHT
========================= */

.about-highlight,
.about-notice {
    margin-top: 16px !important;
    padding: 14px 16px !important;
    font-size: 11px !important;
    line-height: 1.75 !important;
}


/* =========================
   MOBILE
========================= */

@media (max-width: 768px) {

    .about-page {
        padding: 18px 0 35px;
    }

    .about-container {
        padding: 0 12px;
    }

    .about-hero {
        padding: 32px 20px !important;
    }

    .about-hero h1 {
        font-size: 25px !important;
    }

    .about-cards {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .about-card {
        min-height: 105px;
    }

    .about-section {
        padding: 21px 16px !important;
        margin-bottom: 15px !important;
    }

    .about-section h2 {
        font-size: 18px !important;
    }

    .mission-box {
        grid-template-columns: 1fr;
        gap: 10px;
    }
}


@media (max-width: 480px) {

    .about-card {
        padding: 17px 10px !important;
    }

    .about-card h3 {
        font-size: 13px !important;
    }

    .about-section p,
    .about-list li {
        font-size: 11px !important;
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


