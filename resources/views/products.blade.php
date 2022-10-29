@extends('layouts.main')

@section('title', 'BukaToko | Welcome')
@section('content')

<div class="px-36 mt-24 pb-64">
    <div class="flex items-center gap-4 justify-center">

        {{-- <select class="select select-success w-full max-w-xs focus:outline-none text-black bg-white">
            <option disabled selected>Category</option>
            <option>Java</option>
            <option>Go</option>
            <option>C</option>
            <option>C#</option>
            <option>C++</option>
            <option>Rust</option>
            <option>JavaScript</option>
            <option>Python</option>
        </select> --}}
        <!-- search bar -->
        <div class="w-min">
            <form>
                <div class="relative mx-auto text-gray-600">
                    <div class="form-control">
                        <div class="input-group">
                            <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}"
                                class="input input-bordered w-96 input-success focus:outline-none text-black bg-white" />
                            <button class="btn btn-square btn-success text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="flex mt-16">
        <div class="flex flex-col">
            <h2 class="text-xl w-36 mr-2 mb-8">— <br>Cari produk</h2>
            <ul class="text-zinc-400">

                @foreach($categories as $category)
                <li><a href="?category={{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>

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