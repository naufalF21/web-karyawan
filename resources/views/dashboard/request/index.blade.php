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
                            <h3 class="">Request Lists <small class="h6 text-primary">
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
                                    {{ $users->count() }}</small></h3>
                        </div>
                    </div>
                    {{-- tab --}}
                    <ul class="nav nav-tabs mt-4">
                        <li class="nav-item">
                            <a class="nav-link active text-primary" aria-current="page"
                                href="{{ route('request') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('request.cuti') }}">Cuti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('request.lembur') }}">Lembur</a>
                        </li>
                    </ul>
                    {{-- end tab --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user['name'] }}</td>
                                                <td>
                                                    {{ $user['email'] }}
                                                    @if ($user['email_verified_at'])
                                                        <span class="badge text-bg-success ml-2">Verified</span>
                                                    @else
                                                        <span class="badge text-bg-danger ml-2">Not verified</span>
                                                    @endif
                                                </td>
                                                @if ($user['is_approved'])
                                                    <td
                                                        class="{{ $user['is_approved'] == 'true' ? 'text-success' : 'text-danger' }}">
                                                        {{ $user['is_approved'] == 'true' ? 'Approved' : 'Rejected' }}
                                                    </td>
                                                @else
                                                    <td class="text-warning">
                                                        Waiting For Verification
                                                    </td>
                                                @endif
                                                <td class="d-flex align-items-center">
                                                    @if ($user['is_approved'])
                                                        <span>-</span>
                                                    @else
                                                        <form action="{{ route('request.rejected', $user['id']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="border-0 bg-transparent mr-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                    height="30" viewBox="0 0 30 30" fill="none">
                                                                    <circle cx="15" cy="15" r="15"
                                                                        fill="#FF5454" />
                                                                    <path d="M20 10L10 20" stroke="white" stroke-width="4"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path d="M20 20L10 10" stroke="white" stroke-width="4"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('request.approve', $user['id']) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="border-0 bg-transparent ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                    height="30" viewBox="0 0 30 30" fill="none">
                                                                    <circle cx="15" cy="15" r="15"
                                                                        fill="#00E895" />
                                                                    <path
                                                                        d="M9.32092 15.8111L12.5661 19.0562L20.6789 10.9434"
                                                                        fill="#00E895" />
                                                                    <path
                                                                        d="M9.32092 15.8111L12.5661 19.0562L20.6789 10.9434"
                                                                        stroke="white" stroke-width="4"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
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
