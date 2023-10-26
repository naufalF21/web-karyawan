{{-- nav --}}
<nav class="navbar navbar-expand-lg bg-white container pt-4">
    <div class="container-fluid">
        <a href="#"><img class="navbar-brand" src="/assets/img/logo-navbar.svg" alt="logo-algostudio"
                style="height: 2.5rem"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center w-100 gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active fw-bold border-2 border-dark border-bottom' : '' }}"
                        aria-current="page" href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('absen') || Route::is('absen.done') ? 'active fw-bold border-2 border-dark border-bottom' : '' }}"
                        href="{{ url('/absen') }}">Absen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('document') || Route::is('contact') || Route::is('cuti.perjam') || Route::is('cuti.harian') || Route::is('lembur') || Route::is('submit') ? 'active fw-bold border-2 border-dark border-bottom' : '' }}"
                        href="{{ url('/document') }}">Documents</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-bell" viewBox="0 0 16 16">
                    <path
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                </svg>
                <div class="dropdown ms-3" style="cursor: pointer">
                    <div class="d-flex align-items-center gap-2 dropdown-toggle" data-bs-toggle="dropdown">
                        @if (auth()->user()->photo_path)
                            <img src="{{ asset('storage/profiles/' . auth()->user()->photo_path) }}" alt="Gambar Profil"
                                width="35" height="35" class="rounded-circle" />
                        @else
                            <img src="{{ 'https://ui-avatars.com/api/?background=random&name=' . auth()->user()->name }}"
                                alt="Gambar Profil" width="35" height="35" class="rounded-circle" />
                        @endif
                        <div class="d-flex flex-column">
                            <span class="fw-bold">Hi {{ auth()->user()->name }}</span>
                            <span>Welcome</span>
                        </div>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('profile-form').submit();">Profil</a>
                            </li>
                            @if (auth()->user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard.index') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('dashboard-link').submit();">Dashboard</a>
                                </li>
                            @endif

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <form id="profile-form" action="{{ route('profile') }}" method="GET"
                                    style="display: none;">
                                </form>
                                <form id="dashboard-link" action="{{ route('dashboard.index') }}" method="GET"
                                    style="display: none;">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
