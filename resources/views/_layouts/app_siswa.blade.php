<!DOCTYPE html>
<html lang="en">

<head>
    @include('_partials_siswa.head')
    @yield('css')
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            @include('_partials_siswa.navbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header d-flex justify-content-between">
                        @yield('header')

                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @include('_partials_siswa.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('_partials_siswa.js')
    @yield('js')
</body>

</html>
