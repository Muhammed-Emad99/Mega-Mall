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
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">

                    <div class="login-brand">
                        <img src="{{asset("assets/img/stisla-fill.svg")}}" alt="logo" width="100"
                             class="shadow-light rounded-circle">
                    </div>

                    @yield('content')

                    <div class="simple-footer">
                        Copyright © Muhammed Emad 2024
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Scripts -->
@include('admin.partials.scripts')

</body>
</html>

