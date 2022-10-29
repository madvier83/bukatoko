<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
            'phone' => 'required|min:8',
            'address' => 'required|min:8',
        ]);
        // dd($validated);
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login')->with('success', 'Registrasi akun berhasil, silahkan login');
    }
}
