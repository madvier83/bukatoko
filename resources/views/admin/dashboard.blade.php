@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <h1 class="text-5xl font-bold mx-auto">Welcome back {{ auth()->user()->name }}</h1>


    <p class="text-lg mx-auto mt-16 text-zinc-400">
        Today is {{ date("Y-m-d") }}</p>

    <div class="stats shadow w-min h-32 mx-auto mt-8">

        <div class="stat">
            <div class="stat-figure text-primary">
                <a href="/dashboard/transactions">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>
            </div>
            <div class="stat-title">Transactions</div>
            <div class="stat-value">{{ $transactions }}</div>
            <div class="stat-desc">2022 - 2023</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-primary">
                <a href="/dashboard/users">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="stat-title">Users</div>
            <div class="stat-value">{{ $users }}</div>
            <div class="stat-desc">↗︎ {{ $users }} new users</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-primary">
                <a href="/dashboard/products">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="stat-title">Products</div>
            <div class="stat-value">{{ $products }}</div>
            <div class="stat-desc">↗︎ {{ $stocks }} Stocks</div>
        </div>

    </div>

</div>
@endsection