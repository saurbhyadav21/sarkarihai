@extends('layouts.front')

@section('content')
    <div class="container py-5">

        <!-- ================= HERO ================= -->

        <div class="page-hero">

            <h1>Disclaimer</h1>

            <p>

                Welcome to <strong>SarkariHai.com</strong>. This Disclaimer explains
                the limitations of liability, the purpose of the information published
                on our website, and your responsibilities as a user.

            </p>

            <div class="mt-4">

                <span class="author-badge">
                    ⚖️ Legal Notice
                </span>

                <span class="author-badge">
                    📅 Last Updated: {{ now()->format('d F Y') }}
                </span>

                <span class="author-badge">
                    🔒 Transparency First
                </span>

            </div>

        </div>



        <!-- ================= HIGHLIGHTS ================= -->

        <div class="row g-3 mb-5">

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🏛️</div>

                    <h5>Not Government Website</h5>

                    <p class="mb-0">

                        SarkariHai.com is an independent informational website.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">📑</div>

                    <h5>Official Notification</h5>

                    <p class="mb-0">

                        Always verify information from official notifications.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">✔️</div>

                    <h5>Information Only</h5>

                    <p class="mb-0">

                        Content is published only for educational purposes.

                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card">

                    <div class="feature-icon">🔄</div>

                    <h5>Regular Updates</h5>

                    <p class="mb-0">

                        Information may change without prior notice.

                    </p>

                </div>

            </div>

        </div>



        <!-- ================= GENERAL DISCLAIMER ================= -->

        <div class="page-card">

            <h2>📌 General Disclaimer</h2>

            <p>

                SarkariHai.com is an independent educational and informational
                platform created to help students, job seekers and aspirants
                access Government Job Notifications, Admit Cards, Results,
                Answer Keys, Admissions and other educational updates.

            </p>

            <p>

                We are <strong>not associated with any Government department,
                    ministry, commission, recruitment board, university or official
                    authority.</strong>

            </p>

            <div class="alert alert-warning mt-4">

                <strong>Important:</strong>

                Users should always verify recruitment details, eligibility,
                important dates, application fees and other information from
                the official notification before submitting any application.

            </div>

        </div>



        <!-- ================= ACCURACY ================= -->

        <div class="page-card">

            <h2>📖 Accuracy of Information</h2>

            <p>

                Our editorial team makes every reasonable effort to publish
                accurate, updated and reliable information.

            </p>

            <p>

                However, recruitment notifications, examination schedules,
                eligibility criteria and official announcements may change
                without prior notice.

            </p>

            <ul>

                <li>Official notifications always take priority.</li>

                <li>Users must verify information independently.</li>

                <li>Website content should not be treated as legal advice.</li>

                <li>Minor errors may occur due to human or technical reasons.</li>

            </ul>

        </div>



        <!-- ================= OFFICIAL WEBSITE ================= -->

        <div class="page-card">

            <h2>🏛️ Official Website Disclaimer</h2>

            <p>

                SarkariHai.com is <strong>not an official Government website.</strong>

            </p>

            <p>

                Names, logos, recruitment boards and examination authorities
                mentioned on this website belong to their respective owners.

            </p>

            <div class="info-box mt-4">

                Every recruitment article includes or refers to the
                official notification issued by the concerned authority.

            </div>

        </div>
    @endsection
