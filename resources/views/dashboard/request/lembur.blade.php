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
                                    {{ $lemburs->count() }}</small></h3>
                        </div>
                        <div class="col-6 col-md-4 d-flex justify-content-sm-end justify-content-start">
                            <a href="#" class="btn text-black" style="border-color: #E6E7EC">
                                <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.08146 10.291L8.08146 2.26367" stroke="black" stroke-width="1.2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.0255 8.33887L8.08145 10.2909L6.13745 8.33887" stroke="black"
                                        stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M11.5061 5H12.2121C13.7521 5 15 6.2121 15 7.70867L15 11.2987C15 12.7908 13.7551 14 12.2189 14L3.78865 14C2.24865 14 1 12.7872 1 11.2913L1 7.70059C1 6.20916 2.24562 5 3.78108 5H4.49395"
                                        stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Export</a>
                        </div>
                    </div>
                    {{-- tab --}}
                    <ul class="nav nav-tabs mt-4">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" aria-current="page"
                                href="{{ route('request') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('request.cuti') }}">Cuti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-primary" href="{{ route('request.lembur') }}">Lembur</a>
                        </li>
                    </ul>
                    {{-- end tab --}}
                    <div class="card mb-4">
                        <div class="d-flex flex-row w-100 justify-content-between align-items-center pt-3 px-3">
                            <div>Date: <span class="fw-bold">{{ $date }}</span></div>
                            {{-- filter dropdown --}}
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle text-white"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    Filter
                                </button>
                                <form class="dropdown-menu p-4" action="{{ route('request.lembur.filter') }}"
                                    method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormDate1" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="exampleDropdownFormDate1"
                                            name="date">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white">Set</button>
                                </form>
                            </div>
                            {{-- end filter dropdown --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Jenis Lembur</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lemburs as $lembur)
                                            <tr>
                                                <td>{{ $lembur->user->name }}</td>
                                                <td>{{ $lembur->user->position ?: '-' }}</td>
                                                <td>{{ $lembur->jenis }}</td>
                                                @if ($lembur->status)
                                                    <td
                                                        class="{{ $lembur->status == 'true' ? 'text-success' : 'text-danger' }}">
                                                        {{ $lembur->status == 'true' ? 'Approved' : 'Not approved' }}</td>
                                                @else
                                                    <td class="text-warning">Pending approval</td>
                                                @endif
                                                <td class="d-flex align-items-center">
                                                    <a
                                                        href="{{ route('request.lembur.detail', ['id' => $lembur['id']]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="22" viewBox="0 0 18 18" fill="none">
                                                            <path
                                                                d="M1.48446 9.30824C1.39438 9.19698 1.31288 9.09368 1.24039 9C1.31288 8.90632 1.39438 8.80302 1.48446 8.69175C1.91801 8.15628 2.54388 7.44437 3.31349 6.73557C4.88844 5.28506 6.89993 4 9 4C11.1001 4 13.1116 5.28506 14.6865 6.73557C15.4561 7.44437 16.082 8.15628 16.5155 8.69175C16.6056 8.80302 16.6871 8.90632 16.7596 9C16.6871 9.09368 16.6056 9.19698 16.5155 9.30824C16.082 9.84372 15.4561 10.5556 14.6865 11.2644C13.1116 12.7149 11.1001 14 9 14C6.89993 14 4.88844 12.7149 3.31349 11.2644C2.54388 10.5556 1.91801 9.84372 1.48446 9.30824Z"
                                                                stroke="#333434" stroke-width="2" />
                                                            <path
                                                                d="M11.75 9C11.75 10.5188 10.5188 11.75 9 11.75C7.48122 11.75 6.25 10.5188 6.25 9C6.25 7.48122 7.48122 6.25 9 6.25C10.5188 6.25 11.75 7.48122 11.75 9Z"
                                                                stroke="#333434" stroke-width="2" />
                                                        </svg>
                                                    </a>
                                                    @if ($lembur->status)
                                                        <span class="ml-4">-</span>
                                                    @else
                                                        <form action="{{ route('request.lembur.rejected', $lembur->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="border-0 bg-transparent mr-3 ml-4">
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
                                                        <form action="{{ route('request.lembur.approve', $lembur->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="border-0 bg-transparent">
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
