<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admit card Edit List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Result Edit List</h5>
            </div>
            <a href="{{ route('job.admitEdit', 'add') }}"
                                            class="btn btn-sm">
            Add Admit card
                                        </a>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Delete</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($admit_card as $job)
                                <tr>

                                    <td>{{ $job->id }}</td>

                                    <td>{{ $job->job_title }}</td>

                                    <td>
                                        <!-- Delete Button -->
                                        <form action="{{ route('result.destroy', $job->id) }}" method="POST"
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

                                        <a href="{{ route('admit_card.edit', $job->id) }}" class="btn btn-warning btn-sm">
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
