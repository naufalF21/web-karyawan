@extends('layout')
@section('container')
    <form action="{{ route('document.store') }}" class="form" id="forms" method="post">
        @csrf
        @if (session()->has('docError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('docError') ?? '' }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title=""></div>
            <div class="progress-step" data-title=""></div>
            <div class="progress-step" data-title=""></div>
            <div class="progress-step" data-title=""></div>

        </div>
        <hr class="bg-secondary" />
        <div class="step-forms step-forms-active">
            <div class="mb-4">
                <p class="fw-normal fw-bold mb-0">Our Documents</p>
                <p class="fw-normal text-body-tertiary">Please select which service you are interested in.</p>
            </div>

            <div class="btns-group">
                <input type="radio" class="btn-check" name="type" id="option1" autocomplete="off" value="cuti">
                <label class="btn" for="option1">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.15" cx="17.5" cy="17.5" r="17.5" fill="#04A6FE" />
                        <path
                            d="M26.5673 8.78446H23.7204V7.1374C23.7204 6.80799 23.4926 6.58838 23.151 6.58838H20.8735C20.5319 6.58838 20.3041 6.80799 20.3041 7.1374V8.78446H14.6103V7.1374C14.6103 6.80799 14.3826 6.58838 14.0409 6.58838H11.7634C11.4218 6.58838 11.194 6.80799 11.194 7.1374V8.78446H8.34715C8.00552 8.78446 7.77777 9.00406 7.77777 9.33348V11.5296V26.9021C7.77777 27.2315 8.00552 27.4511 8.34715 27.4511H26.5673C26.9089 27.4511 27.1367 27.2315 27.1367 26.9021V11.5296V9.33348C27.1367 9.00406 26.9089 8.78446 26.5673 8.78446ZM21.4429 7.68642H22.5816V8.78446H21.4429V7.68642ZM12.3328 7.68642H13.4716V8.78446H12.3328V7.68642ZM8.91653 9.8825H11.7634H14.0409H20.8735H23.151H25.9979V10.9805H8.91653V9.8825ZM25.9979 26.3531H8.91653V12.0786H25.9979V26.3531ZM11.6495 15.4825L12.1051 15.0433L11.6495 14.6041C11.4218 14.3845 11.4218 14.055 11.6495 13.8354C11.8773 13.6158 12.2189 13.6158 12.4467 13.8354L12.9022 14.2747L13.3577 13.8354C13.5854 13.6158 13.9271 13.6158 14.1548 13.8354C14.3826 14.055 14.3826 14.3845 14.1548 14.6041L13.6993 15.0433L14.1548 15.4825C14.3826 15.7021 14.3826 16.0315 14.1548 16.2511C14.0409 16.3609 13.9271 16.3609 13.6993 16.3609C13.4716 16.3609 13.3577 16.3609 13.2438 16.2511L12.9022 15.9217L12.4467 16.3609C12.3328 16.4707 12.2189 16.4707 11.9912 16.4707C11.7634 16.4707 11.6495 16.4707 11.5357 16.3609C11.4218 16.1413 11.4218 15.7021 11.6495 15.4825ZM16.2046 15.4825L16.6601 15.0433L16.2046 14.6041C15.9768 14.3845 15.9768 14.055 16.2046 13.8354C16.4323 13.6158 16.774 13.6158 17.0017 13.8354L17.4572 14.2747L17.9127 13.8354C18.1405 13.6158 18.4821 13.6158 18.7099 13.8354C18.9376 14.055 18.9376 14.3845 18.7099 14.6041L18.2543 15.0433L18.7099 15.4825C18.9376 15.7021 18.9376 16.0315 18.7099 16.2511C18.596 16.3609 18.4821 16.3609 18.2543 16.3609C18.0266 16.3609 17.9127 16.3609 17.7988 16.2511L17.4572 15.9217L17.0017 16.3609C16.8878 16.4707 16.774 16.4707 16.5462 16.4707C16.3185 16.4707 16.2046 16.4707 16.0907 16.3609C15.9768 16.1413 15.9768 15.7021 16.2046 15.4825ZM20.7596 15.4825L21.2151 15.0433L20.7596 14.6041C20.5319 14.3845 20.5319 14.055 20.7596 13.8354C20.9874 13.6158 21.329 13.6158 21.5567 13.8354L22.0122 14.2747L22.4678 13.8354C22.6955 13.6158 23.0371 13.6158 23.2649 13.8354C23.4926 14.055 23.4926 14.3845 23.2649 14.6041L22.8094 15.0433L23.2649 15.4825C23.4926 15.7021 23.4926 16.0315 23.2649 16.2511C23.151 16.3609 23.0371 16.3609 22.8094 16.3609C22.5816 16.3609 22.4678 16.3609 22.3539 16.2511L22.0122 15.9217L21.5567 16.3609C21.4429 16.4707 21.329 16.4707 21.1012 16.4707C20.8735 16.4707 20.7596 16.4707 20.6457 16.3609C20.5319 16.1413 20.5319 15.7021 20.7596 15.4825ZM11.6495 19.655L12.1051 19.2158L11.6495 18.7766C11.4218 18.557 11.4218 18.2276 11.6495 18.008C11.8773 17.7884 12.2189 17.7884 12.4467 18.008L12.9022 18.4472L13.3577 18.008C13.5854 17.7884 13.9271 17.7884 14.1548 18.008C14.3826 18.2276 14.3826 18.557 14.1548 18.7766L13.6993 19.2158L14.1548 19.655C14.3826 19.8747 14.3826 20.2041 14.1548 20.4237C14.0409 20.5335 13.9271 20.5335 13.6993 20.5335C13.4716 20.5335 13.3577 20.5335 13.2438 20.4237L12.9022 19.9845L12.4467 20.4237C12.3328 20.5335 12.2189 20.5335 11.9912 20.5335C11.7634 20.5335 11.6495 20.5335 11.5357 20.4237C11.4218 20.2041 11.4218 19.7648 11.6495 19.655ZM16.3185 20.8629H18.596C18.9376 20.8629 19.1654 20.6433 19.1654 20.3139V18.1178C19.1654 17.7884 18.9376 17.5688 18.596 17.5688H16.3185C15.9768 17.5688 15.7491 17.7884 15.7491 18.1178V20.3139C15.7491 20.6433 15.9768 20.8629 16.3185 20.8629ZM16.8878 18.6668H18.0266V19.7648H16.8878V18.6668ZM20.8735 20.8629H23.151C23.4926 20.8629 23.7204 20.6433 23.7204 20.3139V18.1178C23.7204 17.7884 23.4926 17.5688 23.151 17.5688H20.8735C20.5319 17.5688 20.3041 17.7884 20.3041 18.1178V20.3139C20.3041 20.6433 20.5319 20.8629 20.8735 20.8629ZM21.4429 18.6668H22.5816V19.7648H21.4429V18.6668ZM11.7634 25.255H14.0409C14.3826 25.255 14.6103 25.0354 14.6103 24.706V22.5099C14.6103 22.1805 14.3826 21.9609 14.0409 21.9609H11.7634C11.4218 21.9609 11.194 22.1805 11.194 22.5099V24.706C11.194 25.0354 11.4218 25.255 11.7634 25.255ZM12.3328 23.059H13.4716V24.157H12.3328V23.059ZM16.3185 25.255H18.596C18.9376 25.255 19.1654 25.0354 19.1654 24.706V22.5099C19.1654 22.1805 18.9376 21.9609 18.596 21.9609H16.3185C15.9768 21.9609 15.7491 22.1805 15.7491 22.5099V24.706C15.7491 25.0354 15.9768 25.255 16.3185 25.255ZM16.8878 23.059H18.0266V24.157H16.8878V23.059ZM20.8735 25.255H23.151C23.4926 25.255 23.7204 25.0354 23.7204 24.706V22.5099C23.7204 22.1805 23.4926 21.9609 23.151 21.9609H20.8735C20.5319 21.9609 20.3041 22.1805 20.3041 22.5099V24.706C20.3041 25.0354 20.5319 25.255 20.8735 25.255ZM21.4429 23.059H22.5816V24.157H21.4429V23.059Z"
                            fill="#04A6FE" />
                        <path d="M16.8878 23.059H18.0266V24.157H16.8878V23.059Z" fill="white" />
                        <path d="M12.3328 23.059H13.4716V24.157H12.3328V23.059Z" fill="white" />
                        <path d="M16.8878 18.6668H18.0266V19.7648H16.8878V18.6668Z" fill="white" />
                        <path d="M21.4429 18.6668H22.5816V19.7648H21.4429V18.6668Z" fill="white" />
                        <path d="M21.4429 23.059H22.5816V24.157H21.4429V23.059Z" fill="white" />
                        <path d="M8.91653 9.8825H11.7634H14.0409H20.8735H23.151H25.9979V10.9805H8.91653V9.8825Z"
                            fill="white" />
                        <path d="M21.4429 7.68642H22.5816V8.78446H21.4429V7.68642Z" fill="white" />
                        <path d="M12.3328 7.68642H13.4716V8.78446H12.3328V7.68642Z" fill="white" />
                    </svg>
                    Cuti
                </label>

                <input type="radio" class="btn-check" name="type" id="option2" autocomplete="off" value="lembur">
                <label class="btn" for="option2">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.15" cx="17.5" cy="17.5" r="17.5" fill="#04A6FE" />
                        <path
                            d="M16.7576 25.4546C21.1312 25.4546 24.6768 21.9091 24.6768 17.5354C24.6768 13.1618 21.1312 9.61621 16.7576 9.61621C12.3839 9.61621 8.83838 13.1618 8.83838 17.5354C8.83838 21.9091 12.3839 25.4546 16.7576 25.4546Z"
                            fill="white" />
                        <path
                            d="M20.714 28.8484L20.1515 26.9354C20.7057 26.7576 21.243 26.5268 21.7568 26.246L22.6426 28.019C22.0266 28.3561 21.3779 28.6353 20.714 28.8484ZM24.3943 26.8403L23.2176 25.2625C23.6749 24.8903 24.1006 24.4721 24.4861 24.0198L25.9144 25.3505C25.4518 25.8942 24.943 26.3928 24.3943 26.8403ZM27.1533 23.6006L25.5193 22.5591C25.8211 22.0414 26.0766 21.4958 26.2827 20.9292L28.0707 21.6406C27.8229 22.3209 27.5139 22.9803 27.1533 23.6006Z"
                            fill="#04A6FE" />
                        <path
                            d="M17.8889 13.0103H15.6263V18.6668C15.6263 18.9669 15.7455 19.2546 15.9576 19.4668C16.1698 19.6789 16.4575 19.7981 16.7576 19.7981H21.2828V17.5355H17.8889V13.0103Z"
                            fill="#04A6FE" />
                        <path
                            d="M27.4003 18.1886C27.5314 18.2422 27.6756 18.2562 27.8148 18.2288C27.9539 18.2015 28.0817 18.1341 28.182 18.0352L30.3333 15.914L29.3193 14.9142L28.2781 15.9401C27.49 10.4547 22.6961 6.22217 16.9183 6.22217C10.5919 6.22217 5.44444 11.2975 5.44444 17.5353C5.44444 23.7731 10.5919 28.8484 16.9183 28.8484V27.4343C11.3822 27.4343 6.87867 22.9939 6.87867 17.5353C6.87867 12.0767 11.3822 7.63631 16.9183 7.63631C22.4544 7.63631 26.9579 12.0767 26.9579 17.5353C26.9579 17.821 27.1329 18.079 27.4003 18.1886Z"
                            fill="#04A6FE" />
                    </svg>
                    Lembur
                </label>

            </div>
            <div class="mt-5 d-flex">
                <button class="btn btn-primary btn-next width-50 ml-auto fw-normal text-white" type="submit">Next
                    step</button>
            </div>
        </div>
    </form>
@endsection