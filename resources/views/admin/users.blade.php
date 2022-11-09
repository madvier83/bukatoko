@extends('layouts.admin')

@section('title', 'Admin | Dashboard')
@section('content')
<div class="flex flex-col mt-24 mx-16">
    <div class="overflow-x-auto flex flex-col">
        <h1 class="mx-auto text-4xl font-bold mb-8">Users</h1>
        <table class="table w-min mx-auto">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }} @if($user->role === 'admin')
                        <div class="btn btn-info normal-case btn-xs rounded-full ml-2">Admin</div>
                    @endif</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <p class="w-96 break-words truncate">{{ $user->address }}</p>
                    </td>
                    <td>

                        <label class="btn btn-info btn-sm" for="edit-modal-{{ $user->id }}">Details</label>
                        <!-- Modal -->
                        <input type="checkbox" id="edit-modal-{{ $user->id }}" class="modal-toggle" />
                        <div class="modal">
                            <input type="hidden" name="status" value="{{ $user->status }}">
                            <div class="modal-box w-96">
                                <div class="form-control w-full max-w-xs">
                                    <h2 class="text-xl font-semibold mb-4">Detail user</h2>

                                    <label class="label">
                                        <span class="label-text">Nama</span>
                                    </label>
                                    <input type="text" placeholder="" name="name" value="{{ $user->name }}"
                                        class="input input-bordered w-full" disabled/>
                                    <label class="label mt-2">
                                        <span class="label-text">Email</span>
                                    </label>
                                    <input type="text" placeholder="" name="name" value="{{ $user->email }}"
                                        class="input input-bordered w-full" disabled/>
                                    <label class="label mt-2">
                                        <span class="label-text">No Telepon</span>
                                    </label>
                                    <input type="text" placeholder="" name="name" value="{{ $user->phone }}"
                                        class="input input-bordered w-full" disabled/>

                                    <label class="label mt-2">
                                        <span class="label-text">Alamat</span>
                                    </label>
                                    <textarea disabled class="input input-bordered w-full h-20 py-2">{{ $user->address }}</textarea>

                                    <p class="w-min px-2 break-words mt-4 text-zinc-400">Akun dibuat tanggal: {{ $user->created_at }} <br> ( {{ $user->created_at->diffForHumans() }})</p>
                                </div>
                                <div class="modal-action">
                                    <label for="edit-modal-{{ $user->id }}" class="btn">Close</label>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection