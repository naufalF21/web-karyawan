{{-- start sidebar --}}
<nav class="col" style="height: 30rem">
    <ul class="navbar-nav d-flex flex-column justify-content-between h-100">
        <li class="nav-item d-flex flex-column gap-3">
            <a href="{{ route('profile') }}"
                class="text-black d-flex align-items-center gap-3 justify-content-center {{ Route::is('profile') || Route::is('profile.edit') ? 'sidebar-active' : '' }} "
                style="padding: 0.6rem 0;" id="sidebarMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                    <path
                        d="M14.6624 7.10983C15.9977 7.10983 17.0809 6.0274 17.0809 4.69212C17.0809 3.35684 15.9977 2.27441 14.6624 2.27441"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M15.7742 9.7373C16.173 9.7648 16.5694 9.82133 16.9598 9.90918C17.5021 10.0154 18.1545 10.2377 18.3867 10.7242C18.5349 11.0359 18.5349 11.3988 18.3867 11.7112C18.1553 12.1978 17.5021 12.4193 16.9598 12.5308"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M5.24165 7.10983C3.90638 7.10983 2.82318 6.0274 2.82318 4.69212C2.82318 3.35684 3.90638 2.27441 5.24165 2.27441"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M4.12983 9.7373C3.73108 9.7648 3.33462 9.82133 2.94427 9.90918C2.40191 10.0154 1.74955 10.2377 1.51809 10.7242C1.36913 11.0359 1.36913 11.3988 1.51809 11.7112C1.74879 12.1978 2.40191 12.4193 2.94427 12.5308"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.94813 10.2583C12.6538 10.2583 14.9654 10.6677 14.9654 12.3063C14.9654 13.9441 12.6691 14.3688 9.94813 14.3688C7.24167 14.3688 4.93091 13.9593 4.93091 12.3208C4.93091 10.6823 7.22716 10.2583 9.94813 10.2583Z"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.94812 7.92093C8.16367 7.92093 6.73291 6.49016 6.73291 4.70495C6.73291 2.92051 8.16367 1.48975 9.94812 1.48975C11.7326 1.48975 13.1633 2.92051 13.1633 4.70495C13.1633 6.49016 11.7326 7.92093 9.94812 7.92093Z"
                        stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Your account</span>
            </a>
            <a href="{{ route('profile.settings') }}"
                class="text-black d-flex align-items-center gap-3 justify-content-center {{ Route::is('profile.settings') ? 'sidebar-active' : '' }}"
                style="padding: 0.6rem 0;" id="sidebarMenu">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.3338 17.5636L15.884 14.9365C16.3698 14.656 16.6122 14.5158 16.7888 14.3196C16.9451 14.1461 17.0632 13.9416 17.1354 13.7195C17.2168 13.469 17.2168 13.1891 17.2168 12.6309V7.36906C17.2168 6.81081 17.2168 6.53094 17.1354 6.28048C17.0632 6.05835 16.9451 5.85373 16.7888 5.68016C16.6129 5.48484 16.3711 5.34521 15.8895 5.06718L11.333 2.43649C10.8473 2.15604 10.6049 2.01611 10.3467 1.96123C10.1182 1.91266 9.88202 1.91266 9.65356 1.96123C9.39536 2.01611 9.15216 2.15604 8.66642 2.43649L4.11536 5.06404C3.63019 5.34416 3.38779 5.4841 3.21126 5.68016C3.05498 5.85373 2.93695 6.05835 2.86478 6.28048C2.7832 6.53153 2.7832 6.81213 2.7832 7.37301V12.6271C2.7832 13.188 2.7832 13.4684 2.86478 13.7195C2.93695 13.9416 3.05498 14.1461 3.21126 14.3196C3.3879 14.5158 3.63047 14.656 4.11621 14.9365L8.66642 17.5635C9.15215 17.844 9.39536 17.984 9.65356 18.0389C9.88202 18.0874 10.1182 18.0874 10.3467 18.0389C10.6049 17.984 10.8481 17.844 11.3338 17.5636Z"
                        stroke="#333434" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M7.5 9.99996C7.5 11.3807 8.61929 12.5 10 12.5C11.3807 12.5 12.5 11.3807 12.5 9.99996C12.5 8.61925 11.3807 7.49996 10 7.49996C8.61929 7.49996 7.5 8.61925 7.5 9.99996Z"
                        stroke="#333434" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Settings</span>
            </a>
        </li>
        <li class="nav-item d-flex flex-column">
            <hr class="text-secondary" />

            <a href="#" class="text-black d-flex align-items-center gap-3 justify-content-center mb-4"
                style="padding: 0.6rem 0;" id="sidebarMenu"
                onclick="event.preventDefault();
                document.getElementById('sidebarLogout').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1.33341 8.29911C1.33341 8.56829 1.1094 8.78679 0.833457 8.78679C0.557511 8.78679 0.333508 8.56829 0.333508 8.29911V3.47608C0.333508 1.92689 1.62558 0.666504 3.21438 0.666504H6.37835C7.97039 0.666504 9.26571 1.93005 9.26571 3.48305V4.07271C9.26571 4.34125 9.04171 4.55976 8.76576 4.55976C8.48982 4.55976 8.26581 4.34125 8.26581 4.07271V3.48305C8.26581 2.46714 7.41915 1.64188 6.37835 1.64188H3.21438C2.17683 1.64188 1.33341 2.46524 1.33341 3.47608V8.29911ZM8.26562 9.9276C8.26562 9.65842 8.48962 9.43991 8.76557 9.43991C9.04152 9.43991 9.26552 9.65842 9.26552 9.9276V10.5236C9.26552 12.0728 7.97344 13.3332 6.38464 13.3332H3.22003C1.62864 13.3332 0.333313 12.0696 0.333313 10.5166C0.333313 10.2474 0.557316 10.0296 0.833262 10.0296C1.10921 10.0296 1.33321 10.2474 1.33321 10.5166C1.33321 11.5325 2.17988 12.3578 3.22003 12.3578H6.38464C7.4222 12.3578 8.26562 11.5351 8.26562 10.5236V9.9276ZM13.6288 6.81376C13.5516 6.63072 13.3691 6.51164 13.1665 6.51164H5.36605C5.0901 6.51164 4.86545 6.73079 4.86545 6.99996C4.86545 7.26914 5.0901 7.48765 5.36605 7.48765H11.9563L10.9168 8.49722C10.7207 8.68723 10.7207 8.99568 10.9155 9.18695C11.0129 9.28259 11.1414 9.33072 11.2693 9.33072C11.3972 9.33072 11.5245 9.28259 11.6226 9.18822L13.5198 7.34578C13.6626 7.20644 13.7061 6.99616 13.6288 6.81376ZM11.7479 6.10699C11.6206 6.10699 11.4933 6.05949 11.3959 5.96575L10.9174 5.50403C10.7213 5.31466 10.72 5.00558 10.9142 4.81494C11.109 4.6224 11.4245 4.62113 11.6213 4.81114L12.0991 5.27222C12.2959 5.46223 12.2972 5.77068 12.103 5.96195C12.005 6.05822 11.8764 6.10699 11.7479 6.10699Z"
                        fill="#091E42" />
                </svg>
                <span>Log Out</span>
            </a>
            <form id="sidebarLogout" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

</nav>
{{-- end sidebar --}}