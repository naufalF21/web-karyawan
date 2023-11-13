@extends('layout')
@section('js')
    <script src="{{ $barChart->cdn() }}"></script>
    {{ $barChart->script() }}
    <script src="{{ $donutChart->cdn() }}"></script>
    {{ $donutChart->script() }}
    <script src="{{ $lineChart->cdn() }}"></script>
    {{ $lineChart->script() }}
@endsection
@section('dashboard')
    @include('layouts.dashboard_heading')
    <div id="layoutSidenav">
        @include('components.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row mt-4 mb-4">
                        <div class="col-sm-6 col-md-8">
                            <h1>Dashboard</h1>
                        </div>
                    </div>

                    {{-- chart --}}
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4" style="border-color: #04A6FE; border-width: 2px; border-radius: 18px;">
                                <div class="card-header d-flex align-items-center justify-content-between w-100">
                                    <span>
                                        <i class="fas fa-chart-column mr-1"></i>
                                        Leave and overtime
                                    </span>
                                    <div>
                                        <select class="form-select" id="select" name="select_bar"
                                            aria-label="Default select example">
                                            <option value="sevenDays" name="option">
                                                Last 7 Days</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body">
                                    {!! $barChart->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4" style="border-color: #04A6FE; border-width: 2px; border-radius: 18px;">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Employees
                                    <small class="text-blues">{{ $users->count() }}</small>
                                </div>
                                <div class="card-body">
                                    {!! $donutChart->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mx-auto"
                            style="border-color: #04A6FE; border-width: 2px; border-radius: 18px; width: 98%">
                            <div class="card-header d-flex align-items-center justify-content-between w-100">
                                <span>
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Presence
                                </span>
                                <div>
                                    <select class="form-select" id="select" name="select_bar"
                                        aria-label="Default select example">
                                        <option value="sevenDays" name="option">
                                            Last 7 Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $lineChart->container() !!}
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
                                                                <img src="{{ asset('storage/profiles/' . $user['photo_path']) }}"
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
                                                        <!-- Button trigger modal delete -->
                                                        <a href="#" type="button" class="text-black delete-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            data-user-id="{{ $user['id'] }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor" class="bi bi-trash"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                <path
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('employee.edit', ['id' => $user['id']]) }}"
                                                            class="ml-3 text-black">
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
    {{-- notif --}}
    @if (session('success'))
        <div class="toast align-items-center text-bg-primary border-0 position-fixed bottom-0 end-0 m-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body text-white">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <!-- Modal delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h4 class="modal-title fw-bold" id="deleteModalLabel">Are you sure you want to delete this account?
                    </h4>
                </div>
                <div class="modal-body">
                    <span class="text-primary">After the deletion is done.</span><br />
                    All data related to absences, overtime, leave, will be deleted from the database
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white" id="confirmDelete">Delete account</button>
                </div>
            </div>
        </div>
    </div>

    {{-- end Modal delete --}}
    <script>
        // Mendapatkan elemen modal dan tombol konfirmasi
        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Mengambil data pengguna dari atribut data-modal
                let userId = button.getAttribute('data-user-id');
                confirmDeleteButton.addEventListener('click', function() {
                    // Gunakan metode fetch untuk membuat permintaan DELETE
                    fetch('/dashboard/employees/delete/' + userId, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Sesuaikan dengan token CSRF Laravel Anda
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(window.location.href = '/dashboard/')
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            })
        })
    </script>
@endsection
