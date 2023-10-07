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
                            <h3 class="">Add Employee</h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-end mt-4">
                        <p class="text-blues" style="border-bottom: 2px solid; width: 115px;height: 35px;">Add Employee
                        </p>
                        <hr class="w-100">
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('employee.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputName1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName1"
                                            aria-describedby="nameHelp" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                            value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="exampleInputPassword1" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="exampleInputConfirmPassword1" class="form-label">Confirm
                                            Password</label>
                                        <input type="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="exampleInputConfirmPassword1" name="password_confirmation" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('employee') }}" class="btn btn-outline-primary mr-3">Cancel</a>
                                    <button type="submit" class="btn btn-primary text-white">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
