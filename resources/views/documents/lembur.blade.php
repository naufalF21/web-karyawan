@extends('layout')
@section('container')
    <form action="#" class="form" id="forms">
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
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" checked>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio1">Hari Kerja</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label text-body-tertiary" for="inlineRadio2">Hari Lembur</label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="dari-tanggal" class="form-label fw-bold">Tanggal Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="dari-tanggal" type="date" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="dari-tanggal" class="form-label fw-bold">Mulai Jam Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="dari-tanggal" type="date" />
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group input-group d-flex flex-column">
                        <label for="dari-tanggal" class="form-label fw-bold">s/d Jam Lembur<span
                                class="text-danger">*</span></label>
                        <input class="form-control py-2 rounded-4 w-100" id="dari-tanggal" type="date" />
                    </div>
                </div>
            </div>

            <div class="form-group input-group d-flex flex-column">
                <label for="dari-tanggal" class="form-label fw-bold">Uraian Kerja<span class="text-danger">*</span></label>
                <input class="form-control py-2 rounded-4 w-100" id="dari-tanggal" type="text" />
            </div>

            <div class="btns-group mt-4">
                <a href="/documents/contact" class="btn btn-outline-primary">Previous</a>
                <a href="/documents/submit" class="btn btn-primary fw-normal text-white">Next step</a>
            </div>
        </div>

    </form>
@endsection
