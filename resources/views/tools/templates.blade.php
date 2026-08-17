<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080">
    <title>SarkariHai Shorts</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    min-height: 100%;
    background: #222;
}

body {
    font-family:
        "Noto Sans Devanagari",
        Arial,
        sans-serif;

    display: flex;
    justify-content: center;
    align-items: flex-start;
}


/* =========================================================
   MAIN CANVAS
========================================================= */

.poster {
    width: 1080px;
    height: 1920px;

    overflow: hidden;

    background: #071532;

    color: #111;

    position: relative;
}


/* =========================================================
   HEADER
========================================================= */

.header {
    height: 305px;

    position: relative;

    padding-top: 20px;

    text-align: center;

    background:
        radial-gradient(
            circle at 90% 10%,
            rgba(30,65,120,.25),
            transparent 30%
        ),
        linear-gradient(
            180deg,
            #020916 0%,
            #071532 100%
        );

    overflow: hidden;
}


/* subtle dots */

.header::after {
    content: "";

    position: absolute;

    right: 25px;
    top: 20px;

    width: 190px;
    height: 150px;

    opacity: .18;

    background-image:
        radial-gradient(#7c91b8 1px, transparent 1px);

    background-size: 12px 12px;
}


/* megaphone */

.megaphone {
    position: absolute;

    left: 25px;
    top: 25px;

    font-size: 75px;

    z-index: 5;

    filter:
        drop-shadow(3px 5px 0 #000);
}


/* notification */

.notification {
    position: absolute;

    right: 25px;
    top: 22px;

    font-size: 70px;

    z-index: 5;

    filter:
        drop-shadow(3px 5px 0 #000);
}

.notification span {
    position: absolute;

    top: 0;
    right: -5px;

    background: #ed2018;

    color: white;

    font-size: 16px;

    padding: 9px 11px;

    border-radius: 50%;

    font-weight: 900;
}


/* heading */

.header h1 {
    position: relative;

    z-index: 10;

    color: white;

    font-family:
        "Noto Sans Devanagari",
        Arial,
        sans-serif;

    font-size: 61px;

    line-height: 1.03;

    font-weight: 900;

    text-shadow:
        3px 3px 0 #000,
        0 6px 10px rgba(0,0,0,.45);
}

.header h1 strong {
    display: block;

    color: #ffd400;

    font-size: 73px;

    line-height: 1.05;

    font-weight: 900;

    text-shadow:
        4px 4px 0 #000;
}


/* latest badge */

.latest {
    position: relative;

    z-index: 10;

    display: inline-block;

    margin-top: 13px;

    padding: 10px 43px;

    background: #e51c17;

    color: white;

    border-radius: 35px;

    font-family: Arial, sans-serif;

    font-size: 29px;

    line-height: 1;

    font-weight: 900;

    box-shadow:
        0 4px 0 rgba(0,0,0,.35);
}


/* =========================================================
   JOB CARD
========================================================= */

.job-card {
    width: calc(100% - 44px);

    margin-left: 22px;

    background: #fff;

    border-radius: 25px;

    overflow: hidden;

    margin-bottom: 20px;

    box-shadow:
        0 5px 12px rgba(0,0,0,.25);
}

.job-card.purple {
    border: 4px solid #8c52d6;
}

.job-card.blue {
    border: 4px solid #376bd5;
}


/* =========================================================
   JOB HEADER
========================================================= */

.job-header {
    height: 190px;

    display: flex;

    align-items: center;

    gap: 17px;

    padding: 20px 22px;
}


/* logo */

.logo-box {
    width: 130px;
    height: 130px;

    flex: 0 0 130px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background: white;

    overflow: hidden;
}

.logo-box img {
    width: 120px;
    height: 120px;

    object-fit: contain;
}


/* heading */

.job-heading {
    flex: 1;

    min-width: 0;
}

.job-heading h2 {
    font-family: Arial, sans-serif;

    font-size: 57px;

    line-height: .96;

    font-weight: 900;

    letter-spacing: -1px;
}

.purple .job-heading h2 {
    color: #531b9d;
}

.blue .job-heading h2 {
    color: #1746a3;
}

.job-heading p {
    margin-top: 9px;

    font-size: 27px;

    line-height: 1.05;

    font-weight: 700;

    color: #111;
}


/* =========================================================
   BADGES
========================================================= */

.update-badge {
    width: 145px;
    height: 92px;

    flex: 0 0 145px;

    display: flex;

    flex-direction: column;

    justify-content: center;
    align-items: center;

    text-align: center;

    border-radius: 17px;

    background: #df1b18;

    color: white;

    font-size: 23px;

    font-weight: 900;

    line-height: 1.05;
}

.update-badge span {
    font-size: 29px;
}


.posts-badge {
    width: 155px;
    height: 105px;

    flex: 0 0 155px;

    display: flex;

    flex-direction: column;

    justify-content: center;
    align-items: center;

    text-align: center;

    border-radius: 16px;

    background: #e51b17;

    color: #ffd400;
}

.posts-badge strong {
    font-family: Arial, sans-serif;

    font-size: 40px;

    line-height: 1;

    font-weight: 900;
}

.posts-badge span {
    margin-top: 4px;

    color: white;

    font-family: Arial, sans-serif;

    font-size: 25px;

    font-weight: 900;
}


/* =========================================================
   DETAILS
========================================================= */

.job-details {
    margin: 0 20px;

    min-height: 125px;

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    border-top: 2px solid #ddd;

    border-bottom: 2px solid #ddd;
}

.detail {
    min-width: 0;

    padding: 10px 8px;

    display: flex;

    flex-direction: column;

    justify-content: center;

    align-items: center;

    text-align: center;

    border-right: 2px solid #ddd;
}

.detail:last-child {
    border-right: 0;
}


.detail .icon {
    font-size: 36px;

    line-height: 1;

    margin-bottom: 5px;
}

.detail b {
    font-size: 21px;

    line-height: 1.05;

    font-weight: 900;

    margin-bottom: 5px;
}

.purple .detail b {
    color: #531b9d;
}

.blue .detail b {
    color: #1746a3;
}

.detail span {
    font-size: 20px;

    line-height: 1.1;

    font-weight: 800;

    color: #111;
}


/* =========================================================
   JOB BOTTOM
========================================================= */

.job-footer {
    margin: 15px 20px 19px;

    min-height: 105px;

    display: flex;

    align-items: center;

    gap: 15px;

    padding: 13px 15px;

    border-radius: 17px;
}

.purple .job-footer {
    background: #f0eafa;
}

.blue .job-footer {
    background: #edf3ff;
}


.job-description {
    flex: 1;

    display: flex;

    align-items: center;

    gap: 15px;
}

.description-icon {
    width: 65px;
    height: 65px;

    flex: 0 0 65px;

    display: flex;

    justify-content: center;
    align-items: center;

    color: white;

    border-radius: 11px;

    font-family: Arial, sans-serif;

    font-size: 38px;

    font-weight: 900;
}

.purple .description-icon {
    background: #5519a0;
}

.blue .description-icon {
    background: #1747a2;
}

.job-description p {
    font-size: 22px;

    line-height: 1.28;

    font-weight: 700;

    color: #171717;
}


/* =========================================================
   APPLY
========================================================= */

.apply {
    width: 245px;

    flex: 0 0 245px;

    padding: 15px 8px;

    border-radius: 14px;

    color: white;

    text-align: center;
}

.purple-bg {
    background: #5518a0;
}

.blue-bg {
    background: #1647a5;
}

.apply small {
    display: block;

    font-family: Arial, sans-serif;

    font-size: 21px;

    line-height: 1;

    font-weight: 800;
}

.apply strong {
    display: block;

    margin-top: 4px;

    font-family: Arial, sans-serif;

    font-size: 35px;

    line-height: 1;

    font-weight: 900;
}


/* =========================================================
   CTA
========================================================= */

.cta {
    height: 140px;

    display: flex;

    align-items: center;

    background:
        linear-gradient(
            90deg,
            #ffd400 0%,
            #ffd400 58%,
            #e31c17 58%,
            #e31c17 100%
        );
}


.website {
    width: 58%;

    padding-left: 40px;
}

.website small {
    display: block;

    color: #171717;

    font-size: 21px;

    font-weight: 800;
}

.website strong {
    display: block;

    margin-top: 4px;

    color: #111;

    font-family: Arial, sans-serif;

    font-size: 44px;

    line-height: 1;

    font-weight: 900;
}


.subscribe {
    width: 42%;

    text-align: center;

    color: white;
}

.subscribe p {
    font-size: 22px;

    line-height: 1;

    font-weight: 800;
}

.subscribe strong {
    display: inline-block;

    margin-top: 8px;

    padding: 10px 30px;

    border-radius: 30px;

    background: #ffd400;

    color: #111;

    font-family: Arial, sans-serif;

    font-size: 25px;

    line-height: 1;

    font-weight: 900;
}


/* =========================================================
   SOCIAL BAR
========================================================= */

.social {
    height: 82px;

    display: flex;

    justify-content: space-around;

    align-items: center;

    background: #06112b;

    color: white;
}

.social div {
    display: flex;

    align-items: center;

    gap: 6px;

    font-size: 23px;

    font-weight: 800;
}

.social i {
    font-style: normal;

    font-size: 32px;
}


/* =========================================================
   DISCLAIMER
========================================================= */

footer {
    height: 57px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    background: #020817;

    color: white;

    font-size: 17px;

    font-weight: 600;

    text-align: center;
}

footer span {
    width: 27px;
    height: 27px;

    display: inline-flex;

    justify-content: center;
    align-items: center;

    border-radius: 50%;

    background: #20a94b;

    color: white;

    font-family: Arial, sans-serif;

    font-size: 17px;

    font-weight: 900;
}


/* =========================================================
   RESPONSIVE PREVIEW
========================================================= */

@media screen and (max-width: 1080px) {

    .poster {
        transform-origin: top center;

        transform:
            scale(calc(100vw / 1080));
    }

    body {
        overflow-x: hidden;
    }
}
        </style>
</head>

<body>

<div class="poster">

    <!-- ================= HEADER ================= -->

    <header class="header">

        <div class="megaphone">📢</div>

        <div class="notification">
            🔔
            <span>NEW</span>
        </div>

        <h1>
            आज की 2 नई
            <strong>सरकारी नौकरी अपडेट!</strong>
        </h1>

        <div class="latest">
            LATEST GOVERNMENT JOBS 2026
        </div>

    </header>


    <!-- ================= JOB 1 ================= -->

    <section class="job-card purple">

        <div class="job-header">

            <div class="logo-box">
                <img src="logo1.png" alt="Organization Logo">
            </div>

            <div class="job-heading">

                <h2>CG SET 2026</h2>

                <p>
                    Chhattisgarh State Eligibility Test
                </p>

            </div>

            <div class="update-badge">
                <span>NEW</span>
                UPDATE!
            </div>

        </div>


        <div class="job-details">

            <div class="detail">
                <div class="icon">🎓</div>
                <b>योग्यता</b>
                <span>Post Graduate</span>
            </div>

            <div class="detail">
                <div class="icon">👥</div>
                <b>पद</b>
                <span>Various Posts</span>
            </div>

            <div class="detail">
                <div class="icon">📅</div>
                <b>अंतिम तिथि</b>
                <span>20 अगस्त 2026</span>
            </div>

            <div class="detail">
                <div class="icon">🌐</div>
                <b>आवेदन प्रक्रिया</b>
                <span>Online</span>
            </div>

        </div>


        <div class="job-footer">

            <div class="job-description">
                <div class="description-icon">▣</div>

                <p>
                    Post Graduate उम्मीदवारों के लिए
                    सुनहरा अवसर। पूरी जानकारी के लिए
                    आधिकारिक नोटिफिकेशन देखें।
                </p>
            </div>

            <div class="apply purple-bg">
                <small>APPLY MODE</small>
                <strong>ONLINE</strong>
            </div>

        </div>

    </section>


    <!-- ================= JOB 2 ================= -->

    <section class="job-card blue">

        <div class="job-header">

            <div class="logo-box">
                <img src="logo2.png" alt="Organization Logo">
            </div>

            <div class="job-heading">

                <h2>RAILWAY<br>RECRUITMENT 2026</h2>

                <p>
                    Indian Railways
                </p>

            </div>

            <div class="posts-badge">
                <strong>3500+</strong>
                <span>POSTS</span>
            </div>

        </div>


        <div class="job-details">

            <div class="detail">
                <div class="icon">🎓</div>
                <b>योग्यता</b>
                <span>10th / ITI</span>
            </div>

            <div class="detail">
                <div class="icon">👥</div>
                <b>कुल पद</b>
                <span>3500+</span>
            </div>

            <div class="detail">
                <div class="icon">👤</div>
                <b>आयु सीमा</b>
                <span>18 - 33 वर्ष</span>
            </div>

            <div class="detail">
                <div class="icon">📅</div>
                <b>अंतिम तिथि</b>
                <span>25 अगस्त 2026</span>
            </div>

        </div>


        <div class="job-footer">

            <div class="job-description">
                <div class="description-icon">▣</div>

                <p>
                    10th / ITI पास उम्मीदवार
                    आवेदन कर सकते हैं। अधिक जानकारी के लिए
                    आधिकारिक नोटिफिकेशन देखें।
                </p>
            </div>

            <div class="apply blue-bg">
                <small>APPLY MODE</small>
                <strong>ONLINE</strong>
            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->

    <section class="cta">

        <div class="website">

            <small>
                🌐 पूरी जानकारी और Apply Link के लिए
            </small>

            <strong>
                SARKARIHAI.COM
            </strong>

        </div>


        <div class="subscribe">

            <p>
                🔔 DAILY JOB UPDATES के लिए
            </p>

            <strong>
                SUBSCRIBE NOW!
            </strong>

        </div>

    </section>


    <!-- ================= SOCIAL ================= -->

    <section class="social">

        <div>
            <i>👍</i>
            LIKE करें
        </div>

        <div>
            <i>↗</i>
            SHARE करें
        </div>

        <div>
            <i>💬</i>
            COMMENT करें
        </div>

        <div>
            <i>▶</i>
            SUBSCRIBE करें
        </div>

    </section>


    <!-- ================= DISCLAIMER ================= -->

    <footer>

        <span>✓</span>

        हम किसी भर्ती एजेंसी नहीं हैं |
        अधिक जानकारी के लिए ऑफिशियल नोटिफिकेशन जरूर देखें!

    </footer>

</div>

</body>
</html>