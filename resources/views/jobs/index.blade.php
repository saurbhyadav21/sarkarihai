<h1>Available Jobs</h1>
<ul>
    @foreach($jobs as $job)
        @php
            $slug = Str::slug($job->title, '-'); // slug generate
        @endphp
        <li>
            <a href="{{ route('job.show', $slug) }}">
                {{ $job->title }}
            </a>
        </li>
    @endforeach
</ul>