
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | CarBook</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">     <!-- App favicon -->
        <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" type="text/css" />      <!-- Vendor css -->
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />      <!-- App css -->
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />       <!-- Icons css -->
        <script src="{{ asset('js/config.js') }}"></script>     <!-- Theme Config Js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <div class="wrapper">    <!-- Begin page -->
            @yield('content')
        </div>    <!-- END wrapper -->

        <script src="{{ asset('js/vendor.min.js') }}"></script>        <!-- Vendor js -->
        <script src="{{ asset('js/app.js') }}"></script>        <!-- App js -->
        <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>        <!-- Apex Chart js -->
        <script src="{{ asset('js/pages/dashboard.js') }}"></script>        <!-- Projects Analytics Dashboard App js -->
    </body>
</html>