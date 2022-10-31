@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <h1 class="text-5xl font-bold mx-auto">Welcome back {{ auth()->user()->name }}</h1>
    <ul class="mx-auto flex gap-4 mt-8 text-zinc-400">
        <li class="btn btn-xs rounded-xl btn-primary"><a href="/dashboard">Dashboard</a></li>
        <li class="btn btn-xs rounded-xl btn-primary"><a href="/dashboard/users">Users</a></li>
        <li class="btn btn-xs rounded-xl btn-primary"><a href="/dashboard/categories">Categories</a></li>
        <li class="btn btn-xs rounded-xl btn-primary"><a href="/dashboard/products">Products</a></li>
        <li class="btn btn-xs rounded-xl btn-primary"><a href="/dashboard/transactions">Transaction</a></li>
    </ul>
</div>
@endsection