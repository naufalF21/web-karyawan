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
                            <h3 class="">Update Employee</h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-4">
                        <p class="text-blues" style="border-bottom: 2px solid; width: 150px;height: 35px;">Update Employee
                        </p>
                        <hr class="w-100">
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('employee.update', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputName1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="name"
                                            value="{{ $user->name }}" required>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="exampleInputEmail1" name="email"
                                            value="{{ $errors->has('email') ? old('email') : $user->email }}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputRole1" class="form-label">Role</label>
                                        <select class="form-select" aria-label="Default select example" name="role"
                                            required>
                                            <option selected>{{ $user->role }}</option>
                                            <option value="{{ $user->role == 'karyawan' ? 'admin' : 'karyawan' }}">
                                                {{ $user->role == 'karyawan' ? 'admin' : 'karyawan' }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputAddress1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputAddress1" name="address"
                                            value="{{ $user->address }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputPosition1" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="exampleInputPosition1"
                                            name="position" value="{{ $user->position }}" required>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputContact1" class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="exampleInputContact1" name="contact"
                                            value="{{ $user->contact }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="exampleInputBirthday1" class="form-label">Birthday</label>
                                        <input type="date" class="form-control" id="exampleInputBirthday1"
                                            name="birthday" value="{{ $user->birthday }}" required>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('employee') }}" class="btn btn-outline-primary mr-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
