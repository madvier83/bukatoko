@extends('layouts.toko')

@section('title', 'BukaToko | Tambah Produk')
@section('content')
<div class="lg:mx-32 mt-16 pb-44">
    <div class="flex flex-col">

        <div>
            <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">Edit Produk</h1>
        </div>

        <form action="/products/update/{{ $product['id'] }}" method="post" class="mx-auto flex flex-col gap-4 w-80 md:w-96" enctype="multipart/form-data">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Produk</span>
                </label>
                <input type="text" placeholder="" name="name" value="{{ old('name') ?? $product->name }}"
                    class="input input-bordered bg-white text-zinc-900 @error('name') input-error @enderror" />
                @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">
                        {{ $message }}</span>
                </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <div id="editor"></div>

                <input type="hidden" id="x" name="description" value="{{ old('description') ?? $product->description }}">
                <trix-editor input="x"
                    class="bg-white text-black input h-32 overflow-auto @error('description') input-error @enderror">
                </trix-editor>
                {{-- <textarea type="text" placeholder="" name="description"
                    class="input input-bordered py-2 bg-white text-zinc-900 @error('description') input-error @enderror">{{ old('description') }}</textarea>
                --}}

                @error('description')
                <label class="label">
                    <span class="label-text-alt text-error">
                        {{ $message }}</span>
                </label>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kategori</span>
                </label>
                <select name="category_id"
                    class="input input-bordered bg-white text-zinc-900 @error('category_id') input-error @enderror">
                    <option disabled>--- Pilih Kategori ---</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <label class="label">
                    <span class="label-text-alt text-error">
                        {{ $message }}</span>
                </label>
                @enderror
            </div>

            <div class="flex">

                <div class="form-control w-2/3">
                    <label class="label">
                        <span class="label-text">Harga (Rp)</span>
                    </label>
                    <input type="number" placeholder="" name="price" value="{{ old('price') ?? $product->price }}"
                        class="input input-bordered bg-white text-zinc-900 @error('price') input-error @enderror" />
                    @error('price')
                    <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="form-control w-1/3 pl-2">
                    <label class="label">
                        <span class="label-text">Stok</span>
                    </label>
                    <input type="number" placeholder="" name="stock" value="{{ old('stock') ?? $product->stock }}"
                        class="input input-bordered bg-white text-zinc-900 @error('stock') input-error @enderror" />
                    {{-- @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">
                            {{ $message }}</span>
                    </label>
                    @enderror --}}
                </div>
            </div>

            
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Gambar</span>
                </label>
                <input type="file" placeholder="" name="image" value="{{ old('image') }}"
                    class="input input-bordered p-2 bg-white text-zinc-900 @error('image') input-error @enderror" />
                @error('image')
                <label class="label">
                    <span class="label-text-alt text-error">
                        {{ $message }}</span>
                </label>
                @enderror
            </div>

            <div class=" mt-8">
                <button class="btn btn-primary w-full">Simpan</button>
            </div>
        </form>
        <form action="/products/{{ $product->id }}" method="post" class="mx-auto">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}"">
            <div class="mt-4 mx-auto">
                <button class="btn btn-error btn-outline w-96">Hapus Produk</button>
            </div>
        </form>
    </div>

</div>
@endsection