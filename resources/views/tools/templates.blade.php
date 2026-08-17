
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1024, initial-scale=1.0">
<title>SarkariHai - Daily Government Jobs</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700;800;900&family=Roboto+Condensed:wght@400;700;900&display=swap');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html,
body {
    width: 100%;
    min-height: 100%;
    background: #111;
}

body {
    font-family: "Noto Sans Devanagari", Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

/* =========================================================
   EXACT REFERENCE CANVAS
   Reference image = 1024 x 1536
========================================================= */

.poster {
    width: 1080px;
    height: 1920px;
    overflow: hidden;
    position: relative;
    background:
        radial-gradient(circle at 80% 8%, rgba(18,55,105,.28), transparent 18%),
        radial-gradient(circle at 15% 30%, rgba(13,48,98,.20), transparent 22%),
        #06122c;
}

/* =========================================================
   HERO
========================================================= */

.hero {
    height: 310px;
    position: relative;
    text-align: center;
    overflow: hidden;

    background:
        radial-gradient(#193158 1px, transparent 1px),
        linear-gradient(180deg, #020815 0%, #06132d 100%);

    background-size: 12px 12px, auto;
}

.hero-megaphone {
    position: absolute;
    left: 12px;
    top: 7px;
    width: 205px;
    height: 155px;
    object-fit: contain;
    z-index: 4;
}

.hero-bell {
    position: absolute;
    right: 8px;
    top: 9px;
    width: 145px;
    height: 145px;
    object-fit: contain;
    z-index: 4;
}

.hero h1 {
    position: relative;
    z-index: 3;

    padding-top: 10px;

    color: #fff;

    font-size: 62px;
    line-height: .98;
    font-weight: 900;

    text-shadow:
        3px 4px 0 #000,
        0 7px 9px rgba(0,0,0,.45);
}

.hero h1 strong {
    display: block;

    margin-top: 3px;

    color: #ffd400;

    font-size: 73px;
    line-height: 1.02;
    font-weight: 900;

    text-shadow:
        4px 4px 0 #000,
        0 7px 10px rgba(0,0,0,.5);
}

.latest {
    position: absolute;
    left: 190px;
    bottom: 8px;

    width: 675px;
    height: 51px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e51b17;

    color: #fff;

    font-family: Arial, sans-serif;
    font-size: 31px;
    font-weight: 900;

    border-radius: 10px;

    box-shadow:
        0 4px 0 #a30e0b;
}

/* =========================================================
   JOB CARD
========================================================= */

.job-card {
    position: relative;

    width: 982px;

    margin-left: 21px;

    background: #fff;

    border-radius: 23px;

    overflow: hidden;
}

.purple-card {
    height: 490px;
    border: 3px solid #a13be8;
    margin-top: 0;
}

.blue-card {
    height: 475px;
    border: 3px solid #3065db;
    margin-top: 15px;
}

/* =========================================================
   JOB TOP
========================================================= */

.job-top {
    height: 205px;

    display: flex;
    align-items: center;

    padding: 14px 21px;

    gap: 17px;
}

.org-logo {
    width: 205px;
    height: 190px;

    flex: 0 0 205px;

    object-fit: contain;
}

.job-title-area {
    flex: 1;
    min-width: 0;
}

.job-title-area h2 {
    font-family: "Roboto Condensed", Arial, sans-serif;
    font-size: 63px;
    line-height: .9;
    font-weight: 900;
    color: #5518a0;
    letter-spacing: -1px;
}

.job-title-area p {
    margin-top: 10px;
    font-family: Arial, sans-serif;
    font-size: 29px;
    line-height: 1.05;
    font-weight: 700;
    color: #111;
}

.update-flame {
    width: 165px;
    height: 165px;
    object-fit: contain;
    flex: 0 0 165px;
}

/* =========================================================
   RAILWAY TOP
========================================================= */

.railway-top {
    height: 220px;
}

.railway-top .job-title-area h2 {
    color: #1744a2;
    font-size: 62px;
}

.railway-top .job-title-area h3 {
    margin-top: 1px;
    color: #1744a2;
    font-family: "Roboto Condensed", Arial, sans-serif;
    font-size: 44px;
    line-height: .98;
    font-weight: 900;
}

.rail-label {
    display: inline-block;

    margin-top: 8px;

    padding: 5px 27px;

    background: #1747a3;
    color: #fff;

    font-family: Arial, sans-serif;
    font-size: 24px;
    font-weight: 700;

    clip-path: polygon(
        0 0,
        91% 0,
        100% 50%,
        91% 100%,
        0 100%
    );
}

.posts-badge {
    width: 205px;
    height: 122px;

    flex: 0 0 205px;

    border-radius: 17px;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    background: #e31b17;

    color: #fff;
}

.posts-badge strong {
    color: #ffd400;

    font-family: Arial, sans-serif;
    font-size: 44px;
    line-height: 1;
    font-weight: 900;
}

.posts-badge span {
    margin-top: 4px;

    font-family: Arial, sans-serif;
    font-size: 28px;
    line-height: 1;
    font-weight: 900;
}

/* =========================================================
   DETAILS
========================================================= */

.details {
    margin: 0 14px;

    display: grid;

    border: 2px solid #9b8ab4;

    border-radius: 14px;

    overflow: hidden;
}

.details-4 {
    height: 117px;
    grid-template-columns: repeat(4, 1fr);
}

.details-5 {
    height: 105px;
    grid-template-columns: repeat(5, 1fr);
}

.detail {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 10px;

    padding: 7px 6px;

    border-right: 2px solid #aaa;

    background: #fff;
}

.detail:last-child {
    border-right: 0;
}

.detail img {
    width: 64px;
    height: 75px;

    object-fit: contain;

    flex: 0 0 64px;
}

.details-5 .detail img {
    width: 57px;
    height: 67px;
    flex-basis: 57px;
}

.detail div {
    min-width: 0;
}

.detail b {
    display: block;

    font-size: 23px;
    line-height: 1.05;

    font-weight: 900;

    color: #5518a0;

    white-space: nowrap;
}

.detail b.green {
    color: #168a1c;
}

.detail b.red {
    color: #e11b16;
}

.detail b.blue {
    color: #183e99;
}

.detail b.orange {
    color: #ee8a10;
}

.detail span {
    display: block;

    margin-top: 5px;

    color: #111;

    font-family: Arial, sans-serif;

    font-size: 20px;
    line-height: 1.05;

    font-weight: 700;

    white-space: nowrap;
}

/* =========================================================
   JOB BOTTOM
========================================================= */

.job-bottom {
    height: 138px;

    margin: 12px 14px 0;

    padding: 10px 13px;

    display: flex;
    align-items: center;

    gap: 15px;

    border-radius: 17px;

    background: #eee4f5;
}

.blue-card .job-bottom {
    background: #e9f0ff;
}

.description {
    flex: 1;

    display: flex;
    align-items: center;

    gap: 17px;
}

.description img {
    width: 80px;
    height: 90px;

    object-fit: contain;

    flex: 0 0 80px;
}

.description p {
    font-size: 22px;
    line-height: 1.28;

    font-weight: 700;

    color: #111;
}

.apply {
    width: 285px;
    height: 105px;

    flex: 0 0 285px;

    border-radius: 14px;

    display: flex;
    flex-direction: column;

    justify-content: center;
    align-items: center;

    color: #fff;
}

.apply.purple {
    background: #5617a1;
}

.apply.blue {
    background: #1747a3;
}

.apply small {
    font-family: Arial, sans-serif;

    font-size: 24px;
    line-height: 1;

    font-weight: 800;
}

.apply strong {
    margin-top: 5px;

    font-family: Arial, sans-serif;

    font-size: 38px;
    line-height: 1;

    font-weight: 900;
}

/* =========================================================
   CTA
========================================================= */

.cta {
    height: 126px;

    display: flex;
}

.cta-left {
    width: 58%;

    display: flex;
    align-items: center;

    padding-left: 25px;

    background: #ffd400;
}

.cta-left img {
    width: 102px;
    height: 102px;
    object-fit: contain;

    margin-right: 8px;
}

.cta-left small {
    display: block;

    font-size: 22px;
    line-height: 1.1;

    font-weight: 800;
}

.cta-left strong {
    display: block;

    margin-top: 4px;

    font-family: "Roboto Condensed", Arial, sans-serif;

    font-size: 43px;
    line-height: 1;

    font-weight: 900;
}

.cta-right {
    width: 42%;

    display: flex;
    align-items: center;

    justify-content: center;

    background: #e51b17;

    color: #fff;
}

.cta-right img {
    width: 68px;
    height: 88px;
    object-fit: contain;

    margin-right: 8px;
}

.cta-right p {
    font-size: 21px;
    line-height: 1.05;
    font-weight: 800;
}

.cta-right strong {
    display: inline-block;

    margin-top: 8px;

    padding: 8px 25px;

    border-radius: 30px;

    background: #ffd400;

    color: #111;

    font-family: Arial, sans-serif;

    font-size: 24px;
    line-height: 1;

    font-weight: 900;
}

/* =========================================================
   SOCIAL
========================================================= */

.social {
    height: 75px;

    display: flex;
    align-items: center;
    justify-content: space-evenly;

    background: #020b21;

    color: #fff;
}

.social > div {
    display: flex;
    align-items: center;

    gap: 7px;

    font-family: Arial, sans-serif;

    font-size: 22px;
    font-weight: 700;
}

.social img {
    width: 48px;
    height: 48px;

    object-fit: contain;
}

.social i {
    height: 44px;
    width: 1px;

    background: rgba(255,255,255,.7);
}

/* =========================================================
   DISCLAIMER
========================================================= */

footer {
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    background: #020916;

    color: #fff;

    font-size: 17px;
    line-height: 1;

    font-weight: 600;
}

footer img {
    width: 30px;
    height: 30px;
    object-fit: contain;
}

/* =========================================================
   SCREEN PREVIEW
========================================================= */

@media (max-width: 1024px) {
    .poster {
        transform-origin: top center;
        transform: scale(calc(100vw / 1024));
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
    <header class="hero">

        <img class="hero-megaphone" src="https://sarkarihai.com/public/images/temp/megaphone.png" alt="">
        <img class="hero-bell" src="https://sarkarihai.com/public/images/temp/bell.png" alt="">

        <h1>
            आज की 2 नई
            <strong>सरकारी नौकरी अपडेट!</strong>
        </h1>

        <div class="latest">
            LATEST GOVERNMENT JOBS 2026
        </div>

    </header>


    <!-- ================= JOB 1 ================= -->
    <section class="job-card purple-card">

        <div class="job-top">

            <img class="org-logo" src="https://sarkarihai.com/public/images/temp/cg_logo.png" alt="CG SET">

            <div class="job-title-area">
                <h2>CG SET 2026</h2>
                <p>Chhattisgarh State Eligibility Test</p>
            </div>

            <img class="update-flame" src="https://sarkarihai.com/public/images/temp/new_flame.png" alt="New Update">

        </div>


        <div class="details details-4">

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/grad_purple.png" alt="">
                <div>
                    <b>योग्यता</b>
                    <span>Post Graduate</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/people_green.png" alt="">
                <div>
                    <b class="green">पद</b>
                    <span>Various Posts</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/calendar_red.png" alt="">
                <div>
                    <b class="red">अंतिम तिथि</b>
                    <span>20 अगस्त 2026</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/globe_blue.png" alt="">
                <div>
                    <b class="blue">आवेदन प्रक्रिया</b>
                    <span>Online</span>
                </div>
            </div>

        </div>


        <div class="job-bottom">

            <div class="description">
                <img src="https://sarkarihai.com/public/images/temp/document_purple.png" alt="">
                <p>
                    Post Graduate उम्मीदवारों के लिए<br>
                    सुनहरा अवसर। पूरी जानकारी के लिए<br>
                    आधिकारिक नोटिफिकेशन देखें।
                </p>
            </div>

            <div class="apply purple">
                <small>APPLY MODE</small>
                <strong>ONLINE</strong>
            </div>

        </div>

    </section>


    <!-- ================= JOB 2 ================= -->
    <section class="job-card blue-card">

        <div class="job-top railway-top">

            <img class="org-logo" src="https://sarkarihai.com/public/images/temp/rail_logo.png" alt="Indian Railways">

            <div class="job-title-area">
                <h2>RAILWAY</h2>
                <h3>RECRUITMENT 2026</h3>

                <div class="rail-label">
                    Indian Railways
                </div>
            </div>

            <div class="posts-badge">
                <strong>3500+</strong>
                <span>POSTS</span>
            </div>

        </div>


        <div class="details details-5">

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/grad_blue.png" alt="">
                <div>
                    <b>योग्यता</b>
                    <span>10th / ITI</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/people_green2.png" alt="">
                <div>
                    <b class="green">कुल पद</b>
                    <span>3500+</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/person_orange.png" alt="">
                <div>
                    <b class="orange">आयु सीमा</b>
                    <span>18 - 33 वर्ष</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/calendar_red2.png" alt="">
                <div>
                    <b class="red">अंतिम तिथि</b>
                    <span>25 अगस्त 2026</span>
                </div>
            </div>

            <div class="detail">
                <img src="https://sarkarihai.com/public/images/temp/globe_blue2.png" alt="">
                <div>
                    <b class="blue">आवेदन प्रक्रिया</b>
                    <span>Online</span>
                </div>
            </div>

        </div>


        <div class="job-bottom">

            <div class="description">
                <img src="https://sarkarihai.com/public/images/temp/document_blue.png" alt="">
                <p>
                    10th / ITI पास उम्मीदवार आवेदन कर सकते हैं।<br>
                    अधिक जानकारी के लिए ऑफिशियल नोटिफिकेशन देखें।
                </p>
            </div>

            <div class="apply blue">
                <small>APPLY MODE</small>
                <strong>ONLINE</strong>
            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->
    <section class="cta">

        <div class="cta-left">
            <img src="https://sarkarihai.com/public/images/temp/footer_globe.png" alt="">
            <div>
                <small>पूरी जानकारी और Apply Link के लिए</small>
                <strong>SARKARIHAI.COM</strong>
            </div>
        </div>

        <div class="cta-right">
            <img src="https://sarkarihai.com/public/images/temp/footer_bell.png" alt="">
            <div>
                <p>DAILY JOB UPDATES के लिए</p>
                <strong>SUBSCRIBE NOW!</strong>
            </div>
        </div>

    </section>


    <!-- ================= SOCIAL ================= -->
    <section class="social">

        <div>
            <img src="https://sarkarihai.com/public/images/temp/like.png" alt="">
            <span>LIKE करें</span>
        </div>

        <i></i>

        <div>
            <img src="https://sarkarihai.com/public/images/temp/share.png" alt="">
            <span>SHARE करें</span>
        </div>

        <i></i>

        <div>
            <img src="https://sarkarihai.com/public/images/temp/comment.png" alt="">
            <span>COMMENT करें</span>
        </div>

        <i></i>

        <div>
            <img src="https://sarkarihai.com/public/images/temp/youtube.png" alt="">
            <span>SUBSCRIBE करें</span>
        </div>

    </section>


    <!-- ================= DISCLAIMER ================= -->
    <footer>
        <img src="https://sarkarihai.com/public/images/temp/check.png" alt="">
        <span>
            हम किसी भर्ती एजेंसी नहीं हैं |
            अधिक जानकारी के लिए ऑफिशियल नोटिफिकेशन जरूर देखें!
        </span>
    </footer>

</div>

</body>
</html>
