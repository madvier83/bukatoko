@extends('layouts.toko')

@section('title', 'Profile')
@section('content')
{{-- @dd($order_in) --}}
<div class="mx-32">

    <h2 class="text-xl mr-4 mt-32">— Pesanan Masuk</h2>
    <div class="flex flex-col mt-8 px-32">
        {{-- @dd($orders) --}}
        @foreach($orders_in as $item)
        <div class="flex w-full p-8 my-4 bg-zinc-800 rounded-xl">

            <div class="flex justify-between w-full">

                <div class="flex">

                    <div class="w-36 h-36 overflow-hidden rounded-xl bg-white flex mr-8">
                        <img class="object-cover scale-110 group-hover:scale-100 duration-500"
                            src="{{ asset('storage/'.$item->product->image) }}" alt="" />
                    </div>
                    <div class="">
                        <h2 class="text-2xl font-semibold mb-4">{{ $item->product->name }}</h2>
                        <div class="opacity-60">
                            <p>Harga: Rp.{{ $item->product->price }}</p>
                            <p>Jumlah: {{ $item->qty }}</p>
                            <p>Total: Rp. {{ $item->qty * $item->product->price }}</p>
                            <p>Pemesanan {{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="w-96 ml-16">
                        <h2 class="text-2xl font-semibold mb-4">Detail pesanan ID #{{ $item->id }}</h2>
                        <div class="opacity-60">
                            <p>Pesanan dari: {{ $item->buyer->name }}</p>
                            <p>Email: {{ $item->buyer->email }}</p>
                            <p>Alamat: {{ $item->buyer->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    
                    <form action="/transaksi/{{ $item->id }}" method="post">
                        @csrf
                        @method('put')
                        {{-- {{ $item->id }} --}}
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        @if($item->status<=0)
                        <button class="btn btn-success p-3 font-bold">
                            Terima Pesanan
                        </button>
                        @else
                        <button class="btn btn-primary p-3 font-bold">
                            Tandai Selesai
                        </button>
                        @endif
                    </form>
                    <a href="/products/{{ $item->id }}" class="btn btn-error p-3 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <h2 class="text-xl mr-4 mt-8">— Pesanan Kamu</h2>
    <div class="flex flex-col mt-8 px-32">
        {{-- @dd($orders) --}}
        @foreach($orders as $item)
        <div class="flex w-full p-8 my-4 bg-zinc-800 rounded-xl">
            <div class="w-36 h-36 rounded-xl bg-white flex mr-8">
                <img class="object-cover scale-110 group-hover:scale-100 duration-500"
                    src="{{ asset('storage/'.$item->product->image) }}" alt="" />
            </div>

            <div class="">
                <h2 class="text-2xl font-semibold mb-4">{{ $item->product->name }}</h2>
                <div class="opacity-60">
                    <p>Harga: Rp.{{ $item->product->price }}</p>
                    <p>Jumlah: {{ $item->qty }}</p>
                    <p>Total: Rp. {{ $item->qty * $item->product->price }}</p>
                    <p>Pemesanan {{ $item->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection