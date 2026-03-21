<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WZX7WPHT');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ isset($seo['title']) ? $seo['title'] . ' | Sarkarihai' : 'Sarkarihai – Latest Sarkari Naukri, Results, Admit Card Updates' }}
    </title>

    <meta name="description"
        content="{{ $seo['description'] ?? 'Latest government jobs updates, results and admit cards in India at Sarkarihai.' }}">

    <meta name="keywords" content="{{ $seo['keywords'] ?? 'sarkari naukri, govt jobs, railway jobs' }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* page background */
        body {
            background: #0b1224;
            color: #1f2937;
            font-family: Arial, sans-serif;
        }

        /* navbar style */
        .navbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show {
            color: #fff;
        }

        /* brand */
        .navbar-brand {
            font-weight: 600;
            color: #ff7a18;
        }

        /* menu link */
        .nav-link {
            color: #0b1224;
            padding-right: 30px !important;
            padding-left: 30px !important;
            font-weight: bold;
        }

        /* hover */
        .nav-link:hover {
            color: #ff7a18;
            border: 1px #fff solid;
        }

        /* button style */
        .btn-custom {
            background: #ff7a18;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background: #e86a10;
        }

        /* search input */
        .form-control {
            border: 1px solid #e5e7eb;
        }

        .banner-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 6px;
        }

        .card-title {
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            background: #111a35;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 5px;
            border-left: 4px solid #ff7a18;
        }

        .ytot-share {
            padding: 32px 24px;
            color: #fff;
            background: #1e293b;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md) 0 4px 12px rgba(0, 0, 0, 0.4);
            margin-bottom: 48px;
            border: 1px solid var(--border);
            text-align: left;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NC8JS92QP7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NC8JS92QP7');
    </script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZX7WPHT" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <a class="navbar-brand" href="/"><img src="{{ asset('public/images/logo.png') }}"
                        style="    width: 200px;" /></a>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">




                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="/">Latest Jobs</a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="/">Admit Card</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/">Result</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/">Syllabus</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/">Answer Key</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>



                    </ul>

                    <form class="d-flex" style="margin-left: 10px;">
                        <input class="form-control me-2" type="search" placeholder="Search Tools">
                        <button class="btn btn-custom" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
    <main>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <style>
            .social-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 15px 10px;
                border-radius: 14px;
                color: #fff;
                text-decoration: none;
                font-size: 13px;
                transition: 0.3s;
                position: relative;
            }

            /* Image */
            .social-img {
                width: 40px;
                height: 40px;
                margin-bottom: 5px;
            }

            /* Icon */
            .social-card i {
                font-size: 20px;
                margin-bottom: 5px;
            }

            /* Colors */
            .whatsapp {
                background: linear-gradient(135deg, #25D366, #1ebe5d);
            }

            .twitter {
                background: linear-gradient(135deg, #000, #333);
            }

            .telegram {
                background: linear-gradient(135deg, #0088cc, #00aaff);
            }

            /* Hover */
            .social-card:hover {
                transform: translateY(-6px) scale(1.03);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            }
            .youtube {
    background: linear-gradient(135deg, #ff0000, #cc0000);
}
        </style>
        <div class="container mt-4">
            <div class="row justify-content-center text-center">

                <!-- WhatsApp -->
                <div class="col-4 col-md-2 mb-3">
                    <a href="https://chat.whatsapp.com/YOUR_GROUP_LINK" target="_blank" class="social-card whatsapp">

                        <!-- Image -->
                        {{-- <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="social-img"> --}}

                        <!-- Icon -->
                        <i class="fab fa-whatsapp"></i>

                        {{-- <span>WhatsApp Group</span> --}}
                    </a>
                </div>

                <!-- Twitter -->
                <div class="col-4 col-md-2 mb-3">
                    <a href="https://twitter.com/YOUR_PROFILE" target="_blank" class="social-card twitter">

                        {{-- <img src="https://cdn-icons-png.flaticon.com/512/5968/5968958.png" class="social-img"> --}}

                        <i class="fab fa-x-twitter"></i>

                        {{-- <span>Twitter</span> --}}
                    </a>
                </div>

                <!-- Telegram -->
                <div class="col-4 col-md-2 mb-3">
                    <a href="https://t.me/YOUR_CHANNEL" target="_blank" class="social-card telegram">

                        {{-- <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" class="social-img"> --}}

                        <i class="fab fa-telegram-plane"></i>

                        {{-- <span>Telegram</span> --}}
                    </a>
                </div>



                <div class="col-4 col-md-2 mb-3">
                    <a href="https://t.me/YOUR_CHANNEL" target="_blank" class="social-card telegram">

                        {{-- <img src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" class="social-img"> --}}

                        <i class="fab fa-facebook-f"></i>

                        {{-- <span>Telegram</span> --}}
                    </a>
                </div>



                <div class="col-4 col-md-2 mb-3">
    <a href="https://youtube.com/YOUR_CHANNEL" target="_blank" class="social-card youtube">
        
        <!-- Image -->
        {{-- <img src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" class="social-img"> --}}

        <!-- Icon -->
        <i class="fab fa-youtube"></i>

        <span>YouTube</span>
    </a>
</div>

            </div>
        </div>
        @yield('content')
    </main>

    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">

            <!-- Disclaimer -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="mb-3">Disclaimer</h5>
                    <p style="font-size:14px; line-height:1.6;">
                        Information regarding any exam form, results/marks, answer key published on this website
                        is provided only for the immediate information of the examinees and should not be
                        considered as a legal document. While every effort has been made by the Sarkarihai team
                        to ensure the accuracy of the information provided, including official links, we are
                        not responsible for any inadvertent errors that may appear in the examination
                        results/marks, answer key, timetable, or admission dates. Additionally, we disclaim
                        any liability for any loss or damage caused by any shortcomings, defects, or
                        inaccuracies in the information available on this website. In case of any correction
                        is needed, feel free to contact us through the Contact Us page.
                    </p>
                </div>
            </div>

            <div class="row">

                <!-- About Website -->
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">About Us</h5>
                    <p>
                        Our website provides the latest updates on government jobs, admit cards,
                        results, answer keys and online forms. Stay updated with the latest
                        recruitment notifications across India.
                    </p>
                    <a href="//www.dmca.com/Protection/Status.aspx?ID=ef60ce3f-6888-44e5-af7e-cfede662ea9c"
                        title="DMCA.com Protection Status" class="dmca-badge"> <img
                            src ="https://images.dmca.com/Badges/dmca_protected_25_120.png?ID=ef60ce3f-6888-44e5-af7e-cfede662ea9c"
                            alt="DMCA.com Protection Status" /></a>
                    <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                </div>

                <!-- Important Links -->
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Important Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Latest Jobs</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Admit Card</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Results</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Answer Key</a></li>
                        <li><a href="/disclaimer" class="text-light text-decoration-none">Disclaimer</a></li>
                        <li><a href="/privacy-policy" class="text-light text-decoration-none">Privacy Policy</a></li>
                        <li><a href="/contact" class="text-light text-decoration-none">Contact Us</a></li>
                        <li><a href="/fact-checking-policy" class="text-light text-decoration-none">Fact Checking
                                Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Contact Info</h5>
                    <p>Email: info@example.com</p>
                    <p>Phone: +91 9876543210</p>

                    <div>
                        <a href="#" class="text-light me-3">Facebook</a>
                        <a href="#" class="text-light me-3">Twitter</a>
                        <a href="#" class="text-light me-3">Instagram</a>
                        <a href="#" class="text-light">YouTube</a>
                    </div>
                </div>

            </div>

            <hr class="border-light">

            <!-- Copyright -->
            <div class="text-center">
                <p class="mb-0">
                    © 2026 Sarkarihai.com | All Rights Reserved
                </p>
            </div>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
