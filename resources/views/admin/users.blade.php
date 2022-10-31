@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-8">Users</h1>
        <table class="table w-min mx-auto">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><p class="w-96 break-words truncate">{{ $user->address }}</p></td>
                    <td>
                        <button class="btn btn-error btn-sm">Disable</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection