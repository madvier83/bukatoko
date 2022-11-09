@extends('layouts.toko')

@section('title', 'BukaToko | Pesanan')
@section('content')
{{-- @dd($order_in) --}}
<div class="mx-4 lg:mx-32 pb-64">

    <h2 class="text-xl mr-4 mt-16">— Pesanan Masuk</h2>

    @if($orders_in->isEmpty())
    <div class="my-8 mx-auto lg:mx-0 lg:ml-32 opacity-70 bg-emerald-900 w-min rounded-lg p-4">
        <p class="mx-4">Belum ada yang pesan barang kamu :(</p>
        <a href="/toko" class="btn btn-sm btn-success font-bold mx-4 w-48 mt-8 border-none">
            Lihat Produk
        </a>
    </div>
    @endif

    <div class="flex flex-col mt-8 lg:px-16">
        {{-- @dd($orders) --}}
        @foreach($orders_in as $item)
        <div class="flex w-full p-8 my-4 bg-zinc-800 rounded-xl">

            <div class="flex flex-col md:flex-row gap-4 lg:gap-0 justify-between w-full">

                <div class="flex flex-col md:flex-row gap-4">
                    <div class="w-full max-h-72 md:w-36 md:h-36 overflow-hidden rounded-xl bg-white flex mr-8">
                        <img class="mx-auto object-cover scale-110 group-hover:scale-100 duration-500"
                            src="{{ asset('storage/'.$item->product->image) }}" alt="" />
                    </div>
                    <div class="md:w-[20%]">
                        <h2 class="text-2xl font-semibold mb-4 truncate">{{ $item->product->name }}</h2>
                        <div class="opacity-60">
                            <p>Harga: Rp.{{ $item->product->price }}</p>
                            <p>Jumlah: {{ $item->qty }}</p>
                            <p>Total: Rp. {{ number_format($item->qty * $item->product->price) }}</p>
                            <p>Pemesanan {{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="md:ml-8 md:w-[50%]">
                        <h2 class="text-2xl font-semibold mb-4">Detail pesanan ID #{{ $item->id }}</h2>
                        <div class="opacity-60">
                            <p>Pesanan dari: {{ $item->buyer->name }}</p>
                            <p>Email: {{ $item->buyer->email }}</p>
                            <p>Alamat: {{ $item->buyer->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center md:w-[20%]">
                    <form action="/transaksi/{{ $item->id }}" method="post" class="ml-auto">
                        @csrf
                        @method('put')
                        {{-- {{ $item->id }} --}}
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        @if($item->status<=0) 
                            <input type="hidden" name="status" value="{{ 1 }}">
                            <button class="btn btn-success p-3 font-bold">
                                Terima Pesanan
                            </button>
                            @elseif($item->status==1)
                            <input type="hidden" name="status" value="{{ 2 }}">
                            <button class="text-zinc-500 p-3 font-bold" disabled>
                                Menunggu konfirmasi pembeli
                            </button>
                            @else
                            <button class="btn btn-ghost p-3 font-bold" disabled>
                                Pesanan selesai
                            </button>
                            @endif
                    </form>
                    
                    <form action="/transaksi/{{ $item->id }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="status" value="{{ 2 }}">
                        <button class="btn btn-error p-3 ml-2" {{ $item->status == 1 ||  $item->status == 2  ? 'disabled' : '' }}>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <h2 class="text-xl mr-4 mt-8">— Pesanan Kamu</h2>
    
    @if($orders->isEmpty())
    <div class="my-8 mx-auto lg:mx-0 lg:ml-32 opacity-70 bg-purple-900 w-min rounded-lg p-4">
        <p class="mx-4">Belum ada barang yang kamu pesan</p>
        <a href="/produk" class="btn btn-sm btn-primary font-bold mx-4 w-48 mt-8 border-none">
            Cari Barang
        </a>
    </div>
    @endif

    <div class="flex flex-col mt-8 px-4 lg:px-16">
        {{-- @dd($orders) --}}
        @foreach($orders as $item)
        <div class="flex flex-col w-full p-8 my-4 bg-zinc-800 rounded-xl">

            <div class="flex flex-col md:flex-row gap-4 justify-between w-full">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="w-full max-h-72 md:w-36 md:h-36 overflow-hidden rounded-xl bg-white flex mr-8">
                        <img class="mx-auto object-cover scale-110 group-hover:scale-100 duration-500"
                            src="{{ asset('storage/'.$item->product->image) }}" alt="" />
                    </div>
                    <div class="md:w-[20%]">
                        <h2 class="text-2xl font-semibold mb-4 truncate">{{ $item->product->name }}</h2>
                        <div class="opacity-60">
                            <p>Harga: Rp.{{ number_format($item->product->price) }}</p>
                            <p>Jumlah: {{ $item->qty }}</p>
                            <p>Total: Rp. {{ number_format($item->qty * $item->product->price) }}</p>
                            <p>Pemesanan {{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="md:ml-8 md:w-[50%]">
                        <h2 class="text-2xl font-semibold mb-4">Informasi penjual</h2>
                        <div class="opacity-60">
                            <p>Toko: {{ $item->seller->name }}</p>
                            <p>Email penjual: {{ $item->seller->email }}</p>
                            <p>Alamat penjual: {{ $item->seller->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center md:w-[20%]">
                    <form action="/transaksi/{{ $item->id }}" method="post"  class="ml-auto">
                        @csrf
                        @method('put')
                        {{-- {{ $item->id }} --}}
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        @if($item->status<=0) 
                        <input type="hidden" name="status" value="{{ 1 }}">
                        <button class="text-zinc-500 p-3 font-bold" disabled>
                            Menunggu konfirmasi penjual
                        </button>
                        @elseif($item->status==1)
                        <input type="hidden" name="status" value="{{ 2 }}">
                        <button class="btn btn-primary p-3 font-bold">
                            Tandai Selesai
                        </button>
                        @else
                        <button class="btn btn-ghost text-info p-3 font-bold" disabled>
                            Pesanan selesai
                        </button>
                        @endif
                    </form>
                    
                    <form action="/transaksi/{{ $item->id }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="hidden" name="status" value="{{ 2 }}">
                        <button class="btn btn-error p-3 ml-2" {{ $item->status != 0 ? 'disabled' : '' }}>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>
@endsection