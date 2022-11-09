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
</head>

<body class="bg-zinc-900 text-white min-h-screen">

    @include('layouts.partials.navbaradmin')

    <div class="flex">
        <ul class="mx-auto flex gap-4 mt-6 text-zinc-400">
            <li class="btn btn-xs rounded-xl font-normal normal-case {{ Request::is('dashboard') ? 'btn-primary' : '' }} w-28"><a href="/dashboard">Dashboard</a></li>
            <li class="btn btn-xs rounded-xl font-normal normal-case {{ Request::is('dashboard/users') ? 'btn-primary' : '' }} w-28"><a href="/dashboard/users">Users</a></li>
            <li class="btn btn-xs rounded-xl font-normal normal-case {{ Request::is('dashboard/categories') ? 'btn-primary' : '' }} w-28"><a href="/dashboard/categories">Categories</a></li>
            <li class="btn btn-xs rounded-xl font-normal normal-case {{ Request::is('dashboard/products') ? 'btn-primary' : '' }} w-28"><a href="/dashboard/products">Products</a></li>
            <li class="btn btn-xs rounded-xl font-normal normal-case {{ Request::is('dashboard/transactions') ? 'btn-primary' : '' }} w-28"><a href="/dashboard/transactions">Transactions</a></li>
            <li>
                <form action="/logout" method="post" class="">
                    @csrf
                    <button class="btn btn-xs rounded-xl btn-outline w-24 ml-4 btn-error">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="pb-64">
        @yield('content')
    </div>

</body>

</html>