<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>xs</title>
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet">


    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js">
</script>



    <style>
        /* ===========================
HEADER
=========================== */

        .main-header {
            background: #ffffff;
            border-bottom: 1px solid #e8edf3;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .05);
        }

        .logo img {
            max-height: 42px;
        }

        .desktop-menu {
            gap: 28px;
        }

        .desktop-menu a {
            color: #173b5b;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: .2s;
        }

        .desktop-menu a:hover {
            color: #0a5467;
        }

        .search-box {
            display: flex;
            border: 2px solid #edf1f7;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 15px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 220px;
            padding: 10px 15px;
        }

        .search-box button {
            border: none;
            background: #0a5467;
            color: #fff;
            padding: 0 18px;
        }

        .mobile-toggle {
            border: none;
            background: #0a5467;
            color: #fff;
            width: 42px;
            height: 42px;
            border-radius: 8px;
            font-size: 20px;
        }

        .offcanvas-body a {
            display: block;
            padding: 12px 0;
            color: #173b5b;
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }
    </style>
    <!-- ===========================
HEADER
=========================== -->

    <header class="main-header">

        <div class="container">

            <div class="d-flex align-items-center justify-content-between">

                <!-- Logo -->
                <a href="/" class="logo">
                    <img src="/logo.png" alt="Sarkari Hai" height="42">
                </a>

                <!-- Desktop Menu -->
                <nav class="desktop-menu d-none d-lg-flex">

                    <a href="/sarkari-naukri">
                        Latest Jobs
                    </a>

                    <a href="/admit-card">
                        Admit Card
                    </a>

                    <a href="/result">
                        Result
                    </a>

                    <a href="/syllabus">
                        Syllabus
                    </a>

                    <a href="/answer-key">
                        Answer Key
                    </a>

                    <a href="/admission">
                        Admission
                    </a>

                </nav>

                <!-- Search -->
                <div class="header-right d-flex align-items-center">

                    <form class="search-box">

                        <input type="text" placeholder="Search Jobs...">

                        <button type="submit">
                            🔍
                        </button>

                    </form>

                    <!-- Mobile Menu -->
                    <button class="mobile-toggle d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">

                        ☰

                    </button>

                </div>

            </div>

        </div>

    </header>



    <!-- MOBILE MENU -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">

        <div class="offcanvas-header">

            <h5>Sarkari Hai</h5>

            <button class="btn-close" data-bs-dismiss="offcanvas">
            </button>

        </div>

        <div class="offcanvas-body">

            <a href="/sarkari-naukri">
                Latest Jobs
            </a>

            <a href="/admit-card">
                Admit Card
            </a>

            <a href="/result">
                Result
            </a>

            <a href="/syllabus">
                Syllabus
            </a>

            <a href="/answer-key">
                Answer Key
            </a>

            <a href="/admission">
                Admission
            </a>

        </div>

    </div>
