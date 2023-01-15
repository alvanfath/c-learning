<!DOCTYPE html>
<html lang="en">

<head>
    @include('_partials.head')
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            {{-- navbar --}}
            @include('_partials.navbar')
            {{-- end-navbar --}}

            {{-- sidebar --}}
            <div class="main-sidebar sidebar-style-2">
                @include('_partials.sidebar')
            </div>
            {{-- end-sidebar --}}

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                    </div>
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                @include('_partials.footer')
            </footer>
        </div>
    </div>

    @include('_partials.js')
    
    @yield('js')
</body>

</html>
