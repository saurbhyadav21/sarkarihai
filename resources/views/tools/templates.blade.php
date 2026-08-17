<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080, initial-scale=1.0">

    <title>SarkariHai Job Shorts</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #222;
            font-family: Arial, "Noto Sans Devanagari", sans-serif;
        }

        .short {
            width: 1080px;
            height: 1920px;
            margin: auto;
            overflow: hidden;
            background: #06112b;
            color: #111;
        }

        /* =========================
           HEADER
        ========================== */

        .header {
            height: 300px;
            padding: 25px 45px 15px;
            background: linear-gradient(135deg, #020817, #071a3e);
            color: white;
            text-align: center;
            position: relative;
        }

        .header .icon-left {
            position: absolute;
            left: 25px;
            top: 35px;
            font-size: 75px;
        }

        .header .icon-right {
            position: absolute;
            right: 25px;
            top: 35px;
            font-size: 65px;
        }

        .hook {
            font-size: 62px;
            font-weight: 900;
            line-height: 1.15;
            color: white;
            text-shadow: 3px 4px 0 #000;
            padding: 0 90px;
        }

        .hook span {
            display: block;
            color: #ffd400;
            font-size: 72px;
            margin-top: 4px;
        }

        .sub-title {
            display: inline-block;
            margin-top: 14px;
            padding: 10px 45px;
            background: #e21c12;
            color: white;
            border-radius: 35px;
            font-size: 30px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        /* =========================
           JOB CARD
        ========================== */

        .jobs {
            padding: 28px 22px 0;
            background: #06112b;
        }

        .job-card {
            background: #fff;
            border-radius: 24px;
            margin-bottom: 25px;
            padding: 25px 28px 22px;
            border: 4px solid #d6d6d6;
            overflow: hidden;
        }

        .job-card.purple {
            border-color: #8d50d8;
        }

        .job-card.blue {
            border-color: #356bdc;
        }

        .job-head {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: contain;
            background: white;
            border: 3px solid #ddd;
            padding: 7px;
        }

        .job-title-box {
            flex: 1;
        }

        .job-title {
            font-size: 58px;
            line-height: 1;
            font-weight: 950;
            color: #4e1b9e;
            margin-bottom: 10px;
        }

        .blue .job-title {
            color: #1745a3;
        }

        .organization {
            font-size: 28px;
            font-weight: 700;
            color: #222;
            line-height: 1.2;
        }

        .badge {
            padding: 18px 20px;
            background: #df1b18;
            color: white;
            border-radius: 15px;
            font-size: 27px;
            font-weight: 900;
            text-align: center;
            min-width: 145px;
        }

        .badge.yellow {
            background: #e51b17;
            color: #ffd400;
        }

        /* =========================
           DETAILS
        ========================== */

        .details-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
            margin-top: 20px;
            padding: 20px 0;
        }

        .detail {
            text-align: center;
            border-right: 2px solid #ddd;
            padding: 0 8px;
        }

        .detail:last-child {
            border-right: none;
        }

        .detail-icon {
            font-size: 38px;
            margin-bottom: 5px;
        }

        .detail-label {
            font-size: 21px;
            font-weight: 900;
            color: #4d1b9a;
            margin-bottom: 5px;
        }

        .blue .detail-label {
            color: #12459e;
        }

        .detail-value {
            font-size: 22px;
            font-weight: 800;
            line-height: 1.15;
        }

        /* =========================
           DESCRIPTION
        ========================== */

        .job-bottom {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 18px;
            background: #f0eafa;
            border-radius: 18px;
            padding: 18px;
        }

        .blue .job-bottom {
            background: #edf3ff;
        }

        .description {
            flex: 1;
            font-size: 23px;
            line-height: 1.35;
            font-weight: 700;
        }

        .apply {
            width: 230px;
            padding: 18px 10px;
            background: #5416a0;
            color: white;
            border-radius: 15px;
            text-align: center;
            font-size: 23px;
            font-weight: 900;
        }

        .blue .apply {
            background: #123fa1;
        }

        .apply strong {
            display: block;
            font-size: 32px;
            margin-top: 3px;
        }

        /* =========================
           FOOTER
        ========================== */

        .footer-main {
            height: 135px;
            display: flex;
            align-items: center;
            background: linear-gradient(90deg, #ffd400, #ffbd00 50%, #e71b14 50%);
        }

        .website {
            width: 58%;
            padding-left: 40px;
            font-weight: 900;
        }

        .website-small {
            font-size: 22px;
            margin-bottom: 4px;
        }

        .website-name {
            font-size: 43px;
            color: #111;
            font-weight: 950;
        }

        .subscribe {
            width: 42%;
            text-align: center;
            color: white;
        }

        .subscribe-small {
            font-size: 23px;
            font-weight: 800;
        }

        .subscribe-button {
            display: inline-block;
            background: #ffd400;
            color: #111;
            padding: 10px 30px;
            border-radius: 30px;
            margin-top: 6px;
            font-size: 26px;
            font-weight: 950;
        }

        .social {
            height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background: #07122c;
            color: white;
        }

        .social-item {
            font-size: 25px;
            font-weight: 800;
            text-align: center;
        }

        .social-icon {
            font-size: 32px;
            margin-right: 5px;
        }

        .disclaimer {
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #020817;
            color: white;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }

        /* =========================
           PRINT
        ========================== */

        @media print {
            body {
                background: white;
            }

            .short {
                margin: 0;
            }
        }
    </style>
</head>

<body>

<div class="short">

    <!-- =========================
         HEADER / HOOK
    ========================== -->

    <div class="header">

        <div class="icon-left">📢</div>
        <div class="icon-right">🔔</div>

        <div class="hook">
            आज की 2 नई
            <span>सरकारी नौकरी अपडेट!</span>
        </div>

        <div class="sub-title">
            LATEST GOVERNMENT JOBS 2026
        </div>

    </div>


    <!-- =========================
         JOBS
    ========================== -->

    <div class="jobs">


        <!-- =====================
             JOB 1
        ====================== -->

        <div class="job-card purple">

            <div class="job-head">

                <img
                    class="logo"
                    src="images/cg-set.png"
                    alt="CG SET">

                <div class="job-title-box">

                    <div class="job-title">
                        CG SET 2026
                    </div>

                    <div class="organization">
                        Chhattisgarh State Eligibility Test
                    </div>

                </div>

                <div class="badge">
                    NEW<br>
                    UPDATE!
                </div>

            </div>


            <div class="details-grid">

                <div class="detail">

                    <div class="detail-icon">🎓</div>

                    <div class="detail-label">
                        योग्यता
                    </div>

                    <div class="detail-value">
                        Post Graduate
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">👥</div>

                    <div class="detail-label">
                        पद
                    </div>

                    <div class="detail-value">
                        Various Posts
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">📅</div>

                    <div class="detail-label">
                        अंतिम तिथि
                    </div>

                    <div class="detail-value">
                        20 अगस्त 2026
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">🌐</div>

                    <div class="detail-label">
                        आवेदन प्रक्रिया
                    </div>

                    <div class="detail-value">
                        Online
                    </div>

                </div>

            </div>


            <div class="job-bottom">

                <div class="description">
                    📋 Post Graduate उम्मीदवारों के लिए
                    सुनहरा अवसर। पूरी जानकारी के लिए
                    आधिकारिक नोटिफिकेशन देखें।
                </div>

                <div class="apply">
                    APPLY MODE
                    <strong>ONLINE</strong>
                </div>

            </div>

        </div>


        <!-- =====================
             JOB 2
        ====================== -->

        <div class="job-card blue">

            <div class="job-head">

                <img
                    class="logo"
                    src="images/railway.png"
                    alt="Indian Railways">

                <div class="job-title-box">

                    <div class="job-title">
                        RAILWAY
                        <br>
                        RECRUITMENT 2026
                    </div>

                    <div class="organization">
                        Indian Railways
                    </div>

                </div>

                <div class="badge yellow">
                    3500+<br>
                    POSTS
                </div>

            </div>


            <div class="details-grid">

                <div class="detail">

                    <div class="detail-icon">🎓</div>

                    <div class="detail-label">
                        योग्यता
                    </div>

                    <div class="detail-value">
                        10th / ITI
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">👥</div>

                    <div class="detail-label">
                        कुल पद
                    </div>

                    <div class="detail-value">
                        3500+
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">👤</div>

                    <div class="detail-label">
                        आयु सीमा
                    </div>

                    <div class="detail-value">
                        18 - 33 वर्ष
                    </div>

                </div>


                <div class="detail">

                    <div class="detail-icon">📅</div>

                    <div class="detail-label">
                        अंतिम तिथि
                    </div>

                    <div class="detail-value">
                        25 अगस्त 2026
                    </div>

                </div>

            </div>


            <div class="job-bottom">

                <div class="description">
                    📋 10th / ITI पास उम्मीदवार
                    आवेदन कर सकते हैं। अधिक जानकारी
                    के लिए आधिकारिक नोटिफिकेशन देखें।
                </div>

                <div class="apply">
                    APPLY MODE
                    <strong>ONLINE</strong>
                </div>

            </div>

        </div>

    </div>


    <!-- =========================
         WEBSITE / CTA
    ========================== -->

    <div class="footer-main">

        <div class="website">

            <div class="website-small">
                🌐 पूरी जानकारी और Apply Link के लिए
            </div>

            <div class="website-name">
                SARKARIHAI.COM
            </div>

        </div>


        <div class="subscribe">

            <div class="subscribe-small">
                🔔 DAILY JOB UPDATES के लिए
            </div>

            <div class="subscribe-button">
                SUBSCRIBE NOW!
            </div>

        </div>

    </div>


    <!-- =========================
         SOCIAL CTA
    ========================== -->

    <div class="social">

        <div class="social-item">
            <span class="social-icon">👍</span>
            LIKE करें
        </div>

        <div class="social-item">
            <span class="social-icon">↗️</span>
            SHARE करें
        </div>

        <div class="social-item">
            <span class="social-icon">💬</span>
            COMMENT करें
        </div>

        <div class="social-item">
            <span class="social-icon">▶️</span>
            SUBSCRIBE करें
        </div>

    </div>


    <!-- =========================
         DISCLAIMER
    ========================== -->

    <div class="disclaimer">

        ✅ हम किसी भर्ती एजेंसी नहीं हैं |
        अधिक जानकारी के लिए ऑफिशियल नोटिफिकेशन जरूर देखें।

    </div>

</div>

</body>
</html>