<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">C-LEARNINGK</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=" @if (Route::is('guru.dashboard')) active @endif"><a class="nav-link"
                href="{{ route('guru.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        {{-- all-materi --}}
        <li class="menu-header">Materi Pembelajaran</li>
        <li class=" @if (Route::is('guru.materi.index')) active @endif"><a class="nav-link"
                href="{{ route('guru.materi.index') }}"><i class="fas fa-fire"></i> <span>Video Dan E-book</span></a>
        </li>

        {{-- my-materi --}}
        <li class="menu-header">Materi Saya</li>
        <li class="@if (Route::is('guru.materi.my-materi')) active @endif"><a class="nav-link"
                href="{{ route('guru.materi.my-materi') }}"><i class="fas fa-fire"></i> <span>Kelola Materi</span></a>
        </li>
        @php
            $wali = Auth::guard('guru')->user();
        @endphp
        @if ($wali->kelas->count() > 0)
            <li class="menu-header">Walikelas</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Kelas</span></a>
                <ul class="dropdown-menu">
                    @foreach ($wali->kelas as $item)
                        <li ><a class="nav-link" href="{{route('guru.my-class', Crypt::encryptString($item->id))}}">{{ $item->nama_kelas }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
    </ul>
</aside>
