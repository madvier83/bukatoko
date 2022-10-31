@extends('layouts.main')

@section('title', 'BukaToko | ' . $product->name)
@section('content')
<div class="flex flex-col pb-48">
    <div class="flex justify-between items-end m-8 lg:px-24 pt-16">
        <h1 class="text-5xl font-bold">
            {{ $product->name }}
        </h1>
        <a href="{{ url()->previous() }}" class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            <span class="mr-4">
                Back
            </span>
        </a>
    </div>
    <div class="px-8 lg:px-32">

        <div class="relative flex h-48 justify-center items-center overflow-hidden rounded-md my-8 opacity-20 w-full">
            <img class="absolute min-w-full min-h-full object-cover" src="{{ asset('storage/'.$product->image) }}"
                alt="" />
        </div>

        <div class="flex flex-col lg:flex-row">

            <div class="w-full lg:w-1/2">
                <h3 class="text-3xl font-bold mt-8">— Informasi Barang</h3>

                <div class="flex gap-2">

                    <div class="w-44 h-44 rounded-lg overflow-hidden opacity-50 my-8">
                        <img class="min-w-full min-h-full object-cover" src="{{ asset('storage/'.$product->image) }}"
                            alt="" />
                    </div>
                    <div class="w-44 h-44 rounded-lg overflow-hidden opacity-20 my-8">
                        <img class="min-w-full min-h-full object-cover" src="{{ asset('storage/'.$product->image) }}"
                            alt="" />
                    </div>
                    <div class="w-44 h-44 rounded-lg overflow-hidden opacity-20 my-8">
                        <img class="min-w-full min-h-full object-cover" src="{{ asset('storage/'.$product->image) }}"
                            alt="" />
                    </div>
                </div>

                <div class="text-zinc-400 flex flex-col gap-4">
                    <p class="font-bold">Harga: <span class="">Rp. {{ number_format($product->price) }}</span></p>
                    <b>Stok tersedia > {{ $product->stock }}</b>
                    <b>Deskripsi produk:</b>
                    <span class="md:mr-32 text-justify">{!! $product->description !!}</span>

                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <h3 class="text-3xl font-bold my-8">— Informasi Penjual</h3>
                <div class="text-zinc-400 flex flex-col gap-4">
                    <p>Seller: <a href="#" class="text-emerald-500">{{ $product->user->name }}</a></p>
                    <p>Email: {{ $product->user->email }}</p>
                    <p>No Telp: {{ $product->user->phone }}</p>
                    <p>Alamat: {{ $product->user->address }}</p>
                    <p>Akun dibuat tanggal {{ $product->user->created_at }} ({{
                        $product->user->created_at->diffForHumans() }})</p>
                </div>

                <h3 class="text-3xl font-bold my-8 mt-16">— Langsung Beli</h3>
                @if(auth()->user())
                <div class="flex flex-col gap-4 mb-6 text-zinc-400">
                    <a href="/akun">Atas nama: <span class="text-emerald-500">{{ auth()->user()->name }}</span></a>
                    <p class="">Dikirim ke: {{ auth()->user()->address }}</p>
                </div>
                @endif
                <form action="/transaksi" method="post">
                    @csrf
                    <div class="text-zinc-400 flex flex-col gap-4 bg-emerald-900 p-8 w-min rounded-xl">
                        <div class="flex justify-between items-center">

                            <h3 class="text-2xl text-white font-semibold">Rp.{{ number_format($product->price) }}</h3>
                            <b>X</b>
                            <div class="form-control w-24 pl-2 flex">
                                {{-- <label class="label">
                                    <span class="label-text">Jumlah</span>
                                </label> --}}
                                <input type="number" placeholder="" name="qty" value="{{ 1 }}"
                                    class="input input-sm input-bordered bg-white text-zinc-900 @error('stock') input-error @enderror" />
                            </div>
                        </div>

                        @if(auth()->user())
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="buyer_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="seller_id" value="{{ $product->user->id }}">
                        <button class="btn btn-success w-64 mt-4" {{ $product->user->id == auth()->user()->id ?
                            'disabled' : '' }}>Checkout</button>
                        @else
                        <button class="btn btn-success w-64 mt-4" disabled>Checkout</button>
                        <a href="/login">
                            <button class="btn btn-primary w-64">Login Dulu</button>
                        </a>
                        @endif
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection