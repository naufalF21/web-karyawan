@extends('layout')
@section('container')
    <form action="{{ route('contact.store', ['document' => $document]) }}" class="form" id="forms" method="post">
        @csrf
        <div class="progressbar">
            <div class="progress bg-primary" id="progress" style="width: 33.3333%; height: 4px;"></div>

            <div class="progress-step progress-step-active progress-step-after progress-step-check" data-title=""></div>
            <div class="progress-step progress-step-active " data-title=""></div>
            <div class="progress-step" data-title=""></div>
            <div class="progress-step" data-title=""></div>
        </div>
        <hr class="bg-secondary" />
        <div class="step-forms step-forms-active">
            <div class="mb-4">
                <p class="fw-normal fw-bold mb-0">Contact details</p>
                <p class="fw-normal text-body-tertiary">Isi kolom dibawah ini dengan sebenar-benarnya</p>
            </div>
            <div class="btns-group mt-3">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="name" type="text" placeholder="Your Name" />
                        <span class="input-group-text px-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.6002 4.85714C10.6002 6.98757 8.98864 8.71428 7.00024 8.71428C5.01184 8.71428 3.40024 6.98757 3.40024 4.85714C3.40024 2.72671 5.01184 1 7.00024 1C8.98864 1 10.6002 2.72671 10.6002 4.85714Z"
                                    stroke="#A0A3BD" stroke-width="1.5" stroke-linecap="square" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.0002 19H1.00024C1.00024 18.0865 1.00024 17.2174 1.00024 16.4304C1.00024 14.2988 2.61202 12.5714 4.60024 12.5714H9.40024C11.3885 12.5714 13.0002 14.2988 13.0002 16.4304C13.0002 17.2174 13.0002 18.0865 13.0002 19Z"
                                    stroke="#A0A3BD" stroke-width="1.5" stroke-linecap="square" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="email" type="email"
                            placeholder="Email address" />
                        <span class="input-group-text px-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14" viewBox="0 0 20 14"
                                fill="none">
                                <path
                                    d="M16.9433 0.918457H2.97907C2.16726 0.918457 1.50916 1.57656 1.50916 2.38837V11.2079C1.50916 12.0197 2.16726 12.6778 2.97907 12.6778H16.9433C17.7551 12.6778 18.4132 12.0197 18.4132 11.2079V2.38837C18.4132 1.57656 17.7551 0.918457 16.9433 0.918457Z"
                                    stroke="#A0A3BD" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.9801 1.34619L9.96101 7.90054L1.94189 1.34619" stroke="#A0A3BD"
                                    stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="btns-group mt-3">
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone Number<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="phone" type="phone"
                            placeholder="0830XXXXXXXX" />
                        <span class="input-group-text px-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="22" viewBox="0 0 13 22"
                                fill="none">
                                <path
                                    d="M10.029 1.27148H2.55166C1.63396 1.27148 0.890015 2.01543 0.890015 2.93313V18.7187C0.890015 19.6364 1.63396 20.3804 2.55166 20.3804H10.029C10.9467 20.3804 11.6907 19.6364 11.6907 18.7187V2.93313C11.6907 2.01543 10.9467 1.27148 10.029 1.27148Z"
                                    stroke="#A0A3BD" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M9.01192 1.27148V2.36012C9.01192 2.64885 8.89723 2.92575 8.69307 3.12991C8.48891 3.33407 8.21201 3.44876 7.92328 3.44876H4.65737C4.36864 3.44876 4.09174 3.33407 3.88758 3.12991C3.68342 2.92575 3.56873 2.64885 3.56873 2.36012V1.27148"
                                    stroke="#A0A3BD" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label fw-bold">Divisi<span class="text-danger">*</span></label>
                    <div class="form-group input-group">
                        <input class="form-control py-2 rounded-4" id="divisi" type="text" placeholder="Divisi" />
                        <span class="input-group-text px-3 rounded-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="24" viewBox="0 0 13 24"
                                fill="none">
                                <path
                                    d="M11.9797 22.3805V5.00294C11.9796 4.81671 11.921 4.63522 11.8122 4.48412C11.7033 4.33303 11.5497 4.21998 11.3731 4.16096L2.50397 1.2046C2.37061 1.15991 2.22853 1.14761 2.08947 1.16874C1.95042 1.18987 1.8184 1.24381 1.70433 1.32609C1.59027 1.40838 1.49744 1.51664 1.43352 1.64193C1.36961 1.76722 1.33645 1.90592 1.33679 2.04657V22.3805"
                                    stroke="#A0A3BD" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8.43103 16.7803V17.6672" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.43103 12.3457V13.2326" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.43103 7.91113V8.79804" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.88538 16.7803V17.6672" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.88538 12.3457V13.2326" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4.88538 7.91113V8.79804" stroke="#A0A3BD" stroke-width="1.6"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="btns-group">
                <a href="/document" class="btn btn-outline-primary">Previous</a>
                <button type="submit" class="btn btn-primary fw-normal text-white">Next step</button>
            </div>
        </div>

    </form>
@endsection
