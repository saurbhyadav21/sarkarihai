@extends('layouts.front')

@section('content')
    {{-- <div class="container py-5" style="">

    <h1 class="mb-4">Privacy Policy</h1>

    <p>
        Welcome to <strong>Sarkarihai.com</strong>. We are committed to protecting
        your privacy and ensuring that your personal information remains safe.
        This Privacy Policy explains what type of information we collect,
        how we use it, and how we protect it when you visit our website.
    </p>

    <hr>

    <h3>Information We Collect</h3>

    <p>
        When you visit our website, register on the site, subscribe to our
        newsletter, fill out a form, or interact with our content, we may
        collect certain information from you.
    </p>

    <p>The types of information we may collect include:</p>

    <ul>
        <li><strong>Personal Information:</strong> Name, email address, phone number, etc.</li>
        <li><strong>General Information:</strong> Age, gender, or other optional details provided by users.</li>
        <li><strong>Browser & Device Information:</strong> IP address, browser type, device type, operating system.</li>
        <li><strong>Usage Data:</strong> Pages visited, time spent on the site, and general interaction with the website.</li>
    </ul>

    <hr>

    <h3>How We Use Your Information</h3>

    <p>
        The information we collect from you may be used in the following ways:
    </p>

    <ul>
        <li>To personalize your experience and provide content that matches your interests.</li>
        <li>To improve our website and provide better services to our visitors.</li>
        <li>To respond more effectively to customer service requests and support needs.</li>
        <li>To manage contests, promotions, surveys, or other site features.</li>
        <li>To send periodic emails regarding updates, services, or important announcements.</li>
    </ul>

    <hr>

    <h3>How We Protect Your Information</h3>

    <p>
        We implement a variety of security measures to maintain the safety
        of your personal information. Your personal data is stored in
        secure environments and is only accessible to authorized personnel
        who are required to keep the information confidential.
    </p>

    <p>
        While we take reasonable steps to protect your information,
        no method of transmission over the internet is completely secure.
        Therefore, we cannot guarantee absolute security of your data.
    </p>

    <hr>

    <h3>Cookies</h3>

    <p>
        Our website may use cookies to enhance user experience.
        Cookies help us understand how visitors interact with our site
        and allow us to improve website functionality and content.
    </p>

    <hr>

    <h3>Third Party Services</h3>

    <p>
        We may use third-party services such as analytics tools,
        advertising networks, or other services that may collect
        certain non-personal information for improving the website
        and displaying relevant advertisements.
    </p>

    <hr>

    <h3>Consent</h3>

    <p>
        By using our website, you consent to our Privacy Policy
        and agree to its terms.
    </p>

    <hr>

    <h2 class="mt-5">गोपनीयता नीति</h2>

    <p>
        <strong>Sarkarihai.com</strong> पर हम आपकी गोपनीयता की सुरक्षा के लिए
        प्रतिबद्ध हैं। यह गोपनीयता नीति बताती है कि जब आप हमारी वेबसाइट का
        उपयोग करते हैं तो हम किस प्रकार की जानकारी एकत्र करते हैं और
        उसका उपयोग कैसे करते हैं।
    </p>

    <h4>हम कौन-सी जानकारी एकत्र करते हैं</h4>

    <p>
        जब आप हमारी वेबसाइट पर आते हैं, पंजीकरण करते हैं, न्यूज़लेटर
        की सदस्यता लेते हैं या कोई फॉर्म भरते हैं, तब हम कुछ जानकारी
        एकत्र कर सकते हैं।
    </p>

    <ul>
        <li>व्यक्तिगत जानकारी (नाम, ईमेल पता, फ़ोन नंबर आदि)</li>
        <li>सामान्य जानकारी (आयु, लिंग आदि)</li>
        <li>ब्राउज़र और डिवाइस जानकारी (आईपी पता, ब्राउज़र प्रकार आदि)</li>
        <li>उपयोग डेटा (देखे गए पृष्ठ, वेबसाइट पर बिताया गया समय आदि)</li>
    </ul>

    <h4>हम आपकी जानकारी का उपयोग कैसे करते हैं</h4>

    <ul>
        <li>आपके अनुभव को बेहतर और वैयक्तिकृत बनाने के लिए</li>
        <li>हमारी वेबसाइट और सेवाओं को बेहतर बनाने के लिए</li>
        <li>आपके प्रश्नों और सहायता अनुरोधों का जवाब देने के लिए</li>
        <li>सर्वेक्षण, प्रचार या अन्य वेबसाइट सुविधाओं का प्रबंधन करने के लिए</li>
        <li>समय-समय पर महत्वपूर्ण जानकारी या अपडेट भेजने के लिए</li>
    </ul>

    <h4>आपकी जानकारी की सुरक्षा</h4>

    <p>
        हम आपकी व्यक्तिगत जानकारी की सुरक्षा के लिए विभिन्न सुरक्षा उपाय
        लागू करते हैं। आपकी जानकारी सुरक्षित सर्वर पर संग्रहीत रहती है
        और केवल अधिकृत व्यक्तियों को ही इसकी पहुंच होती है।
    </p>

    <p>
        हालांकि हम आपकी जानकारी की सुरक्षा के लिए उचित प्रयास करते हैं,
        लेकिन इंटरनेट पर कोई भी प्रणाली पूरी तरह सुरक्षित नहीं होती।
    </p>

</div> --}}
    <style>
        /* =========================================================
           SARKARIHAI STATIC PAGES
           About | Contact | Privacy | Disclaimer | Terms
        ========================================================= */

        body {
            background: #f5f7fb;
        }

        /* HERO */

        .page-hero {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            color: #fff;
            padding: 70px 50px;
            border-radius: 18px;
            text-align: center;
            margin-bottom: 35px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
        }

        .page-hero h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .page-hero p {
            font-size: 18px;
            max-width: 850px;
            margin: auto;
            line-height: 1.9;
            opacity: .95;
        }

        /* MAIN CARD */

        .page-card {
            background: #fff;
            border-radius: 15px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .07);
        }

        .page-card h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1d3557;
        }

        .page-card h3 {
            font-size: 24px;
            margin-bottom: 18px;
            color: #222;
        }

        .page-card p {
            color: #555;
            line-height: 1.9;
            font-size: 16px;
        }

        /* FEATURE CARD */

        .feature-card {

            background: #fff;

            border-radius: 14px;

            padding: 28px;

            text-align: center;

            height: 100%;

            border: 1px solid #eef2f7;

            transition: .3s;

        }

        .feature-card:hover {

            transform: translateY(-5px);

            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);

        }

        .feature-icon {

            font-size: 42px;

            margin-bottom: 15px;

        }

        .feature-card h4 {

            font-size: 21px;

            font-weight: 700;

            margin-bottom: 12px;

        }

        .feature-card p {

            font-size: 15px;

            color: #666;

        }

        /* INFO BOX */

        .info-box {

            background: #f8fbff;

            border-left: 5px solid #0d6efd;

            border-radius: 10px;

            padding: 20px;

        }

        /* ALERT */

        .alert {

            border-radius: 12px;

        }

        /* AUTHOR BADGES */

        .author-badge {

            display: inline-block;

            padding: 8px 18px;

            background: #e9f2ff;

            color: #0d6efd;

            border-radius: 30px;

            margin: 6px;

            font-size: 14px;

            font-weight: 600;

        }

        /* LIST */

        .page-card ul {

            padding-left: 22px;

        }

        .page-card li {

            margin-bottom: 12px;

            color: #444;

            line-height: 1.8;

        }

        /* TABLE */

        .table {

            background: #fff;

        }

        /* ACCORDION */

        .accordion-item {

            border-radius: 10px !important;

            overflow: hidden;

            margin-bottom: 10px;

            border: 1px solid #e8edf5;

        }

        .accordion-button {

            font-weight: 600;

        }

        .accordion-button:not(.collapsed) {

            background: #eef5ff;

            color: #0d6efd;

        }

        /* CTA */

        .page-cta {

            background: linear-gradient(135deg, #0d6efd, #0056d6);

            color: #fff;

            padding: 45px;

            border-radius: 16px;

            text-align: center;

        }

        .page-cta h2 {

            color: #fff;

            margin-bottom: 15px;

        }

        .page-cta p {

            color: #fff;

            opacity: .95;

        }

        /* BUTTON */

        .btn-primary {

            border-radius: 10px;

            padding: 12px 30px;

            font-weight: 600;

        }

        /* MOBILE */

        @media(max-width:768px) {

            .page-hero {

                padding: 40px 20px;

            }

            .page-hero h1 {

                font-size: 30px;

            }

            .page-hero p {

                font-size: 16px;

            }

            .page-card {

                padding: 22px;

            }

            .page-card h2 {

                font-size: 24px;

            }

            .page-card h3 {

                font-size: 20px;

            }

            .feature-card {

                margin-bottom: 20px;

            }

        }
    </style>

    <div class="container py-5">

        <!-- ================= HERO ================= -->

        <div class="page-hero">

            <h1>Privacy Policy</h1>

            <p>

                At <strong>SarkariHai.com</strong>, we respect your privacy and are committed
                to protecting your personal information. This Privacy Policy explains
                what information we collect, how we use it, and the choices you have
                regarding your data while using our website.

            </p>

            <div class="mt-4">

                <span class="author-badge">
                    🔒 Privacy First
                </span>

                <span class="author-badge">
                    📅 Last Updated: {{ now()->format('d F Y') }}
                </span>

                <span class="author-badge">
                    🌐 Effective Worldwide
                </span>

            </div>

        </div>

        <div class="row g-3 mb-5">

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🔒</div>

                    <h5>Privacy First</h5>

                    <p class="mb-0">
                        We never sell your personal information.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🛡️</div>

                    <h5>Secure Browsing</h5>

                    <p class="mb-0">
                        Your information is protected with industry-standard practices.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">📋</div>

                    <h5>Transparent Policy</h5>

                    <p class="mb-0">
                        We clearly explain how your information is collected and used.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">✅</div>

                    <h5>AdSense Friendly</h5>

                    <p class="mb-0">
                        Our privacy practices follow modern web and advertising standards.
                    </p>

                </div>

            </div>

        </div>

        <!-- ================= QUICK SUMMARY ================= -->

        <div class="page-card">

            <h2>📌 Privacy at a Glance</h2>

            <div class="row mt-4">

                <div class="col-md-3">

                    <div class="feature-card">

                        <div class="feature-icon">🔐</div>

                        <h4>Secure</h4>

                        <p>

                            We take reasonable measures to protect user information.

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="feature-card">

                        <div class="feature-icon">🍪</div>

                        <h4>Cookies</h4>

                        <p>

                            Cookies help improve website functionality and user experience.

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="feature-card">

                        <div class="feature-icon">📊</div>

                        <h4>Analytics</h4>

                        <p>

                            Anonymous usage data helps us improve our services.

                        </p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="feature-card">

                        <div class="feature-icon">✅</div>

                        <h4>Transparency</h4>

                        <p>

                            We clearly explain how and why your information is used.

                        </p>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= INFORMATION WE COLLECT ================= -->

        <div class="page-card">

            <h2>📂 Information We Collect</h2>

            <p>

                Depending on how you interact with SarkariHai.com, we may collect
                certain information to improve your browsing experience and provide
                relevant services.

            </p>

            <div class="row mt-4">

                <div class="col-md-6">

                    <div class="feature-card text-start">

                        <h4>👤 Personal Information</h4>

                        <ul class="mb-0">

                            <li>Name (if voluntarily provided)</li>

                            <li>Email Address</li>

                            <li>Contact Information</li>

                            <li>Information submitted through forms</li>

                        </ul>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="feature-card text-start">

                        <h4>💻 Technical Information</h4>

                        <ul class="mb-0">

                            <li>IP Address</li>

                            <li>Browser Type</li>

                            <li>Operating System</li>

                            <li>Device Information</li>

                            <li>Pages Visited</li>

                            <li>Time Spent on Website</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================= HOW WE USE INFORMATION ================= -->

        <div class="page-card">

            <h2>⚙️ How We Use Your Information</h2>

            <p>

                The information collected helps us maintain and improve SarkariHai.com
                while providing users with a better experience.

            </p>

            <div class="row mt-4">

                <div class="col-md-6">

                    <ul>

                        <li>Improve website performance and usability.</li>

                        <li>Respond to user queries and feedback.</li>

                        <li>Provide requested services and support.</li>

                        <li>Maintain website security.</li>

                    </ul>

                </div>

                <div class="col-md-6">

                    <ul>

                        <li>Analyze website traffic.</li>

                        <li>Display relevant advertisements.</li>

                        <li>Improve content quality.</li>

                        <li>Detect technical issues and spam.</li>

                    </ul>

                </div>

            </div>

        </div>



        <!-- ================= COOKIES ================= -->

        <div class="page-card">

            <h2>🍪 Cookies Policy</h2>

            <p>

                SarkariHai.com uses cookies to improve website functionality,
                remember user preferences and analyze visitor behavior.

            </p>

            <p>

                Cookies are small text files stored on your device by your browser.
                They help us understand how visitors use our website and enable
                certain features to work properly.

            </p>

            <div class="alert alert-info mt-4">

                <strong>Note:</strong>

                You can disable cookies anytime through your browser settings.
                However, some features of the website may not function properly
                after disabling cookies.

            </div>

        </div>

        <!-- ================= THIRD PARTY SERVICES ================= -->
        <!-- =======================================================
GOOGLE ADSENSE
======================================================= -->

<div class="page-card">

    <h2>💰 Google AdSense & Advertising</h2>

    <p>

        SarkariHai.com may display advertisements provided by
        <strong>Google AdSense</strong> or other trusted advertising partners.

        These advertising providers may use cookies, web beacons and similar
        technologies to display ads based on your previous visits to this
        website or other websites across the internet.

    </p>

    <div class="info-box mt-4">

        <strong>Advertising Cookies</strong>

        <p class="mb-0 mt-2">

            Google may use the <strong>DART Cookie</strong> to serve personalized
            advertisements based on your interests and browsing history.

            Users may opt out of personalized advertising through Google's Ads
            Settings.

        </p>

    </div>

</div>



<!-- =======================================================
GOOGLE ANALYTICS
======================================================= -->

<div class="page-card">

    <h2>📊 Google Analytics</h2>

    <p>

        We use <strong>Google Analytics</strong> to understand how visitors use
        SarkariHai.com.

    </p>

    <p>

        Google Analytics helps us understand:

    </p>

    <ul>

        <li>Most visited pages</li>

        <li>Traffic sources</li>

        <li>User behavior</li>

        <li>Device and browser usage</li>

        <li>Website performance</li>

    </ul>

    <div class="alert alert-primary mt-4">

        Google Analytics collects anonymous usage information and does
        <strong>not personally identify individual users.</strong>

    </div>

</div>



<!-- =======================================================
THIRD PARTY SERVICES
======================================================= -->

<div class="page-card">

    <h2>🌐 Third-Party Services</h2>

    <p>

        SarkariHai.com may use trusted third-party services to improve
        website functionality, analyze traffic and provide relevant content.

    </p>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>Services We May Use</h4>

                <ul class="mb-0">

                    <li>Google Analytics</li>

                    <li>Google AdSense</li>

                    <li>Google Search Console</li>

                    <li>Cloudflare CDN</li>

                </ul>

            </div>

        </div>

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>Purpose</h4>

                <ul class="mb-0">

                    <li>Website Security</li>

                    <li>Traffic Analysis</li>

                    <li>Performance Monitoring</li>

                    <li>Advertising</li>

                </ul>

            </div>

        </div>

    </div>

</div>



<!-- =======================================================
DATA SECURITY
======================================================= -->

<div class="page-card">

    <h2>🔐 Data Security</h2>

    <p>

        Protecting user information is important to us.

        We implement reasonable technical and organizational measures to
        safeguard information against unauthorized access, alteration,
        disclosure or destruction.

    </p>

    <div class="row mt-4">

        <div class="col-md-4">

            <div class="feature-card">

                <div class="feature-icon">

                    🔒

                </div>

                <h4>

                    Secure Hosting

                </h4>

                <p>

                    Our website is hosted on secure infrastructure.

                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="feature-card">

                <div class="feature-icon">

                    🔑

                </div>

                <h4>

                    Limited Access

                </h4>

                <p>

                    Sensitive information is accessible only to authorized persons.

                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="feature-card">

                <div class="feature-icon">

                    🛡️

                </div>

                <h4>

                    Security Practices

                </h4>

                <p>

                    We regularly review our security practices to improve protection.

                </p>

            </div>

        </div>

    </div>

</div>



<!-- =======================================================
EXTERNAL LINKS
======================================================= -->

<div class="page-card">

    <h2>🔗 External Links</h2>

    <p>

        SarkariHai.com may contain links to official government websites,
        recruitment boards and other third-party websites.

    </p>

    <p>

        Once you leave our website, we have no control over the privacy
        practices or content of those external websites.

        We encourage users to review the privacy policy of every website
        they visit.

    </p>

    <div class="alert alert-warning">

        <strong>Important:</strong>

        Official recruitment details should always be verified from the
        respective official website before submitting any application.

    </div>

</div>

<!-- =======================================================
WE DO NOT SELL YOUR PERSONAL INFORMATION
======================================================= -->

<div class="page-card">

    <h2>🚫 We Do Not Sell Your Personal Information</h2>

    <p>

        At <strong>SarkariHai.com</strong>, we respect your privacy.

        We do <strong>not sell, rent, trade or share</strong> your personal
        information with third parties for marketing purposes.

    </p>

    <p>

        Any information collected is used only for improving website
        functionality, enhancing user experience and providing better
        services to our visitors.

    </p>

    <div class="alert alert-success mt-4">

        <strong>Your Privacy Matters.</strong>

        SarkariHai.com does not sell users' personal information.

    </div>

</div>



<!-- =======================================================
CHILDREN'S PRIVACY
======================================================= -->

<div class="page-card">

    <h2>👶 Children's Privacy</h2>

    <p>

        SarkariHai.com is intended for students, job seekers and the general
        public.

        We do not knowingly collect personally identifiable information
        from children under the age of 13.

    </p>

    <p>

        If a parent or guardian believes that a child has provided personal
        information through our website, they may contact us immediately.

        We will review the request and remove the information wherever
        reasonably possible.

    </p>

</div>



<!-- =======================================================
YOUR PRIVACY RIGHTS
======================================================= -->

<div class="page-card">

    <h2>👤 Your Privacy Rights</h2>

    <p>

        Depending on applicable laws, users may have certain rights
        regarding their personal information.

    </p>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>Available Rights</h4>

                <ul class="mb-0">

                    <li>Request information about collected data.</li>

                    <li>Request correction of inaccurate information.</li>

                    <li>Request deletion where applicable.</li>

                    <li>Withdraw consent where legally permitted.</li>

                </ul>

            </div>

        </div>

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>How to Contact Us</h4>

                <p>

                    If you wish to exercise any of these rights,
                    please contact us using the email provided
                    on this website.

                </p>

                <strong>

                    📧 official.sarkarihai@gmail.com

                </strong>

            </div>

        </div>

    </div>

</div>



<!-- =======================================================
CHANGES TO THIS PRIVACY POLICY
======================================================= -->

<div class="page-card">

    <h2>🔄 Changes to This Privacy Policy</h2>

    <p>

        SarkariHai.com reserves the right to modify or update this
        Privacy Policy at any time without prior notice.

    </p>

    <p>

        Any changes will become effective immediately after they are
        published on this page.

    </p>

    <p>

        Users are encouraged to review this Privacy Policy
        periodically to stay informed about how their information
        is protected.

    </p>

    <div class="info-box mt-4">

        <strong>Last Reviewed:</strong>

        {{ now()->format('d F Y') }}

    </div>

</div>


<!-- =======================================================
CONTACT US
======================================================= -->

<div class="page-card">

    <h2>📧 Contact Us</h2>

    <p>

        If you have any questions, concerns or suggestions regarding this
        Privacy Policy or the way your information is handled, please feel
        free to contact us.

    </p>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>General Enquiries</h4>

                <p class="mb-2">

                    📧 <strong>official.sarkarihai@gmail.com</strong>

                </p>

                <p class="mb-0">

                    🌐 https://sarkarihai.com

                </p>

            </div>

        </div>

        <div class="col-md-6">

            <div class="feature-card text-start">

                <h4>Response Time</h4>

                <p>

                    We generally respond within
                    <strong>24–48 business hours.</strong>

                </p>

            </div>

        </div>

    </div>

</div>



<!-- =======================================================
HINDI VERSION
======================================================= -->

<div class="page-card">

    <h2>🇮🇳 गोपनीयता नीति (Privacy Policy)</h2>

    <p>

        <strong>SarkariHai.com</strong> आपकी गोपनीयता का सम्मान करता है।
        हमारी वेबसाइट का उपयोग करते समय यदि आप कोई जानकारी साझा करते हैं,
        तो हम उसे सुरक्षित रखने का पूरा प्रयास करते हैं।

    </p>

    <p>

        हम आपकी व्यक्तिगत जानकारी को बेचते, किराए पर नहीं देते और
        बिना आपकी अनुमति के किसी तीसरे पक्ष के साथ साझा नहीं करते,
        जब तक कि कानून द्वारा इसकी आवश्यकता न हो।

    </p>

    <p>

        हमारी वेबसाइट पर Cookies, Analytics और अन्य तकनीकों का उपयोग
        केवल वेबसाइट की गुणवत्ता सुधारने, उपयोगकर्ता अनुभव बेहतर बनाने
        और आवश्यक सेवाएँ प्रदान करने के लिए किया जाता है।

    </p>

    <p>

        यदि आपको हमारी Privacy Policy से संबंधित कोई प्रश्न या सुझाव हो,
        तो आप हमें ईमेल के माध्यम से संपर्क कर सकते हैं।

    </p>

    <div class="alert alert-success mt-4">

        📧 <strong>official.sarkarihai@gmail.com</strong>

    </div>

</div>



<!-- =======================================================
FAQ
======================================================= -->

<div class="page-card">

    <h2>❓ Frequently Asked Questions</h2>

    <div class="accordion" id="privacyFaq">

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button"
                    data-bs-toggle="collapse"
                    data-bs-target="#privacy1">

                    Does SarkariHai collect personal information?

                </button>

            </h2>

            <div id="privacy1"
                class="accordion-collapse collapse show"
                data-bs-parent="#privacyFaq">

                <div class="accordion-body">

                    Yes, only when users voluntarily provide information
                    through forms, email or other communication methods.

                </div>

            </div>

        </div>



        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#privacy2">

                    Does SarkariHai sell my personal information?

                </button>

            </h2>

            <div id="privacy2"
                class="accordion-collapse collapse"
                data-bs-parent="#privacyFaq">

                <div class="accordion-body">

                    No. SarkariHai.com never sells or rents users'
                    personal information.

                </div>

            </div>

        </div>



        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#privacy3">

                    Does this website use Cookies?

                </button>

            </h2>

            <div id="privacy3"
                class="accordion-collapse collapse"
                data-bs-parent="#privacyFaq">

                <div class="accordion-body">

                    Yes. Cookies help improve website performance,
                    remember preferences and understand visitor behaviour.

                </div>

            </div>

        </div>



        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#privacy4">

                    How can I contact SarkariHai?

                </button>

            </h2>

            <div id="privacy4"
                class="accordion-collapse collapse"
                data-bs-parent="#privacyFaq">

                <div class="accordion-body">

                    You can contact us anytime at

                    <strong>

                        official.sarkarihai@gmail.com

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>
    </div>


    
@endsection


<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"WebPage",
  "name":"Privacy Policy - SarkariHai",
  "url":"https://sarkarihai.com/privacy-policy",
  "description":"Read the Privacy Policy of SarkariHai.com to understand how we collect, use and protect your information.",
  "publisher":{
    "@type":"Organization",
    "name":"SarkariHai",
    "url":"https://sarkarihai.com"
  }
}
</script>