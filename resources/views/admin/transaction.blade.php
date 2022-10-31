@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto mx-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-8">Transaction</h1>
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Buyer</th>
                    <th>Seller</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $transaction->product->name }}</td>
                    <td><img src="{{ asset('storage/'.$transaction->product->image) }}" width="64" height="64" alt=""></td>
                    {{-- <td>{{ $transaction->seller }}</td> --}}
                    <td>{{ $transaction->buyer->name }}</td>
                    <td>{{ $transaction->seller->name }}</td>
                    <td>{{ $transaction->timestamp }} ({{ $transaction->created_at->diffForHumans() }})</td>
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