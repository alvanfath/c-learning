<nav class="navbar navbar-expand-lg main-navbar">
    <a href="index.html" class="navbar-brand sidebar-gone-hide">C-LEARNING</a>
    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
            class="fas fa-bars"></i></a>

    <form class="form-inline ml-auto">
    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->nama_lengkap}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{route('siswa.my-profile')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item @if(Route::is('siswa.dashboard')) active @endif">
                <a href="{{route('siswa.dashboard')}}" class="nav-link"><i class="fa fa-warehouse"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item @if(Route::is('siswa.mapel')) active @endif"">
                <a href="{{route('siswa.mapel')}}" class="nav-link"><i class="fa fa-book-open"></i><span>Mata Pelajaran</span></a>
            </li>
            <li class="nav-item @if(Route::is('siswa.classmate')) active @endif">
                <a href="{{route('siswa.classmate')}}" class="nav-link"><i class="fa fa-door-open"></i><span>Kelasku</span></a>
            </li>
        </ul>
    </div>
</nav>
