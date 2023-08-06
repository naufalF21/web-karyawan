@extends('layout')
@section('container')
    <form action="#" class="form" id="forms">

        <div class="progressbar">
            <div class="progress bg-primary" id="progress" style="width: 100%; height: 4px;"></div>

            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active" data-title=""></div>
        </div>
        <hr class="bg-secondary" />
        <div class="step-forms step-forms-active mt-5">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="106" height="102" viewBox="0 0 106 102" fill="none"
                    class="position-relative start-50 translate-middle mt-5 mb-n5">
                    <rect opacity="0.5" x="10.3672" width="34.3951" height="34.3951" rx="10" fill="#04A6FE" />
                    <rect opacity="0.5" x="86.4082" y="21.9346" width="19.5919" height="19.5919" rx="9.79593"
                        fill="#04A6FE" />
                    <rect opacity="0.5" x="0.992188" y="49.9619" width="21.0423" height="21.0423" rx="8"
                        fill="#72CDFF" />
                    <rect opacity="0.5" x="77.2573" y="71.2832" width="24.4193" height="24.4193" rx="8"
                        fill="#72CDFF" />
                    <circle cx="56.6969" cy="52.3009" r="40.0387" fill="#04A6FE" />
                    <g filter="url(#filter0_d_223_7329)">
                        <path d="M41.5381 54.4662L50.2001 63.1283L71.8553 41.4731" fill="#04A6FE" />
                        <path d="M41.5381 54.4662L50.2001 63.1283L71.8553 41.4731" stroke="white" stroke-width="8"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <filter id="filter0_d_223_7329" x="7.53809" y="11.4731" width="98.3174" height="89.6553"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="4" />
                            <feGaussianBlur stdDeviation="15" />
                            <feColorMatrix type="matrix"
                                values="0 0 0 0 0.290196 0 0 0 0 0.227451 0 0 0 0 1 0 0 0 0.3 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_223_7329" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_223_7329" result="shape" />
                        </filter>
                    </defs>
                </svg>
                <p class="fw-normal fw-bold mb-0 text-center">Submit your document</p>
                <p class="fw-normal text-body-tertiary text-center">Your information has been recorded, please wait a few
                    days for the next update</p>
            </div>

            <div class="btns-group mt-5">
                <a href="/documents/lembur" class="btn btn-outline-primary">Previous</a>
                <input type="submit" value="Submit" id="submit-form" class="btn btn-primary fw-normal text-white" />
            </div>
        </div>
    </form>
@endsection
