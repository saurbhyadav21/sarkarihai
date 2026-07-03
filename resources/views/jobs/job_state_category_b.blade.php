<nav aria-label="breadcrumb" class="breadcrumb">

    <a href="{{ url('/') }}">
        Home
    </a>

    <span> / </span>

    <a href="{{ route('latest.jobs') }}">
        Latest Jobs
    </a>

    @if($state)
        <span> / </span>

        <a href="{{ route('latest.jobs.state', $state) }}">
            {{ ucwords(str_replace('-', ' ', $state)) }}
        </a>
    @endif

    @if($category)
        <span> / </span>

        <span aria-current="page">
            {{ ucwords(str_replace('-', ' ', $category)) }}
        </span>
    @endif

</nav>