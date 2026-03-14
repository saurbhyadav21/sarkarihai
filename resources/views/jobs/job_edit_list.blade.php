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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($jobs as $job)
                                <tr>

                                    <td>{{ $job->id }}</td>

                                    <td>{{ $job->title }}</td>

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
