@extends('layout')
@section('dashboard')
    @include('layouts.dashboard_heading')
    <div id="layoutSidenav">
        @include('layouts.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row mt-4 mb-4">
                        <div class="col-sm-6 col-md-8">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-6 col-md-4 d-flex justify-content-sm-end ">
                            <a href="#" class="btn text-black" style="border-color: #E6E7EC; height: fit-content;">
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

                    {{-- chart --}}
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4" style="border-color: #04A6FE; border-width: 2px; border-radius: 18px;">
                                <div class="card-header">
                                    <i class="fas fa-chart-column mr-1"></i>
                                    Leave and overtime
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarStacked" width="100%" height="400"></canvas>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4" style="border-color: #04A6FE; border-width: 2px; border-radius: 18px;">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Employees
                                    <small class="text-blues">54</small>
                                </div>
                                <div class="card-body">
                                    <canvas id="myDoughnut" width="100%" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mx-auto"
                            style="border-color: #04A6FE; border-width: 2px; border-radius: 18px; width: 98%">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Presence
                            </div>
                            <div class="card-body">
                                <canvas id="myLine" width="100%" height="400"></canvas>
                            </div>
                        </div>
                        {{-- end chart --}}

                        <div class="d-flex align-items-end mt-4">
                            <p class="text-blues" style="border-bottom: 2px solid; width: 115px;height: 35px;">All Employees
                            </p>
                            <hr class="w-100">
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            @if ($user['photo_path'])
                                                                <img src="{{ asset('storage/profiles/' . auth()->user()->photo_path) }}"
                                                                    alt="Rounded circle Image"
                                                                    class="rounded-circle me-2 d-block" width="50px"
                                                                    height="50px" />
                                                            @else
                                                                <img src="{{ 'https://ui-avatars.com/api/?background=random&name=' . $user['name'] }}"
                                                                    alt="Rounded circle Image"
                                                                    class="rounded-circle me-2 d-block" width="50px"
                                                                    height="50px" />
                                                            @endif
                                                            <div>
                                                                <h6 class="mt-1 mb-0">{{ $user['name'] }}</h6>
                                                                <p class="text-secondary m-0">
                                                                    {{ $user['position'] ? $user['position'] : '-' }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $user['email'] }}</td>
                                                    <td>{{ $user['contact'] ? $user['contact'] : '-' }}</td>
                                                    <td>
                                                        <a href="#" class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor" class="bi bi-trash"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="#" class="ml-3 text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                            </svg>
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
                </div>
            </main>
        </div>
    </div>
@endsection
