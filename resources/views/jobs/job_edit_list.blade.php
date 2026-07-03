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
            <a href="{{ route('job.resultEdit', 'add') }}" class="btn btn-sm">
                Add Result
            </a>
            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-hover">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>image</th>
                                <th>admit date</th>
                                <th>Job Category</th>
                                <th>Job Sub Category</th>
                                <th>Job Topic</th>
                                <th>Job State</th>
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

                                    <!-- Main Category -->
                                    <td>
                                        <form action="{{ route('job.updateCategory', $job->id) }}" method="POST">
                                            @csrf

                                            <select name="main_category" class="form-select form-select-sm mb-1">
                                                <option value="">Select</option>

                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->slug }}"
                                                        {{ $job->main_category == $cat->slug ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="text" name="new_main_category"
                                                class="form-control form-control-sm mb-1" placeholder="Add New">

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Sub Category -->
                                    <td>
                                        <form action="{{ route('job.updateSubCategory', $job->id) }}" method="POST">
                                            @csrf

                                            <select name="sub_category" class="form-select form-select-sm mb-1">
                                                <option value="">Select</option>

                                                @foreach ($subCategories as $sub)
                                                    <option value="{{ $sub->slug }}"
                                                        {{ $job->sub_category == $sub->slug ? 'selected' : '' }}>
                                                        {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="text" name="new_sub_category"
                                                class="form-control form-control-sm mb-1" placeholder="Add New">

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Topic -->
                                    <td>
                                        <form action="{{ route('job.updateTopic', $job->id) }}" method="POST">
                                            @csrf

                                            <input type="text" name="topic" value="{{ $job->topic }}"
                                                class="form-control form-control-sm mb-1" placeholder="UPTET / SSC CGL">

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
                                    </td>

                                    <!-- State -->
                                    <td>
                                        <form action="{{ route('job.updateState', $job->id) }}" method="POST">
                                            @csrf

                                            <select name="state_slug" class="form-select form-select-sm mb-1">

                                                <option value="">Select State</option>

                                                @foreach ($states as $state)
                                                    <option value="{{ $state->slug }}"
                                                        {{ $job->state_slug == $state->slug ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
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
