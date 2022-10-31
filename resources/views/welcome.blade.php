@extends('layouts.main')

@section('title', 'BukaToko | Welcome')
@section('content')
<div class="flex flex-col md:flex-row justify-between items-end px-8 lg:px-36 mt-12 md:mt-24 md:mb-16">
    <h1 class="text-4xl lg:text-5xl text-zinc-200 font-bold">
        Belanja mudah dari rumah
    </h1>
    <a href="/products" class="mt-8 md:mt-0">
        <div class="flex items-center ">
            <h3 class="text-zinc-200 mr-4">
                Cari Barang
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
        </svg>
    </div>
    </a>
    
</div>
<h2 class="text-xl w-36 ml-8 block md:hidden">— <br>Rekomendasi hari ini</h2>
<div class="relative">

    <div class="flex overflow-hidden px-8 lg:px-36 overflow-y-hidden gap-2 box-scroll">

        <div class="hidden md:absolute z-10 w-32 h-full -left-0 bg-gradient-to-r from-zinc-900  to-transparent">
        </div>
        <div class="absolute z-10 w-32 h-full -right-0 bg-gradient-to-l from-zinc-900  to-transparent">
        </div>

        <h2 class="text-xl w-36 mr-8 hidden md:block">— <br>Rekomendasi hari ini</h2>

        @foreach($products as $item)
        <a href="/products/{{ $item->id }}">
                <div
                    class="group flex flex-col h-[440] w-80 p-4 my-4 bg-zinc-800 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                    <div
                        class="flex items-center justify-center overflow-hidden bg-white object-contain rounded-t-md opacity-75">
                        <div class="h-64 w-64 flex">
                            <img class="object-cover scale-110 group-hover:scale-100 duration-500 mx-auto"
                                src="{{ asset('storage/'.$item->image) }}" alt="" />
                        </div>
                    </div>
                    <div class="mt-4 w-72">
                        <h1 class="text-2xl font-bold text-zinc-300 truncate">{{ $item->name }}</h1>
                        <div
                            class="text-sm mt-2 text-zinc-400 truncate text-ellipsis whitespace-nowrap overflow-hidden">
                            {{
                            strip_tags(str_replace('<', ' <' , $item->description)) }}</div>
                        <a href="#" class="text-xs text-emerald-500 font-semibold">{{ $item->user->name }}</a>
                        <div class="mt-4 mb-2 flex justify-between pr-2">
                            <button class="block text-xl font-semibold text-zinc-300 cursor-auto">Rp. {{
                                number_format($item->price) }}</button>
                            <a href="/products/{{ $item->id }}" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</div>

<div class="px-8 lg:px-36 mt-24 pb-64">
    <div class="flex flex-col md:flex-row">
        <h2 class="text-xl w-36 mr-8">— <br>Serbu Produk terbaru</h2>

        <div class="flex flex-wrap gap-2 w-full">
            @foreach($products as $item)
            <a href="/products/{{ $item->id }}">
                <div
                    class="group flex flex-col h-[440] w-80 p-4 my-4 bg-zinc-800 rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
                    <div
                        class="flex items-center justify-center overflow-hidden bg-white object-contain rounded-t-md opacity-75">
                        <div class="h-64 w-64 flex">
                            <img class="object-cover scale-110 group-hover:scale-100 duration-500 mx-auto"
                                src="{{ asset('storage/'.$item->image) }}" alt="" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <h1 class="text-2xl font-bold text-zinc-300 truncate">{{ $item->name }}</h1>
                        <div
                            class="text-sm mt-2 text-zinc-400 truncate text-ellipsis whitespace-nowrap overflow-hidden">
                            {{
                            strip_tags(str_replace('<', ' <' , $item->description)) }}</div>
                        <a href="#" class="text-xs text-emerald-500 font-semibold">{{ $item->user->name }}</a>
                        <div class="mt-4 mb-2 flex justify-between pr-2">
                            <button class="block text-xl font-semibold text-zinc-300 cursor-auto">Rp. {{
                                number_format($item->price) }}</button>
                            <a href="/products/{{ $item->id }}" class="btn btn-success">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>


<script>
    const mouseWheel = document.querySelector('.box-scroll');

    mouseWheel.addEventListener('wheel', function(e) {
        const race = 100; // How many pixels to scroll

        if (e.deltaY > 0) // Scroll right
            mouseWheel.scrollLeft += race;
        else // Scroll left
            mouseWheel.scrollLeft -= race;
            e.preventDefault();
    });
</script>
@endsection