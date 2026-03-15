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
            background: #0b1224;
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
            color: #fff;
            padding-right: 30px !important;
            padding-left: 30px !important;
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

                <a class="navbar-brand" href="/">Sarakrihai</a>

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
            </div>

            <!-- Important Links -->
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Important Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Latest Jobs</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Admit Card</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Results</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Answer Key</a></li>
                    <li><a href="/contact" class="text-light text-decoration-none">Contact Us</a></li>
                    <li><a href="/fact-checking-policy" class="text-light text-decoration-none">Fact Checking Policy</a></li>
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
