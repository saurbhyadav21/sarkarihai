@extends('layouts.front')

@section('content')
    {{-- <style>
        .contact-page {
            max-width: 950px;
            margin: auto;
        }

        .contact-card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
            margin-bottom: 25px;
        }

        .contact-card h2 {
            font-size: 28px;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 15px;
        }

        .contact-card h3 {
            font-size: 22px;
            margin-top: 20px;
            margin-bottom: 15px;
            color: #222;
        }

        .contact-info {
            background: #f8f9fa;
            border-left: 5px solid #0d6efd;
            padding: 20px;
            border-radius: 8px;
        }

        .contact-info p {
            margin-bottom: 10px;
        }

        .author-box {
            background: #f8fbff;
            border: 1px solid #dbe8ff;
            border-radius: 10px;
            padding: 20px;
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .feature-item {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px;
        }

        @media(max-width:768px) {

            .feature-list {

                grid-template-columns: 1fr;

            }

            .contact-card {

                padding: 18px;

            }

            .contact-card h2 {

                font-size: 24px;

            }

        }
    </style>
    <div class="container py-5" style="    ">

        <h1 class="mb-4">Contact Us</h1>

        <h4>Get in Touch with Sarkarihai</h4>
        <p>
            Thank you for visiting <strong>Sarkarihai.com</strong>. We truly appreciate your interest in our website.
            Our aim is to provide the latest updates about government jobs, admit cards, results, answer keys
            and competitive exams in a simple and reliable way.
        </p>

        <p>
            If you have any questions, suggestions, or need help regarding any information published on our website,
            please feel free to contact us. Our team will try to respond as soon as possible.
        </p>

        <hr>

        <h4>Contact Information</h4>
        <p>
            For general queries, support, corrections or feedback please contact us through email:
        </p>

        <p><strong>Email:</strong> official.sarkarihai@gmail.com</p>

        <hr>

        <h4>About the Author</h4>
        <p>
            <strong>Saurbh Yadav</strong> has been writing content related to education and competitive exams
            for several years. With nearly <strong>10 years+ of experience in content writing</strong>, he focuses
            on providing clear and useful information related to government job notifications, exam updates,
            admit cards and results.
        </p>

        <p>
            He holds a <strong>Bachelor Degree in Computer Science & Engineering</strong> and currently contributes as
            a content writer on <strong>Sarkarihai.com</strong>.
        </p>

        <p><strong>Email:</strong> official.sarkarihai@gmail.com</p>

        <hr>

        <h4>Content Transparency</h4>
        <p>
            At <strong>Sarkarihai.com</strong>, our team prepares articles after proper research using trusted
            sources such as official government websites, press releases, official notifications and reputed
            news portals.
        </p>

        <p>
            Our goal is to provide accurate and reliable information to our users. However, if you find any
            incorrect or outdated information on our website, please feel free to contact us. We will review
            the issue and update the content as soon as possible.
        </p>

        <p>
            For any corrections or suggestions, please contact us at:
            <br>
            <strong>Email:</strong> official.sarkarihai@gmail.com
        </p>

        <hr>

        <h2 class="mt-5">संपर्क करें</h2>

        <h4>Sarkarihai से संपर्क करें</h4>
        <p>
            <strong>Sarkarihai.com</strong> पर आने के लिए धन्यवाद। हमें खुशी है कि आप हमारी वेबसाइट में
            रुचि रखते हैं। हमारी वेबसाइट का उद्देश्य आपको सरकारी नौकरियों, एडमिट कार्ड, रिजल्ट,
            आंसर की और विभिन्न प्रतियोगी परीक्षाओं की नवीनतम जानकारी सरल और विश्वसनीय तरीके से
            प्रदान करना है।
        </p>

        <p>
            यदि आपके कोई प्रश्न, सुझाव हैं या वेबसाइट पर दी गई किसी जानकारी के बारे में सहायता चाहिए,
            तो आप हमसे बेझिझक संपर्क कर सकते हैं। हमारी टीम आपकी सहायता करने के लिए हमेशा तैयार है।
        </p>

        <h4 class="mt-4">संपर्क जानकारी</h4>
        <p>
            सामान्य प्रश्न, सहायता, सुधार या सुझाव के लिए आप हमें ईमेल कर सकते हैं:
        </p>

        <p><strong>Email:</strong> official.sarkarihai@gmail.com</p>

        <h4 class="mt-4">लेखक के बारे में</h4>
        <p>
            <strong>Saurbh Yadav</strong> पिछले कई वर्षों से शिक्षा और प्रतियोगी परीक्षाओं से संबंधित
            विषयों पर लेखन कर रहे हैं। उन्हें कंटेंट राइटिंग के क्षेत्र में लगभग
            <strong>10+ वर्षों का अनुभव</strong> है और वे सरकारी नौकरी, परीक्षा नोटिफिकेशन,
            एडमिट कार्ड और रिजल्ट से संबंधित जानकारी सरल भाषा में प्रदान करते हैं।
        </p>

        <p>
            उन्होंने <strong>Computer science and Engineering में Bachelor Degree</strong> प्राप्त की है और
            वर्तमान में <strong>Sarkarihai.com</strong> पर कंटेंट राइटर के रूप में योगदान दे रहे हैं।
        </p>

        <h4 class="mt-4">कंटेंट पारदर्शिता</h4>
        <p>
            Sarkarihai.com पर प्रकाशित लेख हमारी टीम द्वारा गहन रिसर्च के बाद तैयार किए जाते हैं।
            हम जानकारी के लिए विश्वसनीय स्रोतों जैसे आधिकारिक सरकारी वेबसाइट, आधिकारिक नोटिफिकेशन,
            प्रेस रिलीज और प्रतिष्ठित समाचार वेबसाइट का उपयोग करते हैं।
        </p>

        <p>
            यदि आपको हमारी वेबसाइट पर कोई गलत या पुरानी जानकारी दिखाई देती है,
            तो कृपया हमें सूचित करें। हम उसे जल्द से जल्द सही करने का प्रयास करेंगे।
        </p>

        <p>
            किसी भी सुधार या सुझाव के लिए आप हमें इस ईमेल पर संपर्क कर सकते हैं:
            <br>
            <strong>Email:</strong> official.sarkarihai@gmail.com
        </p>

    </div> --}}
    <style>
        .contact-hero {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            color: #fff;
            padding: 60px 40px;
            border-radius: 18px;
            text-align: center;
            margin-bottom: 35px;
        }

        .contact-hero h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .contact-hero p {
            font-size: 18px;
            opacity: .95;
            max-width: 850px;
            margin: auto;
            line-height: 1.8;
        }

        .contact-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .08);
            padding: 30px;
            margin-bottom: 30px;
        }

        .contact-card h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1b1b1b;
        }

        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 22px;
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #eaf3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-right: 18px;
        }

        .contact-title {
            font-size: 18px;
            font-weight: 700;
            color: #222;
        }

        .contact-value {
            font-size: 16px;
            color: #555;
        }

        .author-box {
            background: #f8fbff;
            border: 1px solid #d9e8ff;
            border-radius: 15px;
            padding: 25px;
        }

        .author-box h3 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .author-box p {
            color: #555;
            line-height: 1.9;
        }

        .author-badge {
            display: inline-block;
            background: #0d6efd;
            color: #fff;
            padding: 7px 15px;
            border-radius: 30px;
            margin: 5px;
            font-size: 14px;
        }

        .feature-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
            padding: 25px;
            text-align: center;
            height: 100%;
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .feature-card h4 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: #666;
            font-size: 15px;
            line-height: 1.7;
        }

        @media(max-width:768px) {

            .contact-hero {

                padding: 35px 20px;

            }

            .contact-hero h1 {

                font-size: 30px;

            }

            .contact-hero p {

                font-size: 16px;

            }

            .contact-card {

                padding: 20px;

            }

            .contact-info {

                align-items: flex-start;

            }

            .contact-icon {

                width: 50px;
                height: 50px;
                font-size: 22px;

            }

        }
    </style>

    <div class="container py-5">

        <div class="contact-hero">

            <h1>Contact SarkariHai</h1>

            <p>

                Have a question, found an error, or want to share feedback?

                Our team is always ready to help you. We continuously work to provide accurate Government Job updates, Admit
                Cards, Results, Answer Keys and Exam Notifications across India.

            </p>

        </div>

        <div class="row">

            <div class="col-lg-5">

                <div class="contact-card">

                    <h2>📞 Contact Information</h2>

                    <div class="contact-info">

                        <div class="contact-icon">
                            📧
                        </div>

                        <div>

                            <div class="contact-title">

                                Email Address

                            </div>

                            <div class="contact-value">

                                official.sarkarihai@gmail.com

                            </div>

                        </div>

                    </div>

                    <div class="contact-info">

                        <div class="contact-icon">
                            🌐
                        </div>

                        <div>

                            <div class="contact-title">

                                Website

                            </div>

                            <div class="contact-value">

                                https://sarkarihai.com

                            </div>

                        </div>

                    </div>

                    <div class="contact-info">

                        <div class="contact-icon">
                            ⏰
                        </div>

                        <div>

                            <div class="contact-title">

                                Response Time

                            </div>

                            <div class="contact-value">

                                Usually within 24-48 Hours

                            </div>

                        </div>

                    </div>

                    <div class="contact-info">

                        <div class="contact-icon">
                            💬
                        </div>

                        <div>

                            <div class="contact-title">

                                Support

                            </div>

                            <div class="contact-value">

                                Corrections, Feedback, Suggestions & Business Queries

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-7">

                <div class="author-box">

                    <h3>

                        👨‍💻 About The Author

                    </h3>

                    <p>

                        <strong>Saurbh Yadav</strong> is the founder and content editor of <strong>SarkariHai.com</strong>.
                        He holds a Bachelor's Degree in Computer Science & Engineering and has more than <strong>10 years of
                            experience</strong> in web development, education content publishing, and government job
                        information platforms.

                    </p>

                    <p>

                        His objective is to provide students and job seekers with accurate, fast, and easy-to-understand
                        information regarding Government Jobs, Recruitment Notifications, Admit Cards, Results, Answer Keys,
                        Syllabus, and Admission Updates.

                    </p>

                    <div class="mt-4">

                        <span class="author-badge">

                            10+ Years Experience

                        </span>

                        <span class="author-badge">

                            Government Jobs

                        </span>

                        <span class="author-badge">

                            Results

                        </span>

                        <span class="author-badge">

                            Admit Cards

                        </span>

                        <span class="author-badge">

                            Education Content

                        </span>

                    </div>

                </div>

            </div>

        </div>

        <div class="mt-5">

            <h2 class="mb-4 text-center fw-bold">

                Why Trust SarkariHai?

            </h2>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">

                    <div class="feature-card">

                        <div class="feature-icon">

                            📜

                        </div>

                        <h4>

                            Official Sources

                        </h4>

                        <p>

                            Information is collected from official government notifications and recruitment authorities.

                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="feature-card">

                        <div class="feature-icon">

                            ⚡

                        </div>

                        <h4>

                            Fast Updates

                        </h4>

                        <p>

                            Latest Government Job notifications are published quickly after official release.

                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="feature-card">

                        <div class="feature-icon">

                            ✅

                        </div>

                        <h4>

                            Fact Checked

                        </h4>

                        <p>

                            Every article is reviewed before publishing to reduce errors and improve accuracy.

                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-3">

                    <div class="feature-card">

                        <div class="feature-icon">

                            🎓

                        </div>

                        <h4>

                            Free For Everyone

                        </h4>

                        <p>

                            All job notifications, admit cards, results and exam updates are available free of cost.

                        </p>

                    </div>

                </div>

            </div>

        </div>
        <!-- ================= FINAL CTA ================= -->

        <div class="contact-card text-center">

            <h2>Need Help?</h2>

            <p class="mb-4">

                If you have any questions, feedback, correction requests or business enquiries,
                feel free to contact our team.

                We usually respond within <strong>24–48 hours.</strong>

            </p>

            <a href="mailto:official.sarkarihai@gmail.com" class="btn btn-primary btn-lg px-5">

                📧 Contact Us

            </a>

        </div>



        <!-- ================= FAQ ================= -->

        <div class="contact-card">

            <h2 class="mb-4">Frequently Asked Questions</h2>

            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">

                            Is SarkariHai an official Government website?

                        </button>

                    </h2>

                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            No. SarkariHai.com is an independent educational information portal.
                            We are not associated with any Government department or recruitment agency.

                        </div>

                    </div>

                </div>



                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                            How often is SarkariHai updated?

                        </button>

                    </h2>

                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Our editorial team updates the website regularly whenever official
                            recruitment notifications, admit cards, results or answer keys are released.

                        </div>

                    </div>

                </div>



                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                            Can I report an incorrect job notification?

                        </button>

                    </h2>

                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Yes. Please email us with the correct information and the page URL.
                            Our team will verify the details and update the article if necessary.

                        </div>

                    </div>

                </div>



                <div class="accordion-item">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#faq4">

                            Is SarkariHai free to use?

                        </button>

                    </h2>

                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Yes. All Government Job notifications, Results, Admit Cards,
                            Answer Keys and educational updates available on SarkariHai.com
                            are completely free for users.

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= HINDI SECTION ================= -->

        <div class="contact-card">

            <h2>संपर्क करें</h2>

            <p>

                <strong>SarkariHai.com</strong> पर आने के लिए आपका धन्यवाद।

                हमारा उद्देश्य सरकारी नौकरियों, एडमिट कार्ड, रिजल्ट, उत्तर कुंजी,
                प्रवेश और अन्य शिक्षा संबंधी जानकारी सरल, सटीक और समय पर उपलब्ध कराना है।

            </p>

            <p>

                यदि आपको वेबसाइट पर किसी प्रकार की त्रुटि दिखाई देती है,
                किसी भर्ती की जानकारी अपडेट करनी है,
                या आपके पास कोई सुझाव है,
                तो आप हमें ईमेल के माध्यम से संपर्क कर सकते हैं।

            </p>

            <div class="alert alert-success mt-4">

                <strong>ईमेल :</strong>

                official.sarkarihai@gmail.com

            </div>

            <p>

                हमारी टीम प्रत्येक वास्तविक सुझाव और सुधार अनुरोध की समीक्षा करती है
                और आवश्यकता होने पर संबंधित लेख को अपडेट करती है।

            </p>

        </div>



        <!-- ================= TRUST BOX ================= -->

        <div class="contact-card text-center">

            <h2>Why Millions of Users Trust SarkariHai</h2>

            <div class="row mt-4">

                <div class="col-md-3">

                    <h3 class="text-primary fw-bold">✓</h3>

                    <p>Official Sources</p>

                </div>

                <div class="col-md-3">

                    <h3 class="text-primary fw-bold">✓</h3>

                    <p>Regular Updates</p>

                </div>

                <div class="col-md-3">

                    <h3 class="text-primary fw-bold">✓</h3>

                    <p>Fact Checked Content</p>

                </div>

                <div class="col-md-3">

                    <h3 class="text-primary fw-bold">✓</h3>

                    <p>100% Free Access</p>

                </div>

            </div>

        </div>
        <!-- ================= CONTENT TRANSPARENCY ================= -->

        <div class="row mt-5">

            <div class="col-lg-12">

                <div class="contact-card">

                    <h2>📑 Content Transparency</h2>

                    <p>

                        At <strong>SarkariHai.com</strong>, our mission is to provide accurate, easy-to-understand and
                        up-to-date information related to Government Jobs, Admit Cards, Results, Answer Keys,
                        Admissions, Syllabus and other education-related updates.

                    </p>

                    <p>

                        Before publishing any article, our editorial team carefully reviews information collected
                        from trusted and official sources. Every effort is made to ensure that the published content
                        is correct and useful for students and job seekers across India.

                    </p>

                    <p>

                        Although we try our best to maintain complete accuracy, users are always advised to verify
                        important information such as eligibility, application dates, fees, age limits and official
                        announcements from the respective department's official website before taking any action.

                    </p>

                </div>

            </div>

        </div>





        <!-- ================= EDITORIAL PROCESS ================= -->

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-card">

                    <h2>✍️ Our Editorial Process</h2>

                    <div class="row">

                        <div class="col-md-3">

                            <div class="feature-card">

                                <div class="feature-icon">🔎</div>

                                <h4>Research</h4>

                                <p>

                                    Official notifications and government announcements are carefully reviewed.

                                </p>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="feature-card">

                                <div class="feature-icon">📝</div>

                                <h4>Writing</h4>

                                <p>

                                    Information is written in simple language for students and job seekers.

                                </p>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="feature-card">

                                <div class="feature-icon">✔️</div>

                                <h4>Verification</h4>

                                <p>

                                    Important details are verified before publication whenever possible.

                                </p>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="feature-card">

                                <div class="feature-icon">🚀</div>

                                <h4>Update</h4>

                                <p>

                                    Articles are updated whenever official changes are announced.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>





        <!-- ================= INFORMATION SOURCES ================= -->

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-card">

                    <h2>🏛️ Information Sources</h2>

                    <p>

                        Information published on SarkariHai.com is generally collected from reliable public sources such as:

                    </p>

                    <ul class="mt-3">

                        <li>Official Government Websites</li>

                        <li>Official Recruitment Notifications (PDF)</li>

                        <li>Employment News</li>

                        <li>Official Press Releases</li>

                        <li>Public Service Commission Websites</li>

                        <li>Government Departments & Recruitment Boards</li>

                    </ul>

                </div>

            </div>

        </div>





        <!-- ================= CORRECTION POLICY ================= -->

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-card">

                    <h2>🛠 Correction Policy</h2>

                    <p>

                        Despite careful review, mistakes may occasionally occur.

                    </p>

                    <p>

                        If you notice any incorrect information, outdated details or broken links,
                        please inform us by email.

                    </p>

                    <div class="alert alert-primary mt-3">

                        <strong>Email :</strong>

                        official.sarkarihai@gmail.com

                    </div>

                    <p>

                        Our editorial team reviews every genuine correction request and updates the article
                        as quickly as possible.

                    </p>

                </div>

            </div>

        </div>





        <!-- ================= DISCLAIMER ================= -->

        <div class="row">

            <div class="col-lg-12">

                <div class="contact-card border border-warning">

                    <h2>⚠️ Disclaimer</h2>

                    <p>

                        SarkariHai.com is an independent educational information website.

                    </p>

                    <p>

                        We are <strong>not associated with any Government Department, Ministry,
                            Recruitment Board or Official Authority.</strong>

                    </p>

                    <p>

                        All trademarks, logos and organization names belong to their respective owners.

                    </p>

                    <p>

                        Users should always verify important details from the official notification before applying
                        for any recruitment, examination or admission process.

                    </p>

                </div>

            </div>

        </div>
    </div>
@endsection
