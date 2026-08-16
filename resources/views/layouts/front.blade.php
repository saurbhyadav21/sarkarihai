<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarkari Result 2026 | Latest Jobs, Admit Card, Results</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="https://sarkarihai.com/public/images/fevicon.ico" sizes="any">

    <link rel="icon" type="image/png" sizes="32x32" href="https://sarkarihai.com/public/images/fevicon.ico">

    <link rel="icon" type="image/png" sizes="16x16" href="https://sarkarihai.com/public/images/fevicon.ico">
    
    <link rel="apple-touch-icon" href="https://sarkarihai.com/public/images/fevicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
    @include('seo.head')

    <style>
        body {
            background: #f5f7fb;
            font-family: system-ui;
        }

        /* HEADER */
        .top-header {
            background: #ffffff;
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .logo {
            font-weight: 800;
            font-size: 20px;
            color: #0a5467;
            text-decoration: none;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 600;
            margin: 0 8px;
        }

        .nav-link:hover {
            color: #0a5467 !important;
        }

        .search-box input {
            border-radius: 8px;
        }

        .search-box button {
            background: #f4b400;
            border: none;
            font-weight: 600;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            color: #fff;
            padding: 40px 20px;
            border-radius: 0 0 20px 20px;
        }

        .hero h1 {
            font-size: 30px;
            font-weight: 800;
        }

        .hero p {
            opacity: .85;
        }

        .stats {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 15px;
            text-align: center;
        }

        .stats h3 {
            color: #f4b400;
            font-weight: 800;
        }

        .search-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            color: #000;
        }

        .search-card button {
            width: 100%;
            background: #f4b400;
            border: none;
            font-weight: 700;
        }

        .live-update {
            background: rgba(229, 57, 53, .15);
            border: 1px solid rgba(229, 57, 53, .3);
            padding: 12px;
            border-radius: 8px;
            color: white;
            margin-top: 20px;
        }

        .latest-update-box {
            background: linear-gradient(135deg, #12273a, #1c3348);
            border: 1px solid rgba(255, 255, 255, .08);
            border-left: 4px solid #ffb703;
            border-radius: 12px;
            padding: 18px 22px;
            margin: 20px 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
        }

        .update-title {
            font-size: 26px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 14px;
        }

        .update-links {
            line-height: 2;
        }

        .update-links a {
            color: #f5f7fa;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: .2s;
        }

        .update-links a:hover {
            color: #ffc107;
        }

        .divider {
            display: inline-block;
            width: 7px;
            height: 7px;
            background: #ffb703;
            border-radius: 50%;
            margin: 0 12px;
            vertical-align: middle;
        }

        @media(max-width:768px) {

            .latest-update-box {
                padding: 15px;
            }

            .update-title {
                font-size: 22px;
            }

            .update-links a {
                font-size: 14px;
                display: inline;
            }

            .news-ticker {
                display: flex;
                align-items: center;
                background: #13293d;
                border: 1px solid rgba(255, 255, 255, .1);
                border-radius: 10px;
                overflow: hidden;
                margin-bottom: 15px;
            }

            .ticker-title {
                background: #f5b301;
                color: #111;
                font-weight: 700;
                padding: 12px 18px;
                min-width: 180px;
                text-align: center;
            }

            .news-ticker marquee {
                padding: 12px;
                color: #fff;
            }

            .news-ticker marquee a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
            }

            .news-ticker marquee a:hover {
                color: #f5b301;
            }

            .latest-ticker {
                display: flex;
                align-items: center;
                background: #10263b;
                border-radius: 12px;
                overflow: hidden;
                margin: 25px 0;
                border: 1px solid rgba(255, 255, 255, 0.08);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            }

            .ticker-heading {
                background: linear-gradient(135deg, #ff9800, #ffb300);
                color: #111;
                font-size: 18px;
                font-weight: 700;
                padding: 16px 22px;
                min-width: 220px;
                text-align: center;
                white-space: nowrap;
                position: relative;
            }

            .ticker-heading:after {
                content: '';
                position: absolute;
                right: -15px;
                top: 0;
                width: 0;
                height: 0;
                border-top: 28px solid transparent;
                border-bottom: 28px solid transparent;
                border-left: 15px solid #ffb300;
            }

            .latest-ticker marquee {
                padding: 15px 20px;
                background: #18344d;
            }

            .latest-ticker a {
                color: #ffffff;
                text-decoration: none;
                font-size: 15px;
                font-weight: 500;
                transition: .2s;
            }

            .latest-ticker a:hover {
                color: #ffb300;
                text-decoration: underline;
            }

            .ticker-separator {
                color: #ffb300;
                margin: 0 18px;
                font-size: 18px;
                font-weight: bold;
            }

            @media(max-width:768px) {

                .latest-ticker {
                    flex-direction: column;
                }

                .ticker-heading {
                    width: 100%;
                    min-width: 100%;
                    border-radius: 0;
                }

                .ticker-heading:after {
                    display: none;
                }

                .latest-ticker marquee {
                    padding: 12px;
                }

            }


        }
    </style>
</head>

<body>

    <!-- ================= HEADER ================= -->
    <style>
        .top-header {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 12px 0;
        }

        .header-wrap {
            display: flex;
            align-items: center;
        }

        .logo {
            flex-shrink: 0;
        }

        .logo img {
            height: 65px;
            width: auto;
            display: block;
        }

        .header-menu {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .header-menu .nav-link {
            color: #222;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: .3s;
        }

        .header-menu .nav-link:hover {
            color: #0d6efd;
        }

        .menu-btn {
            margin-left: auto;
            border: 0;
            background: transparent;
            font-size: 30px;
            line-height: 1;
        }

        .mobile-link {
            display: block;
            padding: 14px 0;
            color: #222;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }

        .mobile-link:hover {
            color: #0d6efd;
        }

        @media (max-width:991px) {

            .top-header {
                padding: 8px 0;
            }

            .logo img {
                height: 50px;
            }

        }
        /* FOOTER */
            .footer {
                background: #0a5467;
                color: #fff;
                padding: 30px;
                margin-top: 30px;
                border-radius: 10px 10px 0 0;
            }

            .footer a {
                color: #fff;
                text-decoration: none;
                display: block;
                font-size: 14px;
                margin-bottom: 6px;
                opacity: .9;
            }

            .footer a:hover {
                opacity: 1;
            }

            .footer-title {
                font-weight: 800;
                margin-bottom: 10px;
            }

            .bottom-bar {
                text-align: center;
                padding: 10px;
                background: #083b49;
                color: #fff;
                font-size: 13px;
            }
    </style>
    <!-- ================= HEADER ================= -->
    <div class="top-header">
        <div class="container header-wrap">

            <a href="https://sarkarihai.com" class="logo">
                <img src="https://sarkarihai.com/public/images/logo.png?v=2" alt="SarkariHai">
            </a>

            <!-- Desktop Menu -->
            <div class="header-menu d-none d-lg-flex">
                <a href="/" class="nav-link">Latest Jobs</a>
                <a href="#" class="nav-link">Admit Card</a>
                <a href="#" class="nav-link">Result</a>
                <a href="#" class="nav-link">Syllabus</a>
                <a href="#" class="nav-link">Answer Key</a>
                <a href="#" class="nav-link">Admission</a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                ☰
            </button>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>

            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">

            <a href="#" class="mobile-link">Latest Jobs</a>

            <a href="#" class="mobile-link">Admit Card</a>

            <a href="#" class="mobile-link">Result</a>

            <a href="#" class="mobile-link">Syllabus</a>

            <a href="#" class="mobile-link">Answer Key</a>

            <a href="#" class="mobile-link">Admission</a>

        </div>

    </div>
    @yield('content')
    <!-- ================= FOOTER ================= -->
    <div class="footer">

        <div class="row">

            <div class="col-lg-3">

                <div class="footer-title">SarkariHai</div>
                <p style="font-size:14px;opacity:.9;">
                    Latest Government Jobs, Admit Card,
                    Results & Answer Key Updates.
                </p>

            </div>
            
            <div class="col-lg-3">

                <div class="footer-title">Important Links</div>

                <a href="/">Latest Jobs</a>
                <a href="#">Admit Card</a>
                <a href="#">Results</a>
                <a href="#">Answer Key</a>
                <a href="/age-calculator">Age Calculator</a>
                <a href="/salary-calculator">Salary Calculator</a>
                {{-- <a href="#">Answer Key</a>
                <a href="#">Answer Key</a> --}}

            </div>

            <div class="col-lg-3">

                <div class="footer-title">Quick Pages</div>

                <a href="#">State Jobs</a>
                <a href="#">Category Jobs</a>
                <a href="#">Contact</a>
                <a href="#">About</a>

            </div>

            <div class="col-lg-3">

                <div class="footer-title">Support</div>

                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/disclaimer">Disclaimer</a>
                <a href="/dmca">DMCA</a>
                <a href="/fact-checking-policy">Fact Checking Policy</a>                
                <a href="/sitemap.xml">Sitemap</a>
                <a href="/about">About</a>
                <a href="/contact">Contact</a>

            </div>

        </div>

    </div>

    <div class="bottom-bar">
        © 2026 SarkariHai.com | All Rights Reserved
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
        crossorigin="anonymous"></script>
    <script>
        $('#jobSearch').keyup(function() {

            let q = $(this).val();

            if (q.length < 2) {
                $('.search-dropdown').hide().html('');
                return;
            }

            $.get(
                "{{ route('search.jobs') }}", {
                    q: q
                },
                function(data) {

                    let html = '';

                    if (data.length > 0) {

                        data.forEach(function(job) {

                            html += `
                    <a href="/sarkari-naukri/${job.state ?? 'all-india'}/${job.category ?? 'government'}/${job.slug}"
                       class="search-item">

                        <div class="search-icon">
                            📄
                        </div>

                        <div class="search-body">

                            <div class="search-title">
                                ${job.title}
                            </div>

                            <div class="search-meta">

    <span class="search-category">
        💼 ${job.category ?? 'Government'}
    </span>

    <span class="search-separator">|</span>

    <span class="search-posts" style="font-size: 11px;">
        👥 ${job.total_vacancies ?? 'N/A'} Posts
    </span>

    <span class="search-separator">|</span>

    <span class="search-date" style="font-size: 11px;">
        📅 ${job.end_date ?? 'Open'}
    </span>

</div>

                        </div>

                        <div class="search-arrow">
                            ❯
                        </div>

                    </a>
                    `;
                        });



                    } else {

                        html = `
                <div class="p-4 text-center">
                    No Sarkari Jobs Found
                </div>
                `;
                    }

                    $('.search-dropdown')
                        .html(html)
                        .show();

                }
            );
        });


        // outside click hide
        $(document).click(function(e) {

            if (!$(e.target).closest('.position-relative').length) {
                $('.search-dropdown').hide();
            }

        });



        document.querySelectorAll('.tab-btn').forEach(btn => {

            btn.addEventListener('click', function() {

                document.querySelectorAll('.tab-btn').forEach(x => x.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(x => x.classList.remove('active'));

                this.classList.add('active');

                document.getElementById(this.dataset.tab).classList.add('active');

            });

        });
    </script>
</body>

</html>
