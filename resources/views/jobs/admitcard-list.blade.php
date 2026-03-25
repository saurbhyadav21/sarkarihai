@extends('layouts.app')




@section('content')
    <div class="container mt-4">

    <h2 class="mb-3 text-center fw-bold">
        📄 All Admit Cards
    </h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>Admit Release</th>
                    <th>Exam Dates</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($admitCards as $card)

                    @php
                        $isReleased = !empty($card->admit_card_release_date) && strtotime($card->admit_card_release_date) <= time();
                    @endphp

                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        <!-- Title -->
                        <td>
                            <strong>{{ $card->job_title }}</strong>
                        </td>

                        <!-- Release Date -->
                        <td class="text-center">
                            {{ $card->admit_card_release_date 
                                ? date('d M Y', strtotime($card->admit_card_release_date)) 
                                : 'Coming Soon' }}
                        </td>

                        <!-- Exam Dates -->
                        <td>
                            @if(!empty($card->exam_dates))
                                @php $dates = explode('#', $card->exam_dates); @endphp

                                @foreach($dates as $d)
                                    @php $data = explode('$', $d); @endphp

                                    @if(count($data) == 2)
                                        <div class="small">
                                            • {{ $data[0] }} -
                                            <span class="badge bg-primary">
                                                {{ date('d M Y', strtotime($data[1])) }}
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <span class="text-muted">Not Available</span>
                            @endif
                        </td>

                        <!-- Status -->
                        <td class="text-center">
                            <span class="badge {{ $isReleased ? 'bg-success' : 'bg-secondary' }}">
                                {{ $isReleased ? 'Released' : 'Not Released' }}
                            </span>
                        </td>

                        <!-- Action -->
                        <td class="text-center">
                            @if($isReleased)
                                <a href="{{ route('admit.show', $card->slug) }}" 
                                   class="btn btn-sm btn-success">
                                    Download
                                </a>
                            @else
                                <button class="btn btn-sm btn-dark" disabled>
                                    🔒 Locked
                                </button>
                            @endif
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            No Admit Cards Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>
    </div>

</div>
@endsection
