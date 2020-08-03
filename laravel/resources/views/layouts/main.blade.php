<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'LARA PIZZA')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript">window.csrf='{{csrf_token()}}';</script>
    <script src="/js/app.js" type="text/javascript" defer></script>
</head>
<body>
    <div class="container">
        @include('layouts.nav')
        @yield('content')
        @include('layouts.footer')
    </div>
</body>
</html>
