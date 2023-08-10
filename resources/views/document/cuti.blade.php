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
                <p class="fw-normal fw-bold mb-0">Cuti</p>
                <p class="fw-normal text-body-tertiary">Cuti yang akan di ambil<span class="text-danger">*</span></p>
            </div>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" checked>
                    <label class="form-check-label text-body-tertiary" for="inlineRadio1">Tahunan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label text-body-tertiary" for="inlineRadio2">Nikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="option3">
                    <label class="form-check-label text-body-tertiary" for="inlineRadio3">Hamil/Bersalin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                        value="option4">
                    <label class="form-check-label text-body-tertiary" for="inlineRadio4">Kematian</label>
                </div>
            </div>

            <div class="btns-group mt-3">
                <div>
                    <label for="dari-tanggal" class="form-label fw-bold">Dari Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="dari-tanggal" type="date" />
                    </div>
                </div>
                <div>
                    <label for="sampai-tanggal" class="form-label fw-bold">s/d Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="sampai-tanggal" type="date" />
                    </div>
                </div>
            </div>

            <div class="btns-group">
                <div>
                    <label for="dari-tanggal" class="form-label fw-bold">Masuk Tanggal<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="dari-tanggal" type="date" />
                    </div>
                </div>
                <div>
                    <label for="dari-tanggal" class="form-label fw-bold">Tanggal Lapor HR<span
                            class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="dari-tanggal" type="date" />
                    </div>
                </div>
            </div>

            <div class="btns-group mt-3">
                <a href="{{ route('contact', ['document' => 'cuti']) }}" class="btn btn-outline-primary">Previous</a>
                <a href="{{ route('submit', ['document' => 'cuti']) }}" class="btn btn-primary fw-normal text-white">Next
                    step</a>
            </div>
        </div>

    </form>
@endsection
