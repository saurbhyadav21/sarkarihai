<div class="col-lg-4 mt-4 mt-lg-0">
    <style>
        .social-links {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .social-card {
            flex: 1;
            min-width: 0;

            display: flex;
            align-items: center;
            gap: 7px;

            padding: 9px 8px;

            border-radius: 10px;

            background: #fff;
            border: 1px solid #e7ebf0;

            text-decoration: none !important;

            transition: all .25s ease;
        }

        .social-icon {
            width: 30px;
            height: 30px;
            min-width: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 700;

            color: #fff;
        }

        .social-info {
            min-width: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .social-info strong {
            font-size: 11px;
            line-height: 1.2;
            color: #26384a;
        }

        .social-info small {
            font-size: 9px;
            margin-top: 2px;
            color: #8995a3;
            white-space: nowrap;
        }

        .social-arrow {
            font-size: 14px;
            color: #aab3bd;
            transition: transform .25s ease;
        }


        /* YouTube */

        .youtube .social-icon {
            background: #ff0000;
        }

        .youtube:hover {
            border-color: #ffcccc;
            background: #fff8f8;
            transform: translateY(-2px);
        }

        .youtube:hover .social-arrow {
            color: #ff0000;
            transform: translateX(3px);
        }


        /* Instagram */

        .instagram .social-icon {
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
        }

        .instagram:hover {
            border-color: #f0d5e5;
            background: #fff9fc;
            transform: translateY(-2px);
        }

        .instagram:hover .social-arrow {
            color: #c13584;
            transform: translateX(3px);
        }


        /* Telegram */

        .telegram .social-icon {
            background: #229ed9;
        }

        .telegram:hover {
            border-color: #ccebf8;
            background: #f7fcff;
            transform: translateY(-2px);
        }

        .telegram:hover .social-arrow {
            color: #229ed9;
            transform: translateX(3px);
        }


        /* Mobile */

        @media (max-width: 575px) {

            .social-links {
                gap: 6px;
            }

            .social-card {
                padding: 8px 6px;
                gap: 5px;
            }

            .social-icon {
                width: 27px;
                height: 27px;
                min-width: 27px;
                font-size: 12px;
            }

            .social-info strong {
                font-size: 10px;
            }

            .social-info small {
                font-size: 8px;
            }

            .social-arrow {
                font-size: 12px;
            }

        }
    </style>
    <div class="search-card">

        <h5 class="mb-3 fw-bold">
            🔍 Search Sarkari Jobs
        </h5>

        <div class="position-relative">

            <input type="text" id="jobSearch" class="form-control form-control-lg rounded-4 shadow-sm"
                placeholder="Search SSC, Railway, UPSC..." autocomplete="off">

            <div class="search-dropdown" style="display:none">
            </div>

        </div>

    </div>
    <div class="social-links">

        <a href="https://www.youtube.com/@sarkarihaiofficial" target="_blank" rel="noopener" class="social-card youtube">

            <span class="social-icon">▶</span>

            <span class="social-info">
                <strong>YouTube</strong>
                <small>Watch Updates</small>
            </span>

            <span class="social-arrow">→</span>

        </a>


        <a href="YOUR_INSTAGRAM_URL" target="_blank" rel="noopener" class="social-card instagram">

            <span class="social-icon">◎</span>

            <span class="social-info">
                <strong>Instagram</strong>
                <small>Follow Us</small>
            </span>

            <span class="social-arrow">→</span>

        </a>


        <a href="https://t.me/sarkarihaiofficial" target="_blank" rel="noopener" class="social-card telegram">

            <span class="social-icon">✈</span>

            <span class="social-info">
                <strong>Telegram</strong>
                <small>Join Alerts</small>
            </span>

            <span class="social-arrow">→</span>

        </a>

    </div>
</div>
