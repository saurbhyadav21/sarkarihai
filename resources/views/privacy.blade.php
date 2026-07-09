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

<div class="container py-5">

    <!-- ================= HERO ================= -->

    <div class="contact-hero">

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



    <!-- ================= QUICK SUMMARY ================= -->

    <div class="contact-card">

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

    <div class="contact-card">

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

    <div class="contact-card">

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

    <div class="contact-card">

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

</div>

@endsection