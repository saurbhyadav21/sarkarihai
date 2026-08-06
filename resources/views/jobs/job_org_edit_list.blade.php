<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job Edit List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="containxer mt-5">

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

                                <th>Organization</th>
                                <th>Organization Full Form</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($jobs as $job)
                                <tr>

                                    <td>{{ $job->id }}</td>


                                    <td>
                                        <span
                                            class="badge rounded-pill {{ !empty($job->organization) ? 'bg-dark' : 'bg-danger' }} px-3 py-2">
                                            {{ strtoupper($job->organization ?? 'NOT SET') }}
                                        </span>
                                        <form action="{{ route('job.updateOrganization', $job->id) }}" method="POST">
                                            @csrf

                                            <input type="text" name="organization" value="{{ $job->organization }}"
                                                class="form-control form-control-sm mb-1"
                                                placeholder="Organization Name">

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
                                        @if ($job->organization_verified)
                                            <span class="badge bg-success"
                                                style="background-color: #000 !important;">Verified</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif

                                        @if($exists)
    <span class="text-danger ms-1" title="Already exists">🚩</span>
@endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill {{ !empty($job->organization_full_form) ? 'bg-dark' : 'bg-danger' }} px-3 py-2">
                                            {{ strtoupper($job->organization_full_form ?? 'NOT SET') }}
                                        </span>
                                        <form action="{{ route('job.updateOrganizationFullForm', $job->id) }}"
                                            method="POST">
                                            @csrf

                                            <input type="text" name="organization_full_form"
                                                value="{{ $job->organization_full_form }}"
                                                class="form-control form-control-sm mb-1"
                                                placeholder="Organization Full Form">

                                            <button class="btn btn-success btn-sm w-100">
                                                Save
                                            </button>
                                        </form>
                                        @if ($job->organization_full_form_verified)
                                            <span class="badge bg-success"
                                                style="background-color: #000 !important;">Verified</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <!-- Syllabus -->
                                    

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
