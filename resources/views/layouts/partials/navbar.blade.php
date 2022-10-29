<div
    class="navbar bg-zinc-900 hover:bg-zinc-800 hover:bg-opacity-50 duration-100 lg:py-4 lg:px-32 shadow-lg border-b-2 border-zinc-800">

    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
            <ul tabindex="0"
                class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-zinc-800 hover:shadow-lg rounded-box w-52">
                <li><a href="/">Homepage</a></li>
                <li><a href="/produk">Search</a></li>
                <li><a href="/akun">Profile</a></li>
                <li><a href="/pesanan">Pesanan</a></li>
                <li><a href="/toko" class="text-emerald-400">Produk Saya</a></li>
                @auth
                <div class="divider p-0 m-0"></div>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="text-error w-full text-left">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    <div class="navbar-center">
        <div class="inline-flex">
            <a href="/">
                <h2 class="text-3xl font-bold text-emerald-400 cursor-pointer select-none">BukaToko</h2>
            </a>
        </div>
    </div>
    <div class="navbar-end">

        <!-- login -->
        <div class="flex-initial">
            <div class="flex justify-end items-center relative">

                <div class="block">
                    <div class="inline relative">

                        @auth
                        <a href="/akun" class="flex">
                            <button type="button"
                                class="inline-flex items-center relative px-2 btn btn-ghost rounded-full hover:shadow-lg">
                                <div class="pl-2 normal-case hidden md:block">
                                    {{ auth()->user()->email }}
                                </div>
                                <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-4">
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
                        @else
                        <a href="/login">
                            <button type="button"
                                class="inline-flex items-center relative px-2 btn btn-ghost rounded-full hover:shadow-lg">
                                <div class="pl-2 normal-case">
                                    Login
                                </div>
                                <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-4">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                        role="presentation" focusable="false"
                                        style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                                        <path
                                            d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z">
                                        </path>
                                    </svg>
                                </div>
                            </button>
                            @endauth

                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <button class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
        <button class="btn btn-ghost btn-circle">
            <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="badge badge-xs badge-primary indicator-item"></span>
            </div>
        </button> --}}
    </div>
</div>