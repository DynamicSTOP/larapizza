<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slices - Pizzeria HTML Template</title>

    <!-- Vendor Stylesheets -->
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick-theme.css">
    <!-- Icon Fonts -->
    <link rel="stylesheet" href="/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome/css/all.min.css">

    <!-- Slices Style sheet -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="{{ mix('/assets/css/app.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <script type="text/javascript">
        window.csrf = '{{csrf_token()}}';
        window.currency = @json(Session::get('currency','euro'));
    </script>
</head>

<body>
@include('layouts.head')
@yield('content')
@include('layouts.footer')

<!-- Vendor Scripts -->
<script src="{{ mix('/assets/js/vendor.js') }}"></script>

<!-- Site Scripts -->
<script src="{{ mix('/assets/js/app.js') }}" defer></script>

</body>

</html>
