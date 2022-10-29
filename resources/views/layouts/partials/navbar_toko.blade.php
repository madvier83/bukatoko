<div class="navbar bg-zinc-900">
    <div class="navbar-start">
    </div>
    <div class="navbar-center">
        <ul class="flex gap-8">
            <li><a href="/akun" class="{{ Request::is('akun') ? "" : 'text-zinc-400' }}">Profile</a></li>
            <li><a href="/toko" class="{{ Request::is('toko') ? "" : 'text-zinc-400' }}">Produk</a></li>
            <li><a href="/pesanan" class="{{ Request::is('pesanan') ? "" : 'text-zinc-400' }}">Pesanan</a></li>
            {{-- <li tabindex="0">
                <a>
                    Parent
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24">
                        <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                    </svg>
                </a>
                <ul class="p-2">
                    <li><a>Submenu 1</a></li>
                    <li><a>Submenu 2</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
    <div class="navbar-end">
    </div>
</div>