@extends('layout')
@section('container')
    <div class="container pt-4">
        <!-- Content here -->
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <div class="d-grid gap-3 d-lg-flex d-sm-none justify-content-sm-center justify-content-xl-start d-none">
                        <button class="btn btn-primary btn px-4 me-sm-3 text-white">Welcome Algostudio</button>
                    </div>
                    <h1 class="display-6 fw-bolder text-black-60 mt-4 mb-2">Expressing our gratitude<br>for your exceptional
                        efforts</h1>
                    <p class="lead fw-normal text-black mb-4">Manage your work</p>
                    <div class="d-grid gap-3 d-sm-flex d-lg-none justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn px-4 me-sm-3" href="#features">Welcome Algostudio</a>
                    </div>

                    <div class="row align-items-md-stretch justify-content-start mt-5">
                        <div class="col-md-6">
                            <div class="h-100 text-bg-white rounded-3 text-lg-start">
                                <p class="text-center text-lg-start fw-normal text-body-tertiary mb-0">Remaining Days Off
                                </p>
                                <p class="text-center fs-4 fw-normal text-lg-start">
                                    {{ $remainingDaysOff == '11 Day, 8h 00m' ? '12 Day' : $remainingDaysOff }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="h-100 bg-body-white rounded-3 text-lg-start">
                                <p class="text-center fw-normal text-body-tertiary mb-0 text-lg-start">Overtime Hours/Month
                                </p>
                                <p class="text-center fs-4 fw-normal text-lg-start">{{ $overtimeMonthly }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                    src="/assets/img/budgeting.svg" alt="..." /></div>
        </div>
    </div>
@endsection
