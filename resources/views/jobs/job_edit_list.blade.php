<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job Edit List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Job Edit List</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>image</th>
                                <th>admit date</th>
                                {{-- <th>exam date</th> --}}
                                <th>result date</th>
                                <th>syllabus</th>
                                <th>Delete</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($jobs as $job)
                                <tr>

                                    <td>{{ $job->id }}</td>

                                    <td>{{ $job->title }}</td>

                                    <!-- Image -->
                                    <td>
                                        @if (!empty($job->image))
                                            <img src="{{ asset('/public/job-images/' . $job->image) }}" width="60"
                                                height="60" style="object-fit:cover;">
                                        @else
                                            <span class="badge bg-danger">No Image</span>
                                        @endif
                                    </td>

                                    <!-- Admit Date -->
                                    <td>
                                        {{ $job->admit_card }}

                                        <a href="{{ route('job.admitEdit', $job->id) }}"
                                            class="btn btn-sm {{ $job->admit_card == 'To Be Announced' ? 'btn-danger' : 'btn-success' }}">

                                            {{ $job->admit_card == 'To Be Announced' ? 'Update Admit' : 'Edit Admit' }}
                                        </a>
                                    </td>

                                    <!-- Exam Date -->
                                    {{-- <td>
                                        @if (!empty($job->exam_date))
                                            {{ $job->exam_date }}
                                        @else
                                            <span class="badge bg-danger">Not Announced</span>
                                        @endif
                                    </td> --}}

                                    <!-- Result Date -->
                                    <td>
                                        {{ $job->result_date }}

                                        <a href="{{ route('job.resultEdit', $job->id) }}"
                                            class="btn btn-sm {{ $job->result_date == 'To Be Announced' ? 'btn-danger' : 'btn-success' }}">

                                            {{ $job->result_date == 'To Be Announced' ? 'Update Result' : 'Edit Result' }}
                                        </a>
                                    </td>

                                    <!-- Syllabus -->
                                    <td>
                                        @if (!empty($job->syllabus))
                                            <a href="{{ $job->syllabus }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                View
                                            </a>
                                        @else
                                            <span class="badge bg-danger">Not Announced</span>
                                        @endif
                                    </td>

                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{ route('job.destroy', $job->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Delete karna hai kya?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>

                                    <td>

                                        <a href="{{ route('job.edit', $job->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
