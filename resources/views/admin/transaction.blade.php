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
                    <th>Seller</th>
                    <th>Buyer</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $transaction->product->name }}</td>
                    <td><img src="{{ asset('storage/'.$transaction->product->image) }}" width="64" height="64" alt="" class="rounded-lg bg-zinc-600">
                    </td>
                    {{-- <td>{{ $transaction->seller }}</td> --}}
                    <td>{{ $transaction->seller->name }}</td>
                    <td>{{ $transaction->buyer->name }}</td>
                    <td>{{ $transaction->timestamp }} ({{ $transaction->created_at->diffForHumans() }})</td>
                    <td>
                        @if($transaction->status == 0)
                        <div class="btn btn-xs btn-warning">Menunggu Konfirmasi Penjual</div>
                        @elseif($transaction->status == 1)
                        <div class="btn btn-xs btn-primary">Proses Pengiriman</div>
                        @else
                        <div class="btn btn-xs btn-info">Pesanan Selesai</div>
                        @endif
                    </td>
                    <td>

                        <label class="btn btn-info btn-sm" for="edit-modal-{{ $transaction->id }}">Details</label>
                        <!-- Modal -->
                        <input type="checkbox" id="edit-modal-{{ $transaction->id }}" class="modal-toggle" />
                        <div class="modal">
                            <input type="hidden" name="status" value="{{ $transaction->status }}">
                            <div class="modal-box">
                                <div class="form-control w-full">
                                    <h2 class="text-xl font-semibold mb-4">Detail Transaksi</h2>
                                    <div class="flex justify-between items-center bg-base-200 rounded-lg mt-4">
                                        <img src="{{ asset('storage/'.$transaction->product->image) }}" width="64"
                                            height="64" alt="" class="rounded-lg">
                                        <div class="btn btn-disabled text-zinc-300 normal-case">Rp.{{
                                            number_format($transaction->product->price) }} x {{ $transaction->qty }}
                                        </div>
                                        <div class="btn btn-disabled text-zinc-300 normal-case">Total: Rp.{{
                                            number_format($transaction->product->price*$transaction->qty) }}</div>
                                    </div>
                                    <label class="label mt-2">
                                        <span class="label-text">Product</span>
                                    </label>
                                    <input type="text" placeholder="" name="name"
                                        value="{{ $transaction->product->name }}" class="input input-bordered w-full"
                                        disabled />
                                    <label class="label mt-2">
                                        <span class="label-text">Seller info</span>
                                    </label>
                                    <input type="text" placeholder="" name="name"
                                        value="{{ $transaction->seller->name }}" class="input input-bordered input-sm w-full"
                                        disabled />
                                    <input type="text" placeholder="" name="name"
                                        value="{{ $transaction->seller->email }}" class="input input-bordered input-sm w-full mt-1"
                                        disabled />
                                    <input type="text" placeholder="" name="name"
                                        value="{{ $transaction->seller->phone }}" class="input input-bordered input-sm w-full mt-1"
                                        disabled />
                                    <textarea disabled
                                        class="input input-bordered input-sm w-full h-20 pt-1 mt-1">{{ $transaction->seller->address }}</textarea>

                                    <label class="label mt-2">
                                        <span class="label-text">Buyer info</span>
                                    </label>
                                    <input type="text" placeholder="" name="name" value="{{ $transaction->buyer->name }}"
                                        class="input input-bordered input-sm w-full mt-1" disabled />
                                    <input type="text" placeholder="" name="name" value="{{ $transaction->buyer->email }}"
                                        class="input input-bordered input-sm w-full mt-1" disabled />
                                    <input type="text" placeholder="" name="name" value="{{ $transaction->buyer->phone }}"
                                        class="input input-bordered input-sm w-full mt-1" disabled />
                                    <textarea disabled
                                        class="input input-bordered input-sm w-full mt-1 h-20 pt-1">{{ $transaction->buyer->address }}</textarea>

                                        <label class="label mt-2">
                                            <span class="label-text">Status</span>
                                        </label>
                                    <div class="flex flex-col gap-1 w-min">
                                        
                                    @if($transaction->status == 0)
                                    <div class="btn btn-xs btn-warning">Menunggu Konfirmasi Penjual</div>
                                    <div class="btn btn-xs btn-disabled">Proses Pengiriman</div>
                                    <div class="btn btn-xs btn-disabled">Pesanan Selesai</div>
                                    @elseif($transaction->status == 1)
                                    <div class="btn btn-xs btn-disabled">Menunggu Konfirmasi Penjual</div>
                                    <div class="btn btn-xs btn-primary">Proses Pengiriman</div>
                                    <div class="btn btn-xs btn-disabled">Pesanan Selesai</div>
                                    @else
                                    <div class="btn btn-xs btn-disabled">Menunggu Konfirmasi Penjual</div>
                                    <div class="btn btn-xs btn-disabled">Proses Pengiriman</div>
                                    <div class="btn btn-xs btn-info">Pesanan Selesai</div>
                                    @endif
                                    </div>
                                </div>
                                <div class="modal-action">
                                    <label for="edit-modal-{{ $transaction->id }}" class="btn">Close</label>
                                    
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection