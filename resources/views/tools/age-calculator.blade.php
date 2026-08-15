@extends('frontend.app')

@section('title', $title)

@section('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
@endsection

@section('content')

    <style>
        .age-page {
            background: #f5f7fb;
            padding: 35px 0 60px;
        }

        .age-container {
            max-width: 1100px;
            margin: auto;
        }

        .age-hero {
            background: linear-gradient(135deg, #062a3a, #0a5467);
            color: #fff;
            border-radius: 18px;
            padding: 45px 30px;
            text-align: center;
            margin-bottom: 25px;
        }

        .age-hero h1 {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .age-hero p {
            max-width: 750px;
            margin: auto;
            font-size: 16px;
            line-height: 1.8;
            opacity: .94;
        }

        .calculator-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .07);
        }

        .calculator-card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1d3557;
            margin-bottom: 22px;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        .form-control {
            min-height: 48px;
            border-radius: 9px;
        }

        .calculate-btn {
            width: 100%;
            min-height: 48px;
            border: 0;
            border-radius: 9px;
            background: #0d6efd;
            color: #fff;
            font-weight: 700;
            transition: .2s;
        }

        .calculate-btn:hover {
            background: #0958c7;
            transform: translateY(-1px);
        }

        .result-box {
            display: none;
            margin-top: 25px;
            padding: 22px;
            background: #f5faff;
            border: 1px solid #dcecfb;
            border-radius: 12px;
        }

        .result-box h3 {
            font-size: 20px;
            color: #1d3557;
            margin-bottom: 18px;
        }

        .age-result-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .age-result-item {
            background: #fff;
            border: 1px solid #e5edf5;
            border-radius: 10px;
            padding: 16px;
            text-align: center;
        }

        .age-result-item strong {
            display: block;
            font-size: 25px;
            color: #0d6efd;
        }

        .age-result-item small {
            color: #6c757d;
        }

        .error-message {
            display: none;
            color: #dc3545;
            margin-top: 12px;
            font-size: 14px;
        }

        .info-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            margin-top: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .info-card h2 {
            color: #1d3557;
            font-size: 25px;
            margin-bottom: 15px;
        }

        .info-card h3 {
            color: #222;
            font-size: 20px;
            margin-top: 25px;
        }

        .info-card p,
        .info-card li {
            color: #555;
            line-height: 1.8;
        }

        @media(max-width:767px) {

            .age-page {
                padding: 20px 12px 40px;
            }

            .age-hero {
                padding: 32px 18px;
            }

            .age-hero h1 {
                font-size: 28px;
            }

            .age-hero p {
                font-size: 14px;
            }

            .calculator-card,
            .info-card {
                padding: 22px 18px;
            }

            .age-result-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>


    <div class="age-page">

        <div class="age-container">

            <!-- HERO -->

            <div class="age-hero">

                <h1>Age Calculator</h1>

                <p>
                    Calculate your exact age in years, months and days
                    using your date of birth.
                </p>

            </div>


            <!-- CALCULATOR -->

            <div class="calculator-card">

                <h2>Calculate Your Exact Age</h2>

                <div class="row g-3">

                    <div class="col-md-6">

                        <label for="dob" class="form-label">
                            Date of Birth
                        </label>

                        <input type="date" id="dob" class="form-control" max="{{ date('Y-m-d') }}">

                    </div>


                    <div class="col-md-6">

                        <label for="calculateDate" class="form-label">
                            Calculate Age As Of
                        </label>

                        <input type="date" id="calculateDate" class="form-control" value="{{ date('Y-m-d') }}">

                    </div>

                </div>


                <div class="mt-4">

                    <button type="button" id="calculateAge" class="calculate-btn">
                        Calculate Age
                    </button>

                </div>


                <div id="ageError" class="error-message"></div>


                <!-- RESULT -->

                <div id="ageResult" class="result-box">

                    <h3>Your Exact Age</h3>

                    <div class="age-result-grid">

                        <div class="age-result-item">
                            <strong id="years">0</strong>
                            <small>Years</small>
                        </div>

                        <div class="age-result-item">
                            <strong id="months">0</strong>
                            <small>Months</small>
                        </div>

                        <div class="age-result-item">
                            <strong id="days">0</strong>
                            <small>Days</small>
                        </div>

                    </div>

                </div>

            </div>


            <!-- SEO CONTENT -->

            <div class="info-card">

                <h2>Age Calculator</h2>

                <p>
                    Our free Age Calculator helps you calculate your exact age
                    from your date of birth. Enter your date of birth and select
                    the date on which you want to calculate your age.
                </p>


                <h3>How to Calculate Your Age?</h3>

                <ol>
                    <li>Enter your date of birth.</li>
                    <li>Select the date for which you want to calculate your age.</li>
                    <li>Click on the Calculate Age button.</li>
                    <li>Your exact age will be displayed in years, months and days.</li>
                </ol>


                <h3>What Can You Use an Age Calculator For?</h3>

                <p>
                    An age calculator can be useful for checking your age for
                    government jobs, competitive exams, school and college
                    admissions, eligibility requirements and other applications.
                </p>


                <h3>Age Calculator for Government Jobs</h3>

                <p>
                    Government job notifications often specify an age limit
                    such as minimum and maximum age. Your exact date of birth
                    can help you check whether you meet the stated age criteria.
                    Always check the official recruitment notification for the
                    applicable age limit, relaxation and cut-off date.
                </p>

            </div>
            <div class="info-card">

                <h2>Frequently Asked Questions</h2>

                <h3>How does the Age Calculator work?</h3>

                <p>
                    Enter your date of birth and the date on which you want to
                    calculate your age. The calculator displays your age in years,
                    months and days.
                </p>

                <h3>Can I calculate my age on a future date?</h3>

                <p>
                    Yes. You can select another date to calculate how old you will
                    be on that date.
                </p>

                <h3>Is the Age Calculator free?</h3>

                <p>
                    Yes. SarkariHai's Age Calculator is free to use.
                </p>

            </div>
        </div>

    </div>


    <script>
        document.getElementById('calculateAge').addEventListener('click', function() {

            const dobValue = document.getElementById('dob').value;
            const calculateDateValue = document.getElementById('calculateDate').value;

            const error = document.getElementById('ageError');
            const result = document.getElementById('ageResult');

            error.style.display = 'none';
            result.style.display = 'none';


            if (!dobValue) {

                error.textContent = 'Please enter your date of birth.';
                error.style.display = 'block';

                return;
            }


            if (!calculateDateValue) {

                error.textContent = 'Please select a calculation date.';
                error.style.display = 'block';

                return;
            }


            const dob = new Date(dobValue + 'T00:00:00');
            const target = new Date(calculateDateValue + 'T00:00:00');


            if (dob > target) {

                error.textContent =
                    'Date of birth cannot be later than the calculation date.';

                error.style.display = 'block';

                return;
            }


            let years = target.getFullYear() - dob.getFullYear();
            let months = target.getMonth() - dob.getMonth();
            let days = target.getDate() - dob.getDate();


            if (days < 0) {

                months--;

                const previousMonthDays = new Date(
                    target.getFullYear(),
                    target.getMonth(),
                    0
                ).getDate();

                days += previousMonthDays;
            }


            if (months < 0) {

                years--;
                months += 12;
            }


            document.getElementById('years').textContent = years;
            document.getElementById('months').textContent = months;
            document.getElementById('days').textContent = days;

            result.style.display = 'block';

        });
    </script>


@endsection
