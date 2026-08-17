<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1080, initial-scale=1.0">

<!--
===========================================================
SARKARIHAI SHORT POSTER
Canvas: 1080 x 1920
Format: YouTube Shorts
===========================================================
-->

<title>SarkariHai - 2 Government Jobs</title>

<style>

/* =========================================================
   FONT
========================================================= */

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    min-height: 100%;
    background: #111827;
    font-family: 'Noto Sans Devanagari', Arial, sans-serif;
}

.poster {
    width: 1080px;
    height: 1920px;
    overflow: hidden;
    margin: 0 auto;
    background: #071532;
    position: relative;
}


/* =========================================================
   HEADER
========================================================= */

.header {
    height: 285px;
    background: linear-gradient(
        180deg,
        #06112b 0%,
        #091b3e 100%
    );

    position: relative;
    text-align: center;
    padding-top: 34px;
    overflow: hidden;
}

/* Decorative circles */

.header::before {
    content: "";
    position: absolute;
    width: 230px;
    height: 230px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    left: -70px;
    top: -70px;
}

.header::after {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,.035);
    right: -80px;
    top: -90px;
}

/* Notification icons */

.header-icon {
    position: absolute;
    top: 30px;
    font-size: 70px;
    z-index: 2;
}

.header-icon.left {
    left: 28px;
}

.header-icon.right {
    right: 28px;
}

/* Main title */

.main-title {
    position: relative;
    z-index: 3;

    color: #ffffff;

    font-size: 62px;
    line-height: 1.05;

    font-weight: 900;

    letter-spacing: -1px;

    text-shadow:
        0 3px 0 #000,
        0 5px 8px rgba(0,0,0,.35);
}

.main-title strong {
    display: block;

    color: #ffd400;

    font-size: 72px;

    font-weight: 900;

    margin-top: 4px;
}

/* Latest jobs badge */

.latest-badge {
    position: relative;
    z-index: 3;

    display: inline-block;

    margin-top: 16px;

    padding: 10px 46px;

    border-radius: 50px;

    background: #e51b16;

    color: #ffffff;

    font-size: 29px;

    line-height: 1;

    font-weight: 900;

    letter-spacing: .5px;

    box-shadow:
        0 5px 0 rgba(0,0,0,.25);
}


/* =========================================================
   JOB AREA
========================================================= */

.jobs-area {
    height: 1270px;

    background: #071532;

    padding: 24px 22px 0;
}


/* =========================================================
   JOB CARD
========================================================= */

.job-card {
    width: 100%;

    background: #ffffff;

    border-radius: 24px;

    margin-bottom: 22px;

    overflow: hidden;

    border: 4px solid #d7d7d7;

    box-shadow:
        0 6px 14px rgba(0,0,0,.20);
}


/* Purple card */

.job-card.purple {
    border-color: #8d55d9;
}


/* Blue card */

.job-card.blue {
    border-color: #3e6ed8;
}


/* =========================================================
   JOB TOP
========================================================= */

.job-top {
    min-height: 150px;

    padding: 21px 23px;

    display: flex;

    align-items: center;

    gap: 18px;
}


/* Logo */

.job-logo {
    width: 112px;
    height: 112px;

    flex: 0 0 112px;

    object-fit: contain;

    background: #ffffff;

    border-radius: 50%;

    border: 3px solid #dedede;

    padding: 6px;
}


/* Job title area */

.job-heading {
    flex: 1;

    min-width: 0;
}

.job-title {
    color: #531b9d;

    font-size: 50px;

    line-height: .98;

    font-weight: 900;

    letter-spacing: -.7px;

    text-transform: uppercase;
}

.job-card.blue .job-title {
    color: #15469f;
}

.job-organization {
    margin-top: 8px;

    color: #202020;

    font-size: 25px;

    line-height: 1.15;

    font-weight: 700;
}


/* =========================================================
   RIGHT BADGE
========================================================= */

.job-badge {
    flex: 0 0 142px;

    min-height: 82px;

    border-radius: 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    text-align: center;

    background: #df1b17;

    color: #ffffff;

    font-size: 24px;

    line-height: 1.05;

    font-weight: 900;

    padding: 8px;
}

.job-card.blue .job-badge {
    background: #e41b17;

    color: #ffd400;
}


/* =========================================================
   DETAILS GRID
========================================================= */

.details {
    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    margin: 0 20px;

    padding: 18px 0;

    border-top: 2px solid #dedede;

    border-bottom: 2px solid #dedede;
}

.detail {
    min-height: 112px;

    padding: 0 9px;

    text-align: center;

    border-right: 2px solid #dddddd;

    display: flex;

    flex-direction: column;

    justify-content: center;

    align-items: center;
}

.detail:last-child {
    border-right: none;
}


/* Icons */

.detail-icon {
    font-size: 35px;

    line-height: 1;

    margin-bottom: 7px;
}


/* Label */

.detail-label {
    color: #531b9d;

    font-size: 20px;

    line-height: 1.05;

    font-weight: 900;

    margin-bottom: 6px;
}

.job-card.blue .detail-label {
    color: #17469f;
}


/* Value */

.detail-value {
    color: #171717;

    font-size: 21px;

    line-height: 1.12;

    font-weight: 800;
}


/* =========================================================
   JOB DESCRIPTION / APPLY
========================================================= */

.job-bottom {
    margin: 16px 20px 19px;

    min-height: 92px;

    border-radius: 16px;

    display: flex;

    align-items: center;

    gap: 16px;

    padding: 14px 15px;

    background: #f0eafa;
}

.job-card.blue .job-bottom {
    background: #edf3ff;
}

.job-description {
    flex: 1;

    color: #242424;

    font-size: 21px;

    line-height: 1.28;

    font-weight: 700;
}


/* Apply button */

.apply-box {
    width: 210px;

    flex: 0 0 210px;

    border-radius: 14px;

    background: #5417a0;

    color: #ffffff;

    text-align: center;

    padding: 12px 8px;
}

.job-card.blue .apply-box {
    background: #1545a1;
}

.apply-label {
    font-size: 20px;

    line-height: 1;

    font-weight: 800;
}

.apply-mode {
    font-size: 30px;

    line-height: 1.05;

    font-weight: 900;

    margin-top: 3px;
}


/* =========================================================
   CTA / WEBSITE FOOTER
========================================================= */

.cta {
    height: 138px;

    display: flex;

    align-items: center;

    background:
        linear-gradient(
            90deg,
            #ffd400 0%,
            #ffd400 58%,
            #e51c16 58%,
            #e51c16 100%
        );
}


/* Website */

.website {
    width: 58%;

    padding-left: 38px;
}

.website-label {
    color: #171717;

    font-size: 21px;

    line-height: 1.1;

    font-weight: 800;
}

.website-name {
    margin-top: 4px;

    color: #111111;

    font-size: 42px;

    line-height: 1;

    font-weight: 900;

    letter-spacing: -.7px;
}


/* Subscribe */

.subscribe {
    width: 42%;

    text-align: center;

    color: #ffffff;
}

.subscribe-label {
    font-size: 22px;

    line-height: 1.1;

    font-weight: 800;
}

.subscribe-button {
    display: inline-block;

    margin-top: 7px;

    padding: 10px 27px;

    border-radius: 35px;

    background: #ffd400;

    color: #111111;

    font-size: 24px;

    line-height: 1;

    font-weight: 900;
}


/* =========================================================
   SOCIAL BAR
========================================================= */

.social-bar {
    height: 92px;

    display: flex;

    align-items: center;

    justify-content: space-around;

    background: #06112b;

    color: #ffffff;
}

.social-item {
    text-align: center;

    font-size: 22px;

    line-height: 1;

    font-weight: 800;
}

.social-icon {
    font-size: 31px;

    vertical-align: middle;

    margin-right: 4px;
}


/* =========================================================
   DISCLAIMER
========================================================= */

.disclaimer {
    height: 55px;

    display: flex;

    align-items: center;

    justify-content: center;

    padding: 0 20px;

    background: #020817;

    color: #ffffff;

    text-align: center;

    font-size: 17px;

    line-height: 1;

    font-weight: 600;
}


/* =========================================================
   SMALL LABEL
========================================================= */

.small-red-label {
    display: inline-block;

    background: #e21b16;

    color: #ffffff;

    padding: 7px 14px;

    border-radius: 8px;

    font-size: 17px;

    font-weight: 900;
}

</style>
</head>


<body>

<div class="poster">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <section class="header">

        <div class="header-icon left">📢</div>

        <div class="header-icon right">🔔</div>

        <div class="main-title">

            आज की 2 नई

            <strong>
                सरकारी नौकरी अपडेट!
            </strong>

        </div>

        <div class="latest-badge">
            LATEST GOVERNMENT JOBS 2026
        </div>

    </section>



    <!-- =====================================================
         JOBS
    ====================================================== -->

    <section class="jobs-area">


        <!-- =================================================
             JOB 1
        ================================================== -->

        <article class="job-card purple">

            <div class="job-top">

                <img
                    class="job-logo"
                    src="images/cg-set.png"
                    alt="CG SET 2026"
                >

                <div class="job-heading">

                    <div class="job-title">
                        CG SET 2026
                    </div>

                    <div class="job-organization">
                        Chhattisgarh State Eligibility Test
                    </div>

                </div>

                <div class="job-badge">
                    NEW<br>
                    UPDATE!
                </div>

            </div>


            <div class="details">

                <div class="detail">

                    <div class="detail-icon">
                        🎓
                    </div>

                    <div class="detail-label">
                        योग्यता
                    </div>

                    <div class="detail-value">
                        Post Graduate
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        👥
                    </div>

                    <div class="detail-label">
                        पद
                    </div>

                    <div class="detail-value">
                        Various Posts
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        📅
                    </div>

                    <div class="detail-label">
                        अंतिम तिथि
                    </div>

                    <div class="detail-value">
                        20 अगस्त 2026
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        🌐
                    </div>

                    <div class="detail-label">
                        आवेदन प्रक्रिया
                    </div>

                    <div class="detail-value">
                        Online
                    </div>

                </div>

            </div>


            <div class="job-bottom">

                <div class="job-description">

                    📋 Post Graduate उम्मीदवारों के लिए
                    महत्वपूर्ण अवसर। पूरी जानकारी के लिए
                    आधिकारिक नोटिफिकेशन देखें।

                </div>

                <div class="apply-box">

                    <div class="apply-label">
                        APPLY MODE
                    </div>

                    <div class="apply-mode">
                        ONLINE
                    </div>

                </div>

            </div>

        </article>



        <!-- =================================================
             JOB 2
        ================================================== -->

        <article class="job-card blue">

            <div class="job-top">

                <img
                    class="job-logo"
                    src="images/railway.png"
                    alt="Indian Railway"
                >

                <div class="job-heading">

                    <div class="job-title">
                        RAILWAY<br>
                        RECRUITMENT 2026
                    </div>

                    <div class="job-organization">
                        Indian Railways
                    </div>

                </div>

                <div class="job-badge">
                    <span style="font-size:34px;">
                        3500+
                    </span>
                    <br>
                    POSTS
                </div>

            </div>


            <div class="details">

                <div class="detail">

                    <div class="detail-icon">
                        🎓
                    </div>

                    <div class="detail-label">
                        योग्यता
                    </div>

                    <div class="detail-value">
                        10th / ITI
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        👥
                    </div>

                    <div class="detail-label">
                        कुल पद
                    </div>

                    <div class="detail-value">
                        3500+
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        👤
                    </div>

                    <div class="detail-label">
                        आयु सीमा
                    </div>

                    <div class="detail-value">
                        18 - 33 वर्ष
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">
                        📅
                    </div>

                    <div class="detail-label">
                        अंतिम तिथि
                    </div>

                    <div class="detail-value">
                        25 अगस्त 2026
                    </div>

                </div>

            </div>


            <div class="job-bottom">

                <div class="job-description">

                    📋 10th / ITI पास उम्मीदवार
                    आवेदन कर सकते हैं। अधिक जानकारी के लिए
                    आधिकारिक नोटिफिकेशन देखें।

                </div>

                <div class="apply-box">

                    <div class="apply-label">
                        APPLY MODE
                    </div>

                    <div class="apply-mode">
                        ONLINE
                    </div>

                </div>

            </div>

        </article>


    </section>



    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="cta">

        <div class="website">

            <div class="website-label">
                🌐 पूरी जानकारी और Apply Link के लिए
            </div>

            <div class="website-name">
                SARKARIHAI.COM
            </div>

        </div>


        <div class="subscribe">

            <div class="subscribe-label">
                🔔 DAILY JOB UPDATES के लिए
            </div>

            <div class="subscribe-button">
                SUBSCRIBE NOW!
            </div>

        </div>

    </section>



    <!-- =====================================================
         SOCIAL
    ====================================================== -->

    <section class="social-bar">

        <div class="social-item">
            <span class="social-icon">👍</span>
            LIKE
        </div>

        <div class="social-item">
            <span class="social-icon">↗️</span>
            SHARE
        </div>

        <div class="social-item">
            <span class="social-icon">💬</span>
            COMMENT
        </div>

        <div class="social-item">
            <span class="social-icon">▶️</span>
            SUBSCRIBE
        </div>

    </section>



    <!-- =====================================================
         DISCLAIMER
    ====================================================== -->

    <footer class="disclaimer">

        जानकारी आधिकारिक नोटिफिकेशन के अनुसार ही जांचें।

    </footer>


</div>

</body>
</html>