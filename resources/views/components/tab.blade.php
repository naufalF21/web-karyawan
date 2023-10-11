<ul class="nav nav-tabs mt-4">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('request') ? 'active text-primary' : 'text-secondary' }}" aria-current="page"
            href="{{ route('request') }}">Register</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('request.cuti') ? 'active text-primary' : 'text-secondary' }}"
            href="{{ route('request.cuti') }}">Cuti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('request.lembur') ? 'active text-primary' : 'text-secondary' }}"
            href="{{ route('request.lembur') }}">Lembur</a>
    </li>
</ul>
