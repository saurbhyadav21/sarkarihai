{{ $stateName }}
<script type="application/ld+json">
{
    "@context":"https://schema.org",
    

    "title":"{{ $job->title }}",

    "description":"{!! strip_tags($overview) !!}",

    "identifier":{
        
        "name":"{{ $job->organization }}",
        "value":"{{ $job->id }}"
    },

    "datePosted":"{{ optional($job->created_at)->format('Y-m-d') }}",

    "validThrough":"{{ optional($job->end_date)->format('Y-m-d') }}",

    "employmentType":"{{ $job->employment_type ?? 'FULL_TIME' }}",

    "hiringOrganization":{
       
        "name":"{{ $job->organization }}",
        "sameAs":"https://sarkarihai.com"
    },

    "jobLocation":{
      
        "address":{
         
         
            "addressCountry":"IN"
        }
    }
}
</script>