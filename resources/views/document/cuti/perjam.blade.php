@extends('layout')
@section('container')
    {{-- @dd($cacheData); --}}
    <form action="{{ route('cuti.perjam.store') }}" class="form" id="forms" method="post">
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
                <p class="fw-normal fw-bold mb-0 text-primary">Cuti</p>
                <p class="fw-normal text-body-tertiary">Cuti yang akan di ambil<span class="text-danger">*</span></p>
            </div>
            <div class="mt-3 row">
                <div class="col-4">
                    <label for="tanggal" class="form-label fw-bold">Tanggal Cuti<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="tanggal" type="date" name="tanggal" required />
                    </div>
                </div>
                <div class="col-4">
                    <label for="mulai-jam-cuti" class="form-label fw-bold">Mulai Jam Cuti<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="mulai-jam-cuti" type="time" name="mulai_jam_cuti"
                            required />
                    </div>
                </div>
                <div class="col-4">
                    <label for="sd-jam-cuti" class="form-label fw-bold">s/d Jam cuti<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="sd-jam-cuti" type="time" name="sd_jam_cuti"
                            required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <label for="keterangan" class="form-label fw-bold">Keterangan<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="keterangan" type="text" name="keterangan"
                            placeholder="Beri keterangan cuti anda" required />
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
