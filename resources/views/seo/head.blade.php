{{-- ===========================
    META
============================ --}}

@include('seo.meta')

{{-- ===========================
    CANONICAL
============================ --}}

@include('seo.canonical')

{{-- ===========================
    ROBOTS
============================ --}}

@include('seo.robots')

{{-- ===========================
    OPEN GRAPH
============================ --}}

@include('seo.open-graph')

{{-- ===========================
    TWITTER
============================ --}}

@include('seo.twitter')

{{-- ===========================
    SCHEMA
============================ --}}

@includeWhen(isset($schemaOrganization),'seo.schema.organization')

@includeWhen(isset($schemaWebsite),'seo.schema.website')

@includeWhen(isset($schemaBreadcrumb),'seo.schema.breadcrumb')

@if(isset($job))
    @include('seo.job-posting')
@endif

@includeWhen(isset($schemaFaq),'seo.schema.faq')