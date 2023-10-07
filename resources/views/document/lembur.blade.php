@extends('layout')
@section('container')
    {{-- @dd($cacheData); --}}
    <form action="{{ route('lembur.store') }}" class="form" id="forms" method="post">
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
                <p class="fw-normal fw-bold mb-0">Lembur</p>
                <p class="fw-normal text-body-tertiary">Pada hari apa mengambil lembur di ambil<span
                        class="text-danger">*</span></p>
            </div>
            <div class="mb-3">
                @if ($cacheData)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Hari Kerja"
                            required {{ $cacheData['jenis'] == 'Hari Kerja' ? 'checked' : '' }}>
                        <label class="form-check-label text-body-tertiary" for="inlineRadio1">Hari Kerja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="Hari Lembur"
                            required {{ $cacheData['jenis'] == 'Hari Lembur' ? 'checked' : '' }}>
                        <label class="form-check-label text-body-tertiary" for="inlineRadio2">Hari Lembur</label>
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Hari Kerja"
                            required>
                        <label class="form-check-label text-body-tertiary" for="inlineRadio1">Hari Kerja</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="Hari Libur"
                            required>
                        <label class="form-check-label text-body-tertiary" for="inlineRadio2">Hari Libur</label>
                    </div>
                @endif

            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="tanggal_lembur" class="form-label fw-bold">Tanggal Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="tanggal_lembur" type="date"
                            name="tanggal_lembur" required value="{{ $cacheData ? $cacheData['tanggal_lembur'] : '' }}" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="mulai_lembur" class="form-label fw-bold">Mulai Jam Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="mulai_lembur" type="time"
                            name="mulai_lembur" required value="{{ $cacheData ? $cacheData['mulai_lembur'] : '' }}" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="sd_lembur" class="form-label fw-bold">s/d Jam Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="sd_lembur" type="time" name="sd_lembur"
                            required value="{{ $cacheData ? $cacheData['sd_lembur'] : '' }}" />
                    </div>
                </div>
            </div>

            <div class="form-group input-group d-flex flex-column">
                <label for="uraian_kerja" class="form-label fw-bold">Uraian Kerja<span class="text-danger">*</span></label>
                <input class="form-control py-2 rounded-4 w-100" id="uraian_kerja" type="text" name="uraian_kerja"
                    required value="{{ $cacheData ? $cacheData['uraian_kerja'] : '' }}" />
            </div>

            <div class="btns-group mt-4">
                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Previous</a>
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
                                All data related to the Overtime document will be entered into the database.
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
