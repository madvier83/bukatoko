@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto mx-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-8">Products</h1>
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Seller</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)

                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    {{-- <td class="max-w-96 truncate">{!! $product->description !!}</td> --}}
                    <td><img src="{{ asset('storage/'.$product->image) }}" width="64" height="64" alt=""
                            class="rounded-lg bg-zinc-400"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->user->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="btn btn-xs">{{ $product->status }}</div>
                    </td>
                    <td><a href="/products/{{ $product->id }}" class="btn btn-sm btn-info">Details</a>
                        {{-- <button class="btn btn-error btn-sm">Disable</button> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection