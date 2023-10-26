@extends('layout')
@section('container')
    {{-- @dd($cacheData); --}}
    <form action="{{ route('cuti.harian.store') }}" class="form" id="forms" method="post">
        @csrf
        <div class="progressbar">
            <div class="progress bg-primary" id="progress" style="width: 66.6667%; height: 4px;"></div>

            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active" data-title=""></div>
            <div class="progress-step" data-title=""></div>

        </div>
        <hr class="bg-secondary" />
        <div class="step-forms step-forms-active">
            <div class="mb-3">
                <p class="fw-normal fw-bold mb-0">Cuti</p>
                <p class="fw-normal text-body-tertiary">Cuti yang akan di ambil<span class="text-danger">*</span></p>
            </div>
            <div class="mb-3 d-flex justify-content-between">

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Tahunan"
                        required>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio1">Tahunan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="Nikah" required>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio2">Nikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio3" value="Hamil/Bersalin"
                        required>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio3">Hamil/Bersalin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis" id="inlineRadio4" value="Kematian"
                        required>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio4">Kematian</label>
                </div>

            </div>

            <div class="btns-group mt-3">
                <div>
                    <label for="tanggal" class="form-label fw-bold">Dari Tanggal<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="tanggal" type="date" name="tanggal" required />
                    </div>
                </div>
                <div>
                    <label for="sampai-tanggal" class="form-label fw-bold">s/d Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="sd-tanggal" type="date" name="sd_tanggal"
                            required />
                    </div>
                </div>
            </div>
            <div class="btns-group">
                <div>
                    <label for="dari-tanggal" class="form-label fw-bold">Masuk Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="masuk-tanggal" type="date" name="masuk_tanggal"
                            required />
                    </div>
                </div>
                <div>
                    <label for="dari-tanggal" class="form-label fw-bold">Tanggal Lapor HR<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="lapor-tanggal" type="date" name="lapor_tanggal"
                            required />
                    </div>
                </div>
            </div>
            <div class="btns-group mt-3">
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Previous</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary fw-normal text-white" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Submit
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-5" style="padding: 1rem 2rem;">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Are you sure you
                                    have filled in the
                                    data correctly?</h1>
                            </div>
                            <div class="modal-body">
                                <span class="text-primary">After the submit is done.</span><br />
                                After the submission is complete.
                                All data related to the Leave document will be entered into the database.
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-outline-primary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary fw-normal text-white">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end Modal --}}
            </div>
        </div>
    </form>
@endsection
