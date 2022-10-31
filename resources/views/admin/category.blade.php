@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto mx-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-8">Categories</h1>
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
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