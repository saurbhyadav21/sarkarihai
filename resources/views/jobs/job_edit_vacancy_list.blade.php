<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacancy Edit List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid mt-4">

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Jobs — Missing Total Vacancies</h5>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <p>
                Pending records: <strong>{{ $jobs->total() }}</strong>
            </p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Source</th> 
                            <th style="min-width:180px;">Total Vacancies</th>
                            <th>Save</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($jobs as $job)
                            <tr>
                                <td>{{ $job->id }}</td>

                                <td>
                                    <a href="{{ $job->source_url }}"
                                       target="_blank"
                                       rel="noopener noreferrer">
                                        {{ $job->source }}
                                    </a>
                                </td>

                                
                                <form action="{{ route('job.vacancy.update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $job->id }}">

                                    <td>
                                        <input
                                            type="number"
                                            name="total_vacancies"
                                            class="form-control form-control-sm"
                                            min="1"
                                            step="1"
                                            placeholder="Enter posts"
                                            required
                                        >
                                    </td>

                                    <td>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Save
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-success">
                                    All records have total vacancies filled.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $jobs->appends(['limit' => $limit])->links('pagination::bootstrap-5') }}

        </div>
    </div>
</div>

</body>
</html>