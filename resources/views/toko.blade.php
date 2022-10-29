@extends('layouts.toko')

@section('title', 'BukaToko | Toko saya')
@section('content')
<div class="lg:mx-32 mt-16 flex flex-col p-4">

    @if($products->isEmpty())
    <div class="flex flex-col mx-auto bg-emerald-900 p-16 rounded-xl">
        <h2 class="text-3xl text-zinc-300 text-center">Belum ada produk yang kamu jual 😶‍🌫️</h2>
        <a href="/toko/create" class="btn btn-success font-bold w-48 mx-auto mt-8 border-none">
            Tambah Produk
        </a>
    </div>
    @else

    <h2 class="text-3xl font-bold text-zinc-300 text-center">Produk kamu</h2>
    <a href="/toko/create" class="btn btn-success font-bold w-48 my-8 ml-8 border-none">
        Tambah Produk
    </a>
    @endif

    <div class="flex flex-wrap gap-4">
        @foreach($products as $item)
        <a href="/products/{{ $item->id }}">
            <div
                class="group flex flex-col h-[440] w-80 p-4 my-4 bg-zinc-800 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                <div
                    class="flex items-center justify-center overflow-hidden bg-white object-contain rounded-t-md opacity-75">
                    <div class="h-64 flex">
                        <img class="object-cover scale-110 group-hover:scale-100 duration-500"
                            src="{{ asset('storage/'.$item->image) }}" alt="" />
                    </div>
                </div>
                <div class="mt-4">
                    <h1 class="text-2xl font-bold text-zinc-300 truncate">{{ $item->name }}</h1>
                    <div class="text-sm mt-2 text-zinc-400 truncate text-ellipsis whitespace-nowrap overflow-hidden">{{
                        strip_tags(str_replace('<', ' <' , $item->description)) }}</div>
                    <a href="#" class="text-xs text-emerald-500 font-semibold">{{ $item->user->name }}</a>
                    <div class="mt-4 mb-2 flex justify-between pr-2">
                        <button class="block text-xl font-semibold text-zinc-300 cursor-auto">Rp. {{
                            number_format($item->price) }}</button>
                        <div class="flex">

                            <a href="/products/update/{{ $item->id }}" class="btn btn-success p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <a href="/products/{{ $item->id }}" class="btn btn-error p-3 ml-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</div>
@endsection