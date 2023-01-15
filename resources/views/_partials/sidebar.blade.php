<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">C-LEARNING</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class=" @if (Route::is('admin.dashboard'))
        active
        @endif"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        {{-- master --}}
        <li class="menu-header">Master</li>
        <li class="dropdown @if (Route::is('admin.our-scholl') || Route::is('admin.mapel.index') || Route::is('admin.jurusan.index') || Route::is('admin.guru.index') || Route::is('admin.kelas.index') || Route::is('admin.siswa.index')) active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                <span>Master</span></a>
            <ul class="dropdown-menu">
                <li class="@if (Route::is('admin.siswa.index')) active @endif"><a class="nav-link" href="{{route('admin.siswa.index')}}">Siswa</a></li>
                <li class="@if (Route::is('admin.kelas.index')) active @endif"><a class="nav-link" href="{{route('admin.kelas.index')}}">Kelas</a></li>
                <li class="@if (Route::is('admin.guru.index')) active @endif"><a class="nav-link" href="{{route('admin.guru.index')}}">Guru</a></li>
                <li class="@if (Route::is('admin.jurusan.index')) active @endif"><a class="nav-link" href="{{route('admin.jurusan.index')}}">Jurusan</a></li>
                <li class="@if (Route::is('admin.mapel.index')) active @endif"><a class="nav-link" href="{{route('admin.mapel.index')}}">Mata Pelajaran</a></li>
                <li class="@if (Route::is('admin.our-scholl')) active @endif"><a class="nav-link" href="{{route('admin.our-scholl')}}">Identitas Sekolah</a></li>
            </ul>
        </li>
        <li class="dropdown @if (Route::is('admin.materi')) active @endif">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i>
                <span>Pembelajaran</span></a>
            <ul class="dropdown-menu">
                <li class="@if (Route::is('admin.materi')) active @endif"><a class="nav-link" href="{{route('admin.materi')}}">Materi Pembelajaran</a></li>
            </ul>
        </li>

        <li class="menu-header">Aktivitas</li>
        <li class=" @if (Route::is('admin.activity'))
        active
        @endif"><a class="nav-link" href="{{route('admin.activity')}}"><i class="fas fa-fire"></i> <span>Aktivitas Login</span></a></li>
    </ul>
</aside>
