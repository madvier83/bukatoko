@extends('layouts.main')

@section('title', 'BukaToko | Welcome')
@section('content')
<h1 class="text-5xl text-zinc-200 font-bold px-36 mt-24 mb-16">
    Belanja mudah dari rumah
</h1>
<div class="relative">

    <div class="flex overflow-hidden px-36 overflow-y-hidden gap-2 box-scroll">

        <div class="absolute z-10 w-32 h-full -left-0 bg-gradient-to-r from-zinc-900  to-transparent">
        </div>
        <div class="absolute z-10 w-32 h-full -right-0 bg-gradient-to-l from-zinc-900  to-transparent">
        </div>

        <h2 class="text-xl w-36">— <br>Rekomendasi hari ini</h2>

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
                        <a href="/products/{{ $item->id }}" class="btn btn-success">Buy</a>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</div>

<div class="px-36 mt-24">
    <div class="flex">
        <h2 class="text-xl w-36 mr-4">— <br>Serbu Produk terbaru</h2>

        <div class="flex flex-wrap gap-2 w-full">
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
                            <a href="/products/{{ $item->id }}" class="btn btn-success">Buy</a>
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