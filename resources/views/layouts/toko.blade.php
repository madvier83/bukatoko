<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

    <link rel="stylesheet" type="text/css" href="/trix-main/dist/trix.css">
    <script type="text/javascript" src="/trix-main/dist/trix.js"></script>

    <style>
        #trix-toolbar-1 {
            display: none;
        }
    </style>
</head>

<body class="bg-zinc-900 text-white min-h-screen">

    @include('layouts.partials.navbar')
    @include('layouts.partials.navbar_toko')

    <div class="">
        @yield('content')
    </div>


</body>

</html>