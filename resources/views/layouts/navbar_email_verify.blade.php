{{-- nav --}}
<nav class="navbar navbar-expand-lg bg-white container pt-4">
    <div class="container-fluid">
        <a href="{{ route('home') }}"><img class="navbar-brand" src="/assets/img/logo-navbar.svg" alt="logo-algostudio"
                style="height: 2.5rem"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="d-flex align-items-center">
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
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
