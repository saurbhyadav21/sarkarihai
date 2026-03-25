@foreach($admitCard as $job)
    <a href="{{ route('admit.show', $job->slug) }}">
        {{$job->title}}
    </a>
@endforeach