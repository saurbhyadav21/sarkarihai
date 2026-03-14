<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Title</th>
<th>Action</th>
</tr>

@foreach($jobs as $job)

<tr>

<td>{{ $job->id }}</td>

<td>{{ $job->title }}</td>

<td>

<a href="{{ route('job.edit',$job->id) }}" class="btn btn-warning btn-sm">
Edit
</a>

</td>

</tr>

@endforeach

</table>