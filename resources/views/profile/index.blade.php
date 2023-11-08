@extends('layout')
@section('container')
    <div class="container">
        <div class="row gap-5">
            @include('components.sidebar')
            <form class="col-9" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <h5 class="fw-bold">Profile Photo</h5>
                        @if (auth()->user()->photo_path)
                            <img src="{{ asset('storage/profiles/' . auth()->user()->photo_path) }}"
                                alt="Rounded circle Image" class="rounded-circle" width="120" height="120" />
                        @else
                            <img src="{{ 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->name }}"
                                alt="Rounded circle Image" class="rounded-circle" width="120" height="120" />
                        @endif
                    </div>
                    <div class="col-5 d-flex align-items-center justify-content-end gap-3">
                        @if (Route::is('profile.edit'))
                            @if (auth()->user()->photo_path)
                                <button type="button" class="btn btn-outline-primary" style="height: fit-content"
                                    onclick="document.getElementById('remove-photo').submit();">Remove
                                    photo</button>
                            @endif
                            <div class="input_container">
                                <label for="files" class="btn btn-primary fw-normal text-white px-3">Change
                                    photo</label>
                                <input id="files" style="display:none;" type="file" name="photo_path">
                            </div>
                        @endif
                    </div>
                    <div class="col-2"></div>
                </div>
                <h5 class="fw-bold mt-5">Profile Information</h5>
                <div class="row mt-3">
                    <div class="col">
                        <div class="row">
                            <div class="col d-flex flex-column gap-4">
                                <div class="d-flex flex-column ">
                                    <label for="username" class="text-secondary">Name</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ auth()->user()->name == null ? '' : auth()->user()->name }}"
                                                placeholder="Enter your name" required>
                                        </div>
                                    @else
                                        <span id="username"
                                            class="fw-medium">{{ auth()->user()->name == null ? '-' : auth()->user()->name }}</span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="contact" class="text-secondary">Address</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ auth()->user()->address == null ? '' : auth()->user()->address }}"
                                                placeholder="Enter your address" required>
                                        </div>
                                    @else
                                        <span id="address"
                                            class="fw-medium">{{ auth()->user()->address == null ? '-' : auth()->user()->address }}</span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="contact" class="text-secondary">Contact</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="text" name="contact" class="form-control"
                                                value="{{ auth()->user()->contact == null ? '' : auth()->user()->contact }}"
                                                placeholder="Enter your contact" required>
                                        </div>
                                    @else
                                        <span id="contact"
                                            class="fw-medium">{{ auth()->user()->contact == null ? '-' : auth()->user()->contact }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col d-flex flex-column gap-4">
                                <div class="d-flex flex-column">
                                    <label for="position" class="text-secondary">Email</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ auth()->user()->email == null ? '' : auth()->user()->email }}"
                                                placeholder="Enter your email" required>
                                        </div>
                                    @else
                                        <span id="email"
                                            class="fw-medium">{{ auth()->user()->email == null ? '-' : auth()->user()->email }}</span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="position" class="text-secondary">Position</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="text" name="position" class="form-control"
                                                value="{{ auth()->user()->position == null ? '' : auth()->user()->position }}"
                                                placeholder="Enter your position" required>
                                        </div>
                                    @else
                                        <span id="position"
                                            class="fw-medium">{{ auth()->user()->position == null ? '-' : auth()->user()->position }}</span>
                                    @endif
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="birthday" class="text-secondary">Birthday</label>
                                    @if (Route::is('profile.edit'))
                                        <div class="input-group">
                                            <input type="date" name="birthday" class="form-control"
                                                value="{{ auth()->user()->birthday == null ? '' : auth()->user()->birthday }}"
                                                placeholder="Enter your birthday" required>
                                        </div>
                                    @else
                                        <span id="birthday"
                                            class="fw-medium">{{ auth()->user()->birthday == null ? '-' : auth()->user()->birthday }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-items-center">
                        @if (Route::is('profile.edit'))
                            <div class="d-flex flex-column gap-3">
                                <button type="submit" class="btn btn-primary text-white px-3">Simpan</button>
                                <a href="{{ route('profile') }}" class="btn btn-outline-primary px-3">Batal</a>
                            </div>
                        @else
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary text-white px-4 mt-2"
                                style="height: fit-content">Edit</a>
                        @endif
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
    </div>
    {{-- form remove photo --}}
    <form id="remove-photo" action="{{ route('profile.delete.photo') }}" method="post" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    {{-- end form remove photo --}}
    @if (session('success'))
        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-end align-items-center w-100 pe-4">
            <div class="toast align-items-center text-bg-success border-0 fade show px-2 py-1" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <script>
        document.querySelector("#files").onchange = function() {
            const fileName = this.files[0]?.name;
            const label = document.querySelector("label[for=files]");
            label.innerText = fileName ?? "Browse Files";
        };
    </script>
@endsection
