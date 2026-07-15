<script type="application/ld+json">
{
    "@context":"https://schema.org",
    "@type":"JobPosting",

    "title":"{{ $job->title }}",

    "description":"{!! strip_tags($overview) !!}",

    "identifier":{
        "@type":"PropertyValue",
        "name":"{{ $job->organization }}",
        "value":"{{ $job->id }}"
    },

    "datePosted":"{{ optional($job->created_at)->format('Y-m-d') }}",

    "validThrough":"{{ optional($job->end_date)->format('Y-m-d') }}",

    "employmentType":"{{ $job->employment_type ?? 'FULL_TIME' }}",

    "hiringOrganization":{
        "@type":"Organization",
        "name":"{{ $job->organization }}",
        "sameAs":"https://sarkarihai.com"
    },

    "jobLocation":{
        "@type":"Place",
        "address":{
            "@type":"PostalAddress",
           "addressRegion":"{{ $stateName }}",
            "addressCountry":"IN"
        }
    }
}
</script>