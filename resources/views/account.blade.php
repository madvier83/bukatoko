@extends('layouts.toko')

@section('title', 'BukaToko | Profile')
@section('content')
<div class="flex mt-8">
    <div class="py-12 mx-auto items-center justify-center rounded-2xl shadow-xl z-20 w-96">
        <div>
            {{-- <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer text-white">{{ auth()->user()->name }}</h1> --}}
            <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer text-white">Profile</h1>
        </div>
        <div class="flex my-4 mt-8">
            <img src="/img/default.webp" alt="profile picture" class="rounded-full avatar w-24 mx-auto">
        </div>
        {{-- <form action="/register" method="post"> --}}
            @csrf
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Nama Lengkap</span>
                </label>
                <input type="text" placeholder="Nama asli" name="name" value="{{ auth()->user()->name }}"
                    class="input input-bordered w-full text-white @error('name') input-error @enderror" disabled/>
                @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">
                        {{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" placeholder="contoh@email.com" name="email" value="{{ auth()->user()->email }}"
                    class="input input-bordered w-full text-white @error('email') input-error @enderror" disabled/>

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
                <textarea name="address" id="" cols="30" rows="10" placeholder="alamat lengkap" class="input input-bordered text-white py-2 h-36" disabled>{{ auth()->user()->address }}</textarea>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Nomor Telepon</span>
                </label>
                <input type="text" placeholder="+62 xxxx xxxx" name="phone" value="{{ auth()->user()->phone }}"
                    class="input input-bordered w-full text-white @error('phone') input-error @enderror" disabled/>
                @error('phone')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
                @enderror
            </div>

            <div class="flex mt-8 gap-2 items-center justify-end flex-col">
                {{-- <button class="btn btn-primary w-full">Ubah Data</button> --}}
                
                <form action="/logout" method="post" class="w-full">
                    @csrf
                    <button class="btn btn-ghost text-error w-full normal-case">Logout</button>
                </form>
            </div>
            {{-- </form> --}}
    </div>
</div>
@endsection