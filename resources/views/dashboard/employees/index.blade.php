@extends('layout')
@section('dashboard')
    @include('layouts.dashboard_heading')
    <div id="layoutSidenav">
        @include('layouts.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-sm-6 col-md-8">
                            <h3 class="">Employees
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
                            <a href="#" class="btn text-black mr-3" style="border-color: #E6E7EC">
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
                            <a href="{{ route('employee.add') }}" class="btn btn-primary text-white col col-sm-6 col-md-8">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 7.33301V16.6663M7.33334 11.9997H16.6667" stroke="white"
                                        stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    <rect x="2" y="2" width="20" height="20" rx="10"
                                        stroke="white" stroke-width="1.3
                                "
                                        stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="1 3" />
                                </svg>
                                New Employee
                            </a>

                        </div>
                    </div>
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
                                            <th>Role</th>
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
                                                <td>{{ $user['role'] }}</td>
                                                <td>
                                                    <a href="{{ route('employee.edit', ['id' => $user['id']]) }}"
                                                        class="ml-4 text-black">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-pencil-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg>
                                                    </a>
                                                    <!-- Button trigger modal delete -->
                                                    <a href="#" type="button" class="ml-4 text-black delete-btn"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        data-user-id="{{ $user['id'] }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-trash3-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
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
            </main>
        </div>
    </div>
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
                        .then(window.location.href = '/dashboard/employees')
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            })
        })
    </script>
@endsection
