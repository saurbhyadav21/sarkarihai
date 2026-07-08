
<a class="small-link"
    href="{{ url('sarkari-naukri/'.(!empty($job->state)?$job->state:'all-india').'/'.(!empty($job->category)?$job->category:'uncategorized').'/'.$job->slug) }}">

    {{ \Illuminate\Support\Str::limit($job->title,35) }}

    @php
        try{
            $date = \Carbon\Carbon::parse($job->end_date);
        }catch(Exception $e){
            $date = null;
        }
    @endphp

    <span class="badge-date">
        {{ $date ? $date->format('d M') : '--' }}
    </span>
</a>