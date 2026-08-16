{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Homepage -->
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>hourly</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Static Pages -->
    <url>
        <loc>{{ url('/about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>{{ url('/privacy-policy') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc>{{ url('/terms-and-conditions') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc>{{ url('/disclaimer') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <url>
        <loc>{{ url('/qualification-checker') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>


    <url>
        <loc>{{ url('/salary-calculator') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>


    <url>
        <loc>{{ url('/age-calculator') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>

    <!-- Jobs -->
    @foreach($jobs as $job)

    <url>
        <loc>{{ url('sarkari-naukri/' . ($job->state ?? 'all-india') . '/' . ($job->category ?? 'government') . '/' . $job->slug) }}</loc>

        <lastmod>{{ \Carbon\Carbon::parse($job->updated_at)->toAtomString() }}</lastmod>

        <changefreq>daily</changefreq>

        <priority>0.9</priority>

    </url>

    @endforeach

</urlset>