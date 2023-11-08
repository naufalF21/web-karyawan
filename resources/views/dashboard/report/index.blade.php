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
                            <h3>
                                Report
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
                                    {{ $users->count() }}
                                </small>
                            </h3>
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
                                Export
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-4">
                        <p class="text-blues" style="border-bottom: 2px solid; width: 115px;height: 35px;">All Employees</p>
                        <hr class="w-100">
                    </div>
                    <div class="card mb-4">
                        <div class="d-flex flex-row w-100 justify-content-between align-items-center pt-3 px-3">
                            <div>Month: <span class="fw-bold">{{ $date }}</span></div>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle text-white"
                                    data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                    Filter
                                </button>
                                <form class="dropdown-menu p-4" action="{{ route('report.filter') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleDropdownFormDate1" class="form-label">Month</label>
                                        <input type="month" class="form-control" id="exampleDropdownFormDate1"
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
                                            <th>Total Present</th>
                                            <th>Late</th>
                                            <th>Absent</th>
                                            <th>Cuti</th>
                                            <th>Overtime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($user->photo_path)
                                                            <img src="{{ asset('storage/profiles/' . $user->photo_path) }}"
                                                                alt="Rounded circle Image"
                                                                class="rounded-circle me-2 d-block" width="50px"
                                                                height="50px" />
                                                        @else
                                                            <img src="{{ 'https://ui-avatars.com/api/?background=random&name=' . $user->name }}"
                                                                alt="Rounded circle Image"
                                                                class="rounded-circle me-2 d-block" width="50px"
                                                                height="50px" />
                                                        @endif
                                                        <div>
                                                            <h6 class="mt-1 mb-0">{{ $user['name'] }}</h6>
                                                            <p class="text-secondary m-0">
                                                                {{ $user['position'] ? $user['position'] : '-' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-success">
                                                    {{ $absen->totalPresent($user['id'], $bulan, $tahun)->count() }}
                                                </td>
                                                <td class="text-danger">
                                                    {{ $absen->totalTerlambat($user['id'], $bulan, $tahun) }}</td>
                                                <td>
                                                    {{ $absen->totalAbsent($user['id'], $bulan, $tahun) }}
                                                </td>
                                                <td>{{ $cuti->totalCuti($user['id'], $bulan, $tahun) == '11 Day, 24h 00m' ? '12 Day' : $cuti->totalCuti($user['id'], $bulan, $tahun) }}
                                                </td>
                                                @if ($user->lemburs)
                                                    <td>{{ $lembur->totalLembur($user['id'], $bulan, $tahun) }}</td>
                                                @else
                                                    <td>00:00:00</td>
                                                @endif
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
