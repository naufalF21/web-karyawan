@extends('layout')
@section('dashboard')
    @include('layouts.dashboard_heading')
    <div id="layoutSidenav">
        @include('components.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-sm-6 col-md-8">
                            <h3 class="">
                                Presence
                                <small class="h6 text-primary">
                                    <svg width="20" height="20" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_655_1096)">
                                            <path
                                                d="M6.06 5.99967C6.21673 5.55412 6.5261 5.17841 6.9333 4.9391C7.3405 4.69978 7.81926 4.6123 8.28478 4.69215C8.7503 4.772 9.17254 5.01402 9.47671 5.37536C9.78089 5.7367 9.94737 6.19402 9.94666 6.66634C9.94666 7.99967 7.94666 8.66634 7.94666 8.66634M8 11.333H8.00666M14.6667 7.99967C14.6667 11.6816 11.6819 14.6663 8 14.6663C4.3181 14.6663 1.33333 11.6816 1.33333 7.99967C1.33333 4.31778 4.3181 1.33301 8 1.33301C11.6819 1.33301 14.6667 4.31778 14.6667 7.99967Z"
                                                stroke="#98A2B3" stroke-width="1.33333" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_655_1096">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    {{ $absens->count() }}
                                </small>
                            </h3>
                        </div>
                    </div>
                    {{-- tab --}}
                    <ul class="nav nav-tabs mt-4">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" aria-current="page" href="{{ route('presence') }}">All
                                Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary" href="{{ route('presence.attended') }}">Attended</a>
                        </li>
                    </ul>
                    {{-- end tab --}}
                    <div class="card mb-4 ">
                        <div class="d-flex flex-row w-100 justify-content-between align-items-center pt-3 px-3">
                            <div>Date: <span class="fw-bold">{{ $todayFormatted }}</span></div>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle text-white"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    Filter
                                </button>
                                <form class="dropdown-menu p-4"
                                    action="{{ route('presence.filter', ['page' => 'attended']) }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormDate1" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="exampleDropdownFormDate1"
                                            name="date">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white">Set</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>In</th>
                                            <th>Out</th>
                                            <th>Work Hours</th>
                                            <th>Late</th>
                                            <th>Overtime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($absens as $data)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($data->user->photo_path)
                                                            <img src="{{ asset('storage/profiles/' . auth()->user()->photo_path) }}"
                                                                alt="Rounded circle Image"
                                                                class="rounded-circle me-2 d-block" width="50px"
                                                                height="50px" />
                                                        @else
                                                            <img src="{{ 'https://ui-avatars.com/api/?background=random&name=' . $data->user->name }}"
                                                                alt="Rounded circle Image"
                                                                class="rounded-circle me-2 d-block" width="50px"
                                                                height="50px" />
                                                        @endif
                                                        <div>
                                                            <h6 class="mt-1 mb-0">{{ $data->user->name }}</h6>
                                                            <p class="text-secondary m-0">
                                                                {{ $data->user->position ?: '-' }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="{{ $data->terlambat ? 'text-warning' : 'text-success' }}">
                                                    {{ $data->waktu_check_in }}</td>
                                                <td class="text-danger">{{ $data->waktu_check_out ?: '-' }}</td>
                                                <td>{{ $data->jam_kerja ?: '-' }}</td>
                                                <td>{{ $data->terlambat ? 'Yes' : 'No' }}</td>
                                                <td>{{ $lembur->hitungLemburPerHariIni($data->user_id) ?: '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
