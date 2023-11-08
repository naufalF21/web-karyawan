@extends('layout')
@section('container')
    <div class="container">
        <div class="row gap-5">
            @include('components.sidebar')
            <div class="col-9">
                @if (Route::is('profile.settings'))
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <div>
                            <h5 class="fw-normal fw-bold mb-3">Password</h5>
                            <p class="fw-normal text-body-tertiary">To change a password, you must go to the <span
                                    class="text-blues">change password</span> page.</p>
                            <a href="{{ route('profile.settings.password') }}"
                                class="btn btn-primary fw-normal text-white px-3">Change
                                Password</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                        <div>
                            <h5 class="fw-normal fw-bold mt-5 mb-3">Delete your account</h5>
                            <p class="fw-normal text-body-tertiary">By deleting your account, you'll no longer be able to
                                access
                                any of or log in to Algostudio.</p>
                            <button type="button" class="btn btn-primary fw-normal text-white px-3" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Delete Account</button>
                        </div>
                    </div>
                @else
                    <div class="align-items-center">
                        <h5 class="fw-normal fw-bold mb-3">Change Password</h5>
                        <form action="{{ route('profile.settings.password.store') }}" method="post"
                            class="row d-flex gap-3 align-items-center">
                            @csrf
                            <div class="col-7 gap-3 d-flex flex-column">
                                <div class="d-flex flex-column">
                                    <label for="old_password" class="text-secondary">Old Password</label>
                                    <div class="input-group">
                                        <input id="old_password" type="password" name="old_password" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="new_password" class="text-secondary">New Password</label>
                                    <div class="input-group">
                                        <input id="new_password" type="password" name="new_password" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="repeat_password" class="text-secondary">Repeat Password</label>
                                    <div class="input-group">
                                        <input id="repeat_password" type="password" name="repeat_password"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 d-flex flex-column gap-3">
                                <button type="submit" class="btn btn-primary text-white">Simpan</button>
                                <a href="{{ route('profile.settings') }}" class="btn btn-outline-primary">Batal</a>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
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
                    <form action="{{ route('profile.delete.user') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary text-white" id="confirmDelete">Delete account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end Modal delete --}}
@endsection
