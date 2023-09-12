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
                            <h3 class="">Request Lists <small class="h6 text-primary">
                                    <svg width="20" height="20" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_655_1096)">
                                            <path
                                                d="M6.06 5.99967C6.21673 5.55412 6.5261 5.17841 6.9333 4.9391C7.3405 4.69978 7.81926 4.6123 8.28478 4.69215C8.7503 4.772 9.17254 5.01402 9.47671 5.37536C9.78089 5.7367 9.94737 6.19402 9.94666 6.66634C9.94666 7.99967 7.94666 8.66634 7.94666 8.66634M8 11.333H8.00666M14.6667 7.99967C14.6667 11.6816 11.6819 14.6663 8 14.6663C4.3181 14.6663 1.33333 11.6816 1.33333 7.99967C1.33333 4.31778 4.3181 1.33301 8 1.33301C11.6819 1.33301 14.6667 4.31778 14.6667 7.99967Z"
                                                stroke="#98A2B3" stroke-width="1.33333" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_655_1096">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    54</small></h3>
                        </div>
                        <div class="col-6 col-md-4 d-flex justify-content-sm-end justify-content-start">
                            <a href="#" class="btn text-black" style="border-color: #E6E7EC">
                                <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.08146 10.291L8.08146 2.26367" stroke="black" stroke-width="1.2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.0255 8.33887L8.08145 10.2909L6.13745 8.33887" stroke="black"
                                        stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M11.5061 5H12.2121C13.7521 5 15 6.2121 15 7.70867L15 11.2987C15 12.7908 13.7551 14 12.2189 14L3.78865 14C2.24865 14 1 12.7872 1 11.2913L1 7.70059C1 6.20916 2.24562 5 3.78108 5H4.49395"
                                        stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Export</a>
                        </div>
                    </div>

                    <hr>
                    <p class="text-primary" style="border-bottom: 2px solid; width: 90px;height: 35px;">All Request</p>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon Alexander</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-warning">Waiting For Verification</td>
                                            <td>
                                                <a href="#">
                                                    <svg width="74" height="74" viewBox="0 0 74 74" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="37" cy="33" r="15"
                                                            fill="#FF5454" />
                                                        <g filter="url(#filter0_d_812_1160)">
                                                            <path d="M42 28L32 38" stroke="white" stroke-width="4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M42 38L32 28" stroke="white" stroke-width="4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_812_1160" x="0" y="0"
                                                                width="74" height="74" filterUnits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="15" />
                                                                <feColorMatrix type="matrix"
                                                                    values="0 0 0 0 0.290196 0 0 0 0 0.227451 0 0 0 0 1 0 0 0 0.3 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow_812_1160" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow_812_1160" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </a>
                                                <a href="">
                                                    <svg width="76" height="74" viewBox="0 0 76 74"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="38" cy="33" r="15"
                                                            fill="#00E895" />
                                                        <g filter="url(#filter0_d_734_4071)">
                                                            <path d="M32.3209 33.8111L35.566 37.0562L43.6788 28.9434"
                                                                fill="#00E895" />
                                                            <path d="M32.3209 33.8111L35.566 37.0562L43.6788 28.9434"
                                                                stroke="white" stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_734_4071" x="0.320862" y="0.943359"
                                                                width="75.3579" height="72.1133"
                                                                filterUnits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="15" />
                                                                <feColorMatrix type="matrix"
                                                                    values="0 0 0 0 0.290196 0 0 0 0 0.227451 0 0 0 0 1 0 0 0 0.3 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow_734_4071" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow_734_4071" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-warning">Waiting For Verification</td>
                                            <td>
                                                <a href="#">
                                                    <svg width="74" height="74" viewBox="0 0 74 74"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="37" cy="33" r="15"
                                                            fill="#FF5454" />
                                                        <g filter="url(#filter0_d_812_1160)">
                                                            <path d="M42 28L32 38" stroke="white" stroke-width="4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M42 38L32 28" stroke="white" stroke-width="4"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_812_1160" x="0" y="0"
                                                                width="74" height="74"
                                                                filterUnits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="15" />
                                                                <feColorMatrix type="matrix"
                                                                    values="0 0 0 0 0.290196 0 0 0 0 0.227451 0 0 0 0 1 0 0 0 0.3 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow_812_1160" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow_812_1160" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>

                                                </a>
                                                <a href="">
                                                    <svg width="76" height="74" viewBox="0 0 76 74"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="38" cy="33" r="15"
                                                            fill="#00E895" />
                                                        <g filter="url(#filter0_d_734_4071)">
                                                            <path d="M32.3209 33.8111L35.566 37.0562L43.6788 28.9434"
                                                                fill="#00E895" />
                                                            <path d="M32.3209 33.8111L35.566 37.0562L43.6788 28.9434"
                                                                stroke="white" stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_734_4071" x="0.320862" y="0.943359"
                                                                width="75.3579" height="72.1133"
                                                                filterUnits="userSpaceOnUse"
                                                                color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                    result="hardAlpha" />
                                                                <feOffset dy="4" />
                                                                <feGaussianBlur stdDeviation="15" />
                                                                <feColorMatrix type="matrix"
                                                                    values="0 0 0 0 0.290196 0 0 0 0 0.227451 0 0 0 0 1 0 0 0 0.3 0" />
                                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                                    result="effect1_dropShadow_734_4071" />
                                                                <feBlend mode="normal" in="SourceGraphic"
                                                                    in2="effect1_dropShadow_734_4071" result="shape" />
                                                            </filter>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-success">Verified</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-success">Verified</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-danger">Rejected</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-danger">Rejected</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-danger">Rejected</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>agonzalez@outlook.com</td>
                                            <td class="text-danger">Rejected</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
@endsection
