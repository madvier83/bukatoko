<!-- Navbar -->
<nav class="z-10 bg-zinc-900 text-white w-full flex relative justify-between items-center mx-auto px-8 h-20">
    
    <!-- logo -->
    <div class="inline-flex">
        <h2 class="text-3xl font-bold text-rose-500">BukaToko</h2>
        {{-- <img src="/img/log.png" alt="logo" width="36"> --}}
    </div>
    <!-- end logo -->

    <!-- bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="flex items-center max-w-full justify-between gap-8">
                {{-- <a href="#">Kategori</a>
                <a href="#">Transaksi</a> --}}
            </div>
        </div>
    </div>
    <!-- end bar -->

    <!-- login -->
    <div class="flex-initial">
        <div class="flex justify-end items-center relative">

            <div class="flex mr-4 items-center">
                <a class="inline-block py-2 px-3 hover:bg-zinc-700 rounded-full" href="#">
                    <div class="flex items-center relative cursor-pointer whitespace-nowrap">Mulai Jualan</div>
                </a>
                <div class="block relative">
                    <button type="button" class="inline-block py-2 px-3 hover:bg-gray-700 rounded-full relative ">
                        <div class="flex items-center h-5">
                            <div class="_xpkakx">
                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    role="presentation" focusable="false"
                                    style="display: block; height: 16px; width: 16px; fill: currentcolor;">
                                    <path
                                        d="m8.002.25a7.77 7.77 0 0 1 7.748 7.776 7.75 7.75 0 0 1 -7.521 7.72l-.246.004a7.75 7.75 0 0 1 -7.73-7.513l-.003-.245a7.75 7.75 0 0 1 7.752-7.742zm1.949 8.5h-3.903c.155 2.897 1.176 5.343 1.886 5.493l.068.007c.68-.002 1.72-2.365 1.932-5.23zm4.255 0h-2.752c-.091 1.96-.53 3.783-1.188 5.076a6.257 6.257 0 0 0 3.905-4.829zm-9.661 0h-2.75a6.257 6.257 0 0 0 3.934 5.075c-.615-1.208-1.036-2.875-1.162-4.686l-.022-.39zm1.188-6.576-.115.046a6.257 6.257 0 0 0 -3.823 5.03h2.75c.085-1.83.471-3.54 1.059-4.81zm2.262-.424c-.702.002-1.784 2.512-1.947 5.5h3.904c-.156-2.903-1.178-5.343-1.892-5.494l-.065-.007zm2.28.432.023.05c.643 1.288 1.069 3.084 1.157 5.018h2.748a6.275 6.275 0 0 0 -3.929-5.068z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

            <div class="block">
                <div class="inline relative">
                    <a href="/login">
                        <button type="button"
                            class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">

                            <div class="pl-4">
                                Login
                            </div>

                            <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    role="presentation" focusable="false"
                                    style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                                    <path
                                        d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</nav>