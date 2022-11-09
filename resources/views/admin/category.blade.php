@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto mx-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-4">Categories</h1>
        <label class="btn btn-primary my-8 w-96 mx-auto" for="create-modal">Add Category +</label>
        <!-- Modal -->
        <input type="checkbox" id="create-modal" class="modal-toggle" />
        <div class="modal">
            <form action="/dashboard/categories" method="post">
                @csrf
                <div class="modal-box w-96">
                    <div class="form-control w-full max-w-xs">
                        <h2 class="text-xl font-semibold mb-4">Tambah kategori</h2>
                        <label class="label">
                            <span class="label-text">Category name</span>
                        </label>
                        <input type="text" placeholder="" name="name"
                            class="input input-bordered w-full @error('name') border-error @enderror" />
                        @error('name')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                    <div class="modal-action">
                        <label for="create-modal" class="btn">Cancel</label>
                        <button class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td class="flex gap-2">


                        <label class="btn btn-info btn-sm" for="edit-modal-{{ $category->id }}">Edit</label>
                        <!-- Modal -->
                        <input type="checkbox" id="edit-modal-{{ $category->id }}" class="modal-toggle" />
                        <div class="modal">
                            <form action="/dashboard/categories/{{ $category->id }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="status" value="{{ $category->status }}">
                                <div class="modal-box w-96">
                                    <div class="form-control w-full max-w-xs">
                                        <h2 class="text-xl font-semibold mb-4">Edit kategori</h2>
                                        <label class="label">
                                            <span class="label-text">Category name</span>
                                        </label>
                                        <input type="text" placeholder="" name="name" value="{{ $category->name }}"
                                            class="input input-bordered w-full @error('name') border-error @enderror" />
                                        @error('name')
                                        <label class="label">
                                            <span class="label-text-alt text-error">{{ $message }}</span>
                                        </label>
                                        @enderror
                                    </div>
                                    <div class="modal-action">
                                        <label for="edit-modal-{{ $category->id }}" class="btn">Cancel</label>
                                        <button class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        @if($category->status === "enabled")
                        <form action="/dashboard/categories/{{ $category->id }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="name" value="{{ $category->name }}">
                            <input type="hidden" name="status" value="disabled">
                            <button class="btn btn-error btn-sm">Disable</button>
                        </form>
                        @else
                        
                        <form action="/dashboard/categories/{{ $category->id }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="name" value="{{ $category->name }}">
                            <input type="hidden" name="status" value="enabled">
                            <button class="btn btn-ghost text-success btn-sm">Enable</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection