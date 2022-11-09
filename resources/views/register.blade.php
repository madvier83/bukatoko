<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Buat Akun</title>
</head>

<body class="bg-zinc-800 text-white min-h-screen overflow-auto">
    <!-- component -->
    <div class="min-h-screen bg-zinc-900 flex justify-center items-center">
        <div
            class="absolute w-60 h-60 rounded-xl bg-violet-500 opacity-75 -top-5 -left-16 z-0 transform rotate-45 hidden md:block">
        </div>
        <div
            class="absolute w-48 h-48 rounded-xl bg-violet-500 opacity-75 -bottom-6 -right-10 transform rotate-12 hidden md:block">
        </div>

        <div class="py-12 px-12 bg-white rounded-2xl shadow-xl z-20 w-96">
            <div>
                <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer text-zinc-800">Form Registrasi</h1>
                {{-- <p class="w-80 text-center text-sm mb-8 font-semibold text-gray-700 tracking-wide cursor-pointer">
                    Login untuk menikmati semua layanan yang ada!</p> --}}
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input type="text" placeholder="Nama asli" name="name" value="{{ old('name') }}"
                        class="input input-bordered w-full max-w-xs bg-white text-zinc-900 @error('name') input-error @enderror" />
                    @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}</span>
                    </label>
                    @enderror
                </div>
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="contoh@email.com" name="email" value="{{ old('email') }}"
                        class="input input-bordered w-full max-w-xs bg-white text-zinc-900 @error('email') input-error @enderror" />

                    @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <textarea name="address" id="" cols="30" rows="10" placeholder="Alamat lengkap"
                        class="input input-bordered bg-white text-zinc-900  py-2 h-20 @error('address') input-error @enderror"">{{ old('address') }}</textarea>
                
                    @error('address')
                    <label class=" label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nomor Telepon</span>
                    </label>
                    <input type="text" placeholder="+62 xxx xxxx xxxx" name="phone" value="{{ old('phone') }}"
                        class="input input-bordered w-full bg-white text-zinc-900 @error('phone') input-error @enderror" />
                    @error('phone')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>

                
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Masukan password *min 8" name="password"
                        class="input input-bordered w-full max-w-xs bg-white text-zinc-900 @error('password') input-error @enderror" />

                    @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Konfirmasi Password</span>
                    </label>
                    <input type="password" placeholder="Konfirmasi password" name="password_confirmation"
                        class="input input-bordered w-full max-w-xs bg-white text-zinc-900 @error('password') input-error @enderror" />
                </div>

                <div class="flex mt-8 gap-2 items-center justify-end flex-col">
                    <button class="btn btn-primary w-full">Register</button>
                    <a href="/login" class="btn btn-ghost text-primary w-full normal-case">Sudah punya akun? Login</a>
                </div>
            </form>
        </div>

        {{-- <a href="/" class="btn rounded-full w-16 h-16 absolute bottom-16">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
        </a> --}}
        <div class="w-40 h-40 absolute bg-violet-400 opacity-75 rounded-full bottom-20 left-10 hidden md:block"></div>
        <div
            class="w-20 h-40 absolute bg-violet-400 opacity-75 rounded-full top-0 right-12 transform rotate-45 hidden md:block">
        </div>
    </div>
</body>

</html>