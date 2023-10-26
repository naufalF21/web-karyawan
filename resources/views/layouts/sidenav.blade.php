<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav bg-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="btn fw-normal rounded-pille text-start w-100 ps-4 mt-4 {{ Route::is('dashboard.index') ? 'btn-primary text-white' : 'btn-light text-black' }}">
                        <svg class="mr-1 mb-1" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.3338 17.5636L15.884 14.9365C16.3698 14.656 16.6122 14.5158 16.7888 14.3196C16.9451 14.1461 17.0632 13.9416 17.1354 13.7195C17.2168 13.469 17.2168 13.1891 17.2168 12.6309V7.36906C17.2168 6.81081 17.2168 6.53094 17.1354 6.28048C17.0632 6.05835 16.9451 5.85373 16.7888 5.68016C16.6129 5.48484 16.3711 5.34521 15.8895 5.06718L11.333 2.43649C10.8473 2.15604 10.6049 2.01611 10.3467 1.96123C10.1182 1.91266 9.88202 1.91266 9.65356 1.96123C9.39536 2.01611 9.15216 2.15604 8.66642 2.43649L4.11536 5.06404C3.63019 5.34416 3.38779 5.4841 3.21126 5.68016C3.05498 5.85373 2.93695 6.05835 2.86478 6.28048C2.7832 6.53153 2.7832 6.81213 2.7832 7.37301V12.6271C2.7832 13.188 2.7832 13.4684 2.86478 13.7195C2.93695 13.9416 3.05498 14.1461 3.21126 14.3196C3.3879 14.5158 3.63047 14.656 4.11621 14.9365L8.66642 17.5635C9.15215 17.844 9.39536 17.984 9.65356 18.0389C9.88202 18.0874 10.1182 18.0874 10.3467 18.0389C10.6049 17.984 10.8481 17.844 11.3338 17.5636Z"
                                stroke="{{ Route::is('dashboard.index') ? 'white' : 'black' }}" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M7.5 9.99996C7.5 11.3807 8.61929 12.5 10 12.5C11.3807 12.5 12.5 11.3807 12.5 9.99996C12.5 8.61925 11.3807 7.49996 10 7.49996C8.61929 7.49996 7.5 8.61925 7.5 9.99996Z"
                                stroke="{{ Route::is('dashboard.index') ? 'white' : 'black' }}" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('absenDashboard') }}"
                        class="btn fw-normal rounded-pille text-start w-100 ps-4 mt-2 {{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'btn-primary text-white' : 'btn-light text-black' }}">
                        <svg class="mr-1 mb-1" xmlns="http://www.w3.org/2000/svg" width="21" height="20"
                            viewBox="0 0 21 20" fill="none">
                            <path
                                d="M7.16667 18.3333H13.8333C17.1833 18.3333 17.7833 16.9917 17.9583 15.3583L18.5833 8.69167C18.8083 6.65833 18.225 5 14.6667 5H6.33333C2.775 5 2.19166 6.65833 2.41666 8.69167L3.04166 15.3583C3.21666 16.9917 3.81666 18.3333 7.16667 18.3333Z"
                                stroke="{{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7.16669 5.00033V4.33366C7.16669 2.85866 7.16669 1.66699 9.83335 1.66699H11.1667C13.8334 1.66699 13.8334 2.85866 13.8334 4.33366V5.00033"
                                stroke="{{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12.1666 10.8333V11.6667C12.1666 11.675 12.1666 11.675 12.1666 11.6833C12.1666 12.5917 12.1583 13.3333 10.5 13.3333C8.84998 13.3333 8.83331 12.6 8.83331 11.6917V10.8333C8.83331 10 8.83331 10 9.66665 10H11.3333C12.1666 10 12.1666 10 12.1666 10.8333Z"
                                stroke="{{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18.5417 9.16699C16.6167 10.567 14.4167 11.4003 12.1667 11.6837"
                                stroke="{{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M2.68335 9.3916C4.55835 10.6749 6.67502 11.4499 8.83335 11.6916"
                                stroke="{{ Route::is('absenDashboard') || Route::is('absenDashboard.filter') ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Absen
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('employee') }}"
                        class="btn fw-normal rounded-pille text-start w-100 ps-4 mt-2 {{ Route::is('employee') ? 'btn-primary text-white' : 'btn-light text-black' }}">
                        <svg class="mr-1 mb-1" width="21" height="20" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.1624 9.10983C16.4977 9.10983 17.5809 8.0274 17.5809 6.69212C17.5809 5.35684 16.4977 4.27441 15.1624 4.27441"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16.2742 11.7373C16.673 11.7648 17.0694 11.8213 17.4598 11.9092C18.0021 12.0154 18.6545 12.2377 18.8867 12.7242C19.0349 13.0359 19.0349 13.3988 18.8867 13.7112C18.6553 14.1978 18.0021 14.4193 17.4598 14.5308"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M5.74165 9.10983C4.40638 9.10983 3.32318 8.0274 3.32318 6.69212C3.32318 5.35684 4.40638 4.27441 5.74165 4.27441"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M4.62983 11.7373C4.23108 11.7648 3.83462 11.8213 3.44427 11.9092C2.90191 12.0154 2.24955 12.2377 2.01809 12.7242C1.86913 13.0359 1.86913 13.3988 2.01809 13.7112C2.24879 14.1978 2.90191 14.4193 3.44427 14.5308"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.4481 12.2578C13.1538 12.2578 15.4654 12.6673 15.4654 14.3058C15.4654 15.9436 13.1691 16.3683 10.4481 16.3683C7.74167 16.3683 5.43091 15.9589 5.43091 14.3203C5.43091 12.6818 7.72716 12.2578 10.4481 12.2578Z"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.4481 9.92044C8.66367 9.92044 7.23291 8.48967 7.23291 6.70447C7.23291 4.92002 8.66367 3.48926 10.4481 3.48926C12.2326 3.48926 13.6633 4.92002 13.6633 6.70447C13.6633 8.48967 12.2326 9.92044 10.4481 9.92044Z"
                                stroke="{{ Route::is('employee') ? 'white' : 'black' }}" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Employees
                    </a>
                </div>
                <div class="nav-item">
                    @php
                        $request = ['request', 'request.cuti', 'request.cuti.filter', 'request.lembur'];
                    @endphp
                    <a href="{{ route('request') }}"
                        class="btn fw-normal rounded-pille text-start w-100 ps-4 mt-2 {{ Route::is($request) ? 'btn-primary text-white' : 'btn-light text-black' }}">
                        <svg class="mr-1 mb-1" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.9167 5.24967V7.16551C17.9167 8.41634 17.125 9.20801 15.8742 9.20801H13.1667V3.67426C13.1667 2.79551 13.8871 2.08301 14.7659 2.08301C15.6288 2.09092 16.4204 2.43926 16.9904 3.00926C17.5604 3.58717 17.9167 4.37884 17.9167 5.24967Z"
                                stroke="{{ Route::is($request) ? 'white' : 'black' }}" stroke-width="1.2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M2.08331 6.04134V17.1247C2.08331 17.7818 2.82748 18.1538 3.34998 17.758L4.70373 16.7447C5.0204 16.5072 5.46373 16.5388 5.74873 16.8238L7.0629 18.1459C7.37165 18.4547 7.87831 18.4547 8.18706 18.1459L9.51706 16.8159C9.79415 16.5388 10.2375 16.5072 10.5462 16.7447L11.9 17.758C12.4225 18.1459 13.1666 17.7738 13.1666 17.1247V3.66634C13.1666 2.79551 13.8791 2.08301 14.75 2.08301H6.04165H5.24998C2.87498 2.08301 2.08331 3.50009 2.08331 5.24967V6.04134Z"
                                stroke="{{ Route::is($request) ? 'white' : 'black' }}" stroke-width="1.2"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.625 10.7998H10" stroke="{{ Route::is($request) ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7.625 7.63281H10" stroke="{{ Route::is($request) ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.24652 10.792H5.25363" stroke="{{ Route::is($request) ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.24652 7.625H5.25363" stroke="{{ Route::is($request) ? 'white' : 'black' }}"
                                stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        Request List</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('report') }}"
                        class="btn fw-normal rounded-pille text-start w-100 ps-4 mt-2 {{ Route::is('report') ? 'btn-primary text-white' : 'btn-light text-black' }}">
                        <svg class="mr-1 mb-1" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2.875C6.06497 2.875 2.875 6.06497 2.875 10C2.875 13.935 6.06497 17.125 10 17.125C13.935 17.125 17.125 13.935 17.125 10M10 2.875C13.935 2.875 17.125 6.06497 17.125 10M10 2.875V10M17.125 10H10M14.75 15.1458L10 10"
                                stroke="{{ Route::is('report') ? 'white' : 'black' }}" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Report
                    </a>
                </div>
                <div class="nav-item mt-4">
                    <a href="#"
                        class="btn btn-light fw-normal rounded-pill text-primary text-start w-100 ps-4 mt-2"
                        onclick="event.preventDefault();
                        document.getElementById('sidenavLogout').submit();">
                        <svg class="mr-1 mb-1" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.83341 9.2996C2.83341 9.56877 2.6094 9.78728 2.33346 9.78728C2.05751 9.78728 1.83351 9.56877 1.83351 9.2996V4.47657C1.83351 2.92738 3.12558 1.66699 4.71438 1.66699H7.87835C9.47039 1.66699 10.7657 2.93054 10.7657 4.48354V5.07319C10.7657 5.34174 10.5417 5.56025 10.2658 5.56025C9.98982 5.56025 9.76581 5.34174 9.76581 5.07319V4.48354C9.76581 3.46763 8.91915 2.64236 7.87835 2.64236H4.71438C3.67683 2.64236 2.83341 3.46573 2.83341 4.47657V9.2996ZM9.76562 10.9281C9.76562 10.6589 9.98962 10.4404 10.2656 10.4404C10.5415 10.4404 10.7655 10.6589 10.7655 10.9281V11.5241C10.7655 13.0733 9.47344 14.3337 7.88464 14.3337H4.72003C3.12864 14.3337 1.83331 13.0701 1.83331 11.5171C1.83331 11.2479 2.05732 11.0301 2.33326 11.0301C2.60921 11.0301 2.83321 11.2479 2.83321 11.5171C2.83321 12.533 3.67988 13.3583 4.72003 13.3583H7.88464C8.9222 13.3583 9.76562 12.5356 9.76562 11.5241V10.9281ZM15.1288 7.81424C15.0516 7.6312 14.8691 7.51213 14.6665 7.51213H6.86605C6.5901 7.51213 6.36545 7.73127 6.36545 8.00045C6.36545 8.26963 6.5901 8.48814 6.86605 8.48814H13.4563L12.4168 9.49771C12.2207 9.68772 12.2207 9.99617 12.4155 10.1874C12.5129 10.2831 12.6414 10.3312 12.7693 10.3312C12.8972 10.3312 13.0245 10.2831 13.1226 10.1887L15.0198 8.34627C15.1626 8.20693 15.2061 7.99665 15.1288 7.81424ZM13.2479 7.10748C13.1206 7.10748 12.9933 7.05998 12.8959 6.96624L12.4174 6.50452C12.2213 6.31515 12.22 6.00607 12.4142 5.81543C12.609 5.62289 12.9245 5.62162 13.1213 5.81163L13.5991 6.27271C13.7959 6.46272 13.7972 6.77117 13.603 6.96244C13.505 7.05871 13.3764 7.10748 13.2479 7.10748Z"
                                fill="#0095E6" />
                        </svg>
                        Log out
                    </a>
                    <form id="sidenavLogout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
