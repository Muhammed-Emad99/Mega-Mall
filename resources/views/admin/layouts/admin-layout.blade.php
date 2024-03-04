<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    @include("admin.partials.styles");

</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg" style="height: 70px;"></div>
        <nav class="navbar navbar-expand-lg main-navbar" style="height: 35px; padding: 0 10px">
            @include('admin.partials.navbar')
        </nav>

        <div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
            <aside id="sidebar-wrapper">
                @include('admin.partials.sidebar')
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content" style="padding-top: 60px;">
            <section class="section">

                <!-- Page Header -->
                <div class="section-header">
                    @yield('section-header')
                </div>

                <!-- Page Content -->
                <div class="section-body">
                    @yield('section-body')
                </div>

            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer mt-0">
            <div class="footer-left">
                Copyright &copy; 2023
                <div class="bullet"></div>
                By <a href="#">Muhammed Emad</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>

    </div>
</div>


<!-- Scripts -->
@include('admin.partials.scripts')

</body>
</html>

